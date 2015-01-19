<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Rnd_feriliser_stock_in_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }

    public function get_stock_in_info($page=null)
    {
        $limit=$this->config->item('view_per_page');
        $start=$page*$limit;
        $this->db->from('rnd_fertilizer_stock_in fsi');
        $this->db->select('fsi.*');
        $this->db->select('rfi.fertilizer_name fertilizer_name');

        $this->db->join('rnd_fertilizer_info rfi', 'rfi.id = fsi.fertilizer_id', 'left');

        $this->db->where('fsi.status',$this->config->item('active'));
        $this->db->limit($limit,$start);

        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_total_feriliser_stock_in()
    {
        $this->db->select('rnd_fertilizer_stock_in.*');
        $this->db->from('rnd_fertilizer_stock_in');
        $this->db->where('status',$this->config->item('active'));

        return $this->db->count_all_results();
    }

    public function get_feriliser_row($id)
    {
        $this->db->select('fsi.*');
        $this->db->from('rnd_fertilizer_stock_in fsi');
        $this->db->select('rfi.fertilizer_name fertilizer_name');

        $this->db->join('rnd_fertilizer_info rfi', 'rfi.id = fsi.fertilizer_id', 'left');

        $this->db->where('fsi.id',$id);

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

    public function check_fertiliser_stock_out($fertiliser_id)
    {
        $this->db->from('rnd_fertilizer_stock_out');
        $this->db->where('fertilizer_id',$fertiliser_id);
        $this->db->where('status',$this->config->item('active'));
        $query = $this->db->get();
        $result=$query->num_rows();
        if($result>0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

}