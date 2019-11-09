
<?php 

	require_once "../core/init.php";
	require_once "../core/cek_login.php";

	/**
	 * GET DATA
	 */

	$tahunAjaran = dataTahunAjaran();
	if (isset($_POST['submit'])) {
		//Bagian Foto
		
		$foto_siswa 	= mysqli_real_escape_string($koneksi,strip_tags( $_FILES['foto_siswa']['name']));
		$foto_siswa1 	= rand(0,999).'_'.'SIBUK_IMG_'.rand(0,999).'_'.$foto_siswa;
		$foto_path		= $_FILES['foto_siswa']['tmp_name'];

		if ($foto_siswa == '') {
			$tambah 	= tambah_data_siswa('');
			
		}else{
			$tambah 	= tambah_data_siswa($foto_siswa1);
		}
		
		

		if ($tambah) {
			checkPSB();
			$pathImage = '../asset/img/foto_siswa/'.$foto_siswa1;
			compressImage($foto_path,'../asset/img/foto_siswa/compress/'.$foto_siswa1);
			move_uploaded_file($foto_path,$pathImage);

			require_once('../inc/request_surat.php');
			header('location: ../');
			setFlashMessages("Berhasil Menambahkan Siswa !!!","success");
			
		}else{
			header('location:../');
			setFlashMessages("Gagal Menambahkan Siswa !!!","error",'true');
			
		}
	}

	$kelas = data_kelas("");
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SIBUK - TAMBAH DATA SISWA</title>

	<?php require_once('../template/css.php') ?>

	<link rel="stylesheet"  href='../../asset/css/jquery-ui.min.css'>

	<script src='../../asset/js/jquery-3.1.1.min.js'></script>
	<script src='../../asset/js/jquery-ui.min.js'></script>
	<script src='../../asset/js/sweetalert.min.js'></script>
	</head>
