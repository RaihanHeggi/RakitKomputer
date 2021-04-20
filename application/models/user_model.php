<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class user_model extends CI_Model{

    function __construct (){
        parent::__construct();
    }

    function insertData($data){
        return $this->db->insert('user',$data);
    }

    function cekData($username,$email){
        $this->db->where('username',$username);
        $this->db->where('email',$email);
        $query = $this->db->get('user');
        if($query->num_rows() > 0){  
            return true;  
        }  
        else{  
            return false;       
        } 
    }

    function getData($usename, $email){
        $this->db->where('username',$username);
        $this->db->where('email',$email);
        return $this->db->get('user')->result_array();
    }
}

?>