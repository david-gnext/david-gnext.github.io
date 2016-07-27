<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
class Signup extends CI_Controller {

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
        $this->db = $this->load->database('default', true);
    }

   public function initialise(){
       $this->load->view("common");
        $data['index'] = $this->router->fetch_method();
        $data["controller"] = $this->router->fetch_class();
        $this->load->view("header", $data);
   }

   public function index() {
       $this->initialise();
        $this->load->view('signup');
    }
    
    public function signupuser() {
        $this->initialise();
        $this->load->model("adduser_model");
        $loginId = $this->input->post("lid");
        $exist = $this->adduser_model->existUser($loginId);        
        if(count($exist) > 0){
            $data["exist"] = true;
        }
        else{
        $this->adduser_model->addUser($this->input->post());
        $data["name"] = $loginId;
        }
        $this->load->view("signupuser",$data);
    }
}