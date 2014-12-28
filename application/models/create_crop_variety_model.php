<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Create_crop_variety_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }

    public function get_varietyInfo($page=null)
    {
        $limit=$this->config->item('view_per_page');
        $start=$page*$limit;
        $this->db->from('rnd_variety_info rvi');
        $this->db->select('rvi.*');
        $this->db->select('sinfo.season_name season_name');

        $this->db->join('rnd_season_info sinfo', 'sinfo.id = rvi.season_id', 'left');

//        $this->db->where('status',1);
        $this->db->limit($limit,$start);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_total_varieties()
    {
        $this->db->select('rnd_variety_info.*');
        $this->db->from('rnd_variety_info');

//        $this->db->where('status',1);
        return $this->db->count_all_results();
    }

    public function get_type_row($id)
    {
        $this->db->select('rnd_variety_info.*');
        $this->db->from('rnd_variety_info');
        $this->db->where('id',$id);

        $query = $this->db->get();
        return $query->row_array();
    }



}