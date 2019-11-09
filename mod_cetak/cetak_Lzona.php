<?php
require '../core/init_cetak.php';
    
    $data_siswa =  mysqli_query($koneksi,"SELECT * FROM siswa JOIN kelas ON siswa.id_kelas = kelas.id_kelas WHERE siswa.id_kelas IN (SELECT kelas.id_kelas FROM kelas WHERE kelas.nama_kelas LIKE '%PSB%') AND siswa.kelurahan NOT IN ('ujuna','Ujuna','talise','Talise','besusu barat','Besusu Barat','kampung baru','Kampung Baru','baru','Baru')");
    $data_siswa1=  mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM siswa JOIN kelas ON siswa.id_kelas = kelas.id_kelas WHERE siswa.id_kelas IN (SELECT kelas.id_kelas FROM kelas WHERE kelas.nama_kelas LIKE '%PSB%') AND siswa.kelurahan NOT IN ('ujuna','Ujuna','talise','Talise','besusu barat','Besusu Barat','kampung baru','Kampung Baru','baru','Baru')"));
    $data_kelas = mysqli_fetch_assoc( detail_data_kelas($data_siswa1['id_kelas']) );
    require_once '../inc/cetak_data.php';

    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;'.'filename='."SIBUK_KELAS_LUAR-ZONA_DATA_SISWA.xlsx" );
    header('Cache-Control: max-age=0');

    $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($excel,'Xlsx');
    $writer->save('php://output');


?>