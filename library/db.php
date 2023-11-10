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

// adds an owner to the db
function add_owner($conn) {
    $query = "INSERT INTO owners (owner_name, email, phone) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $_POST["owner_name"], $_POST["email"], $_POST["phone"]);
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

// finds a pet from the database 
function find_pet($search, $conn) {
    $query = "SELECT * FROM pets WHERE name LIKE ?";
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
