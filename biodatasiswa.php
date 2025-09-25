<?php
// Inisialisasi variabel
$jumlah = isset($_POST['jumlah']) ? (int)$_POST['jumlah'] : 0;
$data_siswa = [];

if (isset($_POST['submit_data'])) {
    // Ambil semua data siswa dari POST
    for ($i = 0; $i < $_POST['jumlah_data']; $i++) {
        $data_siswa[] = [
            'nama' => $_POST['nama'][$i],
            'umur' => $_POST['umur'][$i],
            'alamat' => $_POST['alamat'][$i]
        ];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Biodata Siswa (Metode Array)</title>
</head>
<body>

<h2>Form Biodata Siswa</h2>

<?php if ($jumlah == 0 && !isset($_POST['submit_data'])): ?>
    <!-- Form Input Jumlah Data -->
    <form method="post">
        <label>Masukkan Jumlah Siswa:</label>
        <input type="number" name="jumlah" min="1" required>
        <br><br>
        <button type="submit">Lanjut</button>
    </form>

<?php elseif (!isset($_POST['submit_data'])): ?>
    <!-- Form Input Data Siswa -->
    <form method="post">
        <input type="hidden" name="jumlah_data" value="<?php echo $jumlah; ?>">
        <?php for ($i = 0; $i < $jumlah; $i++): ?>
            <fieldset style="margin-bottom: 20px;">
                <legend>Siswa ke-<?php echo $i + 1; ?></legend>
                <label>Nama:</label><br>
                <input type="text" name="nama[]" required><br><br>

                <label>Umur:</label><br>
                <input type="number" name="umur[]" required><br><br>

                <label>Alamat:</label><br>
                <textarea name="alamat[]" required></textarea>
            </fieldset>
        <?php endfor; ?>
        <button type="submit" name="submit_data">Simpan Data</button>
    </form>

<?php else: ?>
    <!-- Tampilkan Data Siswa -->
    <h3>Data Siswa:</h3>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Umur</th>
            <th>Alamat</th>
        </tr>
        <?php foreach ($data_siswa as $index => $siswa): ?>
            <tr>
                <td><?php echo $index + 1; ?></td>
                <td><?php echo htmlspecialchars($siswa['nama']); ?></td>
                <td><?php echo htmlspecialchars($siswa['umur']); ?></td>
                <td><?php echo htmlspecialchars($siswa['alamat']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <br>
    <a href="<?php echo $_SERVER['PHP_SELF']; ?>">Input Lagi</a>
<?php endif; ?>

</body>
</html>