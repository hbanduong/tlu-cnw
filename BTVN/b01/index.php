<?php
include('data.php');
include('crud.php');
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

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <!-- <link rel="stylesheet" href="assets/fontawesome/all.min.css"> -->
</head>

<body>
    <!-- navigation bar -->
    <?php
    include('includes/header.php');
    ?>

    <!-- page content -->
    <div class="container">
        <!-- <button class="button mb-3 rounded bg-green text-bg-success px-2 py-1 border border-none">Thêm mới</button> -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Giá thành</th>
                    <th>Sửa</th>
                    <th>Xoá</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($products as $index => $product) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($product['name']) . "</td>";
                    echo "<td>" . htmlspecialchars($product['price']) . " VND</td>";
                    echo "<td><a href='?update-id=" . $index . "' class='border border-none'><i class='fa-solid fa-pen-to-square'></i></a></td>";
                    echo "<td><a href='?delete-id=" . $index . "' class='border border-none'><i class='fa-solid fa-trash'></i></a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <!-- form add product -->
        <form method="POST" action="">
            <div class="mb-3">
                <label for="" class="form-label">Sản phẩm</label>
                <input type="text" class="form-control" name="product-name" required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Giá thành</label>
                <input type="number" class="form-control" name="product-price" required min="0">
            </div>
            <!-- <button type="submit" class="btn btn-primary">Thêm</button> -->

            <!-- Hidden input to store the product ID for update -->
            <?php if ($editProduct) { ?>
                <input type="hidden" name="update-id" value="<?php echo $editIndex; ?>">
            <?php } ?>

            <button type="submit" class="btn btn-primary"><?php echo $editProduct ? 'Cập nhật' : 'Thêm'; ?></button>
        </form>

    </div>

    <!-- footer -->
    <?php
    include('includes/footer.php');
    ?>

</body>

</html>