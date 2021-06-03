<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

	function __construct()
    {
		parent::__construct();
        $this->load->model("user_model","user");
		$this->load->model("pelanggan_model","pelanggan");
		$this->load->model("admin_model","admin");
		$this->load->model("konsultan_model","konsultan");
		$this->load->model("manajer_model","manajer");
        $this->load->helper('url');  
    }

	public function index()
	{
		$this->load->view('login/ViewLogin');
	}

	private function setStatus($email,$password,$nama,$status){
		$data_session = array(
			'email' => $email,
			'password' => $password,
			'nama' => $nama
		);
		$this->session->set_userdata($data_session);
		$this->session->set_userdata("Status", $status);
		$statusLogin = $status;
		return $statusLogin;
	}

	private function redirectPage($status){
		if ($status == "Pelanggan"){
			redirect('PelangganController');
		}else if($status == "Konsultan"){
			redirect('KonsultanController');
		}else if ($status == "Manajer"){
			redirect('halaman_manajer');
		}else {
			redirect('index_admin');
		}
	}

	private function loginProses($email,$password,$idUser){
		$isUser = $this->pelanggan->cekData($idUser); 
		$isAdmin = $this->admin->cekData($idUser);
		$isKonsultan = $this->konsultan->cekData($idUser);
		$isManajer = $this->manajer->cekData($idUser);
		$statusLogin = "";
		if($isUser){
			$nama_user = $this->pelanggan->getNama($idUser);
			$statusLogin = $this->setStatus($email,$password,$nama_user,"Pelanggan");
		}else if ($isAdmin){
			$nama_admin = $this->admin->getNama($idUser);
			$statusLogin = $this->setStatus($email,$password,$nama_admin,"Admin");
		}else if($isKonsultan){
			$nama_konsultan = $this->konsultan->getNama($idUser);
			$statusLogin = $this->setStatus($email,$password,$nama_konsultan,"Konsultan");
		}else{
			$nama_manajer = $this->admin->getNama($idUser);
			$statusLogin = $this->setStatus($email,$password,$nama_manajer,"Manajer");
		}
		return $statusLogin;
	}

	public function loginStep(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		if($this->user->cekDataEmail($email,$password)){
			$idUser = $this->user->getIDEmail($email,$password);
			$status = $this->loginProses($email,$password,$idUser);
			$this->redirectPage($status);
		}else{
			$this->session->set_flashdata('info','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Username dan Password Tidak Sesuai. </div>'); 
            redirect('login');
		}
	}
}
