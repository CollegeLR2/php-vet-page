<!-- This section of PHP creates a connection to the pets database in mySQL
    and shows an error message if the connection fails to be made -->
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
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Registered Pets</h1>
    <!--  Create a table with a top row for the name of the data -->

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Type</th>
            <th>#</th>
            <th>#</th>
        </tr>

        <?php

        // Selects all the data (*) from the pets DB 
        $sql = "SELECT * FROM pets";
        // Queries the sql statement against the connected database 
        $result = $conn->query($sql);
        // While there are rows left in the database to "fetch" 
        while ($row = $result->fetch_array(MYSQLI_ASSOC)): ?>
            <!-- Puts the data into the table  -->
            <tr>
            <td><?= $row["id"] ?></td>
            <td><?= $row["name"] ?></td>
            <td><?= $row["age"] ?></td>
            <td><?= $row["type"] ?></td>
            <td><a href="edit.php?id=<?= $row["id"] ?>">Edit</a></td>
            <td><a href="delete.php?id=<?= $row["id"] ?>">Delete</a></td>
            </tr>
        <?php endwhile;

        // "Frees the memory associated with the result"
        $result->free_result();

        // Closes the connection to the database
        $conn->close();

        ?>
        <!-- Remembering to close the open table when no more data is being added to it -->
        </table>
</body>
</html>
