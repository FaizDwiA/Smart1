<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <img src="logo.png" alt="logo">
    <div style="text-align: center;" class="Navbar">
        <h1>REKAP KETUNTASAN PESERTA DIDIK SMK ADI SANGGORO</h1>
        <h2>SMK Adi Sanggoro</h2>
        <h2>Tahun Ajaran 2024/2025</h2>
    </div>
</header>
<div class="Nav">
    <form action="" method="POST">
        <p>Nama Guru:<input type="text" name="guru" value="" placeholder="Nama Guru" required></p>
        <p>Mata Pelajaran:<input type="text" name="mapel" value="" placeholder="Mata Pelajaran" required></p>
        <p>KKM:<input type="number" name="kkm" value="" min="0" max="100" placeholder="KKM" required></p>
        <div class="kelas-row">
            <select name="kelas" required>
                <option value="">Pilih Kelas</option>
                <option value="1">XII RPL 1</option>
                <option value="2">XII RPL 2</option>
            </select>
            <input type="submit" name="ok" value="OK">
        </div>
    </form>
</div>

<?php
if (isset($_POST["ok"])) {
    $guru = $_POST['guru'];
    $mapel = $_POST['mapel'];
    $kkm = $_POST['kkm'];
    $kelas = $_POST['kelas'];

    $siswa = ($kelas == 1) ? array(
        [10116, 'Budi'],
        [10117, 'Budiono'],
        [10118, 'Cahya'],
        [10119, 'Dian'],
        [10120, 'Lina']
    ) : array(
        [10126, 'Arya'],
        [10127, 'Yanto'],
        [10128, 'Tia'],
        [10129, 'Rido'],
        [10130, 'Andre']
    );
?>

<form class="tabel" method="POST">
    <input type='hidden' name='guru' value='<?= $guru; ?>' readonly>
    <input type='hidden' name='mapel' value='<?= $mapel; ?>' readonly>
    <input type='hidden' name='kkm' value='<?= $kkm; ?>' readonly>
    <input type='hidden' name='kelas' value='<?= $kelas; ?>' readonly>
    <table border="1">
        <tr>
            <td>No</td>
            <td>NIS</td>
            <td>Nama</td>
            <td>Nilai</td>
        </tr>
        <?php
        $no = 1;
        foreach ($siswa as $y) {
        ?>
        <tr>
            <td><?= $no; ?></td>
            <td><input type='text' name='nis[]' value='<?= $y[0]; ?>' readonly></td>
            <td><input type='text' name='nama[]' value='<?= $y[1]; ?>' readonly></td>
            <td><input type='number' name='nilai[]' placeholder='Input Nilai' min='0' max='100' style='width: 100px;' required></td>
        </tr>
        <?php $no++; } ?>
    </table>
    <input class="btn" type="submit" name="submit" value="Konfirmasi">
</form>

<?php } ?>

<div class="result">

<?php
if (isset($_POST["submit"])) {
    $gr = $_POST['guru'];
    $mapel = $_POST['mapel'];
    $kkm = $_POST['kkm'];
    $kelas = $_POST['kelas'];
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $nilai = $_POST['nilai'];
    if ($kelas == 1) {
        $kelas = "XII RPL 1";
    } else {
        $Kelas = "XII RPL 2";
    }
?>
<table>
    <tr>
        <td>Nama Guru</td>
        <td>:</td>
        <td><?= $gr; ?></td>
        <td>Mata Pelajaran</td>
        <td>:</td>
        <td><?= $mapel; ?></td>
        <td>KKM</td>
        <td>:</td>
        <td><?= $kkm; ?></td>
        <td>Kelas</td>
        <td>:</td>
        <td><?= $kelas; ?></td>

    </tr>
</table>
</div>


<table border="1" class="tabel-input">
    <tr>
        <td>No</td>
        <td>NIS</td>
        <td>Nama</td>
        <td>Nilai</td>
        <td>Status</td>
    </tr>
    <?php
    $s = count($nis);
    $no = 1;
    for ($i = 0; $i < $s; $i++) {
    ?>
    <tr>
        <td><?= $no; ?></td>
        <td><?= $nis[$i]; ?></td>
        <td><?= $nama[$i]; ?></td>
        <td><?= $nilai[$i]; ?></td>
        <td><?= ($nilai[$i] >= $kkm) ? "Kompeten" : "Belum Kompeten"; ?></td>
    </tr>
    <?php $no++; } ?>
</table>

<?php } ?>

</body>
</html>
