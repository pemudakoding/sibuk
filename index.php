<?php 
	
	require_once "core/init.php";
	//============================================================================
	//=========================DATA SEKOLAH	======================================
	//============================================================================
	$sekolah = mysqli_fetch_assoc(data_sekolah());
	//============================================================================
	//=========================DATA SEMUA SISWA===================================
	//============================================================================
	$siswa 	 	= data_siswa("aktif","");
	$j_siswa 	= mysqli_num_rows($siswa);

	//============================================================================
	//=========================DATA JK SISWA===================================
	//============================================================================
	
	$laki_laki = mysqli_num_rows(detail_data_siswa_aktif("siswa.jenis_kelamin",'laki-laki'));
	$perempuan = mysqli_num_rows(detail_data_siswa_aktif("siswa.jenis_kelamin",'perempuan'));

	//============================================================================
	//=========================DATA KELAS SISWA===================================
	//============================================================================

	$j_kelas9 	= mysqli_num_rows(detail_data_siswa_aktif("kelas.kelas",9));
	$laki9		= mysqli_num_rows(detail_kelas_jk('9','Laki-Laki'));
	$wanita9	= mysqli_num_rows(detail_kelas_jk('9','Perempuan'));
	$islam9		= mysqli_num_rows(detail_kelas_agama('9','Islam'));
	$kristen9	= mysqli_num_rows(detail_kelas_agama('9','Kristen'));
	$hindu9		= mysqli_num_rows(detail_kelas_agama('9','Hindu'));
	$budha9		= mysqli_num_rows(detail_kelas_agama('9','Budha'));
	$konghucu9	= mysqli_num_rows(detail_kelas_agama('9','Konghucu'));

	$j_kelas8 	= mysqli_num_rows(detail_data_siswa_aktif("kelas.kelas",8));
	$laki8		= mysqli_num_rows(detail_kelas_jk('8','Laki-Laki'));
	$wanita8	= mysqli_num_rows(detail_kelas_jk('8','Perempuan'));
	$islam8		= mysqli_num_rows(detail_kelas_agama('8','Islam'));
	$kristen8	= mysqli_num_rows(detail_kelas_agama('8','Kristen'));
	$hindu8		= mysqli_num_rows(detail_kelas_agama('8','Hindu'));
	$budha8		= mysqli_num_rows(detail_kelas_agama('8','Budha'));
	$konghucu8	= mysqli_num_rows(detail_kelas_agama('8','Konghucu'));

	$j_kelas7 	= mysqli_num_rows(detail_data_siswa_aktif("kelas.kelas",7));
	$laki7		= mysqli_num_rows(detail_kelas_jk('7','Laki-Laki'));
	$wanita7	= mysqli_num_rows(detail_kelas_jk('7','Perempuan'));
	$islam7		= mysqli_num_rows(detail_kelas_agama('7','Islam'));
	$kristen7	= mysqli_num_rows(detail_kelas_agama('7','Kristen'));
	$hindu7		= mysqli_num_rows(detail_kelas_agama('7','Hindu'));
	$budha7		= mysqli_num_rows(detail_kelas_agama('7','Budha'));
	$konghucu7	= mysqli_num_rows(detail_kelas_agama('7','Konghucu'));

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>SIBUK - SISTEM KELAS</title>
	<?php require_once('template/css.php'); ?>

	<script src="asset/js/jquery-3.1.1.min.js"></script>
	<script src="asset/js/sweetalert.min.js"></script>

