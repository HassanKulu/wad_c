<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "AllahuAkbar99#";
$dbname = "wad_c";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to add a product to the cart
function addToCart($userId, $productId, $quantity) {
    global $conn;

    // Check if the product is already in the user's cart
    $sql = "SELECT quantity FROM carts WHERE user_id = ? AND product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $userId, $productId);
    $stmt->execute();
    $stmt->bind_result($existingQuantity);
    $stmt->fetch();
    $stmt->close();

    if ($existingQuantity) {
        // Update quantity if the product is already in the cart
        $newQuantity = $existingQuantity + $quantity;
        $sql = "UPDATE carts SET quantity = ? WHERE user_id = ? AND product_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iii", $newQuantity, $userId, $productId);
        $stmt->execute();
        $stmt->close();
    } else {
        // Insert new product into the cart
        $sql = "INSERT INTO carts (user_id, product_id, quantity) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iii", $userId, $productId, $quantity);
        $stmt->execute();
        $stmt->close();
    }
}

// Handle the add to cart action
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id']) && isset($_POST['quantity'])) {
    $userId = $_SESSION['user_id']; // Assuming you have stored user ID in the session
    $productId = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    addToCart($userId, $productId, $quantity);
    header('Location: view_cart.php'); // Redirect to avoid form resubmission
    exit();
}
?>
