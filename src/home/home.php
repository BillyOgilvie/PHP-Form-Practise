<?php
session_start();

if(isset($_SESSION['user_id'])){
    header('Location: /src/userPage/userPage.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/main-styles.css" />
    <link rel="stylesheet" href="/assets/form-styles.css" />
    <link rel="stylesheet" href="/src/home/styles.css" />
    <title>My Pets - User Registration</title>
</head>

<body>

    <header class="heading">
        <h1 class="heading-title">My Pets - Home</h1>
    </header>
    <section class="form-container">
        <h2>Welcome to My Pets! 🐈🐕</h2>
        <section class="form-container">
            <form class="register-user-form" method="post" action="/actions/login.action.php">
                <div class="input-feild">
                    <label class="label" for="username">
                        username
                    </label>
                    <input class="input" type="text" name="username" placeholder="username...">
                </div>
                <div class="input-feild">
                    <label class="label" for="password">
                        password
                    </label>
                    <input class="input" type="password" name="password" placeholder="password...">
                </div>

                <div class="input-feild">
                    <input class="input input-sumbit" type="submit" name="submit" value="Log in">
                </div>
            </form>
        </section>
        <p>Not yet a user? <a class="register-link" href="./src/registration/registration.php">Register</a> for a free account!</p>
    </section>
</body>

</html>