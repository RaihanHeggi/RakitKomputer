<?php

class user extends CI_Model {
	
	function _construct() {
		parent::__construct();
	}

	public function createUser($data) {
		return $this->db->insert('user', $data);
	}

	public function updateUser($id_user, $data) {
		$this->db->where('id_user', $id_user);
		return $this->db->update('user', $data);
	}

	public function deleteUser($id_user) {
		$this->db->where('id_user', $id_user);
		return $this->db->deletes('user');
	}

}



class pelanggan extends CI_Model {
	function _construct() {
		parent::__construct();
	}

	public function viewBarang($id_barang) {
		$this->db->where('id_barang', $id_barang);
		return $this->db->get('barang')->row_array();
	}

	public function buatPesanan($data) {
		return $this->db->insert('pesanan', $data);
	}
	
	// Pada bagian model, kontrol pesanan di model fungsinya hanya mengupdate apa yang diubah user
	public function kontrolPesanan($id_pesanan, $data) {
		$this->db->where('id_pesanan', $id_pesanan);
		return $this->db->update('pesanan', $data);
	}

	public function getId($namaPelanggan, $alamatPelanggan) {
		$this->db->where('namaPelanggan', $namaPelanggan);
		$this->db->where('alamatPelanggan', $alamatPelanggan);
		$this->db->select('id_pelanggan');
		$query = $this->db->get('pelanggan');
		return $query;
	}

	public function getNama($id_user) {
		$this->db->where('id_user', $id_user);
		$this->db->select('namaPelanggan');
		$query = $this->db->get('pelanggan');
		return $query;
	}

	public function getAlamat($id_user) {
		$this->db->where('id_user', $id_user);
		$this->db->select('alamatPelanggan');
		$query = $this->db->get('pelanggan');
		return $query;
	}	
	
}

?>
