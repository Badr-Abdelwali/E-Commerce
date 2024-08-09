<?php
error_reporting(E_ERROR);
session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <?php if (!($_SESSION['username'] === "admin")) : ?>
    <?php include 'nav.php' ?>
    <?php include 'hero.html' ?>
    <?php include 'footer.html' ?>
    <?php else : ?>
    <?php include 'nav_of_admin.php' ?>
    <?php include 'hero.html' ?>
    <?php include 'footer.html' ?>
    <?php endif; ?>
</body>

</html>