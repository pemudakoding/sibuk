
<?php 
	error_reporting(0);
	require_once "../core/init.php";
	require_once "../core/cek_login.php";

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
					$foto_user  = mysqli_real_escape_string($koneksi,strip_tags( $_FILES['foto_user']['name']));
					$foto_path  = $_FILES['foto_user']['tmp_name'];
					$foto_user  = uniqid().'_SIBUK_IMG_'.rand(0,9999).$foto_user;

					if ( $_FILES['foto_user']['name'] != '') {

						$edit_user = edit_data_user($data['id_user'],$foto_user);
						if ($edit_user) {
							@unlink('../asset/img/foto_user/'.$data['foto_user']);
							move_uploaded_file($foto_path,'../asset/img/foto_user/'.$foto_user);
							header('location:'.$url.'/user/');
							setFlashMessages("Data User Berhasil disunting !!!","success");
						}else{
							header('location:'.$url.'/user/');
							setFlashMessages("Data User Gagal disunting !!!","error",'true');
						}
						
					}else if($_FILES['foto_user']['name'] == ''){
						$edit_user = edit_data_user($data['id_user'],$data['foto_user']);

						if ($edit_user) {
							header('location:'.$url.'/user/');
							setFlashMessages("Data User Berhasil disunting !!!","success");
						}else{
							header('location:'.$url.'/user/');
							setFlashMessages("Data User Gagal disunting !!!","error",'true');
						}
					}

				}
			}


		}else{
			header('location:'.$url.'/user/');
			setFlashMessages("Data User Tidak ditemukan !!!","error",'true');
		}
		$getUserLevel = getUserLevel();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>SIBUK - UBAH DATA  USER <?= strtoupper($data['nama_depan']." ".$data['nama_belakang']) ?> </title>
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
				<div class="nav">UBAH DATA USER <span> <?= strtoupper($data['nama_depan']." ".$data['nama_belakang']) ?> </span></div>
				<div class="main">
					<div class="row">
						<div class="data box4 box-md-4 box-sm-12">
							<div class="gap">
								<div class="selector">
									<a href="#" id="bio_siswa" class="box-sm-12">DATA USER</a>
									<button type="submit" name="submit" class="buttons buttons-submit" id="submit" > SUBMIT </button>
								</div>
							</div>
						</div>
						<div class="data box8 box-md-8 box-sm-12">
							<div class="gap">	
								<div class="bio">
									<section id="guru">
										<h2>BIODATA USER</h2>
										<p>Data harus benar agar tidak menjadi masalah di kemudian hari</p>
									
										<div class="row">
											<div class="data box6 box-sm-12">
												<h4>Nama Depan</h4>
												<input type="text" name="nama_d_u" value="<?= $data['nama_depan'] ?>">
											</div>
											<div class="data box6 box-sm-12">
												<h4>Nama Belakang</h4>
												<input type="text" name="nama_b_u" value="<?= $data['nama_belakang'] ?>">
											</div>
										</div>
										<div class="row">
											<div class="data box8 box-mds-12">
													<h4>Username</h4>
													<p style="float: left; font-weight: bold"><span style="color: deeppink;">*</span> Username tidak boleh ada spasi</p>
													<input type="text" name="username" value="<?= $data['username'] ?>">

													<h4>Level</h4>
													<select name="level">
														<option>Pilih Level</option>
														<?php while($level = mysqli_fetch_assoc($getUserLevel)): ?>
															<?php if($level['level'] !== 'guru'): ?>
																<?php if($data['id_level'] == $level['id_level']): ?>
																	<option value="<?= $level['id_level'] ?>" selected><?= strtoupper($level['level']) ?></option>
																<?php else: ?>
																	<option value="<?= $level['id_level'] ?>"><?= strtoupper($level['level']) ?></option>
																<?php endif; ?>
															<?php endif; ?>
														<?php endwhile;?>
													</select>

													<h4 style="padding-bottom: 10px">Akses Login</h4>
													<?php 
														if ($data['akses'] == 'Y') {
															echo '<input type="radio" name="akses" value="Y" id="ya" checked> 
																	<label for="ya">Ya</label> 
																	<input type="radio" name="akses" value="N" id="tidak"> 
																	<label for="tidak">Tidak</label> <br>';
														}else{
															echo '<input type="radio" name="akses" value="Y" id="ya"> 
																	<label for="ya">Ya</label> 
																	<input type="radio" name="akses" value="N" id="tidak" checked> 
																	<label for="tidak">Tidak</label> <br>';
														}
														?>
											</div>

											<div class="data box4 box-mds-6 push-mds-3 box-sm-8 push-sm-2 foto">
												<div class="section-foto">
													<h4>Photo</h4>
													
													<div id="img_prev_def">
														<?php 
															if ($data['foto_user'] != '') {
																echo "<img src='$url/asset/img/foto_user/{$data['foto_user']}' width='100%' height='250px'>";
															}else{
																echo "<img src='$url/asset/img/foto_siswa/default-avatar.png' width='100%' height='250px'>";
															}
														?>
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
