<?php 

	require_once "core/init.php";
	if (isset($_SESSION['login']) && $_SESSION['level'] == 'guru' || isset($_SESSION['login']) && $_SESSION['level'] == 'operator') {
		$url = $url.'/siab/';
		header('location:'.$url);
	}else if(isset($_SESSION['login']) && $_SESSION['level'] != 'guru' || isset($_SESSION['login']) && $_SESSION['level'] != 'operator'){
		header('location:'.$url."/beranda.php");
	}

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SIBUK LOGIN</title>
	<link rel="stylesheet" type="text/css" href="asset/css/login.css">
	<script type="text/javascript" src="asset/js/sweetalert.min.js"></script>
	<style type="text/css">
		a{text-decoration: none;color: #3498db;}
		a:hover{color: black;background-color: dodgerblue;}
	</style>
</head>
<body>

	<form class="box" action="" method="POST">
		<h1>Login</h1>
		<input type="text" name="username" placeholder="Username" id="file" autocomplete="off">
		<input type="Password" name="password" placeholder="Password">
		<input type="submit" name="submit" value="Login" id="submit">
	</form>


	<script type="text/javascript">

		var c_danger 	= '#b63333';
		var input = document.getElementsByTagName('input');
		var file   = document.getElementById('submit'); 

		function validation_input(e){
		if (input.length >= 0) {
			for(i = 0; i < input.length;){
				if (input[i].type === 'text'|| input[i].type === 'password') {
					if (input[i].value.trim() === "") {
						e.preventDefault();
						input[i].style.borderColor = c_danger;				
						swal({
							title: 'Masih ada form yang kosong',
							icon: 'warning',
							dangerMode: true,
						});
					}
				}
				input[i].onclick = function(e){e.target.style.borderColor = "dodgerblue";};
				i++;
			}
		}
	}

	file.addEventListener('click',validation_input);

	</script>
	<?php 

	if (isset($_POST['submit'])) {
		$username = mysqli_real_escape_string($koneksi,strip_tags( trim($_POST['username']) ) );
		$password = mysqli_real_escape_string($koneksi,strip_tags($_POST['password']));
		$data 	  = mysqli_fetch_assoc(cek_user($username));	
		
		
		
		if(password_verify("$password",$data['password'])){
			if ($data['akses'] == "Y") {
				$_SESSION['username'] 	= $data['username'];
				$_SESSION['login'] 		= 1;
				$_SESSION['level'] 		= $data['level'];
				// ============ UPDATE
				if($data['level'] == 'guru' || $data['level'] == 'operator'){
					header('location: '.$url.'/siab/beranda');
				}else{
					header('location: beranda.php');
				}
			}else{
				echo '	<script>
							swal({
									title: "Tidak ada akses login",
									text: "Akun kamu belum diberi akses login. \n  hubungin admin untuk meminta akses login.",
									icon: "warning",
									dangerMode: true,
							});
						</script>
					';
			}
		}else{
			echo "	<script>
						 swal({
						 		title: 'Username Atau Password Salah',
						 		icon: 'warning',
						 		dangerMode: true,
						 	});
					</script>
					";
		}	

	}

	 ?>
	 
</body>	

</html>
