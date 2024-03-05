<?php
session_start();
include 'koneksi.php';

$_SESSION['role'] = 'admin';
$_SESSION['role'] = 'user';


if (isset($_POST['tambah'])) {
    $NamaAlbum = $_POST['namaalbum'];
    $Deskripsi = $_POST['deskripsi'];
    $TanggalDibuat = date('Y-m-d');
    $UserId = $_SESSION['userID'];
    $_SESSION['role'] = 'user'; // Contoh peran, sesuaikan dengan logika aplikasi Anda

    $sql = mysqli_query($koneksi, "INSERT INTO album (NamaAlbum,Deskripsi,TanggalDibuat,userID) 
            VALUES ('$NamaAlbum','$Deskripsi','$TanggalDibuat','$UserId')");

    if ($sql) {
        if ($_SESSION['role'] === 'admin') {
            header('location:../admin/album.php');
        } elseif ($_SESSION['role'] === 'user') {
            header('location:../user/album.php'); // Sesuaikan dengan halaman user yang benar
        } else {
            // Handle jika peran tidak dikenali, misalnya arahkan ke halaman default
            header('location:../admin/tambahuser.php');
        }
    }
}




if (isset($_POST['edit'])) 
    $albumID = $_POST['AlbumID'];
    $namaAlbum = $_POST['NamaAlbum'];
    $deskripsi = $_POST['Deskripsi'];

    $sql = "UPDATE album SET NamaAlbum='$namaAlbum', Deskripsi='$deskripsi' WHERE AlbumID='$albumID'";
    $result = mysqli_query($koneksi, $sql);

    if ($result) {
        if ($_SESSION['role'] === 'admin') {
            header('location:../admin/album.php');
        } elseif ($_SESSION['role'] === 'user') {
            header('location:../user/album.php');
        } else {
            // Handle jika peran tidak dikenali, misalnya arahkan ke halaman default
            header('location:../admin/tambahuser.php');
        }
    } else {
        echo "<script>
            alert('Gagal mengubah data');
            window.location.href='../admin/album.php';
            </script>";
    }
    
if (isset($_POST['hapus'])) {
    $albumID = $_POST['AlbumID'];

    $sql = "DELETE FROM album WHERE AlbumID='$albumID'";
    $result = mysqli_query($koneksi, $sql);

    if ($sql) {
        if ($_SESSION['role'] === 'admin') {
            header('location:../admin/album.php');
        } elseif ($_SESSION['role'] === 'user') {
            header('location:../user/album.php'); // Sesuaikan dengan halaman user yang benar
        }
    } else {
        echo "<script>
            alert('Gagal menghapus data');
            window.location.href='../admin/album.php';
            </script>";
    }
}
