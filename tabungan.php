<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $saldoAwal = isset($_POST['saldoAwal']) ? (float)$_POST['saldoAwal'] : 0;
    $bunga = isset($_POST['bunga']) ? (float)$_POST['bunga'] : 0;
    $biayaAdmin = isset($_POST['biayaAdmin']) ? (float)$_POST['biayaAdmin'] : 0;
    $bulan = isset($_POST['bulan']) ? (int)$_POST['bulan'] : 1;

    $saldo = $saldoAwal;
    $hasil = "<h3>Detail Tabungan Setelah Tiap Bulan:</h3><ul>";

    for ($i = 1; $i <= $bulan; $i++) {
        // Hitung bunga bulan ini
        $bungaBulanIni = $saldo * ($bunga / 100);
        // Tambahkan bunga
        $saldo += $bungaBulanIni;
        // Kurangi biaya admin
        $saldo -= $biayaAdmin;

        // Pastikan saldo tidak negatif
        if ($saldo < 0) $saldo = 0;

        $hasil .= "<li>Bulan $i: Rp " . number_format($saldo, 2, ',', '.') . "</li>";
    }

    $hasil .= "</ul>";
    $hasil .= "<p><strong>Saldo Akhir setelah $bulan bulan: Rp " . number_format($saldo, 2, ',', '.') . "</strong></p>";
} else {
    header('Location: index.html');
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Hasil Hitung Tabungan Bulanan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 2rem;
            max-width: 400px;
        }
        #result {
            margin-top: 1rem;
            padding: 1rem;
            background: #f4f4f4;
            border-radius: 4px;
        }
        a {
            display: inline-block;
            margin-top: 1rem;
            text-decoration: none;
            color: blue;
        }
    </style>
</head>
<body>

    <h2>Hasil Hitung Tabungan Bulanan</h2>
    <div id="result">
        <?= $hasil ?>
    </div>

    <a href="index.html">&larr; Kembali ke Form</a>

</body>
</html>