<body>
	<div class="container">
		<?php require_once('../template/menu-side.php'); ?>

		<div class="headbar">
			<?php require_once('../template/header.php'); ?>

			<form class="form" action="" method="POST" enctype="multipart/form-data" id="formmas" name="adform"> 
				<div class="nav">TAMBAH DATA SISWA</div>
				<div class="main">
					<div class="row">
						<div class="data box4 box-md-4 box-sm-12">
							<div class="gap">
								<div class="selector selector-form">
									<a href="javascript:void(0)" id="bio_siswa" class="box-sm-6 tab">BIODATA SISWA</a>
									<a href="javascript:void(0)" id="bio_ayah" class="box-sm-6 tab">BIODATA AYAH</a>
									<a href="javascript:void(0)" id="bio_ibu" class="box-sm-6 tab">BIODATA IBU</a>
									<a href="javascript:void(0)" id="bio_wali" class="box-sm-6 tab">BIODATA WALI</a>
									<a href="javascript:void(0)" id="bio_sekolah" class="box-sm-12 tab">SEKOLAH</a>				
									<div id="buttons-print">
										
									</div>
									<button type="submit" name="submit" class="buttons buttons-submit" id="submit" > SUBMIT </button>
								</div>
							</div>
						</div>
						<div class="data box8 box-sm-12 box-md-8">
							<div class="gap">
							    <div class="bio">
								
									<section id="siswa">
										<h2>BIODATA SISWA</h2>
										<p>Data Harus benar agar tidak menjadi masalah di kemudian hari</p>
						
										<div class="row">
											<div class="data box6 box-sm-12">
												<h4>Nama Depan</h4>
												<input type="text" name="nama_depan" id="nama_depan">
											</div>
											<div class="data box6 box-sm-12">
												<h4>Nama Belakang</h4>
												<input type="text" name="nama_belakang" id="nama_belakang">
											</div>
										</div>
										<div class="row">
											<div class="data box4 box-mds-6  box-sm-12">
												<h4>Nama Panggilan</h4>
												<input type="text" name="nama_panggilan" id="nama_panggilan">
											</div>
											<div class="data box4 box-mds-6  box-sm-12">
												<h4>Kewarganegaraan</h4>
												<input type="text" name="kewarganegaraan" id="kewarganegaraan">
											</div>
											<div class="data box4 box-mds-6  box-sm-12">
												<h4>Bahasa Sehari hari</h4>
												<input type="text" name="bahasa_sehari_hari" id="bhs_sehari">
											</div>

											<div class="data box3 box-mds-6  box-sm-12">
												<h4>Tanggal Lahir</h4>
												<input type="text" name="tanggal_lahir" id="tanggal_lahir" class="tanggal">
											</div>
											<div class="data box9  box-mds-6 box-sm-12">
												<h4>Tempat Lahir</h4>
												<input type="text" name="tempat_lahir" id="tp">
											</div>

											<div class="data box6 box-mds-6 box-sm-12">
												<h4>Jenis Kelamin</h4>
												<select name="jenis_kelamin" id="jk">
													<option value="">Pilih Jenis Kelamin</option>
													<option value="Laki-Laki">Laki-Laki</option>
													<option value="Perempuan">Perempuan</option>
												</select>
											</div>
											<div class="data box6 box-mds-6 box-sm-12">
												<h4>Agama</h4>
												<select name="agama" id="agama">
													<option value="">Pilih Agama</option>
													<option value="Islam">Islam</option>
													<option value="Kristen">Kristen</option>
													<option value="Hindu">Hindu</option>
													<option value="Budha">Budha</option>
													<option value="Konghucu">Konghucu</option>
												</select>
											</div>

											<div class="data box4 box-mds-6 box-sm-12">
												<h4>Golongan Darah</h4>
												<select name="golongan_darah" id="golongan_d">
													<option value="">Pilih Golongan Darah</option>
													<option value="A">A</option>
													<option value="B">B</option>
													<option value="AB">AB</option>
													<option value="O">O</option>
												</select>
											</div>
											<div class="data box4 box-mds-6 box-sm-12">
												<h4>Tinggi Badan</h4>
												<input type="text" name="tinggi_siswa" >
											</div>
											<div class="data box4 box-mds-6 box-sm-12">
												<h4>Berat Badan</h4>
												<input type="text" name="berat_siswa">
											</div>

											<div class="data box6 box-sm-12">
												<h4>Anak ke</h4>
												<input type="number" name="anak_keberapa" id="anak_k">
											</div>
											<div class="data box6 box-sm-12">
												<h4>Yatim Piatu</h4>
												<input type="text" name="anak_yatim">
											</div>

											<div class="data box4 box-mds-12  box-sm-12">
												<h4>Jumlah Saudara Kandung</h4>
												<input type="number" name="jumlah_saudara_kandung" id="jumlah_saudara_k">
											</div>
											<div class="data box4 box-mds-12 box-sm-12">
												<h4>Jumlah Saudara Tiri</h4>
												<input type="number" name="jumlah_saudara_tiri" id="jumlah_saudara_t">
											</div>
											<div class="data box4 box-mds-12 box-sm-12">
												<h4>Jumlah Saudara Angkat</h4>
												<input type="number" name="jumlah_saudara_angkat" id="jumlah_saudara_a">
											</div>

											<div class="data box6 box-mds-6 box-sm-12">
												<h4>Jenis Tinggal</h4>
												<input type="text" name="alamat_tersebut" id="jenis_t">
											</div>
											<div class="data box6 box-mds-6  box-sm-12">
												<h4>Alamat Tinggal</h4>
												<input type="text" name="alamat" id="alamat_t">
											</div>

											<div class="data box6 box-mds-6 box-sm-12">
												<h4>Kelurahan</h4>
												<input type="text" name="kelurahan" id='kelurahan'>
											</div>
											<div class="data box6 box-mds-6 box-sm-12">
												<h4>Kecamatan</h4>
												<input type="text" name="kecamatan">
											</div>
											<div class="data box6 box-mds-6 box-sm-12">
												<h4>Kode Pos</h4>
												<input type="text" name="kodepos">
											</div>
											<div class="data box6 box-mds-6 box-sm-12">
												<h4>RT/RW</h4>
												<input type="text" name="rt_rw">
											</div>

											<div class="data box4 box-mds-6 box-sm-12">
												<h4>Penyakit Diderita</h4>
												<input type="text" name="penyakit_yang_pernah_diderita">
											</div>
											<div class="data box4 box-mds-6 box-sm-12">
												<h4>Kelainan Jasmani</h4>
												<input type="text" name="kelainan_jasmani">
											</div>
											<div class="data box4 box-mds-6 box-sm-12">
												<h4>Pernah di Rawat</h4>
												<input type="text" name="pernah_dirawat_di">
											</div>
										</div>
										<div class="row">
											<div class="data box8 box-mds-12 box-sm-12">
												<h4>NIK Siswa</h4>
												<input type="text" name="nik_siswa" id="nik_siswa">
															
												<h4>NIS</h4>
												<input type="text" name="nis" id="nis"> 
												<span id="avability_nis"></span>
													
												<h4>NISN</h4>
												<input type="text" name="nisn" id="nisn">

													
													
												<h4>Nomor Telephone</h4>
												<input type="text" name="nomor_telepon" id="no_telp">
											</div>
											<div class="data box4 box-mds-6 push-mds-3 box-sm-8 push-sm-2 foto">
												<div class="section-foto">
													<h4>Photo</h4>
													
													<div id="img_prev_def">
														<img src="../../asset/img/foto_siswa/default-avatar.png" width="100%" height="250px">
													</div>
													<div id="preview_img">
														
													</div>
													<input type="file" name="foto_siswa" id="foto_siswa">
												</div>
											</div>
										</div>
									</section>

									<section id="ayah">
										<h2>Biodata Ayah</h2>
										<p>Data harus benar agar tidak menjadi masalah di kemudian hari</p>

										<div class="row">
											<div class="data box12">
												<h4>NIK Ayah</h4>
												<input type="text" name="nik_ayah">
											</div>
										</div>

										<div class="row">
											
											<div class="data box6 box-sm-12">
												<h4>Nama depan Ayah</h4>
												<input type="text" name="nama_depan_ayah" id="nama_d_a">
											</div>
											
											<div class="data box6 box-sm-12">
												<h4>Nama Belakang Ayah</h4>
												<input type="text" name="nama_belakang_ayah" id="nama_b_a">
											</div>
										</div>	
										 <div class="row"> 
											<div class="data box5 box-mds-6 box-sm-12">
												<h4>Tahun lahir Ayah</h4>
												<select name="tanggal_lahir_ayah" id="tl_a">
													<option value="">Pilih Tahun</option>
													<?php 
														for($i = date('Y'); $i >= 1905; $i--){
															echo "<option value='$i'>$i</option>";
														}
													?>
												</select>
											</div>

											<div class="data box7 box-mds-6  box-sm-12">
												<h4>Agama Ayah</h4>
												<select name="agama_ayah" id="agama_a">
													<option value="">Pilih Agama</option>
													<option value="Islam">Islam</option>
													<option value="Kristen">Kristen</option>
													<option value="Hindu">Hindu</option>
													<option value="Budha">Budha</option>
													<option value="Konghucu">Konghucu</option>
												</select>
											</div>

											<div class="data box4 box-mds-6  box-sm-12">
												<h4>Kewarganegaraan Ayah</h4>
												<input type="text" name="kewarganegaraan_ayah" id="kewarganegaraan_a">
											</div>

											<div class="data box4 box-mds-6  box-sm-12">
												<h4>Ijazah Tinggi Ayah</h4>
												<input type="text" name="ijazah_tertinggi_ayah" id="ijazah_a">
											</div>
											
											<div class="data box4 box-mds-12  box-sm-12">
												<h4>Pekerjaaan Ayah</h4>
												<input type="text" name="pekerjaan_ayah" id="pekerjaan_a">
											</div>

											<div class="data box4 box-mds-12  box-sm-12">
												<h4>Penghasilan Perbulan Ayah</h4>
												<select name="penghasilan_perbulan_ayah" id="penghasilan_perbulan_a">
													<option value="">Pilih Penghasilan</option>
													<option value="Kurang dari Rp. 500,000">Kurang dari Rp. 500,000</option>
													<option value="Rp. 500,000 - Rp. 1,000,000">Rp. 500,000 - Rp. 1,000,000</option>
													<option value="Rp. 1,000,000 - Rp. 2,000,000">Rp. 1,000,000 - Rp. 2,000,000</option>
													<option value="Rp. 2,000,000 - Rp, 5,000,000">Rp. 2,000,000 - Rp, 5,000,000</option>
													<option value="Rp. 5,000,000 - Rp, 20,000,000">Rp. 5,000,000 - Rp, 20,000,000</option>
													<option value="Lebih Dari Rp, 20,000,000">Lebih Dari Rp, 20,000,000</option>
													<option value="Tidak Berpenghasilan">Tidak Berpenghasilan</option>
												</select>
											</div>

											<div class="data box4 box-mds-6  box-sm-12">
												<h4>Nomor telepon Ayah</h4>
												<input type="text" name="nomor_telepon_ayah" id="no_telp_a">
											</div>

											<div class="data box4 box-mds-6  box-sm-12">
												<h4>Riwayat Hidup Ayah</h4>
												<select name="riwayat_hidup_ayah" id="riwayat_hidup_a">
													<option value="">Pilih Opsi</option>
													<option value="Masih Hidup">Masih Hidup</option>
													<option value="meninggal">Meninggal</option>
												</select>
											</div>
										 </div>
										 <div class="row"> 
											<div class="data box12">
												<h4>Alamat Rumah Ayah</h4>
												<input type="text" name="alamat_rumah_ayah" id="alamat_rumah_a">
											</div>
										 </div>
									</section>

									<section id="ibu">
										<h2>Biodata Ibu</h2>
										<p>Data Harus Benar Agar Tidak Terjadi Masalah Di Kemudian Hari</p>

										<div class="row">
											<div class="data box12">
												<h4>NIK Ibu</h4>
												<input type="text" name="nik_ibu">
											</div>
										</div>

										<div class="row">
											<div class="data box6 box-sm-12"><h4>Nama Depan Ibu</h4><input type="text" name="nama_depan_ibu" id="nama_d_i"></div>
											<div class="data box6 box-sm-12"><h4>Nama belakang Ibu</h4><input type="text" name="nama_belakang_ibu" id="nama_b_i"></div>
										</div>
										<div class="row">
											<div class="data box5 box-mds-6  box-sm-12">
												<h4>Tahun Lahir Ibu</h4>
												<select name="tanggal_lahir_ibu" id="tl_i">
													<option value="">Pilih Tahun</option>
													<?php 
														for($i = date('Y'); $i >= 1905; $i--){
															echo "<option value='$i'>$i</option> <br/>";
														}
													?>
												</select>
											</div>	

											<div class="data box7 box-mds-6  box-sm-12">
												<h4>Agama Ibu</h4>
												<select name="agama_i" id="agama_i">
													<option value="">Pilih Agama</option>
													<option value="Islam">Islam</option>
													<option value="Kristen">Kristen</option>
													<option value="Hindu">Hindu</option>
													<option value="Budha">Budha</option>
													<option value="Konghucu">Konghucu</option>
												</select>
											</div>


											<div class="data box4 box-mds-6 box-sm-12">
												<h4>Kewarganegaraan Ibu</h4>
												<input type="text" name="kewarganegaraan_ibu" id="kewarganegaraan_i">
											</div>
											<div class="data box4 box-mds-6 box-sm-12">
												<h4>Ijazah Tertinggi Ibu</h4>
												<input type="text" name="ijazah_tertinggi_ibu" id="ijazah_i">
											</div>
											<div class="data box4 box-mds-12 box-sm-12">
												<h4>Pekerjaan Ibu</h4>
												<input type="text" name="pekerjaan_ibu" id="pekerjaan_i">
											</div>
											<div class="data box4 box-mds-12 box-sm-12">
												<h4>Penghasil Perbulaan Ibu</h4>
												<select name="penghasilan_perbulan_ibu" id="penghasilan_perbulan_i">
													<option value="">Pilih Penghasilan</option>
													<option value="Kurang dari Rp. 500,000">Kurang dari Rp. 500,000</option>
													<option value="Rp. 500,000 - Rp. 1,000,000">Rp. 500,000 - Rp. 1,000,000</option>
													<option value="Rp. 1,000,000 - Rp. 2,000,000">Rp. 1,000,000 - Rp. 2,000,000</option>
													<option value="Rp. 2,000,000 - Rp, 5,000,000">Rp. 2,000,000 - Rp, 5,000,000</option>
													<option value="Rp. 5,000,000 - Rp, 20,000,000">Rp. 5,000,000 - Rp, 20,000,000</option>
													<option value="Lebih Dari Rp, 20,000,000">Lebih Dari Rp, 20,000,000</option>
													<option value="Tidak Berpenghasilan">Tidak Berpenghasilan</option>
												</select>
											</div>

											<div class="data box4 box-mds-6 box-sm-12">
												<h4>Nomor Telepon Ibu</h4>
												<input type="text" name="nomor_telepon_ibu" id="no_telp_i">
												</div>
											<div class="data box4 box-mds-6 box-sm-12">
												<h4>Riwayat Hidup Ibu</h4>
												<select name="riwayat_hidup_ibu" id="riwayat_hidup_i">
													<option value="">Pilih Opsi</option>
													<option value="Masih Hidup">Masih Hidup</option>
													<option value="meninggal">Meninggal</option>
												</select>
											</div>
										</div>
										<div class="row">
											<div class="data box12">
												<h4>Alamat Rumah Ibu</h4>
												<input type="text" name="alamat_rumah_ibu" id="alamat_rumah_i">
											</div>
										</div>
									</section>

									<section id="wali">
										<h2>Biodata Wali</h2>
										<p>Data harus benar agar tidak menjadi masalah di kemudian hari</p>

										<div class="row">
											<div class="data box12">
												<h4>NIK Wali</h4>
												<input type="text" name="nik_wali">
											</div>
										</div>

										<div class="row">
											<div class="data box6 box-sm-12">
												<h4>Nama Depan Wali</h4>
												<input type="text" name="nama_depan_wali" id="nama_d_w">
											</div>
											<div class="data box6 box-sm-12">
												<h4>Nama Belakang Wali</h4>
												<input type="text" name="nama_belakang_wali" id="nama_b_w">
											</div>
										</div>
										<div class="row">
											<div class="data box5 box-mds-6 box-sm-12">
												<h4>Tahun Lahir Wali</h4>
												<select name="tanggal_lahir_wali">
													<option value="">Pilih Tahun</option>
													<?php 
														for($i = date('Y'); $i >= 1905; $i--){
															echo "<option value='$i'>$i</option>";
														}
													?>
												</select>
											</div>
											
											<div class="data box7  box-mds-6 box-sm-12">
												<h4>Agama Wali</h4>
												<select name="agama_w" id="agama_w">
													<option value="">Pilih Agama</option>
													<option value="Islam">Islam</option>
													<option value="Kristen">Kristen</option>
													<option value="Hindu">Hindu</option>
													<option value="Budha">Budha</option>
													<option value="Konghucu">Konghucu</option>
												</select>
											</div>

											<div class="data box4 box-mds-6 box-sm-12">
												<h4>Kewarganegaraan Wali</h4>
												<input type="text" name="kewarganegaraan_wali">
											</div>
											<div class="data box4 box-mds-6 box-sm-12">
												<h4>Ijazah Tertinggi Wali</h4>
												<input type="text" name="ijazah_tertinggi_wali">
											</div>
											<div class="data box4 box-mds-12 box-sm-12">
												<h4>Pekerjaan Wali</h4>
												<input type="text" name="pekerjaan_wali" id="pekerjaan_w">
											</div>

											<div class="data box4 box-mds-12 box-sm-12">
												<h4>Penghasilan Perbulan Wali</h4>
												<select  name="penghasilan_perbulan_wali">
													<option value="">Pilih Penghasilan</option>
													<option value="Kurang dari Rp. 500,000">Kurang dari Rp. 500,000</option>
													<option value="Rp. 500,000 - Rp. 1,000,000">Rp. 500,000 - Rp. 1,000,000</option>
													<option value="Rp. 1,000,000 - Rp. 2,000,000">Rp. 1,000,000 - Rp. 2,000,000</option>
													<option value="Rp. 2,000,000 - Rp, 5,000,000">Rp. 2,000,000 - Rp, 5,000,000</option>
													<option value="Rp. 5,000,000 - Rp, 20,000,000">Rp. 5,000,000 - Rp, 20,000,000</option>
													<option value="Lebih Dari Rp, 20,000,000">Lebih Dari Rp, 20,000,000</option>
													<option value="Tidak Berpenghasilan">Tidak Berpenghasilan</option>
												</select>
											</div>
											<div class="data box4 box-mds-6 box-sm-12">
												<h4>Nomor Telepon Wali</h4>
												<input type="text" name="nomor_telepon_wali">
											</div>
											<div class="data box4 box-mds-6 box-sm-12">
												<h4>Riwayat Hidup Wali</h4>
												<select name="riwayat_hidup_wali">
													<option value="">Pilih Opsi</option>
													<option value="Masih Hidup">Masih Hidup</option>
													<option value="meninggal">Meninggal</option>
												</select>
											</div>
										</div>
										<div class="row">	
											<div class="data box12">
												<h4>Alamat Rumah Wali</h4>
												<input type="text" name="alamat_rumah_wali" id="alamat_rumah_w">
											</div>
										</div>
									</section>

									<section id="sekolah">
										<h2>SEKOLAH</h2>
										<p>Data harus benar agar tidak menjadi masalah di kemudian hari</p>
										<div class="row">
											<div class="data box4 box-mds-6 box-sm-12">
												<h4>Tahun Masuk Siswa</h4>
												<select name="tahun_masuk_siswa" id="tahun_m_s">
													<option value="">Pilih Tahun</option>
													<?php 
														for($i = date('Y'); $i >= 1905; $i--){
															echo "<option value='$i'>$i</option>";
														}
													?>
												</select>

											</div>
											<div class="data box4 box-mds-6 box-sm-12">
												<h4>Terdaftar Pada Kelas</h4>
												<input type="text" name="terdaftar_pada_kelas" id="terdaftar_pada_kelas">
											</div>
											<div class="data box4 box-mds-12 box-sm-12">
												<h4>Menerima Beasiswa</h4>
												<select name="menerima_bea_siswa">
													<option value="">Pilih Opsi</option>
													<option value="Ya">Ya</option>
													<option value="Tidak">Tidak</option>
												</select>
											</div>
										</div>
										<div class="row">
											<div class="data box12">
												<h4>Nama Sekolah</h4>
												<input type="text" name="nama_sekolah" id="nama_sekolah">
												<h4>Tahun Ajaran</h4>
												<select name="tahun_ajaran" id="tahun_ajaran">
														<option value="">- PILIH TAHUN AJARAN SISWA -</option>
														<?php while($thnAjaran = mysqli_fetch_assoc($tahunAjaran)): ?>
															<option value="<?= $thnAjaran['id_thn_ajaran'] ?>"><?= $thnAjaran['tahun_ajaran'] ?></option>
														<?php endwhile; ?>
												</select>
											</div>
										</div>
										<div class="row">
											<div class="data box6 box-mds-12 box-sm-12">
												<h4>Kelas Saat ini</h4>
												<select name="id_kelas_saat_ini" id="kelas_saat_ini">
												<option value="">Pilih Kelas Siswa</option> 
													<?php 

														while($data_kelas = mysqli_fetch_assoc($kelas)){
																if ($data_kelas['nama_guru'] == '') {
																	echo strtoupper("<option value={$data_kelas['id_kelas']}>
																	 {$data_kelas['kelas']} {$data_kelas['nama_kelas']} - 
																	 {$data_kelas['nama_guru']} (BELUM ADA WALI KELAS)
																	 </option>");
																}else{
																	echo strtoupper("<option value={$data_kelas['id_kelas']}>
																	 {$data_kelas['kelas']} {$data_kelas['nama_kelas']} - 
																	 {$data_kelas['nama_guru']}
																	 </option>");
																}
															}

													 ?>
												</select>
											</div>
											<div class="data box6 box-mds-12 box-sm-12">
												<h4>Program Study</h4>
												<input type="text" name="program_study" id="program_study">
											</div>
										</div>

										<div class="row">
											<div class="data box6 box-mds-12 box-sm-12">
												<h4>Jarak Rumah Kesekolah</h4>
												<input type="text" name="jarak_rumah_dari_sekolah" id="jarak_rumah">
											</div>
											<div class="data box6 box-mds-12 box-sm-12">
												<h4>Alamat Sekolah</h4>
												<input type="text" name="alamat_sekolah" id="alamat_sekolah">
											</div>
										</div>
										<div class="row">
											
											<div class="data box6 box-mds-12 box-sm-12">
												<h4>Transportasi</h4>
												<select name="ke_sekolah_dengan" id="transportasi">
													<option value="">Pilih Transportasi</option>
													<option value="Jalan Kaki">Jalan Kaki</option>
													<option value="angkutan umum/bus/pete-pete">Angkutan umum/bus/pete-pete</option>
													<option value="Mobil/bus antar jemput">Mobil/bus antar jemput</option>
													<option value="Kereta Api">Kereta Api</option>
													<option value="Ojek">Ojek</option>
													<option value="Andong/bendi/sado/dokar/delman/becak">Andong/bendi/sado/dokar/delman/becak</option>
													<option value="Perahu penyebrangan/rakit/getek">Perahu penyebrangan/rakit/getek</option>
													<option value="Kuda">Kuda</option>
													<option value="Sepeda">Sepeda</option>
													<option value="Sepeda Motor">Sepeda Motor</option>
													<option value="Mobil Pribadi">Mobil Pribadi</option>
													<option value="Lainnya">Lainnya</option>
												</select>
											</div>

											<div class="data box6 box-mds-12 box-sm-12">
												<h4>Status Pendidikan</h4>
												<select name="status_pendidikan" id="status_pendidikan">
													<option value="">Pilih Status Pendidikan</option>
													<option value="Aktif">Aktif</option>
													<option value="Tidak Aktif">Tidak Aktif</option>
													<option value="Pindah">Pindah</option>
													<option value="Tamat">Tamat</option>
												</select>
												<div id="status_pend">

												</div>
												<div id="pemohon">
													
												</div>
											</div>
										</div>

										<hr class="l-form">
										<h2>Jenjang Sebelumnya</h2>
										<div class="row">
											<div class="data box4 box-mds-6 box-sm-12">
												<h4>Sekolah Asal</h4>
												<input type="text" name="asal_sekolah">
											</div>
											<div class="data box4 box-mds-6 box-sm-12">
												<h4>Lama Belajar</h4>
												<input type="text" name="lama_belajar" >
											</div>

											<div class="data box4 box-mds-6 box-sm-12">
												<h4>Tanggal dan Nomor STTB</h4>
												<input type="text" name="tanggal_dan_nomor_sttb">
											</div>

											<div class="data box4 box-mds-6 box-sm-12">
												<h4>Nomor Peserta UN SD/MI</h4>
												<input type="text" name="no_peserta_un">
											</div>
											<div class="data box4 box-mds-6 box-sm-12">
												<h4>Nomor Seri Ijazah SD/MI</h4>
												<input type="text" name="no_seri_ijazah">
											</div>
											<div class="data box4 box-mds-6 box-sm-12">
												<h4>Nomor SKHUN SD/MI</h4>
												<input type="text" name="no_skhun">
											</div>
										</div>
										<hr class="l-form">
										<h2>Pindahan</h2>
										<p>Isi bagian ini jika siswa pindahan</p>
										<div class="row">
										
											<div class="data box6 box-mds-12 box-sm-12">
												<h4>Pindahan dari Sekolah</h4>
												<input type="text" name="pindahan_dari_sekolah">
											</div>
											<div class="data box6 box-mds-12 box-sm-12">
												<h4>Tanggal Diterima Disekolah ini</h4>
												<input type="text" name="tanggal_diterima_disekolah_ini" class="tanggal">
											</div>
										</div>
										<div class="row">
											
											<div class="data box6 box-sm-12">
												<h4>Diterima Pada Kelas</h4>
												<input type="text" name="diterima_pada_kelas">
											</div>

											<div class="data box6 box-sm-12">
												<h4>Alasan Pindah</h4>
												<input type="text" name="alasan_pindah">
											</div>
										</div>
										
										<hr class="l-form">
										<h2>Tamat</h2>
										<p>Isi bagian ini jika siswa sudah menjadi alumni</p>
										<div class="row">
											<div class="data box6 box-mds-12 box-sm-12">
												<h4>Tahun Meninggalkan Sekolah</h4>
												<select name="tahun_meninggalkan_sekolah">
													<option value=""> Pilih Tahun </option>
													<?php 
														for($i = date('Y'); $i >= 1905; $i--){
															echo "<option value='$i'>$i</option>";
														}
													?>
												</select>
											</div>
											<div class="data box6 box-mds-12 box-sm-12">
												<h4>Tamat Belajar Tahun</h4>
												<select name="tamat_belajar_tahun" id="tamat_tahun">
													<option value="">Pilih Tahun</option>
													<?php 
														for($i = date('Y'); $i >= 1905; $i--){
															echo "<option value='$i'>$i</option>";
														}
													?>
												</select>
											</div>
										</div>
										<div class="row">
											<div class="data box6 box-mds-12 box-sm-12">
												<h4>Alasan</h4>
												<input type="text" name="alasan">
											</div>

											<div class="data box6 box-mds-12 box-sm-12">
												<h4>Tanggal dan Nomor STTB</h4>
												<input type="text" name="tanggal_dan_nomor_sttb_alumni">
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
	

	<script src="../../asset/js/main.js"></script>
	<script src="../../asset/js/page-form.js"></script> 
	<script src="../../asset/js/form.js" type="module"></script> 
	<script src="../../asset/js/valid_nis.js" type="module"></script>
	<script src="../../asset/js/check_zona.js"></script> 
	<script src='<?= $url; ?>/asset/js/cetak_ket.js'></script>

	<script type="text/javascript">
		var input = document.getElementsByTagName('input');
		for(i = 0; i < input.length;){
			input[i].setAttribute('autocomplete','off');
			i++;
		}
	</script>


	<script type="text/javascript">
		  $( function() {
		    $( ".tanggal" ).datepicker({
		      changeMonth: true,
		      changeYear: true,
		      dateFormat: 'dd-mm-yy',
		      yearRange:"1905:<?php date('Y') ?>"
		    });
		  } );
	</script>

</body>
</html>
