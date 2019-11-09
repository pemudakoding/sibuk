<?php 
	require_once "../core/init.php";
	require_once "../core/cek_login.php";
	
	$status_siswa;
	if(isset($_GET['status']))
	{
		$status_siswa = mysqli_real_escape_string($koneksi,strip_tags($_GET['status']));
	}

	if(!isset($_GET['status']))
	{
		$page_data  = pagination_siswa($page,'aktif');
		$page_number= pagination_number_siswa($page,'aktif');
		$hal		= !isset($_GET['hal']) ? header('location:'.$url.'/siswa/1') : false;
		check_page();
	}else if($_GET['status'] == 'pindah')
	{		
		$page_data  = pagination_siswa($page,$status_siswa);
		$page_number= pagination_number_siswa($page,$status_siswa);
		$hal		= !isset($_GET['hal']) ? header('location:'.$url.'/siswa/pindah/1') : false;
		check_page();
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>SIBUK - DATA SISWA</title>
	<?php require_once('../template/css.php') ?>

	<script src="<?= $url ?>/asset/js/jquery-3.1.1.min.js"></script>
	<script src="<?= $url ?>/asset/js/sweetalert.min.js"></script>
</head>
<body>
	<div class="container">
		<?php require_once('../template/menu-side.php'); ?>

		<div class="headbar">
			<?php require_once('../template/header.php'); ?>

			<div class="nav">LIHAT DATA SISWA</span></div>
			<div class="section-search">
				<div class="pencarian">Pencarian</div>
			<div class="search">
					<input type="text" name="search" placeholder="Nama/NIS/Kelas" class="input" id="search" autocomplete="off">
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
							$nama = parse_name_url('nama_depan','nama_belakang');
						?>
						<div class="data box4 box-md-6 box-sm-12">
							<div class="wrap_hasil">
								<a href='<?= $url."/siswa/hapus/".mysqli_real_escape_string($koneksi,strip_tags($data['nis']));?>' class="button-close butt-del" id='delete'>X
									<a href="<?= $url."/siswa/detail/".mysqli_real_escape_string($koneksi,strip_tags($data['nis']))."/".rtrim($nama,'-')?>">
										<div class="data-siswa">
											<?php 

												if ($data['foto_siswa'] != '') {
													echo "<img src='$url/asset/img/foto_siswa/compress/{$data['foto_siswa']}' class='img_profil'>";
												}else{
													echo "<img src='$url/asset/img/foto_siswa/default-avatar.png' class='img_profil'>";
												}

											?>
											<div class="data-detail-siswa">	
												<h4><?= $data['nama_depan']." ".$data['nama_belakang'];?></h4>
												<p><?= "NIS:"." ".$data['nis']; ?></p>
												<p class="kls">Kelas: 
													<?php 
														if ($data['kelas'] == '') {
															echo "<span style='color:deeppink'> Tidak Ada Kelas </span>";
														}else{
															echo $data['kelas']." ".$data['nama_kelas'];
														}

													?>
												</p>
												<?php if($data['status_pendidikan'] == 'Pindah'): ?>
													<p>Pindah kesekolah: <br><span style='color:dodgerblue;'><?= $data['nama_sekolah'] ?></span></p>
												<?php endif; ?>
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

	<script src="<?= $url ?>/asset/js/main.js"></script>
	<?php 

	
		if (isset($_GET['status'])) {
			switch ($_GET['status']) {
				case 'pindah':

					echo "<script type='text/javascript'>get_ajax('../../mod_siswa/get_data/data_siswa.php?status={$_GET['status']}&q=');</script>\n";
					break;
				
				default:
					# code...
					break;
			}
		}else{
			echo '	<script type="text/javascript">get_ajax("../mod_siswa/get_data/data_siswa.php?q=");</script>';
		}

	//JIKA CETAK SESSION ADA REDIR ke halaman cetak
	if (isset($_SESSION['cetak_tambah'])) {
		echo "<script> window.open('$url/cetak/pindah/','_blank'); </script>";
	}

	if(isset($_SESSION['psb'])){
		echo "<script> window.open('$url/mod_cetak/cetak_psb.php','_blank'); </script>";
	}

	// FUNCTION ALERT
	if(isset($_GET['hal'])){
		echo showFlashMessages();
	}
	?>
</body>
</html>