<?php
session_start();
include '../config/koneksi.php';

if ($_SESSION['status'] != 'login') {
    echo "<script>
    alert('Anda belum login!');
    location.href='../index.php';
    </script>";
} else {
    if (isset($_POST['hapus'])) {
        $albumid = $_POST['albumid'];

        // Hapus album dari database
        $query = "DELETE FROM album WHERE AlbumID = '$albumid'";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            // Jika berhasil dihapus, kembalikan ke halaman album dengan pesan sukses
            if( $_SESSION['Username'] === "admin"){
                echo "<script>
                alert('Album berhasil dihapus');
                location.href='../admin/album.php';
                </script>";
            }else{
                echo "<script>
                alert('Album berhasil dihapus');
                location.href='../user/album.php';
                </script>";
            }
            
        } else {
            // Jika gagal, kembalikan ke halaman album dengan pesan gagal
            echo "<script>
            alert('Gagal menghapus album');
            location.href='../config/album.php';
            </script>";
        }
    }
}
