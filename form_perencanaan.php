<?php
include 'admin/connection.php'; 
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi input - pastikan menghindari SQL Injection
    $nama_intansi = mysqli_real_escape_string($conn, $_POST["nama_intansi"]);
    $pimpinan_intansi = mysqli_real_escape_string($conn, $_POST["pimpinan_intansi"]);
    $peruntukan_pembangunan = mysqli_real_escape_string($conn, $_POST["peruntukan_pembangunan"]);
    
    // Periksa apakah kategori proyek dipilih, dan ambil nilainya
    if(isset($_POST['kategori_proyek'])) {
        $kategori_proyek = mysqli_real_escape_string($conn, $_POST["kategori_proyek"]);
    } else {
        $kategori_proyek = ""; // Nilai default jika tidak ada yang dipilih
    }

    $kelurahan_desa = mysqli_real_escape_string($conn, $_POST["kelurahan_desa"]);
    $kecamatan = mysqli_real_escape_string($conn, $_POST["kecamatan"]);
    $koordinat_lintang = (float)$_POST["koordinat_lintang"];
    $koordinat_bujur = (float)$_POST["koordinat_bujur"];
    $alamat_lokasi_tanah = mysqli_real_escape_string($conn, $_POST["alamat_lokasi_tanah"]);
    $rencana_tata_ruang = mysqli_real_escape_string($conn, $_POST["rencana_tata_ruang"]);
    $perkiraan_luas_tanah = mysqli_real_escape_string($conn, $_POST["perkiraan_luas_tanah"]);
    $perkiraan_panjang = mysqli_real_escape_string($conn, $_POST["perkiraan_panjang"]);
    $perkiraan_alokasi = mysqli_real_escape_string($conn, $_POST["perkiraan_alokasi"]);
    $target_mulai_persiapan = mysqli_real_escape_string($conn, $_POST["target_mulai_persiapan"]);
    $target_mulai_pelaksanaan = mysqli_real_escape_string($conn, $_POST["target_mulai_pelaksanaan"]);
    $dokumen_sumber_data = mysqli_real_escape_string($conn, $_POST["dokumen_sumber_data"]);
    $keterangan = mysqli_real_escape_string($conn, $_POST["keterangan"]);

    // Query SQL untuk memasukkan data ke tabel
    $sql = "INSERT INTO perencanaan (nama_intansi, pimpinan_intansi, peruntukan_pembangunan, kategori_proyek, kelurahan_desa, kecamatan, koordinat_lintang, koordinat_bujur, alamat_lokasi_tanah, rencana_tata_ruang, perkiraan_luas_tanah, perkiraan_panjang, perkiraan_alokasi, target_mulai_persiapan, target_mulai_pelaksanaan, dokumen_sumber_data, keterangan)
    VALUES ('$nama_intansi', '$pimpinan_intansi', '$peruntukan_pembangunan', '$kategori_proyek', '$kelurahan_desa', '$kecamatan', $koordinat_lintang, $koordinat_bujur, '$alamat_lokasi_tanah', '$rencana_tata_ruang', '$perkiraan_luas_tanah', '$perkiraan_panjang', '$perkiraan_alokasi', '$target_mulai_persiapan', '$target_mulai_pelaksanaan', '$dokumen_sumber_data', '$keterangan')";

    // Periksa koneksi database
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data berhasil disimpan');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Tutup koneksi database
    $conn->close();
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <!-- CDN Boostrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- Style CSS -->
    <link rel="stylesheet" href="/css/style.css">
    <!-- Fontawesome icon -->
    <link rel="stylesheet" href="/fontawesome-free-6.4.0-web/css/all.min.css">

    <link rel="icon" href="/asset/logoDPTR.png" type="image/x-icon">
    <title>Formulir</title>
  </head>
  <body>
  
  <nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
      <a class="navbar-brand" href="index.php">
        <img src="asset/logoDPTR.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
        <span class="">Dinas Pertanahan Dan Tata Ruang</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Formulir Pengadaan Tanah</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Formulir
            </a>
            <ul class="dropdown-menu">
              <!-- <li><a class="dropdown-item" href="form_pra_perencanaan.php">Data Pra Perencanaan Pengadaan Tanah</a></li> -->
              <li><a class="dropdown-item active" href="form_perencanaan.php">Data Perencanaan Pengadaan Tanah</a></li>
              <!-- <li><a class="dropdown-item" href="form_persiapan.php">Data Persiapan Pengadaan Tanah</a></li> -->
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="kontak.php"><i class="fa-solid fa-phone"></i> Kontak</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./admin/login.php"><i class="fa-solid fa-user"></i> Login</a>
          </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>

    <!-- Awal Container -->
    <div class="container" style="margin-top: auto; padding:2%">

    <div class="logoDPTR text-center">
      <img src="asset/logoDPTR.png" class="rounded" alt="logo DPTR" style="width: 20%; height:auto">
    </div>
      <h4 class="text-center">Form Isian Pengumpulan Data </h4> 
      <h4 class="text-center">Lokasi Indikatif Pengadaan Tanah</h4>

      <!-- Awal row -->
      <div class="row">
        <!-- Awal col -->
        <div class="col-md-10 mx-auto">
          <!-- Awal card -->
          <div class="card mt-3">
            <div class="card-header bg-info text-light">
              Formulir pra Perencanaan Pengadaan Tanah
            </div>
            <div class="card-body">
              <!-- Awal form -->
              <form method="POST">
              <div class="mb-3">
                  <label class="form-label">1. Nama Instansi Yang Memerlukan Tanah</label>
                  <input type="text" name="nama_intansi" class="form-control" placeholder="Input Nama Instansi">
              </div>

              <div class="mb-3">
                  <label class="form-label">2. Pimpinan Intansi Yang Memerlukan Tanah</label>
                  <input type="text" name="pimpinan_intansi" class="form-control" placeholder="Input Pimpinan Instansi">
              </div>

              <div class="mb-3">
                  <label class="form-label">3. Peruntukan Pembangunan</label>
                  <input type="text" name="peruntukan_pembangunan" class="form-control" placeholder="Input Peruntukan Pembangunan">
              </div>

              <div class="mb-3">
    <label class="form-label">4. Kategori Proyek (PSN/Non PSN)</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="kategori_proyek" id="psn" value="PSN">
        <label class="form-check-label" for="psn">
            PSN
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="kategori_proyek" id="non-psn" value="Non PSN">
        <label class="form-check-label" for="non-psn">
            Non PSN
        </label>
    </div>
