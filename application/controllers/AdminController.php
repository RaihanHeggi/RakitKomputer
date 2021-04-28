<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

	function __construct()
    {
		parent::__construct();
		$this->load->model('barang_model','barang');
		#$this->load->model("admin","admin_model");
        $this->load->helper('url');  
    }

	public function index()
	{
		$this->load->view('admin/indexAdmin');
	}

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
		$data['main_content'] = 'admin/tambahBarang';
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

	public function tambahBarang(){
		$this->load->view('admin/tambahBarang');
	}

	public function editBarang($id){
		$data['data_barang'] = $this->barang->getData($id);
		$this->load->view('admin/editBarang',$data);
	}

	public function funcEditBarang($id_barang){
		$data = array {
			'nama_barang' => $this->input->post('nama_barang')
			'tipe_barang' => $this->input->post('tipe_barang')
			'merk_barang' => $this->input->post('merk_barang')
			'harga_barang' => $this->input->post('harga_barang')
			'stok_barang' => $this->input->post('stok_barang')
		};
		$cek = $this->barang_model->updateBarang($id_barang, $data);
		if ($cek) $this->session->set_flashdata('info', '<div><label for="Alert" style="color:green">Data Berhasil Diubah</label></div>');
		else $this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		Data Gagal Diubah </div>');
		$data['data_barang'] = $this->barang->getAllData();
		$this->load->view('admin/indexBarang',$data);
	}

	
}
