<?php
include "connection.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    // Hapus data akun dari tabel users
    $sql = "DELETE FROM users WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Akun berhasil dihapus.'); window.location.href='add_admin.php';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan saat menghapus akun.'); window.location.href='add_admin.php';</script>";
    }
} else {
    echo "<script>alert('Aksi tidak valid.'); window.location.href='add_admin.php';</script>";
}
?>
