<?php 

	//============================================================
	//===============FUNCTION DATA USER===========================
	//============================================================

	function data_user($limit){
		GLOBAL $koneksi;
		$query  = "SELECT * FROM users_sibuk LEFT JOIN level ON users_sibuk.id_level = level.id_level  ORDER BY nama_depan ASC ".$limit;

		return query_get($query);
	}

	function search_data_user($search){
		GLOBAL $koneksi;
		$query  = "SELECT * FROM users_sibuk 
				  WHERE (concat(nama_depan,' ',nama_belakang) LIKE '$search%') 
				  OR (nama_depan LIKE '$search%')
				  OR (nama_belakang LIKE '$search%')
				  OR (level LIKE '$search%')
				  OR (akses LIKE '$search%')";
		return query_get($query);
	}

	function tambah_data_user($foto){
		GLOBAL $koneksi;
		require_once "variable/variable_user.php";
		$query = "INSERT INTO users_sibuk VALUES
				  (NULL,'$foto','$nama_d','$nama_b','$username','$password','$level','$akses')";

		return run_query($query);
	}

	function detail_data_user($column,$value){
		GLOBAL $koneksi;
		$query = "SELECT * FROM users_sibuk WHERE $column = {$value}";

		return query_get($query);
	}

	function hapus_data_user($value){
		GLOBAL $koneksi;
		$query = "DELETE FROM users_sibuk WHERE id_user = {$value}";

		return run_query($query);
	}
	

	function edit_data_user($id_user,$foto){
		GLOBAL $koneksi;
		require_once 'variable/variable_user.php';
		$query = "UPDATE users_sibuk SET foto_user      = '$foto',
										 nama_depan 	= '$nama_d',
										 nama_belakang  = '$nama_b',
										 username 	    = '$username',
										 id_level 	    = '$level',
										 akses 			= '$akses' 
				  WHERE id_user = {$id_user} ";

		return run_query($query);
	}

	function edit_pw_user($id_user){
		GLOBAL $koneksi;
		require_once 'variable/variable_user.php';
		$query = "UPDATE users_sibuk SET password = '$password'
				  WHERE id_user = $id_user ";

		return run_query($query);
	}

	function getUserLevel(){
		GLOBAL $koneksi;
		$query = "SELECT * FROM level";

		return query_get($query);
	}
	//============================================================
	// =====================ALL FUNCTION LOGIN====================
	//============================================================
		function cek_user($username){
			GLOBAL $koneksi;
			$query = "	SELECT id_user,foto_user,nama_depan,nama_belakang,username,password,level,akses 
						FROM users_sibuk
						JOIN level ON users_sibuk.id_level = level.id_level
						WHERE username = '{$username}'
						UNION 
						SELECT 	id_guru,foto_guru AS 'foto_user',nama_d_g AS 'nama_depan', 
								nama_b_g AS 'nama_belakang',username,password,level,akses  FROM guru 
						JOIN level ON guru.id_level = level.id_level
						WHERE username = '{$username}'";
			return query_get($query);
		}

	
 ?>