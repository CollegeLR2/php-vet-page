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
        <h2>Your Profile</h2>
        <h3><?= $_GET["owner_name"] ?></h3>

        <?php
        $owner = $_GET["owner_name"];
        $result = $conn->execute_query("SELECT owner_id FROM owners 
                                        WHERE owner_name = ? LIMIT 1", [$owner]);
        if($result->num_rows == 1) {
            echo "Found you in the database. Congrats!!!!!!";
        } else {
            echo "That name isn't in the database yet. 
            Make sure you entered it correctly and try again";
        }
        ?>

    </div>

    <div class="row justify-content-evenly padding">
        <div class="col-2">
            <button type="button" class="btn btn-secondary">
                <a class="dark-button" href="index.php">Home</a>
            </button>
        </div>
    </div>
</body>
