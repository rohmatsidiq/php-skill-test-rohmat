<?php
$data = json_decode(file_get_contents('php://input'), true);
$product_name = $_POST['product_name'];
$stock = $_POST['stock'];
$price = $_POST['price'];
$product = json_decode(file_get_contents('data.json'), true);
$product[] = ['id' => uniqid(), 'product_name' => $product_name, 'stock' => $stock, 'price' => $price];
file_put_contents('data.json', json_encode($product));
echo json_encode(['message' => 'Data created successfully']);
