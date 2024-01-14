<?php  

	include 'conn.php';

	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		$result = $conn->query("DELETE FROM perencanaan WHERE id_perencanaan = '$id'");
		if ($result) {
			if (isset($_GET['s'])) {
				if ($_GET['s'] == 'admin') {
					header('location: ../admin/admin.php?halaman=dataperencanaan&pesan=berhasilh');
				} else {
					header('location: ../user/user.php?halaman=dataperencanaan&pesan=berhasilh');
				}
			}
		}
	}

?>