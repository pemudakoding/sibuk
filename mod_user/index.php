<?php 
	require_once "../core/init.php";
	require_once "../core/cek_login.php";
	//PAGINATION CODE
	$page_data  = pagination_data($page,'data_user');
	$page_number= pagination_number($page,'data_user');
	$hal		= !isset($_GET['hal']) ? header('location:'.$url.'/user/1') : false;
	check_page();
 ?>
	
 
<!DOCTYPE html>
<html>
<head>
	<title>SIBUK - DATA USER</title>
	<?php require_once('../template/css.php') ?>

	<script src="../asset/js/jquery-3.1.1.min.js"></script>
	<script src="../asset/js/sweetalert.min.js"></script>
</head>
<body>
	<div class="container">

		<?php require_once('../template/menu-side.php'); ?>

		<div class="headbar">
			<?php require_once('../template/header.php'); ?>
			
			<div class="nav">LIHAT DATA USER</div>
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
						<div class="data box4 box-md-6 box-sm-12">
							<div class="wrap_hasil">
								<a href="hapus/<?= (int)$data['id_user'];?>" class="button-close butt-del" id='delete'>X
									<a href="detail/<?= (int)$data['id_user'].'/'.$data['username'];?>">
										<div class="data-siswa data-oth">
											<?php 

												if ($data['foto_user'] != '') {
													echo "<img src='../asset/img/foto_user/{$data['foto_user']}' class='img_profil'>";
												}else{
													echo "<img src='../asset/img/foto_siswa/default-avatar.png' class='img_profil'>";
												}

											 ?>
											<div class="data-detail-siswa"  style="padding: 25px 0px;">	
												<h4><?= $data['nama_depan']." ".$data['nama_belakang'];?></h4>
												<p>Username: <?= $data['username'];?></p>
												<p>Level: 
												<?php 
													if ($data['level'] === 'admin') {
														echo "<span style='color:dodgerblue; text-transform: capitalize;'>{$data['level']}</span>";
													}else{
														echo "<span style='color:deeppink; text-transform: capitalize;'>{$data['level']}</span>";
													}  
												?>
												</p>
												<p><?= "Akses Login:"." ".$data['akses']; ?></p>
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
		get_ajax("../mod_user/data_user.php?q=");
	</script>
	<?php 
		// FUNCTION ALERT
		if(isset($_GET['hal'])){
			echo showFlashMessages();
		}
	?>
</body>
</html>