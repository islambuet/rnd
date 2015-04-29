<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Rnd_plot_design_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function get_crops($year,$season_id)
    {
        $this->db->from('rnd_variety_season rvs');
        $this->db->select('count(rvs.id) total_variety');
        $this->db->select('rc.crop_name crop_name, rc.id crop_id');
        $this->db->join('rnd_variety rv', 'rv.id = rvs.variety_id', 'inner');
        $this->db->join('rnd_crop rc', 'rc.id = rv.crop_id', 'inner');

        $this->db->where('rvs.year',$year);
        $this->db->where('rvs.season_id',$season_id);
        $this->db->where('rvs.season_status',1);
        $this->db->where('rvs.sample_delivery_status',1);
        $this->db->group_by('rc.id');
        $this->db->order_by('rc.ordering ASC');
        $result = $this->db->get()->result_array();
        return $result;

    }
}