<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<div class="alert alert-danger" role="alert">Invalid email format!</div>';
    } elseif (!isEmailDomainValid($email)) {
        echo '<div class="alert alert-danger" role="alert">Invalid email domain!</div>';
    } elseif ($password != $confirmPassword) {
        echo '<div class="alert alert-danger" role="alert">Passwords do not match!</div>';
    } else {
        // Check if email already exists
        $emailCheckSql = "SELECT * FROM users WHERE email = ?";
        $emailCheckStmt = $conn->prepare($emailCheckSql);
        $emailCheckStmt->bind_param("s", $email);
        $emailCheckStmt->execute();
        $result = $emailCheckStmt->get_result();

        if ($result->num_rows > 0) {
            echo '<div class="alert alert-danger" role="alert">Email already exists!</div>';
        } else {
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Prepare and execute SQL statement to insert into 'users' table
            $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $name, $email, $hashed_password);

            if ($stmt->execute()) {
                // Redirect to another page upon successful registration
                header("Location: login.php");
                exit();
            } else {
                echo '<div class="alert alert-danger" role="alert">Error: ' . $conn->error . '</div>';
            }

            $stmt->close();
        }

        $emailCheckStmt->close();
    }

    $conn->close();
}

function isEmailDomainValid($email) {
    $domain = substr(strrchr($email, "@"), 1);
    return checkdnsrr($domain, "MX");
}
?>
