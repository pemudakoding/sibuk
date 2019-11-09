<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

  public function __construct()
  {

    parent::__construct();
    $this->load->model('Session');
    $this->load->model('User');
    $this->load->model('Absensimodels');
  }

  public function index(){

    $data=array(
      "title"=>"Sistem Informasi Absensi",
      "main"=>$this->load->view("Beranda",NULL,true)
    );

    $this->layout->template($data);
  }

  public function logout(){
    session_destroy();
    redirect(base_url("beranda"));
  }

}
