<?php 
    require "function.php";

    $id = $_GET["id"];
    $siswa = query("SELECT * FROM datasiswa WHERE idsiswa = $id")[0];
    
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
</head>
<body>
    <h3>Detail Data Siswa</h3>
    <ul>
        <li> <img src="img/<?= $siswa["foto"]; ?>" width="100px" alt=""></li>
        <li>Nama: <?= $siswa["nama_siswa"]; ?></li>
        <li>Kelas: <?= $siswa["kelas"]; ?></li>
        <li><a href="ubah.php?id=<?= $siswa['idsiswa']; ?>">Ubah</a> |<a href="hapus.php?id=<?= $siswa['idsiswa']; ?>" onclick="return confirm('yakin?');">Hapus</a></li>
    </ul>
</body>
</html>