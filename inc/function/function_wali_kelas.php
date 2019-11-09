<?php 

	//============================================================
	//===============FUNCTION DATA Wali Kelas=====================
	//============================================================
	function tambah_data_wakel(){
		GLOBAL $koneksi;
		$query2  = mysqli_query($koneksi,"SELECT max(kelas.id_kelas) AS 'id' FROM kelas");
		$data    = mysqli_fetch_assoc($query2);

		$w_kelas  = (int)strip_tags(trim($_POST['wali_kelas']));
		$id_kelas = $data['id'];
		$query    = "INSERT INTO wali_kelas VALUES(NULL,'$w_kelas','$id_kelas')";

		return run_query($query); 		
	}

	function tambah_data_wakel_edit($id_guru,$id_kelas){
		GLOBAL $koneksi;

		$query    = "INSERT INTO wali_kelas VALUES(NULL,'$id_guru','$id_kelas')";

		return run_query($query); 		
	}

	function edit_data_wakel($id_guru,$id_kelas){
		GLOBAL $koneksi;

		$query = "UPDATE wali_kelas SET id_guru = {$id_guru}
				 WHERE id_kelas = {$id_kelas} ";

		return run_query($query);
	}

	function hapus_wali_kelas($id_guru){
		GLOBAL $koneksi;

		$query = "DELETE FROM wali_kelas WHERE id_guru = {$id_guru}";

		return run_query($query);
	}

	function hapus_wali_kelas1($id_kelas){
		GLOBAL $koneksi;

		$query = "DELETE FROM wali_kelas WHERE id_kelas = {$id_kelas}";

		return run_query($query);
	}

	


 ?>