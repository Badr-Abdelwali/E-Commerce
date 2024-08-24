<?php
error_reporting(E_ERROR);
include_once 'helpar.php';
session_start();

$error = [];


if (isset($_POST['submit'])) {

    // if (!isset($_POST['username']) || empty($_POST['username'])) {
    //     $error['username'] = "Username required";
    // }


    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $error['email'] = "email is not validate";
    }

    if (!isset($_POST['email']) || empty($_POST['email'])) {
        $error['email'] = "Email required";
    }

    if (empty($_POST['password'])) {
        $error['password'] = "Password requerd";
    }

    if (empty($error)) {

        // $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $usersData = getAllUsers();

        foreach ($usersData as $user) {
            if ($email == $user['email'] &&  $password ==  $user['password']) {
                $_SESSION['username'] = $username;
                header('location: home.php');
            } else {
                echo "Error";
                break;
            }
        }
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
        <form action="login.php" method="post">
            <div class="logo d-flex justify-content-center mb-5">
                <img src="./lib/imges/logo.jpg" alt="logo" class="rounded-circle" />
                <h4>
                    Store
                </h4>
            </div>
            <div class="container-fluid ">

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


                <div class="btn-login d-flex justify-content-center">

                    <button class="btn btn-primary mt-3 rounded-5" type="submit" name="submit">Login</button>
                </div>
                <div class="btn-login d-flex justify-content-center mt-5">
                    <button class="btn btn-warning mt-3 rounded-5"><a class="nav-link"
                            href="signup.php">Signup</a></button>
                </div>
            </div>
        </form>
    </div>
</body>

</html>