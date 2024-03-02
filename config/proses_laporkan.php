<?php
session_start();
include_once("koneksi.php");

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['status']) || $_SESSION['status'] != 'login') {
    echo "<script>
        alert('Anda belum login!');
        location.href='../index.php';
        </script>";
    exit;
}

// Periksa apakah data POST terdefinisi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir laporan
    if (!isset($_POST['fotoid']) || empty($_POST['fotoid'])) {
        echo "<script>alert('Fotoid tidak valid!'); window.history.back();</script>";
        exit;
    }

    $fotoid = $_POST['fotoid'];
    $reason = isset($_POST['alasan']) ? $_POST['alasan'] : '';
    $username = isset($_SESSION['Username']) ? $_SESSION['Username'] : ''; // Sesuaikan dengan nama kolom di tabel user
    $tanggalLapor = date("Y-m-d"); // Ambil tanggal saat ini

    // Masukkan data ke dalam tabel report
    $query = "INSERT INTO report (fotoid, Username, reason, TanggalLapor) 
              VALUES (?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($koneksi, $query);

    // Periksa kesiapan statement
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssss", $fotoid, $username, $reason, $tanggalLapor);
        if (mysqli_stmt_execute($stmt)) {
            // Jika berhasil disimpan, arahkan kembali ke halaman sebelumnya
            echo "<script>
                alert('Laporan berhasil dikirim!');
                window.history.go(-1);
                </script>";
            exit;
        } else {
            // Jika terjadi kesalahan saat mengeksekusi statement
            echo "<script>alert('Terjadi kesalahan saat menyimpan laporan!'); window.history.back();</script>";
            exit;
        }
    } else {
        // Jika terjadi kesalahan saat mempersiapkan statement
        echo "<script>alert('Terjadi kesalahan dalam persiapan laporan!'); window.history.back();</script>";
        exit;
    }
} else {
    // Jika tidak ada data POST, kembali ke halaman sebelumnya
    header("Location: ../admin/index.php");
    exit;
}
?>
