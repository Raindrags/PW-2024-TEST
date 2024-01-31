<?php 
    session_start();

    if(!isset($_session['login'])){
        header("location:login.php");
        exit;
    }
    require "function.php";
    $siswa = query("SELECT * FROM datasiswa");

    if(isset($_POST['cari'])){
        $key =$_POST['key'];
        $siswa = cari($key);
    }

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
    <br>
    <form method = "post"action = "">
        <input type="text" name="key" id="key" class="keyword" placeholder="masukan keyword yang akan dicari...." autocomplete="off" autofocus size="40">
        <button type="submit" name="cari" class="tombol-cari">Cari</button>

    </form>
    <div class="container">
    <table border="1" cellpadding="10" cellspacing ="0">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nama</th>
            <th>Aksi</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach($siswa as $row): ?>
        <tr>
            <td><?= $i++; ?></td>
            <td><img src="img/<?= $row['foto']; ?>" width="60px" alt=""></td> 
            <td><?= $row['nama_siswa']; ?></td>
            <td><a href="detail.php?id=<?= $row['idsiswa']; ?>" >Lihat Details</a></td>   
        </tr>
        <?php endforeach; ?>

        <?php if(empty($siswa)): ?>
        <tr>
            <td colspan="4"><p>data tidak ditemukan.</p></td>
        </tr>
        <?php endif; ?>
    </table>
    </div>


    <script src="js/script.js"></script>
</body>
</html>