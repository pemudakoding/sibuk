<?php


require '../core/init_cetak.php';
$id_kelas      	= (int)$_GET['id_kelas'];
$data_siswa 	= detail_siswa_kelas($id_kelas);
$data_siswa1 	= detail_siswa_kelas($id_kelas);
$data_kelas     = mysqli_fetch_assoc( detail_data_kelas($id_kelas) );
if(stristr($data_kelas['nama_kelas'],'PSB')){
    $data_siswa =  mysqli_query($koneksi,"SELECT * FROM siswa JOIN kelas ON siswa.id_kelas = kelas.id_kelas WHERE siswa.id_kelas = '$id_kelas' AND siswa.kelurahan IN ('ujuna','Ujuna','talise','Talise','besusu barat','Besusu Barat','kampung baru','Kampung Baru','baru','Baru')");
}

require_once '../inc/cetak_data.php';

$kelas      	= mysqli_fetch_array($data_siswa1);
$kelas      	= $kelas['kelas'].$kelas['nama_kelas'];

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;'.'filename='."SIBUK_KELAS_".$kelas."_DATA_SISWA.xlsx" );
header('Cache-Control: max-age=0');

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($excel,'Xlsx');
$writer->save('php://output');
?>