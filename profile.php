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
<?php  

	include 'controller/conn.php';
	$id = $_SESSION['id'];

	$result = $conn->query("SELECT * FROM user WHERE id_user = '$id'");
	$row = mysqli_fetch_array($result);

?>

<div class="section mt-[12px] w-full h-full flex items-center sm:px-0 px-2 flex-col">
	<div class="my-10 text-center">
		<h1 class="font-bold text-6xl font-medium">Profile</h1>
	</div>
	<div class="bg-white w-full sm:w-7/12 h-full rounded-2xl px-6 py-4 mb-10">
		<div class="w-full flex items-center justify-center">
			<?php 
				$email = $row['email'];
				$hashed_email = md5(strtolower($email));
				$gravatar_url = "https://robohash.org/{$hashed_email}";
			 ?>
			 <img src="<?=$gravatar_url?>" class="rounded rounded-full">
		</div>
		<form action="../controller/auth.php" method="post" class="w-full flex flex-col items-center">
			<input type="text" name="id" value="<?= $_SESSION['id']?>" hidden>
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Nama Lengkap</span>
			  </div>
			  <input type="text" name="username" class="input input-bordered w-full" value="<?= $row['username'] ?>" />
			</label>
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Telephone</span>
			  </div>
			  <input type="text" name="telepone" class="input input-bordered w-full" value="<?= $row['telepone'] ?>" />
			</label>
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Email</span>
			  </div>
			  <input readonly type="email" name="email" class="input input-bordered w-full" value="<?= $row['email']?>" />
			</label>
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Password</span>
				<span class="label-text-alt text-slate-400">*Masukan password anda jika ingin merubah data diri anda</span>
			  </div>
			  <input type="password" name="kpassword" placeholder="Masukan password untuk konfirmasi" class="input input-bordered w-full" required />
			</label>
			<div class="w-full flex justify-end items-center">
				<button class="btn btn-info my-4 w-[200px] text-white hover:outline hover:outline-2 hover:outline-offset-2" value="ubah" name="ubah">Simpan</button>
			</div>
		</form>
	</div>
</div>