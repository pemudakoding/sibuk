
<?php 
	require_once "../core/init.php";
	require_once "../core/cek_login.php";
	if (isset($_POST['submit'])) {

		$username  = mysqli_real_escape_string($koneksi,strip_tags($_POST['username']));
		$query_cek = cek_user($username);

		if (!mysqli_num_rows($query_cek) > 0) {

			

			$foto_user  = mysqli_real_escape_string($koneksi,strip_tags( $_FILES['foto_user']['name']));
			$foto_user  = uniqid().'_SIBUK_IMG_'.rand(0,9999).$foto_user;
			$foto_path	= $_FILES['foto_user']['tmp_name'];
	
			if ($_FILES['foto_user']['name'] != '') {
				$tambah 	= tambah_data_user($foto_user);
				if ($tambah) {
					move_uploaded_file($foto_path,'../asset/img/foto_user/'.$foto_user);
					header('location:'.$url.'/user/');
					setFlashMessages("Berhasil menambahkan User !!!","success");
				}else{
					header('location:'.$url.'/user/');
					setFlashMessages("Gagal menambahkan User !!!","error",'true');
				}
			}else{

				$tambah 	= tambah_data_user('');
				if ($tambah) {
					header('location:'.$url.'/user/');
					setFlashMessages("Berhasil menambahkan User !!!","success");
				}else{
					header('location:'.$url.'/user/');
					setFlashMessages("Gagal menambahkan User !!!","error",'true');
				}
			}

		}else{
			setFlashMessages("Username Telah Digunakan !!!","warning",'true');
		}
	}
	$getUserLevel = getUserLevel();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>SIBUK - TAMBAH DATA USER</title>
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
				<div class="nav">TAMBAH DATA USER</div>
				<div class="main">
					<div class="row">
						<div class="data box4 box-md-4 box-sm-12">
							<div class="gap">	
								<div class="selector">
									<a href="#" id="bio_siswa" class="box-sm-12">BIODATA USER</a>
									<button type="submit" name="submit" class="buttons buttons-submit" id="submit" > SUBMIT </button>
								</div>
							</div>
						</div>
						<div class="data box8 box-sm-12 box-md-8">
							<div class="gap">	
								<div class="bio">
									<section id="guru">
										<h2>BIODATA USER</h2>
										<p>Data harus benar agar tidak menjadi masalah di kemudian hari</p>
									
										<div class="row">
											<div class="data box6 box-sm-12">
												<h4>Nama Depan</h4>
												<input type="text" name="nama_d_u">
											</div>
											<div class="data box6 box-sm-12">
												<h4>Nama Belakang</h4>
												<input type="text" name="nama_b_u">
											</div>
										</div>
										<div class="row">
											<div class="data box8 box-mds-12">
													<h4>Username</h4>
													<p style="float: left; font-weight: bold"><span style="color: deeppink;">*</span> Username tidak boleh ada spasi</p>
													<input type="text" name="username">

													<h4>Password</h4>
													<input type="password" name="password">

													<h4>Level</h4>
													<select name="level">
														<option>Pilih Level</option>
														<?php while($data = mysqli_fetch_assoc($getUserLevel)):?>
															<?php if($data['level'] == 'guru'): continue; else:?>
																<option value="<?= $data['id_level'] ?>"><?= strtoupper($data['level']) ?></option>
															<?php endif; ?>
														<?php endwhile; ?>
													</select>

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
													<input type="file" name="foto_user" id="file" >
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
</body>
</html>