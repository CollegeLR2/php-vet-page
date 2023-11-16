<p>Enter owner name:
    <select name="owner_id" id="owner">
        
        <?php
        // include "library/db.php";
        // $conn = connect();
        $sql = "SELECT * FROM newowners";
        $result = $conn->query($sql); 
        ?>
        
        <!-- owner name dropdown
            used so user cannot input an owner name that doesn't exist -->
        <?php while ($row = $result->fetch_array(MYSQLI_ASSOC)): ?>
            <!-- the owner name is only shown to the user for ease of use
                the owner_id is the part that is used and sent -->
            <option value=<?= $row["owner_id"] ?>><?= $row["owner_name"] ?></option>
        <?php endwhile; ?>
    </select>
</p>
