<?php

session_start();
require 'header.php';
require 'db_connection.php';


if (isset($_SESSION['error_message'])) {
    echo '<div class=" container alert alert-danger">' . $_SESSION['error_message'] . '</div>';
    unset($_SESSION['error_message']); // Üzenet törlése, hogy ne jelenjen meg újra
}

// Megnézzük, hogy be van-e lépve a felhasználó
if (isLoggedIn() && isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Megnézzük, hogy admin-e a felhasználó
    $stmt = $conn->prepare("SELECT is_admin FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($is_admin);
    $stmt->fetch();
    $stmt->close();

    // query futtatása a posztok lekéréséhez
    if ($is_admin) {

        $stmt = getPostAndName($conn);
    } else {
        // A sima felhasználó a saját posztjait láthatja
        $stmt = $conn->prepare("SELECT posts.*, users.nev FROM posts JOIN users ON posts.user_id = users.id WHERE posts.user_id = ?");
        $stmt->bind_param("i", $user_id);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    // Ha nincs poszt, üzenet jelenjen meg
    if ($result->num_rows === 0) {
        echo "<h3 class='container mt-4 text-center'>";
        echo "<p>Írd meg első posztodat!</p>";
        echo "</h3>";

    } else {

        // Posztok megjelenítése
        while ($post = $result->fetch_assoc()) {
            echo "<div class='container mt-4'> ";
            echo "<h2>" . htmlspecialchars($post['title']) . "</h2>";
            echo "<p>" . htmlspecialchars($post['body']) . "</p>";
            echo "<p><strong>Szerző:</strong> " . htmlspecialchars($post['nev']) . "</p>";
            echo "</div>";
            // Edit gomb
            echo "<div class='container mt-4'>";
            echo "<a href='edit-post.php?id=" . $post['id'] . "' class='btn btn-primary me-2'>Szerkesztés</a>";
            // Delete gomb
            echo "<a href='delete-post.php?id=" . $post['id'] . "' class='btn btn-danger' onclick='return confirmDelete()'>Törlés</a>";
            echo "</div>";
            echo "<hr>";
        }
    }


    $stmt->close();
} else {
    header('Location: login.php');
    exit;
}

require 'footer.php';
