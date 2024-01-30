<?php
$csrf_token = bin2hex(random_bytes(32));
$_SESSION['csrf_token'] = $csrf_token;
?>

<div class="w-[10/12] sm:w-6/12 flex flex-col justify-center h-fit mt-24">
	<h1 class="text-6xl text-center font-bold">TAMBAH</h1>
	<p class="text-center">Selamat datang di halaman tambah pengajuan pengadaan tanah! Mohon lengkapi formulir di bawah ini untuk memulai proses pengajuan Anda. Pastikan mengisi semua informasi yang diperlukan untuk memudahkan tim kami dalam meninjau pengajuan Anda.</p>
</div>
<div class="w-7/12 h-fit my-12 p-4 flex justify-center bg-neutral-100 rounded-3xl shadow-xl">
	<form action="../controller/add-proc.php" method="post" enctype="multipart/form-data" accept-charset="utf-8" class="w-full bg-base-100 rounded-2xl p-2 shadow-md">
		  <input type="text" hidden name="id" value="<?=$_SESSION['id']?>"/>
		  <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
		<label class="form-control w-full">
		  <div class="label">
		    <span class="label-text">Nama Instansi</span>
		  </div>
		  <input type="text" pattern="[a-zA-Z]+" title="Hanya huruf besar/kecil yang diperbolehkan" name="namai" placeholder="Type here" class="input input-bordered w-full" />
		</label>
		<label class="form-control w-full">
		  <div class="label">
		    <span class="label-text">Nama Pimpinan Instansi</span>
		  </div>
		  <input type="text" pattern="[a-zA-Z]+" title="Hanya huruf besar/kecil yang diperbolehkan" name="pimpinani" placeholder="Type here" class="input input-bordered w-full" />
		</label>
		<label class="form-control w-full">
		  <div class="label">
		    <span class="label-text">Peruntukan</span>
		  </div>
		  <input type="text" pattern="[a-zA-Z]+" title="Hanya huruf besar/kecil yang diperbolehkan" name="peruntukan" placeholder="Type here" class="input input-bordered w-full" />
		</label>
		<label class="form-control w-full">
		  <div class="label">
		    <span class="label-text">Kategori Proyek</span>
		  </div>
		  <select pattern="[a-zA-Z]+" title="Hanya huruf besar/kecil yang diperbolehkan" name="kategori" class="select select-bordered">
		  	<option value="Proyek Strategis Nasional (PSN)">Proyek Strategis Nasional (PSN)</option>
		  	<option value="Non-Proyek Strategis Nasional (Non-PSN)">Non-Proyek Strategis Nasional (Non-PSN)</option>
		  </select>
		</label>
		<label class="form-control w-full">
		  <div class="label">
		    <span class="label-text">Kelurahan</span>
		  </div>
		  <input type="text" pattern="[a-zA-Z]+" title="Hanya huruf besar/kecil yang diperbolehkan" name="kelurahan" placeholder="Type here" class="input input-bordered w-full" />
		</label>
		<label class="form-control w-full">
		  <div class="label">
		    <span class="label-text">Kecamatan</span>
		  </div>
		  <input type="text" pattern="[a-zA-Z]+" title="Hanya huruf besar/kecil yang diperbolehkan" name="kecamatan" placeholder="Type here" class="input input-bordered w-full" />
		</label>
		<div class="flex gap-2">
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Koordinat Lintang</span>
			  	<span class="label-text-alt">Drajat (&deg)</span>
			  </div>
			  <input type="text" id="coordinatesl" name="lintang" placeholder="Type here" class="input input-bordered w-full" />
			  <span id="degree" style="display: none;">Drajat</span>
			  <div id="error-messagel" style="color: red;"></div>
			</label>
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Koordinat Bujur</span>
			    <span class="label-text-alt">Drajat (&deg)</span>
			  </div>
			  <input type="text" id="coordinatesb" name="bujur" placeholder="Type here" class="input input-bordered w-full" />
			  <span id="degree" style="display: none;">Drajat</span>
			  <div id="error-messageb" style="color: red;"></div>
			</label>
		</div>
		<label class="form-control w-full">
		  <div class="label">
		    <span class="label-text">Lokasi</span>
		  </div>
		  <textarea pattern="[a-zA-Z]+" title="Hanya huruf besar/kecil yang diperbolehkan" name="lokasi" maxlength="300" class="textarea textarea-bordered resize-none" ></textarea>
		</label>
		<label class="form-control w-full">
		  <div class="label">
		    <span class="label-text">Rencana Tata Ruang</span>
		  </div>
		  <input type="text" name="rencana" placeholder="Type here" class="input input-bordered w-full" />
		</label>
		<div class="flex gap-2">
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Perkiraan Luas</span>
			    <span class="label-text-alt">Meter Persegi (M&sup2)</span>
			  </div>
			  <input type="text" name="luas" placeholder="Type here" class="input input-bordered w-full" />
			</label>
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Perkiraan Panjang</span>
			    <span class="label-text-alt">Meter (M)</span>
			  </div>
			  <input type="text" name="panjang" placeholder="Type here" class="input input-bordered w-full" />
			</label>
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Perkiraan Alokasi</span>
			    <span class="label-text-alt">Meter Persegi (M&sup2)</span>
			  </div>
			  <input type="text" name="alokasi" placeholder="Type here" class="input input-bordered w-full" />
			</label>
		</div>
		<div class="flex gap-2">
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Mulai Persiapan</span>
			  </div>
			  <input type="date" name="persiapan" placeholder="Type here" class="input input-bordered w-full" />
			</label>
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Mulai Pelaksanaan</span>
			  </div>
			  <input type="date" name="pelaksanaan" placeholder="Type here" class="input input-bordered w-full" />
			</label>
		</div>
		<label class="form-control w-full">
		  <div class="label">
		    <span class="label-text">Dokumen</span>
		  </div>
		  <input type="file" name="files" class="file-input file-input-bordered file-input-primary w-full" />
		</label>
		<label class="form-control w-full">
		  <div class="label">
		    <span class="label-text">Keterangan</span>
		  </div>
		  <input type="text" pattern="[a-zA-Z]+" title="Hanya huruf besar/kecil yang diperbolehkan" name="keterangan" placeholder="Type here" class="input input-bordered w-full" />
		</label>
		<div class="flex gap-2 mt-4 justify-end">
			<a href="?page=pengajuan" class="btn btn-error text-white hover:outline hover:outline-2 hover:outline-offset-2">Kembali</a>
			<button class="btn btn-info text-white hover:outline hover:outline-2 hover:outline-offset-2" value="tambah" name="tambah" onclick="validasi()">Kirim</button>
		</div>
	</form>
