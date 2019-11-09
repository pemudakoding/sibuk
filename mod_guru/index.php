<?php

	require_once "../core/init.php";
	require_once "../core/cek_login.php";
	echo mysqli_error($koneksi);
	// //PAGINATION CODE
	$page_data  = pagination_data($page,'data_guru');
	$page_number= pagination_number($page,'data_guru');
	$hal		= !isset($_GET['hal']) ? header('location:'.$url.'/guru/1') : false;
	check_page();

?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SIBUK - DATA GURU</title>
	<?php require_once('../template/css.php') ?>

	<script src="../asset/js/jquery-3.1.1.min.js"></script>
	<script src="../asset/js/sweetalert.min.js"></script>
</head>
<body>
	<div class="container">
		<?php require_once('../template/menu-side.php'); ?>

		<div class="headbar">
			<?php require_once('../template/header.php'); ?>

			<div class="nav">LIHAT DATA GURU</div>
			<div class="section-search">
				<div class="pencarian">Pencarian</div>
			<div class="search">
					<input type="text" name="search" placeholder="Cari" class="input" id="search" autocomplete="off">
			</div>
			</div>
			<div class="section-button section-top">
				<a href="tambah/" class="button-suc button-i">Tambah Data</a>
			</div>
			<div class="section-hasil">
				<div class="hasil-pencarian" id="default">
					<div class="row">
					<?php while($data = mysqli_fetch_assoc($page_data) ): ?>

						<?php
							$nama = parse_name_url('nama_d_g','nama_b_g');
						 ?>
						<div class="data box4 box-md-6 box-sm-12">
								<div class="wrap_hasil">
									<a href="hapus/<?= mysqli_real_escape_string($koneksi,strip_tags($data['nim']));?>" class="button-close butt-del" id='delete'>X
										<a href="<?= $url."/guru/detail/".mysqli_real_escape_string($koneksi,strip_tags($data['nim']))."/".$nama?>">
											<div class="data-siswa data-oth">
											<?php

												if ($data['foto_guru'] != '') {
													echo "<img src='../asset/img/foto_guru/compress/{$data['foto_guru']}' class='img_profil'>";
												}else{
													echo "<img src='../asset/img/foto_siswa/default-avatar.png' class='img_profil'>";
												}

											?>
												<div class="data-detail-siswa"  style="padding: 25px 0px;">
													<h4><?= $data['nama_guru'];?></h4>
													<p>NIP: <?= $data['nim'];?></p>
													<p><?= "Mapel:"." ".$data['nama_mapel']; ?></p>
													<p class="kls">Wali Kelas:
													<?php if($data['nama_kelas']  == ''){
														echo "<span style='color:deeppink'> Guru biasa </span>";
													}else{														
														echo $data['kelas']." ".$data['nama_kelas'];														
													}
													?>
													</p>
												</div>
											</div>
										</a>
									</a>
								</div>
						</div>
					<?php endwhile;?>
					</div>
				</div>
				<div class='hasil-pencarian' id="load-data"></div>
				<div class="wrap-bottom">
					<div class="row">
						<div class="data box6 box-sm-12">
							<div class="paging paging_buts" id="page">
								<div class="wrapper-paging">
								<?php
									echo  pagination_numb_show();
								?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>

	<script src="../asset/js/main.js"></script>
	<script type="text/javascript">
		get_ajax("../mod_guru/data_guru.php?q=");
	</script>
	<?php

	if(isset($_GET['hal'])){
		echo showFlashMessages();
	}
	?>
</body>
</html>
