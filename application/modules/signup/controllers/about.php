<?php

class About extends CI_Controller {

    public function index() {             

        // load a model from another module
       // $this->load->model("other_module/model");
        $this->load->view('index');        
        
    }
}