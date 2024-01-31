<?php 
require "function.php";

if(isset($_POST['register'])){
    if(register($_POST)>0){
        echo"
                <script>
                    alert('Data user telah berhasil didaftarkan silahkan login!');
                    document.location.href = 'login.php'
                </script>
            ";
    }else{
        echo "user gagal ditambahkan";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
</head>
<body>
    <form method = "post" action = "">
    <ul>
        <li>
            <label>
                username :
                <input type="text"name = "username" autofocus autocomplete="off" required>
            </label>    
        </li>
        <li>
            <label>
                Password:
                <input type="password" name = "password1" required>
            </label>
        </li>
        <li>
            <label>
                Konfirmasi Password:
                <input type="password" name = "password2"require>
            </label>
        </li>
        <li>
            <button name="register">Register</button>
        </li>
    </ul>
    </form>
</body>
</html>