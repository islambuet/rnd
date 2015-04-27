<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Rnd_pesticide_stock_in_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }

    public function get_stock_in_info($page=0)
    {
        $limit=$this->config->item('view_per_page');
        $start=$page*$limit;
        $this->db->from('rnd_pesticide_fungicide_in rpfin');
        $this->db->select('rpfin.*');
        $this->db->select('rpfi.pesticide_name,rpfi.unit');

        $this->db->join('rnd_pesticide_fungicide_info rpfi', 'rpfi.id = rpfin.pesticide_id', 'INNER');

        $this->db->where('rpfin.status',$this->config->item('status_active'));
        $this->db->limit($limit,$start);
        $this->db->order_by('rpfin.id DESC');

        $result = $this->db->get()->result_array();
        return $result;
    }

    public function get_total_pesticide_stock_in()
    {
        $this->db->select('rnd_pesticide_fungicide_in.*');
        $this->db->from('rnd_pesticide_fungicide_in');
        $this->db->where('status',$this->config->item('status_active'));

        return $this->db->count_all_results();
    }

}