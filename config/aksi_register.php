<?php 
include 'koneksi.php';

$Username = $_POST['Username'];
$Password = md5($_POST['Password']);
$Email = $_POST['Email'];
$Namalengkap = $_POST['Namalengkap'];
$Alamat = $_POST['Alamat'];


$checkQuery = mysqli_query($koneksi, "SELECT * FROM user WHERE Username='$Username' OR Email='$Email'");
if (mysqli_num_rows($checkQuery) > 0) {
    echo "<script>
    alert('Username atau Email sudah digunakan');
    location.href='../register.php'; // Ubah sesuai halaman registrasi Anda
    </script>";
    exit; 
}


$sql = mysqli_query($koneksi, "INSERT INTO user (Username, Password, Email, Namalengkap, Alamat) VALUES ('$Username','$Password','$Email','$Namalengkap','$Alamat')");

if ($sql) {
    echo "<script>
    alert('pendaftaran akun berhasil');
    location.href='../login.php';
    </script>";
}
?>
