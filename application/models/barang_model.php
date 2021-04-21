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

    //Fungsi Sudah Disiapkan 
    public function createBarang($data) {
		return $this->db->insert('user', $data);
	}

	public function updateUser($id_barang, $data) {
		$this->db->where('id_barang', $id_barang);
		return $this->db->update('barang', $data);
	}

	public function deleteUser($id_barang) {
		$this->db->where('id_barang', $id_barang);
		return $this->db->deletes('barang');
	}

	public function getId($id_barang) {
		$this->db->select('*');
		$this->db->where('id_barang', $id_barang);
		return $this->db->get('barang');
	}

	public function getSpecificNama($id_barang) {
		$this->db->select('namaBarang');
		$this->db->where('id_barang', $id_barang);
		return $this->db->get('barang');
	}

	public function getAllNama() {
		$this->db->select('namaBarang');
		return $this->db->get('barang');
	}

	public function getSpecificTipe($id_barang) {
		$this->db->select('tipeBarang');
		$this->db->where('id_barang', $id_barang);
		return $this->db->get('barang');
	}

	public function getAllTipe($id_barang) {
		$this->db->select('tipeBarang');
		return $this->db->get('barang');
	}

	public function getSpecificMerk($id_barang) {
		$this->db->select('merkBarang');
		$this->db->where('id_barang', $id_barang);
		return $this->db->get('barang');
	}

	public function getAllMerk() {
		$this->db->select('merkBarang');
		return $this->db->get('barang');
	}
	
	public function getSpecificHarga($id_barang) {
		$this->db->select('hargaBarang');
		$this->db->where('id_barang', $id_barang);
		return $this->db->get('barang');
	}

	public function getAllHarga() {
		$this->db->select('hargaBarang');
		return $this->db->get('barang');
	}

	public function getSpecificStok($id_barang) {
		$this->db->select('stokBarang');
		$this->db->where('id_barang', $id_barang);
		return $this->db->get('barang');
	}

	public function getAllStok($id_barang) {
		$this->db->select('stokBarang');
		$this->db->where('id_barang', $id_barang);
		return $this->db->get('barang');
	}
}

?>