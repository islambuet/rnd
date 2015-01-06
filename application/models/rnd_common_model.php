<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rnd_common_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }

    public function dropDown_crop($season_id)
    {
        $this->db->select('vs.*');
        $this->db->from('rnd_variety_season vs');
        $this->db->where('season_id',$season_id);
        $this->db->select('cinfo.crop_name crop_name');

        $this->db->join('rnd_crop_info cinfo', 'cinfo.id = vs.crop_id', 'left');
        $this->db->group_by('vs.crop_id');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function dropDown_crop_type($crop_id)
    {
        $this->db->select('vs.*');
        $this->db->from('rnd_variety_season vs');
        $this->db->select('tinfo.product_type product_type');

        $this->db->join('rnd_product_type_info tinfo', 'tinfo.id = vs.product_type_id', 'left');
        $this->db->where('vs.crop_id',$crop_id);
        $this->db->group_by('vs.product_type_id');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function dropDown_rnd_code_by_name_type($crop_id,$type_id)
    {
        $this->db->select('rnd_variety_info.*');
        $this->db->from('rnd_variety_info');
        $this->db->where('crop_id',$crop_id);
        $this->db->where('product_type_id',$type_id);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_variety_by_season($season)
    {
        $this->db->from('rnd_variety_season vs');
        $this->db->select('vi.rnd_code rnd_code, vi.id rnd_id');

        $this->db->join('rnd_variety_info vi', 'vi.id = vs.variety_id', 'left');
        $this->db->where('vs.season_id',$season);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_sowing_date_by_season($season)
    {
        $this->db->select('rnd_sample_delivery_date.sowing_date');
        $this->db->from('rnd_sample_delivery_date');

        $this->db->where('season_id',$season);
        $query = $this->db->get();

        $result = $query->row_array();

        if($result)
        {
            return date('d-m-Y',$result['sowing_date']);
        }
        else
        {
            return null;
        }
    }

}