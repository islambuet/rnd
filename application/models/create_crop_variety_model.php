<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Create_crop_variety_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }

    public function get_varietyInfo($page=null)
    {
        $limit=$this->config->item('view_per_page');
        $start=$page*$limit;
        $this->db->from('rnd_variety_info rvi');
        $this->db->select('rvi.*');
        $this->db->select('cinfo.crop_name crop_name');

        $this->db->join('rnd_crop_info cinfo', 'cinfo.id = rvi.crop_id', 'left');
        $this->db->group_by('variety_name');

//        $this->db->where('status',1);
        $this->db->limit($limit,$start);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_total_varieties()
    {
        $this->db->select('rnd_variety_info.*');
        $this->db->from('rnd_variety_info');

//        $this->db->where('status',1);
        return $this->db->count_all_results();
    }

    public function get_type_row($id)
    {
        $this->db->select('rnd_variety_info.*');
        $this->db->from('rnd_variety_info');
        $this->db->where('id',$id);

        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_seasons($id)
    {
        $this->db->select('rnd_variety_season.*');
        $this->db->from('rnd_variety_season');
        $this->db->where('variety_id',$id);

        $query = $this->db->get();
        return $result = $query->result_array();
    }

    public function get_product_type($crop_id)
    {
        $this->db->select('rnd_product_type_info.*');
        $this->db->from('rnd_product_type_info');
        $this->db->where('crop_id',$crop_id);

        $query = $this->db->get();
        return $query->result_array();
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

        if($result)
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
    }


}