<?php

class Welcome_model extends CI_Model {

    public $login;
    public $pass;
    public $date;

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function check($u, $p) {
        $this->db->from("mst_user");
        $this->db->where("login = '$u' and pass = '$p'");
        $query = $this->db->get();
        return $query->result();
    }

    public function insert_entry() {
        $this->title = $_POST['title']; // please read the below note
        $this->content = $_POST['content'];
        $this->date = time();

        $this->db->insert('entries', $this);
    }

    public function update_entry() {
        $this->title = $_POST['title'];
        $this->content = $_POST['content'];
        $this->date = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }

}
