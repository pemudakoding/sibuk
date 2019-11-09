<?php 
	
	require_once "../core/init.php";

	
	// GET ID KELAS  FROM URL
	$id_kelas = (int)$_GET['id_kelas'];
	$nama_url = mysqli_real_escape_string($koneksi,$_GET['nama']);
	if ($id_kelas != 0) {
		$query  = detail_data_kelas($id_kelas);

		//Ambil value var nama terus ganti - jadi spasi
		$data  = mysqli_fetch_assoc($query);
		$parse = pars_name($nama_url,'kelas','nama_kelas');
		//Jika data yang ditemukan tidak ada 
		//atau 
		//nama siswa tidak sama yang kayak di url maka redirect ke beranda
		if (mysqli_num_rows($query) < 1 || $parse) {

			header('location:'.$url);
			setFlashMessages("Data Kelas Tidak ditemukan !!!","error",'true');
		}else{
			$split_kelas 	 = preg_split('/[(a-z)]+/', str_replace('-', '', $nama_url));
			$split_kelasName = preg_split('/[(0-9)]+/', str_replace('-', '', $nama_url));
			
			$j_lakiLaki  = mysqli_num_rows(detail_data_jk($id_kelas,'laki-laki'));
			$j_perempuan = mysqli_num_rows(detail_data_jk($id_kelas,'perempuan'));
			$total		 = mysqli_num_rows(detail_siswa_kelas($id_kelas));

			$islam 	  = mysqli_fetch_assoc(agamaSiswaKelas($id_kelas,'Islam'))['jumlah'];
			$kristen  = mysqli_fetch_assoc(agamaSiswaKelas($id_kelas,'Kristen'))['jumlah'];
			$hindu 	  = mysqli_fetch_assoc(agamaSiswaKelas($id_kelas,'Hindu'))['jumlah'];
			$budha 	  = mysqli_fetch_assoc(agamaSiswaKelas($id_kelas,'Budha'))['jumlah'];
			$konghucu = mysqli_fetch_assoc(agamaSiswaKelas($id_kelas,'Konghucu'))['jumlah'];
		}

		if(stristr($nama_url,'PSB')){
			$j_lakiLaki = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM siswa WHERE id_kelas = '$id_kelas' AND jenis_kelamin = 'Laki-Laki' AND kelurahan IN ('ujuna','Ujuna','talise','Talise','besusu barat','Besusu Barat','kampung baru','Kampung Baru','baru','Baru')"));
			$j_perempuan = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM siswa WHERE id_kelas = '$id_kelas' AND jenis_kelamin = 'Perempuan' AND kelurahan IN ('ujuna','Ujuna','talise','Talise','besusu barat','Besusu Barat','kampung baru','Kampung Baru','baru','Baru')"));
			$total = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM siswa WHERE id_kelas = '$id_kelas' AND kelurahan IN ('ujuna','Ujuna','talise','Talise','besusu barat','Besusu Barat','kampung baru','Kampung Baru','baru','Baru')"));

			$islam = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM siswa WHERE id_kelas = '$id_kelas' AND agama = 'Islam' AND kelurahan IN ('ujuna','Ujuna','talise','Talise','besusu barat','Besusu Barat','kampung baru','Kampung Baru','baru','Baru')"));
			$kristen = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM siswa WHERE id_kelas = '$id_kelas' AND agama = 'Kristen' AND kelurahan IN ('ujuna','Ujuna','talise','Talise','besusu barat','Besusu Barat','kampung baru','Kampung Baru','baru','Baru')"));
			$hindu = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM siswa WHERE id_kelas = '$id_kelas' AND agama = 'Hindu' AND kelurahan IN ('ujuna','Ujuna','talise','Talise','besusu barat','Besusu Barat','kampung baru','Kampung Baru','baru','Baru')"));
			$budha = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM siswa WHERE id_kelas = '$id_kelas' AND agama = 'Budha' AND kelurahan IN ('ujuna','Ujuna','talise','Talise','besusu barat','Besusu Barat','kampung baru','Kampung Baru','baru','Baru')"));
			$konghucu = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM siswa WHERE id_kelas = '$id_kelas' AND agama = 'Konghucu' AND kelurahan IN ('ujuna','Ujuna','talise','Talise','besusu barat','Besusu Barat','kampung baru','Kampung Baru','baru','Baru')"));
		}

		

	}else{
		header('location:'.$url);
		setFlashMessages("Data Kelas Tidak ditemukan !!!","error",'true');
	}
	

?>

<!DOCTYPE html>
<html>
<head>
	<title>SIBUK - KELAS <?=$data['kelas']." ".$data['nama_kelas']?></title>
	<?php require_once('../template/css.php') ?>
	<script src='<?= "{$url}" ?>/asset/js/jquery-3.1.1.min.js'></script>

