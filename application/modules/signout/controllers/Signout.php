<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Signout extends CI_Controller {
    
    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
        $this->db = $this->load->database('default', true);
    }      
    
    public function index() {
        
    }
    
    public function out($controller) {
        $data["controller"] = $controller;
        $this->load->view("signout_signout",$data);
    }

}
