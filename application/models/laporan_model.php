<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class laporan_model extends CI_Model{

    function __construct (){
        parent::__construct();
    }

    function insertData($data){
        return $this->db->insert('laporan_keuangan',$data);
    }

    function getData(){
        $this->db->select('tanggal_laporan');
        return $this->db->get('laporan_keuangan')->result_array();
    }

    function cekTanggal($tanggal){
        $this->db->where('tanggal_laporan',$tanggal);
        $query = $this->db->get('laporan_keuangan');
        if($query->num_rows() == 0){  
            return true;  
        }  
        else{  
            return false;       
        } 
    }

}

?>