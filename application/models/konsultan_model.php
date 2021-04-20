<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class konsultan_model extends CI_Model{

    function __construct (){
        parent::__construct();
    }

    function insertData($data){
        return $this->db->insert('pelanggan',$data);
    }

    function cekDataVerifikasi($nama,$email){
        $this->db->where('nama_pelanggan',$nama);
        $this->db->where('email_pelanggan',$email);
        $query = $this->db->get('user');
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
        return $this->db->get('user')->result_array();
    }
}

?>