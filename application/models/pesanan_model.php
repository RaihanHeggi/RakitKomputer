<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class pesanan_model extends CI_Model{

    function __construct (){
        parent::__construct();
    }

    function insertData($data){
        return $this->db->insert('pesanan',$data);
    }

    function getData($idPelanggan){
        $this->db->where('id_pelanggan',$idPelanggan);
        return $this->db->get('pesanan')->result_array();
    }

    function updateData($id,$data){
        $this->db->where('id_pesanan',$id);
        return $this->db->update('pesanan',$data);
    }

}

?>