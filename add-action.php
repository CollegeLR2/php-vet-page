<?php

include "library/db.php";

$conn = connect();
    
add_pet($conn);

header("Location: ./index.php?id={$_POST["name"]}&msg=add-success");

?>
