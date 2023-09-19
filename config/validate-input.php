<?php

function sanitiseInput($input) {
    return htmlspecialchars($input, ENT_QUOTES);
}

function isEmailVaid($input) {
    return filter_var($input, FILTER_VALIDATE_EMAIL);
}

function isUsernameValid($input) {
    return strlen($input) <= 255;
}

function isPasswordValid($input1, $input2) {
    return strlen($input1) > 0 && $input1 === $input2;
}

function doesUserExist ($db, $username, $email) {
        $stmt = $db->prepare("SELECT user_id FROM users WHERE username = ? OR email = ?");
        $stmt->bind_param('ss', $username, $email);
        $stmt->execute();
        $stmt->store_result();
        return($stmt->num_rows > 0);
}
