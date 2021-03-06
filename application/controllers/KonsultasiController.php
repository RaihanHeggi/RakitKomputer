<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class KonsultasiController extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('konsultasi_model', 'konsultasi');
		$this->load->model('komentar_model', 'komentar');
		$this->load->helper('url');
		$this->load->helper('form');
		date_default_timezone_set('Asia/Jakarta');
	}
	

    public function index()
    {
		if(!$this->session->has_userdata('username')) {
			redirect('login', 'refresh');
		} else {
			$data['page_title'] = 'Konsultasi';
			$data['main_content'] = 'konsultasi/indexKonsultasi';
			$data['allKonsultasi'] = $this->konsultasi->getAll($this->session->userdata());
			$data['role'] = $this->session->userdata('Role');
 			$this->load->view('template/ViewHeader', $data);
		}
    }

	public function konsulDetail($id) {
		if(!$this->session->has_userdata('username')) {
			redirect('login', 'refresh');
		} else {
			$data['properti_konsultasi'] = $this->komentar->get_properti_konsultasi($id);
			$data['komentar'] = $this->komentar->getKomentar($id);
			$data['role'] = $this->session->userdata('Role');
			$data['page_title'] = 'Konsultasi';
			if($this->session->userdata('Role') != 'Konsultan') {
				if($data['properti_konsultasi']['username'] == $this->session->userdata('username')) {
					$data['main_content'] = 'konsultasi/indexDetail';
					$this->load->view('template/ViewHeader', $data);
				} else {
					redirect('konsultasi', 'refresh');
				}
				$this->session->set_userdata('current_url', current_url());
			} else {
				$data['main_content'] = 'konsultasi/indexDetail';
				$this->load->view('template/ViewHeader', $data);
			}
		}
		
	}

	public function postKonsultasi() {
		if(!$this->session->has_userdata('username')) {
			redirect('login', 'refresh');
		} else {
			$data['page_title'] = 'Post Konsultasi';
			$data['main_content'] = 'konsultasi/postKonsultasi';
			$data['role'] = $this->session->userdata('Role');
			$this->load->view('template/ViewHeader', $data, FALSE);
		}
		
	}

	public function sendKonsultasi() {
		if(!$this->session->has_userdata('username')) {
			redirect('login', 'refresh');
		} else {
			$date = new DateTime("now", new DateTimeZone('Asia/Jakarta') );
			$waktu = $date->format("Y-m-d H:i:s");

			$id_user = $this->konsultasi->getIDUser($this->session->userdata('email'));

			$dataKonsultasi = array(
				'judul' => $this->input->post('judul'),
				'id_user' => $id_user['id_user'],
				'timestamp' => $waktu,
			);
			$id_konsultasi = $this->konsultasi->postKonsultasi($dataKonsultasi);
			$dataKomentar = array(
				'id_konsultasi' => $id_konsultasi,
				'id_user' => $id_user['id_user'],
				'komentar' => $this->input->post('komentar'),
				'timestamp' => $waktu,
			);
			$this->konsultasi->postKomentar($dataKomentar);
			
			redirect('konsultasi');
		}
	}

	public function postKomentar() {
		if(!$this->session->has_userdata('username')) {
			redirect('login', 'refresh');
		} else {
			$waktu = date("Y-m-d H:i:s");
			$id_user = $this->konsultasi->getIDUser($this->session->userdata('email'));
			$dataKomentar = array(
				'id_konsultasi' => $this->input->post('id'),
				'id_user' => $id_user['id_user'],
				'komentar' => $this->input->post('komentar'),
				'timestamp' => $waktu,
			);

			$this->konsultasi->postKomentar($dataKomentar);
			$referred_from = $this->session->userdata('current_url');
			$this->session->unset_userdata('current_url');
			redirect($_SERVER['HTTP_REFERER'], 'refresh');
		}
	}

	public function postEditKomentar() {
		if(!$this->session->has_userdata('username')) {
			redirect('login', 'refresh');
		} else {
			$data = array(
				'komentar' => $this->input->post('komentar'),
			);
		
			$this->komentar->editKomentar($this->input->post('id'),$data);
			redirect($_SERVER['HTTP_REFERER'], 'refresh');
		}
	}

	public function deleteKomentar() {
		if(!$this->session->has_userdata('username')) {
			redirect('login', 'refresh');
		} else {
			$this->komentar->deleteKomentar($this->input->post('id'));
			redirect($_SERVER['HTTP_REFERER'], 'refresh');
		}
	}

}

/* End of file KonsultasiController.php */
