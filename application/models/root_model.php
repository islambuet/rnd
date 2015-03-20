<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Root_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }



    public function get_modules()
    {
        $user=User_helper::get_user();
        $this->db->select('module.id,module.name,module.icon');
        $this->db->select('COUNT(module.id) subcount');
        $this->db->from('rnd_user_group_role rugr');
        $this->db->join('rnd_task rt','rt.id = rugr.task_id','INNER');
        $this->db->join('rnd_task module','module.id = rt.parent','INNER');
        $this->db->where('rugr.user_group_id',$user->rnd_group);
        $this->db->where('rugr.view',1);
        $this->db->group_by('module.id');
        $this->db->order_by('module.ordering','ASC');
        $result=$this->db->get()->result_array();
        return $result;
    }

}