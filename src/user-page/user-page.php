<?php
require '../../config/db-connection.php';
require '../../actions/security.php';

$user_id = requireLogin();

$pets = [];



    $db = connectToDB();

    $stmt = $db->prepare("SELECT * FROM pets WHERE user_id = ?");
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($pet = $result->fetch_object()) {
        $pets[] = $pet;
    }

    $stmt->close();
    $db->close();




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/main-styles.css" />
    <link rel="stylesheet" href="/assets/form-styles.css" />
    <link rel="stylesheet" href="/src/user-page/styles.css" />
    <title>My Pets - User Page</title>
</head>

<body>
    <header class="heading">
        <?php
        include '../../templates/nav-bar/nav-bar.php';
        ?>
        <h1 class="heading-title">My Pets - User Page</h1>
    </header>
    <section class="user-page-container">
        <?php if (empty($pets)) : ?>
            <p>You have not added any pets.</p>

        <?php else : ?>

            <h2 class="subtitle">Your pets</h2>

            <?php foreach ($pets as $pet) : ?>

                <div class="pet-container" data-pet-id="<?php echo $pet->pet_id ?>">
                    <h3 class="pet-name"><?php echo $pet->name ?></h3>
                    <img class="pet-image" src="<?php echo $pet->photo_url; ?>" alt="<?php echo "a photo of your pet $pet->name" ?>" />
                </div>

                <script>
                    document.querySelectorAll('.pet-container').forEach(petDiv => {
                        petDiv.addEventListener('click', event => {
                            const petId = event.currentTarget.getAttribute('data-pet-id');

                            window.location.href = `./pet-page/pet-page.php?id=${petId}`;
                        })
                    })
                </script>

            <?php endforeach; ?>

        <?php endif; ?>

        <p><a href="./add-a-pet/add-a-pet.php" class="link link-accent">Click here</a> to add a new pet!</p>

    </section>
</body>

</html>