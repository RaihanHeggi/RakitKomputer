<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PelangganController extends CI_Controller {

	public function index()
	{
		$this->load->view('pelanggan/PelangganController');
	}
}