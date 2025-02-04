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
