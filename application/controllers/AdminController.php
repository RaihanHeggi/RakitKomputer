<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

	public function index()
	{
		$this->load->view('admin/indexAdmin');
	}

	public function cekBarang(){
		$this->load->view('admin/indexBarang');
	}
}