</head>
<body>
	<div class="container">
		<?php require_once('template/menu-side_skl.php'); ?>

		<div class="headbar">
			<?php require_once('template/header.php'); ?>

			<div class="nav">Beranda SIKEL</div>
			<div class="container-right">
				<div class="submain">
					<!-- SEKOLAH SECTION -->
					<div class="row">
						<div class="data box4 box-md-4 box-mds-5 box-smm-12">
							<div class="modal box-sekolah">
								<div class="title">
									Kepala Sekolah
								</div>
								<div class="data-box">
									<div class="row">
										<div class="data box12 wrap-kepsek">
											<img src="asset/img/foto_kepsek/<?= $sekolah['foto_kepsek'] ?>" style="object-fit: contain;">
											<div class="data-kepsek">
												<p><?= $sekolah['nama_kepsek'] ?></p>
												<p><?= $sekolah['jabatan_kepsek'] ?></p>
												<p>NIP <?= $sekolah['nip_kepsek'] ?></p>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="modal box-sekolah">
								<div class="title">
									SEKOLAH
								</div>
								<div class="data-box">
								

									<table>
									<tr><td>Nama</td><td><?= $sekolah['nama_sekolah'] ?></td></tr>
									<tr><td>Nomor Statistik Sekolah</td><td><?= $sekolah['no_stats_sekolah'] ?></td></tr>
									<tr><td>NPSN</td><td><?= $sekolah['npsn'] ?></td></tr>
									<tr><td>Alamat</td><td><?= $sekolah['alamat_sekolah'] ?></td></tr>
									<tr><td>Kota</td><td><?= $sekolah['kota_sekolah'] ?></td></tr>
									<tr><td>Kecamatan</td><td><?= $sekolah['kecamatan'] ?></td></tr>
									<tr><td>Provinsi</td><td><?= $sekolah['provinsi'] ?></td></tr>
									<tr><td>Nomor Telepon</td><td><?= $sekolah['no_telp_sekolah'] ?></td></tr>
									<tr><td>E-mail</td><td><?= $sekolah['email_sekolah'] ?></td></tr>
									<tr><td>Web</td><td><?= $sekolah['web_sekolah'] ?></td></tr>
									</table>
								</div>
							</div>
						</div>
						<!-- END SEKOLAH SECTION -->

						<!-- SISWA SECTION -->
						<div class="data box8 box-md-8 box-mds-7  box-smm-12">
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

						<div class="data box4 box-md-8 box-mds-7  box-smm-12">
							<div class="modal box-siswa box-man ">
								<div class="icon-user">
									<img src="asset/img/man.png" width="90px" style="padding: 10px">
								</div>
								<div class="message">

									<h2>Jumlah Siswa <br> Laki Laki</h2>
									<h3><?= $laki_laki ?></h3>
								</div>
							</div>
						</div>
						<div class="data box4 box-md-8 box-mds-7  box-smm-12">
							<div class="modal box-siswa box-woman">
								<div class="icon-user">
									<img src="asset/img/girl.png" width="90px" style="padding: 10px">
								</div>
								<div class="message">

									<h2>Jumlah Siswa <br> Perempuan</h2>
									<h3><?= $perempuan ?></h3>
								</div>
							</div>
						</div>

						<div class="data box8 box-md-8 box-mds-7  box-smm-12">
							<div class="modal box-siswa box-9">
								
								<div class="message">
									<h2 class="heading-inform-class"> Informasi Kelas 9</h2>
									<table>
										<tr>
											<th>Total</th><th>:</th><th><?= $j_kelas9 ?> Siswa</th>
										</tr>
									</table>
									<div class="sub-header-inform">
										JENIS KELAMIN
									</div>
									<table>
										<tr>
											<th>Laki-Laki</th><th>:</th><th><?= $laki9 ?> Siswa</th>
										</tr>
										<tr>
											<th>Perempuan</th><th>:</th><th><?= $wanita9 ?> Siswa</th>
										</tr>
									</table>
									<div class="sub-header-inform">
										AGAMA
									</div>
									<table>
										<tr>
											<th>Islam</th><th>:</th><th><?= $islam9 ?> Siswa</th>
										</tr>
										<tr>
											<th>Kristen</th><th>:</th><th><?= $kristen9 ?> Siswa</th>
										</tr>
										<tr>
											<th>Hindu</th><th>:</th><th><?= $hindu9 ?> Siswa</th>
										</tr>
										<tr>
											<th>Budha</th><th>:</th><th><?= $budha9 ?> Siswa</th>
										</tr>
										<tr>
											<th>Konghucu</th><th>:</th><th><?= $konghucu9 ?> Siswa</th>
										</tr>
									</table>
								</div>
							</div>
						</div>

						<div class="data box4 box-md-8 box-mds-7  box-smm-12 push-md-4 push-mds-5 push-sm-reset">
							<div class="modal box-siswa box-8">
								
								<div class="message">
									<h2 class="heading-inform-class"> Informasi Kelas 8</h2>
									<table>
										<tr>
											<th>Total</th><th>:</th><th><?= $j_kelas8 ?> Siswa</th>
										</tr>
									</table>
									<div class="sub-header-inform">
										JENIS KELAMIN
									</div>
									<table>
										<tr>
											<th>Laki-Laki</th><th>:</th><th><?= $laki8 ?> Siswa</th>
										</tr>
										<tr>
											<th>Perempuan</th><th>:</th><th><?= $wanita8 ?> Siswa</th>
										</tr>
									</table>
									<div class="sub-header-inform">
										AGAMA
									</div>
									<table>
										<tr>
											<th>Islam</th><th>:</th><th><?= $islam8 ?> Siswa</th>
										</tr>
										<tr>
											<th>Kristen</th><th>:</th><th><?= $kristen8 ?> Siswa</th>
										</tr>
										<tr>
											<th>Hindu</th><th>:</th><th><?= $hindu8 ?> Siswa</th>
										</tr>
										<tr>
											<th>Budha</th><th>:</th><th><?= $budha8 ?> Siswa</th>
										</tr>
										<tr>
											<th>Konghucu</th><th>:</th><th><?= $konghucu8 ?> Siswa</th>
										</tr>
									</table>
								</div>
							</div>
						</div>

						<div class="data box4 box-md-8 box-mds-7  box-smm-12 push-md-4 push-mds-5 push-sm-reset">
							<div class="modal box-siswa box-7">
								
								<div class="message">
									<h2 class="heading-inform-class"> Informasi Kelas 7</h2>
									<table>
										<tr>
											<th>Total</th><th>:</th><th><?= $j_kelas7 ?> Siswa</th>
										</tr>
									</table>
									<div class="sub-header-inform">
										JENIS KELAMIN
									</div>
									<table>
										<tr>
											<th>Laki-Laki</th><th>:</th><th><?= $laki7 ?> Siswa</th>
										</tr>
										<tr>
											<th>Perempuan</th><th>:</th><th><?= $wanita7 ?> Siswa</th>
										</tr>
									</table>
									<div class="sub-header-inform">
										AGAMA
									</div>
									<table>
										<tr>
											<th>Islam</th><th>:</th><th><?= $islam7 ?> Siswa</th>
										</tr>
										<tr>
											<th>Kristen</th><th>:</th><th><?= $kristen7 ?> Siswa</th>
										</tr>
										<tr>
											<th>Hindu</th><th>:</th><th><?= $hindu7 ?> Siswa</th>
										</tr>
										<tr>
											<th>Budha</th><th>:</th><th><?= $budha7 ?> Siswa</th>
										</tr>
										<tr>
											<th>Konghucu</th><th>:</th><th><?= $konghucu7 ?> Siswa</th>
										</tr>
									</table>
								</div>
							</div>
						</div>
					</div>
					

					<!-- END SISWA SECTION -->
				</div>
			</div>
		</div>
	</div>
	<script src="asset/js/main.js"></script>
	<?php 
		echo showFlashMessages();	
	?>
</body>
</html>