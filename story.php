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
    h1 
    {
        color: #dda15e;
    }
</style>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark ">
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
        <div class="row">
            <div class="col-md-6">
                <img src="./images/story2.jpg" alt="Image Description" width="400">
            </div>
            <div class="col-md-6">
                <h1 id="h1">FOR THE CREATORS OF CULTURE</h1>
                <p id="story-paragraph">Threads Uniting Culture, a boutique with a mission: "For the creators of culture." Led by designer Maya, it's a hub where fashion meets artistry. Every stitch tells a story—celebrating diversity, embracing uniqueness. In a world of conformity, it's a reminder: our differences are our strength.</p>
                <p>In this sanctuary of creativity, Maya's designs continued to captivate and inspire. Each garment that adorned the racks of Threads Uniting Culture was a testament to her unwavering commitment to celebrating the vibrant tapestry of the world. Artists and cultural influencers flocked to the boutique, drawn by the allure of clothing that not only reflected their identity but also empowered them to boldly express themselves. As Maya's vision spread, Threads Uniting Culture became more than just a brand—it became a movement, igniting a spark of creativity in every individual who walked through its doors.</p>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


