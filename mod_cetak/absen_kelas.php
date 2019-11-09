<?php


require '../core/init_cetak.php';
$id_kelas      	= (int)$_GET['id_kelas'];
$data_siswa 	= detail_siswa_kelas($id_kelas);
$data_siswa1 	= detail_siswa_kelas($id_kelas);
$data_siswa2 	= detail_siswa_kelas($id_kelas);
$guru           = mysqli_fetch_assoc(detail_data_kelas($id_kelas));
$data_sekolah   = mysqli_fetch_assoc(data_sekolah());

require_once '../inc/cetak_absensi.php';

$kelas      	= mysqli_fetch_array($data_siswa2);
$kelas      	= $kelas['kelas'].$kelas['nama_kelas'];

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;'.'filename='."SIBUK_KELAS_".$kelas."_ABSEN_SISWA.xlsx" );
header('Cache-Control: max-age=0');

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($excel,'Xlsx');
$writer->save('php://output');
?>