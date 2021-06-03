<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class konsultan_model extends CI_Model{

    function __construct (){
        parent::__construct();
    }

    function insertData($data){
        return $this->db->insert('konsultan',$data);
    }

    function cekData($idUser){
        $this->db->where('id_user',$idUser);
        $query = $this->db->get('konsultan');
        if($query->num_rows() > 0){  
            return true;  
        }  
        else{  
            return false;       
        } 
    }

    function getData($nama, $email){
        $this->db->where('nama_konsultan',$nama);
        $this->db->where('email_konsultan',$email);
        return $this->db->get('konsultan')->result_array();
    }

    function getNama($idUser){
        $this->db->select('nama_konsultan');
        $this->db->where('id_user',$idUser);
        return $this->db->get('konsultan')->row()->nama_konsultan;
    }

    function getIdKonsultan($id){
        $this->db->where('id_user',$id);
        return $this->db->get('konsultan')->row()->id_konsultan;
    }

    function getAllData(){
        return $this->db->get('konsultan')->result_array();
    }

    function getDataKonsultasi(){
        return $this->db->get('konsultasi')->result_array();
    }

    function getDataId($id_user){
        $this->db->where('id_user',$id_user);
        return $this->db->get('konsultan')->result_array();
    }

    function editData($idkonsultan,$data){
        $this->db->where('id_konsultan',$idkonsultan);
        return $this->db->update('konsultan',$data);
    }
}

?>