<?php
include "connection.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    // Ambil data yang diinputkan oleh pengguna
    $Username = $_POST["newUsername"];
    $newEmail = $_POST["newEmail"];
    $newPassword = md5($_POST["newPassword"]);
    $newRole = $_POST["newRole"];

    // Insert data akun baru ke dalam tabel users
    $insertSql = "INSERT INTO users (username, email, password, role) VALUES ('$newUsername', '$newEmail', '$newPassword', '$newRole')";
    if (mysqli_query($conn, $insertSql)) {
        echo "<script>alert('Akun berhasil ditambahkan.'); window.location.href='add_admin.php';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan saat menambahkan akun.'); window.location.href='tambah_akun.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- CDN Boostrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- Fontawesome icon -->
    <link rel="stylesheet" href="/fontawesome-free-6.4.0-web/css/all.min.css">
    <link rel="stylesheet" href="/css/sidebar.css">
    <title>Tambah Akun</title>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2 class="text-center"><a href="dashboard.php">Dashboard</a></h2>
        <ul>
            <!-- Daftar menu sidebar -->
        </ul>
    </div>

    <div style="margin-left: 250px; padding: 20px;">
        <h1>Tambah Akun</h1>
        <br>
        <form method="POST">
            <div class="mb-3">
                <label for="newUsername" class="form-label">Username</label>
                <input type="text" class="form-control" id="newUsername" name="newUsername">
            </div>
            <div class="mb-3">
                <label for="newEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="newEmail" name="newEmail">
            </div>
            <div class="mb-3">
                <label for="newPassword" class="form-label">Password</label>
                <input type="password" class="form-control" id="newPassword" name="newPassword">
            </div>
            <div class="mb-3">
                <label for="newRole" class="form-label">Role</label>
                <select class="form-select" id="newRole" name="newRole">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <input type="button" value="Kembali" onclick="history.back()" class="btn btn-secondary">
            <button type="submit" class="btn btn-primary" name="submit">Tambah Akun</button>
        </form>
    </div>

    <!-- Di sini Anda bisa menyisipkan konten dari halaman yang sesuai -->
</body>
</html>
