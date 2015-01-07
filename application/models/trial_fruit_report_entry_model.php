<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Trial_fruit_report_entry_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }

    public function get_pictureReportInfo($page=null)
    {
        $limit=$this->config->item('view_per_page');
        $start=$page*$limit;
        $this->db->from('rnd_fifteen_days_picture_report rpr');
        $this->db->select('rpr.*');
        $this->db->select('rvi.rnd_code rnd_code_variety');

        $this->db->join('rnd_variety_info rvi', 'rvi.id = rpr.rnd_code', 'left');
        $this->db->limit($limit,$start);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_total_pictureReports()
    {
        $this->db->select('rnd_fifteen_days_picture_report.*');
        $this->db->from('rnd_fifteen_days_picture_report');

        return $this->db->count_all_results();
    }

    public function get_report_row($id)
    {
        $this->db->select('rfdpr.*');
        $this->db->from('rnd_fifteen_days_picture_report rfdpr');
        $this->db->where('rfdpr.id',$id);

        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_report_image_detail($id)
    {
        $this->db->select('rfdpri.*');
        $this->db->from('rnd_fifteen_days_picture_report_images rfdpri');
        $this->db->where('rfdpri.picture_report_id',$id);

        $query = $this->db->get();
        return $query->result_array();
    }

}