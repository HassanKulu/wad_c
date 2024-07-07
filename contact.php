<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles/story.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    body {
        background-color: black;
        color: white; 
    }
    .container {
        margin-top: 50px;
    }
</style>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav mr-auto">
                    <a class="nav-link" href="home.php">Home</a>
                    <a class="nav-link" href="products.php">Products</a>
                    <a class="nav-link" href="contact.php">Contact</a>
                    <a class="nav-link" href="story.php">Our story</a>
                </div>
                <div class="navbar-nav">
                    <a class="nav-link" href="view_cart.php">
                        <i class="fas fa-shopping-cart"></i> Cart
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container">
        <form method="post" action="./templates/save_message.php">
            <div class="form-group">
                <label for="exampleFormControlInput2">Subject</label>
                <input type="text" class="form-control" id="exampleFormControlInput2" name="subject" placeholder="Subject" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Message</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="message" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-outline-secondary">Submit</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


