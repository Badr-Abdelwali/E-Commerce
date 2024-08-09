<?php
include_once 'helpar.php';

$products = getAllProducts();


if (isset($_POST['submit'])) {
    $num_product = $_POST['num_product'];

    deleteProduct($num_product);
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
            <div class="main_card d-flex justify-content-between flex-row mb-3">
                <?php foreach ($products as $product) : ?>
                <div class="card_of_admin card">
                    <img src="<?= $product['image'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h6 class="card-title clamped-h">
                            <?= $product['title'] ?>
                        </h6>
                        <p class="card-text clamped-text opacity-75">
                            <?= $product['description'] ?>
                        </p>
                        <h4>$<?= $product['price'] ?></h4>
                        <form action="home.php" method="post">
                            <button class="btn btn-danger fw-bold" type="submit" name="submit">Delete</button>
                            <input type="number" class="d-none" name="num_product" value="<?= $product['id'] ?>">
                        </form>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

</body>

</html>