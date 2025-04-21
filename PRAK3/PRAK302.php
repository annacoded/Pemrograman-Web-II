<!DOCTYPE html>
<html>
<head>
    <title>Segitiga Gambar Terbalik Rata Kanan</title>
</head>
<body>

<?php
$tinggi = isset($_POST['tinggi']) ? $_POST['tinggi'] : '';
$gambar = isset($_POST['gambar']) ? $_POST['gambar'] : 'https://cdn0.iconfinder.com/data/icons/web-and-mobile-icons-volume-2/128/52-512.png';
?>

<form method="post">
    Tinggi : <input type="text" name="tinggi" value="<?php echo htmlspecialchars($tinggi); ?>"><br>
    Alamat Gambar : <input type="text" name="gambar" value="<?php echo htmlspecialchars($gambar); ?>"><br>
    <input type="submit" name="cetak" value="Cetak">
</form>

<?php
if (isset($_POST['cetak'])) {
    $baris = $tinggi;

    while ($baris >= 1) {
        $spasi = 0;
        $jumlahSpasi = $tinggi - $baris;

        while ($spasi < $jumlahSpasi) {
            echo "<span style='display:inline-block; width:30px;'></span>";
            $spasi++;
        }

        $kolom = 1;
        while ($kolom <= $baris) {
            echo "<img src='$gambar' width='30' height='30'>";
            $kolom++;
        }

        echo "<br>";
        $baris--;
    }
}
?>

</body>
</html>
