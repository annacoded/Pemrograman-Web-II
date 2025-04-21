<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program String</title>
</head>
<body>
<form method="post">
    <label for="inputString"></label>
    <input type="text" id="inputString" name="inputString" required>
    <input type="submit" value="submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input = $_POST['inputString']; 
    $output = '';

    echo "<h3>Input:</h3>";
    echo "<p>" . htmlspecialchars($input) . "</p>";

    // Proses string untuk menghasilkan output
    for ($i = 0; $i < strlen($input); $i++) {
        $char = $input[$i]; 
        $count = strlen($input);

        $output .= strtoupper($char);
        for ($j = 1; $j < $count; $j++) {
            $output .= strtolower($char); 
        }
    }

    // Menampilkan hasil output
    echo "<h3>Output:</h3>";
    echo "<p>" . $output . "</p>";
}
?>

</body>
</html>
