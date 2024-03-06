<?php
session_start();
include_once("koneksi.php");


if (!isset($_SESSION['status']) || $_SESSION['status'] != 'login') {
    echo "<script>
        alert('Anda belum login!');
        location.href='../Admin/index.php';
        </script>";
    exit;
}


$fotoid = $_POST['fotoid'];
$isikomentar = $_POST['isikomentar'];
$userID = $_SESSION['userID'];


$blacklist = array("gila", "jelek","anjir","wtf","bodoh"); 
$isClean = true;
foreach ($blacklist as $word) {
    if (stripos($isikomentar, $word) !== false) {
        $isClean = false;
        break;
    }
}


if ($isClean) {
   
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
   
    echo "<script>
        alert('Komentar mengandung kata-kata kasar!');
        window.history.back();
        </script>";
}
?>
