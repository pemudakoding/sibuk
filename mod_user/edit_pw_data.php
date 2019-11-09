
<?php 
	require_once "../core/init.php";
	require_once "../core/cek_login.php";
	error_reporting(0);
		// GET ID KELAS  FROM URL
		$id_user	  = (int)$_GET['id_user'];
		$nama_url     = mysqli_real_escape_string($koneksi,$_GET['nama']);

		if ($id_user != 0) {
			$query = detail_data_user('id_user',$id_user);
			$data  = mysqli_fetch_assoc($query);
			


			$parse = pars_name($nama_url,'username','');
			//Jika data yang ditemukan tidak ada 
			//atau 
			//nama siswa tidak sama yang kayak di url maka redirect ke beranda
			if (mysqli_num_rows($query) < 1 || $parse) {

				header('location:'.$url.'/user/');
				setFlashMessages("Data User Tidak ditemukan !!!","error",'true');

			}else{

				if(isset($_POST['submit'])){
					
					$edit_user = edit_pw_user($data['id_user']);
					if ($edit_user) {
						header('location:'.$url.'/user/');
						setFlashMessages("Data User Berhasil disunting !!!","success");
					}else{
						header('location:'.$url.'/user/');
						setFlashMessages("Data User Gagal disunting !!!","error",'true');
					}

				}
			}


		}else{
			header('location:'.$url.'/user/');
			setFlashMessages("Data User Tidak ditemukan !!!","error",'true');
		}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>SIBUK - UBAH PASSWORD USER <?= strtoupper($data['nama_depan']." ".$data['nama_belakang']) ?> </title>
	<?php require_once('../template/css.php') ?>

	<script src='<?=$url?>/asset/js/jquery-3.1.1.min.js'></script>
	<script src='<?=$url?>/asset/js/sweetalert.min.js'></script>
</head>
<body>
	<div class="container">
		<?php require_once('../template/menu-side.php'); ?>

		<div class="headbar">
			<?php require_once('../template/header.php'); ?>
			<form class="form" action="" method="POST" enctype="multipart/form-data">
			<div class="nav">UBAH PASSWORD USER <span> <?= strtoupper($data['nama_depan']." ".$data['nama_belakang']) ?> </span></div>
			<div class="main">
				<div class="row">
					<div class="data box4 box-sm-12 box-md-4">
						<div class="gap">
							<div class="selector">
								<a href="#" id="bio_siswa" class="box-sm-12">PASSWORD USER</a>
								<button type="submit" name="submit" class="buttons buttons-submit" id="submit" > SUBMIT </button>
							</div>
						</div>
					</div>
					<div class="data box8 box-sm-12 box-md-8">
						<div class="gap">
							<div class="bio">			
								<section id="guru">
									<h2>PASSWORD USER</h2>
									<p>Data harus benar agar tidak menjadi masalah di kemudian hari</p>
								
									<div class="row">
										<div class="data box8 box-mds-12">
											<h4>Password User:</h4>
											<input type="password" name="password" id="password">
											<input type="text" name="" readonly ='' hidden="" id="file" value="SIBUK">
										</div>
									</div>						
								</section>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
			
	<script src='<?= $url; ?>/asset/js/main.js'></script>
	<script src='<?= $url; ?>/asset/js/validation_all.js' type="module"></script>
	<script type="text/javascript">

		var input = document.getElementsByTagName('input');
		for(i = 1; i < input.length;){
			input[i].setAttribute('autocomplete','off');
			i++;
		}
		function val_null(e){
			for(i = 0; i < input.length;){
				console.log(input[i].type);
				 if (input[i].value === '') {
				 	e.preventDefault();
					input[i].style.backgroundColor = c_danger;				
					alert();
				 }
				i++;
			}
		}

		submit.addEventListener('click',val_null);
	</script>

</body>
</html>
