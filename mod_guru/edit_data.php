
<?php 
	require_once "../core/init.php";
	require_once "../core/cek_login.php";


	$nim   	  = mysqli_real_escape_string($koneksi,strip_tags($_GET['nim_guru']));
	$nama_url = mysqli_real_escape_string($koneksi,strip_tags($_GET['nama']));

	if ($nim != 0) {
		$query = detail_data_guru('nim',$nim);
		$data  = mysqli_fetch_assoc($query);

		//Ambil value var nama terus ganti - jadi spasi
		$parse = pars_name($nama_url,'nama_d_g','nama_b_g');

		//Jika data yang ditemukan tidak ada 
		//atau 
		//nama GURU tidak sama yang kayak di url maka redirect ke beranda
		if (mysqli_num_rows($query) < 1 || $parse) {
	
			header('location: '.$url.'/guru/');
			setFlashMessages("Data Guru Tidak ditemukan !!!","error",'true');

		}else{

			if( isset($_POST['submit']) ){

				$foto_guru  = mysqli_real_escape_string($koneksi,strip_tags( $_FILES['foto_guru']['name']));
				$foto_path	= $_FILES['foto_guru']['tmp_name'];
				

				//jika foto guru telah dideklarasi maka masuk ke kondisi true
				///jika tidak akan masuk ke kondisi false
				if ($foto_guru != '') {


					@unlink('../asset/img/foto_guru/'.$data['foto_guru']);
					@unlink('../asset/img/foto_guru/compress/'.$data['foto_guru']);
					$foto_guru = rand(0,999).'_'.'SIBUK_IMG_'.rand(0,999).'_'.$foto_guru;
					
					//jika password tidak dideklarasi maka edit data guru tanpa mengedit password
					// jika dideklarasi masuk ke kondisi false
					if ($_POST['password'] == '') {
						$query = edit_data_guru($nim,$foto_guru);	
					}else{
						$query = edit_data_guru_w_pw($nim,$foto_guru);
					}

				}else{

					if ($_POST['password'] == '') {
						
						$query = edit_data_guru($nim,$data['foto_guru']);
					}else{
						$query = edit_data_guru_w_pw($nim,$data['foto_guru']);
					}
				}


				//Jika salah satu query diatas sukses maka bakal masuk
				// di kondisi ini
				if ($query) {
					compressImage($foto_path,'../asset/img/foto_guru/compress/'.$foto_guru);
					move_uploaded_file($foto_path,'../asset/img/foto_guru/'.$foto_guru);
					header('location: ../../');
					setFlashMessages("Berhasil Menyunting Data Guru !!!","success");
				}else{
					// header('location: ../../');
					// setFlashMessages("Gagal Menyunting Data Guru !!!","error",'true');
					echo mysqli_error($koneksi);
				}



			}
		}

	}else{
		
		header('location: '.$url.'/guru/');
		setFlashMessages("Data Guru Tidak ditemukan !!!","error",'true');
	}

	$mapel = data_mapel('');
	$mapel_guru = mapel_guru($nim)
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>SIBUK - UBAH DATA GURU <?= strtoupper($data['nama_guru']) ?></title>
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
				<div class="nav">UBAH DATA GURU <span><?= strtoupper($data['nama_guru']) ?></span></div>
				<div class="main">
					<div class="row">
						<div class="data box4 box-md-4 box-sm-12">
							<div class="gap">
								<div class="selector">
									<a href="#" id="bio_guru" class="box-sm-12">BIODATA GURU</a>
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
												<input type="text" name="nama_d_g" value="<?= $data['nama_d_g'] ?>">
											</div>
											<div class="data box6">
												<h4>Nama Belakang</h4>
												<input type="text" name="nama_b_g" value="<?= $data['nama_b_g'] ?>">
											</div>
										</div>
										<div class="row">
											<div class="data box8 box-mds-12">
												<h4>NIP</h4>
												<input type="text" name="nim_g" value="<?= $data['nim'] ?>">

												<h4>Mata Pelajaran</h4>
												<select name="mapel">
													<option>Pilih Mapel</option>

													<?php 
														if ($data['nama_mapel'] != '') {

															$data_m_guru = mysqli_fetch_assoc($mapel_guru);
															echo "<option value={$data_m_guru['id_mapel']} selected>
																	{$data_m_guru['nama_mapel']}
															      </option>";


															while($data_mapel = mysqli_fetch_assoc($mapel)){

																//JIKA ID MAPEL ADA YANG SAMA
																//MAKA LANJUTKAN DATA DARI PERULANGAN
																//Terus kembalikan boeelan nya menjadi false
																//jika dia false maka tampilkan data mapel

																if ($data_mapel['id_mapel'] == $data_m_guru['id_mapel']) {
																	continue;

																	return false;
																}else{
																	echo "<option value='{$data_mapel['id_mapel']}'>
																    		{$data_mapel['nama_mapel']}
																  	     </option>";
																}

															}
														}
													?>
												</select>
													<h4>Username</h4>
													<input type="text" name="username" value="<?= $data['username'] ?>">

													<?php if ($user['level'] == 'administrator'): ?>
														<h4>Password</h4>
														<input type="password" name="password">
													<?php endif ?>
													

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

														if ($data['foto_guru'] != '') {
															echo "<img src='$url/asset/img/foto_guru/compress/{$data['foto_guru']}' width='100%' height='250px'>";
														}else{
															echo "<img src='$url/asset/img/foto_guru/default-avatar.png' width='100%' height='250px'>";
														}
													 ?>
													
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