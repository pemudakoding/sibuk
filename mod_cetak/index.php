<?php


require '../core/init_cetak.php';
$data_siswa = data_siswa('aktif','');



require_once '../inc/cetak_data.php';




header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="SIBUK_SEMUA_DATA_SISWA.xlsx" ');
header('Cache-Control: max-age=0');

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($excel,'Xlsx');
$writer->save('php://output');
?>