<?php 

	$stmt = $conn->query("SELECT * FROM perencanaan WHERE id_perencanaan = {$_GET['id']}");
	$row = $stmt->fetch_assoc();
?>


<div class="w-[10/12] sm:w-6/12 flex flex-col justify-center h-fit mt-24">
	<h1 class="text-6xl text-center font-bold">DETAIL</h1>
	<p class="text-center">Selamat datang di Halaman Detail Pengajuan Pengadaan Tanah! Di sini, Anda dapat meninjau secara komprehensif informasi terkait pengajuan tanah Anda. Pastikan untuk melihat setiap detail dengan seksama.</p>
</div>
<div class="w-7/12 h-fit my-12 p-4 flex justify-center bg-neutral-100 rounded-3xl shadow-xl">
	<form action="" method="get" accept-charset="utf-8" class="w-full bg-base-100 rounded-2xl p-2 shadow-md">
		<label class="form-control w-full">
		  <div class="label">
		    <span class="label-text">Nama Instansi</span>
		  </div>
		  <input type="text" readonly value="<?=$row['nama_i']?>" class="input input-bordered w-full" />
		</label>
		<label class="form-control w-full">
		  <div class="label">
		    <span class="label-text">Nama Pimpinan Instansi</span>
		  </div>
		  <input type="text" readonly value="<?=$row['pimpinan_i']?>" class="input input-bordered w-full" />
		</label>
		<label class="form-control w-full">
		  <div class="label">
		    <span class="label-text">Peruntukan</span>
		  </div>
		  <input type="text" readonly value="<?=$row['peruntukan']?>" class="input input-bordered w-full" />
		</label>
		<label class="form-control w-full">
		  <div class="label">
		    <span class="label-text">Kategori Proyek</span>
		  </div>
		  <input type="text" readonly value="<?=$row['kategori_proyek']?>" class="input input-bordered w-full" />
		</label>
		<label class="form-control w-full">
		  <div class="label">
		    <span class="label-text">Kelurahan</span>
		  </div>
		  <input type="text" readonly value="<?=$row['kelurahan']?>" class="input input-bordered w-full" />
		</label>
		<label class="form-control w-full">
		  <div class="label">
		    <span class="label-text">Kecamatan</span>
		  </div>
		  <input type="text" readonly value="<?=$row['kecamatan']?>" class="input input-bordered w-full" />
		</label>
		<div class="flex gap-2">
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Koordinat Lintang</span>
			  	<span class="label-text-alt">Drajat (&deg)</span>
			  </div>
			  <input type="text" readonly value="<?=$row['koordinat_l']?>" class="input input-bordered w-full" />
			</label>
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Koordinat Bujur</span>
			    <span class="label-text-alt">Drajat (&deg)</span>
			  </div>
			  <input type="text" readonly value="<?=$row['koordinat_b']?>" class="input input-bordered w-full" />
			</label>
		</div>
		<label class="form-control w-full">
		  <div class="label">
		    <span class="label-text">Lokasi</span>
		  </div>
		  <textarea class="textarea textarea-bordered resize-none" readonly><?=$row['lokasi']?></textarea>
		</label>
		<label class="form-control w-full">
		  <div class="label">
		    <span class="label-text">Rencana Tata Ruang</span>
		  </div>
		  <input type="text" readonly value="<?=$row['rencana_tr']?>" class="input input-bordered w-full" />
		</label>
		<div class="flex gap-2">
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Perkiraan Luas</span>
			    <span class="label-text-alt">Meter Persegi (M&sup2)</span>
			  </div>
			  <input type="text" readonly value="<?=$row['perkiraan_l']?>" class="input input-bordered w-full" />
			</label>
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Perkiraan Panjang</span>
			    <span class="label-text-alt">Meter (M)</span>
			  </div>
			  <input type="text" readonly value="<?=$row['perkiraan_p']?>" class="input input-bordered w-full" />
			</label>
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Perkiraan Alokasi</span>
			    <span class="label-text-alt">Meter Persegi (M&sup2)</span>
			  </div>
			  <input type="text" readonly value="<?=$row['perkiraan_a']?>" class="input input-bordered w-full" />
			</label>
		</div>
		<div class="flex gap-2">
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Mulai Persiapan</span>
			  </div>
			  <input type="date" readonly value="<?=$row['m_persiapan']?>" class="input input-bordered w-full" />
			</label>
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Mulai Pelaksanaan</span>
			  </div>
			  <input type="date" readonly value="<?=$row['m_pelaksanaan']?>" class="input input-bordered w-full" />
			</label>
		</div>
		<label class="form-control w-full">
		  <div class="label">
		    <span class="label-text">Dokumen</span>
		  </div>
		  <input type="file" class="file-input file-input-bordered file-input-primary w-full" value="<?=$row['dokumen']?>" />
		</label>
		<label class="form-control w-full">
		  <div class="label">
		    <span class="label-text">Keterangan</span>
		  </div>
		  <input type="text" readonly value="<?=$row['keterangan']?>" class="input input-bordered w-full" />
		</label>
		<label class="form-control w-full">
		  <div class="label">
		    <span class="label-text">Status</span>
		  </div>
		  <input type="text" readonly value="<?=$row['status']?>" class="input input-bordered w-full" />
		</label>
		<div class="flex gap-2 mt-4 justify-end">
			<a href="?page=hapus&id=<?=$_GET['id']?>" class="btn btn-error text-white hover:outline hover:outline-2 hover:outline-offset-2">Hapus</a>
			<a href="?page=edit&id=<?=$_GET['id']?>" class="btn btn-warning text-white hover:outline hover:outline-2 hover:outline-offset-2">Edit</a>
			<?php
				if (isset($_SESSION['role'])) {
					if ($_SESSION['role'] == 'admin') {
						echo '
							<button class="btn btn-success text-white hover:outline hover:outline-2 hover:outline-offset-2" value="tambah" name="tambah">Update Status</button>

						';
					} else {
						echo '
							<a href="?page=pengajuan" class="btn btn-primary text-white hover:outline hover:outline-2 hover:outline-offset-2">Kembali</a>
						';
					}
				} 
			?>
		</div>
	</form>
</div>