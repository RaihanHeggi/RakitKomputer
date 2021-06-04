<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cek_ongkir extends CI_Controller {

	function __construct(){
        parent::__construct();
    }

	public function index(){	
        $response_city = $this->_get_all_city();
        $city = $response_city['rajaongkir']['results'];

        $data = array(
            'city'=>$city
        );
            
         $this->load->view('pelanggan/cekOngkir', $data);
	}

    public function hasilOngkir(){
        $id_kota_asal = $this->input->post('kota_asal');
        $id_kota_tujuan = $this->input->post('kota_tujuan');
        $berat = $this->input->post('berat');
        $hitung_ongkir = $this->_cek_ongkir_via_pos($id_kota_asal,$id_kota_tujuan,$berat);
        $hasil_ongkir = $hitung_ongkir['rajaongkir']['results'][0]['costs'];
        $data['costs'] = $hasil_ongkir;
        $view = $this->load->view('pelanggan/hasil_ongkir', $data, TRUE);
        echo $view;
    }

    private function _get_all_province(){
        $parameter = array(
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_RETURNTRANSFER=>TRUE,
            CURLOPT_SSL_VERIFYPEER=>FALSE,
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: 00b0ccf30deb17319f179d5500bed219"
            )
        );
        
        $this->curl->create('https://api.rajaongkir.com/starter/province/?id=');
        $this->curl->options($parameter);
        $response = $this->curl->execute();
        return json_decode($response, true);
    }

    private function _get_all_city(){
        $parameter = array(
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_RETURNTRANSFER=>TRUE,
            CURLOPT_SSL_VERIFYPEER=>FALSE,
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: 00b0ccf30deb17319f179d5500bed219"
            )
        );
        
        $this->curl->create('https://api.rajaongkir.com/starter/city/?id=');
        $this->curl->options($parameter);
        $response = $this->curl->execute();
        return json_decode($response, true);
    }

    private function _cek_ongkir_via_pos($id_kota_asal, $id_kota_tujuan, $berat){
        $parameter = array(
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_RETURNTRANSFER=>TRUE,
            CURLOPT_SSL_VERIFYPEER=>FALSE,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=".$id_kota_asal."&destination=".$id_kota_tujuan."&weight=".$berat."&courier=pos",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: 00b0ccf30deb17319f179d5500bed219"
            )
        );

        $this->curl->create('https://api.rajaongkir.com/starter/cost');
        $this->curl->options($parameter);
        $response = $this->curl->execute();
        return json_decode($response, true);
    }
}