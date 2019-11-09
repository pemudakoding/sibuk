
<?php 
	require_once "../core/init.php";
	require_once "../core/cek_login.php";
	if (isset($_POST['submit'])) {
		$tambah = tambah_data_mapel();
		
		if ($tambah) {
			header('location: ../');
			setFlashMessages("Berhasil menambahkan mata pelajaran !!!","success");
		}else{
			header('location: ../');
			setFlashMessages("Gagal menambahkan mata pelajaran !!!","error",'true');
		}
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>SIBUK - TAMBAH DATA MATA PELAJARAN</title>
	<?php require_once('../template/css.php') ?>

	<script src="../../asset/js/jquery-3.1.1.min.js"></script>
	<script src="../../asset/js/sweetalert.min.js"></script>
</head>
<body>
	<div class="container">
		<?php require_once('../template/menu-side.php'); ?>

		<div class="headbar">
			<?php require_once('../template/header.php'); ?>
			<form class="form" action="" method="POST" enctype="multipart/form-data">
				<div class="nav">TAMBAH DATA MATA PELAJARAN</div>
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
												<input type="text" name="nama_mapel">
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
				

	<script src="../../asset/js/main.js"></script>
	<script src="../../asset/js/validation_all.js" type="module"></script>
	<script type="text/javascript">
		var input = document.getElementsByTagName('input');
		for(i = 1; i < input.length;){
			input[i].setAttribute('autocomplete','off');
			i++;
		}
	</script>

</body>
</html>
