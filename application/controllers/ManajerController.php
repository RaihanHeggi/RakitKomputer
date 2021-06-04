<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManajerController extends CI_Controller {

	function __construct()
    {
		parent::__construct();
		$this->load->model('pesanan_model','pesanan');
		$this->load->model("pelanggan_model","pelanggan");
		$this->load->model('laporan_model','laporan');
		$this->load->model('barang_model','barang');
        $this->load->helper('url');  
    }
	
	public function index()
	{
		$data['data_pesanan'] = $this->laporan->getData();
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

	public function exportToPDF($tanggal) {
        $pesanan= $this->pesanan->getDataSpecificTanggal($tanggal);
 
        $pdf = new \TCPDF();
        $pdf->AddPage();
        $pdf->SetFont('', 'B', 20);
        $pdf->Cell(115, 0, "Laporan Keuangan - ".$tanggal, 0, 1, 'L');
        $pdf->SetAutoPageBreak(true, 0);
 
        // Add Header
        $pdf->Ln(10);
        $pdf->SetFont('', 'B', 12);
        $pdf->Cell(10, 8, "No", 1, 0, 'C');
        $pdf->Cell(55, 8, "Metode Pembayaran", 1, 0, 'C');
        $pdf->Cell(35, 8, "Nama Barang", 1, 0, 'C');
		$pdf->Cell(50, 8, "Harga Barang", 1, 0, 'C');
        $pdf->Cell(40, 8, "Nama Pelanggan", 1, 1, 'C');
        $pdf->SetFont('', '', 12);
        foreach($pesanan as $k => $order) {
			if($order['status'] == "SUDAH BAYAR"){
				$namaPelanggan = $this->pelanggan->getNamaPelanggan($order['id_pelanggan']);
				$namaBarang = $this->barang->getNamaBarang($order['id_barang']);
           		$this->addRow($pdf, $k+1, $order, $namaPelanggan, $namaBarang);
			}else{
				continue;
			}
        }
        $tanggal = date('d-m-Y');
        $pdf->Output('Laporan Order - '.$tanggal.'.pdf'); 
    }
 
    private function addRow($pdf, $no, $order,$namaPelanggan, $namaBarang) {
        $pdf->Cell(10, 8, $no, 1, 0, 'C');
        $pdf->Cell(55, 8, $order['metode_pembayaran'], 1, 0, '');
        $pdf->Cell(35, 8, $namaBarang, 1, 0, 'C');
        $pdf->Cell(50, 8, $order['total_harga'], 1, 0, 'C');
        $pdf->Cell(40, 8, $namaPelanggan, 1, 1, 'L');
    }

}
