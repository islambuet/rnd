<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Delivery_and_sowing_setup_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }

    public function get_setups($page=0)
    {
        $limit=$this->config->item('view_per_page');
        $start=$page*$limit;
        $this->db->from('delivery_and_sowing_setup dss');
        $this->db->select('dss.*');
        $this->db->select('rs.season_name season_name');
        $this->db->select('rc.crop_name crop_name');

        $this->db->join('rnd_season rs', 'rs.id = dss.season_id', 'INNER');
        $this->db->join('rnd_crop rc', 'rc.id = dss.crop_id', 'INNER');

        $this->db->where('dss.status != ',$this->config->item('status_delete'));
        $this->db->limit($limit,$start);
        $this->db->order_by("dss.id","DESC");
        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_total_setup()
    {
        $this->db->select('dss.*');
        $this->db->from('delivery_and_sowing_setup dss');

        $this->db->select('rs.season_name season_name');
        $this->db->select('rc.crop_name crop_name');

        $this->db->join('rnd_season rs', 'rs.id = dss.season_id', 'INNER');
        $this->db->join('rnd_crop rc', 'rc.id = dss.crop_id', 'INNER');

        $this->db->where('dss.status != ',$this->config->item('status_delete'));
        return $this->db->count_all_results();
    }

    public function get_setup_row($id)
    {
        $this->db->select('delivery_and_sowing_setup.*');
        $this->db->from('delivery_and_sowing_setup');
        $this->db->where('id',$id);

        $query = $this->db->get();
        return $query->row_array();
    }

    public function check_setup_exists($year, $season, $crop, $id)
    {
        $this->db->from("delivery_and_sowing_setup");
        $this->db->where("id !=",$id);
        $this->db->where("year",$year);
        $this->db->where("crop_id",$crop);
        $this->db->where("season_id",$season);

        if($this->db->count_all_results()>0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }


}