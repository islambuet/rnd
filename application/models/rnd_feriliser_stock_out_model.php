<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Rnd_feriliser_stock_out_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }

    public function get_stock_out_info($page=null)
    {
        $limit=$this->config->item('view_per_page');
        $start=$page*$limit;
        $this->db->from('rnd_fertilizer_stock_out rfs');
        $this->db->select('rfs.*');

        $this->db->select('rfi.fertilizer_name fertilizer_name');
        $this->db->select('vi.rnd_code rnd_code');

        $this->db->join('rnd_fertilizer_info rfi', 'rfi.id = rfs.fertilizer_id', 'left');
        $this->db->join('rnd_variety_info vi', 'vi.id = rfs.rnd_code_id', 'left');

        $this->db->where('rfs.status',$this->config->item('active'));
        $this->db->limit($limit,$start);



        $query = $this->db->get();
        //echo $this->db->last_query();exit;

        return $query->result_array();
    }

    public function get_total_feriliser_stock_out()
    {
        $this->db->select('rnd_fertilizer_stock_out.*');
        $this->db->from('rnd_fertilizer_stock_out');
        $this->db->where('status',$this->config->item('active'));

        return $this->db->count_all_results();
    }

    public function get_feriliser_row($id)
    {
        $this->db->select('rfs.*');
        $this->db->from('rnd_fertilizer_stock_out rfs');
        $this->db->select('rfi.fertilizer_name fertilizer_name');

        $this->db->join('rnd_fertilizer_info rfi', 'rfi.id = rfs.fertilizer_id', 'left');

        $this->db->where('rfs.id',$id);

        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_ferilisers()
    {
        $this->db->select('rnd_fertilizer_info.*');
        $this->db->from('rnd_fertilizer_info');
        $this->db->where('status',$this->config->item('active'));

        $query = $this->db->get();
        return $query->result_array();
    }

}