<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset="UTF-8">
    <title>Form Input</title>
    <style>
        .error { color: red; }
    </style>
</head>
<body>

<?php
$nama = $nim = $gender = "";
$namaErr = $nimErr = $genderErr = "";
$output = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $valid = true;

    // Validasi Nama, Nim, Gender
    if (isset($_POST["nama"]) && !empty($_POST["nama"])) {
        $nama = htmlspecialchars($_POST["nama"]);
    } else {
        $namaErr = "nama tidak boleh kosong";
        $valid = false;
    }
    if (isset($_POST["nim"]) && !empty($_POST["nim"])) {
        $nim = htmlspecialchars($_POST["nim"]);
    } else {
        $nimErr = "nim tidak boleh kosong";
        $valid = false;
    }

    if (isset($_POST["gender"])) {
        $gender = htmlspecialchars($_POST["gender"]);
    } else {
        $genderErr = "jenis kelamin tidak boleh kosong";
        $valid = false;
    }

    // kalau valid, output tersimpan
    if ($valid) {
        $output = "$nama<br>$nim<br>" . ($gender == "Laki-Laki" ? "Laki-laki" : "Perempuan");
    }
}
?>

<form action="" method="post">
    Nama: <input type="text" name="nama" value="<?php echo $nama; ?>"> 
    <span class="error">* <?php echo $namaErr; ?></span><br>

    NIM: <input type="text" name="nim" value="<?php echo $nim; ?>">
    <span class="error">* <?php echo $nimErr; ?></span><br>

    Jenis Kelamin:
    <span class="error">* <?php echo $genderErr; ?></span><br>
    <input type="radio" name="gender" value="Laki-Laki" <?php if ($gender == "Laki-Laki") echo "checked"; ?>> Laki-Laki<br>
    <input type="radio" name="gender" value="Perempuan" <?php if ($gender == "Perempuan") echo "checked"; ?>> Perempuan<br>

    <input type="submit" value="Submit">
</form>

<?php
if (!empty($output)) {
    echo "<br>" .$output;
}
?>

</body>
</html>
