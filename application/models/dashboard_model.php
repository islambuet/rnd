<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_tasks($module_id)
    {
        $this->db->from("ait_system_task aitt");
        $this->db->where("aitt.st_sm_id",$module_id);
        $this->db->order_by('st_order');
        $result=$this->db->get()->result_array();
        return $result;

    }

}