<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class manajer_model extends CI_Model{

    function __construct (){
        parent::__construct();
    }

    function insertData($data){
        return $this->db->insert('manajer',$data);
    }

    function cekData($idUser){
        $this->db->where('id_user',$idUser);
        $query = $this->db->get('manajer');
        if($query->num_rows() > 0){  
            return true;  
        }  
        else{  
            return false;       
        } 
    }

    function getData($idUser){
        $this->db->where('nama_manajer',$idUser);
        return $this->db->get('manajer')->result_array();
    }

    function getNama($idUser){
        $this->db->select('nama_manajer');
        $this->db->where('id_user',$idUser);
        return $this->db->get('manajer')->row()->nama_pelanggan;
    }

    function getAllData(){
        return $this->db->get('manajer')->result_array();
    }
}

?>