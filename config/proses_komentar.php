<?php
session_start();
include_once("koneksi.php");

// Cek apakah pengguna sudah login
if (!isset($_SESSION['status']) || $_SESSION['status'] != 'login') {
    echo "<script>
        alert('Anda belum login!');
        location.href='../Admin/index.php';
        </script>";
    exit;
}

// Ambil data dari form
$fotoid = $_POST['fotoid'];
$isikomentar = $_POST['isikomentar'];
$userID = $_SESSION['userID'];

// Filter komentar kasar
$blacklist = array("gila", "jelek","anjir","wtf","bodoh"); // Kata-kata yang dianggap kasar
$isClean = true;
foreach ($blacklist as $word) {
    if (stripos($isikomentar, $word) !== false) {
        $isClean = false;
        break;
    }
}

// Jika komentar bersih, masukkan ke database
if ($isClean) {
    // Masukkan komentar ke database
    $query = mysqli_query($koneksi, "INSERT INTO komentar (fotoid, userID, isikomentar) VALUES ('$fotoid', '$userID', '$isikomentar')");

    if ($query) {
        header("Location: {$_SERVER['HTTP_REFERER']}");

    } else {
        echo "<script>
            alert('Gagal mengirim komentar!');
            window.history.back();
            </script>";
    }
} else {
    // Komentar mengandung kata-kata kasar, tampilkan pesan kesalahan
    echo "<script>
        alert('Komentar mengandung kata-kata kasar!');
        window.history.back();
        </script>";
}
?>
