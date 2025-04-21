<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Deret Bilangan</title>
</head>
<body>

<form method="post" action="">
    <label for="batas_bawah">Batas Bawah:</label>
    <input type="number" name="batas_bawah" value="<?php echo isset($_POST['batas_bawah']) ? $_POST['batas_bawah'] : ''; ?>" required>
    <br>
    <label for="batas_atas">Batas Atas:</label>
    <input type="number" name="batas_atas" value="<?php echo isset($_POST['batas_atas']) ? $_POST['batas_atas'] : ''; ?>" required>
    <br>
    <input type="submit" value="Cetak">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $batas_bawah = $_POST['batas_bawah'];
    $batas_atas = $_POST['batas_atas'];
    
    $i = $batas_bawah;

    echo '<div>';
    
    do {
        // Hitung bilangan setelah ditambah 7
        $nilai = $i + 7;
        
        // Cek apakah nilai merupakan kelipatan 5
        if ($nilai % 5 == 0) {
            echo '<img src="star-gmbr.png" alt="Star" style="width:20px;height:20px;"> ';
        } else {
            echo $i . ' ';
        }
        
        // Increment
        $i++;
    } while ($i <= $batas_atas);
    
    echo '</div>';
}
?>

</body>
</html>
