<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BarangController extends CI_Controller {

    function __construct()
    {
		parent::__construct();
		$this->load->model('barang_model');
		$this->load->model('barang');
        $this->load->helper('url');  
    }

	public function index()
	{
		$data['main_content'] = 'barang/ViewBarang';
		$data['page_title'] = 'Barang page';
		$data['barang'] = $this->barang_model->getAllData();
		$this->load->view('template/ViewHeader', $data);
	}

}
