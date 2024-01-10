<?php
	if (isset($_GET['pesan'])) {
		if($_GET['pesan'] == 'berhasil'){
			echo "<script>p_berhasil()</script>";
		}
		elseif ($_GET['pesan'] == 'gagal') {
			echo "<script>p_gagal()</script>";
		}
	}
?>


<div class="section mt-[72px] h-screen flex items-center flex-col">
	<div class="mt-10 text-center">
		<h1 class="font-bold text-6xl font-medium">Data Perencanaan</h1>
		<p>Formulir Pengadaan Tanah yang sudah anda kirimkan :)</p>
	</div>
	<div class="my-10 w-full sm:w-10/12 bg-white p-4 rounded-md">
		<div class="overflow-x-auto">
		  <table class="table table-zebra">
		    <!-- head -->
		    <thead>
		      <tr>
		        <th>No</th>
		        <th>Nama Intansi</th>
		        <th>Pimpinan Intansi</th>
		        <th>Peruntukan</th>
		        <th>Kategori Proyek</th>
		        <th>Kelurahan</th>
		        <th>Kecamatan</th>
		        <th>Kordinat Lintang</th>
		        <th>Kordinat Bujur</th>
		        <th>Alamat Lokasi Tanah</th>
		        <th>Rencana Tata Ruang</th>
		        <th>Perkiraan Luas</th>
		        <th>Perkiraan Panjang</th>
		        <th>Perkiraan Alokasi</th>
		        <th>Mulai Persiapan</th>
		        <th>Mulai Pelaksanaan</th>
		        <th>Dokumen Sumber Data</th>
		        <th>Keterangan</th>
		        <th>Status</th>
		        <th>Menu</th>
		      </tr>
		    </thead>
		    <tbody>
		    <?php
		    	$id = $_SESSION['id'];
				$result = $conn->query("SELECT * FROM perencanaan JOIN status ON perencanaan.id_perencanaan = status.id_perencanaan");

				$no = 1;
				while($row = mysqli_fetch_array($result)){
		    ?>
		      <tr>
		        <th><?= $no++ ?></th>
		        <th><?= $row['namaIntansi']; ?></th>
		        <th><?= $row['pimpinanIntansi']; ?></th>
		        <th><?= $row['peruntukan']; ?></th>
		        <th><?= $row['kategoriProyek']; ?></th>
		        <th><?= $row['kelurahan']; ?></th>
		        <th><?= $row['kecamatan']; ?></th>
		        <th><?= $row['koordinatLintang']; ?></th>
		        <th><?= $row['koordinatBujur']; ?></th>
		        <th><?= $row['lokasi']; ?></th>
		        <th><?= $row['rencanaTataRuang']; ?></th>
		        <th><?= $row['perkiraanLuas']; ?></th>
		        <th><?= $row['perkiraanPanjang']; ?></th>
		        <th><?= $row['perkiraanAlokasi']; ?></th>
		        <th><?= $row['mulaiPersiapan']; ?></th>
		        <th><?= $row['mulaiPelaksanaan']; ?></th>
		        <th><?= $row['dokumenSumberData']; ?></th>
		        <th><?= $row['keterangan']; ?></th>
		        <td class="flex flex-col justify-center gap-4">
		        	<a href="../index.php?halaman=edit&id=<?= $row['id_perencanaan']?>" class="px-4 py-2 bg-yellow-300 hover:bg-yellow-400 rounded-lg text-center font-bold">Edit</a>
		        	<a href="../index.php?halaman=remove&id=" class="px-4 py-2 bg-red-500 hover:bg-red-600 rounded-lg text-center font-bold">Remove</a>
		        </td>
		      </tr>
		  	<?php } ?>
		    </tbody>
		  </table>
		</div>
		<button class="btn btn-info text-white float-right mt-4"><a href="../index.php?halaman=tambah&id=<?= $_SESSION['id'] ?>">Buat Formulir Baru</a></button>
	</div>
</div>