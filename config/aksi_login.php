<?php
session_start();
include 'koneksi.php';

$Username = $_POST['Username'];
$Password = md5($_POST['Password']); // Gunakan md5 atau metode hash lainnya untuk membandingkan password

$sql = mysqli_query($koneksi, "SELECT * FROM user WHERE Username='$Username' AND Password='$Password'");

$cek = mysqli_num_rows($sql);

if ($cek > 0) {
    $data = mysqli_fetch_array($sql);

    $_SESSION['Username'] = $data['Username'];
    $_SESSION['userID'] = $data['userID'];
    // $_SESSION['role'] = $data['role'];
    $_SESSION['status'] = 'login';

    // Sesuaikan redirect berdasarkan jenis pengguna
    if ($Username === 'admin') {
        header("Location: ../admin/index.php");
    } else {
        header("Location: ../user/index.php");
    }
    exit;
} else {
    echo "<script>
    alert('Username atau Password salah');
    location.href='../login.php';
    </script>";
}
