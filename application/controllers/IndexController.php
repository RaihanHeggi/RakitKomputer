<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IndexController extends CI_Controller {

	public function index()
	{
		$this->load->view('IndexPage');
	}
}
