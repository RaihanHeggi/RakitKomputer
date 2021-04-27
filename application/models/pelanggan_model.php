<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class pelanggan_model extends CI_Model{

    function __construct (){
        parent::__construct();
    }

    function insertData($data){
        return $this->db->insert('pelanggan',$data);
    }

    function cekData($email){
        $this->db->where('email_pelanggan',$email);
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

    function getDataUser($nama, $email){
        $this->db->where('nama_pelanggan',$nama);
        $this->db->where('email_pelanggan',$email);
        return $this->db->get('pelanggan')->row_array();
    }

    function getNama($email,$idUser){
        $this->db->select('nama_pelanggan');
        $this->db->where('email_pelanggan',$email);
        $this->db->where('id_user',$idUser);
        return $this->db->get('pelanggan')->row()->nama_pelanggan;
    }
}

?>