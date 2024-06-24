<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles/products.css">
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
    .product-heading
    {
        color: white;
    }
    .container h2 
    {
        color: burlywood;
    }
    .td-1
    {
        color: burlywood;
    }
    .td-2
    {
        color: whitesmoke;
    }

</style>
<body>
    <div class="container">
        <h2>Our Products</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="product-heading">Product</th>
                        <th class="product-heading">Description</th>
                        <th class="product-heading">Price</th>
                    </tr>
                </thead>
                <tbody class="table-body">
                    <tr>
                        <td class="td-1">T-shirt</td>
                        <td class="td-2">Comfortable cotton t-shirt with graphic print</td>
                        <td class="td-2">KES 4000</td>
                    </tr>
                    <tr>
                        <td class="td-1">Hoodie</td>
                        <td class="td-2">Warm hoodie with front pocket and drawstring hood</td>
                        <td class="td-2">KES 4000</td>
                    </tr>
                    <tr>
                        <td class="td-1">Crop Tops</td>
                        <td class="td-2">Warm hoodie with front pocket and drawstring hood</td>
                        <td class="td-2">KES 4000</td>
                    </tr>
                    <tr>
                        <td class="td-1">Biker shorts</td>
                        <td class="td-2">Warm hoodie with front pocket and drawstring hood</td>
                        <td class="td-2">KES 4000</td>
                    </tr>
                    <!-- Add more rows for additional products -->
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
