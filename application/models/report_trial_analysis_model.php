<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Report_trial_analysis_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }

    public function get_varieties($year,$season_id,$crop_id,$crop_type_id='')
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

        if($crop_type_id !='')
        {
            $this->db->where('rv.crop_type_id',$crop_type_id);
        }

        $this->db->where('rvs.season_id',$season_id);
        $this->db->where('rvs.season_status',1);
        $this->db->where('rvs.sample_delivery_status',1);
        $this->db->order_by('rv.id');

        $result = $this->db->get()->result_array();
        return $result;
    }
    public function get_varieties_by_ids($ids)
    {
        $this->db->from('rnd_variety rv');
        $this->db->select('rv.*');
        $this->db->select('rc.crop_name crop_name, rc.crop_code crop_code');
        $this->db->select('ct.type_code type_code, ct.type_name type_name');
        $this->db->select('rp.principal_code,rp.principal_name');

        $this->db->join('rnd_crop rc', 'rc.id = rv.crop_id', 'inner');
        $this->db->join('rnd_crop_type ct', 'ct.id = rv.crop_type_id', 'inner');

        $this->db->join('rnd_principal rp', 'rp.id = rv.principal_id', 'left');
        $this->db->where_in('rv.id',$ids);
        $this->db->order_by('rv.id');


        $results = $this->db->get()->result_array();
        return $results;
//        $varieties=array();
//        foreach($results as $result)
//        {
//            $varieties[$result['id']]['rnd_code']=System_helper::get_rnd_code($result);
//        }
//        return $varieties;

    }
    public function get_remarks($table_name,$ids,$year,$season_id)
    {
        $this->db->from($table_name);
        $this->db->select('variety_id,info');
        $this->db->where('year',$year);
        $this->db->where('season_id',$season_id);
        $this->db->where_in('variety_id',$ids);
        $results=$this->db->get()->result_array();
        if(sizeof($results)>0)
        {
            $varieties=array();
            foreach($results as $result)
            {
                $info=json_decode($result['info'],true);
                $varieties[$result['variety_id']]['remarks']=$info['normal']['remarks'];
            }
            return $varieties;

        }
        else
        {
            return null;
        }
    }
    public function get_details_fortnightly($ids,$year,$season_id)
    {
        $this->db->from('rnd_data_text_fifteen_days rdtfd');
        $this->db->select('rdtfd.variety_id,rdtfd.info,rdtfd.ranking');
        $this->db->where('rdtfd.year',$year);
        $this->db->where('rdtfd.season_id',$season_id);
        $this->db->where_in('rdtfd.variety_id',$ids);
        $results=$this->db->get()->result_array();
        //return $results;
        if(sizeof($results)>0)
        {
            $varieties=array();
            foreach($results as $result)
            {
                $varieties[$result['variety_id']]['info']=$result['info'];
                $varieties[$result['variety_id']]['ranking']=$result['ranking'];

            }
            return $varieties;

        }
        else
        {
            return null;
        }
    }
    public function get_details_flowering($ids,$year,$season_id)
    {
        $this->db->from('rnd_data_text_flowering rdtf');
        $this->db->select('rdtf.variety_id,rdtf.info,rdtf.ranking');
        $this->db->where('rdtf.year',$year);
        $this->db->where('rdtf.season_id',$season_id);
        $this->db->where_in('rdtf.variety_id',$ids);
        $results=$this->db->get()->result_array();
        //return $results;
        if(sizeof($results)>0)
        {
            $varieties=array();
            foreach($results as $result)
            {
                $varieties[$result['variety_id']]['info']=$result['info'];
                $varieties[$result['variety_id']]['ranking']=$result['ranking'];

            }
            return $varieties;

        }
        else
        {
            return null;
        }
    }
    public function get_details_fruit($ids,$year,$season_id)
    {
        $this->db->from('rnd_data_text_fruit rdtf');
        $this->db->select('rdtf.variety_id,rdtf.info,rdtf.ranking');
        $this->db->where('rdtf.year',$year);
        $this->db->where('rdtf.season_id',$season_id);
        $this->db->where_in('rdtf.variety_id',$ids);
        $results=$this->db->get()->result_array();
        //return $results;
        if(sizeof($results)>0)
        {
            $varieties=array();
            foreach($results as $result)
            {
                $varieties[$result['variety_id']]['info']=$result['info'];
                $varieties[$result['variety_id']]['ranking']=$result['ranking'];

            }
            return $varieties;

        }
        else
        {
            return null;
        }
    }
    public function get_details_harvest($ids,$year,$season_id)
    {
        $this->db->from('rnd_data_text_harvest_cropwise rdthc');
        $this->db->select('rdthc.variety_id,rdthc.info,rdthc.harvest_no');
        $this->db->where('rdthc.year',$year);
        $this->db->where('rdthc.season_id',$season_id);
        $this->db->where_in('rdthc.variety_id',$ids);
        $results=$this->db->get()->result_array();
        //return $results;
        if(sizeof($results)>0)
        {
            $varieties=array();
            foreach($results as $result)
            {
                $varieties[$result['variety_id']][$result['harvest_no']]=$result['info'];


            }
            return $varieties;

        }
        else
        {
            return null;
        }

    }
    public function get_details_harvest_compile($ids,$year,$season_id)
    {
        $this->db->from('rnd_data_text_harvest_compile rdthc');
        $this->db->select('rdthc.variety_id,rdthc.info,rdthc.ranking');
        $this->db->where('rdthc.year',$year);
        $this->db->where('rdthc.season_id',$season_id);
        $this->db->where_in('rdthc.variety_id',$ids);
        $results=$this->db->get()->result_array();
        //return $results;
        if(sizeof($results)>0)
        {
            $varieties=array();
            foreach($results as $result)
            {
                $varieties[$result['variety_id']]['info']=$result['info'];
                $varieties[$result['variety_id']]['ranking']=$result['ranking'];

            }
            return $varieties;

        }
        else
        {
            return null;
        }
    }
    public function get_details_yeild($ids,$year,$season_id)
    {
        $this->db->from('rnd_data_text_yield rdty');
        $this->db->select('rdty.variety_id,rdty.info,rdty.ranking');
        $this->db->where('rdty.year',$year);
        $this->db->where('rdty.season_id',$season_id);
        $this->db->where_in('rdty.variety_id',$ids);
        $results=$this->db->get()->result_array();
        //return $results;
        if(sizeof($results)>0)
        {
            $varieties=array();
            foreach($results as $result)
            {
                $varieties[$result['variety_id']]['info']=$result['info'];
                $varieties[$result['variety_id']]['ranking']=$result['ranking'];

            }
            return $varieties;

        }
        else
        {
            return null;
        }
    }
    public function get_details_final($ids,$year,$season_id)
    {
        $this->db->from('rnd_data_text_veg_fruit rdtvg');
        $this->db->select('rdtvg.variety_id,rdtvg.info,rdtvg.ranking,rdtvg.trial_status');
        $this->db->where('rdtvg.year',$year);
        $this->db->where('rdtvg.season_id',$season_id);
        $this->db->where_in('rdtvg.variety_id',$ids);
        $results=$this->db->get()->result_array();
        //return $results;
        if(sizeof($results)>0)
        {
            $varieties=array();
            foreach($results as $result)
            {
                $varieties[$result['variety_id']]['info']=$result['info'];
                $varieties[$result['variety_id']]['trial_status']=$result['trial_status'];
                $varieties[$result['variety_id']]['ranking']=$result['ranking'];

            }
            return $varieties;

        }
        else
        {
            return null;
        }
    }
    public function get_max_15_days($year,$season_id,$crop_id,$crop_type_id)
    {
        $this->db->from('rnd_setup_image_fifteen_days rsifd');
        $this->db->select('MAX(rsifd.number_of_fifteendays) max_days');
        $this->db->where('rsifd.year',$year);
        $this->db->where('rsifd.season_id',$season_id);
        $this->db->where('rsifd.crop_id',$crop_id);
        if($crop_type_id>0)
        {
            $this->db->where('rsifd.crop_type_id',$crop_type_id);
        }
        $result=$this->db->get()->row_array();
        return $result['max_days']?$result['max_days']:1;

    }
    public function get_max_harvest_days_image($year,$season_id,$crop_id,$crop_type_id)
    {
        $this->db->from('rnd_data_image_harvest_cropwise rdihc');
        $this->db->select('MAX(rdihc.harvest_no) max_days');
        $this->db->where('rdihc.year',$year);
        $this->db->where('rdihc.season_id',$season_id);
        $this->db->where('rdihc.crop_id',$crop_id);
        if($crop_type_id>0)
        {
            $this->db->where('rdihc.crop_type_id',$crop_type_id);
        }
        $result=$this->db->get()->row_array();
        return $result['max_days']?$result['max_days']:1;

    }
    public function get_max_harvest_days_text($year,$season_id,$crop_id,$crop_type_id)
    {
        $this->db->from('rnd_data_text_harvest_cropwise rdthc');
        $this->db->select('MAX(rdthc.harvest_no) max_days');
        $this->db->where('rdthc.year',$year);
        $this->db->where('rdthc.season_id',$season_id);
        $this->db->where('rdthc.crop_id',$crop_id);
        if($crop_type_id>0)
        {
            $this->db->where('rdthc.crop_type_id',$crop_type_id);
        }
        $result=$this->db->get()->row_array();
        return $result['max_days']?$result['max_days']:1;

    }
    public function get_15_days_images($ids,$year,$season_id)
    {
        $this->db->from('rnd_data_image_fifteen_days rdifd');
        $this->db->select('variety_id,day_number,images,remarks');
        $this->db->where('rdifd.year',$year);
        $this->db->where('rdifd.season_id',$season_id);
        $this->db->where_in('variety_id',$ids);
        $results=$this->db->get()->result_array();

        if(sizeof($results)>0)
        {
            $varieties=array();
            foreach($results as $result)
            {
                $varieties[$result['variety_id']][$result['day_number']]=$result;

            }
            return $varieties;

        }
        else
        {
            return null;
        }

    }
    public function get_flowering_images($ids,$year,$season_id)
    {
        $this->db->from('rnd_data_image_flowering rdif');
        $this->db->select('variety_id,flowering_time,images,remarks');
        $this->db->where('rdif.year',$year);
        $this->db->where('rdif.season_id',$season_id);
        $this->db->where_in('variety_id',$ids);
        $results=$this->db->get()->result_array();

        if(sizeof($results)>0)
        {
            $varieties=array();
            foreach($results as $result)
            {
                $varieties[$result['variety_id']][$result['flowering_time']]=$result;

            }
            return $varieties;

        }
        else
        {
            return null;
        }

    }
    public function get_fruit_images($ids,$year,$season_id)
    {
        $this->db->from('rnd_data_image_fruit rdif');
        $this->db->select('variety_id,fruit_image_type,images,remarks');
        $this->db->where('rdif.year',$year);
        $this->db->where('rdif.season_id',$season_id);
        $this->db->where_in('variety_id',$ids);
        $results=$this->db->get()->result_array();

        if(sizeof($results)>0)
        {
            $varieties=array();
            foreach($results as $result)
            {
                $varieties[$result['variety_id']][$result['fruit_image_type']]=$result;

            }
            return $varieties;

        }
        else
        {
            return null;
        }

    }
    public function get_harvest_images($ids,$year,$season_id)
    {
        $this->db->from('rnd_data_image_harvest_cropwise rdihc');
        $this->db->select('variety_id,harvest_no,images,remarks');
        $this->db->where('rdihc.year',$year);
        $this->db->where('rdihc.season_id',$season_id);
        $this->db->where_in('variety_id',$ids);
        $results=$this->db->get()->result_array();

        if(sizeof($results)>0)
        {
            $varieties=array();
            foreach($results as $result)
            {
                $varieties[$result['variety_id']][$result['harvest_no']]=$result;

            }
            return $varieties;

        }
        else
        {
            return null;
        }

    }
}