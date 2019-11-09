<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {
  private $session_user_id,
          $hariHeading,
          $hari;

  public function __construct(){

    parent::__construct();
    date_default_timezone_set('Asia/Kuala_Lumpur');
    $raw_hari = date("l");

    if($raw_hari=="Sunday"){
      $hari="minggu";
    }else if($raw_hari=="Monday"){
      $hari="senin";
    }else if($raw_hari=="Tuesday"){
      $hari="selasa";
    }else if($raw_hari=="Wednesday"){
      $hari="rabu";
    }else if($raw_hari=="Thursday"){
      $hari="kamis";
    }else if($raw_hari=="Friday"){
      $hari="jumat";
    }else if($raw_hari=="Saturday"){
      $hari="sabtu";
    }

    $this->hariHeading = $hari;

    $this->load->model("Absensimodels");
    $this->load->model("Session");
    $this->load->model('User');
    $this->load->model('FlashData');

    $hari = "rabu";

    if($this->Absensimodels->getHari($hari)==NULL){
      $hari = "libur";
    }else{
      $hari = $this->Absensimodels->getHari($hari)[0]["id_hari"];
    }

    $this->hari = $hari;

    // ini ganti mamang
    // buatkan loginya :*
    // harus disini mau digunakan absensinya nanti mamang :*
    if($this->Session->getSession('level') == 'guru'){
      $id_user = $this->User->getUser($this->Session->getSession('username'));
      $this->session_user_id = $id_user[0]['id_guru'];
    }

  }

  public function index(){
    $queryAbsen=$this->Absensimodels->getListAbsen($this->session_user_id,$this->hari);

    $getlistAbsen = $queryAbsen;
    $dataAbsensi["hari"]= strtoupper($this->hariHeading);

    $dataAbsensi['resultAbsen'] = array();
    //Load semua List Absen
    foreach ($getlistAbsen as $row) {
      
      //Cek dulu kosong apa gak array $dataAbsensi['resultAbsen'] yang key nya id_kelas
      //Awalnya masuk di else karena array $dataAbsensi['resultAbsen'] awalnya kosong gak ada apa apa
      //jika arraynya tidak lagi kosong berarti true.. dan masuk dikondisi dibawa ini
      if (!empty($dataAbsensi['resultAbsen'][$row['id_kelas']])) {

          //Variable $defaultValue adalah variable untuk ngambil valuenya sekarang
          $defaultValue = (array) $dataAbsensi['resultAbsen'][$row['id_kelas']]['jam'];

          // Variable dibawah ini fungsinya membuat kembali value diindex jam dengan cara dimerge
          // maka 2 atau lebih array yang index nya sama maka akan dimerge dibagian jam saja.. yang lain akan disatukan
          // dan tidak ada yang diubah
          $dataAbsensi['resultAbsen'][$row['id_kelas']]['jam'] = array_merge($defaultValue, (array) $row['jam']);

          //kondisi ini cuma ngecek jamnya lebih dari satu apa gak..
          //kalo lebih dari 1 ambil awal jam dengan akhir jam saja 
          if(count($dataAbsensi['resultAbsen'][$row['id_kelas']]['jam']) > 1){
            //Awal jam 
            $awalJam  = explode('-',reset($dataAbsensi['resultAbsen'][$row['id_kelas']]['jam']))[0];

            //Akhir jam
            $akhirJam = explode('-',end($dataAbsensi['resultAbsen'][$row['id_kelas']]['jam']));
            $akhirJam = end($akhirJam);

            //buat kembali array dengan index jam menjadi 1jam saja yaitu jam awal dan akhir
            $dataAbsensi['resultAbsen'][$row['id_kelas']]['jam'] = "$awalJam-$akhirJam";
          }

      //Jika arraynya kosong,
      //kita buat array dengan index sesuai id_kelas dengan valuenya  array list absen itu tersebut
      } else {
          $dataAbsensi['resultAbsen'][$row['id_kelas']] = $row;
      }
      
    }
    $dataAbsensi['resultAbsen'] = array_values($dataAbsensi['resultAbsen']);
     /**
       * Get FLASH MESSAGES
       * 
       */
    if($this->Session->sessionExist(FlashData::$flashMessages))
    {
      $dataAbsensi['flashMessages'] = $this->FlashData->showFlashMessages();
    }else{
      $dataAbsensi['flashMessages'] = '';
    }

		$data=[
			"title"=>"Absensi",
			"main"=>$this->load->view('absensi/daftarAbsensi',$dataAbsensi,true)
		];
		$this->layout->template($data);
  }

  public function absenkelas(){
    $id_kelas   = $this->uri->segment(3);
    $getSiswa   = $this->Absensimodels->getSiswaDoneAbsen($id_kelas);
    $queryAbsen = $this->Absensimodels->getDetailAbsen($this->session_user_id,$this->hari,$id_kelas);
    if(count($queryAbsen) > 0){

      $dataAbsensiSiswa['resultAbsen']= $queryAbsen;
      if($getSiswa != NULL){
        $dataAbsensiSiswa["resultSiswa"]= $getSiswa;
      }else{
        $dataAbsensiSiswa["resultSiswa"]= $this->Absensimodels->getSiswaAbsen($id_kelas);
      }


      $kelas=$this->Absensimodels->getNamaKelas($id_kelas);

      $dataAbsensiSiswa["namaKelas"]  =$kelas[0]["kelas"]." ".$kelas[0]["nama_kelas"];
      $dataAbsensiSiswa["jumlahSiswa"]=$this->Absensimodels->getJumlahSiswa($id_kelas)[0]["jmh"];

      /** 
       * Ambil jam awal masuk Guru dan jam keluar Guru
       */
      $awalJam  = explode('-',$dataAbsensiSiswa['resultAbsen'][0]['jam'])[0];
      $akhirJam = explode('-',end($dataAbsensiSiswa['resultAbsen'])['jam'])[1];

      // *
      //  * Hapus semua isi array $dataAbsensiSiswa['resultAbsen']
      //  * Lalu buat array baru dengan 2 index yang mengisi jam masuk dan jam keluar guru
       
      unset($dataAbsensiSiswa['resultAbsen']);
      $dataAbsensiSiswa['resultAbsen']['awalJam']  = $awalJam;
      $dataAbsensiSiswa['resultAbsen']['akhirJam'] = $akhirJam;

     

      $data=[
        "title"=> "ABSENSI ".$dataAbsensiSiswa["namaKelas"],
        "main" =>$this->load->view('absensi/absensi',$dataAbsensiSiswa,true)
      ];
      $this->layout->template($data);
    }else{
      $this->FlashData->setFlashMessages('error','MAAF KELAS TIDAK DITEMUKAN !!!','',true);
      redirect(base_url('absensi'));
    }
  }

  public function checkWaktuAbsen($data)
  { 
     if($data == 'selesai'){
       $this->FlashData->setFlashMessages('warning','OOPS !!!','Gak bisa absen lagi waktu mengajar kamu sudah selesai !!!',true);
     }else if($data == 'belum'){
      $this->FlashData->setFlashMessages('warning','OOPS !!! ','Gak bisa absen lagi waktu mengajar kamu belum dimulai !!!',true);
     }
    
     redirect(base_url('absensi'));
  }
  
  public function anakdidik(){

    $data['siswa'] = $this->Absensimodels->getAnakDidik($this->session_user_id);
    $data=[
      "title"=>"Anak Didik",
      "main"=>$this->load->view('absensi/anakdidik',$data,true)
    ];
    $this->layout->template($data);
  }



	// HALAMAN END ---------------------------------------------------------------
  public function prosesAbsen(){
    $issetData=$this->input->post("absen");
    if(isset($issetData)){

      $data = $this->input->post("absen");

      $tanggal = date('Y-m-d');
      $waktu   = date("h:i:s") ;

      if(!$this->Absensimodels->checkCurrentAbsen() > 0){
        $getOneSiswa  = NULL;
        $dataAbsen    = [];
        $detailAbsen  = ['h' => 0,'a' => 0, 'i' => 0,'s' => 0,'b' =>0];
        $detailAbsen  = array_merge($detailAbsen,array_count_values($data));
        foreach ($data as $id_siswa => $absen){
          $getOneSiswa     .= $id_siswa;
          break;
        }
        
          $queryGetIdKelas = $this->Absensimodels->getOneKelas($getOneSiswa);

          //data absensi
          $kelas   = $queryGetIdKelas[0]["id_kelas"];
          $hari    = $this->hari;
          $guru    = $this->session_user_id;
          
          $query=$this->Absensimodels->getSiswaAbsen($kelas);

          $count = 0;
          foreach ($query as $row){

            $dataResult = array(
                 "id_kelas" => $kelas,
                 "id_guru"  => $guru,
                 "nis"      => $row["nis"],
                 "id_hari"  => $hari,
                 "tanggal"  => $tanggal,
                 "waktu"    => $waktu,             
                 "absen"    => $data[$row["nis"]]
          );

            array_push($dataAbsen, $dataResult);
            $count++;
          }

          if($this->Absensimodels->inAbsensi($dataAbsen)){
            $text = 'Sukses melakukan absensi !!! \n Jumlah Siswa: '.$count.
                     '\n Hadir('.$detailAbsen['h'].")".
                     '\n Tidak Hadir('.$detailAbsen['a'].")".
                     '\n Izin('.$detailAbsen['i'].")".
                     '\n Sakit('.$detailAbsen['s'].")".
                     '\n Bolos('.$detailAbsen['b'].")";
            $this->FlashData->setFlashMessages('success','SUKSES !!!',$text);
            redirect(base_url('absensi'));
          }
        }else{
          $dataResult = [];

          $count = 0;
          foreach ($data as $key => $value) {
            $dataResult[$count] = ['nis' => $key, 'absen' => $value];
            $count++;
          }

          if($this->Absensimodels->upAbsensi($dataResult)){
            $this->FlashData->setFlashMessages('success','SUKSES !!!','Sukses melakukan absensi kembali !!!');
            redirect(base_url('absensi'));
          }
        }

    }else{
      redirect(base_url('absensi'));
    }
  }
}
