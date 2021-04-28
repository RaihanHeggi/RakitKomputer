<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PesananController extends CI_Controller {

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

    public function updateData(){
        $idPesanan = $this->input->post('id');
        $metodePembayaran = $this->input->post('metode');
        $data = array(
            'metode_pembayaran' => $metodePembayaran,
            'status' => 'SUDAH BAYAR'
        );
        $this->pesanan->updateData($idPesanan,$data);
        redirect('halaman_pesanan');
    }


}