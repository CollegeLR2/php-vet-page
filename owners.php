<?php
$sql = "SELECT * FROM newowners";
$result = $conn->query($sql); 

?>

<div class="col-6">
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Photo</th>
        </tr>
        <?php while ($row = $result->fetch_array(MYSQLI_ASSOC)): ?>
            <!-- Puts the data into the table  -->
            <tr>
                <td><?= $row["owner_name"] ?></td>
                <td><?= $row["email"] ?></td>
                <td><?= $row["phone"] ?></td>
                <td><img src="<?= $row["photo"] ?>"></td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>
