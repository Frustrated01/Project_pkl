<?php

	$id = $_GET['id'];
	$stmt = mysqli_query($conn, "SELECT * FROM perencanaan WHERE id_perencanaan='$id'");
	$data = mysqli_fetch_array($stmt);
?>

<div class="section mt-[72px] px-2 sm:px-0 h-full flex items-center flex-col">
	<div class="my-10 text-center">
		<h1 class="font-bold text-6xl font-medium">Formulir Pengadaan Tanah</h1>
		<p>Isikan sesuai dengan data-data anda</p>
	</div>
	<div class="bg-white w-full sm:w-7/12 h-full rounded-2xl px-6 py-4 mb-10">
		<form action="controller/update-proc.php" method="post" enctype="multipart/form-data" class="w-full flex flex-col items-center">
			<input type="text" name="id" value="<?= $_GET['id']?>" hidden="hidden">
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Nama Intansi</span>
			  </div>
			  <input type="text" name="namai" placeholder="Masukan data anda" class="input input-bordered w-full" value="<?= $data['nama_i'] ?>" />
			</label>
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Pimpinan Intansi</span>
			  </div>
			  <input type="text" name="pimpinani" placeholder="Masukan data anda" class="input input-bordered w-full" value="<?= $data['pimpinan_i'] ?>"/>
			</label>
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Peruntukan</span>
			  </div>
			  <input type="text" name="peruntukan" placeholder="Masukan data anda" class="input input-bordered w-full" value="<?= $data['peruntukan'] ?>" />
			</label>
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Kategori Proyek</span>
			  </div>
			  <input type="text" name="kategori" placeholder="Masukan data anda" class="input input-bordered w-full" value="<?= $data['kategori_proyek'] ?>"/>
			</label>
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Kelurahan</span>
			  </div>
			  <input type="text" name="kelurahan" placeholder="Masukan data anda" class="input input-bordered w-full" value="<?= $data['kelurahan'] ?>"/>
			</label>
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Kecamatan</span>
			  </div>
			  <input type="text" name="kecamatan" placeholder="Masukan data anda" class="input input-bordered w-full" value="<?= $data['kecamatan'] ?>"/>
			</label>
			<div class="flex w-full gap-4">
				<label class="form-control w-full">
				  <div class="label">
				    <span class="label-text">Kordinat Lintang</span>
				  </div>
				  <input type="text" name="lintang" placeholder="Masukan data anda" class="input input-bordered w-full" oninput="this.value = this.value.replace(/[^0-9]/g, '');" value="<?= $data['koordinat_l'] ?>"/>
				</label>
				<label class="form-control w-full">
				  <div class="label">
				    <span class="label-text">Kordinat Bujur</span>
				  </div>
				  <input type="text" name="bujur" placeholder="Masukan data anda" class="input input-bordered w-full" oninput="this.value = this.value.replace(/[^0-9]/g, '');" value="<?= $data['koordinat_b'] ?>"/>
				</label>
			</div>
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Alamat Lokasi Tanah</span>
			  </div>
			  <input type="text" name="lokasi" placeholder="Masukan data anda" class="input input-bordered w-full" value="<?= $data['lokasi'] ?>"/>
			</label>
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Rencana Tata Ruang</span>
			  </div>
			  <input type="text" name="rencana" placeholder="Masukan data anda" class="input input-bordered w-full" value="<?= $data['rencana_tr'] ?>"/>
			</label>
			<div class="flex w-full gap-4">
				<label class="form-control w-full">
				  <div class="label">
				    <span class="label-text">Perkiraan Luas (m)</span>
				  </div>
				  <input type="text" name="luas" placeholder="Masukan data anda" class="input input-bordered w-full" oninput="this.value = this.value.replace(/[^0-9]/g, '');" value="<?= $data['perkiraan_l'] ?>"/>
				</label>
				<label class="form-control w-full">
				  <div class="label">
				    <span class="label-text">Perkiraan Panjang (m)</span>
				  </div>
				  <input type="text" name="panjang" placeholder="Masukan data anda" class="input input-bordered w-full" oninput="this.value = this.value.replace(/[^0-9]/g, '');" value="<?= $data['perkiraan_p'] ?>"/>
				</label>
			</div>
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Perkiraan Alokasi (m2)</span>
			  </div>
			  <input type="text" name="alokasi" placeholder="Masukan data anda" class="input input-bordered w-full" value="<?= $data['perkiraan_a'] ?>"/>
			</label>
			<div class="flex w-full gap-4">
				<label class="form-control w-full">
				  <div class="label">
				    <span class="label-text">Mulai Persiapan</span>
				  </div>
				  <input type="date" name="persiapan" placeholder="Masukan data anda" class="input input-bordered w-full" value="<?= $data['m_persiapan'] ?>"/>
				</label>
				<label class="form-control w-full">
				  <div class="label">
				    <span class="label-text">Mulai Pelaksanaan</span>
				  </div>
				  <input type="date" name="pelaksanaan" placeholder="Masukan data anda" class="input input-bordered w-full" value="<?= $data['m_pelaksanaan'] ?>"/>
				</label>
			</div>
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Dokumen Sumber Data</span>
			  </div>
			  <input type="file" name="files[]" multiple class="file-input file-input-bordered w-full" value="<?= $data['dokumen'] ?>" />
			</label>
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Keterangan</span>
			  </div>
			  <input type="text" name="keterangan" placeholder="Masukan data anda" class="input input-bordered w-full" value="<?= $data['keterangan'] ?>"/>
			</label>
<?php 
	if (isset($_SESSION['role'])) {
		if ($_SESSION['role'] == 'admin') {
			$admin = $_SESSION['username'];
			echo '
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Status</span>
			  </div>
			  <select class="select select-bordered" name="status" required>
			    <option value="Tertunda">Tertunda</option>
			    <option value="Selesai">Selesai</option>
			  </select>
			</label>
			';
		}
	}
?>
			<div class="w-full flex gap-x-2 justify-end">
				<button class="btn btn-error my-4 w-[200px] text-white hover:outline hover:outline-2 hover:outline-offset-2 " value="kembali" name="kembali">Kembali</button>
				<button class="btn btn-info my-4 w-[200px] text-white hover:outline hover:outline-2 hover:outline-offset-2" value="ubah" name="ubah">Simpan</button>
			</div>
		</form>
	</div>
</div>