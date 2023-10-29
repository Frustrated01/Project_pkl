<?php
include "connection.php";
session_start();
error_reporting(0);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission untuk menyimpan perubahan data pengguna
    $id = $_POST["id"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    $sql = "UPDATE users SET username='$username', email='$email', password='$password', role='$role' WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        echo "Data pengguna berhasil diperbarui.";
    } else {
        echo "Terjadi kesalahan saat memperbarui data pengguna: " . mysqli_error($conn);
    }
} else {
    // Tampilkan formulir edit data pengguna
    $id = $_GET["id"];
    $sql = "SELECT * FROM users WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
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
    <title>Edit Akun</title>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2 class="text-center"><a href="dashboard.php"> </i> Dashboard</a></h2>
        <ul>
        <li><a href="data_perencanaan.php"><i class="fa-solid fa-file"></i> Perancanaan</a></li>
            <li><a href="data_kontak.php"><i class="fa-solid fa-phone"></i> kontak</a></li>
            <li><a href="profil_admin.php"><i class="fa-solid fa-user"></i> Profil</a></li>
            <li><a href="add_admin.php"><i class="fa-solid fa-user-plus"></i> Tambah Admin</a></li>
            <li><a href="/index.php"><i class="fa-solid fa-house"></i> Beranda</a></li>
            <li><a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> log out</a></li>
        </ul>
    </div>

    <div style="margin-left: 250px; padding: 20px;">
        <h1>Edit Data Akun</h1>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?php echo $row['username']; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="<?php echo $row['password']; ?>">
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <input type="text" class="form-control" id="role" name="role" value="<?php echo $row['role']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>

    <!-- Di sini Anda bisa menyisipkan konten dari halaman yang sesuai -->
</body>
</html>
