<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script> -->

    <link rel="stylesheet" href="../../assets/bootstrap/bootstrap.min.css">
    <script defer src="../../assets/bootstrap/bootstrap.bundle.min.js"></script>

    <title>Danh sách sản phẩm</title>
</head>

<body>
    <div class="container mt-4">
        <h1 class="text-center mb-4">Danh sách sản phẩm</h1>
        <a href="index.php?action=create" class="btn btn-primary mb-3">Thêm sản phẩm</a>
        <?php if (!empty($products)) : ?>
            <table class="table table-bordered table-striped">
                <thead class="table">
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Giá</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product) : ?>
                        <tr>
                            <td><?= $product['id'] ?></td>
                            <td><?= htmlspecialchars($product['name']) ?></td>
                            <td><?= number_format($product['price'], 0, ',', '.') ?> VND</td>
                            <td>
                                <a href="index.php?action=edit&id=<?= $product['id'] ?>" class="btn btn-warning btn-sm">Sửa</a>
                                <a href="index.php?action=delete&id=<?= $product['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <div class="alert alert-info">Chưa có sản phẩm nào trong cơ sở dữ liệu.</div>
        <?php endif; ?>
    </div>
</body>

</html>