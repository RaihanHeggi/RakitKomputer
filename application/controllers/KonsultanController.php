<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KonsultanController extends CI_Controller {

	public function index()
	{
		$this->load->view('konsultan/ViewKonsultan.php');
	}
}
