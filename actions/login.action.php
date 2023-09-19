<?php

require '../config/db-connection.php';
require '../config/validate-input.php';

session_start();

$username = '';
$password = '';

$ok = true;

if (isset($_POST['submit'])) {

    if (isUsernameValid($_POST['username'])) {
        $username = sanitiseInput($_POST['username']);
    } else {
        $ok = false;
    }

    if (isset($_POST['password'])) {
        $password = sanitiseInput($_POST['password']);
    } else {
        $ok = false;
    }

    if($ok) {
        $db = connectToDB();

        $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['user_id'];
            header('Location: /src/userPage/userPage.php');
            exit();
        } else {
            echo "Invalid username or password";
        }

        $db->close();
    } else {
        echo "log in failed";
    }
}
