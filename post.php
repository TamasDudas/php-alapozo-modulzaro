<?php

session_start();
require 'db_connection.php';
require 'header.php';

// Ellenőrizzük, hogy van-e 'id' paraméter az URL-ben
if (isset($_GET['id'])) {
    $post_id = $_GET['id'];

    // Lekérdezzük a posztot az adatbázisból
    $stmt = $conn->prepare("SELECT title, body, nev FROM posts JOIN users ON posts.user_id = users.id WHERE posts.id = ?");
    $stmt->bind_param("i", $post_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $post = $result->fetch_assoc();
        echo renderPost($post['title'], $post['body'], $post['nev'], $post_id);
    } else {
        echo "<div class='container mt-5'><p>Nincs ilyen poszt.</p></div>";
    }


    $stmt->close();
} else {
    echo "<div class='container mt-5'><p>Érvénytelen kérés.</p></div>";
}

require 'footer.php';
$conn->close();
