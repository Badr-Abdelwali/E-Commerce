<?php
error_reporting(E_ERROR);
session_start();
include_once 'helpar.php';
include 'nav.php';
$products = getAllProducts();


if (isset($_POST['submit_details'])) {
    $num_product = $_POST['num_product'];
    foreach ($products as $product) {
        if ($num_product == $product['id']) {
            $new_area = [
                'id' => $product['id'],
                'image' => $product['image'],
                'title' => $product['title'],
                'price' => $product['price'],
                'description' => $product['description'],
                'brand' => $product['brand'],
                'model' => $product['model'],
                'color' => $product['color'],
                'category' => $product['category'],
            ];


            $_SESSION['product_details'] = [];
            if (isset($_SESSION['product_details'])) {
                array_push($_SESSION['product_details'], $new_area);
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
    <title>Details</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <div class="bg_products d-flex justify-content-center pt-5 pb-5 vh-100">
        <div class="container d-flex justify-content-between">
            <?php foreach ($_SESSION['product_details'] as $product): ?>
            <div class="image w-50">
                <img src="<?= $product['image'] ?>" class="w-75 pb-2" alt="">
            </div>
            <div class="text w-50">
                <h4 class="fw-bold clamped-text pb-3"><?= $product['title'] ?></h4>
                <p class="clamped-text-details text-center fst-normal pb-2"><?= $product['description'] ?></p>
                <h1 class="pb-2"><?= "$" . $product['price'] ?></h1>
                <h4><?= "brand : " . $product['brand'] ?></h4>
                <h4><?= "model : " . $product['model'] ?></h4>
                <h4><?= "category : " . $product['category'] ?></h4>
                <h4><?= "color : " . $product['color'] ?></h4>
            </div>
            <?php endforeach ?>
        </div>
    </div>
    <?php include 'footer.html' ?>
</body>

</html>