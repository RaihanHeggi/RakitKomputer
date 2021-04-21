<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class barang_model extends CI_Model{

    function __construct (){
        parent::__construct();
    }

    function insertData($data){
        return $this->db->insert('barang',$data);
    }

    public function getAllData(){
        return $this->db->get('barang')->result_array();
    }

    public function getData($id){
        $this->db->where('id_barang',$id);
        return $this->db->get('barang')->result_array();
    }

    public function updateBarang($id_barang, $data) {
		$this->db->where('id_barang', $id_barang);
		return $this->db->update('barang', $data);
	}
}

?>