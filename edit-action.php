<?php

include "library/db.php";

$conn = connect();

$query = "UPDATE pets SET name=?, age=?, type=? WHERE id=?";
// Prepares the query to prevent SQL injections 
$stmt = $conn->prepare($query);
$stmt->bind_param("ssss", $_POST["name"], $_POST["age"], $_POST["type"], $_POST["id"]);
$stmt->execute();

header("Location: ./index.php?id={$_POST["id"]}&msg=edit-success");

?>
