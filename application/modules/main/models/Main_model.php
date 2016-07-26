<?php

class Main_model extends CI_Model {

    public $sub_id;
    public $sub_name;

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function get_data() {
        $query = $this->db->get('mst_subject');
        return $query->result();
    }

    public function get_subject($id) {
        $this->db->from("mst_subject");
        $this->db->where("sub_id", $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function insertSubName($name) {
        $this->sub_name = $name;
        $this->db->insert("mst_subject", $this);
    }

    public function get_subName($name) {
        $this->db->from("mst_subject");
        $this->db->where("sub_name", $name);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_test($id) {
        $this->db->from("mst_test");
        $this->db->where("sub_id", $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_time($id) {
        $this->db->select("time");
        $this->db->from("mst_test");
        $this->db->where("test_id", $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_ques($id) {
        $this->db->from("mst_question");
        $this->db->where("test_id", $id);
        $query = $this->db->get();
        return $query;
    }

    public function delete_ans($i) {
        $this->db->where("sess_id", $i);
        $this->db->delete("mst_useranswer");
    }

}
