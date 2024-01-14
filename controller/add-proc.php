<?php  
	include 'conn.php';
	session_start();

	if (isset($_POST['konsultasi'])) {
		$username	= $_POST['username'];
		$email		= $_POST['email'];
		$telephone	= $_POST['telephone'];
		$topik		= $_POST['topik'];
		$pesan		= $_POST['pesan'];

		$stmt = $conn->query("SELECT * FROM user WHERE email = '$email'");
		if ($stmt->num_rows > 0) {
			$stmt 	= $conn->query("SELECT * FROM user WHERE email='$email'");
			$row = mysqli_fetch_array($stmt);
			$id_user = $row['id_user'];
			$result = $conn->query("INSERT INTO konsultasi VALUES('', '$id_user', '$username', '$email', '$telephone', '$topik', '$pesan', current_timestamp())");
			if ($result) {
				header('location: ../index.php?halaman=konsultasi&pesan=berhasil');
			} else {
				header('location: ../index.php?halaman=konsultasi&pesan=gagal');
			}
		} else {
			$result = $conn->query("INSERT INTO konsultasi VALUES('', '', '$username', '$email', '$telephone', '$topik', '$pesan', current_timestamp())");
			header('location: ../index.php?halaman=konsultasi&pesan=berhasil');
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
		$keterangan	 = $_POST['keterangan'];
		$upload 	 = $_FILES['files'];
		
	    for ($i = 0; $i < count($upload['name']); $i++) {
	        $file_name = $upload['name'][$i];
	        $file_tmp = $upload['tmp_name'][$i];

			$result = $conn->query("INSERT INTO perencanaan VALUES ('', '$id', '$namai', '$pimpinani', '$peruntukan', '$kategori', '$kelurahan', '$kecamatan', '$lintang', '$bujur', '$lokasi', '$rencana', '$luas', '$panjang', '$alokasi', '$persiapan', '$pelaksanaan', '$file_name', '$keterangan', 'Dalam Peninjauan');");

	        if ($result ) {
				header('location: ../user/user.php?halaman=dataperencanaan&pesan=berhasil'); 

	        } else {
				header('location: ../user/user.php?halaman=dataperencanaan&pesan=gagal');
	        }
	    }
	}

	elseif (isset($_POST['kembali'])) {
		header('location: ../user/user.php?halaman=dataperencanaan');
	}
?>