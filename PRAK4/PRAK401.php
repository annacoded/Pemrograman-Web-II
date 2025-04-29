<!DOCTYPE html>
<html>
<head>
    <title>Cetak Matriks</title>
    <style>
        td {
            border: 1px solid black;
            width: 30px;
            height: 30px;
            text-align: center;
            vertical-align: middle;
            font-size: 18px;
            font-family: 'Times New Roman', Times, serif;
        }
        table {
            border-collapse: collapse;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<form method="post">
    Panjang: <input type="text" name="panjang" value="<?php echo isset($_POST['panjang']) ? $_POST['panjang'] : ''; ?>"><br>
    Lebar: <input type="text" name="lebar" value="<?php echo isset($_POST['lebar']) ? $_POST['lebar'] : ''; ?>"><br>
    Nilai: <input type="text" name="nilai" value="<?php echo isset($_POST['nilai']) ? $_POST['nilai'] : ''; ?>"><br>
    <input type="submit" name="cetak" value="Cetak">
</form>

<?php
if (isset($_POST['cetak'])) {
    $panjang = (int) $_POST['panjang'];
    $lebar = (int) $_POST['lebar'];
    $nilaiInput = $_POST['nilai'];
    
    $nilaiArray = explode(' ', $nilaiInput);

    if (count($nilaiArray) != $panjang * $lebar) {
        echo "Panjang nilai tidak sesuai dengan ukuran matriks!";
    } else {
        echo "<table>";
        $index = 0;
        for ($i = 0; $i < $panjang; $i++) {
            echo "<tr>";
            for ($j = 0; $j < $lebar; $j++) {
                echo "<td>" . $nilaiArray[$index] . "</td>";
                $index++;
            }
            echo "</tr>";
        }
        echo "</table>";
    }
}
?>

</body>
</html>
