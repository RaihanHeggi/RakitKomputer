<?php

class User extends CI_Model {
	
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


?>
