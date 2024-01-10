<?php
	if (isset($_GET['pesan'])) {
		if($_GET['pesan'] == 'berhasil'){
			echo "<script>uprofile_berhasil()</script>";
		}
		elseif ($_GET['pesan'] == 'gagal') {
			echo "<script>uprofile_gagal()</script>";
		}
	}
?>

<div class="section mt-[72px] w-full h-full flex items-center sm:px-0 px-2 flex-col">
	<div class="my-10 text-center">
		<h1 class="font-bold text-6xl font-medium">Profile</h1>
	</div>
	<div class="bg-white w-full sm:w-7/12 h-full rounded-2xl px-6 py-4 mb-10">
		<div class="w-full flex items-center justify-center">
			<img class="rounded rounded-full" src="https://gravatar.com/avatar/d97402a775ff8aa2d151c5a957edd0ac?s=200&d=retro&r=x" alt="">
		</div>
		<form action="../controller/auth.php" method="post" class="w-full flex flex-col items-center">
			<input type="text" name="id" value="<?= $_SESSION['id']?>" hidden>
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Nama Lengkap</span>
			  </div>
			  <input type="text" name="username" class="input input-bordered w-full" value="<?= $_SESSION['username'] ?>" />
			</label>
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Telephone</span>
			  </div>
			  <input type="text" name="telepone" class="input input-bordered w-full" value="<?= $_SESSION['telepone'] ?>" />
			</label>
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Email</span>
			  </div>
			  <input readonly type="email" name="email" class="input input-bordered w-full" value="<?= $_SESSION['email']?>" />
			</label>
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Password</span>
			  </div>
			  <input type="password" name="kpassword" placeholder="Masukan password untuk konfirmasi" class="input input-bordered w-full" required />
			</label>
			<button class="btn my-4 w-full hover:text-white hover:bg-info" value="ubah" name="ubah">Ubah</button>
		</form>
	</div>
</div>