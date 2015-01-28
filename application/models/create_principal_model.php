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
        $this->db->from('rnd_principal rp');
        $this->db->select('rp.*');

        $this->db->where('status !=',$this->config->item('status_delete'));
        $this->db->limit($limit,$start);
        $this->db->order_by('rp.id','DESC');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_total_principals()
    {
        $this->db->select('rnd_principal.*');
        $this->db->from('rnd_principal');

        $this->db->where('status !=',$this->config->item('status_delete'));
        return $this->db->count_all_results();
    }

    public function get_principal_row($id)
    {
        $this->db->select('rnd_principal.*');
        $this->db->from('rnd_principal');
        $this->db->where('id',$id);

        $query = $this->db->get();
        return $query->row_array();
    }

    public function check_existing_principal_name($principal_name,$id)
    {
        $this->db->select('rnd_principal.*');
        $this->db->from('rnd_principal');
        $this->db->where('principal_name',$principal_name);
        $this->db->where('id !=',$id);

        $result = $this->db->count_all_results();

        if($result>0)
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
        $this->db->select('rnd_principal.*');
        $this->db->from('rnd_principal');
        $this->db->where('principal_code',$principal_code);
        $this->db->where('id !=',$id);

        $result = $this->db->count_all_results();

        if($result>0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }


}