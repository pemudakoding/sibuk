
<?php 
	require_once "../core/init.php";
	require_once "../core/cek_login.php";


	
	// GET NIS FROM URL
	$nim   	  = mysqli_real_escape_string($koneksi,strip_tags($_GET['nim_guru']));
	$nama_url = mysqli_real_escape_string($koneksi,strip_tags($_GET['nama']));

		$query = detail_data_guru('nim',$nim);
		$data  = mysqli_fetch_assoc($query);


		//Ambil value var nama terus ganti - jadi spasi
		$parse = pars_name($nama_url,'nama_d_g','nama_b_g');
		
		
		// die($nama.'<br>'.$d_nama);
		//Jika data yang ditemukan tidak ada 
		//atau 
		//nama siswa tidak sama yang kayak di url maka redirect ke beranda
		if (mysqli_num_rows($query) < 1 || $parse) {

			header('location:'.$url.'/guru/');
			setFlashMessages("Data Guru Tidak ditemukan !!!","error",'true');
		}
		
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>SIBUK - DETAIL DATA GURU <?= strtoupper($data['nama_guru']) ?></title>
	<?php require_once('../template/css.php') ?>
	<script src='<?= "{$url}" ?>/asset/js/jquery-3.1.1.min.js'></script>
	<style type="text/css">
	</style>
</head>
<body>
	<div class="container">
		<?php require_once('../template/menu-side.php'); ?>

		<div class="headbar">
			<?php require_once('../template/header.php'); ?>
		
			<div class="nav">DETAIL DATA GURU <span> <?= strtoupper($data['nama_guru']) ?> </span></div>
				
			<div class="row">
				<div class="data box3 box-md-4 box-sm-12">
					<div class="detail-foto">
						<div class="gap">
							<?php 

								if ($data['foto_guru'] != '') {
									echo "<img src='$url/asset/img/foto_guru/compress/{$data['foto_guru']}'>";
								}else{
									echo "<img src='$url/asset/img/foto_siswa/default-avatar.png'>";
								}

							 ?>
						</div>
					</div>
					<div class="row">
						<div class="buttons-detail">
							<div class="gap">
								<a href='<?= $url."/guru/edit/".$data['nim']."/".$nama_url ?>' class="buttons buttons-e data ">UBAH DATA</a>
							</div>
						</div>
					</div>

				</div>

				<div class="data box9 box-md-8 box-sm-12">
					<div class="gap">
						<div class="detail-data">
							<div class="row">
								<div class="selector">
									<div class="data box12">
									<a href="#" id="bio_ayah" class="data box3 box-md-6 box-sm-12">BIODATA GURU</a>
									</div>
									<div class="row"></div>
								</div>
							
								<section id="ayah">
									<div class="row">
										<div class="data box6 box-md-12 box-sm-12">
											<div class="gap">			
												<h3>NIP: <span style="color: #37d760;"> <?= $data['nim'];?> </span></h3>
												<h3>MAPEL: <span style="color: #37d760;"> <?= $data['nama_mapel'];?> </span></h3>

												<?php if ($data['kelas'] != ''): ?>
													<h3>Wali: Kelas <span style="color: #37d760;"> <?= $data['kelas']." ".$data['nama_kelas'];?> </span></h3>
												<?php endif ?>

											</div>
										</div>
									</div>

									<hr class="d-line">

									<div class="row">
										<div class="data box4 box-md-12 box-sm-12">
											<div class="gap">
												<h4>Nama Depan</h4>
												<h3><?= $data['nama_d_g'] ?></h3>
											</div>
										</div>

										<div class="data box4 box-md-12 box-sm-12">
											<div class="gap">
												<h4>Nama Belakang</h4>
												<h3><?= $data['nama_b_g'] ?></h3>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="data box4 box-md-12 box-sm-12">
											<div class="gap">
												<h4>Username</h4>
												<h3><?= $data['username'] ?></h3>
											</div>
										</div>

										<div class="data box4 box-md-12 box-sm-12">
											<div class="gap">
												<h4>Akses Login</h4>
												<h3><?= $data['akses'] ?></h3>
											</div>
										</div>
									</div>

								</section>

							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

	<script src='<?= $url ?>/asset/js/main.js'></script>
	<script src='<?= $url ?>/asset/js/page-form.js'></script>
</body>
</html>
