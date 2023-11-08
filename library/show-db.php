<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Age</th>
        <th></th>
        <th></th>
    </tr>
    <?php while ($row = $result->fetch_array(MYSQLI_ASSOC)): ?>
        <!-- Puts the data into the table  -->
        <tr>
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
