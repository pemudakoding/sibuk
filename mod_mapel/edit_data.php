
<?php 
	error_reporting(0);
	require_once "../core/init.php";
	require_once "../core/cek_login.php";
	$id_mapel = (int)$_GET['id_mapel'];
	$nama 	  = (string)$_GET['nama'];

	if ($id_mapel != 0) {
		$query = detail_data_mapel($id_mapel);
		$data  = mysqli_fetch_assoc($query);

		//Ambil value var nama terus ganti - jadi spasi
		$parse = pars_name($nama,'nama_mapel','');

		
		//Jika data yang ditemukan tidak ada 
		//atau 
		//nama GURU tidak sama yang kayak di url maka redirect ke beranda
		if (mysqli_num_rows($query) < 1 || $parse) {
	
			header('location:'.$url.'/mapel/');
			setFlashMessages("Data Mata Pelajaran Tidak Ditemukan !!!","error",'true');

		}else{

			if (isset($_POST['submit'])) {
				$edit_mapel = edit_mapel($data['id_mapel']);
				if ($edit_mapel) {
					header('location:'.$url.'/mapel/');
					setFlashMessages("Berhasil menyunting mata pelajaran !!!","success");
				}else{
					header('location:'.$url.'/mapel/');
					setFlashMessages("Gagal Menyunting mata pelajaran !!!","error",'true');
				}
			}
			

		}

	}else{
		
		header('location:'.$url.'/mapel/');
		setFlashMessages("Data Mata Pelajaran Tidak Ditemukan !!!","error",'true');
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>SIBUK - UBAH DATA MATA PELAJARAN <?= strtoupper($data['nama_mapel']) ?></title>
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
				<div class="nav">UBAH DATA MATA PELAJARAN <span> <?= strtoupper($data['nama_mapel']) ?> </span></div>
				<div class="main">
					<div class="row">
						<div class="data box4 box-md-4 box-sm-12">
							<div class="gap">
								<div class="selector">
									<a href="#" id="bio_siswa" class="box-sm-12">DATA MATA PELAJARAN</a>
									<button type="submit" name="submit" class="buttons buttons-submit" id="submit" > SUBMIT </button>
								</div>
							</div>
						</div>
						<div class="data box8 box-md-8 box-sm-12">
							<div class="gap">
								<div class="bio">
									<section id="guru">
										<h2>DATA MATA PELAJARAN</h2>
										<p>Data harus benar agar tidak menjadi masalah di kemudian hari</p>
										<div class="row">
											<div class="data box12">
												<h4>Nama Mata Pelajaran</h4>
												<input type="text" name="nama_mapel" value="<?= $data['nama_mapel'] ?>">
												<input type="text" value="id" id="file" hidden>
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
	</div>
				

	<script src='<?= $url; ?>/asset/js/main.js'></script>
	<script src='<?= $url; ?>/asset/js/validation_all.js' type="module"></script>
	<script type="text/javascript">
		var input = document.getElementsByTagName('input');
		for(i = 1; i < input.length;){
			input[i].setAttribute('autocomplete','off');
			i++;
		}
	</script>

</body>
</html>
