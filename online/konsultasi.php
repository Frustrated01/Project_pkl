<div class="w-[10/12] sm:w-6/12 flex flex-col justify-center h-fit mt-24">
	<h1 class="text-6xl text-center font-bold">PENGAJUAN</h1>
	<p class="text-center">Selamat datang di Halaman Pengajuan Tanah! Berikut adalah ringkasan pengajuan tanah yang telah Anda kirimkan. Pantau status setiap pengajuan dan temukan kemudahan akses ke halaman tambah pengajuan tanah.</p>
</div>

<?php 

    $dataKonsultasi = [];
    $query = $conn->query("SELECT * FROM konsultasi");

    while ($tiap = $query->fetch_assoc()) {
        $dataKonsultasi[] = $tiap;
    }

?>

<div class="w-7/12 h-fit my-12 p-4 flex flex-col gap-4 justify-center bg-neutral-100 rounded-3xl shadow-xl">
	<form action="" class="w-full p-4 flex justify-between rounded rounded-2xl shadow-md bg-base-100 gap-4">
	    <div id="kategori">
	        <div class="rounded rounded-2xl ">
	            <select id="kategoriFilter" class="select select-bordered w-full max-w-xs rounded rounded-xl">
	                <option value="all">Kategori Proyek</option>
	                <option value="Cara Penggunaan Website">Cara Penggunaan Website</option>
	                <option value="Persyaratan Lainnya">Persyaratan Lainnya</option>
	                <option value="Lainnya">Lainnya</option>
	            </select>
	        </div>
	    </div>
	    <div id="status">
	        <div class="rounded rounded-2xl ">
	            <select id="statusFilter" class="select select-bordered w-full max-w-xs rounded rounded-xl">
	                <option value="all">Status</option>
	                <?php 
	                $existingValues = [];
	                foreach ($dataKonsultasi as $data): 
	                    if (!in_array($data['status'], $existingValues)) {
	                        echo '<option value="' . $data['status'] . '">' . $data['status'] . '</option>';    
	                        $existingValues[] = $data['status'];
	                    }
	                endforeach; 
	                ?>
	            </select>
	        </div>
	    </div>
	    <div id="semua">
	        <div class="rounded rounded-2xl ">
	            <input type="text" placeholder="Cari..." id="semuaFilter"
	                class="input input-bordered w-full max-w-xs rounded rounded-xl" />
	        </div>
	    </div>
	</form>

	<div class="overflow-x-auto w-full bg-base-100 rounded-2xl p-2 shadow-md">
	  <table class="table">
	    <thead>
	      <tr>
	        <th></th>
	        <th>Nama Lengkap</th>
	        <th>Email</th>
	        <th>Telephone</th>
	        <th>Topik</th>
	        <th>Status</th>
	        <th>Aksi</th>
	      </tr>
	    </thead>
	    <tbody>
	    	<?php 
	    		$no = 1;
	    		if (isset($_SESSION['role'])) {
	    			if ($_SESSION['role'] == 'admin') {
			    		$stmt = $conn->query("SELECT * FROM konsultasi ORDER BY id_konsultasi DESC");
	    			} else {
			    		$stmt = $conn->query("SELECT * FROM konsultasi WHERE id_user = {$_SESSION['id']} ORDER BY id_konsultasi DESC");

	    			}
	    		}

	    		while ($row = $stmt->fetch_assoc()) {
	    	?>
	      <tr class="hover">
	        <th><?= $no++?></th>
	        <td><?= $row['username_g'] ?></td>
	        <td><?= $row['email_g'] ?></td>
	        <td><?= $row['telephone_g'] ?></td>
	        <td><?= $row['topik'] ?></td>
	        <td><?= $row['status'] ?></td>
	        <?php
	        	if (isset($row['status'])) {
	        		if ($row['status'] == 'Sudah Dibalas') {
	        			echo '<td><a href="?page=balasan&id=' . $row['id_konsultasi'] . '" class="btn btn-info text-white hover:outline hover:outline-2 hover:outline-offset-2">Lihat</a></td>';			
	        		} else {
	        			if (isset($_SESSION['role'])) {
	        				if ($_SESSION['role'] == 'admin') {
			        			echo '<td><a href="?page=balas&id=' . $row['id_konsultasi'] . '" class="btn btn-info text-white hover:outline hover:outline-2 hover:outline-offset-2">Balas</a></td>';
	        				} else {
			        			echo '<td><a href="?page=balasan&id=' . $row['id_konsultasi'] . '" class="btn btn-info text-white hover:outline hover:outline-2 hover:outline-offset-2">Lihat</a></td>';
	        				}
	        			}
	        		}
	        	}
	        ?>
	      </tr>
	  <?php } ?>
	    </tbody>
	  </table>
	</div>
	<a href="../index.php?page=konsultasi&id<?php $_SESSION['id'] ?>" class="btn btn-info text-white hover:outline hover:outline-2 hover:outline-offset-2">Konsultasi</a>
</div>

<script>
	document.addEventListener("DOMContentLoaded", function() {
	    var kategoriFilter = document.getElementById("kategoriFilter");
	    var statusFilter = document.getElementById("statusFilter");
	    var semuaFilter = document.getElementById("semuaFilter");

	    kategoriFilter.addEventListener("change", filterData);
	    statusFilter.addEventListener("change", filterData);
	    semuaFilter.addEventListener("input", filterData);

	    function filterData() {
	        var kategoriValue = kategoriFilter.value;
	        var statusValue = statusFilter.value;
	        var semuaValue = semuaFilter.value.toLowerCase();

	        var rows = document.querySelectorAll("tbody tr");

	        rows.forEach(function(row) {
	            var kategoriCell = row.querySelector("td:nth-child(5)");
	            var statusCell = row.querySelector("td:nth-child(6)");
	            var semuaCells = row.querySelectorAll("td"); 

	            var kategoriText = kategoriCell.textContent || kategoriCell.innerText;
	            var statusText = statusCell.textContent || statusCell.innerText;

	            
	            if ((kategoriValue === "all" || kategoriText === kategoriValue) &&
	                (statusValue === "all" || statusText === statusValue)) {
	                
	                var found = false;
	                semuaCells.forEach(function(cell) {
	                    var cellText = cell.textContent || cell.innerText;
	                    if (cellText.toLowerCase().indexOf(semuaValue) > -1) {
	                        found = true;
	                    }
	                });
	                if (found) {
	                    row.style.display = "";
	                } else {
	                    row.style.display = "none";
	                }
	            } else {
	                row.style.display = "none";
	            }
	        });
	    }
	});
</script>