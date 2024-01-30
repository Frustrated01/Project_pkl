<?php

include 'controller/conn.php';

// Query untuk mendapatkan data
$query = "SELECT * FROM instansi";
$result = $conn->query($query);

// Inisialisasi array untuk menyimpan data
$data = array();

// Ambil data dari hasil query
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Tutup koneksi ke database
$conn->close();

// Mengirim data sebagai JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
