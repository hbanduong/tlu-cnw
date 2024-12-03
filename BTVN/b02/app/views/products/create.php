<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- bootstrap -->
    <link rel="stylesheet" href="../../../assets/bootstrap/bootstrap.min.css">
    <script defer src="../../../assets/bootstrap/bootstrap.bundle.min.js"></script>

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <!-- <link rel="stylesheet" href="assets/fontawesome/all.min.css"> -->
</head>

<body>

    <div class="container">
        <h1 class="text-center mb-4">Thêm sản phẩm</h1>
        <form action="index.php?cotroller=product&action=create" method="POST" class="form">
            <div class="mb-3">
                <label for="name" class="form-label">Tiêu đề</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Giá</label>
                <input type="number" name="price" id="price" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Lưu</button>
            <a href="index.php" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
</body>

</html>