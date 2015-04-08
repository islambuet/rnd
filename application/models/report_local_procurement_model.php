<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Report_local_procurement_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }

    public function get_varieties($year,$variety_type)
    {
        $sub_query='(SELECT sum(sample_size) total_send,variety_id,year FROM rnd_variety_season WHERE year="'.$year.'" GROUP BY variety_id)';
        $this->db->from('rnd_variety rv');
        $this->db->select('rv.*');
        $this->db->select('rp.principal_name,rp.principal_code');
        $this->db->select('rc.crop_name crop_name, rc.crop_code crop_code');
        $this->db->select('ct.type_name type_name ,ct.type_code type_code');
        $this->db->select('ts.total_send');
        $this->db->join('rnd_crop rc', 'rc.id = rv.crop_id', 'inner');
        $this->db->join('rnd_crop_type ct', 'ct.id = rv.crop_type_id', 'inner');
        $this->db->join('rnd_principal rp', 'rp.id = rv.principal_id', 'left');
        $this->db->join($sub_query.' ts','ts.variety_id = rv.id','LEFT');

        /*;



        $this->db->join('rnd_variety_season rvs','rvs.variety_id = rv.id','INNER');





        $this->db->where('rv.crop_id',$crop_id);

        if($crop_type_id !='')
        {
            $this->db->where('rv.crop_type_id',$crop_type_id);
        }

        $this->db->where('rvs.season_id',$season_id);
        $this->db->where('rvs.season_status',1);
        $this->db->where('rvs.sample_delivery_status',1);*/
        $this->db->where('rv.year',$year);
        $this->db->where('rv.variety_type',$variety_type);
        $this->db->order_by('rv.id');

        $result = $this->db->get()->result_array();
        return $result;
    }
}