<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Setup_competitor_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }

    public function get_competitorInfo($page=null)
    {
        $limit=$this->config->item('view_per_page');
        $start=$page*$limit;
        $this->db->from('rnd_competitor rc');
        $this->db->select('rc.*');

        $this->db->where('status !=',$this->config->item('status_delete'));
        $this->db->limit($limit,$start);
        $this->db->order_by('rc.id','DESC');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_total_competitors()
    {
        $this->db->select('rnd_competitor.*');
        $this->db->from('rnd_competitor');

        $this->db->where('status !=',$this->config->item('status_delete'));
        return $this->db->count_all_results();
    }

    public function get_competitor_row($id)
    {
        $this->db->select('rnd_competitor.*');
        $this->db->from('rnd_competitor');
        $this->db->where('id',$id);

        $query = $this->db->get();
        return $query->row_array();
    }

    public function check_existing_company_name($company_name,$id)
    {
        $this->db->select('rnd_competitor.*');
        $this->db->from('rnd_competitor');
        $this->db->where('company_name',$company_name);
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

    public function check_existing_company_code($company_code,$id)
    {
        $this->db->select('rnd_competitor.*');
        $this->db->from('rnd_competitor');
        $this->db->where('company_code',$company_code);
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