<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KonsultanController extends CI_Controller {

	function __construct()
    {
		parent::__construct();
        $this->load->model("user_model","user");
		$this->load->model("pelanggan_model","pelanggan");
		$this->load->model("admin_model","admin");
		$this->load->model("konsultan_model","konsultan");
		$this->load->model("manajer_model","manajer");
		$this->load->model('barang_model','barang');
        $this->load->helper('url');  
    }
	
	public function index()
	{
		$data['data_barang'] = $this->barang->getAllData();
		$this->load->view('konsultan/ViewKonsultan.php',$data);
	}

	public function editProfileKonsultan(){
		$email = $this->session->userdata('email');
		$idUser = $this->user->getIdByEmail($email);
		$data['data_konsultan'] = $this->konsultan->getDataId($idUser);
		$this->load->view('konsultan/editProfileKonsultan',$data);
	}

	public function editProfile(){
		$nama = $this->input->post('namakonsultan');
		$alamat = $this->input->post('alamat');
		$email = $this->input->post('email');
		$idUser = $this->input->post('iduser');
		$idkonsultan = $this->input->post('idkonsultan');
		if(!((ctype_space($nama)) || (ctype_space($alamat)) || (ctype_space($email)) || (ctype_space($idUser)) || (ctype_space($idkonsultan)))){
			$datakonsultan = array(
				'nama_konsultan' => $nama,
				'alamat_konsultan' => $alamat,
				'email_konsultan'=> $email
			);
			$dataUser = array(
				'email' => $email
			);
			$this->konsultan->editData($idkonsultan,$datakonsultan);
			$this->user->editDataUser($idUser,$dataUser);
			$this->session->set_userdata('nama',$nama);
			$this->session->set_userdata('email',$email);
			$this->session->set_flashdata('info', '<div><label for="Alert" style="color:green">Data Berhasil Dirubah</label></div>');
			redirect('profile_konsultan');
		}else{
			$this->session->set_flashdata('info', '<div><label for="Alert" style="color:red">Data Tidak Lengkap</label></div>');
			redirect('profile_konsultan');
		}
	}
}
