<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
        }
        table {
            border-collapse: collapse;
            width: 90%;
            margin: 20px auto;
            border: 1px solid black; 
        }
        th, td {
            padding: 12px 16px;
            text-align: center;
            border: 1px solid black; 
        }
        th {
            background-color: #f4f4f4; 
            font-weight: bold;
        }
        tr {
            background-color: white; 
        }
        .revisi {
            background-color: rgb(191, 0, 0); 
            color: black;
            font-weight: bold;
        }
        .tidak-revisi {
            background-color: rgb(30, 117, 60); 
            color: black;
            font-weight: bold;
        }
    </style>
</head>
<body>

<?php
$daftar = [
    ["no" => 1, "nama" => "Ridho", "mata_kuliah" => "Pemrograman I", "sks" => 2],
    ["no" => 2, "nama" => "Ridho", "mata_kuliah" => "Praktikum Pemrograman I", "sks" => 1],
    ["no" => 3, "nama" => "Ridho", "mata_kuliah" => "Pengantar Lingkungan Lahan Basah", "sks" => 2],
    ["no" => 4, "nama" => "Ridho", "mata_kuliah" => "Arsitektur", "sks" => 3],
    ["no" => 5, "nama" => "Ratna", "mata_kuliah" => "Basis Data I", "sks" => 2],
    ["no" => 6, "nama" => "Ratna", "mata_kuliah" => "Praktikum Basis Data I", "sks" => 1],
    ["no" => 7, "nama" => "Ratna", "mata_kuliah" => "Kalkulus", "sks" => 3],
    ["no" => 8, "nama" => "Tono", "mata_kuliah" => "Rekayasa Perangkat Lunak", "sks" => 3],
    ["no" => 9, "nama" => "Tono", "mata_kuliah" => "Analisis dan Perancangan Lunak", "sks" => 3],
    ["no" => 10, "nama" => "Tono", "mata_kuliah" => "Komputasi Awan", "sks" => 3],
    ["no" => 11, "nama" => "Tono", "mata_kuliah" => "Kecerdasan Bisnis", "sks" => 3],
];
$mahasiswa = [];

foreach ($daftar as $data) {
    $nama = $data['nama'];

    if (!isset($mahasiswa[$nama])) {
        $mahasiswa[$nama] = [
            'mata_kuliah' => [],
            'sks' => [],
            'total_sks' => 0,
            'keterangan' => ''
        ];
    }
    $mahasiswa[$nama]['mata_kuliah'][] = $data['mata_kuliah'];
    $mahasiswa[$nama]['sks'][] = $data['sks'];
    $mahasiswa[$nama]['total_sks'] += $data['sks'];
}
foreach ($mahasiswa as $nama => &$info) {
    $info['keterangan'] = ($info['total_sks'] < 7) ? 'Revisi KRS' : 'Tidak Revisi';
}
unset($info);
echo "<table>";
echo "<tr>
        <th>No</th>
        <th>Nama</th>
        <th>Mata Kuliah diambil</th>
        <th>SKS</th>
        <th>Total SKS</th>
        <th>Keterangan</th>
      </tr>";

$no = 1;
foreach ($mahasiswa as $nama => $info) {
    $jumlah_mk = count($info['mata_kuliah']);
    $class_keterangan = ($info['keterangan'] == 'Revisi KRS') ? 'revisi' : 'tidak-revisi';

    for ($i = 0; $i < $jumlah_mk; $i++) {
        echo "<tr>";

        if ($i == 0) {
            echo "<td rowspan='$jumlah_mk'>$no</td>";
            echo "<td rowspan='$jumlah_mk'>$nama</td>";
        }

        echo "<td>{$info['mata_kuliah'][$i]}</td>";
        echo "<td>{$info['sks'][$i]}</td>";

        if ($i == 0) {
            echo "<td rowspan='$jumlah_mk'>{$info['total_sks']}</td>";
            echo "<td rowspan='$jumlah_mk' class='$class_keterangan'>{$info['keterangan']}</td>";
        }

        echo "</tr>";
    }
    $no++;
}

echo "</table>";
?>

</body>
</html>
