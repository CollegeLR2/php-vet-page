<?php

include "library/db.php";

$conn = connect();
    
add_owner($conn);

header("Location: ./index.php?id={$_POST["name"]}&msg=add-success");

?>
