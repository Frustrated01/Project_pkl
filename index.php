<?php
	include 'controller/conn.php';
	session_start();
?>


<!DOCTYPE html>
<html data-theme="light">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.20/dist/full.min.css" rel="stylesheet" type="text/css" />
	<script src="https://cdn.tailwindcss.com"></script>
	<link rel="stylesheet" href="style.css">
	<title>BERANDA</title>
</head>
<body class="bg-slate-200">
	<?php
		if ($_GET['username']) {
			include 'user/dashbar.php';
		} else {
			include 'navbar.php';
		}
	?>
	<?php include 'alert.php'; ?>
	<?php
		if(isset($_GET["halaman"])){
			if($_GET["halaman"] == "pelayanan"){
				include 'pelayanan.php';
			}
			elseif($_GET["halaman"] == "konsultasi"){
				include 'konsultasi.php';
			}
			elseif($_GET["halaman"] == "signin"){
				include 'signin.php';
			}
			elseif($_GET["halaman"] == "signup"){
				include 'signup.php';
			}
			elseif($_GET["halaman"] == "logout"){
				include 'controller/logout.php';
			}
			elseif($_GET["halaman"] == "profile"){
				include 'profile.php';
			}
			elseif($_GET["halaman"] == "tambah"){
				include 'tambah.php';
			}
			elseif($_GET["halaman"] == "edit"){
				include 'edit.php';
			}
			elseif($_GET["halaman"] == "remove"){
				include 'remove.php';
			}
			elseif($_GET["halaman"] == "beranda"){
				include 'beranda.php';
			}
		}
		else{
			include 'beranda.php';
		}
	?>

	<?php include 'footer.php'; ?>
</body>
</html>