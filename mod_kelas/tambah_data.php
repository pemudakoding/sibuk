
<?php
	require_once "../core/init.php";
	require_once "../core/cek_login.php";
	$query  = mysqli_query($koneksi,"SELECT max(kelas.id_kelas) AS 'id' FROM kelas");
	$result = mysqli_fetch_assoc($query);
	if (isset($_POST['submit'])) {
		$tambah = tambah_data_kelas();

		if ($tambah) {
			if($_POST['wali_kelas'] != "Pilih Wali Kelas"){
				tambah_data_wakel();
		 	}
			header('location: ../');
			setFlashMessages("Berhasil Menambahkan Kelas !!!","success");
		}else{
			header('location: ../');
			setFlashMessages("Gagal Menambahkan Kelas !!!","error",'true');
		}
	}
	$result = guru_no_kelas();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>SIBUK - TAMBAH DATA KELAS</title>
	<?php require_once('../template/css.php'); ?>

	<script src="../../asset/js/jquery-3.1.1.min.js"></script>
	<script src="../../asset/js/sweetalert.min.js"></script>
</head>
<body>
	<div class="container">
		<?php require_once('../template/menu-side.php'); ?>

		<div class="headbar">
			<?php require_once('../template/header.php'); ?>
			<form class="form" action="" method="POST" enctype="multipart/form-data">
				<div class="nav">TAMBAH DATA KELAS</div>
				<div class="main">
					<div class="row">
						<div class="data box4 box-md-4 box-sm-12">
							<div class="gap">
								<div class="selector">
									<a href="#" id="bio_siswa" class="box-sm-12">DATA KELAS</a>
									<button type="submit" name="submit" class="buttons buttons-submit" id="submit" > SUBMIT </button>
								</div>
							</div>
						</div>

						<div class="data box8 box-sm-12 box-md-8">
							<div class="gap">
								<div class="bio">
									<section id="kelas">
										<h2>DATA KELAS</h2>
										<p>Data harus benar agar tidak menjadi masalah di kemudian hari</p>
										<div class="row">
											<div class="data box6 box-mds-12">
												<h4>Nama Kelas</h4>
												<input type="text" name="nama_kelas">
											</div>
											<div class="data box6 box-mds-12">
												<h4>Tingkat Kelas</h4>
												<select name="kelas">
													<option>Pilih Tingkat Kelas</option>
													<?php for($i=7; $i < 10; $i++):?>
														<option value="<?= $i?>">Kelas <?= $i; ?></option>
													 <?php endfor?>
												</select>
											</div>
										</div>
										<div class="row">
											<div class="data box12">
												<h4>Wali Kelas <span style="color:dodgerblue">(Bisa tidak dipilih)</span></h4>
												<p style="text-align: left; padding: 5px 0px;"><span style="color: deeppink;">*</span> Nama guru yang muncul di daftar list, adalah guru yang tidak terdaftar
												   jadi wali kelas
												</p>
												<select name="wali_kelas" >
													<option>Pilih Wali Kelas</option>
													<?php while($data = mysqli_fetch_assoc($result)): ?>
														<option value="<?= $data['id_guru'];?>"><?= strtoupper($data['nama_guru']);?></option>
													<?php endwhile;?>
												</select>
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
