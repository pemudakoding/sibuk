<?php 
	
	//============================================================
	// ==============FUNCTION DATA KELAS==========================
	//============================================================

	function data_kelas($limit){
		GLOBAL $koneksi;
		$query 	= "SELECT  kelas.id_kelas,
						   kelas.kelas,
						   guru.nama_guru,
						   kelas.nama_kelas       
				   FROM guru
			       
			       JOIN wali_kelas 
			       ON guru.id_guru = wali_kelas.id_guru
			       
			       RIGHT JOIN kelas 
			       ON kelas.id_kelas = wali_kelas.id_kelas
				   WHERE kelas.status_kelas = 'Aktif'
			       ORDER BY kelas.kelas ASC, kelas.nama_kelas ASC
			        ".$limit;
		return query_get($query);
	}

	function search_data_kelas($search){
		GLOBAL $koneksi;
		$query = "SELECT   	kelas.id_kelas,
							kelas.kelas,
							kelas.nama_kelas,
							guru.nama_guru,  
							guru.nama_d_g,
							guru.nama_b_g    
				FROM guru
				
				JOIN wali_kelas 
				ON guru.id_guru = wali_kelas.id_guru
				
				RIGHT JOIN kelas 
				ON kelas.id_kelas = wali_kelas.id_kelas
				WHERE (
							(concat(kelas.kelas,' ',kelas.nama_kelas) LIKE '$search%')
						OR (kelas.kelas 								LIKE '$search%')
						OR (kelas.nama_kelas 						   	LIKE '$search%')
						OR (guru.nama_guru 							   	LIKE '$search%')
						OR (guru.nama_d_g							   	LIKE '$search%')
						OR (guru.nama_b_g							   	LIKE '$search%') 
				)
				AND (status_kelas = 'Aktif' )
					

				ORDER BY kelas.kelas ASC, kelas.nama_kelas ASC LIMIT 9";
	return query_get($query);
	}

	
	function tambah_data_kelas(){
		GLOBAL $koneksi;
		require_once "variable/variable_kelas.php";
		$query = "INSERT INTO kelas VALUES(NULL,{$tingkat},'$nama_kelas','Aktif')";

		return run_query($query);
	}

	function hapus_data_kelas($kelas){
		GLOBAL $koneksi;
		$query = "DELETE FROM kelas WHERE id_kelas = {$kelas}";
		
		return run_query($query);
	}


	

	function kelas_siswa($nis){
		GLOBAL $koneksi;
		$query = "SELECT siswa.nama_depan,

						kelas.id_kelas,
						kelas.kelas,
						kelas.nama_kelas,
					        
					    guru.nama_guru
				        
				FROM siswa 

				RIGHT JOIN kelas
				ON  kelas.id_kelas = siswa.id_kelas

				LEFT JOIN wali_kelas
				ON wali_kelas.id_kelas = kelas.id_kelas

				LEFT JOIN guru
				ON guru.id_guru = wali_kelas.id_guru

				WHERE nis = '$nis'";
				
		return query_get($query);
	}


	function detail_data_kelas($kelas){
		GLOBAL $koneksi;

		$query = "	SELECT kelas.id_kelas,kelas.kelas,kelas.nama_kelas,

					guru.id_guru,guru.foto_guru,guru.nama_guru,guru.nim

					FROM kelas

					LEFT JOIN wali_kelas
					ON kelas.id_kelas = wali_kelas.id_kelas

					LEFT JOIN guru 
					ON guru.id_guru = wali_kelas.id_guru

					WHERE kelas.id_kelas = {$kelas}";

		return query_get($query);
	}

	function detail_siswa_kelas($kelas){
		GLOBAL $koneksi;

		$query = "	SELECT 	*

					FROM siswa

					JOIN kelas 
					ON siswa.id_kelas = kelas.id_kelas 

					WHERE kelas.id_kelas = {$kelas} AND status_pendidikan = 'aktif'
					ORDER BY siswa.nama_depan asc
					";

		return query_get($query);
	}

	function edit_data_kelas($id_kelas){
		GLOBAL $koneksi;
		require_once 'variable/variable_kelas.php';
		$query = " UPDATE kelas SET kelas = {$tingkat}, nama_kelas = '$nama_kelas'
				   WHERE id_kelas = {$id_kelas}
				 ";

		return run_query($query);
	}

	function jml_siswa_kelas($kelas){
		GLOBAL $koneksi;

		$query = "SELECT kelas.nama_kelas,COUNT(siswa.id_siswa) AS 'jumlah_siswa'
					FROM kelas

					LEFT JOIN siswa 
					ON siswa.id_kelas = kelas.id_kelas

					WHERE kelas.kelas = {$kelas} AND status_pendidikan = 'Aktif' AND kelas.status_kelas = 'Aktif'

					GROUP BY kelas.id_kelas
					ORDER BY kelas.kelas asc, kelas.nama_kelas asc";

		return query_get($query);
	}

	function ambil_kelas_tkt($kelas){
		GLOBAL $koneksi;

		$query = "SELECT kelas.id_kelas,kelas.kelas,kelas.nama_kelas,
				  guru.nama_guru
				  FROM kelas
                  
				  LEFT JOIN wali_kelas
                  ON kelas.id_kelas = wali_kelas.id_kelas
                  
                  LEFT JOIN guru
                  ON guru.id_guru = wali_kelas.id_guru
                  
                  WHERE kelas.kelas = {$kelas} AND kelas.status_kelas = 'Aktif'
                  
                  ORDER BY kelas.nama_kelas ASC";
        return query_get($query);
	}

	function penaikanKelas(){
		$query = "UPDATE sibuk.kelas
				SET status_kelas = 
					(	CASE 
							WHEN kelas.kelas = 9 
							AND status_kelas = 'Aktif' 
							THEN 'Alumni' 
						ELSE status_kelas 
					END), 
					kelas = 
					(	CASE 
							WHEN kelas = 7 
							THEN 8 
							
							WHEN kelas = 8 
							THEN 9 
						ELSE kelas 
					END)
			WHERE status_kelas != 'Alumni'
		";
		return run_query($query);
	}

	
 ?>
