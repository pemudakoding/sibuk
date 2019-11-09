<?php 
	require_once "../core/init.php";
	$mapel = (int)$_GET['id_mapel'];
	$hapus = hapus_data_mapel($mapel);


	if ($hapus) {
		header('location:'.$url."/mapel/");
		setFlashMessages("Berhasil Menghapus Mata Pelajaran !!!","success");
	}else{
		header('location:'.$url."/mapel/");
		setFlashMessages("Gagal Menghapus Mata Pelajaran","error",'true');
	}

 ?>