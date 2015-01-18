<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Root_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_modules_old()
    {
//        $user=User_helper::get_user();
        $this->db->from("ait_system_module aitm");
        $this->db->select("aitm.*, count(aitt.st_id) subcount");
        $this->db->join("ait_system_task aitt","aitt.st_sm_id = aitm.sm_id","LEFT");
//        $this->db->where("aitm.ug_id",$user->user_group_id);
        $this->db->group_by("aitm.sm_id");
        $result=$this->db->get()->result_array();
        return $result;

    }

    public function get_modules()
    {
        $user=User_helper::get_user();
        $this->db->select
        ('
            ait_system_module.sm_name,
            ait_system_module.sm_id,
            ait_system_module.sm_icon,
            count(ait_user_group.up_st_id) as subcount,
            ait_user_group.up_st_id
        ');
        $this->db->from("ait_user_group");
//        $this->db->select("aitm.*, count(aitt.st_id) subcount");
        $this->db->join("ait_system_module","ait_system_module.sm_id = ait_user_group.up_sm_id","LEFT");
        $this->db->where("ait_user_group.ug_id",$user->user_group_id);
        $this->db->group_by("ait_system_module.sm_id");
        $this->db->order_by("ait_system_module.sm_order");
        $result=$this->db->get()->result_array();
        return $result;

    }

}