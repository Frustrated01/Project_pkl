<?php
	if (isset($_GET['pesan'])) {
		if($_GET['pesan'] == 'berhasil'){
			echo "<script>p_berhasil()</script>";
		}
		elseif ($_GET['pesan'] == 'gagal') {
			echo "<script>p_gagal()</script>";
		}
		elseif ($_GET['pesan'] == 'berhasile') {
			echo "<script>e_berhasil()</script>";
		}
		elseif ($_GET['pesan'] == 'gagale') {
			echo "<script>e_gagal()</script>";
		}
		elseif ($_GET['pesan'] == 'berhasilh') {
			echo "<script>h_berhasil()</script>";
		}
	}

?>


<div class="section mt-[12px] min-h-screen flex items-center flex-col">
	<h1 class="text-6xl text-center font-medium mt-10">Data Formulir</h1>
	<p class="text-center mt-4">Berikut adalah kumpulan-kumpulan formulir yang sudah anda submit.</p>
	
	<div class="w-10/12 h-full bg-white px-2 py-4 rounded rounded-xl my-10 shadow-md">
		<div class="overflow-x-auto">
			<table class="table table-md border-none border">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Lengkap</th>
						<th>Email</th>
						<th>Telephone</th>
						<th>Total Data</th>
						<th>Aksi</th>
					</tr>
				</thead>

				<tbody>
<?php  
$no = 1;
$stmt = $conn->query("SELECT * FROM user");
$stmt2 = $conn->query("SELECT * FROM perencanaan WHERE id_user = '4'");
$row = mysqli_num_rows($stmt2);

while ($person = mysqli_fetch_array($stmt)){
	$id = $person['id_user'];
	$stmt2 = $conn->query("SELECT * FROM perencanaan WHERE id_user = '$id'");
	$row = mysqli_num_rows($stmt2);
?>
					<tr>
						<th><?= $no++ ?></th>
						<td><?= $person['username'] ?></td>
						<td><?= $person['email'] ?></td>
						<td><?= $person['telepone'] ?></td>
						<td><?= $row ?></td>
						<td class="flex justify-center"><a role href="admin.php?halaman=dataperencanaan&id=<?= $person['id_user'] ?>&#table" class="btn btn-info w-full text-white hover:outline hover:outline-2 hover:outline-offset-2">Cari</a></td>
					</tr>
<?php } ?>
				</tbody>
			</table>
		</div>	
	</div>
	
	<div class="w-10/12 h-full bg-white px-2 py-4 rounded rounded-xl mt-4 mb-10 shadow-md">
		<div class="overflow-x-auto" id="table">
			<table class="table table-md border-none border">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Instansi</th>
						<th>Pimpinan Instansi</th>
						<th>Peruntukan</th>
						<th>Kategori Proyek</th>
						<th>Kelurahan</th>
						<th>Kecamatan</th>
						<th>Koordinat Lintang</th>
						<th>Koordinat Bujur</th>
						<th>Lokasi</th>
						<th>Rencana Tata Ruang</th>
						<th>Perkiraan Luas</th>
						<th>Perkiraan Panjang</th>
						<th>Perkiraan Alokasi</th>
						<th>Mulai Persiapan</th>
						<th>Mulai Pelaksanaan</th>
						<th>Dokumen</th>
						<th>Keterangan</th>
						<th>Status</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
<?php

	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$result = $conn->query("SELECT * FROM perencanaan WHERE id_user = '$id'");
		$no = 1;
		while($row = mysqli_fetch_array($result)){
?>
					<tr>
						<th><?= $no++ ?></th>
					    <td><?= $row['nama_i']; ?></td>
					    <td><?= $row['pimpinan_i']; ?></td>
					    <td><?= $row['peruntukan']; ?></td>
					    <td><?= $row['kategori_proyek']; ?></td>
					    <td><?= $row['kelurahan']; ?></td>
					    <td><?= $row['kecamatan']; ?></td>
					    <td><?= $row['koordinat_l']; ?></td>
					    <td><?= $row['koordinat_b']; ?></td>
					    <td><?= $row['lokasi']; ?></td>
					    <td><?= $row['rencana_tr']; ?></td>
					    <td><?= $row['perkiraan_l']; ?></td>
					    <td><?= $row['perkiraan_p']; ?></td>
					    <td><?= $row['perkiraan_a']; ?></td>
					    <td><?= $row['m_persiapan']; ?></td>
					    <td><?= $row['m_pelaksanaan']; ?></td>
					    <td><?= $row['dokumen']; ?></td>
					    <td><?= $row['keterangan']; ?></td>
					    <td><?= $row['status']; ?></td>
					    <td class="flex flex-col justify-center gap-4">
					    	<a href="../index.php?halaman=edit&id=<?= $row['id_perencanaan']?>" role="button" class="mx-2 w-full px-4 py-2 btn btn-warning text-white hover:outline hover:outline-2 hover:outline-offset-2">Edit</a>
					    	<a href="#" class="mx-2 w-full px-4 py-2 btn btn-error text-white hover:outline hover:outline-2 hover:outline-offset-2" onclick="confirmDelete(<?= $row['id_perencanaan'] ?>)">Remove</a>
					    </td>
					</tr>
<?php
		}
	}
?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<script>
function confirmDelete(id) {
    Swal.fire({
        title: 'Konfirmasi Penghapusan',
        text: 'Anda yakin ingin menghapus data ini?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.value) {
            window.location.href = '../controller/remove-proc.php?s=<?= $_SESSION['role'] ?>&id=' + id;
        }
    });
}
</script>
