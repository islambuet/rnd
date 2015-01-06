<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Rnd_labour_activities_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }

    public function get_labour_activity_info($page=null)
    {
        $limit=$this->config->item('view_per_page');
        $start=$page*$limit;
        $this->db->from('rnd_labor_activity_info lai');
        $this->db->select('lai.*');

        $this->db->select('ci.crop_name crop_name');
        $this->db->select('pti.product_type product_type');
        $this->db->select('lan.labor_activity_name labor_activity_name');

        $this->db->join('rnd_crop_info ci', 'ci.id = lai.crop_id', 'left');
        $this->db->join('rnd_product_type_info pti', 'pti.id = lai.product_type_id', 'left');
        $this->db->join('rnd_labor_activity_name lan', 'lan.id = lai.labor_activity_name_id', 'left');

        $this->db->where('lai.status',$this->config->item('active'));
        $this->db->limit($limit,$start);



        $query = $this->db->get();
        //echo $this->db->last_query();exit;

        return $query->result_array();
    }

    public function get_total_labour_activity()
    {
        $this->db->select('rnd_labor_activity_info.*');
        $this->db->from('rnd_labor_activity_info');
        $this->db->where('status',$this->config->item('active'));

        return $this->db->count_all_results();
    }

    public function get_labour_activity_row($id)
    {
        $this->db->select('lai.*');
        $this->db->from('rnd_labor_activity_info lai');
        $this->db->select('lan.labor_activity_name labor_activity_name');

        $this->db->join('rnd_labor_activity_name lan', 'lan.id = lai.labor_activity_name_id', 'left');

        $this->db->where('lai.id',$id);

        $query = $this->db->get();
        return $query->row_array();
    }

//    public function get_labour_activity()
//    {
//        $this->db->select('rnd_pesticide_fungicide_info.*');
//        $this->db->from('rnd_pesticide_fungicide_info');
//        $this->db->where('status',$this->config->item('active'));
//
//        $query = $this->db->get();
//        return $query->result_array();
//    }

}