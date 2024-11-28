<?php

// Add new product or update product
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productName = isset($_POST['product-name']) ? trim($_POST['product-name']) : '';
    $productPrice = isset($_POST['product-price']) ? trim($_POST['product-price']) : '';

    if ($productName && is_numeric($productPrice) && $productPrice > 0) {
        if (isset($_POST['update-id']) && is_numeric($_POST['update-id'])) {
            // Update existing product
            $updateIndex = $_POST['update-id'];
            $products[$updateIndex] = [
                "name" => $productName,
                "price" => $productPrice
            ];
        } else {
            // Add new product
            $products[] = [
                "name" => $productName,
                "price" => $productPrice
            ];
        }

        saveProducts($products);

        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

// Delete action
if (isset($_GET['delete-id']) && is_numeric($_GET['delete-id'])) {
    $deleteIndex = $_GET['delete-id'];

    if (isset($products[$deleteIndex])) {
        unset($products[$deleteIndex]);

        // Re-index the array after deletion
        $products = array_values($products);

        saveProducts($products);

        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

// Update action
$editProduct = null;
if (isset($_GET['update-id']) && is_numeric($_GET['update-id'])) {
    $editIndex = $_GET['update-id'];
    if (isset($products[$editIndex])) {
        $editProduct = $products[$editIndex];
    }
}
