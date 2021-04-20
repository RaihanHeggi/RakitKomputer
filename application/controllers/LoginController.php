<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

	function __construct()
    {
		parent::__construct();
        $this->load->model("user_model","user");
		$this->load->model("pelanggan_model","pelanggan");
		#$this->load->model("admin","admin_model");
		$this->load->model("konsultan_model","konsultan");
		#$this->load->model("manajer","manajer_model");
        #$this->load->model('modelRS');  
        #$this->load->model('LoginModel');
        $this->load->helper('url');  
    }

	public function index()
	{
		$this->load->view('login/ViewLogin');
	}

	public function loginProses($email,$password,$idUser){
		$isUser = $this->pelanggan->cekData($email); 
		//$isAdmin = $this->admin_model->cekData($nama,$password);
		$isKonsultan = $this->konsultan->cekData($email);
		//$isManajer = $this->manajer_model->cekData($nama,$password);
		$statusLogin = "";
		if($isUser){
			$nama_user = $this->pelanggan->getNama($email,$idUser);
			$data_session = array(
				'email' => $email,
				'password' => $password,
				'nama' => $nama_user
			);
			$this->session->set_userdata($data_session);
			$this->session->set_userdata("Status", "User");
			$statusLogin = "Pelanggan";
		//}else if ($isAdmin){
			//$this->session->set_userdata($data_session);
			//$this->session->set_userdata("Status", "Admin");
			//redirect('HomeControllerAdminr');
		}else if($isKonsultan){
			$nama_user = $this->konsultan->getNama($email,$idUser);
			$data_session = array(
				'email' => $email,
				'password' => $password,
				'nama' => $nama_user
			);
			$this->session->set_userdata($data_session);
			$this->session->set_userdata("Status", "Konsultan");
			$statusLogin = "Konsultan";
		//}else{
		//	$this->session->set_userdata($data_session);
		//	$this->session->set_userdata("Status", "Manajer");
		//	redirect('HomeControllerManajer');
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
				redirect('login');
			}else {
				redirect('login');
			}
		}else{
			$this->session->set_flashdata('error_messages','<div class="alert alert-danger alert-dismissible fade show" role="alert">
             Username dan Password Tidak Sesuai. </div>'); 
            redirect(base_url());
		}
	}
}
