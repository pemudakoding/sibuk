<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Layout extends CI_Model{

  public function __construct()
  {
    $this->load->model('Session');
    $this->load->model('User');
  }

  public function template($data=NULL){

    if($this->Session->getSession('level') == 'guru'){
      $user                   = $this->User->getUser($this->Session->getSession('username'));
      $data["namaguru"]       = "{$user[0]['nama_d_g']} {$user[0]['nama_b_g']}";
      $data["matapelajaran"]  = "{$user[0]['nama_mapel']}";
      $data['user']           = $this->User->getUser($this->Session->getSession('username'))[0];
      $data['user']           = $this->Absensimodels->checkWaliKelas($user[0]['id_guru'])[0];
    }else{
      $user                   = $this->User->getOperator($this->Session->getSession('username'));
      $data["namaguru"]       = "{$user[0]['nama_depan']} {$user[0]['nama_belakang']}";
      $data["matapelajaran"]  = "{$user[0]['level']}";
      $data['user']           = 0;
    }
    
  	if($this->uri->segment(2)=="absenkelas"){
        $result = $this->load->view("absensi/sidebarAbsensi",$data,true);
    }else if(!empty($this->uri->segment(1)) || $this->uri->segment(1) == '' ){
        $result = $this->load->view("layout/sidebar",$data,true);
    }else{
      $result=NULL;
    }

    $data['sidebarSIAB']=$result;

    $this->load->view('layout/layout',$data);
  }

}
