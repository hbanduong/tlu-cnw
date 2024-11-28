<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container mt-5">
        <form action="result.php" method="post">
            <?php
            $filename = "questions.txt";
            $questions = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            $current_question = [];
            $question_number = 0;

            foreach ($questions as $line) {
                // if the line starts with 'ANSWER:', end of a question block
                if (strpos($line, "ANSWER:") === 0) {
                    echo "<div class='card mb-4'>";
                    echo "<div class='card-header'><strong>{$current_question[0]}</strong></div>";
                    echo "<div class='card-body'>";

                    // Loop through the answer options (A, B, C, D)
                    for ($i = 1; $i <= 4; $i++) {
                        $answer = substr($current_question[$i], 0, 1); // Extract answer letter (A, B, C, D)
                        echo "<div class='form-check'>";
                        echo "<input class='form-check-input' type='radio' name='question{$question_number}' value='{$answer}' id='question{$question_number}{$answer}'>";
                        echo "<label class='form-check-label' for='question{$question_number}{$answer}'>{$current_question[$i]}</label>";
                        echo "</div>";
                    }

                    echo "</div>";
                    echo "</div>";

                    $question_number++;
                    $current_question = []; // Reset for the next question
                } else {
                    $current_question[] = $line;
                }
            }
            ?>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>

</html>