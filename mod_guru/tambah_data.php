
<?php 
	require_once "../core/init.php";
	require_once "../core/cek_login.php";
	$mapel = data_mapel('');
	if (isset($_POST['submit'])) {
		$username     = mysqli_real_escape_string($koneksi,strip_tags($_POST['username']));
		$nim 		  = mysqli_real_escape_string($koneksi,strip_tags($_POST['nim_g']));
		$cek_username = cek_user($username);
		$cek_nim	  = cek_guru_nim($nim);

		if (!mysqli_num_rows($cek_username) > 0 && !mysqli_num_rows($cek_nim) > 0) {

			$foto_guru  = mysqli_real_escape_string($koneksi,strip_tags(date('isisisis_').$_FILES['foto_guru']['name']));
			$tambah 	= tambah_data_guru($foto_guru);
			$foto_path	= $_FILES['foto_guru']['tmp_name'];
			if ($tambah) {
				compressImage($foto_path,'../asset/img/foto_guru/compress/'.$foto_guru);
				move_uploaded_file($foto_path,$direktori);
				header('location: ../');
				setFlashMessages("Berhasil Menambahkan Guru !!!","success");
			}else{
				header('location: ../');
				setFlashMessages("Gagal Menambahkan Guru !!!","error",'true');
				header('location: ../');
			}

		}else{
			if(mysqli_num_rows($cek_username) > 0 && mysqli_num_rows($cek_nim) > 0){
				set_session('cek_unim',1);
			}else if (mysqli_num_rows($cek_username) > 0) {
				set_session('cek_user',1);
			}else if(mysqli_num_rows($cek_nim) > 0){
				set_session('cek_nim',1);
			}
		}

	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>SIBUK - TAMBAH DATA GURU</title>
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
				<div class="nav">TAMBAH DATA GURU</div>
				<div class="main">
					<div class="row">
						<div class="data box4 box-md-4 box-sm-12">
							<div class="gap">	
								<div class="selector">
									<a href="#" id="bio_siswa" class="box-sm-12">BIODATA GURU</a>
									<button type="submit" name="submit" class="buttons buttons-submit" id="submit" > SUBMIT </button>
								</div>
							</div>
						</div>

						<div class="data box8 box-sm-12 box-md-8">
							<div class="gap">
								<div class="bio">	
									<section id="guru">
										<h2>BIODATA GURU</h2>
										<p>Data harus benar agar tidak menjadi masalah di kemudian hari</p>
									
										<div class="row">
											<div class="data box6">
												<h4>Nama Depan</h4>
												<input type="text" name="nama_d_g">
											</div>
											<div class="data box6">
												<h4>Nama Belakang</h4>
												<input type="text" name="nama_b_g">
											</div>
										</div>
										<div class="row">
											<div class="data box8 box-mds-12">
												<h4>NIP</h4>
												<input type="text" name="nim_g">

												<h4>Mata Pelajaran</h4>
												<select name="mapel">
													<option>Pilih Mapel</option>
													<?php while($data = mysqli_fetch_assoc($mapel)): ?>
														<option value="<?= $data['id_mapel'];?>"><?= $data['nama_mapel'];?></option>
													<?php endwhile;?>
												</select>
													<h4>Username</h4>
													<input type="text" name="username">

													<h4>Password</h4>
													<input type="password" name="password">

													<h4 style="padding-bottom: 10px">Akses Login</h4>
													<input type="radio" name="akses" value="Y" id="ya"> <label for="ya">Ya</label> 
													<input type="radio" name="akses" value="N" id="tidak"> <label for="tidak">Tidak</label> <br>

											</div>

											<div class="data box4 box-mds-6 push-mds-3 box-sm-8 push-sm-2 foto">
												<div class="section-foto">
													<h4>Photo</h4>
													
													<div id="img_prev_def">
														<img src="../../asset/img/foto_siswa/default-avatar.png" width="100%" height="250px">
													</div>
													<div id="preview_img">
														
													</div>
													<input type="file" name="foto_guru" id="file" >
												</div>
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

	<?php 


		alert_sapnu_guru_1();
		alert_nim_guru();
	 ?>

</body>
</html>