<?php
	/**
	 * BIO SEKOLAH
	 */
	$nama_sekolah 		= mysqli_real_escape_string($koneksi,strip_tags($_POST['nama_sekolah']));
	$status_sekolah		= mysqli_real_escape_string($koneksi,strip_tags($_POST['status_sekolah']));
	$no_stats_sekolah	= mysqli_real_escape_string($koneksi,strip_tags($_POST['no_stats_sekolah']));
	$npsn_sekolah		= mysqli_real_escape_string($koneksi,strip_tags($_POST['npsn']));
	$alamat_sekolah		= mysqli_real_escape_string($koneksi,strip_tags($_POST['alamat_sekolah']));
	$kota_sekolah		= mysqli_real_escape_string($koneksi,strip_tags($_POST['kota_sekolah']));
	$kecamatan			= mysqli_real_escape_string($koneksi,strip_tags($_POST['kecamatan']));
	$provinsi			= mysqli_real_escape_string($koneksi,strip_tags($_POST['provinsi']));
	$no_telp_sekolah	= mysqli_real_escape_string($koneksi,strip_tags($_POST['no_telp_sekolah']));
	$email_sekolah		= mysqli_real_escape_string($koneksi,strip_tags($_POST['email_sekolah']));
	$web_sekolah		= mysqli_real_escape_string($koneksi,strip_tags($_POST['web_sekolah']));

	$nama_kepsek		= mysqli_real_escape_string($koneksi,strip_tags($_POST['nama_kepsek']));
	$jabatan_kepsek		= mysqli_real_escape_string($koneksi,strip_tags($_POST['jabatan_kepsek']));
	$nip_kepsek			= mysqli_real_escape_string($koneksi,strip_tags($_POST['nip_kepsek']));

	/**
	 * TAHUN AJARAN
	 */
	$id_tahun_ajaran 		= mysqli_real_escape_string($koneksi,strip_tags($_POST['tahun_ajaran']));
	$tahun_ajaran    		= mysqli_real_escape_string( $koneksi,strip_tags( trim( $_POST['awal_tahun_ajaran']."/".$_POST['akhir_tahun_ajaran'] ) ) );
	
?>