<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {
	//HALAMAN START --------------------------------------------------------------
	public function __construct()
	{
	  parent::__construct();
	  $this->load->model('Session');
	  $this->load->model('Absensimodels');

	}

	public function index(){
		$data=[
			"title"=>"Jadwal",
			"main"=>$this->load->view('jadwal/jadwal',NULL,true)
		];
		$this->layout->template($data);

	}

	
	public function kelas($id_kelas=NULL){
		$this->load->model("jadwalModels");
		$dataKelas["resultHari"]=$this->jadwalModels->getHari();
		$resultKelas=$this->jadwalModels->getKelas($id_kelas);
		$dataKelas["idKelas"]=$resultKelas[0]["id_kelas"];
		$dataKelas["namaKelas"]=$resultKelas[0]["kelas"]." ".$resultKelas[0]["nama_kelas"];

		$data=[
			"title"=> "Kelas ".$dataKelas["namaKelas"],
			"main"=> $this->load->view("jadwal/listKelas",$dataKelas,true)
		];
		$this->layout->template($data);
	}

	public function pengaturan(){
		$this->load->model("jadwalModels");
		$dataPengaturan["resultHari"]=$this->jadwalModels->getHari();
		$data=[
			"title"=>"Pengaturan",
			"main"=>$this->load->view('jadwal/pengaturan',$dataPengaturan,true)
		];
		$this->layout->template($data);
	}
	//HALAMAN END ----------------------------------------------------------------

	//HALAMAN PROSES START -------------------------------------------------------
	public function prosesPengaturan(){
		$data=array(
				"jam"=>$this->input->post("jam"),
				"jam_ke"=>$this->input->post("jam_ke"),
				"id_hari"=>$this->input->post("id_hari")
		);

		$this->load->model("jadwalModels");
		$result=$this->jadwalModels->inJamJadwal($data);
		if($result==true){
			echo "berhasil";
		}else{
			echo "tidak berhasil";
		}
	}

	public function getJamJadwal(){
		$id=$this->input->post("id");
		if(isset($id)){
			$this->load->model("jadwalModels");

			$jam=$this->jadwalModels->getListJamJadwal($id);
			$splice=$this->jadwalModels->spliceJam($jam[0]["jam"]);

			//jamMulaiUbah
			echo '<div class="form-group">';
			echo '<label class="col-form-label"><b>Jam Mulai</b></label>';
			echo '<div class="row">';
			echo '<div class="col-6">';
			echo '<select id="jamMulaiJamUbah" class="form-control">';
			echo '<option>Jam</option>';
			for ($no=1; $no<=24; $no++) {
				$nojam=strlen($no)==1 ? str_pad($no, 2, "0", STR_PAD_LEFT) : $no;
				if($nojam==$splice["mulai"]["jam"]){
					echo "<option selected>".$nojam."</option>";
				}
				if($nojam!=$splice["mulai"]["menit"]){
					echo "<option>".$nojam."</option>";
				}
			}
			echo "</select>";
			echo "</div>";

			echo '<div class="col-6">';
			echo '<select id="jamMulaiMenitUbah" class="form-control">';
			echo '<option>Menit</option>';
			for ($no=0; $no<=60; $no++) {
				$nojam=strlen($no)==1 ? str_pad($no, 2, "0", STR_PAD_LEFT) : $no;
				if($nojam==$splice["mulai"]["menit"]){
					echo "<option selected>".$nojam."</option>";
				}
				if($nojam!=$splice["mulai"]["menit"]){
					echo "<option>".$nojam."</option>";
				}
			}
			echo "</select>";
			echo "</div>";
			echo "</div></div>";

			//jamSelesaiUbah
			echo '<div class="form-group">';
			echo '<label class="col-form-label"><b>Jam Selesai</b></label>';
			echo '<div class="row">';
			echo '<div class="col-6">';
			echo '<select id="jamSelesaiJamUbah" class="form-control">';
			echo '<option>Jam</option>';
			for ($no=1; $no<=24; $no++) {
				$nojam=strlen($no)==1 ? str_pad($no, 2, "0", STR_PAD_LEFT) : $no;
				if($nojam==$splice["selesai"]["jam"]){
					echo "<option selected>".$nojam."</option>";
				}
				if($nojam!=$splice["selesai"]["menit"]){
					echo "<option>".$nojam."</option>";
				}
			}
			echo "</select>";
			echo "</div>";

			echo '<div class="col-6">';
			echo '<select id="jamSelesaiMenitUbah" class="form-control">';
			echo '<option>Menit</option>';
			for ($no=0; $no<=60; $no++) {
				$nojam=strlen($no)==1 ? str_pad($no, 2, "0", STR_PAD_LEFT) : $no;
				if($nojam==$splice["selesai"]["menit"]){
					echo "<option selected>".$nojam."</option>";
				}
				if($nojam!=$splice["selesai"]["menit"]){
					echo "<option>".$nojam."</option>";
				}
			}
			echo "</select>";
			echo "</div>";
			echo "</div></div><div id='msgJadwalUbah'></div>";

		}else{
			echo "Oops!";
		}
	}

	public function prosesUbahPengaturan(){
		$id=$this->input->post("idjam");
		if(isset($id)){
			$data=array("jam"=>$this->input->post("jam"));
			$this->load->model("jadwalModels");
			$query=$this->jadwalModels->upJamJadwal($data,array( "id_jam_jadwal" => $this->input->post("idjam") ));
			if($query==true){
				echo "berhasil";
			}else{
				echo "tidak berhasil";
			}
		}else{
			echo "Oops!";
		}
	}

	public function prosesJadwal(){

		$data=array(
					"id_hari" =>$this->input->post("id_hari"),
				 "id_kelas" =>$this->input->post("id_kelas"),
					"id_guru" =>$this->input->post("id_guru"),
		"id_jam_jadwal" =>$this->input->post("id_jam_jadwal")
		);

		if(empty($data["id_guru"]) OR $data["id_guru"]=="" OR $data["id_guru"]=="pilih guru"){
			echo "wajib";
		}else{
			$this->load->model("jadwalModels");
			$prsJadwal=$this->jadwalModels->inJadwal($data);

			if(is_array($prsJadwal)){
				if(count($prsJadwal) >= 1){
					$prsJadwal[1] = 'bentrok';
					echo json_encode($prsJadwal);
				}
			}else if($prsJadwal==true){
				echo "tidakBentrok";
			}else{
				echo "oops";
			}
		}
	}

	public function cariGuru(){
    $mapel=$this->input->post("mapel");
    if(isset($mapel)){
      $this->load->model("jadwalModels");
      $this->jadwalModels->getGuru($mapel);
    }else{
      echo "ops!";
    }
  }

	public function getUbahJadwal(){
		$id=$this->input->post("id_jadwal");
		if(isset($id)){
			$query=$this->db->query("SELECT mapel.id_mapel as idmapel, guru.id_guru as idguru FROM jadwal INNER JOIN guru ON jadwal.id_guru = guru.id_guru INNER JOIN mapel ON guru.id_mapel = mapel.id_mapel WHERE id_jadwal=$id")->result_array();
			
			echo "<div class='form-group'>";
			echo "	<label for='pilihMataPelajaranUbah' class='col-form-label'>Pilih Mata Pelajaran</label>";
			echo "	<select class='form-control' id='pilihMataPelajaranUbah'>";
			echo "		<option value=''>-Pilih-</option>";
			 					$queryMapel=$this->db->query("SELECT * FROM mapel ORDER BY nama_mapel ASC");
								foreach($queryMapel->result() as $rowMapel){
									if($rowMapel->id_mapel==$query[0]["idmapel"]){
										echo "<option value='".$rowMapel->id_mapel."' selected>".$rowMapel->nama_mapel."</option>";
									}else if($rowMapel->id_mapel!=$query[0]["idmapel"]){
										echo "<option value='".$rowMapel->id_mapel."'>".$rowMapel->nama_mapel."</option>";
									}
								}
			echo "	</select>";
			echo "</div>";

			echo "<div class='form-group'>";
			echo "	<label for='pilihGuruUbah' class='col-form-label'>Pilih Guru</label>";
			echo "	<select class='form-control' id='pilihGuruUbah'>";
			echo "		<option value=''>-Pilih-</option>";
						$idmapel=$query[0]["idmapel"];
						$queryGuru=$this->db->query("SELECT * FROM guru WHERE id_mapel = '$idmapel' ORDER BY nama_guru ASC");

						foreach($queryGuru->result() as $rowGuru){
							if($rowGuru->id_guru==$query[0]["idguru"]){
								echo "<option value='".$rowGuru->id_guru."' selected>".$rowGuru->nama_guru."</option>";
							}else if($rowGuru->id_guru!=$query[0]["idguru"]){
								echo "<option value='".$rowGuru->id_guru."'>".$rowGuru->nama_guru."</option>";
							}
						}
			echo "	</select>";
			echo "</div>";

			echo "<div id='msUpJadwal'></div>";

			echo "<script>";
			echo "$('#pilihMataPelajaranUbah').change(function(){";

  			echo "$('#pilihGuruUbah').removeAttr('disabled');";
			echo "  var mapel = $('#pilihMataPelajaranUbah').val();";

			echo "  $.ajax({";
			echo "     method:'POST',";
			echo "        url:'".base_url('jadwal/cariGuru')."',";
			echo "       data:{'mapel':mapel}";
			echo "  }).done(function(msg){";
			echo "    $('#pilihGuruUbah').html(msg);";
			echo "  });";

			echo "});";
			echo "</script>";

		}else{
			echo "ops!";
		}
	}

	public function prosesUbahJadwal(){
		$id=$this->input->post("id_jadwal");
		if(isset($id)){
			$this->load->model("jadwalModels");

			$data=array(
				"id_guru"=>$this->input->post("id_guru")
			);

			if(empty($data["id_guru"]) OR $data["id_guru"]=="" OR $data["id_guru"]=="pilih guru"){
				echo "wajib";
			}else{
				$prsUpjadwal=$this->jadwalModels->upJadwal($data,array("id_jadwal"=>$id));
				if($prsUpjadwal==true){
					echo "berhasil";
				}else{
					echo "tidakBerhasil";
				}
			}
		}else{
			echo "oops";
		}
	}

	public function prosesKosongJadwal(){
		$id=$this->input->post("id");
		if(isset($id)){
			$this->load->model("jadwalModels");
			$query=$this->jadwalModels->delJadwal($id);
			if($query==true){
				echo "berhasil";
			}else{
				echo "tidakBerhasil";
			}
		}else{
			echo "oops";
		}

	}
	// HALAMAN PROSES END ---------------------------------------------------------
}
