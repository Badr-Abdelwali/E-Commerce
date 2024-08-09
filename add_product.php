<?php
include_once 'helpar.php';

if (isset($_POST['submit'])) {
    $new_product = [
        'id' => $_POST['number'],
        'title' => $_POST['title'],
        'image' => $_POST['url'],
        'description' => $_POST['description'],
        'price' => $_POST['price'],
        'category' => $_POST['category'],
        'rating' => ['rate' => $_POST['rate'], 'count' => $_POST['count']],
    ];

    addProduct($new_product);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>

<body>
    <div class="bg_products">

        <div class="containre d-flex justify-content-between">
            <form action="add_product.php" method="post">
                <table>
                    <tr>
                        <th><label for="num_id">id:</label></th>
                        <td> <input type="number" name="number" id="num_id"><br></td>
                    </tr>
                    <tr>
                        <th><label for="title">Title:</label></th>
                        <td> <input type="text" name="title" id="title"><br></td>
                    </tr>
                    <tr>
                        <th><label for="url">Url_image:</label></th>
                        <td> <input type="text" name="url" id="url"><br></td>
                    </tr>
                    <tr>
                        <th><label for="description">Description:</label></th>
                        <td> <input type="text" name="description" id="description"><br></td>
                    </tr>
                    <tr>
                        <th><label for="price">Price:</label></th>
                        <td> <input type="number" name="price" id="price" min="0"><br></td>
                    </tr>
                    <tr>
                        <th><label for="category">Category:</label></th>
                        <td> <input type="text" name="category" id="category"><br></td>
                    </tr>
                    <tr>
                        <th><label for="rate">Rate:</label></th>
                        <td> <input type="number" name="rate" id="rate"><br></td>
                    </tr>
                    <tr>
                        <th><label for="count">Count:</label></th>
                        <td> <input type="number" name="count" id="count"><br></td>
                    </tr>

                </table>

                <button type="submit" name="submit" class="btn btn-primary fw-bold">Add</button>
            </form>
        </div>
    </div>
</body>

</html>