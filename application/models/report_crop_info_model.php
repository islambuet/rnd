<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Report_crop_info_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }

    public function get_crops_info($year,$season_id,$crop_id,$crop_type_id)
    {
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
        if($year>0)
        {
            $this->db->where('rgcis.year',$year);
        }
        if($season_id>0)
        {
            $this->db->where('rgcis.season_id',$season_id);
        }
        if($crop_id>0)
        {
            $this->db->where('rgcis.crop_id',$crop_id);
            if($crop_type_id>0)
            {
                $this->db->where('rgcis.crop_type_id',$crop_type_id);
            }
        }
        $result = $this->db->get()->result_array();
        return $result;
    }
}