<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class General_sample_delivery_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }

    public function get_sampleInfo($page=null)
    {
        $limit=$this->config->item('view_per_page');
        $start=$page*$limit;
        $this->db->from('rnd_sample_delivery_date rsd');
        $this->db->select('rsd.*');
        $this->db->select('rsi.season_name season_name');

        $this->db->join('rnd_season_info rsi', 'rsi.id = rsd.season_id', 'left');
        $this->db->limit($limit,$start);

        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_total_samples()
    {
        $this->db->select('rnd_sample_delivery_date.*');
        $this->db->from('rnd_sample_delivery_date');

        return $this->db->count_all_results();
    }

    public function get_sample_row($id)
    {
        $this->db->select('rsd.*');
        $this->db->from('rnd_sample_delivery_date rsd');
        $this->db->select('rsi.season_name season_name');

        $this->db->join('rnd_season_info rsi', 'rsi.id = rsd.season_id', 'left');
        $this->db->where('rsd.id',$id);

        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_rndcodes_by_season($season_id)
    {
        $this->db->from('rnd_variety_season vs');
        $this->db->select('vi.rnd_code rnd_code, vi.id rnd_id');

        $this->db->join('rnd_variety_info vi', 'vi.id = vs.variety_id', 'left');
        $this->db->where('vs.season_id',$season_id);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_sample_rndcodes_by_season($season_id)
    {

    }

}