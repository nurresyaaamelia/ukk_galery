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


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!isset($_POST['fotoid']) || empty($_POST['fotoid'])) {
        echo "<script>alert('Fotoid tidak valid!'); window.history.back();</script>";
        exit;
    }

    $fotoid = $_POST['fotoid'];
    $reason = isset($_POST['alasan']) ? $_POST['alasan'] : '';
    $username = isset($_SESSION['Username']) ? $_SESSION['Username'] : ''; 
    $tanggalLapor = date("Y-m-d"); 

   
    $query = "INSERT INTO report (fotoid, Username, reason, TanggalLapor) 
              VALUES (?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($koneksi, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssss", $fotoid, $username, $reason, $tanggalLapor);
        if (mysqli_stmt_execute($stmt)) {
            
            echo "<script>
                alert('Laporan berhasil dikirim!');
                window.history.go(-1);
                </script>";
            exit;
        } else {
           
            echo "<script>alert('Terjadi kesalahan saat menyimpan laporan!'); window.history.back();</script>";
            exit;
        }
    } else {
       
        echo "<script>alert('Terjadi kesalahan dalam persiapan laporan!'); window.history.back();</script>";
        exit;
    }
} else {
    
    header("Location: ../admin/index.php");
    exit;
}
?>
