<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class konsultan_model extends CI_Model{

    function __construct (){
        parent::__construct();
    }

    function insertData($data){
        return $this->db->insert('konsultan',$data);
    }

    function cekData($email){
        $this->db->where('email_konsultan',$email);
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

    function getNama($email,$idUser){
        $this->db->select('nama_konsultan');
        $this->db->where('email_konsultan',$email);
        $this->db->where('id_user',$idUser);
        return $this->db->get('konsultan')->row()->nama_konsultan;
    }
}

?>