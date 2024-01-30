<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';
require '../phpmailer/src/Exception.php';
include './conn.php';

session_start();

if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

if (isset($_POST['konsultasi'])) {
	
    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        header('location: ../index.php?page=konsultasi&pesan=gagal');
        exit;
    }

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }   

    $id = 0;
    $nama      = strip_tags($_POST['nama']);
    $email     = strip_tags($_POST['email']);
    $telephone = strip_tags($_POST['telephone']);
    $topik     = strip_tags($_POST['topik']);
    $pesan     = strip_tags($_POST['pesan']);

    $stmt = $conn->query("SELECT * FROM user WHERE email = '$email' OR id_user = '$id'");
    $row = $stmt->fetch_assoc();
    $id_user = $row['id_user'];
    if ($stmt->num_rows > 0) {
        $result = $conn->query("INSERT INTO konsultasi VALUES('', '$id_user', '$nama', '$email', '$telephone', '$topik', '$pesan', current_timestamp(), 'Belum Dibaca', 'Belum ada balasan ')");
        if ($result) {
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'reffa.kaila@gmail.com';
                $mail->Password = 'cpxk qwrb vula rhxe';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                // Set informasi pengirim dan penerima
                $mail->setFrom('dptrkab.sukabumi@gmail.com', 'Dinas Pertanahan dan Tata Ruang Kab.Sukabumi');
                $mail->addAddress($email, $nama);

                // Set subjek dan isi pesan email
                $mail->Subject = 'Konsultasi Dinas Pertanahan dan Tata Ruang Kab.Sukabumi';
                $mail->Body =   'Topik yang anda kirimkan : ' . $topik . PHP_EOL . 
                                'Pesan yang anda kirimkan : ' . $pesan . PHP_EOL . PHP_EOL . 
                                'Terimakasih telah menggunakan jasa konsultasi kami, harap tunggu balasan dari kami lewat email yang anda kirimkan !';

                // Kirim email
                if ($mail->send()) {
                    header('location: ../index.php?page=konsultasi&pesan=berhasil');
                }
            } catch (Exception $e) {
                header('location: ../index.php?page=konsultasi&pesan=gagal');
            }
        } else {
            header('location: ../index.php?page=konsultasi&pesan=gagal');
        }

    } else {
        $result = $conn->query("INSERT INTO konsultasi VALUES('', '0', '$nama', '$email', '$telephone', '$topik', '$pesan', current_timestamp(), 'Belum Dibalas', 'Belum ada balasan')");
        if ($result) {
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'reffa.kaila@gmail.com';
                $mail->Password = 'cpxk qwrb vula rhxe';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                // Set informasi pengirim dan penerima
                $mail->setFrom('dptrkab.sukabumi@gmail.com', 'Dinas Pertanahan dan Tata Ruang Kab.Sukabumi');
                $mail->addAddress($email, $nama);

                // Set subjek dan isi pesan email
                $mail->Subject = 'Konsultasi Dinas Pertanahan dan Tata Ruang Kab.Sukabumi';
                $mail->Body =   'Topik yang anda kirimkan : ' . $topik . PHP_EOL . 
                                'Pesan yang anda kirimkan : ' . $pesan . PHP_EOL . 
                                'Terimakasih telah menggunakan jasa konsultasi kami, harap tunggu balasan dari kami lewat email yang anda kirimkan !';

                // Kirim email
                $mail->send();
                header('location: ../index.php?page=konsultasi&pesan=berhasil');
            } catch (Exception $e) {
                header('location: ../index.php?page=konsultasi&pesan=gagal');
            }
        } else {
            header('location: ../index.php?page=konsultasi&pesan=gagal');
        }
    }
}

