<?php
session_start();

if (!isset($_SESSION['stars'])) {
    $_SESSION['stars'] = 0;
}

// Proses form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit'])) {
        $_SESSION['stars'] = intval($_POST['jumlah_bintang']);
    } elseif (isset($_POST['tambah'])) {
        $_SESSION['stars']++;
    } elseif (isset($_POST['kurang']) && $_SESSION['stars'] > 0) {
        $_SESSION['stars']--;
    }

    // Redirect untuk mencegah form resubmission (menghindari warning & refresh aman)
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program Bintang</title>
</head>
<body>
    <!-- input jumlah bintang -->
    <form action="" method="post">
        <label for="jumlah_bintang">Jumlah bintang:</label>
        <input type="number" name="jumlah_bintang" id="jumlah_bintang" min="0" required 
               value="<?php echo isset($_SESSION['stars']) ? $_SESSION['stars'] : ''; ?>"><br>
        <button type="submit" name="submit">Submit</button>
    </form>

    <!-- Jika sudah disubmit, tampilkan output -->
    <?php if (isset($_SESSION['stars'])): ?>
        <p>Jumlah bintang: <?php echo $_SESSION['stars']; ?></p>

        <?php
        for ($i = 0; $i < $_SESSION['stars']; $i++) {
            echo '<img src="star-gmbr.png" width="50" height="50" style="margin:3px;" />';
        }
        ?>
        <!-- Tombol tambah dan kurang -->
        <form action="" method="post">
            <button type="submit" name="tambah">Tambah</button>
            <button type="submit" name="kurang">Kurang</button>
        </form>
    <?php endif; ?>
</body>
</html>
