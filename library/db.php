<?php

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

function delete_pet($id, $conn) {
    $query = "DELETE FROM pets WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $_GET["id"]);
    $stmt->execute();
}

function add_pet($conn) {
    $query = "INSERT INTO pets (name, age, type) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $_POST["name"], $_POST["age"], $_POST["type"]);
    $stmt->execute();
}

function edit_pet($id, $conn) {
    $query = "UPDATE pets SET name=?, age=?, type=? WHERE id=?";
    // Prepares the query to prevent SQL injections 
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssss", $_POST["name"], $_POST["age"], $_POST["type"], $_POST["id"]);
    $stmt->execute();
}

?>
