<?php
@include 'connection.php';

// Periksa apakah parameter 'id' ada dalam URL
if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    // Pastikan untuk menghindari SQL injection dengan menggunakan prepared statement
    $query = "SELECT * FROM perencanaan WHERE id_formulir_perencanaan = ?";
    
    $stmt = mysqli_prepare($conn, $query);
    
    // Periksa apakah statement berhasil dibuat
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
    
        $result = mysqli_stmt_get_result($stmt);
    
        if (!$result) {
            die("Error: " . mysqli_error($conn));
        }

        // Periksa apakah data ditemukan
        if(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_assoc($result);
        }
    }
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
    <!-- CDN Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- Fontawesome icon -->
    <link rel="stylesheet" href="/fontawesome-free-6.4.0-web/css/all.min.css">
    <link rel="stylesheet" href="/css/detail.css">
    <title>Detail Formulir</title>
</head>
<body>
     <!-- Sidebar -->
     <div class="sidebar">
        <h2 class="text-center"><a href=""> Dashboard</a></h2>
        <ul>
            <li><a href="/index.php"><i class="fa-solid fa-house"></i> Beranda</a></li>
            <li><a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Log Out</a></li>
        </ul>
    </div>

    <!-- Konten -->
    <div style="margin-left: 250px; padding: 20px;">
        <h1>Detail Formulir</h1>

        <?php if (isset($row)) { ?>
            <table class="data-table">
                <tr>
                    <td class="data-row">1. id formulir perencanaan:</td>
                    <td><?php echo $row['id_formulir_perencanaan'];?></td>
                </tr>
                <tr>
                    <td class="data-row">2. Nama Instansi:</td>
                    <td><?php echo $row['nama_intansi'];?></td>
                </tr>
                <tr>
                    <td class="data-row">3. Pimpinan Instansi Yang Memerlukan Tanah:</td>
                    <td><?php echo $row['pimpinan_intansi'];?></td>
                </tr>
                <tr>
                    <td class="data-row">4. Peruntukan Pembangunan:</td>
                    <td><?php echo $row['peruntukan_pembangunan'];?></td>
                </tr>
                <tr>
                    <td class="data-row">5. Kategori Proyek (PSN/Non PSN):</td>
                    <td><?php echo $row['kategori_proyek'];?></td>
                </tr>
                <tr>
                    <td class="data-row">6. Letak Tanah:</td>
                    <td></td>
                </tr>
                <tr>
                    <td class="data-row">Kelurahan/Desa:</td>
                    <td><?php echo $row['kelurahan_desa'];?></td>
                </tr>
                <tr>
                    <td class="data-row">Kecamatan:</td>
                    <td><?php echo $row['kecamatan'];?></td>
                </tr>
                <tr>
                    <td class="data-row">Koordinat Centroid Lintang (S):</td>
                    <td><?php echo $row['koordinat_lintang'];?></td>
                </tr>
                <tr>
                    <td class="data-row">Koordinat Centroid Bujur (T):</td>
                    <td><?php echo $row['koordinat_bujur'];?></td>
                </tr>
                <tr>
                    <td class="data-row">7. Alamat Lokasi Tanah:</td>
                    <td><?php echo $row['alamat_lokasi_tanah'];?></td>
                </tr>
                <tr>
                    <td class="data-row">8. Rencana Tata Ruang:</td>
                    <td><?php echo $row['rencana_tata_ruang'];?></td>
                </tr>
                <tr>
                    <td class="data-row">9. Perkiraan Luas Tanah (m2):</td>
                    <td><?php echo $row['perkiraan_luas_tanah'];?></td>
                </tr>
                <tr>
                    <td class="data-row">10. Perkiraan Panjang (m)</td>
                    <td><?php echo $row['perkiraan_panjang'];?></td>
                </tr>
                <tr>
                    <td class="data-row">11. Perkiraan Alokasi Anggaran (Rp):</td>
                    <td><?php echo $row['perkiraan_alokasi'];?></td>
                </tr>
                <tr>
                    <td class="data-row">12. Target Mulai Persiapan (dd/mm/yyyy):</td>
                    <td><?php echo $row['target_mulai_persiapan'];?></td>
                </tr>
                <tr>
                    <td class="data-row">13. Target Mulai Pelaksanaan (dd/mm/yyyy):</td>
                    <td><?php echo $row['target_mulai_pelaksanaan'];?></td>
                </tr>
                <tr>
                    <td class="data-row">14. Dokumen Sumber Data:</td>
                    <td><?php echo $row['dokumen_sumber_data'];?></td>
                </tr>
                <tr>
                    <td class="data-row">15. Keterangan:</td>
                    <td><?php echo $row['keterangan'];?></td>
                </tr>
            </table>
            <input type="button" value="Kembali" onclick="history.back()" class="btn btn-secondary">
        <?php } else { ?>
            <p>Data tidak ditemukan atau ID tidak ditemukan.</p>
        <?php } ?>
    </div>

</body>
</html>
