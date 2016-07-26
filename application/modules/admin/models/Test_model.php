<?php

class Test_model extends CI_Model {

    public $test_id;
    public $sub_id;
    public $test_name;
    public $total_que;
    public $time;
    
    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
    }
    
    public function insert($id,$name,$que,$h,$m) {
        $this->sub_id = $id;
        $this->test_name = $name;
        $this->total_que = $que;
        $this->time = "$h:$m";
        $this->db->insert("mst_test",  $this);
    }
}
    