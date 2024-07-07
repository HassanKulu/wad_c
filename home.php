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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./styles/index.css">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
        }
        .background-video {
            position: fixed;
            top: 50%;
            left: 50%;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transform: translate(-50%, -50%);
            z-index: -1;
        }
        .header {
            position: relative;
            z-index: 1;
        }
    </style>
</head>
<body>
    <video autoplay muted loop class="background-video">
        <source src="https://res.cloudinary.com/dyl7sjlyv/video/upload/v1718857831/Snapinsta.app_video_C449EFEAA0B848C5AA51076D4F632FA4_video_dashinit_tgf7hm.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <?php include './templates/index_nav.php'; ?>
    <div class="header">
        <img src="./images/logo.png" alt="logo" style="max-width: 100px; height: auto;">
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

