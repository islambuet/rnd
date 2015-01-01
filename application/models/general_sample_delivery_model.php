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

    public function get_rnd_codes_by_season()
    {
        $this->db->from('rnd_variety_season vs');
        $this->db->select('vi.rnd_code rnd_code, vi.id rnd_id');

        $this->db->join('rnd_variety_info vi', 'vi.id = vs.variety_id', 'left');
        $this->db->group_by('vi.id');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_sample_rnd_codes_by_season($season_id)
    {
        $this->db->from('rnd_sample_delivery_date_crop rsdc');
        $this->db->select('rsdc.rnd_code_id');

        $this->db->join('rnd_sample_delivery_date rsdd', 'rsdd.id = rsdc.sample_delivery_date_id', 'left');
        $this->db->where('rsdd.season_id',$season_id);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function delete_from_sample_crop_by_id($id)
    {
        $this->db->delete('rnd_sample_delivery_date_crop', array('sample_delivery_date_id' => $id));
    }

}