<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $fotoid = $_POST['fotoid'];
    $alasan = $_POST['alasan'];

    

 
    $sql = "INSERT INTO report (FotoID, Username, reason, TanggalLapor) VALUES ('$fotoid', '$username', '$alasan', CURDATE())";

   
    if ($conn->query($sql) === TRUE) {
        echo "Laporan berhasil disimpan.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>
