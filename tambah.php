<?php 
    require "function.php";
    if(isset($_POST['submit'])){
        if(tambah($_POST)>0){
            echo "
                    <script>
                        alert('Data Berhasil Ditambahkan!');
                        document.location.href ='siswa.php';
                    </script>
                ";       
        }else{
            echo "
                    <script>
                        alert('Data Gagal Ditambahkan!');
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
        <li><label>
            Nama:
            <input type="text"name = "Nama" required>
        </label></li>
        <li><label>
            Kelas:
            <input type="text"name = "Kelas" required>
        </label></li>
        <li><label>
            Foto:
            <input type="text"name = "foto">
        </label></li>
        <li><button name="submit">Submit</button></li>
    </ul>
    </form> 
</body>
</html>