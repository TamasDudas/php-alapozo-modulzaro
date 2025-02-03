<?php

session_start();
require 'db_connection.php';
require 'functions.php';

if (!isLoggedIn()) {
    header('Location: login.php');
    exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim(htmlspecialchars($_POST['title']));
    $body = trim(htmlspecialchars($_POST['body']));
    $users_id = $_SESSION['user_id'];

    if (empty($title) || empty($body)) {
        $_SESSION['errors'] = ['A cím és a tartalom megadása kötelező!'];
        $_SESSION['form_data'] = ['title' => $title, 'body' => $body];
        header('Location: create-post.php');
        exit;
    }



    $stmt = $conn->prepare("INSERT INTO posts (title, body, user_id) VALUES (?, ?, ?)");
    if ($stmt === false) {
        $_SESSION['errors'] = ['Hiba történt a bejegyzés létrehozása során.'];
        header('Location: create-post.php');
        exit;
    }
    $stmt->bind_param("ssi", $title, $body, $users_id);
    $stmt->execute();
    $stmt->close();

    header('Location: my-posts.php');
    exit;
}
