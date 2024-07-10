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

// Function to remove a product from the cart
function removeFromCart($userId, $productId) {
    global $conn;

    $sql = "DELETE FROM carts WHERE user_id = ? AND product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $userId, $productId);
    $stmt->execute();
    $stmt->close();
}

// Handle the remove from cart action
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'delete' && isset($_POST['product_id'])) {
    $userId = $_SESSION['user_id']; // Assuming you have stored user ID in the session
    $productId = $_POST['product_id'];
    removeFromCart($userId, $productId);
}

// Retrieve cart items for the logged-in user
$userId = $_SESSION['user_id']; // Assuming you have stored user ID in the session
$sql = "
    SELECT users.name AS user_name, products.name AS product_name, carts.quantity, products.id AS product_id 
    FROM carts 
    JOIN products ON carts.product_id = products.id 
    JOIN users ON carts.user_id = users.id 
    WHERE carts.user_id = ?
";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$stmt->bind_result($userName, $productName, $quantity, $productId);
$cartItems = [];
while ($stmt->fetch()) {
    $cartItems[] = ['user_name' => $userName, 'product_name' => $productName, 'quantity' => $quantity, 'product_id' => $productId];
}
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Cart</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #000;
            color: #fff;
        }
        .btn-primary {
            background-color: #bc6c25 !important;
            border-color: #bc6c25 !important;
        }
        .btn-primary:hover {
            background-color: #8e5217 !important;
            border-color: #8e5217 !important;
        }
        table {
            color: #fff !important;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>User: <?php echo htmlspecialchars($userName); ?></h2>
        <?php if (empty($cartItems)): ?>
            <p>Your cart is empty.</p>
        <?php else: ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cartItems as $item): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($item['product_name']); ?></td>
                            <td><?php echo htmlspecialchars($item['quantity']); ?></td>
                            <td>
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($item['product_id']); ?>">
                                    <button type="submit" class="btn btn-danger">Remove</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
        <a href="shop.php" class="btn btn-primary">Continue Shopping</a>
    </div>
</body>
</html>





