<?php

// Create connection
function database() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "neo_total_basic";
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

?>