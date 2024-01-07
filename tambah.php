<div class="section mt-[72px] px-2 sm:px-0 h-full flex items-center flex-col">
	<div class="my-10 text-center">
		<h1 class="font-bold text-6xl font-medium">Formulir Pengadaan Tanah</h1>
		<p>Isikan sesuai dengan data-data anda</p>
	</div>
	<div class="bg-white w-full sm:w-7/12 h-full rounded-2xl px-6 py-4 mb-10">
		<form action="controller/add-proc.php" method="post" class="w-full flex flex-col items-center">
			<input type="text" name="id" value="<?= $_GET['id']?>" hidden="hidden">
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Nama Intansi</span>
			  </div>
			  <input type="text" name="namai" placeholder="Masukan data anda" class="input input-bordered w-full" />
			</label>
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Pimpinan Intansi</span>
			  </div>
			  <input type="text" name="pimpinani" placeholder="Masukan data anda" class="input input-bordered w-full" />
			</label>
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Peruntukan</span>
			  </div>
			  <input type="text" name="peruntukan" placeholder="Masukan data anda" class="input input-bordered w-full" />
			</label>
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Kategori Proyek</span>
			  </div>
			  <input type="text" name="kategori" placeholder="Masukan data anda" class="input input-bordered w-full" />
			</label>
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Kelurahan</span>
			  </div>
			  <input type="text" name="kelurahan" placeholder="Masukan data anda" class="input input-bordered w-full" />
			</label>
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Kecamatan</span>
			  </div>
			  <input type="text" name="kecamatan" placeholder="Masukan data anda" class="input input-bordered w-full" />
			</label>
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Kordinat Lintang</span>
			  </div>
			  <input type="text" name="lintang" placeholder="Masukan data anda" class="input input-bordered w-full" />
			</label>
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Kordinat Bujur</span>
			  </div>
			  <input type="text" name="bujur" placeholder="Masukan data anda" class="input input-bordered w-full" />
			</label>
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Alamat Lokasi Tanah</span>
			  </div>
			  <input type="text" name="lokasi" placeholder="Masukan data anda" class="input input-bordered w-full" />
			</label>
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Rencana Tata Ruang</span>
			  </div>
			  <input type="text" name="rencana" placeholder="Masukan data anda" class="input input-bordered w-full" />
			</label>
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Perkiraan Luas</span>
			  </div>
			  <input type="text" name="luas" placeholder="Masukan data anda" class="input input-bordered w-full" />
			</label>
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Perkiraan Panjang</span>
			  </div>
			  <input type="text" name="panjang" placeholder="Masukan data anda" class="input input-bordered w-full" />
			</label>
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Perkiraan Alokasi</span>
			  </div>
			  <input type="text" name="alokasi" placeholder="Masukan data anda" class="input input-bordered w-full" />
			</label>
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Mulai Persiapan</span>
			  </div>
			  <input type="text" name="persiapan" placeholder="Masukan data anda" class="input input-bordered w-full" />
			</label>
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Mulai Pelaksanaan</span>
			  </div>
			  <input type="text" name="pelaksanaan" placeholder="Masukan data anda" class="input input-bordered w-full" />
			</label>
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Dokumen Sumber Data</span>
			  </div>
			  <input type="file" name="dokumen" class="file-input file-input-bordered w-full" />
			</label>
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Keterangan</span>
			  </div>
			  <input type="text" name="keterangan" placeholder="Masukan data anda" class="input input-bordered w-full" />
			</label>
			<button class="btn my-4 w-full hover:text-white hover:bg-info" value="tambah" name="tambah">Kirim</button>
		</form>
	</div>
</div>