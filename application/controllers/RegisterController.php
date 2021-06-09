<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegisterController extends CI_Controller {

	function __construct()
    {
		parent::__construct();
        $this->load->model("user_model","user");
		$this->load->model("pelanggan_model","pelanggan");
		$this->load->model("admin_model","admin");
		$this->load->model("konsultan_model","konsultan");
		$this->load->model("manajer_model","manajer");
        #$this->load->model('modelRS');  
        #$this->load->model('LoginModel');
        $this->load->helper('url');  
		$this->load->library('unit_test');
    }

	public function index()
	{
		$this->load->view('login/ViewRegister');
	}
	
	# =================== fungsi - fungsi input data ===================
	
	function inputDataPelanggan($nama, $alamat, $email, $userID) {
		$dataPelanggan = array(
			'nama_pelanggan' => $nama,
			'alamat_pelanggan' => $alamat,
			'email_pelanggan' => $email,
			'id_user' => $userID
		);
		$this->pelanggan->insertData($dataPelanggan);
		$this->session->set_flashdata('error_messages',' <div><label for="Alert" style="color:green">Silahkan Melakukan Login</label></div>');
	}
	
	function inputDataKonsultan($nama, $alamat, $email, $userID) {
		$dataKonsultan = array(
			'nama_konsultan' => $nama,
			'alamat_konsultan' => $alamat,
			'email_konsultan' => $email,
			'id_user' => $userID
		);
		$this->konsultan->insertData($dataKonsultan);
		$this->session->set_flashdata('error_messages',' <div><label for="Alert" style="color:green">Silahkan Melakukan Login</label></div>');
	}
	
	function inputDataManajer($nama, $alamat, $userID) {
		$dataManajer = array(
			'nama_manajer' => $nama,
			'alamat_manajer' => $alamat,
			'id_user' => $userID
		);
		$this->manajer->insertData($dataManajer);
		$this->session->set_flashdata('info', '<div><label for="Alert" style="color:green">Data Berhasil Ditambahkan</label></div>');
	}
	
	function inputDataAdmin($nama, $alamat, $userID) {
		$dataAdmin = array(
			'nama_admin' => $nama,
			'alamat_admin' => $alamat,
			'id_user' => $userID
		);
		$this->admin->insertData($dataAdmin);
		$this->session->set_flashdata('info', '<div><label for="Alert" style="color:green">Data Berhasil Ditambahkan</label></div>');
	}

	# ==================================================
	
	public function registerData(){
		$nama = $this->input->post('nama');
		$email = $this->input->post('email'); 
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$rePassword = $this->input->post('re-password');
		$role = $this->input->post('role');
		$alamat = $this->input->post('alamat');

		if ($nama != NULL && $email != NULL && $username != NULL && $password != NULL && $role != NULL && $alamat != NULL){
			if (!$this->user->cekData($username,$email))
			{
				if ($password == $rePassword){
					$dataUser = array(
						'username' => $username,
						'password' => $password,
						'email' => $email
					);
					$this->user->insertData($dataUser);
					$userID = $this->user->getID($username,$email);
					
					#Input data sesuai role yang dipilih
					if ($role == "Konsultan"){
						$this->inputDataKonsultan($nama, $alamat, $email, $userID);
					}else if ($role == "Pelanggan"){
						$this->inputDataPelanggan($nama, $alamat, $email, $userID);
					}else if ($role == "Manajer"){
						$this->inputDataManajer($nama, $alamat, $userID);
						redirect('tambah_data_admin');
					}else if($role == "Admin"){
						$this->inputDataAdmin($nama, $alamat, $userID);
						redirect('tambah_data_admin');
					}
					redirect('halaman_register');
					return TRUE;
				#Jika password dan re-password tidak sama
				} else { 
					$this->session->set_flashdata('error_messages',' <div><label for="Alert" style="color:red">Password Tidak Sama</label></div>');
					redirect('halaman_register');
					return FALSE;
				}
			} else {
				if(($role == "Manajer" )||($role == "Admin")){
					$this->session->set_flashdata('info', '<div><label for="Alert" style="color:red">Data User Sudah Ada</label></div>');
					redirect('tambah_data_admin');
					return FALSE;
				}				
				$this->session->set_flashdata('error_messages',' <div><label for="Alert" style="color:red">User Sudah Pernah Mendaftar</label></div>');
				redirect('halaman_register');
				return FALSE;
			}
		#Jika terdapat input yang kosong
		} else {
			$this->session->set_flashdata('error_messages',' <div><label for="Alert" style="color:red">Input Harus Diisi</label></div>');
			redirect('halaman_register');
			return FALSE;
		}
	}

	# ============================= UNIT TESTING ================================== #

	public function registerDatatoTest($nama,$email,$username,$password,$rePassword,$role,$alamat){
		// $nama = $this->input->post('nama');
		// $email = $this->input->post('email'); 
		// $username = $this->input->post('username');
		// $password = $this->input->post('password');
		// $rePassword = $this->input->post('re-password');
		// $role = $this->input->post('role');
		// $alamat = $this->input->post('alamat');

		if ($nama != NULL && $email != NULL && $username != NULL && $password != NULL && $role != NULL && $alamat != NULL){
			if (!$this->user->cekData($username,$email))
			{
				if ($password == $rePassword){
					$dataUser = array(
						'username' => $username,
						'password' => $password,
						'email' => $email
					);
					$this->user->insertData($dataUser);
					$userID = $this->user->getID($username,$email);
					
					#Input data sesuai role yang dipilih
					if ($role == "Konsultan"){
						$this->inputDataKonsultan($nama, $alamat, $email, $userID);
						return TRUE;
					}else if ($role == "Pelanggan"){
						$this->inputDataPelanggan($nama, $alamat, $email, $userID);
						return TRUE;
					}else if ($role == "Manajer"){
						$this->inputDataManajer($nama, $alamat, $userID);
						return TRUE;
						// redirect('tambah_data_admin');
					}else if($role == "Admin"){
						$this->inputDataAdmin($nama, $alamat, $userID);
						return TRUE;
						// redirect('tambah_data_admin');
					}
					// redirect('halaman_register');
					return TRUE;
				#Jika password dan re-password tidak sama
				} else { 
					$this->session->set_flashdata('error_messages',' <div><label for="Alert" style="color:red">Password Tidak Sama</label></div>');
					// redirect('halaman_register');
					return FALSE;
				}
			} else {
				if(($role == "Manajer" )||($role == "Admin")){
					$this->session->set_flashdata('info', '<div><label for="Alert" style="color:red">Data User Sudah Ada</label></div>');
					// redirect('tambah_data_admin');
					return FALSE;
				}				
				$this->session->set_flashdata('error_messages',' <div><label for="Alert" style="color:red">User Sudah Pernah Mendaftar</label></div>');
				// redirect('halaman_register');
				return FALSE;
			}
		#Jika terdapat input yang kosong
		} else {
			$this->session->set_flashdata('error_messages',' <div><label for="Alert" style="color:red">Input Harus Diisi</label></div>');
			// redirect('halaman_register');
			return FALSE;
		}
	}

	//Unit Test Register
	public function testRegisterInputBenar(){
		$test = $this->registerDatatoTest('Bca Test','bcatest1@gmail.com','bca123','123','123','pelanggan','Jl Klayatan');
		$expected = TRUE;
		$test_name = "Tes Register dengan inputan benar";
		echo $this->unit->run($test,$expected,$test_name);
	}

	public function testRegisterSudahAda(){
		$test = $this->registerDatatoTest('Bca Test','bcatest1@gmail.com','bca123','123','123','pelanggan','Jl Klayatan');
		$expected = FALSE;
		$test_name = "Tes Register dengan inputan yang sudah ada alias sama seperti register sebelumnya";
		echo $this->unit->run($test,$expected,$test_name);
	}

	public function testRegisterDataKosong(){
		$test = $this->registerDatatoTest('','','','','','','');
		$expected = FALSE;
		$test_name = "Tes Register dengan inputan kosong";
		echo $this->unit->run($test,$expected,$test_name);
	}

	public function testRegisterPasswordTidakSama() {
		$test = $this->registerDatatoTest('mandiri test','mandiri_test@gmail.com','mandiri123','p@s$woRd.07+','passwordtidaksama','pelanggan','Jl Ahmad Yani');
		$expected = FALSE;
		$test_name = "Tes Register input password tidak sama";
		echo $this->unit->run($test,$expected,$test_name);
	}

	public function testRegisterInputRoleManager() {
		$test = $this->registerDatatoTest('npa test','npa_test@gmail.com','npa123','b@Rb13.6112L','b@Rb13.6112L','Manajer','Jl Bromo');
		$expected = TRUE;
		$test_name = "Tes Register Input dengan role manager";
		echo $this->unit->run($test,$expected,$test_name);
	}
}
