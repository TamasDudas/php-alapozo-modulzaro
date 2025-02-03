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

    // Ellenőrizzük, hogy a felhasználó admin-e
    $stmt = $conn->prepare("SELECT is_admin FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($is_admin);
    $stmt->fetch();
    $stmt->close();

    if ($is_admin) {
        // Admin bármelyik posztot frissítheti
        $stmt = $conn->prepare("SELECT * FROM posts WHERE id = ?");
        $stmt->bind_param("i", $id);
    } else {
        // Normál felhasználó csak a saját posztját frissítheti
        $stmt = $conn->prepare("SELECT * FROM posts WHERE id = ? AND user_id = ?");
        $stmt->bind_param("ii", $id, $user_id);
    }

    $stmt->execute();
    $result = $stmt->get_result();
    $post = $result->fetch_assoc();

    if (!$post) {
        $_SESSION['error_message'] = 'Nincs jogosultságod a poszt frissítésére.';
        header('Location: my-posts.php');
        exit;
    }

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
