<?php
session_start();
include 'koneksi.php';

// Memeriksa apakah pengguna sudah login
if ($_SESSION['status'] != 'login') {
    echo "<script>
    alert('Anda belum login!');
    location.href='../index.php';
    </script>";
    exit(); // tambahkan pernyataan exit() untuk menghentikan eksekusi skrip
}

// Memeriksa apakah tombol hapus telah ditekan
if (isset($_POST['hapus'])) {
    $userID = $_POST['userid'];

    // Menghapus data pengguna dari database
    $query = "DELETE FROM user WHERE userID = '$userID'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        // Jika penghapusan berhasil
        echo "<script>
        alert('Data pengguna berhasil dihapus!');
        location.href='../admin/user.php';
        </script>";
        exit(); // tambahkan pernyataan exit() untuk menghentikan eksekusi skrip
    } else {
        // Jika penghapusan gagal
        echo "<script>
        alert('Gagal menghapus data pengguna!');
        location.href='../admin/user.php';
        </script>";
        exit(); // tambahkan pernyataan exit() untuk menghentikan eksekusi skrip
    }
} else {
    // Jika tombol hapus tidak ditekan
    header("Location: ../user.php");
    exit(); // tambahkan pernyataan exit() untuk menghentikan eksekusi skrip
}
?>
