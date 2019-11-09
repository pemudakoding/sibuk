<?php 
	require_once '../core/init.php';
	$nim 	= mysqli_real_escape_string($koneksi,strip_tags($_GET['nim_guru']));
	$query	= detail_data_guru('nim',$nim);
	$data   = mysqli_fetch_assoc($query);
	//Jika id guru ada di table wali kelas
	//maka masuk ke kondisi true
	//jika tidak masuk ke kondisi false
	if ($data['id_guru_wakel'] == '') {

		$query1 = hapus_data_guru($nim);

		//Jika query1 berhasil dijalankan maka
		// masuk ke kondisi true
		if ($query1) {

			@unlink('../asset/img/foto_guru/'.$data['foto_guru']);
			header('location: ../');
			setFlashMessages("Berhasil Menghapus Data Guru !!!","success");

		}else{

			header('location: ../');
			setFlashMessages("Gagal Menghapus Data Guru !!!","error",'true');

		}

	}else{

		$query2 = hapus_wali_kelas($data['id_guru']);

		//Jika query2 berhasil dijalankan
		//maka lakukan query1
		//jika query1 berhasil dijalankan
		//hapus foto guru
		if ($query2) {

			$query1 = hapus_data_guru($nim);
			if ($query1) {
				@unlink('../asset/img/foto_guru/'.$data['foto_guru']);
				header('location: ../');
				setFlashMessages("Berhasil Menghapus Data Guru !!!","succes");
			}else{
				header('location: ../');
				setFlashMessages("Gagal Menghapus Data Guru !!!","error",'true');
				
			}
		}
	}
	


 ?>