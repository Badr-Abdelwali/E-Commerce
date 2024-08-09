<?php
include_once 'helpar.php';
// include 'nav.php';


if (isset($_POST['submit'])) {
    $arr = [
        'username' => $_POST['username'],
        'email' => $_POST['email'],
        'password' => $_POST['password'],
    ];

    addUsers($arr);

    header('location: home.php');
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
                <label for="email">Email</label>
                <br><input type="email" name="email" id="email" require> <br>
                <label for="pas">Password</label>
                <br><input type="password" name="password" id="pas"> <br>
                <div class="btn-login d-flex justify-content-center">

                    <button class="btn btn-primary mt-3 rounded-5" type="submit" name="submit">Signup</button>
                </div>
                <div class="btn-login d-flex justify-content-center">
                    <button class="btn btn-warning mt-3 rounded-5"><a class="nav-link" href="login.php">Login</a></button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>