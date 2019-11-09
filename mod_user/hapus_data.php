<?php 
	require_once '../core/init.php';
	$id 	= (int)mysqli_real_escape_string($koneksi,strip_tags($_GET['id_user']));
	$query	= detail_data_user('id_user',$id);
	$data   = mysqli_fetch_assoc($query);
	
	print_r($data);
	$query1 = hapus_data_user($id);
	if ($query1) {

		@unlink('../asset/img/foto_user/'.$data['foto_user']);
		header('location: '.$url.'/user/');
		setFlashMessages("Berhasil Menghapus Data User !!!","success");

	}else{
		
		header('location: '.$url.'/user/');
		setFlashMessages("Gagal Menghapus Data User !!!","error",'true');
	}


 ?>