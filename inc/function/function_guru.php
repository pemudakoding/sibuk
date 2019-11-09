<?php





	//============================================================
	// ==============FUNCTION DATA GURU===========================
	//============================================================
	function tambah_data_guru($foto_guru){
		GLOBAL $koneksi;
		require_once "variable/variable_guru.php";
		$query 				= "INSERT INTO guru VALUES (
													NULL,
													'$username',
													'$password',
													'$nim_guru',
													'$foto_guru',
													'$nama_lengkap_guru',
													'$nama_depan_guru',
													'$nama_belakang_guru',
													'$mapel','$akses','guru')";
		return run_query($query);
	}


	function data_guru($limit){
		GLOBAL $koneksi;
		$query 	= "SELECT
							guru.id_guru,
							guru.nim,
							guru.foto_guru,
							guru.nama_guru,
							guru.nama_d_g,
							guru.nama_b_g,
					IF		(kelas.status_kelas = 'Alumni',NULL,kelas.nama_kelas) AS 'nama_kelas',
					IF		(kelas.status_kelas = 'Alumni',NULL,kelas.kelas) AS 'kelas',
					CASE 	kelas.status_kelas WHEN 'Alumni' THEN NULL END AS 'status_kelas',
							mapel.nama_mapel,
							wali_kelas.id_guru AS 'guru_in'
							
					FROM guru

					LEFT JOIN wali_kelas
					ON guru.id_guru = wali_kelas.id_guru

					LEFT JOIN kelas
					ON kelas.id_kelas = wali_kelas.id_kelas

					LEFT JOIN mapel
					ON guru.id_mapel = mapel.id_mapel
					WHERE 	(kelas.status_kelas IS NULL) 
					OR 		(guru.id_guru IN(SELECT id_guru from wali_kelas GROUP BY id_guru HAVING COUNT(*) < 2)) 
					OR 		(kelas.status_kelas IS NOT NULL AND kelas.status_kelas = 'Aktif') 
					ORDER BY guru.nama_guru asc, wali_kelas.id_wakel DESC   ".$limit;
		return query_get($query);
	}

	function search_data_guru($search){
		GLOBAL $koneksi;
	$query = "SELECT   	guru.nim,
						guru.foto_guru,
						guru.nama_guru,
						guru.nama_d_g,
						guru.nama_b_g,
				IF		(kelas.status_kelas = 'Alumni',NULL,kelas.nama_kelas) AS 'nama_kelas',
				IF		(kelas.status_kelas = 'Alumni',NULL,kelas.kelas) AS 'kelas',
				CASE 	kelas.status_kelas WHEN 'Alumni' THEN NULL END AS 'status_kelas',
						mapel.nama_mapel,
				FROM guru

				LEFT JOIN wali_kelas
				ON guru.id_guru = wali_kelas.id_guru

				LEFT JOIN kelas
				ON kelas.id_kelas = wali_kelas.id_kelas

				LEFT JOIN mapel
				ON guru.id_mapel = mapel.id_mapel

				WHERE 	((kelas.status_kelas IS NULL) 
				OR 		(guru.id_guru IN(SELECT id_guru from wali_kelas GROUP BY id_guru HAVING COUNT(*) < 2)) 
				OR 		(kelas.status_kelas IS NOT NULL AND kelas.status_kelas = 'Aktif'))
				AND		((guru.nama_guru    						LIKE '%$search%')
				OR      (guru.nim 									LIKE '$search%')
				OR      (guru.nama_d_g    							LIKE '$search%')
				OR      (guru.nama_b_g    							LIKE '$search%')
				OR 		(concat(kelas.kelas,' ',kelas.nama_kelas)  	LIKE '$search%')
				OR 		(kelas.kelas 								LIKE '$search%')
				OR    	(kelas.nama_kelas 							LIKE '$search%')
				OR      (mapel.nama_mapel							LIKE '$search%'))
				ORDER BY guru.nama_guru asc  LIMIT 9
				 ";
		return query_get($query);

	}

	function guru_no_kelas(){
		GLOBAL $koneksi;
		$query = "SELECT guru.nama_guru,guru.id_guru
				FROM guru
				LEFT JOIN wali_kelas
				ON guru.id_guru = wali_kelas.id_guru
				WHERE guru.id_guru NOT IN (SELECT id_guru FROM wali_kelas)";

		return query_get($query);
	}

	function detail_data_guru($column,$value){
		GLOBAL $koneksi;
		$query = "SELECT   *,
						   kelas.nama_kelas,
						   kelas.kelas,
						   kelas.status_kelas,
					       mapel.nama_mapel,
					       wali_kelas.id_guru AS 'id_guru_wakel'
				   FROM guru

			       LEFT JOIN wali_kelas
			       ON guru.id_guru = wali_kelas.id_guru

			       LEFT JOIN kelas
			       ON kelas.id_kelas = wali_kelas.id_kelas

			       JOIN mapel
			       ON guru.id_mapel = mapel.id_mapel
				   WHERE {$column} = '{$value}' ";
		return query_get($query);
	}

	function edit_data_guru($nim,$foto){
		GLOBAL $koneksi;
		require_once 'variable/variable_guru.php';

		$query = "UPDATE guru SET
								  nama_guru = '$nama_lengkap_guru' , nama_d_g = '$nama_depan_guru',
								  nama_b_g  = '$nama_belakang_guru', nim = {$nim_guru}, foto_guru = '$foto',
								  id_mapel = {$mapel},akses     = '$akses'
				  WHERE nim = '{$nim}'
				 ";

		return run_query($query);
	}

	function edit_data_guru_w_pw($nim,$foto){
		GLOBAL $koneksi;
		require_once 'variable/variable_guru.php';

		$query = "UPDATE guru SET password  = '$password',
								  nama_guru = '$nama_lengkap_guru' , nama_d_g = '$nama_depan_guru',
								  nama_b_g  = '$nama_belakang_guru', nim = {$nim_guru}, foto_guru = '$foto',
								  id_mapel = {$mapel},akses     = '$akses'
				  WHERE nim = '{$nim}'
				 ";

		return run_query($query);
	}

	function hapus_data_guru($nim){
		GLOBAL $koneksi;
		$query = "DELETE FROM guru WHERE nim = {$nim}";

		return run_query($query);
	}

	function cek_guru_nim($nim){
		GLOBAL $koneksi;

		$query = "SELECT nim FROM guru WHERE nim = {$nim}";

		return query_get($query);
	}


 ?>
