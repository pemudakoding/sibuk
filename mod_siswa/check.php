<?php
	
	
	require('../core/init.php');
	$nis 	= mysqli_real_escape_string($koneksi,strip_tags($_POST['nis']));	
	$query  = mysqli_query($koneksi,"SELECT * FROM siswa WHERE nis = '{$nis}'");
 	$result = mysqli_fetch_assoc($query);
 	$count  = mysqli_num_rows($query);
 	if($nis != ''){
	 	if ($count > 0) {
	 		
	 		$data = array(
	 			"nama"   => $result['nama_depan']." ".$result['nama_belakang'],
	 			"jumlah" => $count
	 		);
	 		echo json_encode($data);
	 	}else{
			$data = array(
				"nama"   => 'ok',
				"jumlah" => 0,
			);
			echo json_encode($data);
		 }
	 }else{
	 	header('location:'.$url);
	 }
?>