<?php
include 'conn.php';

$dataPerencanaan = [];
$query = $conn->query("SELECT * FROM perencanaan");

while ($tiap = $query->fetch_assoc()) {
    $dataPerencanaan[] = $tiap;
}

if (isset($_GET['export'])) {
    if ($_GET['export'] == 'week') {
        $awal = strtotime('last Monday');
        $akhir = strtotime('next Sunday');

        $query = "SELECT * FROM perencanaan WHERE waktu BETWEEN '$awal' AND '$akhir'";
        createExcelFile($query);
    } elseif ($_GET['export'] == 'month') {
        $awal = strtotime(date('Y-m-01')); 
        $akhir = strtotime(date('Y-m-t')); 
        $bulanan = "SELECT * FROM perencanaan WHERE waktu BETWEEN '$awal' AND '$akhir'";
        createExcelFile($bulanan);
    } elseif ($_GET['export'] == 'year') {
        $tahun_ini = date('Y'); 
        $awal = strtotime($tahun_ini . '-01-01'); 
        $akhir = strtotime($tahun_ini . '-12-31 23:59:59'); 
        $tahunan = "SELECT * FROM perencanaan WHERE waktu BETWEEN '$awal' AND '$akhir'";
        createExcelFile($tahunan);
    }
}

function createExcelFile($query) {
    global $conn;
    $result = $conn->query($query);

    $finaldata = [];
    while ($row = $result->fetch_assoc()) {
        $finaldata[] = $row;
    }

    header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
    header("Content-Disposition: attachment; filename=\"data_" . date('Ymd_His') . ".xlsx\"");
    header("Cache-Control: max-age=0");

    $objPHPExcel = new \PHPExcel();
    $objPHPExcel->getActiveSheet()->fromArray($finaldata);

    $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save('php://output');
    exit();
}
?>

<div class="w-[10/12] sm:w-6/12 flex flex-col justify-center h-fit mt-24">
    <h1 class="text-6xl text-center font-bold">PENGAJUAN</h1>
    <p class="text-center">Selamat datang di Halaman Pengajuan Tanah! Berikut adalah ringkasan pengajuan tanah yang telah Anda kirimkan. Pantau status setiap pengajuan dan temukan kemudahan akses ke halaman tambah pengajuan tanah.</p>
</div>

<div class="w-7/12 h-fit my-12 p-4 flex flex-col gap-4 justify-center bg-neutral-100 rounded-3xl shadow-xl">
    <form action="" class="w-full p-4 flex justify-between rounded rounded-2xl shadow-md bg-base-100 gap-4">
        <div id="kecamatan">
            <div class="dropdown">
                <div tabindex="0" role="button" class="btn m-1">Export</div>
                <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                    <li><a href="?export=week">1 Minggu</a></li>
                    <li><a href="?export=month">1 Bulan</a></li>
                    <li><a href="?export=year">1 Tahun</a></li>
                </ul>
            </div>
        </div>
        <div id="kecamatan">
            <div class="rounded rounded-2xl ">
                <select id="kecamatanFilter" name="kecamatan" class="select select-bordered w-full rounded rounded-xl">
                    <option value="all">Kecamatan</option>
                    <?php 
                    $existingValues = [];
                    foreach ($dataPerencanaan as $data): 
                        if (!in_array($data['kecamatan'], $existingValues)) {
                            echo '<option value="' . $data['kecamatan'] . '">' . $data['kecamatan'] . '</option>';    
                            $existingValues[] = $data['kecamatan'];
                        }
                    endforeach; 
                    ?>
                </select>
            </div>
        </div>
        <div id="kategori">
            <div class="rounded rounded-2xl ">
                <select id="kategoriFilter" class="select select-bordered w-full max-w-xs rounded rounded-xl">
                    <option value="all">Kategori Proyek</option>
                    <option value="Proyek Strategis Nasional (PSN)">Proyek Strategis Nasional</option>
                    <option value="Non Proyek Strategis Nasional (Non-PSN)">Non Proyek Strategis Nasional</option>
                </select>
            </div>
        </div>
        <div id="status">
            <div class="rounded rounded-2xl ">
                <select id="statusFilter" class="select select-bordered w-full max-w-xs rounded rounded-xl">
                    <option value="all">Status</option>
                    <?php 
                    $existingValues = [];
                    foreach ($dataPerencanaan as $data): 
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
                    <th>Nama Instansi</th>
                    <th>Pimpinan Instansi</th>
                    <th>Kecamatan</th>
                    <th>Kategori Proyek</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $no = 1;
                    if (isset($_SESSION['role'])) {
                        if ($_SESSION['role'] == 'admin') {
                            $stmt = $conn->query("SELECT * FROM perencanaan ORDER BY id_perencanaan DESC");
                        } else {
                            $stmt = $conn->query("SELECT * FROM perencanaan WHERE id_user = {$_SESSION['id']} ORDER BY id_perencanaan DESC");
                        }
                    }

                    while ($row = $stmt->fetch_assoc()) {
                ?>
                <tr class="hover">
                    <th><?= $no++?></th>
                    <td><?= $row['nama_i'] ?></td>
                    <td><?= $row['pimpinan_i'] ?></td>
                    <td><?= $row['kecamatan'] ?></td>
                    <td><?= $row['kategori_proyek'] ?></td>
                    <td><?= $row['status'] ?></td>
                    <td><a href="?page=detail&id=<?=$row['id_perencanaan']?>" class="btn btn-info text-white hover:outline hover:outline-2 hover:outline-offset-2">Detail</a></td>
                </tr>
                <?php       
                    }
                ?>
            </tbody>
        </table>
    </div>
    <a href="?page=tambah" class="btn btn-info text-white hover:outline hover:outline-2 hover:outline-offset-2">Pengajuan</a>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    var kecamatanFilter = document.getElementById("kecamatanFilter");
    var kategoriFilter = document.getElementById("kategoriFilter");
    var statusFilter = document.getElementById("statusFilter");
    var semuaFilter = document.getElementById("semuaFilter");

    
    kecamatanFilter.addEventListener("change", filterData);
    kategoriFilter.addEventListener("change", filterData);
    statusFilter.addEventListener("change", filterData);
    semuaFilter.addEventListener("input", filterData);

    function filterData() {
        var kecamatanValue = kecamatanFilter.value;
        var kategoriValue = kategoriFilter.value;
        var statusValue = statusFilter.value;
        var semuaValue = semuaFilter.value.toLowerCase();

        var rows = document.querySelectorAll("tbody tr");

        rows.forEach(function(row) {
            var kecamatanCell = row.querySelector("td:nth-child(4)");
            var kategoriCell = row.querySelector("td:nth-child(5)");
            var statusCell = row.querySelector("td:nth-child(6)");
            var semuaCells = row.querySelectorAll("td"); 

            var kecamatanText = kecamatanCell.textContent || kecamatanCell.innerText;
            var kategoriText = kategoriCell.textContent || kategoriCell.innerText;
            var statusText = statusCell.textContent || statusCell.innerText;

            
            if ((kecamatanValue === "all" || kecamatanText === kecamatanValue) &&
                (kategoriValue === "all" || kategoriText === kategoriValue) &&
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
