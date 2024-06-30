<?php
    $conn = new mysqli("localhost", "root", "", "portal");
    if ($conn->connect_error) {
    exit("Connection failed: " . $conn->connect_error);
    }
?>