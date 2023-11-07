<?php

include "library/db.php";

$conn = connect();

edit_pet($_GET["id"], $conn);

header("Location: ./index.php?id={$_POST["id"]}&msg=edit-success");

?>
