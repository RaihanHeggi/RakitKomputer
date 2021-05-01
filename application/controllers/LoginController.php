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

	public function loginProses($email,$password,$idUser){
		$isUser = $this->pelanggan->cekData($idUser); 
		$isAdmin = $this->admin->cekData($idUser);
		$isKonsultan = $this->konsultan->cekData($idUser);
		$isManajer = $this->manajer->cekData($idUser);
		$statusLogin = "";
		if($isUser){
			$nama_user = $this->pelanggan->getNama($idUser);
			$data_session = array(
				'email' => $email,
				'password' => $password,
				'nama' => $nama_user
			);
			$this->session->set_userdata($data_session);
			$this->session->set_userdata("Status", "User");
			$statusLogin = "Pelanggan";
		}else if ($isAdmin){
			$nama_admin = $this->admin->getNama($idUser);
			$data_session = array(
				'email' => $email,
				'password' => $password,
				'nama' => $nama_admin
			);
			$this->session->set_userdata($data_session);
			$this->session->set_userdata("Status", "Admin");
			$statusLogin = "Admin";
		}else if($isKonsultan){
			$nama_user = $this->konsultan->getNama($idUser);
			$data_session = array(
				'email' => $email,
				'password' => $password,
				'nama' => $nama_user
			);
			$this->session->set_userdata($data_session);
			$this->session->set_userdata("Status", "Konsultan");
			$statusLogin = "Konsultan";
		}else{
			$nama_manajer = $this->admin->getNama($idUser);
			$data_session = array(
				'email' => $email,
				'password' => $password,
				'nama' => $nama_manajer
			);
			$this->session->set_userdata($data_session);
			$this->session->set_userdata("Status", "Manajer");
			$statusLogin = "Manajer";
		}
		return $statusLogin;
	}

	public function loginStep(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		if($this->user->cekDataEmail($email,$password)){
			$idUser = $this->user->getIDEmail($email,$password);
			$status = $this->loginProses($email,$password,$idUser);
			if ($status == "Pelanggan"){
				redirect('PelangganController');
			}else if($status == "Konsultan"){
				redirect('KonsultanController');
			}else if ($status == "Manajer"){
				redirect('halaman_manajer');
			}else {
				redirect('index_admin');
			}
		}else{
			$this->session->set_flashdata('error_messages','<div class="alert alert-danger alert-dismissible fade show" role="alert">
             Username dan Password Tidak Sesuai. </div>'); 
            redirect(base_url());
		}
	}
}
