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

	public function getNamaBarang($id){
        $this->db->where('id_barang',$id);
        return $this->db->get('barang')->row()->nama_barang;
    }

	public function getHargaBarang($id){
        $this->db->where('id_barang',$id);
        return $this->db->get('barang')->row()->harga_barang;
    }

	public function getStokData($id){
        $this->db->where('id_barang',$id);
        return $this->db->get('barang')->row()->stok_barang;
    }

	function updateData($id,$data){
        $this->db->where('id_barang',$id);
        return $this->db->update('barang',$data);
    }

	public function hapusBarang($id_barang) {
		$this->db->where('id_barang', $id_barang);
		return $this->db->delete('barang');
	}
}

?>