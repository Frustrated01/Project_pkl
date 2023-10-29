<?php
include "connection.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    // Ambil data yang diinputkan oleh pengguna
    $id = $_POST["id"];
    $nama_intansi = $_POST["nama_intansi"];
    $pimpinan_intansi = $_POST["pimpinan_intansi"];
    $peruntukan_pembangunan = $_POST["peruntukan_pembangunan"];
    $kategori_proyek = $_POST["kategori_proyek"];
    $kelurahan_desa = $_POST["kelurahan_desa"];
    $kecamatan = $_POST["kecamatan"];
    $koordinat_lintang = $_POST["koordinat_lintang"];
    $koordinat_bujur = $_POST["koordinat_bujur"];
    $alamat_lokasi_tanah = $_POST["alamat_lokasi_tanah"];
    $rencana_tata_ruang = $_POST["rencana_tata_ruang"];
    $perkiraan_luas_tanah = $_POST["perkiraan_luas_tanah"];
    $perkiraan_panjang = $_POST["perkiraan_panjang"];
    $perkiraan_alokasi = $_POST["perkiraan_alokasi"];
    $target_mulai_persiapan = $_POST["target_mulai_persiapan"];
    $target_mulai_pelaksanaan = $_POST["target_mulai_pelaksanaan"];
    $dokumen_sumber_data = $_POST["dokumen_sumber_data"];
    $keterangan = $_POST["keterangan"];

    // Update data perencanaan ke dalam tabel perencanaan
    $updateSql = "UPDATE perencanaan SET
        nama_intansi = ' $nama_intansi',
        pimpinan_intansi = '$pimpinan_intansi',
        peruntukan_pembangunan = '$peruntukan_pembangunan',
        kategori_proyek = '$kategori_proyek',
        kelurahan_desa = '$kelurahan_desa',
        kecamatan = '$kecamatan',
        koordinat_lintang = '$koordinat_lintang',
        koordinat_bujur = '$koordinat_bujur',
        alamat_lokasi_tanah = '$alamat_lokasi_tanah',
        rencana_tata_ruang = '$rencana_tata_ruang',
        perkiraan_luas_tanah = '$perkiraan_luas_tanah',
        perkiraan_panjang = '$perkiraan_panjang',
        perkiraan_alokasi = '$perkiraan_alokasi ',
        target_mulai_persiapan = '$target_mulai_persiapan',
        target_mulai_pelaksanaan = '$target_mulai_pelaksanaan',
        dokumen_sumber_data = '$dokumen_sumber_data',
        keterangan = '$keterangan'
    WHERE id_formulir_perencanaan = $id";

    if (mysqli_query($conn, $updateSql)) {
        echo "<script>alert('Data berhasil diperbarui.'); window.location.href='user_dashboard.php';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan saat memperbarui data.'); window.location.href='edit_perencanaan.php?id=$id';</script>";
    }
}

// Ambil ID perencanaan yang akan diedit
$id = $_GET["id"];

