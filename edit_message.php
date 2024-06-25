<?php
// Include database connection
require_once("includes/db_connect.php");

// Initialize $spot_msg_row to an empty array initially
$spot_msg_row = [];

// Check if id is set in the URL
if (isset($_GET["id"])) {
    $id = mysqli_real_escape_string($conn, $_GET["id"]);

    // Select message details based on id
    $spot_msg = "SELECT * FROM `messages` WHERE id = '$id' LIMIT 1";
    $spot_msg_res = $conn->query($spot_msg);

    if ($spot_msg_res && $spot_msg_res->num_rows > 0) {
        $spot_msg_row = $spot_msg_res->fetch_assoc();
    } else {
        echo "Message not found.";
    }
} else {
    echo "Message ID not provided.";
}

// Handle form submission for message update
if(isset($_POST["update_message"])){
    $subject = mysqli_real_escape_string($conn, $_POST["subject"]);
    $message = mysqli_real_escape_string($conn, $_POST["message"]);
    $id = mysqli_real_escape_string($conn, $_POST["id"]);

    // Update query
    $update_message = "UPDATE `messages` SET subject = '$subject', message = '$message' WHERE id = '$id' LIMIT 1";

    if ($conn->query($update_message) === TRUE) {
        header("Location: view_messages.php");
        exit();
    } else {
        echo "Error updating message: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Message</title>
    <link rel="stylesheet" href="./styles/products.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: black;
            color: white;
        }
        .container {
            margin-top: 50px;
        }
        .product-heading {
            color: white;
        }
        .container h2 {
            color: burlywood;
        }
        .td-1 {
            color: burlywood;
        }
        .td-2 {
            color: whitesmoke;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Update Message</h1>
        </div>
        <div class="row">
            <div class="content">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="contact_form">
                    <label for="sb">Subject:</label><br>
                    <input type="text" name="subject" id="sb" placeholder="Subject" required value="<?php echo isset($spot_msg_row["subject"]) ? htmlspecialchars($spot_msg_row["subject"]) : ''; ?>"><br><br>

                    <label for="ms">Message:</label><br>
                    <textarea cols="30" rows="7" name="message" id="ms" required><?php echo isset($spot_msg_row["message"]) ? htmlspecialchars($spot_msg_row["message"]) : ''; ?></textarea><br><br>

                    <input type="submit" name="update_message" value="Update Message">
                    <input type="hidden" name="id" value="<?php echo isset($spot_msg_row["id"]) ? htmlspecialchars($spot_msg_row["id"]) : ''; ?>">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
