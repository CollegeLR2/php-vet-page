<?php
$sql = "SELECT * FROM owners";
$result = $conn->query($sql); 

?>

<div class="col-6">
    <table>
        <tr>
            <th>Owner ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
        </tr>
        <?php while ($row = $result->fetch_array(MYSQLI_ASSOC)): ?>
            <!-- Puts the data into the table  -->
            <tr>
                <td><?= $row["owner_id"] ?></td>
                <td><?= $row["owner_name"] ?></td>
                <td><?= $row["email"] ?></td>
                <td><?= $row["phone"] ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>
