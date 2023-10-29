<?php
include 'connection.php';
session_start();

$role = $_SESSION['role'];

if ($role=='admin') {
    header("location: dashboard.php");    
}
if (!isset($role)) {
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <!-- CDN Boostrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- Fontawesome icon -->
    <link rel="stylesheet" href="/fontawesome-free-6.4.0-web/css/all.min.css">
    <link rel="stylesheet" href="/css/sidebar.css">
    <title>Dashboard</title>
</head>
<body>
     <!-- Sidebar -->
     <div class="sidebar">
        <h2 class="text-center"><a href="user_dashboard.php"></i> Dashboard</a></h2>
        <ul>
            <li><a href="pengajuan_pengadaan_tanah.php"><i class="fa-solid fa-file"></i> Data yang di Ajukan</a></li>
            <li><a href="profil_user.php"><i class="fa-solid fa-user"></i> Profil</a></li>
            <li><a href="/index.php"><i class="fa-solid fa-house"></i> Beranda</a></li>
            <li><a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> log out</a></li>
        </ul>
    </div>

    <div style="margin-left: 250px; padding: 20px;">
    <h1>Selamat Datang <?php echo $_SESSION['username'] ?></h1>
    </div>

   


        <!-- Di sini Anda bisa menyisipkan konten dari halaman yang sesuai -->
    </div>
    
</body>
</html>
