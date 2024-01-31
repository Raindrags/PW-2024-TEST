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

    function login($data){
        global $conn;

        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);

        if($user = query("SELECT *FROM user WHERE username = '$username'")[0]){
            if(!password_verify($password,$user['password'])){
                return [
                    'error:'=>true,
                    'pesan' =>'username / password salah'
                ];
            }  
            $_SESSION['login'] = true;
            header("location:siswa.php");
    }
}



    function register($data){
        global $conn;
        $username = htmlspecialchars(strtolower($data['username']));
        $password1 = mysqli_real_escape_string($conn,$data["password1"]);
        $password2 = mysqli_real_escape_string($conn,$data["password2"]);

        if(empty($username)||empty($password1)||empty($password2)){
            echo"
                    <script>
                        alert('username/password tidak boleh kosong!');
                        document.location.href = 'regsitrasi.php'
                    </script>
            ";
            return false;
        }

        if(query("SELECT * FROM user WHERE username ='$username'")){
            echo"
                    <script>
                        alert('username sudah pernah terdaftar!');
                        document.location.href = 'registrasi.php'
                    </script>
            ";
            return false;
        }

        if($password1 !== $password2){
             echo"
                    <script>
                        alert('password dan konfirmasi password tidak sesuai!');
                        document.location.href = 'registrasi.php'
                    </script>
            ";
            return false;
        }

        if(strlen($password1)<5){
            echo"
                    <script>
                        alert('password terlalu pendek!');
                        document.location.href = 'regsitrasi.php'
                    </script>
            ";
            return false;
        }
        
        //jika sudah memenuhi kriteria diatas
        $password_baru = password_hash($password1,PASSWORD_DEFAULT);
        $query = "INSERT INTO user VALUE(null,'$username','$password_baru')";
        mysqli_query($conn,$query)or die(mysqli_error($conn));
        return mysqli_affected_rows($conn);
    }

?>