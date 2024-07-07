<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        background-color: black;
        color: white;
    }
    .form-container {
        margin-top: 50px;
    }
    .form-container h2 {
        color: burlywood;
    }
    .btn {
        background-color: burlywood;
    }
    </style>
</head>
<body>
    <div class="container form-container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2>Login</h2>
                <?php
                // Process the form submission
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
                    $email = $_POST['email'];
                    $password = $_POST['password'];

                    // Prepare and execute SQL statement to select from 'users' table
                    $sql = "SELECT password FROM users WHERE email = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("s", $email);
                    $stmt->execute();
                    $stmt->bind_result($hashed_password);
                    $stmt->fetch();

                    if ($hashed_password && password_verify($password, $hashed_password)) {
                        // Login successful, set session and redirect to another page
                        $_SESSION['loggedin'] = true;
                        header("Location: home.php");
                        exit();
                    } else {
                        echo '<div class="alert alert-danger" role="alert">Invalid email or password!</div>';
                    }

                    $stmt->close();
                    $conn->close();
                }
                ?>

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


