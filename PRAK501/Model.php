<?php
require_once 'Koneksi.php';

function getAllMember() {
    $conn = koneksi();
    return $conn->query("SELECT * FROM member");
}

function getMember($id) {
    $conn = koneksi();
    $result = $conn->query("SELECT * FROM member WHERE id_member = '$id'");
    return $result->fetch_assoc();
}

function insertMember($nama, $nomor, $alamat, $tgl_daftar, $tgl_bayar) {
    $conn = koneksi();
    return $conn->query("INSERT INTO member (nama_member, nomor_member, alamat, tgl_mendaftar, tgl_terakhir_bayar) 
                         VALUES ('$nama', '$nomor', '$alamat', '$tgl_daftar', '$tgl_bayar')");
}

function updateMember($id, $nama, $nomor, $alamat, $tgl_daftar, $tgl_bayar) {
    $conn = koneksi();
    return $conn->query("UPDATE member SET nama_member='$nama', nomor_member='$nomor', alamat='$alamat',
                         tgl_mendaftar='$tgl_daftar', tgl_terakhir_bayar='$tgl_bayar' WHERE id_member='$id'");
}

function deleteMember($id) {
    $conn = koneksi();
    $conn->query("DELETE FROM peminjaman WHERE id_member='$id'");
    return $conn->query("DELETE FROM member WHERE id_member='$id'");
}

function getAllBuku() {
    $conn = koneksi();
    return $conn->query("SELECT * FROM buku");
}

function getBuku($id) {
    $conn = koneksi();
    $result = $conn->query("SELECT * FROM buku WHERE id_buku = '$id'");
    return $result->fetch_assoc();
}

function insertBuku($judul, $penulis, $penerbit, $tahun) {
    $conn = koneksi();
    return $conn->query("INSERT INTO buku (judul_buku, penulis, penerbit, tahun_terbit) 
                         VALUES ('$judul', '$penulis', '$penerbit', '$tahun')");
}

function updateBuku($id, $judul, $penulis, $penerbit, $tahun) {
    $conn = koneksi();
    return $conn->query("UPDATE buku SET judul_buku='$judul', penulis='$penulis', penerbit='$penerbit', tahun_terbit='$tahun' 
                         WHERE id_buku='$id'");
}

function deleteBuku($id) {
    $conn = koneksi();
    $conn->query("DELETE FROM peminjaman WHERE id_buku='$id'");
    return $conn->query("DELETE FROM buku WHERE id_buku='$id'");
}

function getAllPeminjaman() {
    $conn = koneksi();
    return $conn->query("SELECT p.id_peminjaman, m.nama_member, b.judul_buku, p.tgl_pinjam, p.tgl_kembali 
                         FROM peminjaman p
                         JOIN member m ON p.id_member = m.id_member
                         JOIN buku b ON p.id_buku = b.id_buku");
}

function getPeminjaman($id) {
    $conn = koneksi();
    $result = $conn->query("SELECT * FROM peminjaman WHERE id_peminjaman = '$id'");
    return $result->fetch_assoc();
}

function insertPeminjaman($id_member, $id_buku, $tgl_pinjam, $tgl_kembali) {
    $conn = koneksi();
    return $conn->query("INSERT INTO peminjaman (id_member, id_buku, tgl_pinjam, tgl_kembali) 
                         VALUES ('$id_member', '$id_buku', '$tgl_pinjam', '$tgl_kembali')");
}

function updatePeminjaman($id, $id_member, $id_buku, $tgl_pinjam, $tgl_kembali) {
    $conn = koneksi();
    return $conn->query("UPDATE peminjaman SET id_member='$id_member', id_buku='$id_buku', 
                         tgl_pinjam='$tgl_pinjam', tgl_kembali='$tgl_kembali' WHERE id_peminjaman='$id'");
}

function deletePeminjaman($id) {
    $conn = koneksi();
    return $conn->query("DELETE FROM peminjaman WHERE id_peminjaman='$id'");
}
?>
