<?php
$data = json_decode(file_get_contents('php://input'), true);
$id = $data['id'];
$products = json_decode(file_get_contents('data.json'), true);

// Filter produk untuk menghapus data dengan ID yang sesuai
$products = array_filter($products, function($product) use ($id) {
    return $product['id'] !== $id;
});

// Reindeks array agar tetap berbentuk array numerik saat dikonversi ke JSON
$products = array_values($products);

file_put_contents('data.json', json_encode($products));
echo json_encode(['message' => 'Data deleted successfully']);
