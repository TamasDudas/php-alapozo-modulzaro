<?php

session_start();
unset($_SESSION['loggedin']);
unset($_SESSION['user_id']);
unset($_SESSION['email']);
unset($_SESSION['is_admin']);
header('Location: index.php');
exit;
