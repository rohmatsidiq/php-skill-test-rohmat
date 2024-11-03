<?php
$id = $_POST['id'];
$product_name = $_POST['product_name'];
$stock = $_POST['stock'];
$price = $_POST['price'];
$products = json_decode(file_get_contents('data.json'), true);

foreach ($products as &$product) {
    if ($product['id'] === $id) {
        $product['product_name'] = $product_name;
        $product['stock'] = $stock;
        $product['price'] = $price;
        break;
    }
}

file_put_contents('data.json', json_encode($products));
echo json_encode(['message' => 'Data updated successfully']);
