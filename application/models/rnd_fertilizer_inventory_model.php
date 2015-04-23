<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rnd_fertilizer_inventory_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }

    public function get_inventories($page=null)
    {
        $limit=$this->config->item('view_per_page');
        $start=$page*$limit;
        $this->db->from('rnd_fertilizer_inventory rfinv');
        $this->db->select('rfinv.*');
        $this->db->select('rfi.fertilizer_name');

        $this->db->join('rnd_fertilizer_info rfi', 'rfi.id = rfinv.fertilizer_id', 'INNER');

        $this->db->where('rfinv.status',$this->config->item('status_active'));
        $this->db->limit($limit,$start);
        $this->db->order_by("rfinv.id","DESC");

        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_total_inventory()
    {
        $this->db->select('rnd_fertilizer_inventory.*');
        $this->db->from('rnd_fertilizer_inventory');

        $this->db->where('status',$this->config->item('status_active'));
        return $this->db->count_all_results();
    }

}