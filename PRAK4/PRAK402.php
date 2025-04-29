<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
        }
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
            border: 1px solid black;
        }
        th, td {
            padding: 10px 15px;
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
    </style>
</head>
<body>

<?php
$mahasiswa = [
    [
        "nama" => "Andi",
        "nim" => "2101001",
        "uts" => 87,
        "uas" => 65
    ],
    [
        "nama" => "Budi",
        "nim" => "2101002",
        "uts" => 76,
        "uas" => 79
    ],
    [
        "nama" => "Tono",
        "nim" => "2101003",
        "uts" => 50,
        "uas" => 41
    ],
    [
        "nama" => "Jessica",
        "nim" => "2101004",
        "uts" => 60,
        "uas" => 75
    ]
];

function hitungNilaiHuruf($uts, $uas) {
    $nilai_akhir = ($uts * 0.4) + ($uas * 0.6);

    if ($nilai_akhir >= 80) {
        $huruf = 'A';
    } elseif ($nilai_akhir >= 70) {
        $huruf = 'B';
    } elseif ($nilai_akhir >= 60) {
        $huruf = 'C';
    } elseif ($nilai_akhir >= 50) {
        $huruf = 'D';
    } else {
        $huruf = 'E';
    }

    return ['nilai_akhir' => $nilai_akhir, 'huruf' => $huruf];
}
echo "<table>";
echo "<tr>
        <th>Nama</th>
        <th>NIM</th>
        <th>UTS</th>
        <th>UAS</th>
        <th>Nilai Akhir</th>
        <th>Huruf</th>
      </tr>";
foreach ($mahasiswa as $mhs) {
    $hasil = hitungNilaiHuruf($mhs['uts'], $mhs['uas']);

    echo "<tr>
            <td>{$mhs['nama']}</td>
            <td>{$mhs['nim']}</td>
            <td>{$mhs['uts']}</td>
            <td>{$mhs['uas']}</td>
            <td>" . number_format($hasil['nilai_akhir'], 2) . "</td>
            <td>{$hasil['huruf']}</td>
          </tr>";
}
echo "</table>";
?>

</body>
</html>
