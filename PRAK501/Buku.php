<?php
require_once 'Model.php';

$data = getAllBuku();
if (isset($_GET['delete'])) {
    deleteBuku($_GET['delete']);
    header("Location: Buku.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    
    <div class="pink-form">
        <h1 class="text-center mt-4">Daftar Buku</h1>
        <a href="FormBuku.php" class="btn btn-success mb-3">Tambah Buku</a>

        <table class="table table-bordered table-striped">
            <thead class="table-pink">
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $data->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id_buku'] ?></td>
                        <td><?= $row['judul_buku'] ?></td>
                        <td><?= $row['penulis'] ?></td>
                        <td><?= $row['penerbit'] ?></td>
                        <td><?= $row['tahun_terbit'] ?></td>
                        <td>
                            <a href="FormBuku.php?id=<?= $row['id_buku'] ?>" class="btn btn-sm btn-primary">Edit</a>
                            <a href="?delete=<?= $row['id_buku'] ?>" 
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