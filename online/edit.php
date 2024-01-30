<?php 
	$csrf_token = bin2hex(random_bytes(32));
	$_SESSION['csrf_token'] = $csrf_token;
	$stmt = $conn->query("SELECT * FROM perencanaan WHERE id_perencanaan = {$_GET['id']}");
	$row = $stmt->fetch_assoc();
?>

<div class="w-[10/12] sm:w-6/12 flex flex-col justify-center h-fit mt-24">
	<h1 class="text-6xl text-center font-bold">EDIT</h1>
	<p class="text-center">Selamat datang di Halaman Edit Formulir Pengajuan! Di sini, Anda memiliki kesempatan untuk memperbarui dan menyempurnakan informasi yang telah Anda ajukan untuk pengadaan tanah. Pastikan data yang Anda berikan lengkap dan akurat untuk memastikan proses review berjalan dengan lancar.</p>
</div>
<div class="w-7/12 h-fit my-12 p-4 flex justify-center bg-neutral-100 rounded-3xl shadow-xl">
	<form action="../controller/update-proc.php" method="post" accept-charset="utf-8" class="w-full bg-base-100 rounded-2xl p-2 shadow-md">
		<input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
		<input type="hidden" name="id" value="<?= $_GET['id'] ?>" />
		<label class="form-control w-full">
		  <div class="label">
		    <span class="label-text">Nama Instansi</span>
		  </div>
		  <input type="text" name="namai" value="<?=$row['nama_i']?>" class="input input-bordered w-full" />
		</label>
		<label class="form-control w-full">
		  <div class="label">
		    <span class="label-text">Nama Pimpinan Instansi</span>
		  </div>
		  <input type="text" name="pimpinani" value="<?=$row['pimpinan_i']?>" class="input input-bordered w-full" />
		</label>
		<label class="form-control w-full">
		  <div class="label">
		    <span class="label-text">Peruntukan</span>
		  </div>
		  <input type="text" name="peruntukan" value="<?=$row['peruntukan']?>" class="input input-bordered w-full" />
		</label>
		<label class="form-control w-full">
		  <div class="label">
		    <span class="label-text">Kategori Proyek</span>
		  </div>
		  <select name="kategori"  class="select select-bordered">
		  	<option value="Proyek Strategis Nasional (PSN)">Proyek Strategis Nasional (PSN)</option>
		  	<option value="Non-Proyek Strategis Nasional (Non-PSN)">Non-Proyek Strategis Nasional (Non-PSN)</option>
		  </select>
		</label>
		<label class="form-control w-full">
		  <div class="label">
		    <span class="label-text">Kelurahan</span>
		  </div>
		  <input type="text" name="kelurahan" value="<?=$row['kelurahan']?>" class="input input-bordered w-full" />
		</label>
		<label class="form-control w-full">
		  <div class="label">
		    <span class="label-text">Kecamatan</span>
		  </div>
		  <input type="text" name="kecamatan" value="<?=$row['kecamatan']?>" class="input input-bordered w-full" />
		</label>
		<div class="flex gap-2">
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Koordinat Lintang</span>
			  	<span class="label-text-alt">Drajat (&deg)</span>
			  </div>
			  <input type="text" name="lintang" value="<?=$row['koordinat_l']?>" class="input input-bordered w-full" />
			</label>
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Koordinat Bujur</span>
			    <span class="label-text-alt">Drajat (&deg)</span>
			  </div>
			  <input type="text" name="bujur" value="<?=$row['koordinat_b']?>" class="input input-bordered w-full" />
			</label>
		</div>
		<label class="form-control w-full">
		  <div class="label">
		    <span class="label-text">Lokasi</span>
		  </div>
		  <textarea class="textarea textarea-bordered resize-none" name="lokasi" ><?=$row['lokasi']?></textarea>
		</label>
		<label class="form-control w-full">
		  <div class="label">
		    <span class="label-text">Rencana Tata Ruang</span>
		  </div>
		  <input type="text" name="rencana" value="<?=$row['rencana_tr']?>" class="input input-bordered w-full" />
		</label>
		<div class="flex gap-2">
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Perkiraan Luas</span>
			    <span class="label-text-alt">Meter Persegi (M&sup2)</span>
			  </div>
			  <input type="text" name="luas" value="<?=$row['perkiraan_l']?>" class="input input-bordered w-full" />
			</label>
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Perkiraan Panjang</span>
			    <span class="label-text-alt">Meter (M)</span>
			  </div>
			  <input type="text" name="panjang" value="<?=$row['perkiraan_p']?>" class="input input-bordered w-full" />
			</label>
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Perkiraan Alokasi</span>
			    <span class="label-text-alt">Meter Persegi (M&sup2)</span>
			  </div>
			  <input type="text" name="alokasi" value="<?=$row['perkiraan_a']?>" class="input input-bordered w-full" />
			</label>
		</div>
		<div class="flex gap-2">
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Mulai Persiapan</span>
			  </div>
			  <input type="date" name="persiapan" value="<?=$row['m_persiapan']?>" class="input input-bordered w-full" />
			</label>
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Mulai Pelaksanaan</span>
			  </div>
			  <input type="date" name="pelaksanaan" value="<?=$row['m_pelaksanaan']?>" class="input input-bordered w-full" />
			</label>
		</div>
		<label class="form-control w-full">
		  <div class="label">
		    <span class="label-text">Dokumen</span>
		  </div>
		  <input type="file" name="files" class="file-input file-input-bordered file-input-primary w-full" value="<?=$row['dokumen']?>" />
		  <div class="label">
		    <span class="label-text-alt">
		    	<a href="">File yang sudah dikirimkan</a>
		    	<a href="../resources/<?=$row['dokumen']?>" class="link link-info" download><?=$row['dokumen']?></a>
		    </span>
		  </div>	  
		</label>
		<label class="form-control w-full">
		  <div class="label">
		    <span class="label-text">Keterangan</span>
		  </div>
		  <input type="text" name="keterangan" value="<?=$row['keterangan']?>" class="input input-bordered w-full" />
		</label>
		<?php
		    if (isset($_SESSION['role'])) {
		        if ($_SESSION['role'] == 'admin') {
		        	echo '
		        		<label class="form-control w-full">
						  <div class="label">
						    <span class="label-text">Status</span>
						  </div>
						  <select name="status" class="select select-bordered">
						  	<option value="Diproses">Diproses</option>
						  	<option value="Undangan">Undangan</option>
						  	<option value="Selesai">Selesai</option>
						  	<option value="Dikembalikan">Dikembalikan</option>
						  </select>
						</label>		
		        	';
		        }
		    }
		?>
		<div class="flex gap-2 mt-4 justify-end">
			<a href="?page=detail&id=<?=$_GET['id']?>" class="btn btn-primary text-white hover:outline hover:outline-2 hover:outline-offset-2">Kembali</a>
			<button class="btn btn-warning text-white hover:outline hover:outline-2 hover:outline-offset-2" value="updatePengajuan" name="updatePengajuan">Update</button>
		</div>
	</form>
</div>