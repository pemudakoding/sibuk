
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

		
		//Ambil value var nama terus ganti - jadi spasi
		$parse = pars_name($nama_url,'username','');

		//Jika data yang ditemukan tidak ada 
		//atau 
		//nama siswa tidak sama yang kayak di url maka redirect ke beranda
		if (mysqli_num_rows($query) < 1 || $parse) {

			header('location:'.$url.'/user/');
			setFlashMessages("Data User Tidak ditemukan !!!","error",'true');
		}


	}else{
		header('location:'.$url.'/user/');
		setFlashMessages("Data User Tidak ditemukan !!!","error",'true');
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>SIBUK - DETAIL DATA USER <?= strtoupper($data['nama_depan']." ".$data['nama_belakang']) ?> </title>
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
	
		<div class="nav">DETAIL DATA USER <span> <?= strtoupper($data['nama_depan']." ".$data['nama_belakang']) ?> </span></div>
			
		<div class="row">
			<div class="data box3 box-md-4 box-sm-12">
				<div class="detail-foto">
					<div class="gap">	
						<?php 

							if ($data['foto_user'] != '') {
								echo "<img src='$url/asset/img/foto_user/{$data['foto_user']}'>";
							}else{
								echo "<img src='$url/asset/img/foto_siswa/default-avatar.png'>";
							}

						 ?>
					</div>
				</div>


				<div class="row">
					<div class="buttons-detail">
						<div class="gap">
							<a href='<?= $url."/user/edit/".$data['id_user']."/".$nama_url ?>' class="buttons buttons-e data ">UBAH DATA</a>
						</div>
					</div>
				</div>

				<div class="buttons-detail">
					<div class="gap">
						<a href='<?= $url."/user/edit/password/".$data['id_user']."/".$nama_url ?>' class="buttons buttons-submit data ">UBAH PASSWORD</a>
					</div>
				</div>



			</div>

			<div class="data box9 box-md-8 box-sm-12">
				<div class="gap">
					<div class="detail-data">
						<div class="row">
							<div class="selector">
								<div class="data box12">
								<a href="#" id="bio_wali" class="data box3 box-md-6 box-sm-12">BIODATA USER</a>
								</div>
								<div class="row"></div>
							</div>
							
							<section id="wali">
								<div class="row">
									<div class="data box3 box-md-12 box-sm-12">
										<div class="gap">			
											<h4>Nama Depan:	</h4>
											<h3><?= $data['nama_depan']?></h3>
										</div>
									</div>

									<div class="data box3 box-md-12 box-sm-12">
										<div class="gap">			
											<h4>Nama Belakang:	</h4>
											<h3><?= $data['nama_belakang']?></h3>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="data box3 box-md-12 box-sm-12">
										<div class="gap">			
											<h4>Username:	</h4>
											<h3><?= $data['username']?></h3>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="data box3 box-md-12 box-sm-12">
										<div class="gap">			
											<h4>Level:	</h4>
											<h3><?= $data['level']?></h3>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="data box3 box-md-12 box-sm-12">
										<div class="gap">			
											<h4>Akses Login:	</h4>
											<h3><?= $data['akses']?></h3>
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


	<script src='<?= $url ?>/asset/js/main.js'></script>
	<script src='<?= $url ?>/asset/js/page-form.js'></script>

</body>
</html>
