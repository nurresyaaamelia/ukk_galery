<?php
// Koneksi ke database
$servername = "localhost";
$username_db = "root"; // Ganti dengan username MySQL Anda
$password_db = ""; // Ganti dengan password MySQL Anda
$database = "db_galery"; // Ganti dengan nama database Anda

// Buat koneksi
$conn = new mysqli($servername, $username_db, $password_db, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil parameter GET fotoid dan lokasifile
if (isset($_GET['fotoid']) && isset($_GET['lokasifile'])) {
    $fotoid = $_GET['fotoid'];
    $lokasifile = $_GET['lokasifile'];

    // Hapus foto dari server
    $foto_path = "../assets/img/" . $lokasifile;
    if (file_exists($foto_path)) {
        unlink($foto_path);
    }

    // Hapus data foto dari database
    $sql = "DELETE FROM foto WHERE fotoid = $fotoid";
    if ($conn->query($sql) === TRUE) {
        // Foto berhasil dihapus, redirect ke halaman report
        header("Location: ../admin/laporan.php");
        exit(); // Penting untuk menghentikan eksekusi skrip setelah redirect
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Tutup koneksi
$conn->close();
?>
