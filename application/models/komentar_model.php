<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class komentar_model extends CI_Model {

	public function get_properti_konsultasi($id_konsultasi) {
		return 	$this->db->where('id_konsultasi', $id_konsultasi)
						->join('user', 'konsultasi.id_user = user.id_user')
						->get('konsultasi')->row_array();
	}

	public function getKomentar($id_konsultasi) {
		return 	$this->db->select('*')
						->from('komentar')
						->where('id_konsultasi', $id_konsultasi)
						->join('user', 'komentar.id_user = user.id_user')
						->get()->result_array();

	}

	public function editKomentar($id,$data) {
		return 	$this->db->where('id_komentar', $id)
				->update('komentar', $data);
	}

	public function deleteKomentar($id) {
		return 	$this->db->where('id_komentar', $id)
				->delete('komentar');
	}

}

/* End of file komentar_model.php */
