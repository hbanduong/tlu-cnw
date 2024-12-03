<?php

require_once '../app/models/Product.php';

class ProductController
{
    private $productModel;

    public function __construct()
    {
        $this->productModel = new Product();
    }

    // Index action to list products
    public function index()
    {
        $products = $this->productModel->getAllProducts();
        //include __DIR__ . '/../views/products/index.php';

        // Start buffering output to capture content
        ob_start();
        // Include the products index view
        require '../app/views/products/index.php';
        // Get the content from the buffer and store it in the $content variable
        $content = ob_get_clean();
        require '../app/views/layout.php';
    }

    // Add a new product
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['name'], $_POST['price']) && !empty($_POST['name']) && !empty($_POST['price'])) {
                $name = $_POST['name'];
                $price = $_POST['price'];
                $this->productModel->addProduct($name, $price);
                header('Location: index.php?controller=product&action=index');
                exit(); // It's important to call exit after a header redirect
            } else {
                echo 'Please provide both name and price.';
            }
        } else {
            ob_start();
            require '../app/views/products/create.php';
            $content = ob_get_clean();
            require '../app/views/layout.php';
        }
    }


    // Edit a product
    public function edit()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $product = $this->productModel->getProductById($id);

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['name'], $_POST['price']) && !empty($_POST['name']) && !empty($_POST['price'])) {
                    $name = $_POST['name'];
                    $price = $_POST['price'];
                    $this->productModel->updateProduct($id, $name, $price);
                    header('Location: index.php?controller=product&action=index');
                    exit();
                } else {
                    echo 'Please provide both name and price.';
                }
            } else {
                ob_start();
                require '../app/views/products/edit.php';
                $content = ob_get_clean();
                require '../app/views/layout.php';
            }
        }
    }


    // Delete a product
    public function delete()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->productModel->deleteProduct($id);
            header('Location: index.php?controller=product&action=index');
            exit();
        }
    }
}
