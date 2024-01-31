<?php 
    require "function.php";
    $id = $_GET["id"];
    
    $siswa = query("SELECT * FROM datasiswa WHERE idsiswa = $id ")[0];
    
    if(isset($_POST['submit'])){
        if(ubah($_POST)>0){
            echo "
                    <script>
                        alert('Data Berhasil DiUbah!');
                        document.location.href ='siswa.php';
                    </script>
                ";       
        }else{
            echo "
                    <script>
                        alert('Data Gagal DiUbah!');
                    </script>
                ";       
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Siswa</title>
</head>
<body>
    <form method = "post"action = "">
    <ul>
        <li>
            <input type="hidden"name = "id" value="<?= $siswa["idsiswa"]; ?>">
        </li>
        <li><label>
            Nama:
            <input type="text"name = "Nama" value="<?= $siswa['nama_siswa']; ?>" required>
        </label></li>
        <li><label>
            Kelas:
            <input type="text"name = "Kelas" value="<?= $siswa['kelas']; ?>"  required>
        </label></li>
        <li><label>
            Foto:
            <input type="text"name = "foto" value="<?= $siswa['foto']; ?>">
        </label></li>
        <li><button name="submit">Submit</button></li>
    </ul>
    </form> 
</body>
</html>