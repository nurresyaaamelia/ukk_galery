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

       
        $query = "DELETE FROM album WHERE AlbumID = '$albumid'";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
          
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
           
            echo "<script>
            alert('Gagal menghapus album');
            location.href='../config/album.php';
            </script>";
        }
    }
}
