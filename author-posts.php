<?php

session_start();
require 'header.php';
require 'db_connection.php';

$post_id = $_GET['id'];


// Kell a user id-ja
$stmt = $conn->prepare("SELECT users.id, users.nev FROM posts JOIN users ON posts.user_id = users.id WHERE posts.id = ?");
$stmt->bind_param("i", $post_id);
$stmt->execute();
$stmt->bind_result($user_id, $user_nev);
$stmt->fetch();
$stmt->close();

// Megkapjuk a posztokat
$stmt = $conn->prepare("SELECT id, title, body FROM posts WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Step 3: Post megjelnítése
while ($post = $result->fetch_assoc()) {
    echo renderPost($post['title'], $post['body'], $user_nev);
    echo "<hr>";
}


$stmt->close();
$conn->close();

require 'footer.php';
