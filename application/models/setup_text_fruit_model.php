<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Setup_text_fruit_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }

    public function get_cropInfo($page=0)
    {
        $limit=$this->config->item('view_per_page');
        $start=$page*$limit;
        $this->db->from('rnd_crop rc');
        $this->db->select('rc.*');

        $this->db->where('rc.status != ',$this->config->item('status_delete'));
        $this->db->limit($limit,$start);
        $this->db->order_by("rc.ordering","ASC");
        $this->db->order_by("rc.id","ASC");
        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_total_crops()
    {
        $this->db->select('rnd_crop.*');
        $this->db->from('rnd_crop');

        $this->db->where('status != ',$this->config->item('status_delete'));
        return $this->db->count_all_results();
    }

    public function get_crop_info($id)
    {
        $this->db->select('*');
        $this->db->from('rnd_crop');
        $this->db->where('id',$id);

        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_setup($id)
    {
        $this->db->select('*');
        $this->db->from('rnd_setup_text_fruit');
        $this->db->where('crop_id',$id);

        $query = $this->db->get();
        return $query->row_array();
    }

}