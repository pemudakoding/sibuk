<?php
	
	function data_sekolah(){

		$query = "SELECT * FROM sekolah";

		return query_get($query);
	}


	function edit_sekolah($name_foto){
		GLOBAL $koneksi;
		require_once('variable/variable_sekolah.php');
		$query = "UPDATE sekolah SET nama_sekolah 		= '$nama_sekolah',
									alamat_sekolah 		= '$alamat_sekolah',
									status_sekolah 		= '$status_sekolah',
									no_stats_sekolah 	= '$no_stats_sekolah',
									npsn 				= '$npsn_sekolah',
									kota_sekolah   		= '$kota_sekolah',
									kecamatan   		= '$kecamatan',
									provinsi   			= '$provinsi',
									no_telp_sekolah		= '$no_telp_sekolah',
									email_sekolah		= '$email_sekolah',
									web_sekolah			= '$web_sekolah',
									nama_kepsek			= '$nama_kepsek',
									jabatan_kepsek   	= '$jabatan_kepsek',
									nip_kepsek			= '$nip_kepsek',
									foto_kepsek			= '$name_foto'; ";
		$query .= "UPDATE tahun_ajaran SET status = 'N' WHERE id_thn_ajaran != '$id_tahun_ajaran'; ";
		$query .= "UPDATE tahun_ajaran SET status = 'Y' WHERE id_thn_ajaran  = '$id_tahun_ajaran'; ";
		return multiQuery($query);
	}

	function dataTahunAjaran(){
		$query = "SELECT * FROM tahun_ajaran ORDER BY tahun_ajaran ASC";
	
		return query_get($query);
	}

	function insertTahunAjaran(){
		GLOBAL $koneksi;
		require('variable/variable_sekolah.php');
		
		$query = "INSERT INTO tahun_ajaran VALUES(null,'$tahun_ajaran','N')";
		

		return run_query($query);
	}
?>
