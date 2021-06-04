<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

	function __construct()
    {
		parent::__construct();
		$this->load->model('barang_model','barang');
		$this->load->model('pelanggan_model','pelanggan');
		$this->load->model('user_model', 'user');
		$this->load->model('konsultan_model','konsultan');
		$this->load->model('pesanan_model','pesanan');
		$this->load->model("laporan_model","laporan");
        $this->load->helper('url');  
    }

	public function index()
	{
		$this->load->view('admin/indexAdmin');
	}

	//Fungsionalitas Barang 
	public function cekBarang(){
		$data['main_content'] = 'admin/indexBarang';
		$data['data_barang'] = $this->barang->getAllData();
		$this->load->view('template/adminTemplate',$data);
	}

	public function tambahBarang(){
		$data['main_content'] = 'admin/tambahBarang';
		$this->load->view('template/adminTemplate',$data);
	}

	public function editBarang($id){
		$data['main_content'] = 'admin/editBarang';
		$data['data_barang'] = $this->barang->getData($id);
		$this->load->view('template/adminTemplate',$data);
	}

	public function FuncTambahBarang(){
		$id_barang = $this->input->post('idbarang');
		$nama_barang = $this->input->post('namabarang');
		$tipe_barang =  $this->input->post('tipebarang');
		$merk_barang = $this->input->post('merkbarang');
		$harga_barang = $this->input->post('hargabarang');
		$stok_barang = $this->input->post('stokbarang');
		if(!((ctype_space($id_barang)) || (ctype_space($nama_barang)) || (ctype_space($tipe_barang)) || (ctype_space($merk_barang)) || (ctype_space($harga_barang)) || (ctype_space($stok_barang)))){
			$data = array (
				'nama_barang' => $nama_barang,
				'tipe_barang' => $tipe_barang,
				'merk_barang' => $merk_barang,
				'harga_barang' => $harga_barang,
				'stok_barang' => $stok_barang 
			);
			$cek = $this->barang->insertData($data);
			if ($cek) $this->session->set_flashdata('info', '<div><label for="Alert" style="color:green">Data Berhasil Diubah</label></div>');
			else $this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			Data Gagal Diubah </div>');
			redirect('data_barang');
		}else{
			$this->session->set_flashdata('info', '<div><label for="Alert" style="color:green">Data Tidak Lengkap</label></div>');
			redirect('data_barang');
		}
	}

	public function FuncEditBarang(){
		$id_barang = $this->input->post('idbarang');
		$nama_barang = $this->input->post('namabarang');
		$tipe_barang =  $this->input->post('tipebarang');
		$merk_barang = $this->input->post('merkbarang');
		$harga_barang = $this->input->post('hargabarang');
		$stok_barang = $this->input->post('stokbarang');
		if(!((ctype_space($id_barang)) || (ctype_space($nama_barang)) || (ctype_space($tipe_barang)) || (ctype_space($merk_barang)) || (ctype_space($harga_barang)) || (ctype_space($stok_barang)))){
			$data = array (
				'nama_barang' => $nama_barang,
				'tipe_barang' => $tipe_barang,
				'merk_barang' => $merk_barang,
				'harga_barang' => $harga_barang,
				'stok_barang' => $stok_barang 
			);
			$cek = $this->barang->updateData($id_barang, $data);
			if ($cek) $this->session->set_flashdata('info', '<div><label for="Alert" style="color:green">Data Berhasil Diubah</label></div>');
			else $this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			Data Gagal Diubah </div>');
			redirect('data_barang');
		}else{
			$this->session->set_flashdata('info', '<div><label for="Alert" style="color:green">Data Tidak Lengkap</label></div>');
			redirect('data_barang');
		}
	}

	public function FuncDeleteData($id){
		$this->barang->hapusBarang($id);
		$dataPesanan = $this->pesanan->getPesananByBarang($id);
		if($dataPesanan == NULL){
			redirect('data_barang');
		}else{
			foreach($dataPesanan as $dp){
				if(($dp['status'] == "SUDAH BAYAR") && ($dp['status'] == "BARANG TIDAK TERSEDIA")){
					continue;
				}else{
					$data = array(
						'status' => "BARANG TIDAK TERSEDIA"
					);
					$this->pesanan->updateData($dp['id_pesanan'],$data);
				}
				redirect('data_barang');
			}
		}
	}

	//Fungsionalitas Data Pelanggan 
	public function cekPelanggan(){
		$data['main_content'] = 'admin/indexDataPelanggan';
		$dataPelanggan = $this->pelanggan->getAllData();
		$dataKirim = array();
		foreach ($dataPelanggan as $dp){
			$dataUser = $this->user->getDataById($dp['id_user']);
			array_push($dataKirim, array(
					'id' => $dp['id_pelanggan'],
					'nama' => $dp['nama_pelanggan'],
					'username' => $dataUser['username'],
					'email' => $dataUser['email'],
					'alamat' => $dp['alamat_pelanggan']
				)
			);
		};
		$data['data_pelanggan'] = $dataKirim;
		$this->load->view('template/adminTemplate',$data);
	}


	//Fungsionalitas Data Konsultan 
	public function cekKonsultan(){
		$data['main_content'] = 'admin/indexDataKonsultan';
		$dataKonsultan = $this->konsultan->getAllData();
		$dataKirim = array();
		foreach ($dataKonsultan as $dp){
			$dataUser = $this->user->getDataById($dp['id_user']);
			array_push($dataKirim, array(
					'id' => $dp['id_konsultan'],
					'nama' => $dp['nama_konsultan'],
					'username' => $dataUser['username'],
					'email' => $dataUser['email'],
					'alamat' => $dp['alamat_konsultan']
				)
			);
		};
		$data['data_konsultan'] = $dataKirim;
		$this->load->view('template/adminTemplate',$data);
	}
	

	//Fungsionalitas Laporan Keuangan
	public function laporanKeuangan(){
		$data['main_content'] = 'admin/indexLaporanKeuangan';
		$dataPesanan = $this->pesanan->getTanggalData();
		$tempArray = array();
		foreach($dataPesanan as $dp){
			$namaPelanggan = $this->pelanggan->getNamaPelanggan($dp['id_pelanggan']);
			array_push($tempArray, array(
				'nama_pelanggan' => $namaPelanggan,
				'status' => $dp['status'],
				'tanggal' => $dp['tanggal']
				)
			);
		}
		$data['data_pesanan'] = $tempArray;
		$this->load->view('template/adminTemplate',$data);
	}

	public function addLaporan($tanggal){
		if($this->laporan->cekTanggal($tanggal)){
			$data = array(
				'tanggal_laporan' => $tanggal
			);
			$this->laporan->insertData($data);
			redirect('laporan_keuangan');
		}else {
			$this->session->set_flashdata('info', '<div><label for="Alert" style="color:red">Data Sudah Pernah Dimasukkan</label></div>');
			redirect('laporan_keuangan');
		}
	}

	public function dataLaporan($tanggal){
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
			$data['main_content'] = 'admin/spesifikDataLaporan';
			$data['data_pesanan'] = $arrayData;
			$this->load->view('template/adminTemplate',$data);
		}else{
			$this->session->set_flashdata('error_messages',' <div><label for="Alert" style="color:red">Data Tidak Lengkap</label></div>');
			redirect('laporan_keuangan');
		}
	}

}
