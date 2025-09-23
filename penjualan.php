<!DOCTYPE html>
<html>
<head>
    <title>Pemesanan Makanan</title>
</head>
<body>
    <h2>Program Pemesanan Makanan Restoran</h2>
    <form method="post">
        Nama Pelanggan: <input type="text" name="nama"><br><br>
        Menu: 
        <select name="menu">
            <option value="Nasi Goreng">Nasi Goreng - Rp 20.000</option>
            <option value="Mie Ayam">Mie Ayam - Rp 15.000</option>
            <option value="Soto">Soto - Rp 18.000</option>
            <option value="Bakso">Bakso - Rp 17.000</option>
        </select><br><br>
        Jumlah Porsi: <input type="number" name="jumlah"><br><br>
        <input type="submit" value="Pesan">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST['nama'];
        $menu = $_POST['menu'];
        $jumlah = $_POST['jumlah'];

        switch($menu) {
            case "Nasi Goreng": $harga = 20000; break;
            case "Mie Ayam": $harga = 15000; break;
            case "Soto": $harga = 18000; break;
            case "Bakso": $harga = 17000; break;
        }

        $total = $harga * $jumlah;

        if ($jumlah >= 10) {
            $diskon = 0.25 * $total;
        } elseif ($jumlah >= 5) {
            $diskon = 0.15 * $total;
        } else {
            $diskon = 0;
        }

        $bayar = $total - $diskon;

        echo "<h3>Nota Pemesanan Makanan</h3>";
        echo "Nama: $nama <br>";
        echo "Menu: $menu <br>";
        echo "Jumlah Porsi: $jumlah <br>";
        echo "Total Bayar: Rp " . number_format($bayar,0,",",".");
    }
    ?>
</body>
</html>