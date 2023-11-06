<?php
    
    include "library/db.php";

    $conn = connect();

    $sql = "SELECT * FROM pets WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $_GET["id"]);
    $row = $stmt->execute();
    $result = $stmt->get_result();
    $pet = $result->fetch_assoc();

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit details</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Edit <?= $pet["name"] ?></h1>
    <form action="edit-action.php" method="post">
        <p>
            Name:
            <input type="text" name="name" value="<?=$pet["name"] ?>">
        </p>
        <p>
           Age:
            <input type="text" name="age" value="<?=$pet["age"] ?>">
        </p>
        <p>
            Type:
            <input type="text" name="type" value="<?=$pet["type"] ?>">
        </p>
        <p>
            <input type="submit" value="Update">
        </p>
        <input type="hidden" name="id" value="<?= $pet["id"] ?>">
    </form>

</body>
</html>

<?php

$result->free_result();
$conn->close();

?>
