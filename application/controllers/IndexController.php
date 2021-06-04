<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IndexController extends CI_Controller {

	function __construct()
    {
		parent::__construct();
        $this->load->model("user_model","user");
		$this->load->model("pelanggan_model","pelanggan");
		#$this->load->model("admin","admin_model");
		$this->load->model("konsultan_model","konsultan");
		#$this->load->model("manajer","manajer_model");
        $this->load->model('pesanan_model',"pesanan");  
        $this->load->model('barang_model','barang');
        $this->load->helper('url');  
    }

	public function index()
	{
		$this->load->view('IndexPage');
	}

	public function pesananMenu(){
		$nama = $this->session->userdata('nama');
		$email = $this->session->userdata('email');
		if(($nama != NULL) && ($email != NULL)){
			$idUser = $this->user->getIDByEmail($email);
			$dataPelanggan = $this->pelanggan->getDataUser($nama,$idUser);
			$dataPesanan = $this->pesanan->getData($dataPelanggan['id_pelanggan']);
			$dataBarang = array();
			foreach ($dataPesanan as $dp){
				if($dp['status'] != 'BARANG TIDAK TERSEDIA'){
					$namaBarang = $this->barang->getNamaBarang($dp['id_barang']);
					array_push($dataBarang, array(
							'id' => $dp['id_pesanan'],
							'nama_barang' => $namaBarang,
							'status' => $dp['status'],
							'harga' => $dp['total_harga']
						)
					);
				}else{
					continue;
				}
			}
			$data['data_pesanan'] = $dataBarang;
			$this->load->view('pelanggan/ViewPesanan',$data);
		}else{
			$this->session->set_flashdata('error_messages',' <div><label for="Alert" style="color:green">User Tidak Valid</label></div>');
			redirect('halaman_pelanggan');
		}
		
	}

	public function updateAdmin(){
		$data['main_content'] = 'admin/tambahDataAdmin';
		$this->load->view('template/adminTemplate',$data);
	}

	public function dataKonsultan(){
		$data['data_konsultan'] = $this->konsultan->getAllData();
		$this->load->view('pelanggan/ViewKonsultasi',$data);
	}

	public function dataKonsultasi(){
		$data['data_konsultan'] = $this->konsultan->getDataKonsultasi();
		$this->load->view('konsultan/ViewKonsul',$data);
	}

	public function formKonsultasi($id){
		$nama = $this->session->userdata('nama');
		$email = $this->session->userdata('email');
		if(($nama != NULL) && ($email != NULL)){
			$idUser = $this->user->getIDByEmail($email);
			$dataPelanggan = $this->pelanggan->getDataUser($nama,$idUser);
			$data['data'] = array(
				'id_konsultan' => $id,
				'id_pelanggan' => $dataPelanggan['id_pelanggan']
			);
			$this->load->view('pelanggan/FormKonsultasi',$data);
		}else{
			$this->session->set_flashdata('error_messages',' <div><label for="Alert" style="color:green">User Tidak Valid</label></div>');
			redirect('halaman_pelanggan');
		}
	}
}
