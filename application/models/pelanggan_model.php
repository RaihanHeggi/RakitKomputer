<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class pelanggan_model extends CI_Model{

    function __construct (){
        parent::__construct();
    }

    function insertData($data){
        return $this->db->insert('pelanggan',$data);
    }

    function cekData($idUser){
        $this->db->where('id_user',$idUser);
        $query = $this->db->get('pelanggan');
        if($query->num_rows() > 0){  
            return true;  
        }  
        else{  
            return false;       
        } 
    }

    function getData($nama, $email){
        $this->db->where('nama_pelanggan',$nama);
        $this->db->where('email_pelanggan',$email);
        return $this->db->get('pelanggan')->result_array();
    }

    function getDataUser($nama, $idUser){
        $this->db->where('nama_pelanggan',$nama);
        $this->db->where('id_user',$idUser);
        return $this->db->get('pelanggan')->row_array();
    }

    function getNama($idUser){
        $this->db->select('nama_pelanggan');
        $this->db->where('id_user',$idUser);
        return $this->db->get('pelanggan')->row()->nama_pelanggan;
    }

    function getNamaPelanggan($id){
        $this->db->select('nama_pelanggan');
        $this->db->where('id_pelanggan',$id);
        return $this->db->get('pelanggan')->row()->nama_pelanggan;
    }

    function getAllData(){
        return $this->db->get('pelanggan')->result_array();
    }

    function getIdPelanggan($id_user){
        $this->db->where('id_user',$id_user);
        return $this->db->get('pelanggan')->row()->id_pelanggan;
    }

    function getDataId($id_user){
        $this->db->where('id_user',$id_user);
        return $this->db->get('pelanggan')->result_array();
    }

    function editData($idPelanggan,$data){
        $this->db->where('id_pelanggan',$idPelanggan);
        return $this->db->update('pelanggan',$data);
    }
}

?>