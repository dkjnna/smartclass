<?php
session_start();


// Fungsi untuk memeriksa apakah pengguna adalah admin (contoh: username=admin, password=admin)
function isAdmin($username, $password, $koneksi) {
    include "koneksi.php";
$user = mysqli_real_escape_string($koneksi, $username);
$pass = mysqli_real_escape_string($koneksi, $password);
    $query ="SELECT * FROM admin WHERE username = '$user' AND password = '$pass'";
    $result=mysqli_query($koneksi, $query);
    return mysqli_num_rows($result)>0;
}
if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $username=$_POST['username'];
    $password=$_POST['password'];

    if (isAdmin($username, $password, $koneksi)) {
        $_SESSION['username'] = $username; // Simpan nama admin ke dalam session
        $_SESSION['admin_logged_in'] = true;
        header('location:index.php');
    }else{
        header('location: login.php');
    }
}else{
    header('location: login.php');

}
?>
