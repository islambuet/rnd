<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Create_type_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }

    public function get_typeInfo($page=null)
    {
        $limit=$this->config->item('view_per_page');
        $start=$page*$limit;
        $this->db->from('rnd_product_type_info rti');
        $this->db->select('rti.*');
        $this->db->select('cinfo.crop_name crop_name');

        $this->db->join('rnd_crop_info cinfo', 'cinfo.id = rti.crop_id', 'left');

        $this->db->where('rti.status !=',$this->config->item('rnd_delete_status_code'));
        $this->db->limit($limit,$start);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_total_types()
    {
        $this->db->select('rnd_product_type_info.*');
        $this->db->from('rnd_product_type_info');

        $this->db->where('status !=',$this->config->item('rnd_delete_status_code'));
        return $this->db->count_all_results();
    }

    public function get_type_row($id)
    {
        $this->db->select('rnd_product_type_info.*');
        $this->db->from('rnd_product_type_info');
        $this->db->where('id',$id);

        $query = $this->db->get();
        return $query->row_array();
    }

}