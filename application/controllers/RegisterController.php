<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegisterController extends CI_Controller {

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
		$this->load->view('login/ViewRegister');
	}

	public function registerData(){
		$email = $this->input->post('email'); 
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$rePassword = $this->input->post('re-password');
		$role = $this->input->post('role');

		if($email != NULL && $username != NULL && $password != NULL && $role != NULL){
			if(!$this->user->cekData($username,$email))
			{
				if($password == $rePassword){
					$dataUser = array(
						'username' => $username,
						'password' => $password,
						'email' => $email
					);
					$this->user->insertData($dataUser);
				}else{
					echo "PASSWORD TIDAK SAMA";
				}
			}else{
				echo "EMAIL ATAU PASSWORD SUDAH TERDAFTAR";
			}
		}else{
			echo "INPUT TIDAK BOLEH NULL";
		}
	}
}
