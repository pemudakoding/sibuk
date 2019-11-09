<?php 

	$nama_d 	= mysqli_real_escape_string($koneksi,strip_tags( trim($_POST['nama_d_u']) ) );
	$nama_b 	= mysqli_real_escape_string($koneksi,strip_tags( trim($_POST['nama_b_u']) ) );
	$username 	= mysqli_real_escape_string($koneksi,strip_tags( trim($_POST['username']) ) );
	$password   = mysqli_real_escape_string($koneksi,strip_tags( $_POST['password']) );
	$password   = password_hash($password,PASSWORD_DEFAULT);
	$level	    = mysqli_real_escape_string($koneksi,strip_tags( trim($_POST['level']) ) );
	$akses      = mysqli_real_escape_string($koneksi,strip_tags( trim($_POST['akses']) ) );
	$nama_foto 	= mysqli_real_escape_string($koneksi,strip_tags($_FILES['foto_user']['name']));


 ?>