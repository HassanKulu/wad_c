<?php
// save_message.php

// Database connection settings
$servername = "localhost";
$username = "root";
$password = "AllahuAkbar99#";
$dbname = "wad_c";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $subject = !empty($_POST['subject']) ? $_POST['subject'] : NULL;
    $message = $_POST['message'];

    // Prepare an SQL statement to insert the message
    $stmt = $conn->prepare("INSERT INTO messages (subject, message) VALUES (?, ?)");
    $stmt->bind_param("ss", $subject, $message);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Message saved successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>


