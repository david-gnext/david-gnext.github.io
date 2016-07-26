<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

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

    public function sublist() {
        $this->intialize();
        $this->load->model("main_model");
        $data['query'] = $this->main_model->get_data();
        $this->load->view('main_sublist', $data);
    }

    public function showtest($subid, $id) {
        $this->intialize();
        $this->load->model("main_model");
        $data['query'] = $this->main_model->get_subject($id);
        $data['test'] = $this->main_model->get_test($id);
        $this->load->view("showtest", $data);
    }

    public function quiz($test, $tid, $sub, $sid) {
        $this->intialize();
        $this->load->model("main_model");
        $data["time"] = $this->main_model->get_time($tid);
        $data["ques"] = $this->main_model->get_ques($tid);
        $data["total"] = $data["ques"]->result();
        //set seession first
        if (count($this->session->userdata('qn')) == 0) {
            $this->session->set_userdata(array('qn' => 0));
            $this->main_model->delete_ans(session_id());
            $this->session->set_userdata(array('trueans' => 0));
        } 
        else {            
            $this->load->model("ans_model");
            $data["ques"]->data_seek($this->session->userdata("qn"));
            $insert = $data["ques"]->unbuffered_row();
            $this->ans_model->insertAll($insert,  $this->input->post("ans"));
            if ($this->input->post("ans") == $insert->true_ans) {
                $this->session->set_userdata("trueans",$this->session->userdata("trueans") + 1);
            }
            //check submit button condition
            if ($this->input->post("submit") == 'Next Question' && $this->input->post("ans")) {
                $this->session->set_userdata("qn",$this->session->userdata("qn") + 1);
            } elseif ($this->input->post("submit") == "Get Result" && $this->input->post("ans")) {
                $this->load->model("result_model");
                $this->result_model->insertResult($this->session->userdata,$tid);
                $data["result"] = true;
            }
        }
        $data["js_un"] = $this->input->post("js");
        $data["ques"]->data_seek($this->session->userdata("qn"));
        $data["current_ques"] = $data["ques"]->unbuffered_row();
        $this->load->view("quiz", $data);
    }

}
