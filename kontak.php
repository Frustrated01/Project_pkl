<?php
@include "admin/connection.php";
session_start();
error_reporting(0);

$nama = $email = $pesan = "";
$namaErr = $emailErr = $pesanErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi Nama
    if (empty($_POST["nama"])) {
        $namaErr = "Nama diperlukan";
    } else {
        $nama = test_input($_POST["nama"]);
        // Validasi nama hanya mengandung huruf dan spasi
        if (!preg_match("/^[a-zA-Z ]*$/", $nama)) {
            $namaErr = "Hanya huruf dan spasi yang diperbolehkan";
        }
    }

    // Validasi Email
    if (empty($_POST["email"])) {
        $emailErr = "Email diperlukan";
    } else {
        $email = test_input($_POST["email"]);
        // Validasi format email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Format email tidak valid";
        }
    }

    // Validasi Pesan
    if (empty($_POST["pesan"])) {
        $pesanErr = "Pesan diperlukan";
    } else {
        $pesan = test_input($_POST["pesan"]);

        // Validasi Pesan untuk konten yang tidak diinginkan
        $pesanKotor = ["Tolol", "Kontol", "Bangsat", "BGST", "Goblok"]; // Tambahkan kata-kata yang tidak diinginkan ke dalam array
        $pesanBersih = $pesan;

        foreach ($pesanKotor as $kata) {
            if (stripos($pesanBersih, $kata) !== false) {
                // Pesan mengandung kata-kata yang tidak diinginkan
                $pesanErr = "Pesan mengandung konten yang tidak diinginkan";
                break; // Keluar dari loop begitu ada kata-kata tidak diinginkan yang ditemukan
            }
        }
    }

    // Jika tidak ada kesalahan validasi, simpan ke database
    if (empty($namaErr) && empty($emailErr) && empty($pesanErr)) {
        $stmt = $conn->prepare("INSERT INTO kontak (nama, email, pesan) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nama, $email, $pesan);

        if ($stmt->execute()) {
            echo "<script> alert('Pesan ini telah tersimpan')</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $stmt->close();
    }
}

// Fungsi untuk membersihkan input
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
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
    <link rel="stylesheet" href="/css/kontak.css">
    <!-- Fontawesome icon -->
    <link rel="stylesheet" href="/fontawesome-free-6.4.0-web/css/all.min.css">

    <link rel="icon" href="/asset/logoDPTR.png" type="image/x-icon">
    <title>Kontak</title>
  </head>
  <body>

  <!-- Navbar -->
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

  <!-- Form kontak -->
    <div class="container badan">
        <div class="row">
            <div class="col pading-100">
                <h1>Kontak Kami</h1>
                <p>Silahkan Tinggalkan Pesan anda, Pada kolom yang tersedia</p>
            </div>
            <div class="col pading-30">
            <form method="post" action="kontak.php">
             
             <div class="form-group">
               <label for="">Nama Anda:</label>
               <input type="text" class="form-control" placeholder="Masukkan Nama" name="nama" value="<?php echo $nama; ?>">
             </div>
          
             <div class="form-group">
               <label for="">E-mail Anda:</label>
               <input type="email" class="form-control" placeholder="Masukkan Email" name="email" value="<?php echo $email; ?>">
             </div>
          
             <div class="form-group">
               <label for="">Pesan Anda:</label>
               <textarea name="pesan" class="form-control" cols="30" rows="7" ></textarea>
             </div>
          
             <input class="btn btn-primary" type="submit" value="POST">
          
           </form>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>
