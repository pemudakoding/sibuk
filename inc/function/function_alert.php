<?php 
	
	//============================================================
	// =====================ALERT=================================
	//============================================================
	function alert_nim_guru(){
		if (isset($_SESSION['cek_nim']) == 1) {
			echo "<script>
					swal({
						title: 'NIM sudah dipakai !!!',
						icon: 'warning',
						dangerMode: true,
						})
				</script>";

			$_SESSION['cek_nim'] = '';
			unset($_SESSION['cek_nim']);
		}
	}

	function alert_sapnu_guru_1(){
		if (isset($_SESSION['cek_unim']) == 1) {
			echo "<script>
					swal({
						title: 'NIM dan USERNAME sudah dipakai !!!',
						icon: 'warning',
						dangerMode: true,
						})
				</script>";

			$_SESSION['cek_unim'] = '';
			unset($_SESSION['cek_unim']);
		}
	}

	function insert_alert($alert,$type,$dangerMode){
		$alert = "<script>
					swal({
						title: \"$alert\".toUpperCase(),
						icon: '$type',
						dangerMode: $dangerMode
						})
				</script>";

		return $alert;
	}

	function setFlashMessages($pesan,$typeFlash,$dangerMode = 'false'){
		$data = [
			"pesan" 	=> $pesan,
			"typeFlash"	=> $typeFlash,
			"dangerMode"=> $dangerMode
		];

		set_session('messages',$data);
	}

	function showFlashMessages(){
		if(isset($_SESSION['messages'])){
			$session = get_session('messages');
			unset($_SESSION['messages']);
			return insert_alert($session['pesan'],$session['typeFlash'],$session['dangerMode']);
		}
	}	
 ?>


