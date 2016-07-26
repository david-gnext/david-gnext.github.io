<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
        $this->db = $this->load->database('default', true);
    }

    public function intialize() {
        $this->load->view("common");
        $data['index'] = $this->router->fetch_method();
        $data["controller"] = $this->router->fetch_class();
        $this->load->view("header", $data);
    }

    public function index() {
        $this->intialize();
        $this->load->view("index");
    }

    public function login() {
        $id = $this->input->post("loginid");
        $pass = $this->input->post("pass");
        $this->load->model("admin_model");
        $data["return"] = $this->admin_model->check($id, $pass);
        if (count($data["return"]) > 0) {
            $this->session->set_userdata(array("adminlogin" => true));
            $data["valid"] = true;
        }
        $this->intialize();
        $this->load->view("login", $data);
    }

    public function subjectscore() {
        $this->intialize();
        $this->load->model("admin_model");
        $data["subject"] = $this->admin_model->selectSubject();
        $this->load->view("subjectscore", $data);
    }

    public function show_score($test, $test_id, $name, $test_name) {
        $this->intialize();
        $this->load->model("admin_model");
        $data["allscore"] = $this->admin_model->getScore($test_id);
        $data["test_name"] = $test_name;
        $this->load->view("show_score", $data);
    }

    public function subadd() {
        $this->intialize();
        $this->load->model("main/main_model");
        $subname = $this->input->post("subname");
        if ($this->input->post("submit") || strlen($subname) > 0) {
            $result = $this->main_model->get_subName($subname);
            if (count($result) > 0) {
                $data["error"] = true;
            } else {
                $this->main_model->insertSubName($subname);
                $data["error"] = false;
            }
        }
        $data["subname"] = $subname;
        $this->load->view("subadd", $data);
    }

    public function testadd() {
        $this->intialize();
        $this->load->model("test_model");
        $this->load->model("main/main_model");
        $data["Allsubject"] = $this->main_model->get_data();
        $totalQ = $this->input->post("totque");
        $testName = $this->input->post("testname");
        $hour = $this->input->post("hour");
        $min = $this->input->post("min");
        $subId = $this->input->post("subid");
        if ($this->input->post("submit") || strlen($subId) > 0) {
            $this->test_model->insert($subId, $testName, $totalQ, $hour, $min);
            $data["success"] = true;
            $data["testname"] = $testName;
        }
        $this->load->view("testadd", $data);
    }

    public function questionadd() {
        $this->intialize();
        $tId = $this->input->post("testid");
        $this->load->model("ques_model");
        $data["allTest"] = $this->ques_model->get_allTest();
        if ($this->input->post("submit") || strlen($tId) > 0) {
            $file = $_FILES['image']['tmp_name'];
            if (!isset($file)) {
                $data["message"] = 'Please select an Image';
            } else {
                $image_check = getimagesize($_FILES['image']['tmp_name']);
                if ($image_check == false) {
                    $data["message"] = 'Not a Valid Image';
                } else {
                    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                    $image_name = addslashes($_FILES['image']['name']);
                    $this->ques_model->insert($this->input->post(),$image_name,$image);
                    $data["message"] = "Question Added Successfully";
                }
            }
        }
        $this->load->view("questionadd",$data);
    }
    
    public function memberresult() {
         $this->intialize();        
        $this->load->model("admin_model");
        $data["AllUser"] = $this->admin_model->getUser();
        $this->load->view("memberresult",$data);
    }
    
    public function result($name,$userName) {
        $this->intialize();
        $this->load->model("admin_model");
        $data["field"] = $this->admin_model->memberResult($name);
        $data["username"] = $userName;
        $this->load->view("result",$data);
    }
}
