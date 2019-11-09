<?php 

//============================================================
// ==============FUNCTION DATA SISWA==========================
//============================================================
	
	function tambah_data_siswa($foto){
		GLOBAL $koneksi;
		require "variable/variable_siswa.php";

		$query = "INSERT INTO siswa VALUES(
								NULL,
								'$nis',
								'$nisn',
								'$nik_siswa',
								'$foto',
								'$nama_depan',
								'$nama_belakang',
								'$nama_panggilan',
								'$nama_sekolah',
								'$id_kelas_saat_ini',
								'$program_study',
								'$alamat_sekolah',
								'$jenis_kelamin',
								'$tempat_lahir',
								'$tanggal_lahir',
								'$agama',
								'$kewarganegaraan',
								'$anak_keberapa',
								'$jumlah_saudara_kandung',
								'$jumlah_saudara_tiri',
								'$jumlah_saudara_angkat',
								'$anak_yatim',
								'$bahasa_sehari_hari',
								'$alamat',
								'$nomor_telepon',
								'$alamat_tersebut',
								'$jarak_rumah_dari_sekolah',
								'$ke_sekolah_dengan',
								'$golongan_darah',
								'$kelurahan',
								'$kecamatan',
								'$kodepos',
								'$rtrw',
								'$penyakit_yang_pernah_diderita',
								'$pernah_dirawat_di',
								'$kelainan_jasmani',
								'$tinggi_siswa',
								'$berat_siswa',
								'$asal_sekolah',
								'$tanggal_dan_nomor_sttb',
								'$tanggal_dan_nomor_sttb_alumni',
								'$lama_belajar',
								'$no_peserta_un',
								'$no_seri_ijazah',
								'$no_skhun',
								'$pindahan_dari_sekolah',
								'$tanggal_diterima_disekolah_ini',
								'$diterima_pada_kelas',
								'$alasan_pindah',
								'$alasan_siswa_pindah',
								'$nik_ayah',
								'$nama_depan_ayah',
								'$nama_belakang_ayah',
								'$tanggal_lahir_ayah',
								'$agama_ayah',
								'$kewarganegaraan_ayah',
								'$ijazah_tertinggi_ayah',
								'$pekerjaan_ayah',
								'$penghasilan_perbulan_ayah',
								'$alamat_rumah_ayah',
								'$nomor_telepon_ayah',
								'$riwayat_hidup_ayah',
								'$nik_ibu',
								'$nama_depan_ibu',
								'$nama_belakang_ibu',
								'$tanggal_lahir_ibu',
								'$agama_ibu',
								'$kewarganegaraan_ibu',
								'$ijazah_tertinggi_ibu',
								'$pekerjaan_ibu',
								'$penghasilan_perbulan_ibu',
								'$alamat_rumah_ibu',
								'$nomor_telepon_ibu',
								'$riwayat_hidup_ibu',
								'$nik_wali',
								'$nama_depan_wali',
								'$nama_belakang_wali',
								'$tanggal_lahir_wali',
								'$agama_wali',
								'$kewarganegaraan_wali',
								'$ijazah_tertinggi_wali',
								'$pekerjaan_wali',
								'$penghasilan_perbulan_wali',
								'$alamat_rumah_wali',
								'$nomor_telepon_wali',
								'$riwayat_hidup_wali',
								'$tahun_masuk_siswa',
								'$terdaftar_pada_kelas',
								'$menerima_bea_siswa',
								'$tahun_meninggalkan_sekolah',
								'$alasan',
								'$tamat_belajar_tahun',
								'$status_pendidikan',
								'$tahun_ajaran'
							) ";
							

		return run_query($query);
	}

	function data_siswa($status,$limit){
		GLOBAL $koneksi;
		$query = "SELECT *, kelas.nama_kelas, kelas.kelas
				  FROM siswa
				  LEFT JOIN kelas
				  ON siswa.id_kelas = kelas.id_kelas  

				  WHERE status_pendidikan = '$status' AND kelas.status_kelas = 'Aktif'
				  ORDER BY kelas.kelas desc,kelas.nama_kelas asc,siswa.nama_depan asc ".$limit;
		return query_get($query);
	}


	function search_data_siswa($status,$search){
		GLOBAL $koneksi;

		$query = "SELECT siswa.nis,siswa.foto_siswa,siswa.nama_depan,siswa.nama_belakang,siswa.nama_sekolah,
						siswa.status_pendidikan,
						kelas.nama_kelas, kelas.kelas

					FROM siswa
					LEFT JOIN kelas
					ON siswa.id_kelas = kelas.id_kelas 


					WHERE 
					(
						(concat(siswa.nama_depan,' ',siswa.nama_belakang)	LIKE '$search%') 
						OR    (siswa.nama_depan 									LIKE '%$search%')
						OR    (siswa.nama_belakang 								LIKE '%$search%')
						OR 	(siswa.nis 											LIKE '$search%')
						OR 	(concat(kelas.kelas,' ',kelas.nama_kelas)  			LIKE '$search%')
						OR 	(kelas.kelas 										LIKE '$search%')
						OR    (kelas.nama_kelas 									LIKE '$search%')
					)
					AND
					(  
						status_pendidikan  = '$status' 
					)
					AND 
					(
						kelas.status_kelas = 'Aktif'
					)
					ORDER BY kelas.kelas desc,kelas.nama_kelas asc,siswa.nama_depan asc LIMIT 9";

		return query_get($query);
	}


	function detail_data_siswa($column,$value){
		GLOBAL $koneksi;
		$query = "SELECT * 
				  FROM siswa
				  LEFT JOIN kelas
				  ON   siswa.id_kelas = kelas.id_kelas
				  WHERE {$column} = '{$value}' 
				  ORDER BY kelas.nama_kelas ASC, siswa.nama_depan ASC;
				  ";
		
		return query_get($query);
	}

	//FOR CHART ONLY
	function detail_data_siswa_aktif($column,$value){
		GLOBAL $koneksi;
		$query = "SELECT * 
				  FROM siswa
				  LEFT JOIN kelas
				  ON   siswa.id_kelas = kelas.id_kelas 
				  WHERE {$column} = '{$value}' AND status_pendidikan = 'Aktif' AND kelas.status_kelas = 'Aktif' 
				  ORDER BY kelas.nama_kelas ASC, siswa.nama_depan ASC;
				  ";

		return query_get($query);
	}
	function detail_data_jk($value1,$jk){
		GLOBAL $koneksi;

		$query = "SELECT siswa.jenis_kelamin
				  FROM siswa
				  JOIN kelas
				  ON siswa.id_kelas = kelas.id_kelas
          WHERE kelas.id_kelas = $value1 AND siswa.jenis_kelamin = '$jk' 
				  AND status_pendidikan = 'aktif'
					
				";
		return query_get($query);
	}

	function detail_kelas_jk($value1,$jk){
		GLOBAL $koneksi;

		$query = "SELECT siswa.jenis_kelamin
					FROM siswa
					JOIN kelas
					ON siswa.id_kelas = kelas.id_kelas
					WHERE kelas.kelas = $value1  AND siswa.jenis_kelamin = '$jk'
					AND status_pendidikan = 'aktif' AND kelas.status_kelas = 'Aktif'
					
				";
		return query_get($query);
	}

	function detail_kelas_agama($value1,$agama){
		GLOBAL $koneksi;

		$query = "SELECT siswa.jenis_kelamin
					FROM siswa
					JOIN kelas
					ON siswa.id_kelas = kelas.id_kelas
					WHERE kelas.kelas = $value1  AND siswa.agama = '$agama' 
					AND status_pendidikan = 'aktif'  AND kelas.status_kelas = 'Aktif'
					
				";
		return query_get($query);
	}

	function agamaSiswaKelas($id_kelas,$agama){
		GLOBAL $koneksi;
		$id_kelas = mysqli_real_escape_string($koneksi,strip_tags($id_kelas));
		$agama 	  = mysqli_real_escape_string($koneksi,strip_tags($agama));
		$query = "SELECT count(siswa.id_siswa) as 'jumlah' FROM siswa WHERE id_kelas = '$id_kelas' AND agama = '$agama' AND status_pendidikan = 'Aktif' ";
		return query_get($query);
	}

	function edit_data_siswa($nis_siswa,$foto){
		GLOBAL $koneksi;
		require "variable/variable_siswa.php";
		if ($foto_siswa == '') {
			$foto_siswa = $data['foto_siswa'];
		}

		$query = "UPDATE siswa SET nis  = '$nis', 
								nisn           			= '$nisn', 
								nik_siswa						= '$nik_siswa',
								foto_siswa     			= '$foto', 
								nama_depan     			= '$nama_depan',
								nama_belakang  			= '$nama_belakang',
								nama_panggilan 			= '$nama_panggilan',
								nama_sekolah   			= '$nama_sekolah', 
								id_kelas 	  				= '$id_kelas_saat_ini', 
								program_study  			= '$program_study', 
								alamat_sekolah 			= '$alamat_sekolah',
								jenis_kelamin  			= '$jenis_kelamin',
								tempat_lahir   			= '$tempat_lahir',
								tanggal_lahir  			= '$tanggal_lahir',
								agama          			= '$agama',
								kewarganegaraan			= '$kewarganegaraan',
								anak_keberapa  			= '$anak_keberapa',

								jumlah_saudara_kandung   = '$jumlah_saudara_kandung',
								jumlah_saudara_tiri      = '$jumlah_saudara_tiri',
								jumlah_saudara_angkat    = '$jumlah_saudara_angkat',

								anak_yatim						= '$anak_yatim',
								bahasa_sehari_hari		= '$bahasa_sehari_hari',
								alamat 								= '$alamat',
								nomor_telepon 				= '$nomor_telepon',
								alamat_tersebut				= '$alamat_tersebut',

								jarak_rumah_dari_sekolah 	= '$jarak_rumah_dari_sekolah',
								ke_sekolah_dengan 				= '$ke_sekolah_dengan',
								golongan_darah						= '$golongan_darah',
								kelurahan									= '$kelurahan', 
								kecamatan									= '$kecamatan',
								kodepos				    				= '$kodepos',
								rt_rw											= '$rtrw',

								penyakit_yang_pernah_diderita = '$penyakit_yang_pernah_diderita',
								pernah_dirawat_di			 				= '$pernah_dirawat_di',
								kelainan_jasmani 			 				= '$kelainan_jasmani',
								tinggi_siswa 				 					= '$tinggi_siswa',
								berat_siswa 					 				= '$berat_siswa',
								asal_sekolah 									= '$asal_sekolah',
								tanggal_dan_nomor_sttb		 		= '$tanggal_dan_nomor_sttb',
								tanggal_dan_no_sttb_alumni    = '$tanggal_dan_nomor_sttb_alumni',
								lama_belajar 				 					= '$lama_belajar',
								no_peserta_un				 					= '$no_peserta_un',
								no_seri_ijazah				 				= '$no_seri_ijazah',
								no_skhun						 					= '$no_skhun',
								pindahan_dari_sekolah 		 		= '$pindahan_dari_sekolah',
								tanggal_diterima_disekolah_ini= '$tanggal_diterima_disekolah_ini',
								diterima_pada_kelas 			 		= '$diterima_pada_kelas',
								alasan_pindah 			 				  = '$alasan_pindah',
								alasan_siswa_pindah 			 		= '$alasan_siswa_pindah',

								nik_ayah									= '$nik_ayah',
								nama_depan_ayah						= '$nama_depan_ayah',
								nama_belakang_ayah				= '$nama_belakang_ayah',
								tanggal_lahir_ayah				= '$tanggal_lahir_ayah',
								agama_ayah								= '$agama_ayah',
								kewarganegaraan_ayah			= '$kewarganegaraan_ayah',
								ijazah_tertinggi_ayah			= '$ijazah_tertinggi_ayah',
								pekerjaan_ayah						= '$pekerjaan_ayah',
								penghasilan_perbulan_ayah	= '$penghasilan_perbulan_ayah',
								alamat_rumah_ayah					= '$alamat_rumah_ayah',
								nomor_telepon_ayah				= '$nomor_telepon_ayah',
								riwayat_hidup_ayah				= '$riwayat_hidup_ayah',

								nik_ibu										= '$nik_ibu',
								nama_depan_ibu						= '$nama_depan_ibu',
								nama_belakang_ibu					= '$nama_belakang_ibu',
								tanggal_lahir_ibu					= '$tanggal_lahir_ibu',
								agama_ibu									= '$agama_ibu',
								kewarganegaraan_ibu				= '$kewarganegaraan_ibu',
								ijazah_tertinggi_ibu			= '$ijazah_tertinggi_ibu',
								pekerjaan_ibu							= '$pekerjaan_ibu',
								penghasilan_perbulan_ibu	= '$penghasilan_perbulan_ibu',
								alamat_rumah_ibu					= '$alamat_rumah_ibu',
								nomor_telepon_ibu					= '$nomor_telepon_ibu',
								riwayat_hidup_ibu					= '$riwayat_hidup_ibu',
								
								nik_wali									= '$nik_wali',
								nama_depan_wali						= '$nama_depan_wali',
								nama_belakang_wali				= '$nama_belakang_wali',
								tanggal_lahir_wali				= '$tanggal_lahir_wali',
								agama_wali								= '$agama_wali',
								kewarganegaraan_wali			= '$kewarganegaraan_wali',
								ijazah_tertinggi_wali			= '$ijazah_tertinggi_wali',
								pekerjaan_wali						= '$pekerjaan_wali',
								penghasilan_perbulan_wali	= '$penghasilan_perbulan_wali',
								alamat_rumah_wali					= '$alamat_rumah_wali',
								nomor_telepon_wali				= '$nomor_telepon_wali',
								riwayat_hidup_wali				= '$riwayat_hidup_wali',

								tahun_masuk_siswa					= '$tahun_masuk_siswa',
								terdaftar_pada_kelas			= '$terdaftar_pada_kelas',
								menerima_bea_siswa				= '$menerima_bea_siswa',
								tahun_meninggalkan_sekolah= '$tahun_meninggalkan_sekolah',
								alasan 										= '$alasan',
								tamat_belajar_tahun				= '$tamat_belajar_tahun',
								status_pendidikan					= '$status_pendidikan',
								id_tahun_ajaran						= '$tahun_ajaran'

								WHERE nis = '$nis_siswa'
								";
	    return run_query($query);
	}

	function hapus_data_siswa($nis){
		GLOBAL $koneksi;
		$query = "DELETE FROM siswa WHERE nis = '$nis'";

		return run_query($query);
	}


	/** SECTION HISTORY PRINT */
	function add_history_print($nis,$nisn,$id_user)
	{
		GLOBAL $koneksi;
		$query = "INSERT INTO history_cetak_kpi VALUES (null,'$nis','$nisn',$id_user)";

		return run_query($query);
	}
	
	function get_history_print($nis)
	{
		GLOBAL $koneksi;
		$query = "SELECT siswa.nis,
						users_sibuk.nama_depan,users_sibuk.nama_belakang
						FROM history_cetak_kpi

						JOIN siswa
						ON history_cetak_kpi.nis = siswa.nis
						JOIN users_sibuk
						ON history_cetak_kpi.id_user = users_sibuk.id_user
						
						WHERE siswa.nis = '$nis'
						ORDER BY history_cetak_kpi.id_cetak DESC LIMIT 1";

		return query_get($query);
	}



	/*
		PARSE NAME
	*/

	
	function pars_name($name,$clm_name_d,$clm_name_b)
	{
		GLOBAL $data;
		$nama   = preg_replace("/[-]+/", "", $name);
		$d_nama = $data[$clm_name_d]." ".$data[$clm_name_b];
		$d_nama = strtolower(preg_replace('/[(,|\-|.|\s|\')]+/','',$d_nama));

		if ($d_nama != $nama) return true;
		else return false;
	}

	function parse_name_url($first_name,$last_name){
		GLOBAL $data;

		$nama  = $data[$first_name]." ".$data[$last_name];
		$nama  = strtolower(preg_replace("/[(\s|\-|,|.|\')+]+/", '-', $nama));
		$nama  = preg_replace('/-(-)/', '-', $nama);

		return $nama;
	}

	function simple_pars_name($name){
		GLOBAL $data;
		
		$nama  = $data['nama_mapel'];
		$nama  = strtolower(str_replace(" ", '-', $nama));

		return $nama;
	}

	/**
	 * Psb
	 */
	
	function checkPSB(){
		if(stristr($_POST['nis'], 'PSB') != ''){
				$user = mysqli_fetch_assoc(cek_user($_SESSION['username']));
									$_SESSION['psb'] = ['nis'	 => $_POST['nis'],
									'user'=> ['nama_depan'		 => $user['nama_depan'],  'nama_belakang' => $user['nama_belakang']],
									'nama_lengkap' 				 => $_POST['nama_depan']." ".$_POST['nama_belakang'],
									'ttl' 						 => $_POST['tanggal_lahir'],
									'nik' 						 => $_POST['nik_siswa'],
									'jk'  						=> $_POST['jenis_kelamin'],
									'agama' 					=> $_POST['agama'],
									'sekolah' 					=> $_POST['asal_sekolah'],
									'nama_ayah' 				=> $_POST['nama_depan_ayah'] . " ".$_POST['nama_belakang_ayah'],
									'nama_ibu' 					=> $_POST['nama_belakang_ibu']." ".$_POST['nama_belakang_ibu'],
									'alamat' 					=> $_POST['alamat'],
									'kecamatan' 				=> $_POST['kecamatan'],
									'kelurahan' 				=> $_POST['kelurahan']
									];							
			}

	}

?>
