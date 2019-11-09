<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Absensimodels extends CI_Model {
	public function __construct(){

	}
	public function getHari($hari=NULL){
		return $this->db->query("SELECT * FROM hari WHERE hari='$hari'")->result_array();
	}

	
	public function getListAbsen($guru=NULL,$hari=NULL){
		if($hari=="libur"){
			$result = $hari;
		}else{
			$query=$this->db->query("SELECT hari.hari, jam_jadwal.jam_ke,guru.nama_guru,mapel.nama_mapel,kelas.kelas,kelas.nama_kelas, jam_jadwal.jam, jadwal.id_kelas FROM jadwal INNER JOIN guru ON guru.id_guru = jadwal.id_guru INNER JOIN mapel ON mapel.id_mapel = guru.id_mapel INNER JOIN hari ON hari.id_hari = jadwal.id_hari INNER JOIN kelas ON kelas.id_kelas = jadwal.id_kelas INNER JOIN jam_jadwal ON jam_jadwal.id_jam_jadwal = jadwal.id_jam_jadwal  WHERE jadwal.id_hari='$hari' AND jadwal.id_guru='$guru'");
			$result = $query->result_array();
		}
		return $result;
	}

	public function getDetailAbsen($guru=NULL,$hari=NULL,$idKelas=NULL){
		if($hari=="libur"){
			$result = $hari;
		}else{
			$query=$this->db->query("SELECT jam_jadwal.jam, jadwal.id_kelas FROM jadwal INNER JOIN guru ON guru.id_guru = jadwal.id_guru INNER JOIN mapel ON mapel.id_mapel = guru.id_mapel INNER JOIN hari ON hari.id_hari = jadwal.id_hari INNER JOIN kelas ON kelas.id_kelas = jadwal.id_kelas INNER JOIN jam_jadwal ON jam_jadwal.id_jam_jadwal = jadwal.id_jam_jadwal WHERE jadwal.id_hari='$hari' AND jadwal.id_guru='$guru' AND kelas.id_kelas = '$idKelas' ");
			$result = $query->result_array();
		}
		return $result;
	}

	public function getNamaKelas($id_kelas=NULL){
		return $this->db->query("SELECT nama_kelas,kelas FROM kelas WHERE id_kelas='$id_kelas'")->result_array();
	}

	public function getJumlahSiswa($id_kelas=NULL){
		return $this->db->query("SELECT count(*) as jmh FROM siswa WHERE id_kelas = '$id_kelas'")->result_array();
	}
	public function getSiswaAbsen($id_kelas=NULL){
		$currentDate = date('Y-m-d');
		$query = $this->db->query("SELECT siswa.* FROM siswa WHERE siswa.id_kelas='$id_kelas' ORDER BY siswa.id_siswa ASC");

		if($query==NULL){
			$result=NULL;
		}else{
			$result=$query->result_array();
		}

		return $result;
	}
	public function getSiswaDoneAbsen($id_kelas=NULL){
		$currentDate = date('Y-m-d');
		$query = $this->db->query("SELECT siswa.*, absensi.absen FROM siswa LEFT JOIN absensi ON siswa.nis = absensi.nis WHERE siswa.id_kelas='$id_kelas' AND absensi.tanggal = '$currentDate' ORDER BY siswa.id_siswa ASC");

		if($query==NULL){
			$result=NULL;
		}else{
			$result=$query->result_array();
		}

		return $result;
	}

	public function getOneKelas($nis = NULL){
		return $this->db->query("SELECT id_kelas FROM siswa WHERE nis='$nis'")->result_array();
	}

	public function inAbsensi($data=NULL){
		return $this->db->insert_batch("absensi",$data);
	}

	public function upAbsensi($data = NULL)
	{	

		$currentDate = date('Y-m-d');
		$caseQuery = [];
	    $count = 0;
	    foreach ($data as $row) {
	      $caseQuery['case'][$count] = "WHEN ".$row['nis']." THEN "."'".$row['absen']."'";
	      $caseQuery['in'][$count] = $row['nis'];
	      $count++;
	    }
	    $caseQuery['case'] = implode(' ',$caseQuery['case']);
	    $caseQuery['in']   = "(".implode(',',$caseQuery['in']).")";

	    $query = "UPDATE absensi 
	              SET absen =  CASE nis 
	                                $caseQuery[case]
	                           END
	              WHERE nis IN $caseQuery[in] AND tanggal = '$currentDate' ";
	    return $this->db->query($query);
	}

	public function checkCurrentAbsen()
	{
		$currentDate = date('Y-m-d');
		$query       = $this->db->query("SELECT COUNT(nis) as 'total' FROM absensi WHERE tanggal = '$currentDate' ")->result_array();

		return $query['0']['total'];
	}



	public function getAnakDidik($id_guru){
		return $this->db->query("SELECT wali_kelas.*,siswa.nama_depan,siswa.nama_belakang,siswa.nis,siswa.nisn,siswa.jenis_kelamin,kelas.nama_kelas,kelas.kelas FROM wali_kelas JOIN kelas ON wali_kelas.id_kelas = kelas.id_kelas JOIN siswa ON kelas.id_kelas = siswa.id_kelas WHERE wali_kelas.id_guru = '$id_guru' AND kelas.status_kelas = 'Aktif' ")->result_array();
	}
	public function checkWaliKelas($id_guru){
				$this->db->select("count(id_guru) as 'wali_kelas'");
				$this->db->from("wali_kelas");
		return	$this->db->where('id_guru',$id_guru)->get()->result_array();
	}

	public function getAbsensi($idKelas)
	{
				$this->db->select("siswa.nama_depan,siswa.nama_belakang,siswa.nis,siswa.jenis_kelamin, 
					SUM(CASE WHEN absen = 'h' then 1 ELSE 0 END) AS 'hadir',
					SUM(CASE WHEN absen = 'a' then 1 ELSE 0 END) AS 'alpa',
					SUM(CASE WHEN absen = 's' then 1 ELSE 0 END) AS 'sakit',
					SUM(CASE WHEN absen = 'i' then 1 ELSE 0 END) AS 'izin',
					SUM(CASE WHEN absen = 'b' then 1 ELSE 0 END) AS 'bolos'");		
				$this->db->from("absensi");
				$this->db->join('siswa', 'absensi.nis = siswa.nis','right');
				$this->db->where('absensi.id_kelas', $idKelas);
		return	$this->db->group_by('siswa.nis')->get()->result_array();

	}

	public function getKelasMengajar($idGuru)
	{
				$this->db->select('kelas.id_kelas,kelas.kelas,kelas.nama_kelas,mapel.nama_mapel');
				$this->db->from('jadwal');
				$this->db->join('guru', 'guru.id_guru = jadwal.id_guru');
				$this->db->join('kelas', 'kelas.id_kelas = jadwal.id_kelas');
				$this->db->join('mapel', 'mapel.id_mapel = guru.id_mapel');
				$this->db->where('jadwal.id_guru', $idGuru);
		return	$this->db->group_by('kelas,nama_kelas')->get()->result_array();

	}
}
