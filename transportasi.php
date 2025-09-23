<!DOCTYPE html>
<html>
<head>
    <title>Pemesanan Tiket Transportasi</title>
</head>
<body>
    <h2>Program Pemesanan Tiket Transportasi</h2>
    <form method="post">
        Nama Penumpang: <input type="text" name="nama"><br><br>
        Jenis Transportasi: 
        <select name="jenis">
            <option value="Kereta">Kereta - Rp 100.000</option>
            <option value="Pesawat">Pesawat - Rp 500.000</option>
            <option value="Kapal">Kapal - Rp 200.000</option>
            <option value="Bus">Bus - Rp 80.000</option>
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
            case "Kereta": $harga = 100000; break;
            case "Pesawat": $harga = 500000; break;
            case "Kapal": $harga = 200000; break;
            case "Bus": $harga = 80000; break;
        }

        $total = $harga * $jumlah;

        if ($jumlah >= 3) {
            $diskon = 0.15 * $total;
        } else {
            $diskon = 0;
        }

        $bayar = $total - $diskon;

        echo "<h3>Tiket Perjalanan</h3>";
        echo "Nama: $nama <br>";
        echo "Transportasi: $jenis <br>";
        echo "Jumlah Tiket: $jumlah <br>";
        echo "Total Bayar: Rp " . number_format($bayar,0,",",".");
    }
    ?>
</body>
</html>