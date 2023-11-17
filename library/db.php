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
    $query = "INSERT INTO newpets (name, age, type, owner_id) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssi", $_POST["name"], $_POST["age"], $_POST["type"], $_POST["owner_id"]);
    $stmt->execute();
}

// adds an owner to the db
function add_owner($conn) {
    $query = "INSERT INTO newowners (owner_name, email, phone) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $_POST["owner_name"], $_POST["email"], $_POST["phone"]);
    $stmt->execute();
}

// changes the values of the data in the db
function edit_pet($id, $conn) {
    $query = "UPDATE newpets SET name=?, age=?, type=?, owner_id=? WHERE id=?";
    // Prepares the query to prevent SQL injections 
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssis", $_POST["name"], $_POST["age"], $_POST["type"], $_POST["owner_id"], $_POST["id"]);
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

?>
