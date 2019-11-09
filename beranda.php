<?php
	require_once "core/init.php";
	require_once "core/cek_login.php";
	//============================================================================
	//=========================DATA SEMUA SISWA===================================
	//============================================================================
	$siswa 	 	= data_siswa("aktif","");
	$j_siswa 	= mysqli_num_rows($siswa);

	//============================================================================
	//========================DATA BERDASARKAN KELAS==============================
	//============================================================================
	$kelas9 	= detail_data_siswa_aktif("kelas.kelas",9);
	$kelas8 	= detail_data_siswa_aktif("kelas.kelas",8);
	$kelas7 	= detail_data_siswa_aktif("kelas.kelas",7);

	//Ambil jumlah siswa Berdasarkan kelas
	$j_kelas9 	= 	mysqli_num_rows($kelas9);
	$j_kelas8 	= mysqli_num_rows($kelas8);
	$j_kelas7 	= mysqli_num_rows($kelas7);

	//============================================================================
	//=======================Data berdasarkan Jenis Kelamin=======================
	//============================================================================
	$s_islam 	= detail_data_siswa_aktif("siswa.agama",'islam');
	$s_kristen 	= detail_data_siswa_aktif("siswa.agama",'kristen');
	$s_hindu 	= detail_data_siswa_aktif("siswa.agama",'hindu');
	$s_budha 	= detail_data_siswa_aktif("siswa.agama",'budha');
	$s_konghucu	= detail_data_siswa_aktif("siswa.agama",'konghucu');
	//Ambil jumlah siswa berdasarkan Agama
	$a_islam 	= mysqli_num_rows($s_islam);
	$a_kristen 	= mysqli_num_rows($s_kristen);
	$a_hindu	= mysqli_num_rows($s_hindu);
	$a_budha 	= mysqli_num_rows($s_budha);
	$a_konghucu = mysqli_num_rows($s_konghucu);

	//============================================================================
	//=======================Data berdasarkan Agama ==============================
	//============================================================================
	$lakiLaki 	= detail_data_siswa_aktif("siswa.jenis_kelamin",'laki-laki');
	$perempuan 	= detail_data_siswa_aktif("siswa.jenis_kelamin",'perempuan');
	//Ambil jumlah siswa berdasarkan jenis kelamin
	$jk_l 		= mysqli_num_rows($lakiLaki);
	$jk_p 		= mysqli_num_rows($perempuan);


	//============================================================================
	//=======================Data berdasarkan KELAS ==============================
	//============================================================================
	$kelas7     = jml_siswa_kelas(7);
	$kelas77    = jml_siswa_kelas(7);

	$kelas8     = jml_siswa_kelas(8);
	$kelas88    = jml_siswa_kelas(8);


	$kelas9     = jml_siswa_kelas(9);
	$kelas99    = jml_siswa_kelas(9);

	//Ambil data user yang login
	$data       = mysqli_fetch_assoc(cek_user($_SESSION['username']));
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>SIBUK - BERANDA</title>
	<?php require_once('template/css.php'); ?>

	<script src="asset/js/jquery-3.1.1.min.js"></script>
	<script src="asset/js/chartjs.min.js"></script>
	<script src="asset/js/sweetalert.min.js"></script>

</head>
<body>
	<div class="container">
		<?php require_once('template/menu-side.php'); ?>

		<div class="headbar">
			<?php require_once('template/header.php'); ?>

			<div class="nav">Beranda</div>
			<div class="container-right">
				<div class="submain">

					<div class="row">
						<div class="data box4 box-md-6 box-mds-12">
							<div class="modal box-siswa">
								<div class="icon-user">
									<img src="asset/img/user.png" width="90px" style="padding: 10px">
								</div>
									<div class="message">

										<h2>Jumlah Siswa</h2>
										<h3><?= $j_siswa ?></h3>
									</div>
							</div>
						</div>

						<div class="data box8 box-md-6 box-mds-12">
							<div class="modal box-message">
								<div class="message">
									<h1>Selamat Datang <?= $data['nama_depan']." ".$data['nama_belakang'];?> !!!</h1>
									<h4>Anda sekarang masuk sebagai <span style="color: #222930;"><?= $data['level'];?></span>, </h4>
								</div>
							</div>

						</div>
					</div>
					<div class="row">

						<div class="data box4 box-lg-6 box-sm-12">
							<div class="main-chart chart1">
								<div class="title-chart">
									<p>Jumlah Siswa Berdasarkan Kelas</p>
								</div>
								<div class="body-chart">
									<canvas id="body-chart-kelas"></canvas>
								</div>
							</div>
						</div>

						<div class="data box4 box-lg-6 box-sm-12">
							<div class="main-chart chart2">
								<div class="title-chart">
									<p>Jumlah Siswa Berdasarkan Jenis Kelamin </p>
								</div>

								<div class="body-chart">
									<canvas id="body-chart-jk"></canvas>
								</div>
							</div>
						</div>

						<div class="data box4 box-lg-6 box-sm-12">
							<div class="main-chart chart3 ">
								<div class="title-chart">
									<p>Jumlah Siswa Berdasarkan agama</p>
								</div>
								<div class="body-chart">
									<canvas id="body-chart-agama" ></canvas>
								</div>
							</div>
						</div>

						<div class="data box4 box-lg-6 box-sm-12">
							<div class="main-chart chart3 ">
								<div class="title-chart">
									<p>Jumlah Siswa Berdasarkan Kelas 7</p>
								</div>
								<div class="body-chart">
									<canvas id="body-chart-kelas7"></canvas>
								</div>
							</div>
						</div>
						<div class="data box4 box-lg-6 box-sm-12">
							<div class="main-chart chart3 ">
								<div class="title-chart">
									<p>Jumlah Siswa Berdasarkan Kelas 8</p>
								</div>
								<div class="body-chart">
									<canvas id="body-chart-kelas8"></canvas>
								</div>
							</div>
						</div>

						<div class="data box4 box-lg-6 box-sm-12">
							<div class="main-chart chart3 ">
								<div class="title-chart">
									<p>Jumlah Siswa Berdasarkan Kelas 9</p>
								</div>
								<div class="body-chart">
									<canvas id="body-chart-kelas9"></canvas>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

		<script src="asset/js/main.js"></script>
		<script>
		<?php
			require_once 'asset/js/chart_siswa.js';
		?>
	</script>

	<?php
		echo showFlashMessages();
	?>


</body>
</html>
