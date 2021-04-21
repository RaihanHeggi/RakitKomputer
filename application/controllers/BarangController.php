<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BarangController extends CI_Controller {

    function __construct()
    {
		parent::__construct();
		$this->load->model('barang_model','barang');
        $this->load->helper('url');  
    }

}