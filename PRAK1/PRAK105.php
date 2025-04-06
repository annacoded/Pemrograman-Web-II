<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar HP Samsung</title>
    <style>
        body {
            font-family: 'Times New Roman';
            text-align: center;
        }
        table {
            width: 100%;
            margin: 1px auto;
            border-collapse: separate;
            border-spacing: 2px; /* Jarak antar kotak */
        }
        th {
            border: 2px solid black;
            background-color: red;
            color:black;
            font-size: 30px;
            text-align: left;
            padding: 30px 1px;
        }
        td {
            border: 2px solid black;
            padding: 1px; /* Jarak di dalam kotak */
            text-align: left;
        }
        .wrapper-table {
            width: auto;
            margin: auto;
        }
    </style>
</head>
<body>
    <!-- Tabel Luar -->
    <table class="wrapper-table">
        <tr>
            <td>
                <!-- Tabel untuk Header -->
                <table>
                    <tr>
                        <th>Daftar Smartphone Samsung</th>
                    </tr>
                </table>

                <!-- Tabel untuk Daftar HP Samsung -->
                <table>
                    <?php 
                        $samsung = [
                            ["Sam" => "Samsung Galaxy S22"],
                            ["Sam" => "Samsung Galaxy S22+"],
                            ["Sam" => "Samsung Galaxy A03"],
                            ["Sam" => "Samsung Galaxy XCover 5"]
                        ];
                        foreach ($samsung as $item) {
                            echo "<tr><td>{$item['Sam']}</td></tr>";
                        }
                    ?>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
