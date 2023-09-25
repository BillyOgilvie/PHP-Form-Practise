<?php
require '../../../config/db-connection.php';
require '../../../actions/security.php';

$user_id = requireLogin();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/main-styles.css" />
    <link rel="stylesheet" href="/assets/form-styles.css" />
    <title>My Pets - Add New Pet</title>
</head>

<body>
    <header class="heading">
        <h1 class="heading-title">My Pets - Add New Pet</h1>
    </header>
    <section class="form-container">
        <form class="register-user-form" method="post" action="../../../actions/add-pet.action.php" enctype="multipart/form-data">
            <div class="input-feild">
                <label class="label" for="name">
                    name
                </label>
                <input class="input" type="text" name="name" placeholder="name...">
            </div>
            <div class="input-feild">
                <label class="label" for="species">
                    species
                </label>
                <input class="input" type="text" name="species" placeholder="species...">
            </div>
            <div class="input-feild">
                <label class="label" for="breed">
                    breed
                </label>
                <input class="input" type="breed" name="breed" placeholder="breed...">
            </div>
            <div class="input-feild">
                <label class="label" for="age">
                    age
                </label>
                <input class="input" type="number" name="age" placeholder="age">
            </div>

            <div class="input-feild">
                <label for="radios">Sex</label>
                <div class="radios">
                    <div class="radio-input">
                        <input class="input-radio" type="radio" name="radios" value="m" id="radio1" checked>
                        <label for="radio1">Male</label>
                    </div>
                    <div class="radio-input">
                        <input class="input-radio" type="radio" name="radios" value="f" id="radio2">
                        <label for="radio2">Female</label>
                    </div>
                </div>
            </div>

            </div>
            <div class="input-feild">
                <label for="photo" class="label" name="photo">Upload Image</label>
                <label for="fileInput" class="file-label" id="fileName" name="photo">Choose File</label>
                <input id="fileInput" class="input input-browse" type="file" name="image" style="display: none;">
            </div>

            <div class="input-feild">
                <input class="input input-sumbit" type="submit" name="submit" value="Add Pet">
            </div>
        </form>
    </section>

    <script>
        document.getElementById('fileInput').addEventListener('change', function() {
            var fileName = document.getElementById('fileInput').files[0].name;
            document.getElementById('fileName').textContent = fileName;
        });
    </script>

</body>

</html>