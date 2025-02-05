<?php

session_start();
require 'db_connection.php';
require 'functions.php';

if (!isLoggedIn()) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $title = trim(htmlspecialchars($_POST['title']));
    $body = trim(htmlspecialchars($_POST['body']));
    $user_id = $_SESSION['user_id'];

    if (empty($title) || empty($body)) {
        $_SESSION['errors'] = ['A cím és a tartalom megadása kötelező!'];
        header('Location: edit-post.php?id=' . $id);
        exit;
    }

    $post = getEditPost($conn, $id, $user_id);

    // Ha a poszt a felhasználóhoz tartozik, vagy admin, frissítjük
    $stmt = $conn->prepare("UPDATE posts SET title = ?, body = ? WHERE id = ?");
    $stmt->bind_param("ssi", $title, $body, $id);
    $stmt->execute();

    header('Location: my-posts.php');
    exit;
} else {
    header('Location: my-posts.php');
    exit;
}
