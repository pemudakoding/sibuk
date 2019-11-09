<?php defined('BASEPATH') OR exit('No direct script access allowed');

    class User extends CI_Model
    {

        public function getUser($username){
            $this->db->select('id_guru,nama_d_g,nama_b_g,nama_mapel,level.level');
            $this->db->from('guru');
            $this->db->join('mapel', 'guru.id_mapel = mapel.id_mapel');
            $this->db->join('level', 'guru.id_level = level.id_level');
            return $this->db->where('username ='."'$username'")->get()->result_array();
        }
        
        public function getOperator($username){
            $this->db->select('nama_depan, nama_belakang,level.level');
            $this->db->from('users_sibuk');
            $this->db->join('level', 'users_sibuk.id_level = level.id_level');
            return $this->db->where('username = '."'$username'")->get()->result_array();
        }
    }

?>