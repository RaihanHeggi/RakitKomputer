<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class komentar_model extends CI_Model {

	public function get_properti_konsultasi($id) {
		return $this->db->where('id_konsultasi', $id)
						->join('user', 'konsultasi.id_user = user.id_user')
						->get('konsultasi')->row_array();
	}

	public function getKomentar($id) {
		return $this->db->select('*')
						->from('komentar')
						->where('id_konsultasi', $id)
						->join('user', 'komentar.id_user = user.id_user')
						->get()->result_array();

	}

}

/* End of file komentar_model.php */
