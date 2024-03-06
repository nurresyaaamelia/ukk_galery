<?php
session_start();
include_once("koneksi.php");


if (!isset($_SESSION['status']) || $_SESSION['status'] != 'login') {
    echo "<script>
        alert('Anda belum login!');
        location.href='../index.php';
        </script>";
    exit;
}


$id = $_POST['id'];
$fotoid = $_POST['fotoid'];
$userID = $_SESSION['userID'];


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
