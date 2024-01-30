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

if (isset($_POST['updateStatus'])) {
	$status = strip_tags($_POST['status']);

}

elseif (isset($_POST['updatePengajuan'])) {
    // Validate CSRF token
    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        header('location: ../online/index.php?page=update&id=' . $id . '&pesan=gagal');
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

    // Jika ada file yang di-upload, update juga file
    if (!empty($upload)) {
        $path = "../resources/".$upload;
        move_uploaded_file($tmp, $path);

        $stmt = $conn->query("UPDATE perencanaan SET nama_i='$namai', pimpinan_i='$pimpinani', peruntukan='$peruntukan', kategori_proyek='$kategori', kelurahan='$kelurahan', kecamatan='$kecamatan', koordinat_l='$lintang', koordinat_b='$bujur', lokasi='$lokasi', rencana_tr='$rencana', perkiraan_l='$luas', perkiraan_p='$panjang', perkiraan_a='$alokasi', persiapan_m='$persiapan', pelaksanaan_m='$pelaksanaan', dokumen='$upload', keterangan='$keterangan' WHERE id_perencanaan='$id'");
    } else {
        // Jika tidak ada file yang di-upload, update data tanpa mengubah file
        $stmt = $conn->query("UPDATE perencanaan SET nama_i='$namai', pimpinan_i='$pimpinani', peruntukan='$peruntukan', kategori_proyek='$kategori', kelurahan='$kelurahan', kecamatan='$kecamatan', koordinat_l='$lintang', koordinat_b='$bujur', lokasi='$lokasi', rencana_tr='$rencana', perkiraan_l='$luas', perkiraan_p='$panjang', perkiraan_a='$alokasi', m_persiapan='$persiapan', m_pelaksanaan='$pelaksanaan', keterangan='$keterangan' WHERE id_perencanaan='$id'");
    }

    if ($stmt) { 
        header("location: ../online/index.php?page=pengajuan&pesan=berhasil");
    } else {  
        header("location: ../online/index.php?page=pengajuan&pesan=gagal");
    }
}

elseif (isset($_POST['kembali'])) {
		header('location: ../online/index.php?page=detail&id={$id}');
	}
?>
