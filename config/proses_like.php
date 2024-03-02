<?php
session_start();
include 'koneksi.php';

$fotoid = $_GET['fotoid'];
$userID = $_SESSION['userID'];

$ceksuka = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid' AND userID='$userID'");

if (mysqli_num_rows($ceksuka) == 1) {
    while ($row = mysqli_fetch_assoc($ceksuka)) {
        $likeid = $row['likeid'];
        $query = mysqli_query($koneksi, "DELETE FROM likefoto WHERE likeid='$likeid'");
    }
} else {
    $tanggallike = date('Y-m-d');
    $query = mysqli_query($koneksi, "INSERT INTO likefoto VALUES('','$fotoid','$userID','$tanggallike')");
}

// Redirect back to the page where the action was performed
header("Location: {$_SERVER['HTTP_REFERER']}");
exit();
?>
