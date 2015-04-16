<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class General_crop_info_setup_model extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }
    public function get_total_records()
    {
        $this->db->from('rnd_general_crop_info_setup');
        return $this->db->count_all_results();
    }
    public function get_crops($page=null)
    {
        $limit=$this->config->item('view_per_page');
        $start=$page*$limit;
        $this->db->from('rnd_general_crop_info_setup rgcis');
        $this->db->select('rc.crop_name');
        $this->db->select('rct.type_name');
        $this->db->select('rs.season_name');
        $this->db->select('rgcis.*');
        $this->db->select('dss.estimated_delivery_date,dss.delivery_date,dss.receive_date,dss.expected_sowing_start,dss.expected_sowing_end,dss.sowing_date');
        $this->db->join('rnd_crop rc','rc.id =rgcis.crop_id','INNER');
        $this->db->join('rnd_crop_type rct','rct.id =rgcis.crop_type_id','INNER');
        $this->db->join('rnd_season rs','rs.id =rgcis.season_id','INNER');
        $this->db->join('delivery_and_sowing_setup dss','dss.year =rgcis.year and dss.crop_id = rgcis.crop_id and dss.season_id = rgcis.season_id','LEFT');

        $this->db->limit($limit,$start);


        $result = $this->db->get()->result_array();
        return $result;

    }


    public function get_crop_info($id)
    {
        $this->db->select('rnd_general_crop_info_setup.*');
        $this->db->from('rnd_general_crop_info_setup');
        $this->db->where('id',$id);

        $result = $this->db->get()->row_array();
        return $result;
    }

    public function check_crop_info_existence($plot,$id)
    {
        $this->db->select('rnd_setup_plot_info.*');
        $this->db->from('rnd_setup_plot_info');
        $this->db->where('plot_name',$plot);
        $this->db->where('id !=',$id);
        $result = $this->db->get()->row_array();
        if($result)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

}