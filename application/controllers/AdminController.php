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
}
