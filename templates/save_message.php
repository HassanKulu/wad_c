<?php
// save_message.php

session_start();

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

    // Get the user ID from the session
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];

        // Prepare an SQL statement to insert the message
        $stmt = $conn->prepare("INSERT INTO messages (subject, message, user_id) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $subject, $message, $user_id);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Message saved successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement and connection
        $stmt->close();
    } else {
        echo "Error: User not logged in.";
    }

    $conn->close();
}
?>