</div>

<script>
    function validasi() {
        var lintangInput = document.getElementById("coordinatesl").value.trim();
        var bujurInput = document.getElementById("coordinatesb").value.trim();
        var lintangPattern = /^(-?\d+|\d{1,2}\.\d{4,})$/;
        var bujurPattern = /^(-?\d+|\d{1,2}\.\d{4,})$/;
        var lintangErrorMessage = document.getElementById('error-messagel');
        var bujurErrorMessage = document.getElementById('error-messageb');
        var form = document.getElementById("form");

        if (lintangInput === '') {
            lintangErrorMessage.textContent = '';
            document.getElementById('coordinatesl').classList.remove('input-error');
        } else if (!lintangPattern.test(lintangInput)) {
            lintangErrorMessage.textContent = 'Masukkan koordinat lintang dalam format -1.2345';
            document.getElementById('coordinatesl').classList.add('input-error');
            return false; // Menghentikan pengiriman formulir jika ada kesalahan
        } else {
            lintangErrorMessage.textContent = '';
            document.getElementById('coordinatesl').classList.remove('input-error');
        }

        if (bujurInput === '') {
            bujurErrorMessage.textContent = '';
            document.getElementById('coordinatesb').classList.remove('input-error');
        } else if (!bujurPattern.test(bujurInput)) {
            bujurErrorMessage.textContent = 'Masukkan koordinat bujur dalam format 123.4567';
            document.getElementById('coordinatesb').classList.add('input-error');
            return false; // Menghentikan pengiriman formulir jika ada kesalahan
        } else {
            bujurErrorMessage.textContent = '';
            document.getElementById('coordinatesb').classList.remove('input-error');
        }

        // Jika tidak ada kesalahan, formulir akan dikirim
        form.submit();
    }
</script>
