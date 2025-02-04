<?php
session_start();
require 'header.php';
require 'db_connection.php';


if (!isLoggedIn()) {
    header('Location: login.php');
    exit;
}

if (isset($_GET['id'])) {
    $post_id = $_GET['id'];
    $user_id = $_SESSION['user_id'];

    // Ellenőrizzük, hogy a felhasználó admin-e
    $stmt = $conn->prepare("SELECT is_admin FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($is_admin);
    $stmt->fetch();
    $stmt->close();

    if ($is_admin) {
        // Admin bármelyik posztot szerkesztheti
        $stmt = $conn->prepare("SELECT * FROM posts WHERE id = ?");
        $stmt->bind_param("i", $post_id);
    } else {
        // Normál felhasználó csak a saját posztját szerkesztheti
        $stmt = $conn->prepare("SELECT * FROM posts WHERE id = ? AND user_id = ?");
        $stmt->bind_param("ii", $post_id, $user_id);
    }

    $stmt->execute();
    $result = $stmt->get_result();
    $post = $result->fetch_assoc();

    if (!$post) {
        $_SESSION['error_message'] = 'Nincs jogosultságod a poszt szerkesztésére.';
        header('Location: my-posts.php');
        exit;
    }
} else {
    header('Location: my-posts.php');
    exit;
}
?>


<div class="container col-12 col-md-6">
<h3 class="mb-4 text-center">Edit Post</h3>
    <!--Hibák megjelenítése-->
    <?php showErrors(); ?>
    <!-- crate post form -->
    <form action="update.php" method="post">
    <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
    <div class="mb-3">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo $post['title']; ?>">
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <textarea class="form-control" id="body" name="body" rows="5"><?php echo $post['body']; ?></textarea>
        </div>
        <div class="d-flex justify-content-evenly">
            <button type="submit" class="btn btn-primary">Frissít</button>
            <button type="button" class="btn btn-secondary" onclick="window.location.href='my-posts.php'">Mégse</button>
        </div>
        
    </form>
</div>
    
