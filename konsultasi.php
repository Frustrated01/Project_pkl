<?php
	if (isset($_GET['pesan'])) {
		if($_GET['pesan'] == 'berhasil'){
			echo "<script>k_berhasil()</script>";
		}
		elseif ($_GET['pesan'] == 'gagal') {
			echo "<script>k_gagal()</script>";
		}
	}
?>

<div class="section mt-[22px] flex items-center flex-col">
	<h1 class="text-6xl font-medium mt-10">Konsultasi</h1>
	<p class="text-center mt-4">Selamat Datang Di Halaman Konsultasi, Silahkan Sampaikan Pertanyaan atau Permasalahan dengan <br> Mengisi Form Dibawah Ini, dan Jawaban Akan Disampaikan Melalui Email yang Didaftarkan</p>
	<div class="section w-full px-2 sm:px-0 sm:w-7/12 mt-10">
			<form action="controller/add-proc.php" method="post">
		<div class="grid grid-cols-6 grid-rows-6 gap-4">
		    <div class="col-span-6 w-full">
		    	<label class="form-control w-full">
					<div class="label">
						<span class="label-text">Nama Lengkap</span>
					</div>
					<input type="text" name="username" placeholder="Joen Doeu" class="input input-bordered w-full" required />
				</label>
		    </div>
		    <div class="col-span-3 row-start-2">
		    	<label class="form-control w-full">
					<div class="label">
						<span class="label-text">Email</span>
					</div>
					<input type="text" name="email" placeholder="example@mail.com" class="input input-bordered w-full" required />
				</label>
		    </div>
		    <div class="col-span-3 col-start-4 row-start-2">
		    	<label class="form-control w-full">
					<div class="label">
						<span class="label-text">Telephone</span>
					</div>
					<input type="text" name="telephone" placeholder="08xxx" class="input input-bordered w-full" required />
				</label>
		    </div>
		    <div class="col-span-6 row-start-3 h-fit">
		    	<label class="form-control w-full">
				  <div class="label">
				    <span class="label-text">Topik</span>
				  </div>
				  <select class="select select-bordered" name="topik" required>
				    <option disabled selected>Pilih topik</option>
				    <option value="Cara Penggunaan Website">Cara Penggunaan Website</option>
				    <option value="Persyaratan lainnya">Persyaratan lainnya</option>
				    <option value="Lainnya">Lainnya</option>
				  </select>
				</label>
		    </div>
		    <div class="col-span-6 row-start-4 row-span-2 h-full">
		    	<label class="w-full h-full">
					<div class="label">
						<span class="label-text">Pesan</span>
					</div>
					<textarea class="textarea textarea-bordered w-full h-[120px] resize-none" name="pesan" placeholder="Pesan" required></textarea>
				</label>
		    </div>
		    <div class="col-span-6 row-start-6 flex justify-end">
				<button class="btn btn-info text-white w-20" value="konsultasi" name="konsultasi">Kirim</button>
		    </div>
		</div>
			</form>
	</div>
    
</div>