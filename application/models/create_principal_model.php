<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Create_principal_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }

    public function get_principalInfo($page=null)
    {
        $limit=$this->config->item('view_per_page');
        $start=$page*$limit;
        $this->db->from('rnd_principal_info rpi');
        $this->db->select('rpi.*');

        $this->db->where('status !=',$this->config->item('rnd_delete_status_code'));
        $this->db->limit($limit,$start);
        $this->db->order_by('rpi.id','DESC');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_total_principals()
    {
        $this->db->select('rnd_principal_info.*');
        $this->db->from('rnd_principal_info');

        $this->db->where('status !=',$this->config->item('rnd_delete_status_code'));
        return $this->db->count_all_results();
    }

    public function get_principal_row($id)
    {
        $this->db->select('rnd_principal_info.*');
        $this->db->from('rnd_principal_info');
        $this->db->where('id',$id);

        $query = $this->db->get();
        return $query->row_array();
    }

    public function check_existing_principal_name($principal_name,$id)
    {
        $this->db->select('rnd_principal_info.*');
        $this->db->from('rnd_principal_info');
        $this->db->where('principal_name',$principal_name);
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

    public function check_existing_principal_code($principal_code,$id)
    {
        $this->db->select('rnd_principal_info.*');
        $this->db->from('rnd_principal_info');
        $this->db->where('principal_code',$principal_code);
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