<?php 

include "library/db.php";
$conn = connect();

$sql = "SELECT * FROM owners";
$stmt = $conn->prepare($sql);

?>

<div class="row justify-content-evenly padding">
    <div class="col-6">
        <h3>Your Profile</h3>
    </div>
</div>
