<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Listing</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./styles/shop.css">
</head>
<style>
    .btn {
        background-color: black;
        color: white;
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
            <div class="col-md-4">
                <!-- Product 1 -->
                <img src="./images/basquait.png" alt="Product Image" class="product-img img-fluid">
                <div class="container-fluid">
                    <div class="product-details">
                        <h3>BASQUIAT</h3>
                        <p>A vibrant masterpiece inspired by the iconic artist.</p>
                        <p>Price: KES 10,000</p>
                        <form action="cart.php" method="POST">
                            <input type="hidden" name="product_id" value="1">
                            <input type="hidden" name="product_name" value="BASQUIAT">
                            <input type="number" name="quantity" value="1" min="1">
                            <button type="submit" class="btn">Add to Cart</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <!-- Product 2 -->
                <img src="./images/waffles.png" alt="Product Image" class="product-img img-fluid">
                <div class="container-fluid">
                    <div class="product-details">
                        <h3>Waffles</h3>
                        <p>Fluffy, golden-brown waffles for any time of day.</p>
                        <p>Price: KES 10000</p>
                        <form action="cart.php" method="POST">
                            <input type="hidden" name="product_id" value="2">
                            <input type="hidden" name="product_name" value="WAFFLES">
                            <input type="number" name="quantity" value="1" min="1">
                            <button type="submit" class="btn">Add to Cart</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <!-- Product 3 -->
                <img src="./images/suki-baby.png" alt="Product Image" class="product-img img-fluid">
                <div class="container-fluid">
                    <div class="product-details">
                        <h3>Her Loss</h3>
                        <p>A poignant portrayal of heartbreak and resilience.</p>
                        <p>Price: KES 10000</p>
                        <form action="cart.php" method="POST">
                            <input type="hidden" name="product_id" value="3">
                            <input type="hidden" name="product_name" value="HER LOSS">
                            <input type="number" name="quantity" value="1" min="1">
                            <button type="submit" class="btn">Add to Cart</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <!-- Product 4 -->
                <img src="./images/tyler.png" alt="Product Image" class="product-img img-fluid">
                <div class="container-fluid">
                    <div class="product-details">
                        <h3>IGOR</h3>
                        <p>A revolutionary musical journey by Tyler, the Creator.</p>
                        <p>Price: KES 10000</p>
                        <form action="cart.php" method="POST">
                            <input type="hidden" name="product_id" value="4">
                            <input type="hidden" name="product_name" value="IGOR">
                            <input type="number" name="quantity" value="1" min="1">
                            <button type="submit" class="btn">Add to Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
