<?php
require '../../../config/db-connection.php';
require '../../../actions/security.php';

$user_id = requireLogin();

$pet_id = htmlspecialchars($_GET['id'], ENT_QUOTES);

$db = connectToDB();

$stmt = $db->prepare("SELECT * FROM pets WHERE pet_id = ?");
$stmt->bind_param('i', $pet_id);
$stmt->execute();
$result = $stmt->get_result();

$pet = $result->fetch_object();

$stmt->close();
$db->close();


$pronoun = '';

if ($pet->sex === "m") {
    $pronoun = 'He';
} elseif ($pet->sex === "f") {
    $pronoun = 'She';
} else {
    $pronoun = 'They';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/main-styles.css" />
    <link rel="stylesheet" href="/assets/form-styles.css" />
    <link rel="stylesheet" href="/src/user-page/styles.css" />
    <link rel="stylesheet" href="/src/user-page/styles.css" />
    <title>My Pets - <?php echo  ucfirst("$pet->name's"); ?> Page</title>
</head>

<body>
    <header class="heading">
        <?php
        include '../../../templates/nav-bar/nav-bar.php';
        ?>
        <h1 class="heading-title">My Pets - User Page</h1>
    </header>
    
    <section class="pet-container">
        <?php if (empty($pet)) : ?>
            <p>Opps, something went wrong! We could not find your pet.</p>

        <?php else : ?>
            <div class="pet">
                <h3 class="pet-name"><?php echo $pet->name ?></h3>
                <img class="pet-image pet-page-image" src="<?php echo $pet->photo_url; ?>" alt="<?php echo "a photo of your pet $pet->name" ?>" />
                <p><?php echo "This is " . ucfirst("$pet->name.") . " $pronoun is a $pet->breed $pet->species"; ?></p>
            </div>

        <?php endif; ?>



    </section>
</body>

</html>