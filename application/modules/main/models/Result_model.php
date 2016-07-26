<?php

class Result_model extends CI_Model {

    public $test_id;
    public $login;
    public $test_date;
    public $score;
    
       public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
    }
    
        
    public function insertResult($session,$tid){        
        $this->login = $session["user"][0]->login;
        $this->test_id = $tid;
        $this->test_date = date("Y/m/d");
        $this->score = $session["trueans"];
        $this->db->insert("mst_result",  $this);
    }
    
}

    