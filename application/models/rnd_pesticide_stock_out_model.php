<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Rnd_pesticide_stock_out_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }

    public function get_stock_out_info($page=null)
    {
        $limit=$this->config->item('view_per_page');
        $start=$page*$limit;
        $this->db->from('rnd_pesticide_fungicide_stock_out pfs');
        $this->db->select('pfs.*');
        $this->db->select('pfi.pesticide_name pesticide_name');

        $this->db->join('rnd_pesticide_fungicide_info pfi', 'pfi.id = pfs.pesticide_id', 'left');

        $this->db->where('pfs.status',$this->config->item('active'));
        $this->db->limit($limit,$start);

        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_total_pesticide_stock_out()
    {
        $this->db->select('rnd_pesticide_fungicide_stock_out.*');
        $this->db->from('rnd_pesticide_fungicide_stock_out');
        $this->db->where('status',$this->config->item('active'));

        return $this->db->count_all_results();
    }

    public function get_pesticide_row($id)
    {
        $this->db->select('pfs.*');
        $this->db->from('rnd_pesticide_fungicide_stock_out pfs');
        $this->db->select('pfi.pesticide_name pesticide_name');

        $this->db->join('rnd_pesticide_fungicide_info pfi', 'pfi.id = pfs.pesticide_id', 'left');

        $this->db->where('pfs.id',$id);

        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_pesticides()
    {
        $this->db->select('rnd_pesticide_fungicide_info.*');
        $this->db->from('rnd_pesticide_fungicide_info');
        $this->db->where('status',$this->config->item('active'));

        $query = $this->db->get();
        return $query->result_array();
    }

}