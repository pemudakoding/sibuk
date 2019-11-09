<?php 
	
	require_once "../core/init.php";
	require_once "../core/cek_login.php";

	// //PAGINATION CODE
	$page_data  = pagination_data($page,'data_mapel');
	$page_number= pagination_number($page,'data_mapel');
	$hal		= !isset($_GET['hal']) ? header('location:'.$url.'/mapel/1') : false;
	check_page();
 ?>
	
 
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SIBUK - DATA Mata Pelajaran</title>
	<?php require_once('../template/css.php') ?>

	<script src="../asset/js/jquery-3.1.1.min.js"></script>
	<script src="../asset/js/sweetalert.min.js"></script>
</head>
<body>
	<div class="container">
		<?php require_once('../template/menu-side.php'); ?>

		<div class="headbar">
			<?php require_once('../template/header.php'); ?>
			
			<div class="nav">LIHAT DATA MAPEL</div>
			<div class="section-search">
				<div class="pencarian">Pencarian</div>
			<div class="search">
					<input type="text" name="search" placeholder="Cari" class="input" id="search" autocomplete="off">
			</div>
			</div>

			<div class="section-hasil">
				<div class="hasil-pencarian" id="default">
					<div class="row">
					<?php while($data = mysqli_fetch_assoc($page_data) ): ?>
						<?php 
							$nama  = $data['nama_mapel'];
							$nama  = strtolower(str_replace(" ", '-', $nama));
						 ?>
						<div class="data box4 box-md-6 box-sm-12">
							<div class="wrap_hasil">
								<a href="hapus/<?= (int)$data['id_mapel'];?>" class="button-close butt-del" id='delete'>X
									<a href="edit/<?= (int)$data['id_mapel'];?>/<?= $nama ?>">
										<div class="data-siswa" style="height: auto;">
											<div class="data-detail-siswa"  style="padding: 25px 0px;">	
												<h4>Mata Pelajaran</h4>
												<h4 style="color: dodgerblue" id="nama_mapel"><?= $data['nama_mapel'];?></h4>
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
						
						<div class="data box6 box-sm-12 add_batt">
							<a href="tambah/" class="button-suc">Tambah Data</a>
						</div>

						
					</div>
				</div>
			</div>
			
		</div>
	</div>

	<script src="../asset/js/main.js"></script>
	<script type="text/javascript">
		get_ajax("../mod_mapel/data_mapel.php?q=");
	</script>
	<?php 

	if(isset($_GET['hal'])){
		get_alert('sukses');
		get_alert('gagal');
		alert_data_t();
	};	
	?>
</body>
</html>