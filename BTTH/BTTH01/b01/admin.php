<?php
include('flowers.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action'])) {
        if ($_POST['action'] == 'create') {
            $flowers[] = [
                'name' => $_POST['name'],
                'desc' => $_POST['desc'],
                'path' => $_POST['path']
            ];
            saveFlowers($flowers);
        } elseif ($_POST['action'] == 'update' && isset($_POST['id'])) {
            $id = $_POST['id'];
            $flowers[$id] = [
                'name' => $_POST['name'],
                'desc' => $_POST['desc'],
                'path' => $_POST['path']
            ];
            saveFlowers($flowers);
        } elseif ($_POST['action'] == 'delete' && isset($_POST['id'])) {
            $id = $_POST['id'];
            unset($flowers[$id]);
            $flowers = array_values($flowers);
            saveFlowers($flowers);
        }
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

$flowerToEdit = null;
if (isset($_GET['edit'])) {
    $flowerToEdit = $flowers[$_GET['edit']];
}

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
        <h1 class="text-center">Admin Page</h1>

        <h2><?php echo $flowerToEdit ? 'Edit Flower' : 'Add New Flower'; ?></h2>
        <br>
        <form method="POST" action="">
            <input type="hidden" name="action" value="<?php echo $flowerToEdit ? 'update' : 'create'; ?>">
            <?php if ($flowerToEdit): ?>
                <input type="hidden" name="id" value="<?php echo $_GET['edit']; ?>">
            <?php endif; ?>

            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" name="name" id="name" value="<?php echo $flowerToEdit ? $flowerToEdit['name'] : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="desc" class="form-label">Description:</label>
                <input type="text" name="desc" id="desc" value="<?php echo $flowerToEdit ? $flowerToEdit['desc'] : ''; ?>" required>
            </div>
            <div class="mb-3">
                <label for="path" class="form-label">Image Path:</label>
                <input type="text" name="path" id="path" value="<?php echo $flowerToEdit ? $flowerToEdit['path'] : ''; ?>" required>
            </div>
            <button type="submit"><?php echo $flowerToEdit ? 'Update Flower' : 'Add Flower'; ?></button>
        </form>

        <!-- Flowers table -->
        <h2>Flowers List</h2>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($flowers as $index => $flower): ?>
                    <tr>
                        <td><?php echo $flower['name']; ?></td>
                        <td><?php echo $flower['desc']; ?></td>
                        <td><img src="<?php echo $flower['path']; ?>" alt="<?php echo $flower['name']; ?>" width="100"></td>
                        <td>
                            <a href="?edit=<?php echo $index; ?>">Edit</a> |
                            <form action="" method="POST" style="display:inline;">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?php echo $index; ?>">
                                <button type="submit" onclick="return confirm('Delete this flower?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>