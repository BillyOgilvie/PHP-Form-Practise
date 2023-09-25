<?php
require '../config/db-connection.php';
require '../config/validate-input.php';
require './security.php';

$user_id = requireLogin();


$name = '';
$species = '';
$breed = '';
$age = '';
$sex = '';
$photo_url = '';

$ok = true;

if (isset($_POST['submit'])) {

    if (isset($_POST['name'])) {
        $name = htmlspecialchars($_POST['name']);
    } else {
        $okay = false;
    }

    if (isset($_POST['species'])) {
        $species = htmlspecialchars($_POST['species']);
    } else {
        $okay = false;
    }

    if (isset($_POST['breed'])) {
        $breed = htmlspecialchars($_POST['breed']);
    } else {
        $okay = false;
    }

    if (isset($_POST['age'])) {
        $age = htmlspecialchars($_POST['age']);
    } else {
        $okay = false;
    }

    if (isset($_POST['sex'])) {
        $sex = htmlspecialchars($_POST['sex']);
    } else {
        $okay = false;
    }

    if (isset($_FILES['image'])) {
        $targetDir = "../uploads/";
        $targetFile = $targetDir . basename($_FILES['image']['name']);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            echo "The file " . basename($_FILES['image']['name']) . " has been uploaded.";
            $photo_url = '/uploads/' . basename($_FILES['image']['name']);
            echo $photo_url;
        }
    } else {
        echo "Sorry, there was an error uploading your file.";

        $okay = false;
    }

    if($ok){
        $db = connectToDB();

        $stmt = $db->prepare("INSERT INTO pets (user_id, name, species, breed, age, sex, photo_url)
        VALUES(?,?,?,?,?,?,?)
        ");
        $stmt->bind_param('isssiss', $user_id, $name, $species, $breed, $age, $sex, $photo_url);
        $stmt->execute();
        $stmt->close();

        $db->close();

        header('Location: ../src/user-page/user-page.php');
        exit();
    }

} else {
    header('Location: ../src/user-page/add-a-pet.php');
    exit();
}
