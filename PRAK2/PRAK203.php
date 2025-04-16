<!DOCTYPE html>
<html>
<head>
    <title>Konversi Suhu</title>
</head>
<body>
    <form method="post">
        Nilai:
        <input type="number" name="nilai" step="any" value="<?php echo isset($_POST['nilai']) ? $_POST['nilai'] : ''; ?>"><br>

        Dari :<br>
        <input type="radio" name="dari" value="Celcius" <?php if (isset($_POST['dari']) && $_POST['dari'] == 'Celcius') echo 'checked'; ?>> Celcius<br>
        <input type="radio" name="dari" value="Fahrenheit" <?php if (isset($_POST['dari']) && $_POST['dari'] == 'Fahrenheit') echo 'checked'; ?>> Fahrenheit<br>
        <input type="radio" name="dari" value="Rheamur" <?php if (isset($_POST['dari']) && $_POST['dari'] == 'Rheamur') echo 'checked'; ?>> Rheamur<br>
        <input type="radio" name="dari" value="Kelvin" <?php if (isset($_POST['dari']) && $_POST['dari'] == 'Kelvin') echo 'checked'; ?>> Kelvin<br>

        Ke :<br>
        <input type="radio" name="ke" value="Celcius" <?php if (isset($_POST['ke']) && $_POST['ke'] == 'Celcius') echo 'checked'; ?>> Celcius<br>
        <input type="radio" name="ke" value="Fahrenheit" <?php if (isset($_POST['ke']) && $_POST['ke'] == 'Fahrenheit') echo 'checked'; ?>> Fahrenheit<br>
        <input type="radio" name="ke" value="Rheamur" <?php if (isset($_POST['ke']) && $_POST['ke'] == 'Rheamur') echo 'checked'; ?>> Rheamur<br>
        <input type="radio" name="ke" value="Kelvin" <?php if (isset($_POST['ke']) && $_POST['ke'] == 'Kelvin') echo 'checked'; ?>> Kelvin<br>

        <input type="submit" name="konversi" value="Konversi">
    </form>

    <?php
    if (isset($_POST['konversi'])) {
        $nilai = $_POST['nilai'];
        $dari = $_POST['dari'];
        $ke = $_POST['ke'];

        // Konversi sesuai pilihan
        if ($dari == 'Fahrenheit' && $ke == 'Rheamur') {
            $hasil = (4/9) * ($nilai - 32);
            $satuan = "°Re";
        } elseif ($dari == 'Fahrenheit' && $ke == 'Kelvin') {
            $hasil = (5/9) * ($nilai - 32) + 273.15;
            $satuan = "K";
        } elseif ($dari == 'Fahrenheit' && $ke == 'Celcius') {
            $hasil = (5/9) * ($nilai - 32);
            $satuan = "°C";
        }

        // Rheamur ke lainnya
        elseif ($dari == 'Rheamur' && $ke == 'Fahrenheit') {
            $hasil = (9/4) * $nilai + 32;
            $satuan = "°F";
        } elseif ($dari == 'Rheamur' && $ke == 'Kelvin') {
            $hasil = (5/4) * $nilai + 273.15;
            $satuan = "K";
        } elseif ($dari == 'Rheamur' && $ke == 'Celcius') {
            $hasil = (5/4) * $nilai;
            $satuan = "°C";
        }

        // Kelvin ke lainnya
        elseif ($dari == 'Kelvin' && $ke == 'Fahrenheit') {
            $hasil = (9/5) * ($nilai - 273.15) + 32;
            $satuan = "°F";
        } elseif ($dari == 'Kelvin' && $ke == 'Rheamur') {
            $hasil = (4/5) * ($nilai - 273.15);
            $satuan = "°Re";
        } elseif ($dari == 'Kelvin' && $ke == 'Celcius') {
            $hasil = $nilai - 273.15;
            $satuan = "°C";
        }

        // Celcius ke lainnya
        elseif ($dari == 'Celcius' && $ke == 'Fahrenheit') {
            $hasil = (9/5) * $nilai + 32;
            $satuan = "°F";
        } elseif ($dari == 'Celcius' && $ke == 'Rheamur') {
            $hasil = (4/5) * $nilai;
            $satuan = "°Re";
        } elseif ($dari == 'Celcius' && $ke == 'Kelvin') {
            $hasil = $nilai + 273.15;
            $satuan = "K";
        }

        // Jika asal dan tujuan satuannya sama
        elseif ($dari == $ke) {
            $hasil = $nilai;
            if ($dari == 'Fahrenheit') {
                $satuan = "°F";
            } elseif ($dari == 'Rheamur') {
                $satuan = "°Re";
            } elseif ($dari == 'Kelvin') {
                $satuan = "K";
            } else {
                $satuan = "°C";
            }
        }

        echo "<h3><strong>Hasil Konversi: " . number_format($hasil, 1) . " $satuan</strong></h3>";
    }
    ?>
</body>
</html>
