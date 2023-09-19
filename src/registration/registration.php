<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/main-styles.css" />
    <link rel="stylesheet" href="/assets/form-styles.css" />
    <title>My Pets - User Registration</title>
</head>

<body>
    <header class="heading">
        <h1 class="heading-title">My Pets - Registration</h1>
    </header>
    <section class="form-container">
        <form class="register-user-form" method="post" action="../../actions/form.action.php">
            <div class="input-feild">
                <label class="label" for="email">
                    email
                </label>
                <input class="input" type="email" name="email" placeholder="email...">
            </div>
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
                <label class="label" for="confirm-password">
                    confirm password
                </label>
                <input class="input" type="password" name="confirm-password" placeholder="confirm password...">
            </div>
            <div class="input-feild">
                <input class="input input-sumbit" type="submit" name="submit" value="Register">
            </div>
        </form>
    </section>
</body>

</html>