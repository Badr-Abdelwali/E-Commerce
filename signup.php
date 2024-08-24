<?php
error_reporting(E_ERROR);
include_once 'helpar.php';

$error = [];

if (isset($_POST['submit'])) {

    if (!isset($_POST['username']) || empty($_POST['username'])) {
        $error['username'] = "Username requerd";
    }


    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $error['email'] = "email is not validate";
    }

    if (!isset($_POST['email']) || empty($_POST['email'])) {
        $error['email'] = "Email requerd";
    }

    if (empty($_POST['password'] && $_POST['password2'])) {
        $error['password'] = "Password requerd";
    }

    if ($_POST['password'] !== $_POST['password2']) {
        $error['password'] = "The password is incorrect";
    }

    if (empty($error)) {

        $arr = [
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
        ];

        addUsers($arr);

        header('location: home.php');
    }
}



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
    <div class="bg_login d-flex justify-content-center align-items-center">

        <form action="signup.php" method="post">
            <div class="logo d-flex justify-content-center mb-5">
                <img src="./lib/imges/logo.jpg" alt="logo" class="rounded-circle" />
                <h4>
                    Store
                </h4>
            </div>
            <div class="container-fluid ">

                <label for="username">Username</label>
                <br><input type="text" name="username" id="username"> <br>
                <?php if (isset($error['username'])) : ?>
                <div class="bg-danger text-white p-1">
                    <?= "Error : " . $error['username'] ?> <br>
                </div>
                <?php endif; ?>

                <label for="email">Email</label>
                <br><input type="email" name="email" id="email" require> <br>
                <?php if (isset($error['email'])) : ?>
                <div class="bg-danger text-white p-1">
                    <?= "Error : " . $error['email'] ?> <br>
                </div>
                <?php endif; ?>

                <label for="pas">Password</label>
                <br><input type="password" name="password" id="pas"> <br>
                <?php if (isset($error['password'])) : ?>
                <div class="bg-danger text-white p-1">
                    <?= "Error : " . $error['password'] ?> <br>
                </div>
                <?php endif; ?>

                <label for="pas">Confirm Password</label>
                <br><input type="password" name="password2" id="pas"> <br>
                <?php if (isset($error['password'])) : ?>
                <div class="bg-danger text-white p-1">
                    <?= "Error : " . $error['password'] ?> <br>
                </div>
                <?php endif; ?>

                <div class="btn-login d-flex justify-content-center pt-5">

                    <button class="btn btn-primary mt-3 rounded-5" type="submit" name="submit">Signup</button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>