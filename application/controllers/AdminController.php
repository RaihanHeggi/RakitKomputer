<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

	function __construct()
    {
		parent::__construct();
		$this->load->model('barang_model','barang');
		$this->load->model('pelanggan_model','pelanggan');
		$this->load->model('user_model', 'user');
		$this->load->model('konsultan_model','konsultan');
		#$this->load->model("admin","admin_model");
        $this->load->helper('url');  
    }

	public function index()
	{
		$this->load->view('admin/indexAdmin');
	}

	//Fungsionalitas Barang 
	public function cekBarang(){
		$data['main_content'] = 'admin/indexBarang';
		$data['data_barang'] = $this->barang->getAllData();
		$this->load->view('template/adminTemplate',$data);
	}

	public function tambahBarang(){
		$data['main_content'] = 'admin/tambahBarang';
		$this->load->view('template/adminTemplate',$data);
	}

	public function editBarang($id){
		$data['main_content'] = 'admin/editBarang';
		$data['data_barang'] = $this->barang->getData($id);
		$this->load->view('template/adminTemplate',$data);
	}

	public function funcEditBarang($id_barang){
		// $data = array {
		// 	'nama_barang' => $this->input->post('nama_barang'),
		// 	'tipe_barang' => $this->input->post('tipe_barang'),
		// 	'merk_barang' => $this->input->post('merk_barang'),
		// 	'harga_barang' => $this->input->post('harga_barang'),
		// 	'stok_barang' => $this->input->post('stok_barang'),
		// };
		// $cek = $this->barang_model->updateBarang($id_barang, $data);
		// if ($cek) $this->session->set_flashdata('info', '<div><label for="Alert" style="color:green">Data Berhasil Diubah</label></div>');
		// else $this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		// Data Gagal Diubah </div>');
		// $data['data_barang'] = $this->barang->getAllData();
		// $this->load->view('admin/indexBarang',$data);
		$data['data_barang'] = $this->barang->getAllData();
		$this->load->view('admin/indexBarang',$data);
	}

	public function funcEditBarang2($id_barang){
		$data = array (
			'nama_barang' => $this->input->post('nama_barang'),
			'tipe_barang' => $this->input->post('tipe_barang'),
			'merk_barang' => $this->input->post('merk_barang'),
			'harga_barang' => $this->input->post('harga_barang'),
			'stok_barang' => $this->input->post('stok_barang')
		);
		$cek = $this->barang_model->updateBarang($id_barang, $data);
		if ($cek) $this->session->set_flashdata('info', '<div><label for="Alert" style="color:green">Data Berhasil Diubah</label></div>');
		else $this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		Data Gagal Diubah </div>');
		$data['data_barang'] = $this->barang->getAllData();
		$this->load->view('admin/indexBarang',$data);
	}

	//Fungsionalitas Data Pelanggan 
	public function cekPelanggan(){
		$data['main_content'] = 'admin/indexDataPelanggan';
		$dataPelanggan = $this->pelanggan->getAllData();
		$dataKirim = array();
		foreach ($dataPelanggan as $dp){
			$dataUser = $this->user->getDataById($dp['id_user']);
			array_push($dataKirim, array(
					'id' => $dp['id_pelanggan'],
					'nama' => $dp['nama_pelanggan'],
					'username' => $dataUser['username'],
					'email' => $dataUser['email'],
					'alamat' => $dp['alamat_pelanggan']
				)
			);
		};
		$data['data_pelanggan'] = $dataKirim;
		$this->load->view('template/adminTemplate',$data);
	}


	//Fungsionalitas Data Konsultan 
	public function cekKonsultan(){
		$data['main_content'] = 'admin/indexDataKonsultan';
		$dataKonsultan = $this->konsultan->getAllData();
		$dataKirim = array();
		foreach ($dataKonsultan as $dp){
			$dataUser = $this->user->getDataById($dp['id_user']);
			array_push($dataKirim, array(
					'id' => $dp['id_konsultan'],
					'nama' => $dp['nama_konsultan'],
					'username' => $dataUser['username'],
					'email' => $dataUser['email'],
					'alamat' => $dp['alamat_konsultan']
				)
			);
		};
		$data['data_konsultan'] = $dataKirim;
		$this->load->view('template/adminTemplate',$data);
	}

	
}
