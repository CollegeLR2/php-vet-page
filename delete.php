<?php 

include "library/db.php";

$conn = connect();

delete_pet($_GET["id"], $conn);

header("Location: index.php?msg=delete-success");

?>
