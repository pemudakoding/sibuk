<?php 
	require_once "../core/init.php";
	require_once "../core/cek_login.php";
	// //PAGINATION CODE
	$page_data  = pagination_data($page,'data_kelas');
	$page_number= pagination_number($page,'data_kelas');
	$hal		= !isset($_GET['hal']) ? header('location:'.$url.'/kelas/1') : false;
	check_page();
?>
	

<!DOCTYPE html>
<html>
<head>
	<title>SIBUK - DATA KELAS</title>
	<?php require_once('../template/css.php') ?>

	<script src="../asset/js/jquery-3.1.1.min.js"></script>
	<script src="../asset/js/sweetalert.min.js"></script>
</head>
<body>
	<div class="container">
		<?php require_once('../template/menu-side.php'); ?>

		<div class="headbar">
			<?php require_once('../template/header.php'); ?>
			<div class="nav">LIHAT DATA KELAS</div>
			<div class="section-search">
				<div class="pencarian">Pencarian</div>
			<div class="search">
					<input type="text" name="search" placeholder="Nama Kelas/Kelas/Wali Kelas" class="input" id="search" autocomplete="off">
			</div>
			</div>
			<div class="section-button section-top">
				<a href="javascript:void(0)" class='butt-penaikan button-i'>Penaikan Kelas</a>
				<a href="tambah/" class="button-suc button-i">Tambah Data</a>
			</div>
			<div class="section-hasil">
				<div class="hasil-pencarian" id="default" style="padding:0;">
					<div class="row">
					<?php while($data = mysqli_fetch_assoc($page_data) ): ?>
						<?php 
							$nama = parse_name_url('kelas','nama_kelas');
						?>
						<div class="data box4 box-md-6 box-sm-12">
							<div class="wrap_hasil">				
								<a href="hapus/<?= (int)$data['id_kelas'];?>" class="button-close butt-del" id='delete'>X
									<a href="detail/<?= (int)$data['id_kelas'];?>/<?= $nama ?>">
										<div class="data-siswa" style="height: auto;">
											<div class="data-detail-siswa"  style="padding: 25px 20px; width: 100%;align-items: flex-start;">	
												<h4 style="padding: 0;">Nama Kelas: <?= $data['nama_kelas'];?></h4>
												<h4 style="padding: 0;">Kelas: <?= $data['kelas']?></h4>
												<p class="kls">Wali kelas: 
												<?php if($data['nama_guru']  == ''){
													echo "<span style='color:deeppink'> Tidak Ada Wali Kelas </span>";
												}else{
													echo strtoupper("<span style='color:dodgerblue'> {$data['nama_guru']} </span>");
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
	<script src="../asset/js/penaikanKelas.js"></script>
	<script type="text/javascript">
		get_ajax("../mod_kelas/data_kelas.php?q=");
	</script>
	<?php 

	if(isset($_GET['hal'])){
		echo showFlashMessages();
	}
	?>
</body>
</html>