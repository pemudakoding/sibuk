<?php 
	
	if (!isset($_GET['hal'])) {
		header('location: 1');
	}else{
		if ($_GET['hal'] < 1) {
			header('location: 1');
		}
	}


 ?>