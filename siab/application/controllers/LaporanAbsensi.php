<?php defined('BASEPATH') OR exit('No direct script access allowed');

	
	class LaporanAbsensi extends CI_Controller
	{	

		public function __construct()
	  	{
		    parent::__construct();
		    $this->load->model('Session');
		    $this->load->model('User');
		    $this->load->model('Absensimodels');
	  	}

		public function index()
		{
			$idGuru 				= $this->User->getUser($this->Session->getSession('username'))[0]['id_guru'];
			$laporan['listKelas'] 	= $this->Absensimodels->getKelasMengajar($idGuru);
			
		    $data=[
		      "title"=>"Laporan Absensi",
		       "main"=>$this->load->view('absensi/laporanAbsensi',$laporan,true)
		    ];
		    $this->layout->template($data);
		}

		public function laporanKelas(){
			$idKelas 				= $this->uri->segment(3);			
			$laporan['kelas']  		= $this->Absensimodels->getNamaKelas($idKelas)[0];
			$laporan['siswa'] 		= $this->Absensimodels->getAbsensi($idKelas);
			$laporan['jumlahSiswa'] = $this->Absensimodels->getJumlahSiswa($idKelas)[0]["jmh"];
			
			$data = [
				"title"	=>	"Laporan Absensi ".$laporan['kelas']['kelas'].$laporan['kelas']['nama_kelas'] ,
				"main"=>$this->load->view('absensi/laporanAbsensiDetail',$laporan,true)
			];

			$this->layout->template($data);

		}

		public function getLaporan(){
			$idGuru 		= $this->User->getUser($this->Session->getSession('username'))[0]['id_guru'];
			$laporan 		= $this->Absensimodels->getKelasMengajar($idGuru);

			echo json_encode($laporan);
		}
	}
	
 ?>