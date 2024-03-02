<?php
session_start();
include_once("koneksi.php");

// Cek apakah pengguna sudah login
if (!isset($_SESSION['status']) || $_SESSION['status'] != 'login') {
    echo "<script>
        alert('Anda belum login!');
        location.href='../index.php';
        </script>";
    exit;
}

// Ambil ID komentar dari URL
$id = $_POST['id'];
$fotoid = $_POST['fotoid'];
$userID = $_SESSION['userID'];

// Hapus komentar dari database
$query = mysqli_query($koneksi, "DELETE FROM komentar WHERE komentarid='$id' ");

if ($query) {
    header("Location: {$_SERVER['HTTP_REFERER']}");

} else {
    echo "<script>
        alert('Gagal menghapus komentar!');
        window.history.back();
        </script>";
}
?>
