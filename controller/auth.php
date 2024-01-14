<?php 

	include "conn.php";

	if (isset($_POST['login'])) {
		session_start();
		$email   	= $_POST['email'];
		$password   = md5($_POST['password']);
		$query  = $conn->query("select * from user where email = '$email' and password = '$password'");
		$data   = mysqli_fetch_array($query);
		$cek    = mysqli_num_rows($query);

		// a = ADMIN
		// u = USER

		if ($cek > 0) {
		    if ($data['role']=="admin") {
		    $_SESSION['id']         = $data['id_user'];
		    $_SESSION['username']   = $data['username'];
		    $_SESSION['telepone']   = $data['telepone'];
		    $_SESSION['email']  	= $data['email'];
		    $_SESSION['password']   = $data['password'];
		    $_SESSION['role']    	= $data['role'];    
		    header("location: ../admin/admin.php?halaman=dashboard");    
		    }

		    elseif ($data['role']=="user"){
		    $_SESSION['id']         = $data['id_user'];
		    $_SESSION['username']   = $data['username'];
		    $_SESSION['telepone']   = $data['telepone'];
		    $_SESSION['email']   	= $data['email'];
		    $_SESSION['password']   = $data['password'];
		    $_SESSION['role']    	= $data['role'];
		    header("location: ../user/user.php?halaman=dashboard");
		    }
		}

		else{
		    header("location: ../index.php?halaman=signin&pesan=gagal");
		}
	}

	elseif (isset($_POST['signup'])) {
		$namaL   	= $_POST['namaL'];
		$email   	= $_POST['email'];
		$password   = md5($_POST['password']);
		$cpassword  = md5($_POST['cpassword']);
		
		$result = $conn->query("select * from user where email='$email'"); 
	    $num = mysqli_num_rows($result);  
		
	    if ($password == $cpassword) {
	        $result = $conn->query("SELECT * FROM user WHERE email='$email'");
	        if (!$result->num_rows > 0) {
	            $result = $conn->query("INSERT INTO user (username, email, password, role) VALUES ('$namaL', '$email', '$password', 'user')");
	            if ($result) {
			        header('location: ../index.php?halaman=signup&pesan=berhasil');
	            } else {
			        header('location: ../index.php?halaman=signup&pesan=gagal');
	            }
	        } else {
		        header('location: ../index.php?halaman=signup&pesan=gagal');
	        }
	    } else {
	        header('location: ../index.php?halaman=signup&pesan=gagal');
	    }
	}

	elseif (isset($_POST['ubah'])) {
		$id 		= $_POST['id'];
		$nama 		= $_POST['username'];
		$telepone 	= $_POST['telepone'];
		$email 		= $_POST['email'];
		$password 	= md5($_POST['kpassword']);

		$stmt  = $conn->query("SELECT * FROM user WHERE email = '$email' AND password = '$password'");

		if ($stmt->num_rows > 0) {
			$stmt = $conn->query("UPDATE user SET username = '$nama', telepone = '$telepone' WHERE id_user = '$id'");
			header("location: ../user/user.php?halaman=profile&pesan=berhasil");
		} else {
			header("location: ../user/user.php?halaman=profile&pesan=gagal");
		}
	}

	elseif (isset($_POST['kembali'])) {
		if (isset($_SESSION['role'])) {
			if ($_SESSION['role'] == 'admin') {
				header('location: ../admin/admin.php?halaman=dataperencanaan');
			} else {
				header('location: ../user/user.php?halaman=dataperencanaan');
			}
		}
	}
?>