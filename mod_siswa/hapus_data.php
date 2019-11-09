<?php 
	
	require_once "../core/init.php";

	$nis 	= mysqli_real_escape_string($koneksi,strip_tags($_GET['nis_siswa']));
	$query	= detail_data_siswa('nis',$nis);
	$data   = mysqli_fetch_assoc($query);
	
	$query1 = hapus_data_siswa($nis);
	if ($query1) {

		@unlink('../asset/img/foto_siswa/'.$data['foto_siswa']);
		@unlink('../asset/img/foto_siswa/compress'.$data['foto_siswa']);
		header('location: ../');
		setFlashMessages("Berhasil Menghapus Data Siswa !!!","success");

	}else{
		
		header('location: ../');
		setFlashMessages("Berhasil Menghapus Data Siswa !!!","error",'true');
	}


 ?>