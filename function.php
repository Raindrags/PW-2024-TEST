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
    $nama = $data['Nama'];
    $kelas= $data['Kelas'];
    $foto = $data['foto'];

    $query = (
                  "INSERT INTO datasiswa 
                   VALUES ('','$nama','$kelas','$foto')"
                );
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}

function hapus($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM datasiswa WHERE idsiswa =$id");

    return mysqli_affected_rows($conn);
}
function ubah($data){
    global $conn;
    $id = $data['id'];
    $nama = $data['Nama'];
    $kelas= $data['Kelas'];
    $foto = $data['foto'];
    
    $query = "UPDATE datasiswa SET nama_siswa = '$nama',kelas = '$kelas',foto = '$foto' WHERE idsiswa =$id ";
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}
?>