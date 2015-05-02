<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Report_plot_design_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }

    public function get_plot_info($year,$season_id,$plot_id)
    {
        $this->db->from('rnd_plot_design rpd');
        $this->db->select('rpd.*');

        $this->db->where('rpd.year',$year);
        $this->db->where('rpd.season_id',$season_id);
        $this->db->where('rpd.plot_id',$plot_id);
        $this->db->where('rpd.status',1);
        $this->db->order_by('rpd.id ASC');
        $result = $this->db->get()->result_array();
        return $result;
    }
}