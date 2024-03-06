<?php
session_start();
include 'koneksi.php';


if ($_SESSION['status'] != 'login') {
    echo "<script>
    alert('Anda belum login!');
    location.href='../index.php';
    </script>";
    exit(); 
}


if (isset($_POST['hapus'])) {
    $userID = $_POST['userid'];

   
    $query = "DELETE FROM user WHERE userID = '$userID'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
      
        echo "<script>
        alert('Data pengguna berhasil dihapus!');
        location.href='../admin/user.php';
        </script>";
        exit(); 
    } else {
        
        echo "<script>
        alert('Gagal menghapus data pengguna!');
        location.href='../admin/user.php';
        </script>";
        exit(); 
    }
} else {
    
    header("Location: ../user.php");
    exit(); 
}
?>
