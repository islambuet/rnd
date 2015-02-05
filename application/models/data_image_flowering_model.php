<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_image_flowering_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }

    public function get_varieties($year,$season_id,$crop_id,$crop_type_id,$flowering_time)
    {
        $sub_query='(SELECT * FROM rnd_data_image_flowering where year="'.$year.'" AND season_id='.$season_id.' AND crop_id='.$crop_id.' AND crop_type_id='.$crop_type_id.' AND flowering_time='.$flowering_time.')';

        $this->db->from('rnd_variety rv');
        $this->db->select('rv.*');
        $this->db->select('rdifd.images images,rdifd.remarks,rdifd.id rdifd_id');
        $this->db->select('rc.crop_name crop_name, rc.crop_code crop_code');
        $this->db->select('ct.type_name type_name ,ct.type_code type_code');
        $this->db->select('rp.principal_name,rp.principal_code');

        $this->db->join('rnd_variety_season rvs','rvs.variety_id = rv.id','INNER');
        $this->db->join($sub_query.' rdifd', 'rdifd.variety_id = rvs.variety_id', 'left');

        $this->db->join('rnd_crop rc', 'rc.id = rv.crop_id', 'inner');
        $this->db->join('rnd_crop_type ct', 'ct.id = rv.crop_type_id', 'inner');
        $this->db->join('rnd_principal rp', 'rp.id = rv.principal_id', 'left');

        $this->db->where('rv.year',$year);
        $this->db->where('rv.crop_id',$crop_id);
        $this->db->where('rv.crop_type_id',$crop_type_id);
        $this->db->where('rvs.season_id',$season_id);
        $this->db->where('rvs.season_status',1);
        $this->db->where('rvs.sample_delivery_status',1);

        $result = $this->db->get()->result_array();
        return $result;
    }
}