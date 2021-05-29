<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PelangganController extends CI_Controller {

	function __construct()
    {
		parent::__construct();
        $this->load->model("user_model","user");
		$this->load->model("pelanggan_model","pelanggan");
		$this->load->model("admin_model","admin");
		$this->load->model("konsultan_model","konsultan");
		$this->load->model("manajer_model","manajer");
		$this->load->model('barang_model','barang');
		$this->load->model('pesanan_model','pesanan');
        $this->load->helper('url');  
    }

	public function index()
	{
		$data['data_barang'] = $this->barang->getAllData();
		$this->load->view('pelanggan/ViewPelanggan',$data);
	}

	public function addPesanan($idBarang){
		$userEmail = $this->session->userdata('email');
		$idUser = $this->user->getIdByEmail($userEmail);
		$idPelanggan = $this->pelanggan->getIdPelanggan($idUser);
		$dataBarang = $this->barang->getHargaBarang($idBarang);
		if(($idUser == NULL) && ($idPelanggan == NULL)){
			$this->session->set_flashdata('error_messages',' <div><label for="Alert" style="color:red">Data Tidak Lengkap</label></div>');
			redirect('halaman_pelanggan');
		}else{
			$data = array(
				'total_harga' => $dataBarang,
				'id_barang' => $idBarang,
				'id_pelanggan' => $idPelanggan,
				'status' => 'BELUM BAYAR',
				'tanggal' => date("Y-m-d"),
			);
			$this->pesanan->insertData($data);
			redirect('halaman_pesanan');
		}
	}

	public function editProfilePelanggan(){
		$email = $this->session->userdata('email');
		$idUser = $this->user->getIdByEmail($email);
		$data['data_pelanggan'] = $this->pelanggan->getDataId($idUser);
		$this->load->view('pelanggan/editProfilePelanggan',$data);
	}

	public function editProfile(){
		$nama = $this->input->post('namapelanggan');
		$alamat = $this->input->post('alamat');
		$email = $this->input->post('email');
		$idUser = $this->input->post('iduser');
		$idPelanggan = $this->input->post('idpelanggan');
		if(!((ctype_space($nama)) || (ctype_space($alamat)) || (ctype_space($email)) || (ctype_space($idUser)) || (ctype_space($idPelanggan)))){
			$dataPelanggan = array(
				'nama_pelanggan' => $nama,
				'alamat_pelanggan' => $alamat,
				'email_pelanggan'=> $email
			);
			$dataUser = array(
				'email' => $email
			);
			$this->pelanggan->editData($idPelanggan,$dataPelanggan);
			$this->user->editDataUser($idUser,$dataUser);
			$this->session->set_userdata('email',$email);
			$this->session->set_flashdata('info', '<div><label for="Alert" style="color:green">Data Berhasil Dirubah</label></div>');
			redirect('profile_pelanggan');
		}else{
			$this->session->set_flashdata('info', '<div><label for="Alert" style="color:red">Data Tidak Lengkap</label></div>');
			redirect('profile_pelanggan');
		}

	}
}
