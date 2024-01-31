<?php 
require "../function.php";
$siswa = cari($_GET['keyword']);
?>
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