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
        $this->db->select('cinfo.crop_name crop_name');

        $this->db->join('rnd_crop_info cinfo', 'cinfo.id = rvi.crop_id', 'left');
        $this->db->group_by('variety_name');

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

    public function get_seasons($id)
    {
        $this->db->select('rnd_variety_info.*');
        $this->db->from('rnd_variety_info');
        $this->db->where('id',$id);

        $query = $this->db->get();
        $result = $query->row_array();

        $this->db->select('season_id');
        $this->db->from('rnd_variety_info');
        $this->db->where('crop_id',$result['crop_id']);
        $this->db->where('variety_name',$result['variety_name']);
        $this->db->where('variety_type',$result['variety_type']);
        $this->db->where('flowering_type_id',$result['flowering_type_id']);
        $query2 = $this->db->get();
        $result2 = $query2->result_array();
        return $result2;
    }

    public function get_product_type($crop_id)
    {
        $this->db->select('rnd_product_type_info.*');
        $this->db->from('rnd_product_type_info');
        $this->db->where('crop_id',$crop_id);

        $query = $this->db->get();
        return $query->result_array();
    }



}