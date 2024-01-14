<?php  

	include 'conn.php';
	session_start();

	if (isset($_POST['ubah'])) {
		if ($_SESSION['role'] == 'admin') {
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
			$status	 	 = $_POST['status'];
			$upload 	 = $_FILES['files'];
			
			if ($_FILES['files']['name'][0] != '') {
			    for ($i = 0; $i < count($upload['name']); $i++) {
			        $file_name = $upload['name'][$i];
			        $file_tmp = $upload['tmp_name'][$i];

			        // $stmt = $conn->query("INSERT INTO perencanaan (dokumen) VALUES ('$file_name')");
					$result = $conn->query("UPDATE perencanaan SET nama_i='$namai', pimpinan_i='$pimpinani', peruntukan='$peruntukan', kategori_proyek='$kategori', kelurahan='$kelurahan', kecamatan='$kecamatan', koordinat_l='$lintang', koordinat_b='$bujur', lokasi='$lokasi', rencana_tr='$rencana', perkiraan_l='$luas', perkiraan_p='$panjang', perkiraan_a='$alokasi', m_persiapan='$persiapan', m_pelaksanaan='$pelaksanaan', keterangan='$keterangan', dokumen='$file_name', status='$status' WHERE id_perencanaan='$id'");

			        if ($result ) {
						header('location: ../admin/admin.php?halaman=dataperencanaan&id=$id&pesan=berhasil'); 

			        } else {
						header('location: ../admin/admin.php?halaman=dataperencanaan&id=&id&pesan=gagal');

			        }
			    }
			} else {
				$result = $conn->query("UPDATE perencanaan SET nama_i='$namai', pimpinan_i='$pimpinani', peruntukan='$peruntukan', kategori_proyek='$kategori', kelurahan='$kelurahan', kecamatan='$kecamatan', koordinat_l='$lintang', koordinat_b='$bujur', lokasi='$lokasi', rencana_tr='$rencana', perkiraan_l='$luas', perkiraan_p='$panjang', perkiraan_a='$alokasi', m_persiapan='$persiapan', m_pelaksanaan='$pelaksanaan', keterangan='$keterangan', status='$status' WHERE id_perencanaan='$id'");

			        if ($result ) {
						header('location: ../admin/admin.php?halaman=dataperencanaan&id=$id&pesan=berhasil'); 

			        } else {
						header('location: ../admin/admin.php?halaman=dataperencanaan&id=&id&pesan=gagal');

			        }
			}


		} 
		else {
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
			
			if ($_FILES['files']['name'][0] != ''){
			    for ($i = 0; $i < count($upload['name']); $i++) {
			        $file_name = $upload['name'][$i];
			        $file_tmp = $upload['tmp_name'][$i];

					$result = $conn->query("UPDATE perencanaan SET nama_i='$namai', pimpinan_i='$pimpinani', peruntukan='$peruntukan', kategori_proyek='$kategori', kelurahan='$kelurahan', kecamatan='$kecamatan', koordinat_l='$lintang', koordinat_b='$bujur', lokasi='$lokasi', rencana_tr='$rencana', perkiraan_l='$luas', perkiraan_p='$panjang', perkiraan_a='$alokasi', m_persiapan='$persiapan', m_pelaksanaan='$pelaksanaan', keterangan='$keterangan', dokumen='$file_name' WHERE id_perencanaan='$id'");

			        if ($result ) {
						header('location: ../user/user.php?halaman=dataperencanaan&pesan=berhasile'); 

			        } else {
						header('location: ../user/user.php?halaman=dataperencanaan&pesan=gagale');

			        }
			    }	
			} else {
				$result = $conn->query("UPDATE perencanaan SET nama_i='$namai', pimpinan_i='$pimpinani', peruntukan='$peruntukan', kategori_proyek='$kategori', kelurahan='$kelurahan', kecamatan='$kecamatan', koordinat_l='$lintang', koordinat_b='$bujur', lokasi='$lokasi', rencana_tr='$rencana', perkiraan_l='$luas', perkiraan_p='$panjang', perkiraan_a='$alokasi', m_persiapan='$persiapan', m_pelaksanaan='$pelaksanaan', keterangan='$keterangan' WHERE id_perencanaan='$id'");

			        if ($result ) {
						header('location: ../user/user.php?halaman=dataperencanaan&pesan=berhasile'); 

			        } else {
						header('location: ../user/user.php?halaman=dataperencanaan&pesan=gagale');

			        }
			}

	    }
	}

	elseif (isset($_POST['kembali'])) {
		header('location: ../user/user.php?halaman=dataperencanaan');
	}

?>