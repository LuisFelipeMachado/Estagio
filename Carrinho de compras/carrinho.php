<?php
    require 'cart.php';
    require 'product.php';

    session_start();

$products = [
    1=> ['id' => 1,'name'=> 'Geladeira', 'price' => 1000, 'quantity' =>1],
    2=> ['id'=> 2,'name'=> 'mouse','price'=> 100,'quantity'=> 1],
    3=> ['id'=> 3,'name'=> 'teclado','price'=>200,'quantity'=> 1],
    4=> ['id'=> 4,'name'=> 'monitor','price'=>100,'quantity'=> 1],
];

if (isset($_GET['id'])) {
    $id = strip_tags($_GET['id']);
    $productsInfo = $products[$id];
    $product = new Product;
    $product->setId($productsInfo['id']);
    $product->setName($productsInfo['name']);
    $product->setPrice($productsInfo['price']);
    $product->setQuantity($productsInfo['quantity']);

    $cart = new Cart;
    $cart->add($product);
}

var_dump($_SESSION['cart'] ?? [] );

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
        <li>Geladeira <a href="?id=1">Add</a> R$ 1000</li>
        <li>Mouse <a href="?id=1">Add</a> R$ 2000</li>
        <li>Teclado <a href="?id=1">Add</a> R$ 200</li>
        <li>Monitor <a href="?id=1">Add</a> R$ 100</li>
    </ul>
</body>
</html>