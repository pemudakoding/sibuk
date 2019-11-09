<?php 

	//==================================
	//==============VARIABLE GURU=======
	//==================================
		$username 			= mysqli_real_escape_string($koneksi, strip_tags($_POST['username']));
		$password			= mysqli_real_escape_string($koneksi,strip_tags($_POST['password']));
		$password 			= password_hash($password,PASSWORD_DEFAULT);
		$nama_depan_guru 	= mysqli_real_escape_string($koneksi, strip_tags(trim($_POST['nama_d_g'])));
		$nama_belakang_guru = mysqli_real_escape_string($koneksi, strip_tags(trim($_POST['nama_b_g'])));
		$nama_lengkap_guru	= $nama_depan_guru." ".$nama_belakang_guru;
		$nim_guru           = mysqli_real_escape_string($koneksi,strip_tags($_POST['nim_g']));
		$mapel			    = mysqli_real_escape_string($koneksi,strip_tags($_POST['mapel']));
		$foto_guru 			= mysqli_real_escape_string($koneksi,strip_tags($_FILES['foto_guru']['name']));
		$akses				= mysqli_real_escape_string($koneksi,strip_tags($_POST['akses']));

 ?>