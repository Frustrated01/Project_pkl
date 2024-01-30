<div class="h-fit w-full flex flex-col items-center">
	<div class="w-[10/12] sm:w-6/12 h-fit mt-24">
		<h1 class="text-6xl text-center font-bold">DASHBOARD</h1>
		<p class="text-center">Selamat datang pengguna! Di sini, Anda memiliki akses penuh untuk mengelola pengajuan pengadaan tanah Anda dan berkomunikasi dengan tim kami. Lihat ringkasan proyek Anda, pantau perkembangan, dan nikmati pengalaman yang nyaman dan efisien.</p>
	</div>

		<?php
			if (isset($_SESSION['role'])) {
				if ($_SESSION['role'] == 'admin') {
					$stmt = $conn->query("SELECT * FROM perencanaan");
					$stmt2 = $conn->query("SELECT * FROM konsultasi");  
				} else {
					$stmt = $conn->query("SELECT * FROM perencanaan WHERE id_user = {$_SESSION['id']}");  
					$stmt2 = $conn->query("SELECT * FROM konsultasi WHERE id_user = {$_SESSION['id']}");  
				}
			}

			$pengajuan = mysqli_num_rows($stmt);
			$konsultasi = mysqli_num_rows($stmt2);

			$y = 0;
			$n = 0;
			$statusA = 0;
			$statusU = 0;
			$statusN = 0;

			while ($hasil = mysqli_fetch_array($stmt)) {
			    if (isset($hasil['status'])) {
			        if ($hasil['status'] == 'Dalam Tinjauan') {
			            $statusA++;
			        } elseif ($hasil['status'] == 'Undangan') {
			            $statusU++;
			        } elseif ($hasil['status'] == 'Selesai') {
			            $statusN++;
			        }
			    }
			}

			while ($hasil = mysqli_fetch_array($stmt2)) {
			    if (isset($hasil['status'])) {
			        if ($hasil['status'] == 'Sudah Dibalas') {
			            $y++;
			        } elseif ($hasil['status'] == 'Belum Dibalas') {
			            $n++;
			        }
			    }
			}

	 	?>

	<div class="w-fit h-fit my-12 p-4 flex justify-center bg-neutral-100 rounded-3xl shadow-xl">
		<div class="stats shadow-md">
		  <div class="stat place-items-center">
		    <div class="stat-title">Pengajuan</div>
		    <div class="stat-value"><?= $pengajuan ?></div>
		    <div class="stat-desc">Data Pengajuan</div>
		  </div>
		  
		  <div class="stat place-items-center">
		    <div class="stat-title">Status Selesai</div>
		    <div class="stat-value text-success"><?= $statusA ?></div>
		    <div class="stat-desc">Data pengajuan</div>
		  </div>

		  <div class="stat place-items-center">
		    <div class="stat-title">Status Undangan</div>
		    <div class="stat-value text-warning"><?= $statusU ?></div>
		    <div class="stat-desc">Data pengajuan</div>
		  </div>

		  <div class="stat place-items-center">
		    <div class="stat-title">Status Dikembalikan</div>
		    <div class="stat-value text-error"><?= $statusN ?></div>
		    <div class="stat-desc">Data pengajuan</div>
		  </div>
		</div>

	</div>

	<div class="w-fit h-fit mb-12 p-4 flex justify-center bg-neutral-100 rounded-3xl shadow-xl">
		<div class="stats shadow-md">
		  <div class="stat place-items-center">
		    <div class="stat-title">Konsultasi</div>
		    <div class="stat-value"><?= $konsultasi ?></div>
		    <div class="stat-desc">Pesan</div>
		  </div>
		  
		  <div class="stat place-items-center">
		    <div class="stat-title">Sudah Dibalas</div>
		    <div class="stat-value text-success"><?= $y ?></div>
		    <div class="stat-desc">Pesan</div>
		  </div>

		  <div class="stat place-items-center">
		    <div class="stat-title">Belum Dibalas</div>
		    <div class="stat-value text-error"><?= $n ?></div>
		    <div class="stat-desc">Pesan</div>
		  </div>
		</div>

	</div>
</div>