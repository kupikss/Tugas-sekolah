<!DOCTYPE html>
<html>
<head>
    <title>Pemesanan Tiket Bioskop</title>
</head>
<body>
    <h2>Program Pemesanan Tiket Bioskop</h2>
    <form method="post">
        Nama Pembeli: <input type="text" name="nama"><br><br>
        Jenis Film: 
        <select name="jenis">
            <option value="2D">2D</option>
            <option value="3D">3D</option>
            <option value="IMAX">IMAX</option>
        </select><br><br>
        Jumlah Tiket: <input type="number" name="jumlah"><br><br>
        <input type="submit" value="Pesan">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = $_POST['nama'];
        $jenis = $_POST['jenis'];
        $jumlah = $_POST['jumlah'];

        switch($jenis) {
            case "2D": $harga = 40000; break;
            case "3D": $harga = 60000; break;
            case "IMAX": $harga = 100000; break;
        }

        $total = $harga * $jumlah;

        if ($jumlah >= 5) {
            $diskon = 0.2 * $total;
        } elseif ($jumlah >= 3) {
            $diskon = 0.1 * $total;
        } else {
            $diskon = 0;
        }

        $bayar = $total - $diskon;

        echo "<h3>Struk Pemesanan Tiket</h3>";
        echo "Nama: $nama <br>";
        echo "Jenis Film: $jenis <br>";
        echo "Jumlah Tiket: $jumlah <br>";
        echo "Total Bayar: Rp " . number_format($bayar,0,",",".");
    }
    ?>
</body>
</html>