<?php

function isLoggedIn()
{
    return isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;
}

function isErrors()
{
    return isset($_SESSION['errors']) ? $_SESSION['errors'] : [];


}

function showErrors()
{
    $errors = isErrors();
    if (!empty($errors)) {
        echo '<div class="alert alert-danger">';
        foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';
        }
        echo '</div>';
        unset($_SESSION['errors']);
    }
}
function getPostAndName($conn)
{
    return $conn->prepare("SELECT posts.*, users.nev FROM posts JOIN users ON posts.user_id = users.id");
}

function renderPost($title, $body, $authorName, $postId = null)
{
    $authorLink = $postId ? "<a class='card-text text-start mt-3 text-primary-emphasis' href='author-posts.php?id={$postId}'>Szerző: {$authorName}</a>" : "<p class='card-text text-start mt-3 text-primary-emphasis'>Szerző: {$authorName}</p>";

    return "<div class='container mt-5'>
                <h2 class='mb-4'>{$title}</h2>
                <p>{$body}</p>
                {$authorLink}
            </div>";
}

function getEditPost($conn, $post_id, $user_id)
{
    // Ellenőrizzük, hogy a felhasználó admin-e
    $stmt = $conn->prepare("SELECT is_admin FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();

    $is_admin = $user['is_admin'] ?? false;

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

    return $post;
}
