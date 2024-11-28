<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Danh sách sinh viên</h1>

        <?php
        $filename = "data.csv";

        if (!file_exists($filename)) {
            echo "<div class='alert alert-danger'>Không tìm thấy file <strong>data.csv</strong>.</div>";
            exit;
        }

        $students = [];
        if (($handle = fopen($filename, "r")) !== FALSE) {
            $headers = fgetcsv($handle, 1000, ",");

            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $students[] = array_combine($headers, $data);
            }
            fclose($handle);
        }

        if (empty($students)) {
            echo "<div class='alert alert-warning'>Không có dữ liệu sinh viên.</div>";
        } else {
            echo "<table class='table table-bordered table-striped'>";
            echo "<thead class='table-dark'>";
            echo "<tr>";
            foreach ($headers as $header) {
                echo "<th>{$header}</th>";
            }
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
            foreach ($students as $student) {
                echo "<tr>";
                foreach ($student as $value) {
                    echo "<td>{$value}</td>";
                }
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        }
        ?>
    </div>
</body>

</html>