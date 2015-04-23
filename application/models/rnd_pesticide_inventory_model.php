<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rnd_pesticide_inventory_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }

    public function get_inventories($page=null)
    {
        $limit=$this->config->item('view_per_page');
        $start=$page*$limit;
        $this->db->from('rnd_pesticide_inventory rpinv');
        $this->db->select('rpinv.*');
        $this->db->select('rpi.pesticide_name');

        $this->db->join('rnd_pesticide_fungicide_info rpi', 'rpi.id = rpinv.pesticide_id', 'INNER');

        $this->db->where('rpinv.status',$this->config->item('status_active'));
        $this->db->limit($limit,$start);
        $this->db->order_by("rpinv.id","DESC");

        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_total_inventory()
    {
        $this->db->select('rnd_pesticide_inventory.*');
        $this->db->from('rnd_pesticide_inventory');

        $this->db->where('status',$this->config->item('status_active'));
        return $this->db->count_all_results();
    }

}