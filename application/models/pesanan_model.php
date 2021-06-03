<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class pesanan_model extends CI_Model{

    function __construct (){
        parent::__construct();
    }

    function insertData($data){
        return $this->db->insert('pesanan',$data);
    }

    function getData($idPelanggan){
        $this->db->where('id_pelanggan',$idPelanggan);
        return $this->db->get('pesanan')->result_array();
    }

    function getPesanan($idPesanan){
        $this->db->where('id_pesanan',$idPesanan);
        return $this->db->get('pesanan')->row_array();
    }

    function getPesananByBarang($idBarang){
        $this->db->where('id_barang',$idBarang);
        return $this->db->get('pesanan')->result_array();
    }

    function updateData($id,$data){
        $this->db->where('id_pesanan',$id);
        return $this->db->update('pesanan',$data);
    }

    function getTanggalData(){
        $this->db->select('tanggal,status,id_pelanggan');
        $this->db->distinct();
        return $this->db->get('pesanan')->result_array();
    }

    function getDataSpecificTanggal($tanggal){
        $this->db->where('tanggal',$tanggal);
        return $this->db->get('pesanan')->result_array();
    }

    function deletePesanan($id){
        $this->db->where('id_pesanan',$id);
        return $this->db->delete('pesanan');
    }


}

?>