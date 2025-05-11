<?php
require_once 'Model.php';

$id = $judul = $penulis = $penerbit = $tahun = "";

if (isset($_GET['id'])) {
    $data = getBuku($_GET['id']);
    $id = $data['id_buku'];
    $judul = $data['judul_buku'];
    $penulis = $data['penulis'];
    $penerbit = $data['penerbit'];
    $tahun = $data['tahun_terbit'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['id'] == '') {
        insertBuku($_POST['judul'], $_POST['penulis'], $_POST['penerbit'], $_POST['tahun']);
    } else {
        updateBuku($_POST['id'], $_POST['judul'], $_POST['penulis'], $_POST['penerbit'], $_POST['tahun']);
    }
    header("Location: Buku.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Buku</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS Custom -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form method="post" class="pink-form">
            <h1 class="text-center mb-4">Form Buku</h1>
            <input type="hidden" name="id" value="<?= $id ?>">
            <div class="mb-3">
                <label class="form-label">Judul Buku:</label>
                <input type="text" name="judul" value="<?= $judul ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Penulis:</label>
                <input type="text" name="penulis" value="<?= $penulis ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Penerbit:</label>
                <input type="text" name="penerbit" value="<?= $penerbit ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Tahun Terbit:</label>
                <input type="number" name="tahun" value="<?= $tahun ?>" class="form-control">
            </div>
            <div class="text-center">
                <input type="submit" value="Simpan" class="btn">
            </div>
        </form>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
