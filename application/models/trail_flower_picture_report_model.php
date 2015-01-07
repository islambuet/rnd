<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Trail_flower_picture_report_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }

    public function get_pictureReportInfo($page=null)
    {
        $limit=$this->config->item('view_per_page');
        $start=$page*$limit;
        $this->db->from('rnd_flowering_picture_report fpr');
        $this->db->select('fpr.*');

        $this->db->select('si.season_name season_name');
        $this->db->select('cinfo.crop_name crop_name');
        $this->db->select('ti.product_type product_type');
        $this->db->select('vi.rnd_code rnd_code');

        $this->db->join('rnd_season_info si', 'si.id = fpr.season_id', 'left');
        $this->db->join('rnd_crop_info cinfo', 'cinfo.id = fpr.crop_id', 'left');
        $this->db->join('rnd_product_type_info ti', 'ti.id = fpr.type_id', 'left');
        $this->db->join('rnd_variety_info vi', 'vi.id = fpr.rnd_code_id', 'left');

        $this->db->limit($limit,$start);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_total_pictureReports()
    {
        $this->db->select('rnd_flowering_picture_report.*');
        $this->db->from('rnd_flowering_picture_report');

        return $this->db->count_all_results();
    }

    public function get_report_row($id)
    {
        $this->db->select('fpr.*');
        $this->db->from('rnd_flowering_picture_report fpr');
        $this->db->where('fpr.id',$id);

        $query = $this->db->get();
        return $query->row_array();
    }

}