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
		$data['page_title'] = 'Konsultasi';
		$data['main_content'] = 'konsultasi/indexKonsultasi';
		$data['allKonsultasi'] = $this->konsultasi->getAll($this->session->userdata());
        $this->load->view('template/ViewHeader', $data);
    }

	public function konsulDetail($id) {
		$data['properti_konsultasi'] = $this->komentar->get_properti_konsultasi($id);
		$data['komentar'] = $this->komentar->getKomentar($id);

		$data['page_title'] = 'Konsultasi';

		if($this->session->userdata('Status') != 'Konsultan') {
			echo $data['properti_konsultasi']['username'];
			echo $this->session->userdata('username');
			if($data['properti_konsultasi']['username'] == $this->session->userdata('username')) {
				$data['main_content'] = 'konsultasi/indexDetail';
				$this->load->view('template/ViewHeader', $data);
			} else {
				$data['main_content'] = 'konsultasi/indexKonsultasi';
				$data['allKonsultasi'] = $this->konsultasi->getAll($this->session->userdata());
				$this->load->view('template/ViewHeader', $data);
			}
		} else {
			$data['main_content'] = 'konsultasi/indexDetail';
			$this->load->view('template/ViewHeader', $data);
		}
		
	}

	public function postKonsultasi() {
		$data['page_title'] = 'Post Konsultasi';
		$data['main_content'] = 'konsultasi/postKonsultasi';
		$this->load->view('template/ViewHeader', $data, FALSE);
		
	}

	public function sendKonsultasi() {
		$waktu = date("Y-m-d H:i:s");

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

	public function postKomentar() {
		$waktu = date("Y-m-d H:i:s");
		$id_user = $this->konsultasi->getIDUser($this->session->userdata('email'));
		$dataKomentar = array(
			'id_konsultasi' => $this->input->post('id'),
			'id_user' => $id_user['id_user'],
			'komentar' => $this->input->post('komentar'),
			'timestamp' => $waktu,
		);

		$this->konsultasi->postKomentar($dataKomentar);
		$referred_from = $this->session->userdata('referred_from');
		redirect($referred_from, 'refresh');
		$this->session->unset_userdata('referred_from');
	}

}

/* End of file KonsultasiController.php */
