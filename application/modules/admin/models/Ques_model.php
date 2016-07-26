<?php

class Ques_model extends CI_Model {

    public $que_id;
    public $test_id;
    public $image_name;
    public $que_desc;
    public $image;
    public $ans1;
    public $ans2;
    public $ans3;
    public $ans4;
    public $true_ans;

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
    }
    
    public function insert($post,$img_name,$img) {          
        $this->test_id = $post["testid"];
        $this->que_desc = $post["addque"];
        $this->image_name = $img_name;
        $this->image = $img;
        $this->ans1 = $post["ans1"];
        $this->ans2 = $post["ans2"];
        $this->ans3 = $post["ans3"];
        $this->ans4 = $post["ans4"];
        $this->true_ans = $post["anstrue"];
        $this->db->insert("mst_question",$this);
    }
    
    public function get_allTest() {
        $this->db->order_by("test_name");
        $query = $this->db->get("mst_test");
        return $query->result();
    }
}