<?php

include "library/db.php";

$conn = connect();
    
$query = "INSERT INTO pets (name, age, type) VALUES (?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("sss", $_POST["name"], $_POST["age"], $_POST["type"]);
$stmt->execute();

header("Location: ./index.php?id={$_POST["name"]}&msg=add-success");

?>
