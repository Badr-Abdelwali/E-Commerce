<?php

function getAllUsers()
{
    $users = file_get_contents('./db/db_users.json');
    $users = json_decode($users, true);
    return $users;
}

function addUsers($newUsers)
{
    $users = getAllUsers();
    array_push($users, $newUsers);
    $newUsersAjson = json_encode($users);
    file_put_contents('./db/db_users.json', $newUsersAjson);
}

function getAllProducts()
{
    $products = file_get_contents('./db/products.json');
    $products = json_decode($products, true);
    return $products;
}

function deleteProduct($num_product)
{
    $products = getAllProducts();

    $productIndex = array_search($num_product, array_column($products, 'id'));

    array_splice($products, $productIndex, 1);
    $newProductAjson = json_encode($products);
    file_put_contents('./db/products.json', $newProductAjson);
}

function addProduct($newProduct)
{
    $Products = getAllProducts();
    array_push($Products, $newProduct);
    $newProductAjson = json_encode($Products);
    file_put_contents('./db/products.json', $newProductAjson);
}
