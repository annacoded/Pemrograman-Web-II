<?php
require_once 'Model.php';

$data = getAllPeminjaman();


if (isset($_GET['hapus'])) {
    deletePeminjaman($_GET['hapus']);
    header("Location: Peminjaman.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Peminjaman</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="pink-form">
        <h1 class="text-center mt-4">Daftar Peminjaman</h1>
        <a href="FormPeminjaman.php" class="btn btn-success mb-3">Tambah Peminjaman</a>

        <table class="table table-bordered table-striped">
            <thead class="table-pink">
                <tr>
                    <th>ID</th>
                    <th>Nama Member</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $data->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id_peminjaman'] ?></td>
                        <td><?= $row['nama_member'] ?></td>
                        <td><?= $row['judul_buku'] ?></td>
                        <td><?= $row['tgl_pinjam'] ?></td>
                        <td><?= $row['tgl_kembali'] ?></td>
                        <td>
                            <a href="FormPeminjaman.php?id=<?= $row['id_peminjaman'] ?>" class="btn btn-sm btn-primary">Edit</a>
                            <a href="Peminjaman.php?hapus=<?= $row['id_peminjaman'] ?>" 
                               onclick="return confirm('Yakin ingin menghapus?')" 
                               class="btn btn-sm btn-danger">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>