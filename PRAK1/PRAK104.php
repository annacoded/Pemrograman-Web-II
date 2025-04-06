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
            border-spacing: 1px; /* Jarak antar kotak */
        }
        th, td {
            border: 1px solid black;
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
    <!-- Tabel Induk -->
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
                        $samsung = array("Samsung Galaxy S22", "Samsung Galaxy S22+", "Samsung Galaxy A03", "Samsung Galaxy Xcover 5");
                        foreach ($samsung as $item) {
                            echo "<tr><td>$item</td></tr>";
                        }
                    ?>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
