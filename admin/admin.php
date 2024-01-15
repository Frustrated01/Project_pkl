<?php

	include '../controller/conn.php';
	session_start();

	if (!isset($_SESSION['role'])) {
		header("location: ../index.php");    
    }
    if (isset($_SESSION['role'])) {
    	if ($_SESSION['role'] == 'user') {
    		header('location: ../user/user.php');
    	}
    }
	
?>
<!DOCTYPE html>
<html data-theme="light">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.20/dist/full.min.css" rel="stylesheet" type="text/css" />
	<script src="https://cdn.tailwindcss.com"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
	<link rel="stylesheet" href="style.css">
	<link rel="shortcut icon" href="logo.png">
	<title>SIPETA</title>
</head>
<body class="bg-slate-200">
	<?php include 'dashbar.php'; ?>
	<?php include '../alert.php'; ?>	
	<?php
		if(isset($_GET["halaman"])){
			if($_GET["halaman"] == "dashboard"){
				include 'dashboard.php';
			}
			elseif($_GET["halaman"] == "dataperencanaan"){
				include 'dataperencanaan.php';
			}
			elseif($_GET["halaman"] == "profile"){
				include '../profile.php';
			}
		}
		else{
			include 'dashboard.php';
		}
	?>

	<?php include '../footer.php'; ?>
</body>
</html>