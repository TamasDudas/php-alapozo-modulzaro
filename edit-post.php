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
    $post = getEditPost($conn, $post_id, $user_id);
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
    
