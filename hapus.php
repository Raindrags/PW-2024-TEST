<?php 
   session_start();

   if(!isset($_session['login'])){
       header("location:login.php");
       exit;
   }
    require 'function.php';
    
    $id = $_GET["id"];
    
    if(hapus($id)>0){
        echo "
        <script>
            alert('Data Berhasil Dihapus!');
            document.location.href ='siswa.php';
        </script>
    ";       
    }else{
        echo "
        <script>
            alert('Data Gagal Dihapus!');
            document.location.href ='siswa.php';
        </script>
    ";       
    }

?>