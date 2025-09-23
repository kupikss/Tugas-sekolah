<!DOCTYPE html>
<html>
<head>
    <title>Program Parkir Kendaraan</title>
</head>
<body>
    <h2>Program Parkir Kendaraan</h2>
    <form method="post">
        Plat Nomor: <input type="text" name="plat"><br><br>
        Jenis Kendaraan: 
        <select name="jenis">
            <option value="Motor">Motor</option>
            <option value="Mobil">Mobil</option>
            <option value="Bus">Bus</option>
        </select><br><br>
        Lama Parkir (jam): <input type="number" name="jam"><br><br>
        <input type="submit" value="Hitung">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $plat = $_POST['plat'];
        $jenis = $_POST['jenis'];
        $jam = $_POST['jam'];

        switch($jenis) {
            case "Motor": $tarif = 2000; break;
            case "Mobil": $tarif = 5000; break;
            case "Bus": $tarif = 10000; break;
        }

        $total = $tarif * $jam;

        if ($jam > 10) {
            $diskon = 0.1 * $total;
        } else {
            $diskon = 0;
        }

        $bayar = $total - $diskon;

        echo "<h3>Karcis Parkir</h3>";
        echo "Plat Nomor: $plat <br>";
        echo "Jenis Kendaraan: $jenis <br>";
        echo "Lama Parkir: $jam jam <br>";
        echo "Total Bayar: Rp " . number_format($bayar,0,",",".");
    }
    ?>
</body>
</html>