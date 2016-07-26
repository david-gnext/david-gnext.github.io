<?php

class Signout_model extends CI_Model {
    public $sub_id;
    public $sub_name;    
    
    public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }
        
        public function get_data()
        {
                $query = $this->db->get('mst_subject');
                return $query->result();
        }
}