<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Create_crop_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }

    public function get_cropInfo($page=null)
    {
        $limit=$this->config->item('view_per_page');
        $start=$page*$limit;
        $this->db->from('rnd_crop_info rci');
        $this->db->select('rci.*');

//        $this->db->where('status',1);
        $this->db->limit($limit,$start);

        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_total_crops()
    {
        $this->db->select('rnd_crop_info.*');
        $this->db->from('rnd_crop_info');

//        $this->db->where('status',1);
        return $this->db->count_all_results();
    }

}