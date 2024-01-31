<?php 
session_start();

if(isset($_SESSION['login'])){
    header("location:siswa.php");
    exit;
}
require "function.php";
if(isset($_POST['login'])){
    $login = login($_POST);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        p{
            font-size: 20px;
            color: red;
            font-style: italic;
        }
    </style>
</head>
<body>
    <h2>Login Here</h2>
    <form method = "post"action = "">
        <ul>
            <?php if(isset($login['error'])): ?>
            <li>
                <p><?= $login['error']; ?></p>
            </li>
            <?php endif; ?>
            <li>
            <label>
            Username :
            <input type="text"name = "username" autofocus autocomplete="off" required>
        </label>  </li>
            <li><label>
            Password :
            <input type="password"name = "password">
        </label></li>
            <li><button name="login">Login</button></li>
        </ul>
        <li>
            <a href="registrasi.php">tambah user baru</a>
        </li>
        
    </form>    
</body>
</html>