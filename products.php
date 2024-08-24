<?php
error_reporting(E_ERROR);
session_start();
include_once 'helpar.php';
include 'nav.php';
$products = getAllProducts();

$total = 0;

if (isset($_POST['delete'])) {
    $num_product_of_cart = $_POST['num_product_of_cart'];
    foreach ($_SESSION['cart'] as $key => $subArray) {
        if ($subArray['id'] == $num_product_of_cart) {
            unset($_SESSION['cart'][$key]);
            break;
        }
    }
    $_SESSION['cart'] = array_values($_SESSION['cart']);


    foreach ($_SESSION['cart'] as $product) {
        $total += $product['price'];
    }
}


if (isset($_GET['pay'])) {
    unset($_SESSION['cart']);
}



if (isset($_POST['submit'])) {
    $num_product = $_POST['num_product'];
    $number = $_POST['number'];

    foreach ($products as $product) {
        if ($num_product == $product['id']) {
            $new_area = [
                'id' => $product['id'],
                'image' => $product['image'],
                'title' => $product['title'],
                'price' => $product['price'] * $number,
                'number' => $number,
            ];


            if ($_SESSION['cart'] === null) {
                $_SESSION['cart'] = [];
                if (isset($_SESSION['cart'])) {
                    array_push($_SESSION['cart'], $new_area);
                }
            } else {
                if (isset($_SESSION['cart'])) {
                    array_push($_SESSION['cart'], $new_area);
                }
            }

            foreach ($_SESSION['cart'] as $product) {
                $total += $product['price'];
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

    <div class="bg_products">
        <div class="main home d-flex justify-content-between flex-row">
            <div class="col-lg-8">
                <div class="main_card d-flex justify-content-between flex-row mb-3">
                    <?php foreach ($products as $product) : ?>
                        <div class="card">
                            <img src="<?= $product['image'] ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h6 class="card-title clamped-h">
                                    <?= $product['title'] ?>
                                </h6>
                                <div class="d-flex justify-content-between flex-row mb-2">
                                    <h4>$<?= $product['price'] ?></h4>
                                    <form action="details.php" method="post">
                                        <button class="btn btn-outline-info fw-bold" type="submit"
                                            name="submit_details">Details</button>
                                        <input type="number" class="d-none" name="num_product"
                                            value="<?= $product['id'] ?>">
                                    </form>
                                </div>
                                <form action="products.php" method="post" class="d-flex justify-content-between flex-row">
                                    <button class="btn btn-outline-success fw-bold" type="submit" name="submit">Add To
                                        Cart</button>
                                    <input type="number" class="d-none" name="num_product" value="<?= $product['id'] ?>">
                                    <div class="mt-1">
                                        <label for="<?= $product['id'] ?>" class="fw-bold text-dark">Count: </label>
                                        <input type="number" name="number" id="<?= $product['id'] ?>" value="1" min="1"
                                            style="width: 30px;">
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-lg-4 pt-1">
                <?php if (isset($_SESSION['cart'])) : ?>
                    <table class="table w-100 m-2 rounded-1">
                        <thead class="table-active">
                            <th>Product</th>
                            <th class="text-center">Title</th>
                            <th>Number</th>
                            <th>Price</th>
                            <th>Remove</th>
                        </thead>
                        <?php foreach ($_SESSION['cart'] as $product) : ?>
                            <tbody>
                                <tr>
                                    <td><img src="<?= $product['image'] ?>" alt="" style="height: 50px; width: 60px;"></td>
                                    <td class="text-center pt-2">
                                        <h6 class="clamped-h"><?= $product['title'] ?></h6>
                                    </td>
                                    <td class="text-center"><?= $product['number'] ?></td>
                                    <td><?= $product['price'] ?></td>
                                    <td class="text-center">
                                        <form action="products.php" method="post">
                                            <button class="btn btn-danger btn-sm fw-bold" type="submit" name="delete">X</button>
                                            <input type="number" class="d-none" name="num_product_of_cart"
                                                value="<?= $product['id'] ?>">
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <th colspan="3" class="table-active">Total:</th>
                                <th colspan="2" class="text-center"><?= $total ?></th>
                            </tr>
                            </tbody>
                    </table>
                    <form action="products.php" method="get">
                        <div class="btn-login d-flex justify-content-center">
                            <button class="btn btn-success mt-3 rounded-5 fw-bold" type="submit" name="pay">Pay</button>
                        </div>
                    </form>
                <?php else : ?>
                    <table class="table w-100 m-2 rounded-top">
                        <thead>
                            <th>Product</th>
                            <th>Number</th>
                            <th>Price</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th colspan="2" class="table-active">Total:</th>
                                <th><?= $total ?></th>
                            </tr>
                        </tbody>
                    </table>
                <?php endif; ?>

            </div>
        </div>
    </div>
    <?php include 'footer.html' ?>
</body>

</html>