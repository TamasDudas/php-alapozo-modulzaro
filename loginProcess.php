<?php
session_start();

require 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);


    if (empty($email) || empty($password)) {
        $_SESSION['errors'] = ['Az email és a jelszó megadása kötelező!'];
        header('Location: login.php');
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['errors'] = ['Érvénytelen email formátum!'];
        header('Location: login.php');
        exit;
    }

    // Lekérdezés előkészítése és végrehajtása a felhasználói adatok lekérésére
    $stmt = $conn->prepare("SELECT id, password, is_admin FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id, $stored_password, $is_admin);
        $stmt->fetch();


        // Jelszó ellenőrzése a hashelt jelszóval
        if (password_verify($password, $stored_password)) {
            $_SESSION['loggedin'] = true;
            $_SESSION['user_id'] = $user_id;
            $_SESSION['email'] = $email;
            $_SESSION['is_admin'] = $is_admin;
            header('Location: index.php');
            exit;
        } else {
            $_SESSION['errors'] = ['Hibás jelszó!'];
        }
    } else {
        $_SESSION['errors'] = ['Hibás email cím!'];
    }

    $stmt->close();
    $conn->close();

    // Átirányítás vissza a login.php oldalra
    header('Location: login.php');
    exit;
}
?>

