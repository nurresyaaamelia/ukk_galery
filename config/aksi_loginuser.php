<?php 
session_start();
include 'koneksi.php';

$Username = $_POST['Username'];
$Password = $_POST['Password'];

$sql = mysqli_query($koneksi, "SELECT * FROM user WHERE Username='$Username'");

$cek = mysqli_num_rows($sql);

if ($cek > 0){
    $data = mysqli_fetch_array($sql);

    $_SESSION['Username'] = $data['username'];
    $_SESSION['userID'] = $data['userID'];
    $_SESSION['status'] = 'login';
    echo "<script>
    alert('login berhasil');
    location.href='../user/index.php';
    </script>";
}else{
    echo "<script>
    alert('Username atau Password salah');
    location.href='../login.php';
    </script>";
}


?>