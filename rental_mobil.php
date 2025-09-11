<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.html');
    exit;
}

$lamaSewa = isset($_POST['lamaSewa']) ? (int)$_POST['lamaSewa'] : 0;
$sopir = isset($_POST['sopir']);
$asuransi = isset($_POST['asuransi']);

$hargaMobilPerHari = 300000;
$hargaSopirPerHari = 150000;
$hargaAsuransi = 50000;

$total = $lamaSewa * $hargaMobilPerHari;

if ($sopir) {
    $total += $lamaSewa * $hargaSopirPerHari;
}

if ($asuransi) {
    $total += $hargaAsuransi;
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Hasil Perhitungan Rental Mobil</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 2rem;
            max-width: 400px;
        }
        #result {
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

    <h2>Hasil Perhitungan Rental Mobil</h2>
    <div id="result">
        <p>Mobil: Rp <?php echo number_format($hargaMobilPerHari); ?> x <?php echo $lamaSewa; ?> hari = Rp <?php echo number_format($hargaMobilPerHari * $lamaSewa); ?></p>

        <p>Sopir: <?php echo $sopir ? "Rp " . number_format($hargaSopirPerHari) . " x $lamaSewa hari = Rp " . number_format($hargaSopirPerHari * $lamaSewa) : "Tidak disewa"; ?></p>

        <p>Asuransi: <?php echo $asuransi ? "Rp " . number_format($hargaAsuransi) . " (sekali bayar)" : "Tidak dipilih"; ?></p>

        <hr>

        <p><strong>Total Biaya: Rp <?php echo number_format($total); ?></strong></p>

        <a href="index.html">&larr; Kembali ke Form</a>
    </div>

</body>
</html>
