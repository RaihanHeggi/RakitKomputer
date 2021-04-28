<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IndexController extends CI_Controller {

	function __construct()
    {
		parent::__construct();
        $this->load->model("user_model","user");
		$this->load->model("pelanggan_model","pelanggan");
		#$this->load->model("admin","admin_model");
		$this->load->model("konsultan_model","konsultan");
		#$this->load->model("manajer","manajer_model");
        $this->load->model('pesanan_model',"pesanan");  
        $this->load->model('barang_model','barang');
        $this->load->helper('url');  
    }

	public function index()
	{
		$this->load->view('IndexPage');
	}

	public function pesananMenu(){
		$nama = $this->session->userdata('nama');
		$email = $this->session->userdata('email');
		if(($nama != NULL) && ($email != NULL)){
			$dataPelanggan = $this->pelanggan->getDataUser($nama,$email);
			$dataPesanan = $this->pesanan->getData($dataPelanggan['id_pelanggan']);
			$dataBarang = array();
			foreach ($dataPesanan as $dp){
				$namaBarang = $this->barang->getNamaBarang($dp['id_barang']);
				array_push($dataBarang, array(
						'id' => $dp['id_pesanan'],
						'nama_barang' => $namaBarang,
						'status' => $dp['status'],
						'harga' => $dp['total_harga']
					)
				);
			}
			$data['data_pesanan'] = $dataBarang;
			$this->load->view('pelanggan/ViewPesanan',$data);
		}else{
			$this->session->set_flashdata('error_messages',' <div><label for="Alert" style="color:green">User Tidak Valid</label></div>');
			redirect('halaman_pelanggan');
		}
		
	}
}
