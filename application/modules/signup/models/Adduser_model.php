<?php

class Adduser_model extends CI_Model {

    public $user_id;
    public $login;
    public $pass;
    public $username;
    public $address;
    public $city;
    public $phone;
    public $email;

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
    }
    
    public function addUser($post){
        //$this->db->insert("mst_user",$post);
    }
    public function existUser($id) {
        $this->db->where("login",$id);
        $query = $this->db->get("mst_user");
        return $query->result();
    }
}