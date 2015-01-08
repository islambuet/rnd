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
        $this->db->from('rnd_fruit_report_entry rfr');
        $this->db->select('rfr.*');

        $this->db->select('rvi.rnd_code rnd_code_variety');
        $this->db->join('rnd_variety_info rvi', 'rvi.id = rfr.rnd_code_id', 'left');

        $this->db->select('rsi.season_name season_name');
        $this->db->join('rnd_season_info rsi', 'rsi.id = rfr.season_id', 'left');

        $this->db->select('rci.crop_name crop_name');
        $this->db->join('rnd_crop_info rci', 'rci.id = rfr.crop_id', 'left');

        $this->db->select('rpi.product_type product_type');
        $this->db->join('rnd_product_type_info rpi', 'rpi.id = rfr.product_type_id', 'left');

        $this->db->limit($limit,$start);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_total_pictureReports()
    {
        $this->db->select('rnd_fruit_report_entry.*');
        $this->db->from('rnd_fruit_report_entry');

        return $this->db->count_all_results();
    }

    public function get_report_row($id)
    {
        $this->db->select('rfr.*');
        $this->db->from('rnd_fruit_report_entry rfr');

        //$this->db->select('fri.image image,fri.fruit_report_entry_type fruit_report_entry_type ');
        //$this->db->join('rnd_fruit_report_entry_image fri', 'rfr.id = fri.fruit_report_entry_id', 'left');

        $this->db->where('rfr.id',$id);

        $query = $this->db->get();
        return $query->row_array();
    }
    public function get_report_row_images($id,$catid)
    {
        $this->db->select('fri.*');
        $this->db->from('rnd_fruit_report_entry_image fri');

        //$this->db->select('fri.image image,fri.fruit_report_entry_type fruit_report_entry_type ');
        //$this->db->join('rnd_fruit_report_entry_image fri', 'rfr.id = fri.fruit_report_entry_id', 'left');

        $this->db->where('fri.fruit_report_entry_id',$id);
        $this->db->where('fri.fruit_report_entry_type',$catid);

        $query = $this->db->get();
        return $query->result_array();
    }


    public function get_report_image_detail($id)
    {
        $this->db->select('rfdpri.*');
        $this->db->from('rnd_fruit_report_entry rfdpri');
        $this->db->where('rfdpri.picture_report_id',$id);

        $query = $this->db->get();
        return $query->result_array();
    }

}