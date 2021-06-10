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
		$this->load->library('unit_test');
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

	public function logout() {
		$sess = $this->session->sess_destroy();
		redirect('login', 'refresh');
	}

	// UNIT TESTING SECTION  
	public function testLoginProses(){
		//True Value 
		$test_1 = $this->loginProses("heggi123",'heggi.sya@gmail.com','123',1);
		$expected_1 = "Konsultan";
		$test_name_1 = "Mengecek Fungsionalitas Login Proses Mengembalikan Status Konsultan";
		$test_2 = $this->loginProses("hafidz123",'hafidz123@gmail.com','123',2);
		$expected_2 = "Pelanggan";
		$test_name_2 = "Mengecek Fungsionalitas Login Proses Mengembalikan Status Pelanggan";
		$test_3 = $this->loginProses("hindia123",'hindia123@gmail.com','123',4);
		$expected_3 = "Admin";
		$test_name_3 = "Mengecek Fungsionalitas Login Proses Mengembalikan Status Admin";
		$test_4 = $this->loginProses("arga123",'argaz123@gmail.com','123',5);
		$expected_4 = "Manajer";
		$test_name_4 = "Mengecek Fungsionalitas Login Proses Mengembalikan Status Manajer";

		echo $this->unit->run($test_1,$expected_1,$test_name_1);
		echo $this->unit->run($test_2,$expected_2,$test_name_2);
		echo $this->unit->run($test_3,$expected_3,$test_name_3);
		echo $this->unit->run($test_4,$expected_4,$test_name_4);

		//False Value 
		$test_5 = $this->loginProses("hafidz123",'hafidz123@gmail.com','123',2);
		$expected_5 = "Konsultan";
		$test_name_5 = "Mengecek Fungsionalitas Login Proses Mengembalikan Status Konsultan";
		$test_6 = $this->loginProses("heggi123",'heggi.sya@gmail.com','123',1);
		$expected_6 = "Pelanggan";
		$test_name_6 = "Mengecek Fungsionalitas Login Proses Mengembalikan Status Pelanggan";
		$test_7 = $this->loginProses("arga123",'argaz123@gmail.com','123',5);
		$expected_7 = "Admin";
		$test_name_7= "Mengecek Fungsionalitas Login Proses Mengembalikan Status Admin";
		$test_8 = $this->loginProses("hindia123",'hindia123@gmail.com','123',4);
		$expected_8 = "Manajer";
		$test_name_8 = "Mengecek Fungsionalitas Login Proses Mengembalikan Status Manajer";

		echo $this->unit->run($test_5,$expected_5,$test_name_5);
		echo $this->unit->run($test_6,$expected_6,$test_name_6);
		echo $this->unit->run($test_7,$expected_7,$test_name_7);
		echo $this->unit->run($test_8,$expected_8,$test_name_8);
	}

	public function testRoleLogin(){
		$test_1 = $this->setStatus("heggi123",'heggi.sya@gmail.com','123',"Sya Raihan Heggi","Konsultan");
		$expected_1 = "Konsultan";
		$test_name_1 = "Mengecek Fungsionalitas Set Role Mengembalikan Status Konsultan";
		$test_2 = $this->setStatus("hafidz123",'hafidz123@gmail.com','123',"Hafidz","Pelanggan");
		$expected_2 = "Pelanggan";
		$test_name_2 = "Mengecek Fungsionalitas Set Role Mengembalikan Status Konsultan";
		
		echo $this->unit->run($test_1,$expected_1,$test_name_1);
		echo $this->unit->run($test_2,$expected_2,$test_name_2);
	}

}
