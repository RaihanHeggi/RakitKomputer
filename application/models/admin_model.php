<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class admin_model extends CI_Model{

    function __construct (){
        parent::__construct();
    }

    function insertData($data){
        return $this->db->insert('admin',$data);
    }

    function cekData($idUser){
        $this->db->where('id_user',$idUser);
        $query = $this->db->get('admin');
        if($query->num_rows() > 0){  
            return true;  
        }  
        else{  
            return false;       
        } 
    }

    function getData($idUser){
        $this->db->where('nama_admin',$idUser);
        return $this->db->get('admin')->result_array();
    }

    function getNama($idUser){
        $this->db->select('nama_admin');
        $this->db->where('id_user',$idUser);
        return $this->db->get('admin')->row()->nama_admin;
    }

    function getAllData(){
        return $this->db->get('admin')->result_array();
    }
}

?>