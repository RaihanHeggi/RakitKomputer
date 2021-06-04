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

	private function setStatus($username,$email,$password,$nama,$role){
		$data_session = array(
			'username' => $username,
			'email' => $email,
			'password' => $password,
			'nama' => $nama
		);
		$this->session->set_userdata($data_session);
		$this->session->set_userdata("Status", "User");
		$this->session->set_userdata('Role',$role);
		$roleLogin = $role;
		return $roleLogin;
	}

	private function redirectPage($status){
		if ($status == "Pelanggan"){
			redirect('PelangganController');
		}else if($status == "Konsultan"){
			redirect('KonsultanController');
		}else if ($status == "Manajer"){
			redirect('halaman_manajer');
		}else if ($status == "Admin"){
			redirect('index_admin');
		}else {
			$this->session->set_flashdata('info','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Username dan Password Tidak Sesuai. </div>'); 
			redirect('login');
		}
	}

	private function loginProses($username,$email,$password,$idUser){
		$isUser = $this->pelanggan->cekData($idUser); 
		$isAdmin = $this->admin->cekData($idUser);
		$isKonsultan = $this->konsultan->cekData($idUser);
		$isManajer = $this->manajer->cekData($idUser);
		$roleLogin = "";
		if($isUser){
			$nama_user = $this->pelanggan->getNama($idUser);
			$roleLogin = $this->setStatus($username,$email,$password,$nama_user,"Pelanggan");
		}else if ($isAdmin){
			$nama_admin = $this->admin->getNama($idUser);
			$roleLogin = $this->setStatus($username,$email,$password,$nama_admin,"Admin");
		}else if($isKonsultan){
			$nama_konsultan = $this->konsultan->getNama($idUser);
			$roleLogin = $this->setStatus($username,$email,$password,$nama_konsultan,"Konsultan");
		}else{
			$nama_manajer = $this->admin->getNama($idUser);
			$roleLogin = $this->setStatus($username,$email,$password,$nama_manajer,"Manajer");
		}
		return $roleLogin;
	}

	public function loginStep(){
		$loginAccount = $this->input->post('email');
		$password = $this->input->post('password');
		$isEmail = $this->user->cekDataEmail($loginAccount,$password);
		$isUsername = $this->user->cekDataUsername($loginAccount,$password);
		if($isEmail || $isUsername){
			if($isEmail){
				$idUser = $this->user->getIDEmail($loginAccount,$password);
				$username = $this->user->getDataUsernameByEmail($loginAccount);
				$status = $this->loginProses($username,$loginAccount,$password,$idUser);
				$this->redirectPage($status);
			}else if($isUsername){
				$email = $this->user->getDataEmailByUsername($loginAccount);
				$idUser = $this->user->getIDEmail($email,$password);
				$status = $this->loginProses($loginAccount,$email,$password,$idUser);
				$this->redirectPage($status);
			}else{
				$status = "not_found";
				$this->redirectPage($status);
			}		
		}else{
			$this->session->set_flashdata('info','<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Username dan Password Tidak Sesuai. </div>'); 
            redirect('login');
		}
	}
}
