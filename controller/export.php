<?php

include 'conn.php';

if (isset($_GET['w'])) {
    if ($_GET['w'] == 'week') {
        $awal = strtotime('last Monday');
        $akhir = strtotime('next Sunday');

        $query = "SELECT * FROM perencanaan WHERE waktu BETWEEN '$awal' AND '$akhir'";
        $result = $conn->query($query);

        $finaldata = [];
        while ($row = $result->fetch_assoc()) {
            $finaldata[] = $row;
        }

        // Mengirim header untuk file Excel
        header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        header("Content-Disposition: attachment; filename=\"data_" . date('Ymd_His') . ".xlsx\"");
        header("Cache-Control: max-age=0");

        // Menggunakan PHPExcel untuk membuat file Excel
        $objPHPExcel = new \PHPExcel();
        $objPHPExcel->getActiveSheet()->fromArray($finaldata);

        // Membuat file Excel dalam format Office Open XML (xlsx)
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit();
    } elseif ($_GET['w'] == 'month') {
        $awal = strtotime(date('Y-m-01')); 
        $akhir = strtotime(date('Y-m-t')); 
        $bulanan = "SELECT * FROM perencanaan WHERE waktu BETWEEN '$awal' AND '$akhir'";
        
        $result = $conn->query($bulanan);

        $finaldata = [];
        while ($row = $result->fetch_assoc()) {
            $finaldata[] = $row;
        }

        // Mengirim header untuk file Excel
        header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        header("Content-Disposition: attachment; filename=\"data_" . date('Ymd_His') . ".xlsx\"");
        header("Cache-Control: max-age=0");

        // Menggunakan PHPExcel untuk membuat file Excel
        $objPHPExcel = new \PHPExcel();
        $objPHPExcel->getActiveSheet()->fromArray($finaldata);

        // Membuat file Excel dalam format Office Open XML (xlsx)
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit();
    } elseif ($_GET['w'] == 'year') {
        $tahun_ini = date('Y'); 
        $awal = strtotime($tahun_ini . '-01-01'); 
        $akhir = strtotime($tahun_ini . '-12-31 23:59:59'); 

        $tahunan = "SELECT * FROM perencanaan WHERE waktu BETWEEN '$awal' AND '$akhir'";
        
        $result = $conn->query($tahunan);

        $finaldata = [];
        while ($row = $result->fetch_assoc()) {
            $finaldata[] = $row;
        }

        // Mengirim header untuk file Excel
        header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        header("Content-Disposition: attachment; filename=\"data_" . date('Ymd_His') . ".xlsx\"");
        header("Cache-Control: max-age=0");

        // Menggunakan PHPExcel untuk membuat file Excel
        $objPHPExcel = new \PHPExcel();
        $objPHPExcel->getActiveSheet()->fromArray($finaldata);

        // Membuat file Excel dalam format Office Open XML (xlsx)
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit();
    }
}
?>
