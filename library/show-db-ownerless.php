<table>
    <tr>
        <th>Photo</th>
        <th>Name</th>
        <th>Age</th>
        <th>Type</th>
        <th></th>
        <th></th>
    </tr>
    <?php while ($row = $result->fetch_array(MYSQLI_ASSOC)): ?>
        <!-- Puts the data into the table  -->
        <tr>
        <td><img src="<?= $row["pet_photo"] ?>" height="70em"></td>
        <td><?= $row["name"] ?></td>
        <td><?= $row["age"] ?></td>
        <td><?= $row["type"] ?></td>
        <td><button type="button" class="btn btn-info">
            <a class="light-button" href="edit.php?id=<?= $row["id"] ?>">Edit</a>
        </button></td>
        <td><button type="button" class="btn btn-danger">
            <a class="light-button" href="delete.php?id=<?= $row["id"] ?>">Delete</a>
        </button></td>
        </tr>
    <?php endwhile; ?>
</table>

<?php include "pagination.php" ?>
