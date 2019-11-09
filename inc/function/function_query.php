<?php 

	function run_query($query){
		GLOBAL $koneksi;
		$result = mysqli_query($koneksi,$query);

		if ($result) return true;
		return false;
	}
	function multiQuery($query){
		GLOBAL $koneksi;
		$result = mysqli_multi_query($koneksi,$query);

		if ($result) return true;
		return false;
	}

	function query_get($query){
		GLOBAL $koneksi;

		$result = mysqli_query($koneksi,$query);
		return $result;

	}
	

 ?>