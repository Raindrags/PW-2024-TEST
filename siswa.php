<?php 
    require "function.php";
    $siswa = query("SELECT * FROM datasiswa");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa</title>
</head>
<body>
    <h3>Daftar Siswa</h3>
    <a href="tambah.php">Tambah Data Siswa</a>
    <table border="1" cellpadding="10" cellspacing ="0">
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach($siswa as $row): ?>
        <tr>
            <td><?= $i++; ?></td>
            <td><?= $row['nama_siswa']; ?></td>
            <td><?= $row['kelas']; ?></td>
            <td><img src="img/<?= $row['foto']; ?>" width="60px" alt=""></td> 
            <td><a href="">Update</a>|<a href="hapus.php?id=<?= $row["idsiswa"]; ?>"onclick="return confirm('yakin?');">Delete</a></td>   
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>