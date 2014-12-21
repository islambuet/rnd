<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Root_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_modules()
    {
        $this->db->from("ait_system_module aitm");
        $this->db->select("aitm.*, count(aitt.st_id) subcount");
        $this->db->join("ait_system_task aitt","aitt.st_sm_id = aitm.sm_id","LEFT");
        $this->db->group_by("aitm.sm_id");
        $result=$this->db->get()->result_array();
        return $result;

    }

}