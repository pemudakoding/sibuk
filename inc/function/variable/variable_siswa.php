<?php 
		
		//==================================
		//==============VARIABLE SISWA======
		//==================================

		$nik_siswa						= mysqli_real_escape_string($koneksi,strip_tags( $_POST['nik_siswa']));
		$nis							= mysqli_real_escape_string($koneksi,strip_tags( $_POST['nis']));
		$nisn							= mysqli_real_escape_string($koneksi,strip_tags( $_POST['nisn']));


		//Bagian Foto
		$foto_siswa		    			= mysqli_real_escape_string($koneksi,strip_tags( $_FILES['foto_siswa']['name']));	
		$foto_path						= $_FILES['foto_siswa']['tmp_name'];
		/*$path_file						=;*/


		$nama_depan 					= mysqli_real_escape_string($koneksi,strip_tags( trim($_POST['nama_depan']) ) );
		$nama_belakang 					= mysqli_real_escape_string($koneksi,strip_tags( trim($_POST['nama_belakang']) ) );
		$nama_panggilan 				= mysqli_real_escape_string($koneksi,strip_tags( trim($_POST['nama_panggilan']) ) );

		//sekolah
		$nama_sekolah 					= mysqli_real_escape_string($koneksi,strip_tags( $_POST['nama_sekolah']));
		$id_kelas_saat_ini  			= mysqli_real_escape_string($koneksi,strip_tags( $_POST['id_kelas_saat_ini']));
		$program_study 					= mysqli_real_escape_string($koneksi,strip_tags( $_POST['program_study']));
		$alamat_sekolah 				= mysqli_real_escape_string($koneksi,strip_tags( $_POST['alamat_sekolah']));
		//end sekolah

		$jenis_kelamin 					= mysqli_real_escape_string($koneksi,strip_tags( $_POST['jenis_kelamin']));
		$tempat_lahir	    			= mysqli_real_escape_string($koneksi,strip_tags( $_POST['tempat_lahir']));
		$tanggal_lahir	    			= mysqli_real_escape_string($koneksi,strip_tags( $_POST['tanggal_lahir']));
		$agama 							= mysqli_real_escape_string($koneksi,strip_tags( $_POST['agama']));
		$kewarganegaraan 				= mysqli_real_escape_string($koneksi,strip_tags( $_POST['kewarganegaraan']));
		$anak_keberapa 					= mysqli_real_escape_string($koneksi,strip_tags( $_POST['anak_keberapa']));
		$jumlah_saudara_kandung 		= mysqli_real_escape_string($koneksi,strip_tags( $_POST['jumlah_saudara_kandung']));
		$jumlah_saudara_tiri 			= mysqli_real_escape_string($koneksi,strip_tags( $_POST['jumlah_saudara_tiri']));
		$jumlah_saudara_angkat 	 		= mysqli_real_escape_string($koneksi,strip_tags( $_POST['jumlah_saudara_angkat']));
		$anak_yatim						= mysqli_real_escape_string($koneksi,strip_tags( $_POST['anak_yatim']));
		$bahasa_sehari_hari				= mysqli_real_escape_string($koneksi,strip_tags( $_POST['bahasa_sehari_hari']));
		$alamat 						= mysqli_real_escape_string($koneksi,strip_tags( $_POST['alamat']));
		$nomor_telepon					= mysqli_real_escape_string($koneksi,strip_tags( $_POST['nomor_telepon']));
		$alamat_tersebut				= mysqli_real_escape_string($koneksi,strip_tags( $_POST['alamat_tersebut']));
		$jarak_rumah_dari_sekolah 		= mysqli_real_escape_string($koneksi,strip_tags( $_POST['jarak_rumah_dari_sekolah']));
		$ke_sekolah_dengan				= mysqli_real_escape_string($koneksi,strip_tags( $_POST['ke_sekolah_dengan']));
		$golongan_darah 				= mysqli_real_escape_string($koneksi,strip_tags( $_POST['golongan_darah']));
		$penyakit_yang_pernah_diderita	= mysqli_real_escape_string($koneksi,strip_tags( $_POST['penyakit_yang_pernah_diderita']));
		$pernah_dirawat_di				= mysqli_real_escape_string($koneksi,strip_tags( $_POST['pernah_dirawat_di']));
		$kelainan_jasmani				= mysqli_real_escape_string($koneksi,strip_tags( $_POST['kelainan_jasmani']));
		$tinggi_siswa 					= mysqli_real_escape_string($koneksi,strip_tags( $_POST['tinggi_siswa']));
		$berat_siswa 					= mysqli_real_escape_string($koneksi,strip_tags( $_POST['berat_siswa']));

		$kelurahan						= mysqli_real_escape_string($koneksi,strip_tags( $_POST['kelurahan']));
		$kecamatan						= mysqli_real_escape_string($koneksi,strip_tags( $_POST['kecamatan']));
		$kodepos						= mysqli_real_escape_string($koneksi,strip_tags( $_POST['kodepos']));
		$rtrw							= mysqli_real_escape_string($koneksi,strip_tags( $_POST['rt_rw']));



		//ayah
		$nik_ayah 						= mysqli_real_escape_string($koneksi,strip_tags( $_POST['nik_ayah']));
		$nama_depan_ayah 				= mysqli_real_escape_string($koneksi,strip_tags( $_POST['nama_depan_ayah']));
		$nama_belakang_ayah 			= mysqli_real_escape_string($koneksi,strip_tags( $_POST['nama_belakang_ayah']));
		$tanggal_lahir_ayah 			= mysqli_real_escape_string($koneksi,strip_tags( $_POST['tanggal_lahir_ayah']));
		$agama_ayah 					= mysqli_real_escape_string($koneksi,strip_tags( $_POST['agama_ayah']));
		$kewarganegaraan_ayah			= mysqli_real_escape_string($koneksi,strip_tags( $_POST['kewarganegaraan_ayah']));
		$ijazah_tertinggi_ayah 			= mysqli_real_escape_string($koneksi,strip_tags( $_POST['ijazah_tertinggi_ayah']));
		$pekerjaan_ayah 				= mysqli_real_escape_string($koneksi,strip_tags( $_POST['pekerjaan_ayah']));
		$penghasilan_perbulan_ayah 		= mysqli_real_escape_string($koneksi,strip_tags( $_POST['penghasilan_perbulan_ayah']));
		$alamat_rumah_ayah 				= mysqli_real_escape_string($koneksi,strip_tags( $_POST['alamat_rumah_ayah']));
		$nomor_telepon_ayah 			= mysqli_real_escape_string($koneksi,strip_tags( $_POST['nomor_telepon_ayah']));
		$riwayat_hidup_ayah 			= mysqli_real_escape_string($koneksi,strip_tags( $_POST['riwayat_hidup_ayah']));
		//end ayah

		//ibu
		$nik_ibu 						= mysqli_real_escape_string($koneksi,strip_tags( $_POST['nik_ibu']));
		$nama_depan_ibu					= mysqli_real_escape_string($koneksi,strip_tags( $_POST['nama_depan_ibu']));
		$nama_belakang_ibu 				= mysqli_real_escape_string($koneksi,strip_tags( $_POST['nama_belakang_ibu']));
		$tanggal_lahir_ibu 				= mysqli_real_escape_string($koneksi,strip_tags( $_POST['tanggal_lahir_ibu']));
		$agama_ibu						= mysqli_real_escape_string($koneksi,strip_tags( $_POST['agama_i']));
		$kewarganegaraan_ibu			= mysqli_real_escape_string($koneksi,strip_tags( $_POST['kewarganegaraan_ibu']));
		$ijazah_tertinggi_ibu 			= mysqli_real_escape_string($koneksi,strip_tags( $_POST['ijazah_tertinggi_ibu']));
		$pekerjaan_ibu 					= mysqli_real_escape_string($koneksi,strip_tags( $_POST['pekerjaan_ibu']));
		$penghasilan_perbulan_ibu 		= mysqli_real_escape_string($koneksi,strip_tags( $_POST['penghasilan_perbulan_ibu']));
		$alamat_rumah_ibu				= mysqli_real_escape_string($koneksi,strip_tags( $_POST['alamat_rumah_ibu']));
		$nomor_telepon_ibu 				= mysqli_real_escape_string($koneksi,strip_tags( $_POST['nomor_telepon_ibu']));
		$riwayat_hidup_ibu 				= mysqli_real_escape_string($koneksi,strip_tags( $_POST['riwayat_hidup_ibu']));
		//end ibu

		//wali
		$nik_wali 						= mysqli_real_escape_string($koneksi,strip_tags( $_POST['nik_wali']));
		$nama_depan_wali 				= mysqli_real_escape_string($koneksi,strip_tags( $_POST['nama_depan_wali']));
		$nama_belakang_wali 			= mysqli_real_escape_string($koneksi,strip_tags( $_POST['nama_belakang_wali']));
		$tanggal_lahir_wali 			= mysqli_real_escape_string($koneksi,strip_tags( $_POST['tanggal_lahir_wali']));
		$agama_wali 					= mysqli_real_escape_string($koneksi,strip_tags( $_POST['agama_w']));
		$kewarganegaraan_wali 			= mysqli_real_escape_string($koneksi,strip_tags( $_POST['kewarganegaraan_wali']));
		$ijazah_tertinggi_wali			= mysqli_real_escape_string($koneksi,strip_tags( $_POST['ijazah_tertinggi_wali']));
		$pekerjaan_wali 				= mysqli_real_escape_string($koneksi,strip_tags( $_POST['pekerjaan_wali']));
		$penghasilan_perbulan_wali 		= mysqli_real_escape_string($koneksi,strip_tags( $_POST['penghasilan_perbulan_wali']));
		$alamat_rumah_wali 				= mysqli_real_escape_string($koneksi,strip_tags( $_POST['alamat_rumah_wali']));
		$nomor_telepon_wali 			= mysqli_real_escape_string($koneksi,strip_tags( $_POST['nomor_telepon_wali']));
		$riwayat_hidup_wali 			= mysqli_real_escape_string($koneksi,strip_tags( $_POST['riwayat_hidup_wali']));
		//end wali

		

		//sekolah
		$tahun_masuk_siswa				= mysqli_real_escape_string($koneksi,strip_tags( $_POST['tahun_masuk_siswa']));
		$terdaftar_pada_kelas 			= mysqli_real_escape_string($koneksi,strip_tags( $_POST['terdaftar_pada_kelas']));
		$menerima_bea_siswa 			= mysqli_real_escape_string($koneksi,strip_tags( $_POST['menerima_bea_siswa']));
		$tahun_ajaran 					= mysqli_real_escape_string($koneksi,strip_tags( $_POST['tahun_ajaran']));



		//Jenjang Sebelumnya
		$asal_sekolah 					= mysqli_real_escape_string($koneksi,strip_tags( $_POST['asal_sekolah']));
		$tanggal_dan_nomor_sttb 		= mysqli_real_escape_string($koneksi,strip_tags( $_POST['tanggal_dan_nomor_sttb']));
		$tanggal_dan_nomor_sttb_alumni 	= mysqli_real_escape_string($koneksi,strip_tags( $_POST['tanggal_dan_nomor_sttb_alumni']));
		$lama_belajar 					= mysqli_real_escape_string($koneksi,strip_tags( $_POST['lama_belajar']));
		$no_peserta_un					= mysqli_real_escape_string($koneksi,strip_tags( $_POST['no_peserta_un']));
		$no_seri_ijazah					= mysqli_real_escape_string($koneksi,strip_tags( $_POST['no_seri_ijazah']));
		$no_skhun						= mysqli_real_escape_string($koneksi,strip_tags( $_POST['no_skhun']));

		//Pindahan
		$pindahan_dari_sekolah			= mysqli_real_escape_string($koneksi,strip_tags( $_POST['pindahan_dari_sekolah']));
		$tanggal_diterima_disekolah_ini = mysqli_real_escape_string($koneksi,strip_tags( $_POST['tanggal_diterima_disekolah_ini']));
		$diterima_pada_kelas 			= mysqli_real_escape_string($koneksi,strip_tags( $_POST['diterima_pada_kelas']));
		$alasan_pindah 					= mysqli_real_escape_string($koneksi,strip_tags( $_POST['alasan_pindah']));
		
		if(!isset($_POST['alasan_siswa_pindah']))
		{
			$alasan_siswa_pindah 			= '';
		}else{
			$alasan_siswa_pindah 			= mysqli_real_escape_string($koneksi,strip_tags( $_POST['alasan_siswa_pindah']));
		}

		//TAMAT
		$tahun_meninggalkan_sekolah		= mysqli_real_escape_string($koneksi,strip_tags( $_POST['tahun_meninggalkan_sekolah']));
		$alasan 						= mysqli_real_escape_string($koneksi,strip_tags( $_POST['alasan']));
		$tamat_belajar_tahun			= mysqli_real_escape_string($koneksi,strip_tags( $_POST['tamat_belajar_tahun']));
		$status_pendidikan	 			= mysqli_real_escape_string($koneksi,strip_tags( $_POST['status_pendidikan']));

		//end sekolah

	
?>