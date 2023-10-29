<?php
@include 'connection.php';
session_start();
$id = $_SESSION['id'];
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

    <!-- Konten -->
   <div style="margin-left: 250px; padding: 30px;">
        <h1>Data Pengajuan Pengadaan Tanah</h1>
        <a href="/form_perencanaan.php" class="btn btn-primary"> Ajukan Pengadaan Tanah <i class="fa-solid fa-plus"></i></a>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">id formulir perencanaan</th>
                    <th scope="col">id</th>
                    <th scope="col">Nama Intansi</th>
                    <th scope="col">Pimpinan Intansi Yang Memerlukan Tanah</th>
                    <th scope="col">Peruntukan Pembangunan</th>
                    <th scope="col">Kategori Proyek (PSN/Non PSN)</th>
                    <th scope="col">Letak Tanah</th>
                    <th scope="col">Kelurahan/Desa</th>
                    <th scope="col">Kecamatan</th>
                    <th scope="col">Koordinat Centroid Lintang</th>
                    <th scope="col">Koordinat Centroid Bujur</th>
                    <th scope="col">Alamat Lokasi Tanah</th>
                    <th scope="col">Rencana Tata Ruang</th>
                    <th scope="col">Perkiraan Luas Tanah</th>
                    <th scope="col">Perkiraan Panjang</th>
                    <th scope="col">Perkiraan Alokasi Anggaran</th>
                    <th scope="col">Target Mulai Persiapan</th>
                    <th scope="col">Target Mulai Pelaksanaan</th>
                    <th scope="col">Dokumen Sumber Daya</th>
                    <th scope="col">Keterangan</th>
                    <th colspan="3" scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = mysqli_query($conn, "SELECT * FROM perencanaan JOIN user ON user.id = perencanaan.id");

                while($row = mysqli_fetch_array($query)){
                ?>
                <tr>
                    <td><?php echo $row['id_formulir_perencanaan']?></td>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['nama_intansi']?></td>
                    <td><?php echo $row['pimpinan_intansi']?></td>
                    <td><?php echo $row['peruntukan_pembangunan'] ?></td>
                    <td><?php echo $row['kategori_proyek']?></td>
                    <td></td>
                    <td><?php echo $row['kelurahan_desa']?></td>
                    <td><?php echo $row['kecamatan']?></td>
                    <td><?php echo $row['koordinat_lintang']?></td>
                    <td><?php echo $row['koordinat_bujur']?></td>
                    <td><?php echo $row['alamat_lokasi_tanah'] ?></td>
                    <td><?php echo $row['rencana_tata_ruang']?></td>
                    <td><?php echo $row['perkiraan_luas_tanah']?></td>
                    <td><?php echo $row['perkiraan_panjang']?></td>
                    <td><?php echo $row['perkiraan_alokasi']?></td>
                    <td><?php echo $row['target_mulai_persiapan']?></td>
                    <td><?php echo $row['target_mulai_pelaksanaan']?></td>
                    <td><?php echo $row['dokumen_sumber_data']?></td>
                    <td><?php echo $row['keterangan']?></td>
                    <td><a href="edit_perencanaan.php?id=<?php echo $row['id_formulir_perencanaan']; ?>" class="fas fa-edit bg-warning p-2 text-white rounded" data-toggle="tooltip" title="Edit"></a></td>
                    <td><a href="hapus_perencanaan.php?id=<?php echo $row['id_formulir_perencanaan']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" class="fas fa-trash-alt bg-danger p-2 text-white rounded" data-toggle="tooltip" title="Delete"></a></td>
                    <td><a href="detail_perencanaan.php?id=<?php echo $row['id_formulir_perencanaan']; ?>" class="fa-solid fa-circle-info bg-success p-2 text-white rounded" style="text-decoration: none;" data-toggle="tooltip" title="Detail"></a></td>
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
