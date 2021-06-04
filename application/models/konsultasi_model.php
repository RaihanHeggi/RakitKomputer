<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class konsultasi_model extends CI_Model {

	public function getAll($user) {
		if($user['Status'] != NULL) {
			if($user['Status'] == 'Konsultan') {
				return $this->db->select('*')
						->from('konsultasi')
						->join('user', 'konsultasi.id_user = user.id_user')
						->get()->result_array();
			} else {
				$id_user = $this->getIDUser($user['email']);
				return $this->db->select('*')
						->where('konsultasi.id_user', $id_user['id_user'])
						->from('konsultasi')
						->join('user', 'konsultasi.id_user = user.id_user')
						->get()->result_array();
			}
		}
	}

	public function getIDUser($email) {
		return	$this->db->select('id_user')
						->from('user')
						->where('email', $email)
						->get()->row_array();
	}

	public function postKonsultasi($data) {
		$this->db->insert('konsultasi',$data);
		return $this->db->insert_id();
	}

	public function postKomentar($data) {
		return $this->db->insert('komentar', $data);
	}

}

/* End of file konsultasi_model.php */
