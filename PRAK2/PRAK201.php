<!DOCTYPE html>
<html>
<body>
    <form action="" method="post">
         Nama: 1 <input type="text" name="nama1" value="<?php echo isset($_POST['nama1']) ? $_POST['nama1'] : ''; ?>"><br>
         Nama: 2 <input type="text" name="nama2" value="<?php echo isset($_POST['nama2']) ? $_POST['nama2'] : ''; ?>"><br>
         Nama: 3 <input type="text" name="nama3" value="<?php echo isset($_POST['nama3']) ? $_POST['nama3'] : ''; ?>"><br>
         <button type="submit" name="Urut">Urutkan</button>
    </form>

    <?php
    if (isset($_POST['Urut'])) {
        $a = trim($_POST['nama1']);
        $b = trim($_POST['nama2']);
        $c = trim($_POST['nama3']);

        if (strcasecmp($a, $b) <= 0 && strcasecmp($a, $c) <= 0) {
            $first = $a;
            if (strcasecmp($b, $c) <= 0) {
                $second = $b;
                $third = $c;
            } else {
                $second = $c;
                $third = $b;
            }
        } elseif (strcasecmp($b, $a) <= 0 && strcasecmp($b, $c) <= 0) {
            $first = $b;
            if (strcasecmp($a, $c) <= 0) {
                $second = $a;
                $third = $c;
            } else {
                $second = $c;
                $third = $a;
            }
        } else {
            $first = $c;
            if (strcasecmp($a, $b) <= 0) {
                $second = $a;
                $third = $b;
            } else {
                $second = $b;
                $third = $a;
            }
        }

        // Output
        echo "$first<br> $second<br> $third";
    }
    ?>
</body>
</html>