</head>
<body>
	<div class="container">
		<?php require_once($root.'template/menu-side_skl.php'); ?>

		<div class="headbar">
			<?php require_once($root.'template/header.php'); ?>

			<div class="nav">DETAIL KELAS <span><?=$data['kelas']." ".$data['nama_kelas']?></span></div>
			<div class="container-right">
				<div class="submain">
					<div class="row">
						<div class="data box4 box-mds-12">
							<div class="modal box-siswa">
								<div class="icon-user">
									<img src="<?= $url ?>/asset/img/user.png" width="82px" style="padding: 10px">
								</div>
									<div class="message">

										<h2>Jumlah Siswa</h2>
										<h3><?= $total ?></h3>
									</div>
							</div>
						</div>

						<div class="data box4 box-mds-12">
							<div class="modal box-siswa box-man ">
								<div class="icon-user">
									<img src="<?= $url ?>/asset/img/man.png" width="60px" style="padding: 10px">
								</div>
									<div class="message">

										<h2>Jumlah Siswa <br> Laki Laki</h2>
										<h3><?= $j_lakiLaki ?></h3>
									</div>
							</div>
						</div>


						<div class="data box4 box-mds-12">
							<div class="modal box-siswa box-woman ">
								<div class="icon-user">
									<img src="<?= $url ?>/asset/img/girl.png" width="60px" style="padding: 10px">
								</div>
									<div class="message">

										<h2>Jumlah Siswa <br> Perempuan</h2>
										<h3><?= $j_perempuan ?></h3>
									</div>
							</div>
						</div>

						<div class="data box4 box-mds-12">
							<div class="modal box-siswa box-islamic ">
								<div class="icon-user">
									<img src="<?= $url ?>/asset/img/islam.png" width="60px" style="padding: 10px">
								</div>
									<div class="message">

										<h2>Jumlah Siswa <br> Beragama Islam</h2>
										<h3><?= $islam ?></h3>
									</div>
							</div>
						</div>
						<div class="data box4 box-mds-12">
							<div class="modal box-siswa box-kristen ">
								<div class="icon-user">
									<img src="<?= $url ?>/asset/img/cross.png" width="60px" style="padding: 10px">
								</div>
									<div class="message">

										<h2>Jumlah Siswa <br> Beragama Kristen</h2>
										<h3><?= $kristen ?></h3>
									</div>
							</div>
						</div>
						<div class="data box4 box-mds-12">
							<div class="modal box-siswa box-hindu ">
								<div class="icon-user">
									<img src="<?= $url ?>/asset/img/swastika.png" width="60px" style="padding: 10px">
								</div>
									<div class="message">

										<h2>Jumlah Siswa <br> Beragama Hindu</h2>
										<h3><?= $hindu ?></h3>
									</div>
							</div>
						</div>
						<div class="data box6 box-mds-12">
							<div class="modal box-siswa box-budha ">
								<div class="icon-user">
									<img src="<?= $url ?>/asset/img/dharma-wheel.png" width="60px" style="padding: 10px">
								</div>
									<div class="message">

										<h2>Jumlah Siswa <br> Beragama Budha</h2>
										<h3><?= $budha ?></h3>
									</div>
							</div>
						</div>

						<div class="data box6 box-mds-12">
							<div class="modal box-siswa box-konghucu ">
								<div class="icon-user">
									<img src="<?= $url ?>/asset/img/yin-yang.png" width="60px" style="padding: 10px">
								</div>
									<div class="message">

										<h2>Jumlah Siswa <br> Beragama Konghucu</h2>
										<h3><?= $konghucu ?></h3>
									</div>
							</div>
						</div>
					</div>
					
					

					<div class="row">


						<div class="data box6 box-mds-12">
							<div class="modal box-siswa box-8">
								<a href="<?= $url."/kelas/cetak/".$data['id_kelas']?>">
									<div class="icon-user">
										<img src="<?= $url ?>/asset/img/responsive.png" width="90px" style="padding: 10px">
									</div>
									<div class="message">
										<h2>Cetak Data Diri</h2>
									</div>
								</a>
							</div>
						</div>


						<div class="data box6 box-mds-12">
							<div class="modal box-siswa box-7">
								<a href="<?= $url."/daftar-kelas/absen/".$data['id_kelas']?>">
									<div class="icon-user">
										<img src="<?= $url ?>/asset/img/absensi.png" width="90px" style="padding: 10px">
									</div>
									<div class="message">
										<h2>Cetak Absensi</h2>
									</div>
								</a>
							</div>		
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

		<script src='<?= $url ?>/asset/js/main.js'></script>

</body>
</html>