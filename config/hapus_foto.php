<?php

$servername = "localhost";
$username_db = "root"; 
$password_db = ""; 
$database = "db_galery"; 


$conn = new mysqli($servername, $username_db, $password_db, $database);


if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}


if (isset($_GET['fotoid']) && isset($_GET['lokasifile'])) {
    $fotoid = $_GET['fotoid'];
    $lokasifile = $_GET['lokasifile'];

    
    $foto_path = "../assets/img/" . $lokasifile;
    if (file_exists($foto_path)) {
        unlink($foto_path);
    }

   
    $sql = "DELETE FROM foto WHERE fotoid = $fotoid";
    if ($conn->query($sql) === TRUE) {
       
        header("Location: ../admin/laporan.php");
        exit(); 
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


$conn->close();
?>
