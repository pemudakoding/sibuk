<?php


require '../core/init_cetak.php';
$kelas      	= (int)$_GET['kelas'];
$data_siswa 	= detail_data_siswa('kelas',$kelas);
$data_siswa1 	= detail_data_siswa('kelas',$kelas);

require_once '../inc/cetak_data.php';


header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;'.'filename='."SIBUK_KELAS_".$kelas."_DATA_SISWA.xlsx" );
header('Cache-Control: max-age=0');

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($excel,'Xlsx');
$writer->save('php://output');
?>