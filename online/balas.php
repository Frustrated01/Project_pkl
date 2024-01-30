<div class="w-[10/12] sm:w-6/12 flex flex-col justify-center h-fit mt-24">
	<h1 class="text-6xl text-center font-bold">BALAS</h1>
	<p class="text-center">Selamat datang di Halaman Konsultasi ! Di sini, Anda dapat membalas pesan konsultasi yang sudah pengguna kirimkan.</p>
</div>
<div class="w-7/12 h-fit my-12 p-4 flex justify-center bg-neutral-100 rounded-3xl shadow-xl">
	<?php
		$stmt = $conn->query("SELECT * FROM konsultasi WHERE id_konsultasi = {$_GET['id']}");
		$row = $stmt->fetch_assoc();
		$csrf_token = bin2hex(random_bytes(32));
		$_SESSION['csrf_token'] = $csrf_token;
	?>
	<form action="../controller/add-proc.php" method="post" accept-charset="utf-8" class="w-full bg-base-100 rounded-2xl p-2 shadow-md">
		<input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
		<input type="hidden" name="id" value="<?= $row['id_konsultasi'] ?>">
		<label class="form-control w-full">
		  <div class="label">
		    <span class="label-text">Nama Lengkap</span>
		  </div>
		  <input type="text" readonly name="username" value="<?= $row['username_g'] ?>" class="input input-bordered w-full" />
		</label>
		<div class="flex gap-2">
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Email</span>
			  </div>
			  <input type="text" readonly name="email" value="<?= $row['email_g'] ?>" class="input input-bordered w-full" />
			</label>
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Telephone</span>
			  </div>
			  <input type="text" readonly name="telephone" value="<?= $row['telephone_g'] ?>" class="input input-bordered w-full" />
			</label>
		</div>
		<label class="form-control w-full">
		  <div class="label">
		    <span class="label-text">Topik</span>
		  </div>
		  <input type="text" readonly name="topik" value="<?= $row['topik'] ?>" class="input input-bordered w-full" />
		</label>
		<label class="form-control w-full">
		  <div class="label">
		    <span class="label-text">Pesan</span>
		  </div>
		  <textarea pattern="[a-zA-Z]+" title="Hanya huruf besar/kecil yang diperbolehkan" name="pesan" maxlength="300" class="textarea textarea-bordered resize-none" readonly><?= $row['pesan'] ?></textarea>
		</label>
		<label class="form-control w-full">
		  <div class="label">
		    <span class="label-text">Balasan</span>
		  </div>
		  <textarea pattern="[a-zA-Z]+" title="Hanya huruf besar/kecil yang diperbolehkan" name="balasan" maxlength="300" class="textarea textarea-bordered resize-none" ></textarea>
		</label>
		<div class="flex gap-2 mt-4 justify-end">
			<button class="btn btn-error text-white hover:outline hover:outline-2 hover:outline-offset-2" value="kembali" name="kembali">Hapus</button>
			<button class="btn btn-info text-white hover:outline hover:outline-2 hover:outline-offset-2" value="balas" name="balas">Kirim</button>
		</div>
	</form>
</div>