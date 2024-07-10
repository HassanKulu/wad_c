<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
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
    <?php
session_start();
// Database connection
require_once('./includes/db_connect.php');

// Handle message deletion
if (isset($_GET["DelId"])) {
    $DelId = mysqli_real_escape_string($conn, $_GET["DelId"]);

    // SQL to delete a record
    $del_msg = "DELETE FROM messages WHERE id='$DelId' LIMIT 1";

    if ($conn->query($del_msg) === TRUE) {
        header("Location: view_messages.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Fetch and display messages
$select_msg = "SELECT messages.*, users.name AS sender_name FROM messages LEFT JOIN users ON messages.user_id = users.id ORDER BY messages.created_at DESC";
$sel_msg_res = $conn->query($select_msg);
$cm = 0;

if ($sel_msg_res->num_rows > 0) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Messages</title>
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
            <div class="row">
                <div class="content">
                    <h1>Messages</h1>
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Time</th>
                                <th>Sender</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // output data of each row
                            while ($sel_msg_row = $sel_msg_res->fetch_assoc()) {
                                $cm++;
                                ?>
                                <tr>
                                    <td><?php echo $cm; ?>.</td>
                                    <td><?php echo $sel_msg_row["subject"]; ?></td>
                                    <td><?php echo '<strong>' . $sel_msg_row["subject"] . '</strong> - ' . substr($sel_msg_row["message"], 0, 25) . '...'; ?></td>
                                    <td><?php echo date("d-M-Y H:i", strtotime($sel_msg_row["created_at"])); ?></td>
                                    <td><?php echo $sel_msg_row["sender_name"]; ?></td>
                                    <td>
                                        [ <a href="edit_message.php?id=<?php echo $sel_msg_row["id"]; ?>">Edit</a> ] 
                                        [ <a href="?DelId=<?php echo $sel_msg_row["id"]; ?>">Del</a> ]
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>SN</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Time</th>
                                <th>Sender</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
    </html>
    <?php
} else {
    echo "<div class='row'><div class='content'><h1>Messages</h1><p>No messages found.</p></div></div>";
}
?>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
