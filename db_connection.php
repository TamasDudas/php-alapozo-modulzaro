<?php

//adatbázis kapcsolat az appworld adatbázishoz
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "appworld";

//kapcsolat létrehozása
$conn = new mysqli($servername, $username, $password, $dbname);

//kapcsolat ellenőrzése
if ($conn->connect_error) {
    die("Kapcsolódási hiba: " . $conn->connect_error);
}
