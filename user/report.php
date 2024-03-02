<?php
// Pastikan form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data yang dikirimkan melalui form
    $fotoid = $_POST['fotoid'];
    $alasan = $_POST['alasan'];

    // Lakukan validasi data jika diperlukan

    // Siapkan query untuk menyimpan laporan ke dalam database
    $sql = "INSERT INTO report (FotoID, Username, reason, TanggalLapor) VALUES ('$fotoid', '$username', '$alasan', CURDATE())";

    // Jalankan query
    if ($conn->query($sql) === TRUE) {
        echo "Laporan berhasil disimpan.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>
