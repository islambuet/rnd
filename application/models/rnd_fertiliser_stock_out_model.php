<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Rnd_fertiliser_stock_out_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }

    public function get_stock_out_info($page=0)
    {
        $limit=$this->config->item('view_per_page');
        $start=$page*$limit;
        $this->db->from('rnd_fertilizer_stock_out fso');
        $this->db->select('fso.*');
        $this->db->select('rfi.fertilizer_name fertilizer_name');

        $this->db->join('rnd_fertilizer_info rfi', 'rfi.id = fso.fertilizer_id', 'left');

        $this->db->where('fso.status',$this->config->item('status_active'));
        $this->db->limit($limit,$start);

        $result = $this->db->get()->result_array();
        return $result;
    }

    public function get_total_fertiliser_stock_out()
    {
        $this->db->select('rnd_fertilizer_stock_out.*');
        $this->db->from('rnd_fertilizer_stock_out');
        $this->db->where('status',$this->config->item('status_active'));

        return $this->db->count_all_results();
    }



}