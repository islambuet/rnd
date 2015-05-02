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
        $this->db->order_by('rpd.id DESC');
        $result = $this->db->get()->row_array();
        if($result)
        {
            $plot_info=json_decode($result['plot_info'],true);
            $varieties_ids=array();
            foreach($plot_info as $info)
            {
                foreach($info['variety_id'] as $id)
                {
                    if($id>0)
                    {
                        $varieties_ids[]=$id;
                    }

                }
            }

            $this->db->from('rnd_variety rv');
            $this->db->select('rv.*');
            $this->db->select('rc.crop_name crop_name, rc.crop_code crop_code');
            $this->db->select('ct.type_code type_code, ct.type_name type_name');
            $this->db->select('rp.principal_code,rp.principal_name');

            $this->db->join('rnd_crop rc', 'rc.id = rv.crop_id', 'inner');
            $this->db->join('rnd_crop_type ct', 'ct.id = rv.crop_type_id', 'inner');

            $this->db->join('rnd_principal rp', 'rp.id = rv.principal_id', 'left');
            $this->db->where_in('rv.id',$varieties_ids);


            $varieties = $this->db->get()->result_array();
            foreach($varieties as $variety)
            {
                $result['varieties'][$variety['id']]=System_helper::get_rnd_code($variety,1);
            }
        }
        return $result;
    }
}