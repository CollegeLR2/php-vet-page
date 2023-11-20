<?php 

include "library/db.php";
$conn = connect();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
    <title>Profile</title>
</head>
<body>
    <div class="row justify-content-evenly padding">
        <div class="col-4">
            <h2>Your Profile</h2>
            <!-- Prints the owner's name input in the last page
                whether or not it is in the db -->
            <h3><?= $_GET["owner_name"] ?></h3>

            <?php 
                show_profile($conn);
            ?>

        </div>
    </div>

    <div class="row justify-content-evenly padding">
        <div class="col-2">
            <button type="button" class="btn btn-secondary">
                <a class="dark-button" href="index.php">Home</a>
            </button>
        </div>
    </div>
</body>
