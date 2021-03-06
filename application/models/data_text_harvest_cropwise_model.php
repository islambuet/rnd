<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_text_harvest_cropwise_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }

    public function get_varieties($year,$season_id,$crop_id,$crop_type_id)
    {
        $this->db->from('rnd_variety rv');
        $this->db->select('rv.*');

        $this->db->select('rc.crop_name crop_name, rc.crop_code crop_code');
        $this->db->select('ct.type_name type_name ,ct.type_code type_code');
        $this->db->select('rp.principal_name,rp.principal_code');

        $this->db->join('rnd_variety_season rvs','rvs.variety_id = rv.id','INNER');


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

    public function get_variety_info($year,$season_id,$crop_id,$crop_type_id,$variety_id,$harvest_no)
    {
        $delivery_info_sub_query='(SELECT * FROM delivery_and_sowing_setup WHERE year="'.$year.'" AND season_id ='.$season_id.' AND crop_id ='.$crop_id.')';
        $text_sub_query='(SELECT id,info,variety_id FROM rnd_data_text_harvest_cropwise WHERE year="'.$year.'" AND season_id ='.$season_id.' AND crop_id ='.$crop_id.' AND crop_type_id ='.$crop_type_id.' AND variety_id ='.$variety_id.' AND harvest_no ='.$harvest_no.')';
        $this->db->from('rnd_variety rv');
        $this->db->select('rv.*');
        $this->db->select('dass.sowing_date,dass.transplanting_date');
        $this->db->select('rdtfd.info,rdtfd.id data_text_id');

        $this->db->join($delivery_info_sub_query.' dass', 'dass.crop_id = rv.crop_id', 'INNER');
        $this->db->join('rnd_crop rc', 'rc.id = rv.crop_id', 'INNER');
        $this->db->join($text_sub_query.' rdtfd', 'rdtfd.variety_id = rv.id', 'LEFT');

        $this->db->where('rv.id',$variety_id);
        $result = $this->db->get()->row_array();
        return $result;
    }


}