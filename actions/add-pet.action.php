<?php
require '../config/db-connection.php';
require '../config/validate-input.php';
require './security.php';

$user_id = requireLogin();

if (isset($_FILES['image'])){
    $targetDir = "../uploads/";
    $targetFile = $targetDir . basename($_FILES['image']['name']);

    if(move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
        echo "The file " . basename($_FILES['image']['name']) . " has been uploaded.";
    }
} else {
    echo "Sorry, there was an error uploading your file.";
}