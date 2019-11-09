 <?php 
	
	//============================================================
	// ==============FUNCTION DATA Mapel==========================
	//============================================================
	function data_mapel($limit){
		GLOBAL $koneksi;
		$query ="SELECT mapel.id_mapel,mapel.nama_mapel
				 FROM mapel
				 ORDER BY nama_mapel asc ".$limit;
       return query_get($query);
	}

	function search_data_mapel($search){
		GLOBAL $koneksi;
		$query = "SELECT mapel.nama_mapel, 
						 mapel.id_mapel
				  FROM mapel
				  WHERE (mapel.nama_mapel LIKE '$search%')
				  OR    (mapel.nama_mapel LIKE '%$search%') LIMIT 9";

		$result = mysqli_query($koneksi,$query);
		return $result;
	}

	function tambah_data_mapel(){
		GLOBAL $koneksi;
		$mapel = mysqli_real_escape_string($koneksi,strip_tags(trim($_POST['nama_mapel'])));
		$query = "INSERT INTO mapel VALUES(NULL,'$mapel')";

		return run_query($query);
	}

	function hapus_data_mapel($id){
		GLOBAL $koneksi;
		$query = "DELETE FROM mapel WHERE id_mapel = {$id}";

		return run_query($query);
	}

	function detail_data_mapel($id_mapel){
		GLOBAL $koneksi;
		$query = "SELECT * FROM mapel WHERE id_mapel = {$id_mapel}";

		return query_get($query);
	}

	function edit_mapel($id_mapel){
		GLOBAL $koneksi;
		$mapel = mysqli_real_escape_string($koneksi,strip_tags(trim($_POST['nama_mapel'])));
		$query = "UPDATE mapel SET nama_mapel = '$mapel'
				  WHERE id_mapel = {$id_mapel}";
		return run_query($query);
	}

	function mapel_guru($nim){
		GLOBAL $koneksi;

		$query = "SELECT  guru.nim,mapel.id_mapel,mapel.nama_mapel 
				  FROM guru 
				  JOIN mapel
				  ON guru.id_mapel = mapel.id_mapel
				  WHERE nim = {$nim}";

		return query_get($query);
	}

 ?>
