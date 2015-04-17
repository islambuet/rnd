<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Report_Variety_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }

    public function get_varieties_info($year,$season_id,$crop_id,$crop_type_id)
    {
        $this->db->from('rnd_variety rv');
        $this->db->select('rc.crop_name,rc.crop_code');
        $this->db->select('rct.type_name,rct.type_code');
        $this->db->select('rs.season_name');
        $this->db->select('rp.principal_code');
        $this->db->select('rv.*');
        $this->db->join('rnd_crop rc','rc.id =rv.crop_id','INNER');
        $this->db->join('rnd_crop_type rct','rct.id =rv.crop_type_id','INNER');
        $this->db->join('rnd_variety_season rvs','rvs.variety_id =rv.id','INNER');
        $this->db->join('rnd_season rs','rs.id =rvs.season_id','INNER');
        $this->db->join('rnd_principal rp','rp.id =rv.principal_id','LEFT');


        if($year>0)
        {
            $this->db->where('rv.year',$year);
        }
        if($season_id>0)
        {
            $this->db->where('rvs.season_id',$season_id);
        }
        if($crop_id>0)
        {
            $this->db->where('rv.crop_id',$crop_id);
            if($crop_type_id>0)
            {
                $this->db->where('rv.crop_type_id',$crop_type_id);
            }
        }
        $this->db->where('rvs.season_status',1);
        $this->db->order_by('rvs.season_id ASC,rv.id ASC');
        $result = $this->db->get()->result_array();
        return $result;
    }
}