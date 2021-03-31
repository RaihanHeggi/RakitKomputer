<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

	public function index()
	{
		$this->load->model("user","user_model");
		$this->load->model("pelanggan","pelanggan_model");
		$this->load->model("admin","admin_model");
		$this->load->model("konsultan","konsultan_model");
		$this->load->model("manajer","manajer_model");
		$this->load->view('login/ViewLogin');
	}


	public function loginProses($nama,$password){
		$data_session = array(
			'nama' => $email,
			'password' => $password
		);
		$isUser = $this->pelanggan_model->cekData($nama,$password); 
		$isAdmin = $this->admin_model->cekData($nama,$password);
		$isKonsultan = $this->konsultan_model->cekData($nama,$password);
		$isManajer = $this->manajer_model->cekData($nama,$password);
		if($isUser){
			$this->session->set_userdata($data_session);
			$this->session->set_userdata("Status", "User");
			redirect('HomeControllerUser');
		}else if ($isAdmin){
			$this->session->set_userdata($data_session);
			$this->session->set_userdata("Status", "Admin");
			redirect('HomeControllerAdminr');
		}else if($isKonsultan){
			$this->session->set_userdata($data_session);
			$this->session->set_userdata("Status", "Konsultan");
			redirect('HomeControllerKonsultan');
		}else{
			$this->session->set_userdata($data_session);
			$this->session->set_userdata("Status", "Manajer");
			redirect('HomeControllerManajer');
		}
		
	}

	public function loginController(){
		$username = $this->input->post('username');
		$password = $this->input->post('password')
		if($this->pelanggan_model->cekData($nama,$password) || $this->admin_model->cekData($nama,$password) || $this->konsultan_model->cekData($nama,$password) || $this->manajer_model->cekData($nama,$password)){
			loginProses($nama,$password);
		}else if ($this->user_model->cekData($nama,$password){
			loginProses($nama,$password);
		}else{
			$this->session->set_flashdata('error_messages','<div class="alert alert-danger alert-dismissible fade show" role="alert">
             Username dan Password Tidak Sesuai. </div>'); 
            redirect(base_url());
		}
	}
}
