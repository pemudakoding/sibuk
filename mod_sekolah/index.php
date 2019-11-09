
<?php 
	require_once "../core/init.php";
	require_once "../core/cek_login.php";

	$data 		 = mysqli_fetch_assoc(data_sekolah());
	$tahunAjaran = dataTahunAjaran();

	if (isset($_POST['submit'])) {

		
		$foto_kepsek = $_FILES['foto_kepsek']['name'];
		$foto_path	 = $_FILES['foto_kepsek']['tmp_name'];

		$status = 0;
		if ($foto_kepsek != '') {
			$foto_kepsek = rand(0,999).'_'.'SIBUK_IMG_'.rand(0,999).'_'.$foto_kepsek;
			if(edit_sekolah($foto_kepsek)){

				move_uploaded_file($foto_path, '../asset/img/foto_kepsek/'.$foto_kepsek);		
				unlink('../asset/img/foto_kepsek/'.$data['foto_kepsek']);
				$status = 1;

			}
		}else{
			if(edit_sekolah($data['foto_kepsek'])){
				$status = 1;
			}
		}
		
		if(!empty($_POST['awal_tahun_ajaran']) && !empty($_POST['akhir_tahun_ajaran'])){
			if(insertTahunAjaran()){
				$status = 1;
			}else{
				$status = 0;
			}
		}

		if($status == 1){
			setFlashMessages("Berhasil Menyunting Pengaturan Sekolah !!!","success");
			header('location:'.$url.'/beranda.php');
		}else{
			set_session('sukses','edit_sekolah');
			setFlashMessages("Gagal Menyunting Pengaturan Sekolah !!!","error",'true');
			header('location:'.$url.'/beranda.php');
		}
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>SIBUK - EDIT BIO DATA SEKOLAH</title>
	<?php require_once('../template/css.php') ?>

	<script src='<?= "{$url}" ?>/asset/js/jquery-3.1.1.min.js'></script>
	<script src="<?= "{$url}" ?>/asset/js/sweetalert.min.js"></script>
</head>
<body>
	<div class="container">
		<?php require_once('../template/menu-side.php'); ?>

		<div class="headbar">
			<?php require_once('../template/header.php'); ?>
			<form class="form" action="" method="POST" enctype="multipart/form-data">
				<div class="nav">EDIT BIO DATA SEKOLAH</div>
				<div class="main">
					<div class="row">
						<div class="data box4 box-md-4 box-sm-12">
							<div class="gap">	
								<div class="selector">
									<a href="javascript:void(0)" id="bio_siswa" class="box-sm-12 tab">BIODATA SEKOLAH</a>
									<a href="javascript:void(0)" id="bio_ayah" class="box-sm-12 tab">SUNTING TAHUN AJARAN</a>
									<a href="javascript:void(0)" id="bio_ibu" class="box-sm-12 tab">TAMBAH TAHUN AJARAN</a>
									<button type="submit" name="submit" class="buttons buttons-submit" id="submit" > SUBMIT </button>
								</div>
							</div>
						</div>

						<div class="data box8 box-sm-12 box-md-8">
							<div class="gap">
								<div class="bio">	
									<section id="siswa">
										<h2>BIODATA SEKOLAH</h2>
										<p>Data harus benar agar tidak menjadi masalah di kemudian hari</p>
									
										<div class="row">
											<div class="data box12">
												<h4>Nama Sekolah</h4>
												<input type="text" name="nama_sekolah" value="<?= $data['nama_sekolah']; ?>">
											</div>

											<div class="data box12">
												<h4>Status Sekolah</h4>
												<input type="text" name="status_sekolah" value="<?= $data['status_sekolah']; ?>">
											</div>

											<div class="data box6 box-mds-12">
												<h4>Nomor Statistik Sekolah</h4>
												<input type="text" name="no_stats_sekolah" value="<?= $data['no_stats_sekolah']; ?>">
											</div>

											<div class="data box6 box-mds-12">
												<h4>NPSN</h4>
												<input type="text" name="npsn" value="<?= $data['npsn']; ?>">
											</div>

											<div class="data box12 ">
												<h4>Alamat Sekolah</h4>
												<input type="text" name="alamat_sekolah" value="<?= $data['alamat_sekolah']; ?>">
											</div>

											<div class="data box4 box-mds-12">
												<h4>Kota</h4>
												<input type="text" name="kota_sekolah" value="<?= $data['kota_sekolah']; ?>">
											</div>

											<div class="data box4 box-mds-12">
												<h4>Kecamatan</h4>
												<input type="text" name="kecamatan" value="<?= $data['kecamatan']; ?>">
											</div>

											<div class="data box4 box-mds-12">
												<h4>Provinsi</h4>
												<input type="text" name="provinsi" value="<?= $data['provinsi']; ?>">
											</div>

											<div class="data box4 box-mds-12">
												<h4>Nomor Telp Sekolah</h4>
												<input type="text" name="no_telp_sekolah" value="<?= $data['no_telp_sekolah']; ?>">
											</div>

											<div class="data box4 box-mds-12">
												<h4>Email Sekolah</h4>
												<input type="text" name="email_sekolah" value="<?= $data['email_sekolah']; ?>">
											</div>

											<div class="data box4 box-mds-12">
												<h4>Web Sekolah</h4>
												<input type="text" name="web_sekolah" value="<?= $data['web_sekolah']; ?>">
											</div>
										</div>
										<div class="row">
											<div class="data box8 box-mds-12">
												<h4>Nama Kepala Sekolah</h4>
												<input type="text" name="nama_kepsek" value="<?= $data['nama_kepsek']; ?>">

												<h4>Jabatan/Pangkat Kepala Sekolah</h4>		
												<input type="text" name="jabatan_kepsek" value="<?= $data['jabatan_kepsek']; ?>">

												<h4>NIP Kepala Sekolah</h4>		
												<input type="text" name="nip_kepsek" value="<?= $data['nip_kepsek']; ?>">
											</div>

											<div class="data box4 box-mds-6 push-mds-3 box-sm-8 push-sm-2 foto">
												<div class="section-foto">
													<h4>Photo</h4>
													
													<div id="img_prev_def">
													<?php 

														if ($data['foto_kepsek'] != '') {
															echo "<img src='$url/asset/img/foto_kepsek/{$data['foto_kepsek']}' width='100%' height='250px'>";
														}else{
															echo "<img src='$url/asset/img/foto_guru/default-avatar.png' width='100%' height='250px'>";
														}
													?>
													</div>
													<div id="preview_img">
														
													</div>
													<input type="file" name="foto_kepsek" id="file" >
												</div>
											</div>
											
										</div>						
									</section>
									<section id='ayah'>
										<h2>SUNTING TAHUN AJARAN SEKOLAH</h2>
										<p>Data harus benar agar tidak menjadi masalah di kemudian hari</p>
										<div class="row">
											<h4>TAHUN AJARAN</h4>
											<div class="data box12 box-mds-6">
												<select name="tahun_ajaran">
													<option value="">- PILIH TAHUN AJARAN -</option>
													<?php 
														$statusTahunAjaran;
														while($dataTahunAJaran = mysqli_fetch_assoc($tahunAjaran)):?>
														<?php
															if($dataTahunAJaran['status'] == 'Y'):
															$statusTahunAjaran = 'Y';
														?>
															<option value="<?= $dataTahunAJaran['id_thn_ajaran'] ?>" selected> <?= $dataTahunAJaran['tahun_ajaran'] ?> </option>
														<?php else:?>
															<option value="<?= $dataTahunAJaran['id_thn_ajaran'] ?>"> <?= $dataTahunAJaran['tahun_ajaran'] ?> </option>
														<?php endif;?>
													<?php endwhile;?>
												</select>
											</div>	
										</div>
									</section>
									<section id="ibu">
										<h2>TAMBAH TAHUN AJARAN SEKOLAH</h2>
										<p>Data harus benar agar tidak menjadi masalah di kemudian hari</p>

										<div class="row">
											<h4>TAHUN AJARAN</h4>
											<div class="data box6 box-mds-6">										
												<input type="text" name="awal_tahun_ajaran" placeholder="2019">
											</div>
											<div class="data box6 box-mds-6">						
												<input type="text" name="akhir_tahun_ajaran" placeholder="2020">
											</div>
										</div>
									</section>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>


	
	<script src='<?= $url ?>/asset/js/main.js'></script>
	<script src="<?= $url ?>/asset/js/page-form.js"></script> 
	<script src='<?= $url; ?>/asset/js/validation_all.js' type="module"></script>
	<script type="text/javascript">
		var input  = document.getElementsByTagName('input');
		var submit = document.getElementById('submit');
		for(i = 1; i < input.length;){
			input[i].setAttribute('autocomplete','off');
			i++;
		}
	</script>

</body>
</html>
