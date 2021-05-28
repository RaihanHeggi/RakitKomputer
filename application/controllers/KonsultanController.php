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
}
