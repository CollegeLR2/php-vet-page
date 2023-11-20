<?php 
include "library/db.php";

$conn = connect();

$show_results = false;
$user_search_string = "";

if (isset($_POST["search"])) {
    $show_results = true;
    $result = find_pet($_POST["search"], $conn);
    $user_search_string= $_POST["search"];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Search</h1>
    <form action="search.php" method="post">
        <p>
            Enter part of a pets name:
            <input type="text" name="search" value="<?= $user_search_string ?>">
            <input type="submit" value="Find">
        </p>
    </form>

    <?php if ($show_results) {

        include "library/show-db-ownerless.php";

    } ?>

    <button type="button" class="btn btn-secondary">
            <a class="dark-button" href="index.php">Home</a>
    </button>

</body>
</html>
