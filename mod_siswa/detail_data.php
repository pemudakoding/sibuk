
<?php 
	require_once "../core/init.php";
	require_once "../core/cek_login.php";


	// GET NIS FROM URL
	$nis   	  = mysqli_real_escape_string($koneksi,$_GET['nis_siswa']);
	$nama_url = (string)$_GET['nama'];

	if ($nis != '') {
		$query = detail_data_siswa('nis',$nis);
		$data  = mysqli_fetch_assoc($query);
		foreach($data as $key => $value){
			if($value == '' && $key != 'foto_siswa'){
				$data[$key] = '-';
			}
		}

		//Ambil value var nama terus ganti - jadi spasi
		$parse = pars_name($nama_url,'nama_depan','nama_belakang');

		
		//Jika data yang ditemukan tidak ada 
		//atau 
		//nama siswa tidak sama yang kayak di url maka redirect ke beranda
		
		if (mysqli_num_rows($query) < 1 || $parse) {

			header('location:'.$url.'/siswa/');
			setFlashMessages("Data Siswa Tidak Ditemukan !!!","error",'true');
		}
	

	}else{
		header('location:'.$url.'/siswa/');
		setFlashMessages("Data Siswa Tidak Ditemukan !!!","error",'true');
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>SIBUK - DETAIL DATA SISWA <?= strtoupper($data['nama_depan']." ".$data['nama_belakang']) ?></title>
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
		
			<div class="nav">DETAIL DATA SISWA</div>
				
			<div class="row">
				<div class="data box3 box-md-4 box-sm-12">
					<div class="detail-foto">
						<div class="gap">
							<?php 

								if ($data['foto_siswa'] != '') {
									echo "<img src='$url/asset/img/foto_siswa/compress/{$data['foto_siswa']}'>";
								}else{
									echo "<img src='$url/asset/img/foto_siswa/default-avatar.png'>";
								}

							?>
						</div>
					</div>
					<div class="buttons-detail">
						<div class="gap">
							<a href='<?= $url."/siswa/cetak/".mysqli_real_escape_string($koneksi,strip_tags($data['nis']))?>' class="buttons buttons-submit data gap-bott">CETAK</a>
						</div>
					</div>
					<?php if($data['status_pendidikan'] == 'Aktif' ): ?>
					<div class="row">
						<div class="buttons-detail">
							<div class="gap">
								<a href="<?= $url ?>/cetak/aktif/?siswa=<?= $data['nama_depan']."-".$data['nama_belakang'].",".$data['tempat_lahir'].",".$data['tanggal_lahir'].",".$data['nisn'].",".$data['id_kelas'].",".$data['alamat'] ?>" class="buttons data" target="_blank" style="background:orange; cursor:pointer; font-weight:bold;line-height:30px;"> CETAK KET AKTIF </a>
							</div>
						</div>
					</div>
					<?php endif;?>
					<div class="row">
						<div class="buttons-detail">
							<div class="gap">
								<a href='<?= $url."/siswa/edit/".mysqli_real_escape_string($koneksi,strip_tags($data['nis']))."/".$nama_url ?>' class="buttons buttons-e data " style="margin-top:5px">UBAH DATA</a>
							</div>
						</div>
					</div>

					<?php if($user['username'] == 'sgb' || $user['username'] == 'ariyadin'): ?>
					<div class="row">
						<div class="buttons-detail">
							<div class="gap">
								<a href='<?=  $url."/puki/?nis=$nis" ?>' class="buttons buttons-e data " style="margin-top:5px;background: deeppink !important" target="_blank">CETAK BUKU INDUK</a>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="buttons-detail">
							<div class="gap">
								<a href='<?=  $url."/puki/lagger.php?nis=$nis" ?>' class="buttons buttons-e data " style="margin-top:5px;background: deeppink !important" target="_blank">CETAK LAGGER</a>
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
									<a href="javascript:void(0)" id="bio_siswa" class="data box3 box-md-6 box-sm-6 tab">BIODATA SISWA</a>
									<a href="javascript:void(0)" id="bio_ayah" class="data box3 box-md-6 box-sm-6 tab">BIODATA AYAH</a>
									<a href="javascript:void(0)" id="bio_ibu" class="data box3 box-md-6 box-sm-6 tab">BIODATA IBU</a>
									<a href="javascript:void(0)" id="bio_wali"class="data box3 box-md-6 box-sm-6 tab">BIODATA WALI</a>
									<a href="javascript:void(0)" id="bio_sekolah" class="data box3 box-md-6 box-sm-12 tab">BIODATA SEKOLAH</a>
									</div>
										

									<div class="row"></div>
								</div>
								
								<section id="siswa">
									<div class="row">
										<div class="data box3 box-md-5 box-sm-12">
											<div class="gap">
												<h3>NIK: <span><?= $data['nik_siswa'] ?></span></h3>
												<h3>NIS: <span> <?= $data['nis'];?> <span></h3>
												<h3>NISN: <span> <?= $data['nisn'];?> <span></h3>
											</div>
										</div>

										<div class="data box5 box-sm-12">
											<div class="gap">
												<h3>Kelas: <span> <?= $data['kelas']." ".$data['nama_kelas'];?> </span></h3>
												<h3>Program Study: <span> <?= $data['program_study'];?> </span></h3>
											</div>
										</div>
									</div>
							
									<hr class="d-line">
									<div class="row">

										<div class="data box4 box-mds-6 box-height box-sm-12 ">
											<div class="gap">
												<h4>Nama Siswa</h4>
												<h3> <?= $data['nama_depan']." ".$data['nama_belakang'];?> </h3>
											</div>
										</div>
										<div class="data box4 box-mds-6 box-height box-sm-12">
											<div class="gap">
												<h4>Nama Panggilan</h4>
												<h3> <?= $data['nama_panggilan'];?> </h3>
											</div>
										</div>

										<div class="data box4 box-mds-6 box-height box-sm-12">
											<div class="gap">
												<h4>Kewarganegaraan</h4>
												<h3> <?= $data['kewarganegaraan'];?> </h3>
											</div>
										</div>

										<div class="data box4 box-mds-6 box-height box-sm-12">
											<div class="gap">
												<h4>Bahasa Sehari-hari</h4>
												<h3> <?= $data['bahasa_sehari_hari'];?> </h3>
											</div>
										</div>

										<div class="data box4 box-mds-6 box-height box-sm-12">
											<div class="gap">
												<h4>Tanggal Lahir</h4>
												<h3> <?= $data['tanggal_lahir'];?> </h3>
											</div>
										</div>

										<div class="data box4 box-mds-6 box-height box-sm-12">
											<div class="gap">
												<h4>Tempat Lahir</h4>
												<h3> <?= $data['tempat_lahir'];?> </h3>
											</div>
										</div>

										<div class="data box4 box-mds-6 box-height box-sm-12">
											<div class="gap">
												<h4>Jenis Kelamin</h4>
												<h3> <?= $data['jenis_kelamin'];?> </h3>
											</div>
										</div>

										<div class="data box4 box-mds-6 box-height box-sm-12">
											<div class="gap">
												<h4>Agama</h4>
												<h3> <?= $data['agama'];?> </h3>
											</div>
										</div>

										<div class="data box4 box-mds-6 box-height box-sm-12">
											<div class="gap">
												<h4>Golongan Darah</h4>
												<h3> <?= $data['golongan_darah'];?> </h3>
											</div>
										</div>

										<div class="data box4 box-mds-6 box-height box-sm-12">
											<div class="gap">
												<h4>Tinggi Badan</h4>
												<h3> <?= $data['tinggi_siswa']." ".'CM' ?> </h3>
											</div>
										</div>

										<div class="data box4 box-mds-6 box-height box-sm-12">
											<div class="gap">
												<h4>Berat Badan</h4>
												<h3><?= $data['berat_siswa']." ".'Kg';?> </h3>
											</div>
										</div>

										<div class="data box4  box-mds-6 box-height box-sm-12 box-mds-6 box-height box-sm-12">
											<div class="gap">
												<h4>Anak Ke</h4>
												<h3> <?= $data['anak_keberapa'];?> </h3>
											</div>
										</div>

										<div class="data box4  box-mds-6 box-height box-sm-12">
											<div class="gap">
												<h4>Yatim Piatu</h4>
												<h3> <?= $data['anak_yatim'];?> </h3>
											</div>
										</div>

										<div class="data box4  box-mds-6 box-height box-sm-12">
											<div class="gap">
												<h4>Jumlah saudara kandung</h4>
												<h3> <?= $data['jumlah_saudara_kandung'];?> </h3>
											</div>
										</div>

										<div class="data box4  box-mds-6 box-height box-sm-12">
											<div class="gap">
												<h4>Jumlah Saudara Tiri</h4>
												<h3> <?= $data['jumlah_saudara_tiri'];?> </h3>
											</div>
										</div>

										<div class="data box4 box-mds-6 box-height box-sm-12">
											<div class="gap">
												<h4>Jumlah Saudara Agkat</h4>
												<h3> <?= $data['jumlah_saudara_angkat'];?> </h3>
											</div>
										</div>

										<div class="data box4 box-mds-6 box-height box-sm-12">
											<div class="gap">
												<h4>Jenis Tinggal</h4>
												<h3> <?= $data['alamat_tersebut'];?> </h3>
											</div>
										</div>

										<div class="data box4 box-mds-6 box-height box-sm-12">
											<div class="gap">
												<h4>Alamat Tinggal</h4>
												<h3> <?= $data['alamat'];?> </h3>
											</div>
										</div>

								
										<div class="data box4 box-sm-12">
											<div class="gap">
												<h4>Kelurahan</h4>
												<h3><?= $data['kelurahan'];?></h3>
											</div>
										</div>

										<div class="data box4 box-sm-12">
											<div class="gap">
												<h4>Kecamatan</h4>
												<h3><?= $data['kecamatan'];?></h3>
											</div>
										</div>

										<div class="data box4 box-sm-12">
											<div class="gap">
												<h4>Kode Pos</h4>
												<h3><?= $data['kodepos'];?></h3>
											</div>
										</div>

										<div class="data box4 box-sm-12">
											<div class="gap">
												<h4>RT/RW</h4>
												<h3><?= $data['rt_rw'];?></h3>
											</div>
										</div>

										<div class="data box4 box-sm-12">
											<div class="gap">
												<h4>Penyakit Diderita</h4>
												<h3> <?= $data['penyakit_yang_pernah_diderita'];?> </h3>
											</div>
										</div>

										<div class="data box4 box-sm-12">
											<div class="gap">
												<h4>Kelainan Jasmani</h4>
												<h3> <?= $data['kelainan_jasmani'];?> </h3>
											</div>
										</div>

										<div class="data box4 box-sm-12">
											<div class="gap">
												<h4>Pernah Dirawat Di</h4>
												<h3> <?= $data['pernah_dirawat_di'];?> </h3>
											</div>
										</div>

										<div class="data box8">
											<div class="gap">
												<h4>No Telepon</h4>
												<h3> <?= $data['nomor_telepon'];?> </h3>
											</div>
										</div>
									</div>

								</section>

								<section id="ayah">
									<div class="row">
										<div class="data box4">
											<div class="gap">
												<h3>NIK: <span style="color: #30c055"><?= $data['nik_ayah'] ?></span></h3>
											</div>
										</div>
									</div>
									<hr class="d-line">
									<div class="row">
										<div class="data box4 box-mds-6 box-height box-sm-12">
											<div class="gap">
												<h4>Nama Ayah</h4>
												<h3> <?= $data['nama_depan_ayah']." ".$data['nama_belakang_ayah'];?> </h3>
											</div>
										</div>

										<div class="data box4 box-mds-6 box-height box-sm-12">
											<div class="gap">
												<h4>Tahun Lahir Ayah</h4>
												<h3> <?= $data['tanggal_lahir_ayah'];?> </h3>
											</div>
										</div>

										<div class="data box4 box-mds-6 box-height box-sm-12">
											<div class="gap">
												<h4>Agama Ayah</h4>
												<h3> <?= $data['agama_ayah'];?> </h3>
											</div>
										</div>

										<div class="data box4 box-mds-6 box-height box-sm-12">
											<div class="gap">
												<h4>kewarganegaraan Ayah</h4>
												<h3> <?= $data['kewarganegaraan_ayah'];?> </h3>
											</div>
										</div>

										<div class="data box4 box-mds-6 box-height box-sm-12">
											<div class="gap">
												<h4>Ijazah tertinggi Ayah</h4>
												<h3> <?= $data['ijazah_tertinggi_ayah'];?> </h3>
											</div>
										</div>

										<div class="data box4 box-mds-6 box-height box-sm-12">
											<div class="gap">
												<h4>Pekerjaan ayah</h4>
												<h3> <?= $data['pekerjaan_ayah'];?> </h3>
											</div>
										</div>

										<div class="data box4 box-mds-6 box-height box-sm-12">
											<div class="gap">
												<h4>Penghasilan perbulan ayah</h4>
												<h3 class="over-big-text"> <?= $data['penghasilan_perbulan_ayah'];?> </h3>
											</div>
										</div>

										<div class="data box4 box-mds-6 box-height box-sm-12">
											<div class="gap">
												<h4>no telepon ayah</h4>
												<h3> <?= $data['nomor_telepon_ayah'];?> </h3>
											</div>
										</div>

										<div class="data box4 box-mds-6 box-height box-sm-12">
											<div class="gap">
												<h4>Riwayat hidup ayah</h4>
												<h3> <?= $data['riwayat_hidup_ayah'];?> </h3>
											</div>
										</div>

									</div>
									
									<div class="row">
										

										<div class="data box12">
											<div class="gap">
												<h4>Alamat rumah ayah</h4>
												<h3> <?= $data['alamat_rumah_ayah'];?> </h3>
											</div>
										</div>

									</div>

								</section>


								<section id="ibu">
									<div class="row">
										<div class="data box4">
											<div class="gap">
												<h3>NIK: <span style="color: #3799d7"><?= $data['nik_ibu'] ?></span></h3>
											</div>
										</div>
									</div>
									<hr class="d-line">
									<div class="row">
										<div class="data box4 box-mds-6 box-height box-sm-12">
											<div class="gap">
												<h4>Nama ibu</h4>
												<h3> <?= $data['nama_depan_ibu']." ".$data['nama_belakang_ibu'];?> </h3>
											</div>
										</div>

										<div class="data box4 box-mds-6 box-height box-sm-12">
											<div class="gap">
												<h4>Tahun Lahir ibu</h4>
												<h3> <?= $data['tanggal_lahir_ibu'];?> </h3>
											</div>
										</div>

										<div class="data box4 box-mds-6 box-height box-sm-12">
											<div class="gap">
												<h4>Agama ibu</h4>
												<h3> <?= $data['agama_ibu'];?> </h3>
											</div>
										</div>

										<div class="data box4 box-mds-6 box-height box-sm-12">
											<div class="gap">
												<h4>kewarganegaraan ibu</h4>
												<h3> <?= $data['kewarganegaraan_ibu'];?> </h3>
											</div>
										</div>

										<div class="data box4 box-mds-6 box-height box-sm-12">
											<div class="gap">
												<h4>Ijazah tertinggi ibu</h4>
												<h3> <?= $data['ijazah_tertinggi_ibu'];?> </h3>
											</div>
										</div>

										<div class="data box4 box-mds-6 box-height box-sm-12">
											<div class="gap">
												<h4>Pekerjaan ibu</h4>
												<h3> <?= $data['pekerjaan_ibu'];?> </h3>
											</div>
										</div>

										<div class="data box4 box-mds-6 box-height box-sm-12 ">
											<div class="gap">
												<h4>Penghasilan perbulan ibu</h4>
												<h3 class="over-big-text"><?= $data['penghasilan_perbulan_ibu'];?> </h3>
											</div>
										</div>

										<div class="data box4 box-mds-6 box-height box-sm-12">
											<div class="gap">
												<h4>no telepon ibu</h4>
												<h3> <?= $data['nomor_telepon_ibu'];?> </h3>
											</div>
										</div>

										<div class="data box4 box-mds-6 box-height box-sm-12">
											<div class="gap">
												<h4>Riwayat hidup ibu</h4>
												<h3> <?= $data['riwayat_hidup_ibu'];?> </h3>
											</div>
										</div>
									</div>
									<div class="row">
										

										<div class="data box12">
											<div class="gap">
												<h4>Alamat rumah ibu</h4>
												<h3> <?= $data['alamat_rumah_ibu'];?> </h3>
											</div>
										</div>

									</div>
								</section>

								<section id="wali">
									<div class="row">
										<div class="data box4">
											<div class="gap">
												<h3>NIK: <span style="color: #d79d37"> <?= $data['nik_wali'] ?> </span></h3>
											</div>
										</div>
									</div>
									<hr class="d-line">
									<div class="row">
										<div class="data box4 box-mds-6 box-height box-sm-12 ">
											<div class="gap">
												<h4>Nama wali</h4>
												<h3> <?= $data['nama_depan_wali']." ".$data['nama_belakang_wali'];?> </h3>
											</div>
										</div>

										<div class="data box4 box-mds-6 box-height box-sm-12 ">
											<div class="gap">
												<h4>Tahun Lahir wali</h4>
												<h3> <?= $data['tanggal_lahir_wali'];?> </h3>
											</div>
										</div>

										<div class="data box4 box-mds-6 box-height box-sm-12 ">
											<div class="gap">
												<h4>Agama wali</h4>
												<h3><?= $data['agama_wali']; ?></h3>
											</div>
										</div>

										<div class="data box4 box-mds-6 box-height box-sm-12 ">
											<div class="gap">
												<h4>kewarganegaraan wali</h4>
												<h3> <?= $data['kewarganegaraan_wali'];?> </h3>
											</div>
										</div>

										<div class="data box4 box-mds-6 box-height box-sm-12 ">
											<div class="gap">
												<h4>Ijazah tertinggi wali</h4>
												<h3> <?= $data['ijazah_tertinggi_wali'];?> </h3>
											</div>
										</div>

										<div class="data box4 box-mds-6 box-height box-sm-12 ">
											<div class="gap">
												<h4>Pekerjaan wali</h4>
												<h3> <?= $data['pekerjaan_wali'];?> </h3>
											</div>
										</div>

										<div class="data box4 box-mds-6 box-height box-sm-12 ">
											<div class="gap">
												<h4>Penghasilan perbulan wali</h4>
												<h3 class="over-big-text"> <?= $data['penghasilan_perbulan_wali'];?> </h3>
											</div>
										</div>

										<div class="data box4 box-mds-6 box-height box-sm-12 ">
											<div class="gap">
												<h4>no telepon wali</h4>
												<h3> <?= $data['nomor_telepon_wali'];?> </h3>
											</div>
										</div>

										<div class="data box4 box-mds-6 box-height box-sm-12 ">
											<div class="gap">
												<h4>Riwayat hidup wali</h4>
												<h3> <?= $data['riwayat_hidup_wali'];?> </h3>
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="data box12">
											<div class="gap">
												<h4>Alamat rumah wali</h4>
												<h3> <?= $data['alamat_rumah_wali'];?> </h3>
											</div>
										</div>

									</div>

								</section>

								<section id="sekolah">
									
									<div class="row">
										<div class="data box4 box-mds-6 box-height box-sm-12">
											<div class="gap">
												<h4>Tahun Masuk Siswa</h4>
												<h3> <?= $data['tahun_masuk_siswa'];?> </h3>
											</div>
										</div>

										<div class="data box4 box-mds-6 box-height box-sm-12">
											<div class="gap">
												<h4>Terdaftar pada kelas</h4>
												<h3> <?= $data['terdaftar_pada_kelas'];?> </h3>
											</div>
										</div>

										<div class="data box4 box-mds-6 box-height box-sm-12">
											<div class="gap">
												<h4>Menerima Beasiswa</h4>
												<h3> <?= $data['menerima_bea_siswa'];?> </h3>
											</div>
										</div>

										<div class="data box4 box-mds-6 box-height box-sm-12">
											<div class="gap">
												<h4>Nama Sekolah</h4>
												<h3> <?= $data['nama_sekolah'];?> </h3>
											</div>
										</div>

										<div class="data box4 box-mds-6 box-height box-sm-12">
											<div class="gap">
												<h4>Jarak rumah ke sekolah</h4>
												<h3> <?= $data['jarak_rumah_dari_sekolah'];?> </h3>
											</div>
										</div>

										<div class="data box4 box-mds-6 box-height box-sm-12">
											<div class="gap">
												<h4>Alamat Sekolah</h4>
												<h3> <?= $data['alamat_sekolah'];?> </h3>
											</div>
										</div>

										<div class="data box12 box-mds-6 box-height box-sm-12">
											<div class="gap">
												<h4>Transportasi</h4>
												<h3> <?= $data['ke_sekolah_dengan'];?> </h3>
											</div>
										</div>

										<div class="data box4 box-mds-6 box-height box-sm-12">
											<div class="gap">
												<h4>status pendidikan</h4>
												<h3> <?= $data['status_pendidikan'];?> </h3>
											</div>
										</div>
										<?php if($data['status_pendidikan'] == 'Pindah'): ?>

											<div class="data box4 box-mds-6 box-height box-sm-12">
												<div class="gap">
													<h4>Alasan Pindah</h4>
													<h3> <?= $data['alasan_siswa_pindah'];?> </h3>
												</div>
											</div>

											<?php 
												$history 		= get_history_print($data['nis']); 
												$history_count	= mysqli_num_rows($history);
												if($history_count > 0):
												$history_result = mysqli_fetch_assoc($history);
											?>
											<div class="data box4 box-mds-6 box-height box-sm-12">
												<div class="gap">
													<h4>Surat Keterangan Pindah Dicetak</h4>
													<h3> <?= $history_result['nama_depan']." ".$history_result['nama_belakang'] ?> </h3>
												</div>
											</div>
											<?php endif; ?>
										<?php endif;?>
									</div>


									<hr class="d-line">
									<div class="row">
										<div class="gap">
											<div class="data box4 box-mds-12 box-height box-sm-12">
												<h3  class="tag-line-data">Jenjang Sebelumnya</h3>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="data box4 box-mds-6 box-height box-sm-12">
											<div class="gap">
												<h4>tanggal dan nomor sttb</h4>
												<h3> <?= $data['tanggal_dan_nomor_sttb'];?> </h3>
											</div>
										</div>

										<div class="data box4 box-mds-6 box-height box-sm-12">
											<div class="gap">
												<h4>sekolah asal</h4>
												<h3> <?= $data['asal_sekolah'];?> </h3>
											</div>
										</div>

										<div class="data box4 box-mds-6 box-height box-sm-12">
											<div class="gap">
												<h4>Lama belajar</h4>
												<h3> <?= $data['lama_belajar'];?> </h3>
											</div>
										</div>

										<div class="data box4 box-mds-6 box-height box-sm-12">
											<div class="gap">
												<h4>Nomor Peserta UN SD/MI</h4>
												<h3> <?= $data['no_peserta_un'];?> </h3>
											</div>
										</div>

										<div class="data box4 box-mds-6 box-height box-sm-12">
											<div class="gap">
												<h4>Nomor Seri Ijazah SD/MI</h4>
												<h3> <?= $data['no_seri_ijazah'];?> </h3>
											</div>
										</div>

										<div class="data box4 box-mds-6 box-height box-sm-12">
											<div class="gap">
												<h4>NOMOR SKHUN SD/MI</h4>
												<h3> <?= $data['no_skhun'];?> </h3>
											</div>
										</div>
									</div>
									<hr class="d-line">
									<div class="row">
										<div class="gap">
											<div class="data box4 box-mds-12 box-height box-sm-12">
												<h3 class="tag-line-data">Pindahan</h3>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="data box4 box-mds-6 box-height box-sm-12">
											<div class="gap">
												<h4>pindahan dari sekolah</h4>
												<h3> <?= $data['pindahan_dari_sekolah'];?> </h3>
											</div>
										</div>

										<div class="data box4 box-mds-6 box-height box-sm-12">
											<div class="gap">
												<h4>Tanggal diterima disekolah ini</h4>
												<h3> <?= $data['tanggal_diterima_disekolah_ini'];?> </h3>
											</div>
										</div>
									</div>
									<div class="row">
										

										<div class="data box4 box-mds-6 box-height box-sm-12">
											<div class="gap">
												<h4>Diterima pada kelas</h4>
												<h3> <?= $data['diterima_pada_kelas'];?> </h3>
											</div>
										</div>

										<div class="data box4 box-mds-6 box-height box-sm-12">
											<div class="gap">
												<h4>Alasan Pindah</h4>
												<h3> <?= $data['alasan_pindah'];?> </h3>
											</div>
										</div>
									</div>

									<hr class="d-line">
									<div class="row">
										<div class="gap">
											<div class="data box4 box-mds-6 box-height box-sm-12">
												<h3 class="tag-line-data">Tamat</h3>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="data box4 box-mds-6 box-height box-sm-12">
											<div class="gap">
												<h4>Tahun meninggalkan sekolah</h4>
												<h3> <?= $data['tahun_meninggalkan_sekolah'];?> </h3>
											</div>
										</div>

										<div class="data box4 box-mds-6 box-height box-sm-12">
											<div class="gap">
												<h4>Tamat belajar tahun</h4>
												<h3> <?= $data['tamat_belajar_tahun'];?> </h3>
											</div>
										</div>

										<div class="data box4 box-mds-6 box-height box-sm-12">
											<div class="gap">
												<h4>alasan</h4>
												<h3> <?= $data['alasan'];?> </h3>
											</div>
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
</div>

	<script src='<?= $url ?>/asset/js/main.js'></script>
	<script src='<?= $url ?>/asset/js/page-form.js'></script>
</body>
</html>
