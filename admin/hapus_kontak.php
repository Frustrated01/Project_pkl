<?php
@include 'connection.php';
session_start();

$role = $_SESSION['role'];

if ($role=='user') {
    header("location: user_dashboard.php");    
}
if (!isset($role)) {
    header('location:login.php');
}

if (!isset($_SESSION["email"])) {
    header("location:data_kontak.php");
    exit;
}

if (isset($_GET["id"])) {
    $id_kontak = $_GET["id"];

    // Query untuk menghapus data kontak berdasarkan ID
    $query = "DELETE FROM kontak WHERE id_kontak = $id_kontak";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: data_kontak.php");
        exit;
    } else {
        echo "Gagal menghapus data kontak.";
    }
} else {
    echo "ID kontak tidak valid.";
}
?>
