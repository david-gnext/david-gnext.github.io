<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
        $this->db = $this->load->database('default', true);
    }

    public function index() {        
        $this->load->view("common");
        $this->load->model("welcome_model");
        $user = $this->input->post("user");
        $pass = $this->input->post("pass");
        $data["user"] = $this->welcome_model->check($user,$pass);      
        $data['index'] = $this->router->fetch_method();
        $data['controller'] = $this->router->fetch_class();
        $this->load->view("header", $data);
        $this->load->view('index', $data);
    }

}
