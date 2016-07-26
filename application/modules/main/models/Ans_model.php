<?php

class Ans_model extends CI_Model {

    public $sess_id;
    public $test_id;
    public $que_des;
    public $ans1;
    public $ans2;
    public $ans3;
    public $ans4;
    public $true_ans;
    public $your_ans;    
    
    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
    }
    
    public function insertAll($ques,$your_ans) {          
        $this->sess_id = session_id();
        $this->test_id = $ques->test_id;
        $this->que_des = $ques->que_desc;
        $this->ans1 = $ques->ans1;
        $this->ans2 = $ques->ans2;
        $this->ans3 = $ques->ans3;
        $this->ans4 = $ques->ans4;
        $this->true_ans = $ques->true_ans;
        $this->your_ans = $your_ans;
         $this->db->insert('mst_useranswer', $this);
    }

}