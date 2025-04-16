<!DOCTYPE html>
<html> 
<body>
    <!--Konversi Bilangan ke Ejaan-->
    <form method="post">
        Nilai: 
        <input type="number" name="angka" value="<?php echo isset($_POST['angka']) ? $_POST['angka'] : ''; ?>"><br>
        <input type="submit" name="konversi" value="Konversi">
    </form>

    <?php
    if (isset($_POST['konversi'])) {
        $angka = $_POST['angka'];

        if (!is_numeric($angka) || $angka < 0) {
            $hasil = "Masukkan angka yang valid.";
        } elseif ($angka == 0) {
            $hasil = "Nol";
        } elseif ($angka >= 1 && $angka <= 9) {
            $hasil = "Satuan";
        } elseif ($angka >= 10 && $angka <= 19) {
            $hasil = "Belasan";
        } elseif ($angka >= 20 && $angka <= 99) {
            $hasil = "Puluhan";
        } elseif ($angka >= 100 && $angka <= 999) {
            $hasil = "Ratusan";
        } else {
            $hasil = "Anda Menginput Melebihi Limit Bilangan";
        }

        echo "<h3><strong>Hasil: $hasil</strong></h3>";
    }
    ?>
</body>
</html>
