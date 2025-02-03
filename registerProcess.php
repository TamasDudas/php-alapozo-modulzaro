<?php

session_start();

// Adatbázis kapcsolódás
// $db = new PDO('mysql:host=localhost;dbname=your_database', 'username', 'password');
// $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
require 'db_connection.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Adatok tisztítása
    $name = trim($_POST['name']);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validálás
    if (empty($name)) {
        $_SESSION['errors'][] = "A név megadása kötelező!";
    }

    if (empty($email)) {
        $_SESSION['errors'][] = "Az email megadása kötelező!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['errors'][] = "Érvénytelen email formátum!";
    }

    if (empty($password)) {
        $_SESSION['errors'][] = "A jelszó megadása kötelező!";
    }

    if ($password !== $confirm_password) {
        $_SESSION['errors'][] = "A jelszavak nem egyeznek!";
    }

    // Email egyediség ellenőrzése
    $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count > 0) {
        $_SESSION['errors'][] = "Ez az email cím már regisztrálva van!";
    }

    // Ha nincs hiba, mentsük az adatokat
    if (empty($_SESSION['errors'])) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO users (nev, email, password, created_at, updated_at, is_admin) VALUES (?, ?, ?, NOW(), NOW(), false)");
        $stmt->bind_param("sss", $name, $email, $hashedPassword);

        if ($stmt->execute()) {
            $_SESSION['success'] = "Sikeres regisztráció!";
            header('Location: login.php');
            exit();
        } else {
            $_SESSION['errors'][] = "Adatbázis hiba történt: " . $conn->error;
        }

        $stmt->close();
    }

    // Ha volt hiba, irányítsuk vissza a felhasználót
    if (!empty($_SESSION['errors'])) {
        header('Location: registration.php');
        exit();
    }
}
