<?php
require '../../config/db-connection.php';

$pets = [];

session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: /src/home/home.php');
    exit();
} else {
    $user_id = $_SESSION['user_id'];

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
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/main-styles.css" />
    <link rel="stylesheet" href="/assets/form-styles.css" />
    <link rel="stylesheet" href="/src/userPage/styles.css" />
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
            <p><a href="./addAPet/addAPet.php">Click here</a> to add a new pet!</p>
            
            <?php else : ?>
                
                <h2 class="subtitle">Your pets</h2>
                
                <?php foreach ($pets as $pet): ?>
                    
                <div class="pet-container">
                    <h3 class="pet-name"><?php echo $pet->name ?></h3>
                    <img class="pet-image" src="<?php echo $pet->photo_url; ?>" alt="<?php echo "a photo of your pet $pet->name" ?>" />
                </div>

                <?php endforeach; ?>

            <?php endif; ?>



    </section>
</body>

</html>