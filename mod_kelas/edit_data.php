
<?php 
	require_once "../core/init.php";
	require_once "../core/cek_login.php";


	$id_kelas = (int)$_GET['id_kelas'];
	$nama     = mysqli_real_escape_string($koneksi,$_GET['nama']);

	if ($id_kelas != 0) {
		$query  = detail_data_kelas($id_kelas);
		$data  = mysqli_fetch_assoc($query);

		//Ambil value var nama terus ganti - jadi spasi
		$parse = pars_name($nama,'kelas','nama_kelas');

		//Jika data yang ditemukan tidak ada 
		//atau 
		//nama siswa tidak sama yang kayak di url maka redirect ke beranda
		if (mysqli_num_rows($query) < 1 || $parse) {

			header('location:'.$url.'/kelas/');
			setFlashMessages("Kelas Tidak Ditemukan !!!","warning",'true');
		}else{

			if( isset($_POST['submit']) ){

				$edit = edit_data_kelas($id_kelas);
				
				if ($edit) {
					
					if ($_POST['wali_kelas'] == $data['id_kelas']) {
						$hapus_wakel = hapus_wali_kelas1($data['id_kelas']);

						if ($hapus_wakel) {
							header('location: ../../');
							setFlashMessages("Berhasil Menyunting Kelas !!!","success");
						}
					}

					if ($_POST['wali_kelas'] != 'Pilih Wali Kelas' && $data['nama_guru'] != '') {
						$edit_wakel = edit_data_wakel($_POST['wali_kelas'],$data['id_kelas']);
						if ($edit_wakel) {
							header('location: ../../');
							setFlashMessages("Berhasil Menyunting Kelas !!!","success");
						}

					}else if($data['nama_guru'] == '' && $_POST['wali_kelas'] != 'Pilih Wali Kelas'){

						$edit_wakel = tambah_data_wakel_edit($_POST['wali_kelas'],$data['id_kelas']);

						if ($edit_wakel) {
							header('location: ../../');
							setFlashMessages("Berhasil Menyunting Kelas !!!","success");
							set_session('sukses',1);
						}
					}



					header('location: ../../');
					setFlashMessages("Berhasil Menyunting Kelas !!!","success");
				}else{
					header('location: ../../');
					setFlashMessages("Gagal Menyunting Kelas !!!","error",'true');
				}	
			}
		
		}

	}else{
		
		header('location: '.$url.'/kelas/');
		setFlashMessages("Kelas Tidak Ditemukan !!!","warning",'true');
	}

	$result = data_guru('');

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>SIBUK - UBAH DATA KELAS <?= strtoupper($data['kelas']." ".$data['nama_kelas']) ?></title>
	<?php require_once('../template/css.php'); ?>

	<script src='<?=$url?>/asset/js/jquery-3.1.1.min.js'></script>
	<script src='<?=$url?>/asset/js/sweetalert.min.js'></script>
</head>
<body>
	<div class="container">
		<?php require_once('../template/menu-side.php'); ?>

		<div class="headbar">
			<?php require_once('../template/header.php'); ?>
			<form class="form" action="" method="POST" enctype="multipart/form-data">
				<div class="nav">UBAH DATA KELAS <span><?= strtoupper($data['kelas']." ".$data['nama_kelas']) ?></span></div>
				<div class="main">
					<div class="row">
						<div class="data box4 box-md-4 box-sm-12">
							<div class="gap">
								<div class="selector">
									<a href="#" id="bio_guru" class="box-sm-12">BIODATA KELAS</a>
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
												<input type="text" name="nama_kelas" value="<?= $data['nama_kelas'] ?>">
											</div>
											<div class="data box6 box-mds-12">
												<h4>Tingkat Kelas</h4>
												<select name="kelas">
													<option>Pilih Tingkat Kelas</option>
													<?php
													 
													  for ($i=7; $i < 10 ; $i++) { 
													  	if($i == $data['kelas']){
													  		echo "<option value='$i' selected>$i</option>";
													  		continue;
													  	}else{
													  		echo "<option value='$i'>$i</option>";
													  	}
													  }
													?>
												</select>
											</div>
										</div>
										<div class="row">
											<div class="data box12">
												<h4>Wali Kelas <span style="color:dodgerblue">(Bisa tidak dipilih)</span></h4>
												<p style="text-align: left; padding: 5px 0px;"><span style="color: deeppink;">*</span> Jika Ada guru yang namanya sama dan berbeda kelas, <br>		kemungkinan besar guru itu,
												terdaftar di > 1 kelas !!!
												</p>
												<p style="text-align: left; padding: 5px 0px;"><span style="color: deeppink;">*</span> 
													Kamu bisa memilih guru yang sudah terdaftar jadi wali kelas sebelumnya !!!
												</p>
												<select name="wali_kelas" >
													<option>Pilih Wali Kelas</option>
													<?php 

														if ($data['id_guru'] != '') {
															$nama_guru = strtoupper($data['nama_guru']);
															echo "<option value='{$data['id_guru']}' selected> $nama_guru (Wali Kelas Sekarang)</option>";


														}
														

														while($guru = mysqli_fetch_assoc($result)){

															$nama_guru1 = strtoupper($guru['nama_guru']);

															if ($data['id_guru'] == $guru['id_guru']) {

																continue;

															}else{

																if ($guru['guru_in'] == '' ) {
																	echo "<option value='{$guru['id_guru']}'> $nama_guru1 </option>";

																}else{
																	if($guru['status_kelas'] == 'Aktif'){
																		echo "<option value='{$guru['id_guru']}'> $nama_guru1 (Sudah Jadi Wali Kelas {$guru['kelas']} {$guru['nama_kelas']}) </option>";
																	}else{
																		echo "<option value='{$guru['id_guru']}'> $nama_guru1</option>";
																	}													
																}
															}															
														}
														echo "<option value='{$data['id_kelas']}'>HAPUS WALI KELAS</option>";
													?>
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