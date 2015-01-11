<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Create_fertilizer_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }

    public function get_fertilizerInfo($page=null)
    {
        $limit=$this->config->item('view_per_page');
        $start=$page*$limit;
        $this->db->from('rnd_fertilizer_info rfi');
        $this->db->select('rfi.*');

        $this->db->where('status !=',$this->config->item('rnd_delete_status_code'));
        $this->db->limit($limit,$start);
        $this->db->order_by('rfi.id','DESC');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_total_fertilizers()
    {
        $this->db->select('rnd_fertilizer_info.*');
        $this->db->from('rnd_fertilizer_info');

        $this->db->where('status !=',$this->config->item('rnd_delete_status_code'));
        return $this->db->count_all_results();
    }

    public function get_fertilizer_row($id)
    {
        $this->db->select('rnd_fertilizer_info.*');
        $this->db->from('rnd_fertilizer_info');
        $this->db->where('id',$id);

        $query = $this->db->get();
        return $query->row_array();
    }

}