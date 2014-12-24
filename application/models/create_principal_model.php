<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Create_principal_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }

    public function get_principalInfo($page=null)
    {
        $limit=$this->config->item('view_per_page');
        $start=$page*$limit;
        $this->db->from('rnd_principal_info rpi');
        $this->db->select('rpi.*');

//        $this->db->where('status',1);
        $this->db->limit($limit,$start);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_total_principals()
    {
        $this->db->select('rnd_principal_info.*');
        $this->db->from('rnd_principal_info');

//        $this->db->where('status',1);
        return $this->db->count_all_results();
    }

    public function get_principal_row($id)
    {
        $this->db->select('rnd_principal_info.*');
        $this->db->from('rnd_principal_info');
        $this->db->where('id',$id);

        $query = $this->db->get();
        return $query->row_array();
    }

}