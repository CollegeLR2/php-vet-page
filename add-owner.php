<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add an Owner</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Add a new owner</h1>
    <!-- form to create details -->
    <form action="add-owner-action.php" method="post">
        <p>Enter owner photo (link): <input type="url" name="photo" /></p>
        <p>Enter owner name: <input type="text" name="owner_name" /></p>
        <p>Enter owner email: <input type="text" name="email" /></p>
        <p>Enter owner phone #: <input type="text" name="phone" /></p>
        <button type="submit" class="btn btn-primary">Add Owner Details</button>
    </form>

    <!-- return to index.php -->
    <button type="button" class="btn btn-secondary">
        <a class="dark-button" href="index.php">Home</a>
    </button>

</body>
</html>
