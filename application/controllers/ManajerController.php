<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManajerController extends CI_Controller {

	function __construct()
    {
		parent::__construct();
		$this->load->model('pesanan_model','pesanan');
		$this->load->model("pelanggan_model","pelanggan");
		$this->load->model('barang_model','barang');
        $this->load->helper('url');  
    }
	
	public function index()
	{
		$data['data_pesanan'] = $this->pesanan->getTanggalData();
		$this->load->view('manajer/indexManajer.php',$data);
	}

	public function laporanKeuangan($tanggal){
		if($tanggal != NULL){
			$dataPesanan = $this->pesanan->getDataSpecificTanggal($tanggal);
			$arrayData = array();
			foreach($dataPesanan as $dp){
				if($dp['status'] == "SUDAH BAYAR"){
					$namaPelanggan = $this->pelanggan->getNamaPelanggan($dp['id_pelanggan']);
					$namaBarang = $this->barang->getNamaBarang($dp['id_barang']);
					$data = array(
						"id" => $dp['id_pesanan'],
                        "Metode Pembayaran" => $dp['metode_pembayaran'],
                       	"Nama Barang" => $namaBarang,
                        "Harga Barang" => $dp['total_harga'],
                        "Nama Pelanggan" => $namaPelanggan
					);	
					array_push($arrayData, $data);
				}else{
					continue;
				}
			}
			$data['data_pesanan'] = $arrayData;
			$this->load->view('manajer/laporanKeuangan.php',$data);
		}else{
			$this->session->set_flashdata('error_messages',' <div><label for="Alert" style="color:red">Data Tidak Lengkap</label></div>');
			redirect('halaman_manajer');
		}
	}
}
