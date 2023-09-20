<?php
session_start();

function requireLogin() {
    if (!isset($_SESSION['user_id'])) {
        header('Location: /src/home/home.php');
        exit();
    } else {
        return $_SESSION['user_id'];
    }
}
?>