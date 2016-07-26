<?php

class Admin_model extends CI_Model {

    public $loginid;
    public $pass;

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function check($i, $p) {
        $this->db->from("mst_admin");
        $this->db->where("loginid = '$i' and pass = '$p'");
        $query = $this->db->get();
        return $query->result();
    }

    public function selectSubject() {
        $query = $this->db->get("mst_subject");
        return $query->result();
    }

    public function getScore($id) {
//        $s = "select test_name,login,score,total_que from mst_subject s JOIN mst_test t ON (t.sub_id=s.sub_id) JOIN mst_result r ON(r.test_id=t.test_id) where s.sub_id='" . $_GET['testid'] . "'order by score DESC";
        $this->db->select(' t.test_name,r.login,r.score,t.total_que');
        $this->db->from('mst_subject as s');
        $this->db->join('mst_test as t', 's.sub_id = t.sub_id', "left");
        $this->db->join("mst_result as r", "t.test_id = r.test_id", "left");
        $this->db->where("s.sub_id", $id);
        $this->db->order_by('r.score', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function getUser() {
        $query = $this->db->get("mst_user");
        return $query->result();
    }

    public function memberResult($member) {
//        $rs = mysqli_query($cn, "select t.test_name,t.total_que,r.test_date,r.score from mst_test t, mst_result r where
//t.test_id=r.test_id and r.login='$member'");
        $this->db->select("t.test_name,t.total_que,r.test_date,r.score");
        $this->db->from("mst_test as t");
        $this->db->join("mst_result as r","t.test_id = r.test_id", "left");
        $this->db->where("r.login",$member);
        $query = $this->db->get();
        return $query->result();
    }

}
