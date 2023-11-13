<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Link Owners to Pets</title>   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    
<?php
include "library/db.php";
$conn = connect();

$sql = "SELECT * FROM pets";
$result = $conn->query($sql); 
?>

<h1>Pets and Owners</h1>

<div class="row justify-content-evenly">
    <div class="col-6">
        <table>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>Type</th>
            </tr>
            <?php while ($row = $result->fetch_array(MYSQLI_ASSOC)): ?>
                <!-- Puts the data into the table  -->
                <tr>
                    <td><?= $row["name"] ?></td>
                    <td><?= $row["age"] ?></td>
                    <td><?= $row["type"] ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>

<?php include "owners.php" ?>

</div>

<button type="button" class="btn btn-secondary">
    <a class="dark-button" href="index.php">Home</a>
</button>

</body>
</html>
