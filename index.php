<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Mid-Cornwall Vet Centre</title>
</head>
<body>
    <ul>
        <li><a href="add-new.php">Add a new pet to the database</a></li>
        <li><a href="view-db.php">View/Edit pets</a></li>
    </ul>

    <?php if(isset($_GET["msg"]) && $_GET["msg"]=="add-success"): ?>
        <div class="success">
            Added <?=$_GET["id"]?> to database
        </div>
    <?php endif ?>

    <?php if(isset($_GET["msg"]) && $_GET["msg"]=="edit-success"): ?>
        <div class="success">
            Successful edit
        </div>
    <?php endif ?>

    <?php if(isset($_GET["msg"]) && $_GET["msg"]=="delete-success"): ?>
        <div class="success">
            Successful deletion
        </div>
    <?php endif ?>

</body>
</html>
