<?php
include("flowers.php")
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- bootstrap -->
    <link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">
    <script defer src="assets/bootstrap/bootstrap.bundle.min.js"></script>

</head>

<body>
    <div class="container">

        <h1>Các loại hoa tuyệt đẹp thích hợp trồng để khoe hương sắc dịp xuân hè</h1>
        <br>
        <?php
        foreach ($flowers as $index => $flower) {
            echo '<div class="flower">';
            echo '<h5>' . $index + 1 . ". " . $flower['name'] . '</h5>' . '<br>';
            echo '<p>' . $flower['desc'] . '</p>' . '<br>';
            echo '<img src="' . $flower['path'] . '" alt="' . $flower['name'] . '">' . '<br>';
            echo '</div>' . '<br>';
        }
        ?>
    </div>

</body>

</html>