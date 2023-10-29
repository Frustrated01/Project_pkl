<?php
include 'connection.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    // Buat query untuk menghapus data berdasarkan id
    $query = "DELETE FROM perencanaan WHERE id_formulir_perencanaan = $id";
    
    if(mysqli_query($conn, $query)){
        // Tampilkan pesan pop-up jika penghapusan berhasil
        echo "<script>alert('Data berhasil dihapus'); window.location.href='data_perencanaan.php';</script>";
        exit();
    } else {
        echo "Gagal menghapus data: " . mysqli_error($conn);
    }
} else {
    echo "ID tidak ditemukan.";
}
?>
