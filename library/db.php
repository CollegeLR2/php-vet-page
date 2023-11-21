<?php

// connects to the vet-centre db
function connect() {
    $servername = "localhost";
    $username = "root";
    $password = "";

    $conn = new mysqli($servername, $username, $password, "vet-centre");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

// deletes data from db 
function delete_pet($id, $conn) {
    $query = "DELETE FROM newpets WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $_GET["id"]);
    $stmt->execute();
}

// adds a pet to the db
function add_pet($conn) {
    $query = "INSERT INTO newpets (name, age, type, owner_id, pet_photo) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssis", $_POST["name"], $_POST["age"], $_POST["type"], $_POST["owner_id"], $_POST["pet_photo"]);
    $stmt->execute();
}

// adds an owner to the db
function add_owner($conn) {
    $query = "INSERT INTO newowners (owner_name, email, phone, photo) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssss", $_POST["owner_name"], $_POST["email"], $_POST["phone"], $_POST["photo"]);
    $stmt->execute();
}

// changes the values of the data in the db
function edit_pet($id, $conn) {
    $query = "UPDATE newpets SET name=?, age=?, type=?, owner_id=?, pet_photo=? WHERE id=?";
    // Prepares the query to prevent SQL injections 
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssisi", $_POST["name"], $_POST["age"], $_POST["type"], 
    $_POST["owner_id"], $_POST["pet_photo"], $_POST["id"]);
    $stmt->execute();
}

// finds a pet from the database 
function find_pet($search, $conn) {
    $query = "SELECT * FROM newpets WHERE name LIKE ?";
    $stmt = $conn->prepare($query);

    // the % signs are used for a wider search, for all data 
    // that contains the search query, either before or after 
    // the full name
    $search = "%{$_POST['search']}%";
    $stmt->bind_param("s", $search);
    $stmt->execute();
    return $stmt->get_result();
}

// Shows the pets associated with an owner
function show_profile($conn) {
            $owner = $_GET["owner_name"];
            // Checks if the owner name input is in the db
            $result = $conn->execute_query("SELECT owner_id, photo FROM newowners WHERE owner_name = ? LIMIT 1", [$owner]);

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                $ownerId = $row["owner_id"];

                echo "<img src='" . $row["photo"] . "' height='100'>";
                
                // Finds the names of the pets that share an owner_id with the owner
                $petResult = $conn->execute_query("SELECT name FROM newpets WHERE owner_id = ?", [$ownerId]);

                if ($petResult->num_rows > 0) {
                    echo "<br /> Pets belonging to you: <br />";

                    // Loops through the pets to display all of the ones owned by one owner
                    while ($petRow = $petResult->fetch_assoc()) {
                        $petName = $petRow["name"];
                        echo $petName . "<br />";
                    }
                // if there are 0 rows for the pets under the owner
                } else {
                    echo "No pets found.";
                }
            // if the input does not match an owner_name in the owners table
            } else {
                echo "That name isn't in the database yet. Make sure you entered it correctly and try again";
            }
}

?>
