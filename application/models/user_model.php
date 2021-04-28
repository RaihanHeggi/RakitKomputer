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

    function cekDataEmail($email,$password){
        $this->db->where('password',$password);
        $this->db->where('email',$email);
        $query = $this->db->get('user');
        if($query->num_rows() == 1){  
            return true;  
        }  
        else{  
            return false;       
        } 
    }

    function getData($username, $email){
        $this->db->where('username',$username);
        $this->db->where('email',$email);
        return $this->db->get('user')->result_array();
    }

    function getID($username,$email){
        $this->db->select('id_user');
        $this->db->where('username',$username);
        $this->db->where('email',$email);
        return $this->db->get('user')->row()->id_user;
    }

    function getIDEmail($email,$password){
        $this->db->select('id_user');
        $this->db->where('email',$email);
        $this->db->where('password',$password);
        return $this->db->get('user')->row()->id_user;
    }
}

?>