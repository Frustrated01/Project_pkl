<?php

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
    <title>Beranda</title>
  </head>
  <body>

  <nav class="navbar bg-body-tertiary ">
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
      
    <!-- Main Content  -->
    <div class="img">
      <div class="text">
        <h1><span style="font-weight: bold;">Selamat Datang</span></h1>
        <p>Cara cepat mengisi Formulir pengadaan tanah</p>
      </div>
      <footer class="text-center"> <span style="font-weight: bold;">Copyright &copy; Dinas Pertanahan Dan Tata Ruang</span></footer>
    </div>
    

    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>
