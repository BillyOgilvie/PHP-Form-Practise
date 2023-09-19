<?php
require '../config/db-connection.php';
require '../config/validate-input.php';

$email = '';
$username = '';
$password = '';

$ok = true;

if (isset($_POST['submit'])) {
    echo "Form was submitted";

    if (isEmailVaid($_POST['email'])) {
        $email = sanitiseInput($_POST['email']);
    } else {
        $ok = false;
    }

    if (isUsernameValid($_POST['username'])) {
        $username = sanitiseInput($_POST['username']);
    } else {
        $ok = false;
    }

    if (isPasswordValid($_POST['password'], $_POST['confirm-password'])) {
        $password = sanitiseInput($_POST['password']);
    } else {
        $ok = false;
    }

    if ($ok) {

        $db = connectToDB();

        if(doesUserExist($db, $username, $email)){
            header('Location: ../src/registration/registration-failed/registration-failed.php');
            exit();
        }


        $stmt = $db->prepare("INSERT INTO users (email, username, password)
        VALUES (?, ?, ?)
        ");
        $stmt->bind_param('sss', $email, $username, password_hash($password, PASSWORD_BCRYPT));

        $stmt->execute();

        $db->close();

        header('Location: ../src/registration/registration-success/registration-success.php');
        exit();
    } else {
        header('Location: ../src/registration/registration.php');
        exit();
    }
}
