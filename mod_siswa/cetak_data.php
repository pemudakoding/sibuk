<?php


require '../core/init_cetak.php';
$nis 		 = (int)$_GET['nis_siswa'];
$data_siswa  = detail_data_siswa('nis',$nis);
$data_siswa1 = detail_data_siswa('nis',$nis);

require_once '../inc/cetak_data.php';

$nama_siswa = mysqli_fetch_assoc($data_siswa1);
$nama 		= trim($nama_siswa['nama_depan']." ".$nama_siswa['nama_belakang']);
$nama 		= str_replace(' ', '-', $nama);
$nama 		= strtoupper($nama);

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename='.'SIBUK_DATA_SISWA_'.$nama.'.xlsx');
header('Cache-Control: max-age=0');

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($excel,'Xlsx');
$writer->save('php://output');

?>