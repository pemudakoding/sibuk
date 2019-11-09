<?php 

	$page       = 9;
	function pagination_data($perPage,$function_get){
		$per_hal 	= (int)$perPage;
		$hal        = isset($_GET['hal']) ? (int)$_GET['hal'] : (int)1;
		$mulai		= ($hal > 1) ? ($hal * $per_hal) - $per_hal : 0;
		$query  	= $function_get("LIMIT ".$mulai.",".$per_hal);


		return $query;
	}

	function pagination_number($perPage,$function_get){
		$per_hal 	= (int)$perPage;
		$query      = $function_get("");
		$total      = mysqli_num_rows($query);
		$hals 		= ceil($total/$per_hal);
		return $hals;
	}
	
	 /**
	  * halaman pagination untuk 
      * siswa
	  */
	function pagination_siswa($perPage,$status){
		$per_hal 	= (int)$perPage;
		$hal        = isset($_GET['hal']) ? (int)$_GET['hal'] : (int)1;
		$mulai		= ($hal > 1) ? ($hal * $per_hal) - $per_hal : 0;
		$query  	= data_siswa($status,"LIMIT ".$mulai.",".$per_hal);


		return $query;
	}

	function pagination_number_siswa($perPage,$status){
		$per_hal 	= (int)$perPage;
		$query      = data_siswa($status,"");
		$total      = mysqli_num_rows($query);
		$hals 		= ceil($total/$per_hal);

		return $hals;
	}

	function check_page(){
		GLOBAL $url;
		GLOBAL $koneksi;
		GLOBAL $page_number;
		
		if($page_number == 0){
			$page_number = 1;
		}

		if(isset($_GET['hal'])){
			$hal = mysqli_real_escape_string($koneksi,strip_tags($_GET['hal']));
			if( $hal < 1 || $hal > $page_number ){
				header('location:'.$url."/beranda.php");
			}
			
		}
	}

	function pagination_numb_show(){
		GLOBAL $page_number;
		GLOBAL $koneksi;

		/*
			Jika parameter url hal sudah di set?
		*/
		if (isset($_GET['hal'])) {
			$hal = mysqli_real_escape_string($koneksi,strip_tags($_GET['hal']));

			$prev_butt = $hal - 1;
			if($hal > 1){
				echo "<a href='1' style='background:dodgerblue; color:white !important; font-weight:bolder;'> << </a>";
			}
			
			/**	
			 * NEXT PAGING
			 */
			$back_page = $hal - 3;
			for($i=$back_page; $i < $hal;$i++){
				if($i >= 1){
					echo "<a href='$i'>$i</a>";
				}
			}

			/**
			 * ACTIVE PAGE
			 */
			echo "<span style='background:dodgerblue'>$hal</span>";

			/**	
			 * NEXT PAGING
			 */
			$next_page = $hal + 3;
			for($i=$hal+1; $i <= $next_page;$i++){
				if($i <= $page_number){
					echo "<a href='$i'>$i</a>";
				}
			}
			
			if($hal < ($page_number - 4) ){
				echo "<span>...</span>";
			}

			if($hal < ($page_number - 3) ){
				echo "<a href='$page_number'>$page_number</a>";
			}

			/**
			 * NEXT BUTTON
			 */
			$next_butt = $hal + 1;
			if($hal < $page_number){
				echo "<a href='$page_number' style='background:dodgerblue; color:white !important; font-weight:bolder;'> >> </a>";
			}
		}

	}

 ?>