<?php defined('BASEPATH') OR exit('No direct script access allowed');

class JadwalModels extends CI_Model {

  public function getHari(){
    return $this->db->query("SELECT * FROM hari")->result_array();
  }
  public function getKelas($id_kelas=NULL){
    return $this->db->query("SELECT * FROM kelas WHERE id_kelas='$id_kelas'  ")->result_array();
  }

  public function getJamHari($id_hari=NULL){
      return $this->db->query("SELECT * FROM jam_jadwal WHERE id_hari='$id_hari'")->result_array();
  }

  public function getJamJadwal($id_hari=NULL){
    return $this->db->query("SELECT * FROM jam_jadwal WHERE id_hari='$id_hari'")->result_array();
  }

  public function getListJamJadwal($id_jam_jadwal=NULL){
    return $this->db->query("SELECT * FROM jam_jadwal WHERE id_jam_jadwal=$id_jam_jadwal")->result_array();
  }

  public function getJamKeAkhir($id_hari=NULL){
    return $this->db->query("SELECT MAX(jam_ke) AS result FROM jam_jadwal WHERE id_hari=$id_hari")->result_array();
  }

  public function getGuru($idMapel=NULL){
    $query=$this->db->query("SELECT * FROM guru WHERE id_mapel='$idMapel'");
    if($query==false){
      echo "<option value=\"pilih guru\">-Pilih-</option>";
    }else{
      echo "<option value=\"pilih guru\">-Pilih-</option>";
      foreach($query->result() as $row){
        echo "<option value=\"".$row->id_guru."\">".$row->nama_guru."</option>";
      }
    }
  }

  public function getJadwal($id_hari=NULL,$id_kelas=NULL,$jam_jadwal=NULL){
    return $this->db->query("SELECT hari.hari,kelas.kelas,kelas.nama_kelas,guru.nama_guru, mapel.nama_mapel,jam_jadwal.jam, jam_jadwal.jam_ke, jadwal.id_jadwal FROM jadwal INNER JOIN hari ON jadwal.id_hari = hari.id_hari INNER JOIN kelas ON jadwal.id_kelas = kelas.id_kelas INNER JOIN guru ON jadwal.id_guru = guru.id_guru INNER JOIN mapel ON guru.id_mapel = mapel.id_mapel INNER JOIN jam_jadwal ON jadwal.id_jam_jadwal = jam_jadwal.id_jam_jadwal WHERE jadwal.id_kelas=$id_kelas AND jadwal.id_hari=$id_hari AND jam_jadwal.id_jam_jadwal = $jam_jadwal ORDER BY jam_jadwal.jam_ke ASC")->result_array();
  }

  public function spliceJam($param=NULL){
    $jam = explode("-","$param");//08:00-10:30
		$result=[];

		$no=0;
		while(sizeof($jam)>$no){
			$menit=explode(":",$jam[$no]);
			$data[$no]=[];

			$noMenit=0;
			while(sizeof($menit)>$noMenit){
				$angka=$menit[$noMenit];
				array_push($data[$no],$angka);
				$noMenit++;
			}

			array_push($result,$data[$no]);
			$no++;
		}

    $finalResult=array(
        "mulai" => array("jam" => $result[0][0], "menit" => $result[0][1]),
      "selesai" => array("jam" => $result[1][0], "menit" => $result[1][1])
    );

    return $finalResult;
  }

  public function cekJadwalBentrok($hari=NULL,$guru=NULL,$jamke=NULL){

    // id mata pelajaran olahraga
    // ini diinput manual dikarenakan
    // untuk mengAllow kelas yang mata pelajaran olahraga
    
    $idOlahraga= $this->db->query("SELECT id_mapel from mapel where (nama_mapel LIKE '%Olahraga%' ) OR  (nama_mapel LIKE '%olahraga%' )")->result_array()[0]['id_mapel'];
    
    $queryCekOlahraga=$this->db->query("SELECT * FROM guru WHERE id_guru='$guru' AND id_mapel='$idOlahraga'")->num_rows();

    if($queryCekOlahraga>=1){
        $result=0;
    }else{
        $result=$this->db->query("SELECT nama_guru, kelas.kelas, kelas.nama_kelas, id_hari,jadwal.id_guru,id_jam_jadwal FROM jadwal JOIN guru ON guru.id_guru = jadwal.id_guru  JOIN kelas ON kelas.id_kelas = jadwal.id_kelas WHERE id_hari='$hari' AND jadwal.id_guru='$guru' AND id_jam_jadwal='$jamke'")->result_array();
    }


    return $result;

  }

  public function inJadwal($data=NULL){
    $cekBentrok=$this->cekJadwalBentrok($data['id_hari'],$data['id_guru'],$data['id_jam_jadwal']);
    $result = $cekBentrok;
    if(!is_array($cekBentrok) && $cekBentrok >= 1){
      $result=$cekBentrok;
    }else{
      $result=true;
      $this->db->insert("jadwal",$data);
    }
    return $result;
  }

  public function inJamJadwal($data=NULL){
    return $this->db->insert("jam_jadwal",$data);
  }

  public function upJamJadwal($data=NULL,$id=NULL){
    return $this->db->update("jam_jadwal",$data,$id);
  }

  public function upJadwal($data=NULL,$id=NULL){
    return $this->db->update("jadwal",$data,$id);
  }

  public function delJadwal($id=NULL){
    return $this->db->query("DELETE FROM jadwal WHERE id_jadwal=$id");
  }

}
