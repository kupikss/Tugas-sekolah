<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Data tetap
    $upahPer7Jam = 50000;    // Rp 50.000 per 7 jam
    $hariKerja = 5;          // 5 hari kerja
    $biayaLemburPerJam = 20000;  // Rp 20.000 per jam lembur

    // Ambil input lembur dari form
    $lembur1 = isset($_POST['lembur1']) ? (int)$_POST['lembur1'] : 0;
    $lembur2 = isset($_POST['lembur2']) ? (int)$_POST['lembur2'] : 0;

    // Hitung upah pokok
    $upahPokok = $hariKerja * $upahPer7Jam;

    // Hitung total lembur dan upah lembur
    $totalLembur = $lembur1 + $lembur2;
    $upahLembur = $totalLembur * $biayaLemburPerJam;

    // Total gaji
    $totalGaji = $upahPokok + $upahLembur;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Hasil Gaji Pekerja</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 2rem;
            max-width: 400px;
        }
        #result {
            background: #f0f0f0;
            padding: 1rem;
            border-radius: 6px;
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

<h2>Hasil Perhitungan Gaji Pekerja Mingguan</h2>

<?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
    <div id="result">
        <p>Upah pokok (5 hari x Rp 50.000) = Rp <?= number_format($upahPokok, 0, ',', '.') ?></p>
        <p>Total jam lembur = <?= $totalLembur ?> jam</p>
        <p>Upah lembur (<?= $totalLembur ?> jam x Rp 20.000) = Rp <?= number_format($upahLembur, 0, ',', '.') ?></p>
        <hr>
        <p><strong>Total gaji mingguan = Rp <?= number_format($totalGaji, 0, ',', '.') ?></strong></p>
    </div>
    <a href="index.html">&larr; Kembali ke Form</a>
<?php else: ?>
    <p>Silakan input data lembur di <a href="index.html">form</a>.</p>
<?php endif; ?>

</body>
</html>