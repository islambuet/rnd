<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rnd_feriliser_requirement_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }

    public function get_record_list($page=null)
    {
        $limit=$this->config->item('view_per_page');
        $start=$page*$limit;
        $this->db->from('rnd_fertilizer_requirement_info');
        $this->db->select
        ('
            rnd_fertilizer_requirement_info.id,
            rnd_fertilizer_info.fertilizer_name,
            rnd_seed_bed_info.seed_bed,
            rnd_fertilizer_requirement_info.fertilizer_quantity,
            rnd_fertilizer_requirement_info.fertilizer_price
        ');

        $this->db->where('rnd_fertilizer_requirement_info.status !=',$this->config->item('rnd_delete_status_code'));
        $this->db->join('rnd_fertilizer_info', 'rnd_fertilizer_info.id = rnd_fertilizer_requirement_info.fertilizer_id', 'LEFT');
        $this->db->join('rnd_seed_bed_info', 'rnd_seed_bed_info.id = rnd_fertilizer_requirement_info.seed_bed_id', 'LEFT');
        $this->db->limit($limit,$start);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_total_row()
    {
        $this->db->from('rnd_fertilizer_requirement_info');
        $this->db->where('status !=',$this->config->item('rnd_delete_status_code'));
        return $this->db->count_all_results();
    }

    public function get_row_info($id)
    {
//        $this->db->select('rnd_fertilizer_info.fertilizer_name');
        $this->db->from('rnd_fertilizer_requirement_info');
        $this->db->where('id', $id);

        $query = $this->db->get();
        return $query->row_array();
    }

}