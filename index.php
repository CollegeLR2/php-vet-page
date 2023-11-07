<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
    <title>Mid-Cornwall Vet Centre</title>
</head>
<body>
    <h1 class="title">Mid-Cornwall Vet Centre</h1>
    <div class="row justify-content-evenly padding">
    <div class="col-4">
        <button type="button" class="btn btn-primary">
            <a class="dark-button" href="add-new.php">Add a new pet</a>            
        </button>
        
    </div>
    <div class="col-4">
        <button type="button" class="btn btn-primary">
            <a class="dark-button" href="view-db.php">View/Edit pets</a>
        </button>
        <!-- <a href="view-db.php">View/Edit pets</a> -->
    </div>
  </div>
    <!-- <ul>
        <li><a href="add-new.php">Add a new pet to the database</a></li>
        <li><a href="view-db.php">View/Edit pets</a></li>
    </ul> -->

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