// Ambil data perencanaan berdasarkan ID
$sql = "SELECT * FROM perencanaan WHERE id_formulir_perencanaan = $id";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);
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
    <title>Edit Data Perencanaan Pengadaan Tanah</title>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        
    </div>

    <!-- Konten -->
    <div style="margin-left: 250px; padding: 20px;">
        <h1>Edit Data Perencanaan Pengadaan Tanah</h1>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $data['id_formulir_perencanaan']; ?>">
            <div class="mb-3">
                <label for="nama_intansi" class="form-label">Nama Instansi</label>
                <input type="text" class="form-control" id="nama_intansi" name="nama_intansi" value="<?php echo $data['nama_intansi']; ?>">
            </div>
            <div class="mb-3">
                <label for="pimpinan_intansi" class="form-label">Pimpinan Instansi</label>
                <input type="text" class="form-control" id="pimpinan_intansi" name="pimpinan_intansi" value="<?php echo $data['pimpinan_intansi']; ?>">
            </div>
            <div class="mb-3">
                <label for="peruntukan_pembangunan" class="form-label">Peruntukan Pembangunan</label>
                <input type="text" class="form-control" id="peruntukan_pembangunan" name="peruntukan_pembangunan" value="<?php echo $data['peruntukan_pembangunan']; ?>">
            </div>
            <div class="mb-3">
                <label for="kategori_proyek" class="form-label">Kategori Proyek</label>
                <input type="text" class="form-control" id="kategori_proyek" name="kategori_proyek" value="<?php echo $data['kategori_proyek']; ?>">
            </div>
            <div class="mb-3">
                <label for="newLetakTanah" class="form-label">Letak Tanah</label>
                
            </div>
            <div class="mb-3">
                <label for="kelurahan_desa" class="form-label">Kelurahan/Desa</label>
                <input type="text" class="form-control" id="kelurahan_desa" name="kelurahan_desa" value="<?php echo $data['kelurahan_desa']; ?>">
            </div>
            <div class="mb-3">
                <label for="kecamatan" class="form-label">Kecamatan</label>
                <input type="text" class="form-control" id="kecamatan" name="kecamatan" value="<?php echo $data['kecamatan']; ?>">
            </div>
            <div class="mb-3">
                <label for="koordinat_lintang" class="form-label">Koordinat Centroid Lintang</label>
                <input type="text" class="form-control" id="koordinat_lintang" name="koordinat_lintang" value="<?php echo $data['koordinat_lintang']; ?>">
            </div>
            <div class="mb-3">
                <label for="koordinat_bujur" class="form-label">Koordinat Centroid Bujur</label>
                <input type="text" class="form-control" id="koordinat_bujur" name="koordinat_bujur" value="<?php echo $data['koordinat_bujur']; ?>">
            </div>
            <div class="mb-3">
                <label for="alamat_lokasi_tanah" class="form-label">Alamat Lokasi Tanah</label>
                <input type="text" class="form-control" id="alamat_lokasi_tanah" name="alamat_lokasi_tanah" value="<?php echo $data['alamat_lokasi_tanah']; ?>">
            </div>
            <div class="mb-3">
                <label for="rencana_tata_ruang" class="form-label">Rencana Tata Ruang</label>
                <input type="text" class="form-control" id="rencana_tata_ruang" name="rencana_tata_ruang" value="<?php echo $data['rencana_tata_ruang']; ?>">
            </div>
            <div class="mb-3">
                <label for="perkiraan_luas_tanah" class="form-label">Perkiraan Luas Tanah</label>
                <input type="text" class="form-control" id="perkiraan_luas_tanah" name="perkiraan_luas_tanah" value="<?php echo $data['perkiraan_luas_tanah']; ?>">
            </div>
            <div class="mb-3">
                <label for="perkiraan_panjang" class="form-label">Perkiraan Panjang</label>
                <input type="text" class="form-control" id="perkiraan_panjang" name="perkiraan_panjang" value="<?php echo $data['perkiraan_panjang']; ?>">
            </div>
            <div class="mb-3">
                <label for="perkiraan_alokasi" class="form-label">Perkiraan Alokasi Anggaran</label>
                <input type="text" class="form-control" id="perkiraan_alokasi" name="perkiraan_alokasi" value="<?php echo $data['perkiraan_alokasi']; ?>">
            </div>
            <div class="mb-3">
                <label for="target_mulai_persiapan" class="form-label">Target Mulai Persiapan</label>
                <input type="text" class="form-control" id="target_mulai_persiapan" name="target_mulai_persiapan" value="<?php echo $data['target_mulai_persiapan']; ?>">
            </div>
            <div class="mb-3">
                <label for="target_mulai_pelaksanaan" class="form-label">Target Mulai Pelaksanaan</label>
                <input type="text" class="form-control" id="target_mulai_pelaksanaan" name="target_mulai_pelaksanaan" value="<?php echo $data['target_mulai_pelaksanaan']; ?>">
            </div>
            <div class="mb-3">
                <label for="dokumen_sumber_data" class="form-label">Dokumen Sumber Data</label>
                <input type="text" class="form-control" id="dokumen_sumber_data" name="dokumen_sumber_data" value="<?php echo $data['dokumen_sumber_data']; ?>">
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?php echo $data['keterangan']; ?>">
            </div>
            <input type="button" value="Kembali" onclick="history.back()" class="btn btn-secondary">
            <button type="submit" class="btn btn-primary" name="update">Perbarui Data</button>
        </form>
    </div>
</body>
</html>
