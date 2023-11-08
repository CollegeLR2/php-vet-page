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
    $query = "DELETE FROM pets WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $_GET["id"]);
    $stmt->execute();
}

// adds a pet to the db
function add_pet($conn) {
    $query = "INSERT INTO pets (name, age, type) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $_POST["name"], $_POST["age"], $_POST["type"]);
    $stmt->execute();
}

// changes the values of the data in the db
function edit_pet($id, $conn) {
    $query = "UPDATE pets SET name=?, age=?, type=? WHERE id=?";
    // Prepares the query to prevent SQL injections 
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssss", $_POST["name"], $_POST["age"], $_POST["type"], $_POST["id"]);
    $stmt->execute();
}

function find_pet($search, $conn) {
    $query = "SELECT * FROM pets WHERE name LIKE ?";
    $stmt = $conn->prepare($query);

    $search = "{$_POST['search']}%";
    $stmt->bind_param("s", $search);
    $stmt->execute();
    return $stmt->get_result();
}

?>
