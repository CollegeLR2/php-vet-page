<?php

include "library/db.php";

$conn = connect();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pets</title>    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Registered Pets</h1>

    <button type="button" class="btn btn-secondary">
        <a class="dark-button" href="index.php">Home</a>
    </button>

    <?php 
        // Selects all the data (*) from the pets and owners tables, where 
        // the owner_ids are the same
        $sql = "SELECT * FROM pets, owners WHERE pets.owner_id = owners.owner_id";
        // Queries the sql statement against the connected database 
        $result = $conn->query($sql); 

        // Create a table with a top row for the name of the data 
        include "library/show-db.php";

        // "Frees the memory associated with the result"
        $result->free_result();

        // Closes the connection to the database
        $conn->close();
    ?>

</body>
</html>
