<?php
	require_once "../core/init.php";
	$kelas 		  = (int)$_GET['id_kelas'];
	$detail_kelas = detail_data_kelas($kelas);
	$fetch_kls    = mysqli_fetch_assoc($detail_kelas);


	if ($fetch_kls['nama_guru'] == '')
	{
		if (hapus_data_kelas($kelas))
		{
			header('location: ../');
			setFlashMessages("Berhasil Menghapus Kelas !!!","success");

		}else{
			header('location: ../');
			setFlashMessages("Gagal Menghapus Kelas !!!","success",true);
		}
	}else{

		if (hapus_wali_kelas1($kelas)) {

			if(hapus_data_kelas($kelas))
			{
				header('location: ../');
				setFlashMessages("Berhasil Menghapus Kelas !!!","success");

			}else{

				header('location: ../');
				setFlashMessages("Gagal Menghapus Kelas !!!","success",true);
			}

		}else{

			header('location: ../');
			setFlashMessages("Gagal Menghapus Kelas !!!","success",true);
		}
	}



 ?>