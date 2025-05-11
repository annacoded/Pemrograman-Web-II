<?php
require_once 'Model.php';

$id = $nama = $nomor = $alamat = $daftar = $bayar = "";

if (isset($_GET['id'])) {
    $data = getMember($_GET['id']);
    $id = $data['id_member'];
    $nama = $data['nama_member'];
    $nomor = $data['nomor_member'];
    $alamat = $data['alamat'];
    $daftar = $data['tgl_mendaftar'];
    $bayar = $data['tgl_terakhir_bayar'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['id'] == '') {
        insertMember($_POST['nama'], $_POST['nomor'], $_POST['alamat'], $_POST['daftar'], $_POST['bayar']);
    } else {
        updateMember($_POST['id'], $_POST['nama'], $_POST['nomor'], $_POST['alamat'], $_POST['daftar'], $_POST['bayar']);
    }
    header("Location: Member.php");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Form Member</title>
        <link rel="stylesheet" href="style.css">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    </head>
    <body>
    <div class="container">
    <form method="post" class="pink-form">
        <h1 class="text-center mb-4">Form Member</h1>
        <input type="hidden" name="id" value="<?= $id ?>">
        <label for="nama" class="form-label">Nama:</label>
        <input type="text" name="nama" class="form-control" value="<?= $nama ?>"><br>
        <label for= "nomor" class= "form-label">Nomor:</label>
        <input type="text" name="nomor"class="form-control" value="<?= $nomor ?>"><br>
        <label for="alamat" class="form-label">Alamat:</label>
        <textarea name="alamat"class="form-control"><?= $alamat ?></textarea><br>
        <label for="daftar" class="form-label">Tanggal Mendaftar:</label><input type="datetime-local" name="daftar" class="form-control" value="<?= str_replace(" ", "T", $daftar) ?>"><br>
        <label for="bayar" class="form-label">Tanggal Terakhir Bayar:</label> <input type="date" name="bayar" class="form-control" value="<?= $bayar ?>"><br>
        <input type="submit" value="Simpan">
    </form>
</div>
</body>
</html>
