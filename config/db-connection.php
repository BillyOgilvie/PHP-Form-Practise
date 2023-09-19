<?php
require 'config.inc.php';

function connectToDB() {

$conn = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

return $conn;

}
