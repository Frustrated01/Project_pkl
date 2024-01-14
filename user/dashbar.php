<div class="navbar bg-base-100 shadow-md">
	<div class="navbar-start">
		<div class="dropdown">
			<div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
		        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
			</div>
			<ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[2] p-2 shadow bg-base-100 rounded-box w-52">
				<li><a href="../index.php?halaman=beranda">BERANDA</a></li>
				<li><a href="user.php?halaman=dashboard">DASHBOARD</a></li>
				<li><a href="user.php?halaman=dataperencanaan">PERENCANAAN</a></li>
				<li><a href="user.php?halaman=profile">PROFILE</a></li>
				<li><a href="user.php?halaman=logout">LOGOUT</a></li>
			</ul>
		</div>
		<div class="flex flex-col w-full">
			<a class="pl-4 font-bold text-3xl">SIPETA</a>
			<a class="pl-4 font-bold text-xs sm:text-sm">SUKABUMI PENGADAAN TANAH</a>
		</div>
	</div>
	<div class="navbar-end hidden sm:flex">
		<ul class="menu menu-horizontal px-1 font-bold">
			<li class="hover:bg-info hover:text-white rounded-lg"><a href="../index.php?halaman=beranda">BERANDA</a></li>
			<li class="hover:bg-info hover:text-white rounded-lg"><a href="user.php?halaman=dashboard">DASHBOARD</a></li>
			<li class="hover:bg-info hover:text-white rounded-lg"><a href="user.php?halaman=dataperencanaan">PERENCANAAN</a></li>
			<li class="hover:bg-info hover:text-white rounded-lg"><a href="user.php?halaman=profile">PROFILE</a></li>
			<li class="hover:bg-info hover:text-white rounded-lg"><a href="#" onclick="confirmLogout(<?= $_SESSION['id']?>)">LOGOUT</a></li>
		</ul>
	</div>
</div>

<script>
function confirmLogout() {
    Swal.fire({
        title: 'Konfirmasi Logout',
        text: 'Anda yakin ingin keluar?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, Logout',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.value) {
            // Redirect atau lakukan logout di sini
            window.location.href = '../controller/logout.php'; // Gantilah dengan URL logout yang sesuai
        }
    });
}
</script>
