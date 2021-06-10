<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PelangganController extends CI_Controller {

	function __construct()
    {
		parent::__construct();
        $this->load->model("user_model","user");
		$this->load->model("pelanggan_model","pelanggan");
		$this->load->model("admin_model","admin");
		$this->load->model("konsultan_model","konsultan");
		$this->load->model("manajer_model","manajer");
		$this->load->model('barang_model','barang');
		$this->load->model('pesanan_model','pesanan');
        $this->load->helper('url');  
    }

	//perbedaan pada rancangan dppl dengan fungsionalitas yang diterapkan antara lain dahulu rancangannya pesanan akan berisi beberapa barang, namun sekarang sifatnya menjadi individual
	//oleh karena itu maka ada sedikit penyesuaian dan perubahan dalam cara menampilkan, dan kelas-kelas yang terlibat sekarang kebanyakan langsung mengakses ke pesanan saja 


	//untuk edit profile sendiri yang dirubah itu lebih mengarah ke data pribadi pelanggan, konsultan dibandingkan user, seperti yang direncanakan dahulu 
	//sehingga kelas yang berinteraksi bukan lagi user dan database saja, namun sudah melibatkan data pelanggan dan konsultan


	//dahulu unique key atau primary keynya itu kebanyakan string namun diubah jadi integer jadi sedikit berbeda ketika memasukkan bukan string tapi sebuah integer 

	public function index()
	{
		$data['data_barang'] = $this->barang->getAllData();
		$this->load->view('pelanggan/ViewPelanggan',$data);
	}

	//profile edit

	//function to open profile edit menu
	public function editProfilePelanggan(){
		$email = $this->session->userdata('email');
		$idUser = $this->user->getIdByEmail($email);
		$data['data_pelanggan'] = $this->pelanggan->getDataId($idUser);
		$this->load->view('pelanggan/editProfilePelanggan',$data);
	}

	//function for edit the profile
	public function editProfile(){
		$nama = $this->input->post('namapelanggan');
		$alamat = $this->input->post('alamat');
		$email = $this->input->post('email');
		$idUser = $this->input->post('iduser');
		$idPelanggan = $this->input->post('idpelanggan');
		//parsing empty string 
		if(!((ctype_space($nama)) || (ctype_space($alamat)) || (ctype_space($email)) || (ctype_space($idUser)) || (ctype_space($idPelanggan)))){
			$dataPelanggan = array(
				'nama_pelanggan' => $nama,
				'alamat_pelanggan' => $alamat,
				'email_pelanggan'=> $email
			);
			$dataUser = array(
				'email' => $email
			);
			$this->pelanggan->editData($idPelanggan,$dataPelanggan);
			$this->user->editDataUser($idUser,$dataUser);
			$this->session->set_userdata('nama',$nama);
			$this->session->set_userdata('email',$email);
			$this->session->set_flashdata('info', '<div><label for="Alert" style="color:green">Data Berhasil Dirubah</label></div>');
			redirect('profile_pelanggan');
		//if empty string inputted
		}else{
			$this->session->set_flashdata('info', '<div><label for="Alert" style="color:red">Data Tidak Lengkap</label></div>');
			redirect('profile_pelanggan');
		}
	}

	//order 
	//pada menu ini dilakukan refactor dengan memisahkan methods menjadi max mengandung 2 kerjaan didalam 1 methods namun diusahakan hanya ada 1 
	// maka ada pelebaran dengan mmebuat dua fungsi arrayBuild dimana untuk menyusun array pesanan, dan addToArray fungsinya untuk memasukkan data yang dibuat kedalam array baru.
	
	//making array (built because there an error if the id_barang is not valid)
	public function arrayBuild($namaBarang, $barang){
		if ($namaBarang == NULL) {
			$dataPesanan = array(
				'id' => $barang['id_pesanan'],
				'nama_barang' => "Barang Sudah Tidak Dijual",
				'status' => $barang['status'],
				'harga' => $barang['total_harga']
			);
		}else{
			$dataPesanan = array(
				'id' => $barang['id_pesanan'],
				'nama_barang' => $namaBarang,
				'status' => $barang['status'],
				'harga' => $barang['total_harga']
			);
		}
		return $dataPesanan;
	}


	//add to array 
	public function addToArray($dataPesanan){
		$dataBarang = array();
		foreach ($dataPesanan as $dp){
			if($dp['status'] != 'BARANG TIDAK TERSEDIA'){
				$namaBarang = $this->barang->getNamaBarang($dp['id_barang']);
				array_push($dataBarang,$this->arrayBuild($namaBarang, $dp));
			}else{
				continue;
			}
		}
		return $dataBarang;
	}

	//get dataPesanan 
	public function getDataPesanan($nama, $email){
		$idUser = $this->user->getIDByEmail($email);
		$dataPelanggan = $this->pelanggan->getDataUser($nama,$idUser);
		$dataPesanan = $this->pesanan->getData($dataPelanggan['id_pelanggan']);
		return $dataPesanan;
	}

	//functionality of to open view of pesanan (order in customer side)
	public function pesananMenu(){
		$nama = $this->session->userdata('nama');
		$email = $this->session->userdata('email');
		if(($nama != NULL) && ($email != NULL)){
			$dataPesanan = $this->getDataPesanan($nama, $email);
			$dataBarang = $this->addToArray($dataPesanan);
			$data['data_pesanan'] = $dataBarang;
			$this->load->view('pelanggan/ViewPesanan',$data);
		}else{
			$this->session->set_flashdata('error_messages',' <div><label for="Alert" style="color:green">User Tidak Valid</label></div>');
			redirect('halaman_pelanggan');
		}
		
	}

	//main function for deleting pesanan (order)
	public function deletePesanan($id){
		$nama = $this->session->userdata('nama');
		$email = $this->session->userdata('email');
		if(($nama != NULL) && ($email != NULL)){
			$this->pesanan->deletePesanan($id);
			$dataPesanan = $this->getDataPesanan($nama, $email);
			$dataBarang = $this->addToArray($dataPesanan);
			$data['data_pesanan'] = $dataBarang;
			$this->load->view('pelanggan/ViewPesanan',$data);
		}else{
			$this->session->set_flashdata('error_messages',' <div><label for="Alert" style="color:green">User Tidak Valid</label></div>');
			redirect('halaman_pelanggan');
		}
	}

	public function addPesanan($idBarang){
		$userEmail = $this->session->userdata('email');
		$idUser = $this->user->getIdByEmail($userEmail);
		$idPelanggan = $this->pelanggan->getIdPelanggan($idUser);
		$dataBarang = $this->barang->getHargaBarang($idBarang);
		if(($idUser == NULL) && ($idPelanggan == NULL)){
			$this->session->set_flashdata('error_messages',' <div><label for="Alert" style="color:red">Data Tidak Lengkap</label></div>');
			redirect('halaman_pelanggan');
		}else{
			$data = array(
				'total_harga' => $dataBarang,
				'id_barang' => $idBarang,
				'id_pelanggan' => $idPelanggan,
				'status' => 'BELUM BAYAR',
				'tanggal' => date("Y-m-d"),
			);
			$this->pesanan->insertData($data);
			redirect('halaman_pesanan');
		}
	}


	//note by Sya Raihan Heggi 1301184219
}