</div>

              <div class="text-center">5. Letak Tanah</div>
              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label class="form-label">Kelurahan/Desa</label>
                      <input type="text" name="kelurahan_desa" class="form-control" placeholder="Input Nama kelurahan">
                  </div>
                </div>

                <div class="col">
                  <div class="mb-3">
                    <label class="form-label">Kecamatan</label>
                      <input type="text" name="kecamatan" class="form-control" placeholder="Input Nama kecamatan">
                  </div>
                </div>

                <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">Koordinat Centroid (Lintang)</label>
                <input type="text" name="koordinat_lintang" class="form-control" placeholder="Contoh: -6.12345">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">Koordinat Centroid (Bujur)</label>
                <input type="text" name="koordinat_bujur" class="form-control" placeholder="Contoh: 106.67890">
            </div>
        </div>
    </div>
              <div class="mb-3">
                  <label class="form-label">6. Alamat Lokasi Tanah</label>
                  <input type="text" name="alamat_lokasi_tanah" class="form-control" placeholder="Input Alamat Tanah">
              </div>

              <div class="mb-3">
                  <label class="form-label">7. Rencana Tata Ruang</label>
                  <input type="text" name="rencana_tata_ruang" class="form-control" placeholder="Input Rencana">
              </div>

              <div class="mb-3">
                  <label class="form-label">8. Perkiraan Luas Tanah yang dibutuhkan (m2)</label>
                  <input type="text" name="perkiraan_luas_tanah" class="form-control" placeholder="Input Luas Tanah">
              </div>

              <div class="mb-3">
                  <label class="form-label">9. Perkiraan Panjang yang dibutuhkan (jika jalan) KM  </label>
                  <input type="text" name="perkiraan_panjang" class="form-control" placeholder="Input Panjang jalan/rel kereta">
              </div>

              <div class="mb-3">
                  <label class="form-label">10. Perkiraan Alokasi Anggaran</label>
                  <input type="text" name="perkiraan_alokasi" class="form-control" placeholder="Input Alokasi Anggaran">
              </div>

              <div class="mb-3">
                  <label class="form-label">11. Target Mulai Tahap Persiapan</label>
                  <input type="text" name="target_mulai_persiapan" class="form-control" placeholder="Input Luas Tanah">
              </div>

              <div class="mb-3">
                  <label class="form-label">12. Target Mulai Tahap Pelaksanaan</label>
                  <input type="text" name="target_mulai_pelaksanaan" class="form-control" placeholder="Input Luas Tanah">
              </div>

              <div class="mb-3">
                  <label class="form-label">13. Dokumen Sumber Data</label>
                  <input type="text" name="dokumen_sumber_data" class="form-control" placeholder="Input Dokumen Sumber data">
              </div>

              <div class="mb-3">
                  <label class="form-label">14. Keterangan</label>
                  <input type="text" name="keterangan" class="form-control" placeholder="Input Keterangan">
              </div>

              <button class="btn btn-outline-success" type="submit">Submit</button>
              </form>
              <!-- Akhir form -->
            </div>
            <div class="card-footer bg-info">
              
            </div>
          </div>
          <!-- Akhir card -->
        </div>
        <!-- Akhir col -->
      </div>
      <!-- Akhir row -->

    </div>
    <!-- Akhir Container -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>
