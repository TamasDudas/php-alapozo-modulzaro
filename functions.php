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
