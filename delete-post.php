<?php

require 'db_connection.php';
$post_id = $_GET['id'];

//Post Törlése az adatbázisból
$stmt = $conn->prepare("DELETE FROM posts WHERE id = ?");
$stmt->bind_param("i", $post_id);
$stmt->execute();
$stmt->close();
$conn->close();

//Visszairányítás a posztok listájára
header('Location: my-posts.php');
exit;