elseif (isset($_POST['balas'])) {
    
    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        header('location: ../online/index.php?page=balasan&pesan=gagal');
        exit;
    }

    $id        = strip_tags($_POST['id']);
    $nama      = strip_tags($_POST['username']);
    $email     = strip_tags($_POST['email']);
    $telephone = strip_tags($_POST['telephone']);
    $topik     = strip_tags($_POST['topik']);
    $pesan     = strip_tags($_POST['pesan']);
    $balasan   = strip_tags($_POST['balasan']);

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host         = 'smtp.gmail.com';
        $mail->SMTPAuth     = true;
        $mail->Username     = 'reffa.kaila@gmail.com';
        $mail->Password     = 'cpxk qwrb vula rhxe';
        $mail->SMTPSecure   = 'tls';
        $mail->Port         = 587;

        $mail->setFrom('dptrkab.sukabumi@gmail.com', 'Dinas Pertanahan dan Tata Ruang Kab.Sukabumi');
        $mail->addAddress($email, $nama);

        $mail->Subject  =   'Balasan Konsultasi Dinas Pertanahan dan Tata Ruang Kab.Sukabumi';
        $mail->Body     =   'Topik yang anda kirimkan : ' . $topik . PHP_EOL . 
                            'Pesan yang anda kirimkan : ' . $pesan . PHP_EOL . 
                            'Balasan Pesan yang anda kirimkan : ' . $balasan . PHP_EOL .
                            'Terimakasih telah menggunakan jasa konsultasi kami, jika jawaban masih kurang jelas silahkan kirim pesan konsultasi kembali !';

        if ($mail->send()) {
            $result = $conn->query("UPDATE konsultasi SET username_g='$nama', email_g='$email', telephone_g='$telephone', topik='$topik', pesan='$pesan', status='Sudah Dibalas', balasan='$balasan' WHERE id_konsultasi = '$id'");
            header('location: ../online/index.php?page=konsultasi&pesan=berhasil');
        } else {
            header('location: ../online/index.php?page=konsultasi&pesan=gagal1');
        }
        
    } catch (Exception $e) {
        header('location: ../online/index.php?page=konsultasi&pesan=gagal2');
    }
} 

elseif(isset($_POST['tambah'])){
    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        header('location: ../online/index.php?page=tamabah&pesan=gagal');
        exit;
    }

    $id          = strip_tags($_POST['id']);
    $namai       = strip_tags($_POST['namai']);
    $pimpinani   = strip_tags($_POST['pimpinani']);
    $peruntukan  = strip_tags($_POST['peruntukan']);
    $kategori    = strip_tags($_POST['kategori']);
    $kelurahan   = strip_tags($_POST['kelurahan']);
    $kecamatan   = strip_tags($_POST['kecamatan']);
    $lintang     = strip_tags($_POST['lintang']);
    $bujur       = strip_tags($_POST['bujur']);
    $lokasi      = strip_tags($_POST['lokasi']);
    $rencana     = strip_tags($_POST['rencana']);
    $luas        = strip_tags($_POST['luas']);
    $panjang     = strip_tags($_POST['panjang']);
    $alokasi     = strip_tags($_POST['alokasi']);
    $persiapan   = strip_tags($_POST['persiapan']);
    $pelaksanaan = strip_tags($_POST['pelaksanaan']);
    $keterangan  = strip_tags($_POST['keterangan']);
    $upload      = $_FILES['files']['name'];
    $tmp         = $_FILES['files']['tmp_name'];

    $path = "../resources/".$upload;

    if(move_uploaded_file($tmp, $path)){
        $stmt = $conn->query("INSERT INTO perencanaan VALUES ('', '$id', '$namai', '$pimpinani', '$peruntukan', '$kategori', '$kelurahan', '$kecamatan', '$lintang', '$bujur', '$lokasi', '$rencana', '$luas', '$panjang', '$alokasi', '$persiapan', '$pelaksanaan', '$upload', '$keterangan', 'Dalam Peninjauan', current_timestamp());");
        if ($stmt) { 
          header("location: ../online/index.php?page=pengajuan&pesan=berhasil"); 
        } else {  
          header("location: ../online/index.php?page=pengajuan&pesan=gagal"); 
        }

    } else {
          header("location: ../online/index.php?page=pengajuan&pesan=gagal");
    }
}
?>
