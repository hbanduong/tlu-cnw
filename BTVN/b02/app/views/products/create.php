<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- bootstrap -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script> -->

    <link rel="stylesheet" href="../../assets/bootstrap/bootstrap.min.css">
    <script defer src="../../assets/bootstrap/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container">
        <h2 class="text-center mb-4">Thêm sản phẩm</h2>
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