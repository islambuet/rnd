<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Report_principal_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }

    public function get_varieties($principal_id,$year,$season_id,$crop_id,$crop_type_id='')
    {
        $this->db->from('rnd_variety rv');
        $this->db->select('DISTINCT(rv.id)');
        $this->db->select('rv.*');

        $this->db->select('rc.crop_name crop_name, rc.crop_code crop_code');
        $this->db->select('ct.type_name type_name ,ct.type_code type_code');
        $this->db->select('rp.principal_name,rp.principal_code');

        $this->db->join('rnd_variety_season rvs','rvs.variety_id = rv.id','INNER');
        $this->db->join('rnd_crop rc', 'rc.id = rv.crop_id', 'inner');
        $this->db->join('rnd_crop_type ct', 'ct.id = rv.crop_type_id', 'inner');
        $this->db->join('rnd_principal rp', 'rp.id = rv.principal_id', 'left');
        if($principal_id>0)
        {
            $this->db->where('rv.principal_id',$principal_id);
        }
        $this->db->where('rv.principal_id >',0);
        if($year>0)
        {
            $this->db->where('rv.year',$year);
        }
        if($crop_id>0)
        {
            $this->db->where('rv.crop_id',$crop_id);

            if($crop_type_id>0)
            {
                $this->db->where('rv.crop_type_id',$crop_type_id);
            }
        }
        if($season_id>0)
        {
            $this->db->where('rvs.season_id',$season_id);
        }
        $this->db->where('rvs.season_status',1);
        $this->db->where('rvs.sample_delivery_status',1);
        $this->db->order_by('rv.id');

        $result = $this->db->get()->result_array();
        return $result;
    }
    public function get_reports($ids,$season_id)
    {
        $this->db->from('rnd_variety rv');
        $this->db->select('rv.*');
        $this->db->select('rc.crop_name crop_name, rc.crop_code crop_code');
        $this->db->select('ct.type_code type_code, ct.type_name type_name');
        $this->db->select('rp.principal_code,rp.principal_name');
        $this->db->select('rs.season_name,rs.id season_id');
        $this->db->select('hpde.principal_remark,hpde.final_remark,hpde.forth_nightly_remark,hpde.fruit_remark,hpde.yield_remark');

        $this->db->join('rnd_crop rc', 'rc.id = rv.crop_id', 'inner');
        $this->db->join('rnd_crop_type ct', 'ct.id = rv.crop_type_id', 'inner');
        $this->db->join('rnd_variety_season rvs','rvs.variety_id = rv.id','INNER');
        $this->db->join('rnd_season rs','rvs.season_id = rs.id','INNER');

        $this->db->join('rnd_principal rp', 'rp.id = rv.principal_id', 'left');
        $this->db->join('hofc_principal_data_entry hpde', 'hpde.variety_id = rv.id and hpde.season_id = rvs.season_id', 'left');
        $this->db->where_in('rv.id',$ids);
        $this->db->order_by('rv.id');
        if($season_id>0)
        {
            $this->db->where('rs.id',$season_id);
        }
        $this->db->where('rvs.sample_delivery_status',1);


        $results = $this->db->get()->result_array();
        return $results;

    }
    public function get_max_15_days($year,$season_id,$crop_id,$crop_type_id)
    {
        $this->db->from('rnd_setup_image_fifteen_days rsifd');
        $this->db->select('MAX(rsifd.number_of_fifteendays) max_days');
        if($year>0)
        {
            $this->db->where('rsifd.year',$year);
        }
        if($season_id>0)
        {
            $this->db->where('rsifd.season_id',$season_id);
        }
        if($crop_id>0)
        {
            $this->db->where('rsifd.crop_id',$crop_id);
            if($crop_type_id>0)
            {
                $this->db->where('rsifd.crop_type_id',$crop_type_id);
            }
        }
        $result=$this->db->get()->row_array();
        return $result['max_days']?$result['max_days']:1;

    }
    public function get_15_days_images($ids,$season_id)
    {
        $this->db->from('rnd_data_image_fifteen_days rdifd');
        $this->db->select('variety_id,day_number,images,remarks,season_id');
        if($season_id>0)
        {
            $this->db->where('rdifd.season_id',$season_id);
        }
        $this->db->where_in('variety_id',$ids);
        $results=$this->db->get()->result_array();

        if(sizeof($results)>0)
        {
            $varieties=array();
            foreach($results as $result)
            {
                $varieties[$result['variety_id']][$result['season_id']][$result['day_number']]=$result;

            }
            return $varieties;

        }
        else
        {
            return null;
        }

    }
    public function get_fruit_images($ids,$season_id)
    {
        $this->db->from('rnd_data_image_fruit rdif');
        $this->db->select('variety_id,fruit_image_type,images,remarks,season_id');
        if($season_id>0)
        {
            $this->db->where('rdif.season_id',$season_id);
        }

        $this->db->where_in('variety_id',$ids);
        $results=$this->db->get()->result_array();

        if(sizeof($results)>0)
        {
            $varieties=array();
            foreach($results as $result)
            {
                $varieties[$result['variety_id']][$result['season_id']][$result['fruit_image_type']]=$result;

            }
            return $varieties;

        }
        else
        {
            return null;
        }

    }

}