<?php
require_once 'Model.php';

$id = $id_member = $id_buku = $tgl_pinjam = "";

$members = getAllMember();
$books = getAllBuku();

if (isset($_GET['id'])) {
    $data = getPeminjaman($_GET['id']);
    $id = $data['id_peminjaman'];
    $id_member = $data['id_member'];
    $id_buku = $data['id_buku'];
    $tanggal_pinjam = $data['tgl_pinjam'];
    $tgl_kembali = $data['tgl_kembali'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['id'] == "") {
        insertPeminjaman($_POST['id_member'], $_POST['id_buku'], $_POST['tgl_pinjam'], $_POST['tgl_kembali']);
    } else {
        updatePeminjaman($_POST['id'], $_POST['id_member'], $_POST['id_buku'], $_POST['tgl_pinjam'], $_POST['tgl_kembali']);
    }
    header("Location: Peminjaman.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Peminjaman</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <form method="post" class="pink-form">
        <h1 class="text-center mb-4">Form Peminjaman</h1>
        <input type="hidden" name="id" value="<?= $id ?>">

        <label for="id_member" class="form-label">Member:</label>
        <select name="id_member" class="form-select">
            <?php while ($m = $members->fetch_assoc()): ?>
                <option value="<?= $m['id_member'] ?>" <?= ($m['id_member'] == $id_member) ? 'selected' : '' ?>>
                    <?= $m['nama_member'] ?>
                </option>
            <?php endwhile; ?>
        </select><br>

        <label for="id_buku" class="form-label">Buku:</label>
        <select name="id_buku" class="form-select">
            <?php while ($b = $books->fetch_assoc()): ?>
                <option value="<?= $b['id_buku'] ?>" <?= ($b['id_buku'] == $id_buku) ? 'selected' : '' ?>>
                    <?= $b['judul_buku'] ?>
                </option>
            <?php endwhile; ?>
        </select><br>

        <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam:</label>
        <input type="date" name="tanggal_pinjam" class="form-control" value="<?= $tanggal_pinjam ?>"><br>

        <label for="tgl_kembali" class="form-label">Tanggal Kembali:</label>
        <input type="date" name="tgl_kembali" class="form-control" value="<?= $tgl_kembali ?>"><br>

        <input type="submit" value="Simpan" class="btn btn-primary">
    </form>
</div>
</body>
</html>

