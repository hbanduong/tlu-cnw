<?php
// Define the path to the JSON file
define('PRODUCTS_FILE', 'products.json');

// Function to load products from the file
function loadProducts()
{
    if (file_exists(PRODUCTS_FILE)) {
        $jsonData = file_get_contents(PRODUCTS_FILE);
        return json_decode($jsonData, true); // Decode JSON to PHP array
    }
    return []; // If file doesn't exist, return empty array
}

// Function to save products to the file
function saveProducts($products)
{
    $jsonData = json_encode($products, JSON_PRETTY_PRINT); // Encode array to JSON format
    file_put_contents(PRODUCTS_FILE, $jsonData); // Save JSON data to the file
}

// Load products initially
$products = loadProducts();
