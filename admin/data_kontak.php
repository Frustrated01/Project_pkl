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

if(isset($_SESSION["email"])){
    header("location:/kontak.php");
}
$query = "SELECT * FROM kontak";
$result = mysqli_query($conn, $query);
if(isset($_POST["cari"])){
    $keyword = $_POST["keyword"];
    function cari($conn, $keyword){
        $query = "SELECT * FROM kontak WHERE nama LIKE '%$keyword%' OR email LIKE '%$keyword%' OR pesan LIKE '%$keyword%'"; 
        return mysqli_query($conn, $query);
    }

    $result = cari($conn, $keyword);
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
    <title>Data Kontak</title>
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

    <!-- Konten -->
    <div style="margin-left: 250px; padding: 20px;">
        <h1>Data Kontak</h1>
        <form action="" method="post">

            <input type="text" name="keyword" size="40" autofocus placeholder=" Masukan keyword Pencarian.." autocomplete="off">
            <button type="submit" name="cari">Cari</button>

        </form>
        <br>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">id pesan</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Pesan</th>
                    <th colspan="1" scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $row['id_kontak'] ?></td>
                    <td><?php echo $row['nama']?></td>
                    <td><?php echo $row['email']?></td>
                    <td><?php echo $row['pesan']?></td>
                    <td><a href="hapus/hapus_kontak.php" onclick="return confirm('apakah anda yakin?')" class="fas fa-trash-alt bg-danger p-2 text-white rounded" data-toggle="tooltip" title="Delete"></a></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <!-- Di sini Anda bisa menyisipkan konten dari halaman yang sesuai -->
    </div>
    
</body>
</html>
