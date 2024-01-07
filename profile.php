<div class="section mt-[72px] h-full flex items-center flex-col">
	<div class="my-10 text-center">
		<h1 class="font-bold text-6xl font-medium">Profile</h1>
	</div>
	<div class="bg-white w-7/12 h-full rounded-2xl px-6 py-4 mb-10">
		<form action="controller/auth.php" method="post" class="w-full flex flex-col items-center">
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Nama Lengkap</span>
			  </div>
			  <input type="text" name="username" class="input input-bordered w-full" value="Joen Doe" />
			</label>
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Telephone</span>
			  </div>
			  <input type="number" name="telepone" class="input input-bordered w-full" value="08990064390" />
			</label>
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Email</span>
			  </div>
			  <input type="email" name="email" class="input input-bordered w-full" value="example@gmail.com" />
			</label>
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Password</span>
			  </div>
			  <input type="password" name="password" class="input input-bordered w-full" value="123123123123" readonly />
			</label>
			<label class="form-control w-full">
			  <div class="label">
			    <span class="label-text">Konfirmasi Password untuk rubah data terbaru</span>
			  </div>
			  <input type="password" name="password" placeholder="Masukan password anda" class="input input-bordered w-full" />
			</label>
			<button class="btn my-4 w-full hover:text-white hover:bg-info" value="login" name="login">Ubah</button>
		</form>
	</div>
</div>