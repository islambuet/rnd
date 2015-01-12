<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Create_pesticide_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }

    public function get_pesticideInfo($page=null)
    {
        $limit=$this->config->item('view_per_page');
        $start=$page*$limit;
        $this->db->from('rnd_pesticide_fungicide_info rpfi');
        $this->db->select('rpfi.*');

        $this->db->where('status !=',$this->config->item('rnd_delete_status_code'));
        $this->db->limit($limit,$start);
        $this->db->order_by('rpfi.id','DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_total_pesticides()
    {
        $this->db->select('rnd_pesticide_fungicide_info.*');
        $this->db->from('rnd_pesticide_fungicide_info');

        $this->db->where('status !=',$this->config->item('rnd_delete_status_code'));
        return $this->db->count_all_results();
    }

    public function get_pesticide_row($id)
    {
        $this->db->select('rnd_pesticide_fungicide_info.*');
        $this->db->from('rnd_pesticide_fungicide_info');
        $this->db->where('id',$id);

        $query = $this->db->get();
        return $query->row_array();
    }

    public function check_pesticide_existence($pesticide,$id)
    {
        $this->db->select('rnd_pesticide_fungicide_info.*');
        $this->db->from('rnd_pesticide_fungicide_info');
        $this->db->where('pesticide_name',$pesticide);
        $this->db->where('id !=',$id);

        $query = $this->db->get();
        $result = $query->row_array();

        if($result)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

}