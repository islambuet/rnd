<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Create_crop_variety_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }

    public function get_varieties($page=0)
    {
        $limit=$this->config->item('view_per_page');
        $start=$page*$limit;
        $this->db->from('rnd_variety rv');
        $this->db->select('rv.*');
        $this->db->select('rc.crop_name crop_name, rc.crop_code crop_code');
        $this->db->select('ct.type_code type_code, ct.type_name type_name');
        $this->db->select('rp.principal_code,rp.principal_name');

        $this->db->join('rnd_crop rc', 'rc.id = rv.crop_id', 'inner');
        $this->db->join('rnd_crop_type ct', 'ct.id = rv.crop_type_id', 'inner');

        $this->db->join('rnd_principal rp', 'rp.id = rv.principal_id', 'left');


        $this->db->order_by('rv.id','DESC');
        $this->db->limit($limit,$start);
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function get_total_varieties()
    {
        $this->db->select('rnd_variety.*');
        $this->db->from('rnd_variety');

        return $this->db->count_all_results();
    }

    public function get_varietyIndex($year,$crop_id)
    {
        $this->db->select('max(variety_index) variety_index');
        $this->db->from('rnd_variety');
        $this->db->where('year',$year);
        $this->db->where('crop_id',$crop_id);
        $result = $this->db->get()->row_array();

        if($result)
        {
            if($result['variety_index']>0)
            {
                return ($result['variety_index']+1);
            }
            else
            {
                return 1;
            }
        }
        else
        {
            return 1;
        }

    }
    public function check_variety_exists($year,$crop_id,$variety_name,$variety_id=0)
    {
        $this->db->from("rnd_variety");
        $this->db->where("id !=",$variety_id);
        $this->db->where("year",$year);
        $this->db->where("crop_id",$crop_id);
        $this->db->where("variety_name",$variety_name);
        if($this->db->count_all_results()>0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function get_variety_no($crop_id,$variety_name)
    {
        $this->db->from("rnd_variety");
        $this->db->select_max('variety_no', 'variety_no_max');
        $this->db->where("crop_id",$crop_id);
        $this->db->where("variety_name",$variety_name);

        $result=$this->db->get()->row_array();

        if($result)
        {
            return $result['variety_no_max']?$result['variety_no_max']+1:1;
        }
        else
        {
            return 1;
        }
    }

    public function get_variety_info($id)
    {
        $this->db->from("rnd_variety rv");
        $this->db->select("rv.*");
        $this->db->select('ct.type_name crop_type_name');

        $this->db->join('rnd_crop_type ct', 'ct.id = rv.crop_type_id', 'inner');
        $this->db->where("rv.id",$id);
        $variety=$this->db->get()->row_array();
        return $variety;
    }
    public function get_crop_types($crop_id)
    {
        $this->db->select('*');
        $this->db->from('rnd_crop_type');
        $this->db->where('crop_id',$crop_id);

        $result = $this->db->get()->result_array();
        return $result;
    }
    public function get_seasons_info($id)
    {
        $this->db->select('*');
        $this->db->from('rnd_variety_season');
        $this->db->where('variety_id',$id);

        $result = $this->db->get()->result_array();
        $seasons=array();
        foreach($result as $season)
        {
            $seasons[$season['season_id']]=array("season_status"=>$season['season_status'],"sample_delivery_status"=>$season['sample_delivery_status']);

        }
        return $seasons;
    }

    public function get_expected_seed_per_gram($crop_id, $crop_type_id)
    {
        $this->db->select('*');
        $this->db->from('rnd_crop_type');
        $this->db->where('crop_id',$crop_id);
        $this->db->where('id',$crop_type_id);

        $result = $this->db->get()->row_array();
        if($result)
        {
            return $result['expected_seed_per_gram'];
        }
        else
        {
            return null;
        }
    }

    /*

    public function get_type_row($id)
    {
        $this->db->select('rnd_variety_info.*');
        $this->db->from('rnd_variety_info');
        $this->db->where('id',$id);

        $query = $this->db->get();
        return $query->row_array();
    }





    public function delete_variety_season($id)
    {
        $this->db->delete('rnd_variety_season', array('variety_id' => $id));
    }

    /////// Functions below were used to create R&D Code ///////

    public function get_crop_code_by_id($crop_id)
    {
        $this->db->select('rnd_crop_info.crop_code');
        $this->db->from('rnd_crop_info');
        $this->db->where('id',$crop_id);

        $query = $this->db->get();
        $result = $query->row_array();
        return $result['crop_code'];
    }

    public function get_type_code_by_id($type_id)
    {
        $this->db->select('rnd_product_type_info.product_type_code');
        $this->db->from('rnd_product_type_info');
        $this->db->where('id',$type_id);

        $query = $this->db->get();
        $result = $query->row_array();
        return $result['product_type_code'];
    }

    public function get_variety_last_id($crop_id)
    {
        $this->db->select('rnd_variety_info.rnd_code');
        $this->db->from('rnd_variety_info');
        $this->db->where('crop_id',$crop_id);
        $this->db->order_by('id','DESC');
        $this->db->limit('1');

        $query = $this->db->get();
        $result = $query->row_array();

        if($result['rnd_code'])
        {
            $rndCode = $result['rnd_code'];
            $exp = explode('-',$rndCode);
            $code = $exp[2];
            return ++$code;
        }
        else
        {
            return 1;
        }
    }

    public function get_principal_code_by_id($principal_id)
    {
        $this->db->select('rnd_principal_info.principal_code');
        $this->db->from('rnd_principal_info');
        $this->db->where('id',$principal_id);

        $query = $this->db->get();
        $result = $query->row_array();
        return $result['principal_code'];
    }*/


}