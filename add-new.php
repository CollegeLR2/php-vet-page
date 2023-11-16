<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a Pet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Add a new pet</h1>
    <!-- form to create details -->
    <form action="add-action.php" method="post">
        <p>Enter pet name: <input type="text" name="name" /></p>
        <p>Enter pet age: <input type="text" name="age" /></p>
        <p>Enter pet type: <input type="text" name="type" /></p>
        
        <p>Enter owner name:
            <select name="owner_id" id="owner">
                
                <?php
                include "library/db.php";
                $conn = connect();
                $sql = "SELECT * FROM newowners";
                $result = $conn->query($sql); 
                ?>
                
                <!-- owner name dropdown
                     used so user cannot input an owner name that doesn't exist -->
                <?php while ($row = $result->fetch_array(MYSQLI_ASSOC)): ?>
                    <!-- the owner name is only shown to the user for ease of use
                         the owner_id is the part that is used and sent -->
                    <option value=<?= $row["owner_id"] ?>><?= $row["owner_name"] ?></option>
                <?php endwhile; ?>
            </select>
        </p>

        <button type="submit" class="btn btn-primary">Add Pet Details</button>
    </form>

    <!-- return to index.php -->
    <button type="button" class="btn btn-secondary">
        <a class="dark-button" href="index.php">Home</a>
    </button>

</body>
</html>
