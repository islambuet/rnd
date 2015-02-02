<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rnd_common_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }
    public function get_cropTypes_by_cropId($crop_id)
    {


        $this->db->select('*');
        $this->db->from('rnd_crop_type');
        $this->db->where('crop_id',$crop_id);

        $result = $this->db->get()->result_array();
        return $result;
    }
    //bellow code is not final

//    public function dropDown_crop($season_id)
//    {
//        $this->db->select('vs.*');
//        $this->db->from('rnd_variety_season vs');
//        $this->db->where('season_id',$season_id);
//        $this->db->select('cinfo.crop_name crop_name');
//
//        $this->db->join('rnd_crop_info cinfo', 'cinfo.id = vs.crop_id', 'left');
//        $this->db->group_by('vs.crop_id');
//
//        $query = $this->db->get();
//
//        return $query->result_array();
//    }
//
//
//
//    public function dropDown_rnd_code_by_name_type($crop_id,$type_id)
//    {
//        $this->db->select('rnd_variety_info.*');
//        $this->db->from('rnd_variety_info');
//        $this->db->where('crop_id',$crop_id);
//        $this->db->where('product_type_id',$type_id);
//
//        $query = $this->db->get();
//
//        return $query->result_array();
//    }
//
//    public function dropDown_rnd_code_by_type($crop_type)
//    {
//        $this->db->select('rnd_variety_info.*');
//        $this->db->from('rnd_variety_info');
//        $this->db->where('product_type_id',$crop_type);
//
//        $query = $this->db->get();
//
//        return $query->result_array();
//    }
//
//    //////// Start Edit By Maraj dropDown_rnd_code_by_crop_name/////////
//    public function dropDown_rnd_code_by_crop_name($crop_id, $season_id)
//    {
//        $this->db->select
//        ('
//        rnd_variety_info.id,
//        rnd_variety_info.rnd_code
//        ');
//        $this->db->from('rnd_variety_info');
//        $this->db->join('rnd_variety_season','rnd_variety_season.variety_id = rnd_variety_info.id', 'LEFT');
//        $this->db->where('rnd_variety_season.crop_id',$crop_id);
//        $this->db->where('rnd_variety_season.season_id',$season_id);
//        $query = $this->db->get();
//        return $query->result_array();
//    }
//    //////// End Edit By Maraj dropDown_rnd_code_by_crop_name/////////
//
//    public function get_variety_by_season($season)
//    {
//        $this->db->from('rnd_variety_info vi');
//        $this->db->select('vi.*');
//
//        $this->db->join('rnd_sample_delivery_date_crop sddc', 'sddc.rnd_code_id = vi.id', 'left');
//        $this->db->join('rnd_variety_season vs', 'vs.variety_id = vi.id', 'left');
//
//        $this->db->where('vi.id NOT IN (SELECT rnd_code_id FROM rnd_sample_delivery_date_crop)', NULL, FALSE);
//        $this->db->where('vs.season_id',$season);
//
//        $query = $this->db->get();
//        return $query->result_array();
//    }
//
//    public function get_sowing_date_by_season($season)
//    {
//        $this->db->select('rnd_sample_delivery_date.sowing_date');
//        $this->db->from('rnd_sample_delivery_date');
//
//        $this->db->where('season_id',$season);
//        $query = $this->db->get();
//
//        $result = $query->row_array();
//
//        if($result)
//        {
//            return date('d-m-Y',$result['sowing_date']);
//        }
//        else
//        {
//            return null;
//        }
//    }

}