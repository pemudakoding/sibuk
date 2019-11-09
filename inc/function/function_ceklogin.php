<?php 

	//============================================================
	// =====================Cek validasi==========================
	//============================================================
	
	// ============ UPDATE
	function cek_login(){
		GLOBAL $url;
		if (!isset($_SESSION['login']) || $_SESSION['level'] == 'guru' || $_SESSION['level'] == 'operator') {
			header('location: '.$url.'/index.php');
		}
	}

 ?>