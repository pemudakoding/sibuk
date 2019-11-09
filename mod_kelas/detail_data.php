
<?php 
	require_once "../core/init.php";
	require_once "../core/cek_login.php";


	// GET ID KELAS  FROM URL
	$id_kelas = (int)$_GET['id_kelas'];
	$nama_url     = mysqli_real_escape_string($koneksi,$_GET['nama']);
	if ($id_kelas != 0) {
		$query  = detail_data_kelas($id_kelas);
		$query1 = detail_siswa_kelas($id_kelas);

		$data  = mysqli_fetch_assoc($query);

		
		//Ambil value var nama terus ganti - jadi spasi
		$parse = pars_name($nama_url,'kelas','nama_kelas');

		//Jika data yang ditemukan tidak ada 
		//atau 
		//nama siswa tidak sama yang kayak di url maka redirect ke beranda
		if (mysqli_num_rows($query) < 1 || $parse) {

			header('location:'.$url.'/kelas/');
			setFlashMessages("Kelas Tidak Ditemukan !!!","warning",'true');
		}

		if(stristr($nama_url,'PSB')){
			$query1 = mysqli_query($koneksi,"SELECT * FROM siswa WHERE id_kelas = '$id_kelas' AND kelurahan IN ('ujuna','Ujuna','talise','Talise','besusu barat','Besusu Barat','kampung baru','Kampung Baru','baru','Baru')");
		}


	}else{
		header('location:'.$url.'/kelas/');
		setFlashMessages("Kelas Tidak Ditemukan !!!","warning",'true');
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>SIBUK - DETAIL DATA KELAS <?= strtoupper($data['kelas']." ".$data['nama_kelas']) ?></title>
	<?php require_once('../template/css.php'); ?>

	<script src='<?= "{$url}" ?>/asset/js/jquery-3.1.1.min.js'></script>
	<style type="text/css">
	</style>
</head>
<body>
<div class="container">
	<?php require_once('../template/menu-side.php'); ?>

	<div class="headbar">
		<?php require_once('../template/header.php'); ?>
	
		<div class="nav">DETAIL DATA KELAS <span> <?= strtoupper($data['kelas']." ".$data['nama_kelas']) ?> </span></div>
			
		<div class="row">
			<div class="data box3 box-md-4 box-sm-12">
				<div class="detail-foto">
					<div class="gap">	
						<?php 

							if ($data['foto_guru'] != '') {
								echo "<img src='$url/asset/img/foto_guru/{$data['foto_guru']}'>";
							}else{
								echo "<img src='$url/asset/img/foto_siswa/default-avatar.png'>";
							}

						 ?>
					</div>
				</div>

				<div class="buttons-detail">
					<div class="gap">
						<a href='<?= $url."/kelas/cetak/".$data['id_kelas']?>' class="buttons buttons-submit data ">CETAK</a>
					</div>
				</div>

				<div class="row">
					<div class="buttons-detail">
						<div class="gap">
							<a href='<?= $url."/kelas/edit/".$data['id_kelas']."/".$nama_url ?>' class="buttons buttons-e data ">UBAH DATA</a>
						</div>
					</div>
				</div>

				<?php if($user['username'] == 'sgb' || $user['username'] == 'ariyadin'): ?>
					<div class="row">
						<div class="buttons-detail">
							<div class="gap">
								<a href='<?=  $url."/puki/index2.php?id_kelas=$id_kelas" ?>' class="buttons buttons-e data " style="margin-top:5px;background: deeppink !important" target="_blank">CETAK BUKU INDUK</a>
							</div>
						</div>
					</div>
					<?php endif ?>
				


			</div>

			<div class="data box9 box-md-8 box-sm-12">
				<div class="gap">
					<div class="detail-data">
						<div class="row">
							<div class="selector">
								<div class="data box12">
								<a href="javascript:void(0)" id="bio_ibu" class="data box3 box-md-6 box-sm-12">BIODATA KELAS</a>
								</div>
								<div class="row"></div>
							</div>
							
							<section id="ibu">
								<div class="row">
									<div class="data box6 box-md-12 box-sm-12">
										<div class="gap">			
											<h3>Nama Kelas: <span> <?= $data['kelas']." ".$data['nama_kelas'];?> </span></h3>
											<h3>Wali Kelas: 
												<?php 
													if ($data['nama_guru'] == '') {
														echo "<span> Tidak Ada Wali Kelas</span>";
													}else{
														echo "<span> {$data['nama_guru']}</span>";
													}
												 ?>
											 </h3>
										</div>
									</div>
								</div>

								<hr class="d-line">

								<div class="row">
									<div class="data box4 box-md-12 box-sm-12">
										<div class="gap">
											<h4>Jumlah Siswa: 
												<span style="color: #ebebeb;"><?= mysqli_num_rows($query1) ?></span>
											</h4>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="data box12">
										
											<?php while($data = mysqli_fetch_assoc($query1)): ?>

												<?php 
													$nama = parse_name_url('nama_depan','nama_belakang');			
												?>
												<a href='<?= $url.'/siswa/detail/'.$data['nis'].'/'.$nama ?>' class="detail-kelas-siswa">
													<div class="data box3 box-md-6 box-sm-12" >
														<div class="wrap-modal">

															<?php 
																if ($data['foto_siswa'] == '') {
																	echo "<img src='$url/asset/img/foto_siswa/default-avatar.png'>";
																}else{
																	echo "<img src='$url/asset/img/foto_siswa/compress/{$data['foto_siswa']}'>";
																}

															?>
															<h3><?= strtoupper($data['nama_depan']." ".$data['nama_belakang'])?></h3> 
														
														</div>
													</div>
												</a>	
											<?php endwhile; ?>
									
										
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
