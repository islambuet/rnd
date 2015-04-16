<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Setup_plot_model extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }

    public function get_plotInfo($page=null)
    {
        $limit=$this->config->item('view_per_page');
        $start=$page*$limit;
        $this->db->from('rnd_plot_info cpi');
        $this->db->select('cpi.*');

        $this->db->where('status !=',$this->config->item('rnd_delete_status_code'));
        $this->db->limit($limit,$start);
        $this->db->order_by('cpi.id','DESC');

        $result = $this->db->get()->result_array();
        return $result;
    }

    public function get_total_plots()
    {
        $this->db->select('rnd_plot_info.*');
        $this->db->from('rnd_plot_info');

        $this->db->where('status !=',$this->config->item('rnd_delete_status_code'));
        return $this->db->count_all_results();
    }

    public function get_plot_row($id)
    {
        $this->db->select('rnd_plot_info.*');
        $this->db->from('rnd_plot_info');
        $this->db->where('id',$id);

        $result = $this->db->get()->row_array();
        return $result;
    }

    public function check_plot_existence($plot,$id)
    {
        $this->db->select('rnd_plot_info.*');
        $this->db->from('rnd_plot_info');
        $this->db->where('plot_name',$plot);
        $this->db->where('id !=',$id);
        $result = $this->db->get()->row_array();
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