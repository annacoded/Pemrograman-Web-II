<?php
require_once 'Model.php';

$members = getAllMember();

if (isset($_GET['delete'])) {
    deleteMember($_GET['delete']);
    header("Location: Member.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Member</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="pink-form">
        <h1 class="text-center mt-4">Daftar Member</h1>
        <a href="FormMember.php" class="btn btn-success mb-3">Tambah Member</a>

        <table class="table table-bordered table-striped">
            <thead class="table-pink">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Nomor</th>
                    <th>Alamat</th>
                    <th>Tanggal Daftar</th>
                    <th>Tanggal Bayar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $members->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id_member'] ?></td>
                        <td><?= $row['nama_member'] ?></td>
                        <td><?= $row['nomor_member'] ?></td>
                        <td><?= $row['alamat'] ?></td>
                        <td><?= $row['tgl_mendaftar'] ?></td>
                        <td><?= $row['tgl_terakhir_bayar'] ?></td>
                        <td>
                            <a href="FormMember.php?id=<?= $row['id_member'] ?>" class="btn btn-sm btn-primary">Edit</a>
                            <a href="?delete=<?= $row['id_member'] ?>" 
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
