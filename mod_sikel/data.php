<?php 
	
	require_once "../core/init.php";

	$page_data  = pagination_data($page,'data_kelas');
	$page_number= pagination_number($page,'data_kelas');

	$kelas  = (int)$_GET['kelas'];
	$result = ambil_kelas_tkt($kelas);
	
	

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SIBUK - Daftar Kelas <?= $kelas ?></title>
	<?php require_once('../template/css.php') ?>

	<script src="../asset/js/jquery-3.1.1.min.js"></script>

</head>
<body>
	<div class="container">
		<?php require_once('../template/menu-side_skl.php'); ?>

		<div class="headbar">
			<?php require_once('../template/header.php'); ?>

			<div class="nav">Daftar Kelas <span> <?= $kelas ?> </span></div>
			<div class="container-right">
				<div class="submain">
					<div class="row">
					<?php while( $data = mysqli_fetch_assoc($result) ):?>
						<?php 
							$nama  = $data['kelas']." ".$data['nama_kelas'];
							$nama  = strtolower(str_replace(" ", '-', $nama));
					 	?>
						<div class="data box4 box-md-6 box-sm-12">
							<div class="modal box-kelas">
								<a href="detail/<?= $data['id_kelas'] ?>/<?= $nama;?>">
									<div class="data-detail-kelas">	
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
								</a>	
							</div>
						</div>
					<?php endwhile; ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="../asset/js/main.js"></script>

</body>
</html>