<?php  

	include 'conn.php';

	if (isset($_POST['konsultasi'])) {
		$username	= $_POST['username'];
		$email		= $_POST['email'];
		$telephone	= $_POST['telephone'];
		$topik		= $_POST['topik'];
		$pesan		= $_POST['pesan'];

		$result = $conn->query("INSERT INTO konsultasi VALUES('', '$username', '$email', '$telephone', '$topik', '$pesan')");

		if ($result) {
			header('location: ../index.php?halaman=konsultasi&pesan=berhasil'); 
		} else {
			header('location: ../index.php?halaman=konsultasi&pesan=gagal');
		}
	}

	elseif (isset($_POST['tambah'])) {
		$id 		 = $_POST['id'];
		$namai		 = $_POST['namai'];
		$pimpinani	 = $_POST['pimpinani'];
		$peruntukan	 = $_POST['peruntukan'];
		$kategori	 = $_POST['kategori'];
		$kelurahan	 = $_POST['kelurahan'];
		$kecamatan	 = $_POST['kecamatan'];
		$lintang	 = $_POST['lintang'];
		$bujur		 = $_POST['bujur'];
		$lokasi		 = $_POST['lokasi'];
		$rencana	 = $_POST['rencana'];
		$luas		 = $_POST['luas'];
		$panjang	 = $_POST['panjang'];
		$alokasi	 = $_POST['alokasi'];
		$persiapan	 = $_POST['persiapan'];
		$pelaksanaan = $_POST['pelaksanaan'];
		$dokumen	 = $_POST['dokumen'];
		$keterangan	 = $_POST['keterangan'];
		
		$result = $conn->query("INSERT INTO perencanaan VALUES('', '$id', '$namai', '$pimpinani', '$peruntukan', '$kategori', '$kelurahan', '$kecamatan', '$lintang', '$bujur', '$lokasi', '$rencana', '$luas', '$panjang', '$alokasi', '$persiapan', '$pelaksanaan', '$dokumen', '$keterangan')");

		if ($result) {
			header('location: ../user.php?halaman=dataperencanaan&pesan=berhasil'); 
		} else {
			header('location: ../user.php?halaman=dataperencanaan&pesan=gagal');
		}
	}
?>