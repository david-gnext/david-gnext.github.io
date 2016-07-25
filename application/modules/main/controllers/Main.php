<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
        $this->db = $this->load->database('default', true);
    }

    public function sublist() {
        $this->load->view("header");        
        $this->load->model("main_model");        
        $data['query'] = $this->main_model->get_data();
        $this->load->view('main_sublist', $data);
    }

}
