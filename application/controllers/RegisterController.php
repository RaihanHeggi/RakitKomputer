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
    }

	public function index()
	{
		$this->load->view('login/ViewRegister');
	}
	// test
	public function registerData(){
		$nama = $this->input->post('nama');
		$email = $this->input->post('email'); 
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$rePassword = $this->input->post('re-password');
		$role = $this->input->post('role');
		$alamat = $this->input->post('alamat');

		if($nama != NULL && $email != NULL && $username != NULL && $password != NULL && $role != NULL && $alamat != NULL){
			if(!$this->user->cekData($username,$email))
			{
				if($password == $rePassword){
					$dataUser = array(
						'username' => $username,
						'password' => $password,
						'email' => $email
					);
					$this->user->insertData($dataUser);
					$userID = $this->user->getID($username,$email);
					if ($role == "Konsultan"){
						$dataKonsultan = array(
							'nama_konsultan' => $nama,
							'alamat_konsultan' => $alamat,
							'email_konsultan' => $email,
							'id_user' => $userID
						);
						$this->konsultan->insertData($dataKonsultan);
						$this->session->set_flashdata('error_messages',' <div><label for="Alert" style="color:green">Silahkan Melakukan Login</label></div>');
					}else if ($role == "Pelanggan"){
						$dataPelanggan = array(
							'nama_pelanggan' => $nama,
							'alamat_pelanggan' => $alamat,
							'email_pelanggan' => $email,
							'id_user' => $userID
						);
						$this->pelanggan->insertData($dataPelanggan);
						$this->session->set_flashdata('error_messages',' <div><label for="Alert" style="color:green">Silahkan Melakukan Login</label></div>');
					}else if ($role == "Manajer"){
						$dataManajer = array(
							'nama_manajer' => $nama,
							'alamat_manajer' => $alamat,
							'id_user' => $userID
						);
						$this->manajer->insertData($dataManajer);
						$this->session->set_flashdata('info', '<div><label for="Alert" style="color:green">Data Berhasil Ditambahkan</label></div>');
						redirect('tambah_data_admin');
					}else if($role == "Admin"){
						$dataAdmin = array(
							'nama_admin' => $nama,
							'alamat_admin' => $alamat,
							'id_user' => $userID
						);
						$this->admin->insertData($dataAdmin);
						$this->session->set_flashdata('info', '<div><label for="Alert" style="color:green">Data Berhasil Ditambahkan</label></div>');
						redirect('tambah_data_admin');
					}
					redirect('halaman_register');
				}else{
					$this->session->set_flashdata('error_messages',' <div><label for="Alert" style="color:red">Password Tidak Sama</label></div>');
					redirect('halaman_register');
				}
			}else{
				if(($role == "Manajer" )||($role == "Admin")){
					$this->session->set_flashdata('info', '<div><label for="Alert" style="color:red">Data User Sudah Ada</label></div>');
					redirect('tambah_data_admin');
				}				
				$this->session->set_flashdata('error_messages',' <div><label for="Alert" style="color:red">User Sudah Pernah Mendaftar</label></div>');
				redirect('halaman_register');
			}
		}else{
			$this->session->set_flashdata('error_messages',' <div><label for="Alert" style="color:red">Input Harus Diisi</label></div>');
			redirect('halaman_register');
		}
	}
}
