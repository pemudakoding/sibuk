<?php 

	$nama_kelas  = mysqli_real_escape_string($koneksi,strip_tags(trim($_POST['nama_kelas'])));
	$tingkat	 = (int)strip_tags(trim($_POST['kelas']));

 ?>