<?php 

$conn = mysqli_connect('localhost','root','','siswa');
function query($query){
    global $conn;
    $res = mysqli_query($conn,$query);
    $rows=[];
    while($row = mysqli_fetch_assoc($res)){
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data){
    global $conn;
    $nama =htmlspecialchars($data['Nama']) ;
    $kelas= htmlspecialchars($data['Kelas']);
    $foto = htmlspecialchars($data['foto']);

    $query = (
                  "INSERT INTO datasiswa 
                   VALUES ('','$nama','$kelas','$foto')"
                );
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn) or die(mysqli_error($conn));
}

function hapus($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM datasiswa WHERE idsiswa =$id");

    return mysqli_affected_rows($conn) or die(mysqli_error($conn));
}
function ubah($data){
    global $conn;
    $id = $data['id'];
    $nama =htmlspecialchars($data['Nama']) ;
    $kelas= htmlspecialchars($data['Kelas']);
    $foto = htmlspecialchars($data['foto']);
    
    $query = "UPDATE datasiswa SET nama_siswa = '$nama',kelas = '$kelas',foto = '$foto' WHERE idsiswa =$id ";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn) or die(mysqli_error($conn));
}


function cari($key){
    global $conn;

    $query = "SELECT * FROM datasiswa WHERE nama_siswa LIKE '%$key%' OR ke LIKE '%$key%'  ";
    $res = mysqli_query($conn,$query);
    $rows = [];
    while($row = mysqli_fetch_assoc($res)){
        $rows[] = $row;
    }
    return $rows;
}
?>