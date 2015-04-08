<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Hofc_principal_data_entry_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_varieties($year,$season_id,$crop_id,$crop_type_id,$principal_id)
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
        $this->db->where('rp.id', $principal_id);

        $this->db->where('rv.year',$year);
        $this->db->where('rv.crop_id',$crop_id);
        $this->db->where('rv.crop_type_id',$crop_type_id);
        $this->db->where('rvs.season_id',$season_id);
        $this->db->where('rvs.season_status',1);
        $this->db->where('rvs.sample_delivery_status',1);

        $result = $this->db->get()->result_array();
        return $result;
    }

    public function get_variety_info($year,$season_id,$crop_id,$crop_type_id,$variety_id,$principal_id)
    {
        $this->db->from('hofc_principal_data_entry hpde');
        $this->db->select('id,hpde.principal_remark,hpde.final_remark');
        $this->db->where('hpde.year',$year);
        $this->db->where('hpde.season_id',$season_id);
        $this->db->where('hpde.crop_id',$crop_id);
        $this->db->where('hpde.crop_type_id',$crop_type_id);
        $this->db->where('hpde.variety_id',$variety_id);
        $this->db->where('hpde.principal_id',$principal_id);
        $result = $this->db->get()->row_array();
        $data=array();
        $data['hpde_id']=0;
        $data['principal_remark']='';
        $data['final_remark']='';
        if($result)
        {
            $data['hpde_id']=$result['id'];
            $data['principal_remark']=$result['principal_remark'];
            $data['final_remark']=$result['final_remark'];
        }
        else
        {
            $this->db->from('rnd_data_text_veg_fruit rdtvf');
            $this->db->select('info');
            $this->db->where('rdtvf.year',$year);
            $this->db->where('rdtvf.season_id',$season_id);
            $this->db->where('rdtvf.crop_id',$crop_id);
            $this->db->where('rdtvf.crop_type_id',$crop_type_id);
            $this->db->where('rdtvf.variety_id',$variety_id);
            $result = $this->db->get()->row_array();
            if($result)
            {
                $info=json_decode($result['info']);
                $data['final_remark']=$info['remarks'];
            }
        }
        return $data;
    }

    public function get_targeted_weight($crop_id, $crop_type_id)
    {
        $this->db->select('*');
        $this->db->from('rnd_crop_type');
        $this->db->where('crop_id',$crop_id);
        $this->db->where('id',$crop_type_id);
        $result = $this->db->get()->row_array();
        if($result)
        {
            return $result['terget_weight'];
        }
        else
        {
            return null;
        }
    }

    public function get_targeted_height($crop_id, $crop_type_id)
    {
        $this->db->select('*');
        $this->db->from('rnd_crop_type');
        $this->db->where('crop_id',$crop_id);
        $this->db->where('id',$crop_type_id);
        $result = $this->db->get()->row_array();
        if($result)
        {
            return $result['terget_length'];
        }
        else
        {
            return null;
        }
    }
}