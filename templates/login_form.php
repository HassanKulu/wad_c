<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <!-- Add Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        background-color: black;
        color: white;
    }
    .form-container {
        margin-top: 50px;
    }
    .form-container h2
    {
        color: burlywood;
    }
    .btn
    {
        background-color: burlywood;
    }
    </style>
</head>
<body>
    <div class="container form-container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2>Login</h2>
                <form>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn">Login</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Add Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>