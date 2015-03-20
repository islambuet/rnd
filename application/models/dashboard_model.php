<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_tasks($module_id)
    {
        $user=User_helper::get_user();
        $this->db->select('rt.id,rt.name,rt.controller,rt.icon');
        $this->db->from("rnd_task rt");
        $this->db->join('rnd_user_group_role rugr','rt.id = rugr.task_id','INNER');
        $this->db->where("rt.parent",$module_id);
        $this->db->where("rugr.user_group_id",$user->rnd_group);
        $this->db->order_by('rt.ordering');
        $result=$this->db->get()->result_array();
        return $result;

    }

}