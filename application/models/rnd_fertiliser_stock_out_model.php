<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Rnd_fertiliser_stock_out_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }

    public function get_stock_out_info($page=0)
    {
        $limit=$this->config->item('view_per_page');
        $start=$page*$limit;
        $this->db->select
        ('
        rnd_fertilizer_stock_out.id,
        rnd_variety_info.rnd_code,
        rnd_fertilizer_info.fertilizer_name,
        rnd_fertilizer_stock_out.fertilizer_quantity,
        rnd_fertilizer_stock_out.creation_date
        ');
        $this->db->from('rnd_fertilizer_stock_out');
        $this->db->join('rnd_fertilizer_info', 'rnd_fertilizer_info.id = rnd_fertilizer_stock_out.fertilizer_id', 'left');
        $this->db->join('rnd_variety_info', 'rnd_variety_info.id = rnd_fertilizer_stock_out.rnd_code_id', 'left');
        $this->db->where('rnd_fertilizer_stock_out.status',$this->config->item('active'));
        $this->db->limit($limit,$start);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_total_fertiliser_stock_out()
    {
        $this->db->select('rnd_fertilizer_stock_out.id');
        $this->db->from('rnd_fertilizer_stock_out');
        $this->db->where('status',$this->config->item('active'));

        return $this->db->count_all_results();
    }

    public function get_feriliser_row($id)
    {
        $this->db->select('rfs.*');
        $this->db->from('rnd_fertilizer_stock_out rfs');
        $this->db->select('rfi.fertilizer_name fertilizer_name');

        $this->db->join('rnd_fertilizer_info rfi', 'rfi.id = rfs.fertilizer_id', 'left');

        $this->db->where('rfs.id',$id);

        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_ferilisers()
    {
        $this->db->select('rnd_fertilizer_info.*');
        $this->db->from('rnd_fertilizer_info');
        $this->db->where('status',$this->config->item('active'));

        $query = $this->db->get();
        return $query->result_array();
    }

    public function check_existing_stock($fertilizer, $quantity, $rowid)
    {
        if(!empty($rowid) || $rowid!=0)
        {
            $this->db->where("fso.id !=", $rowid);
        }
        $this->db->from("rnd_fertilizer_stock_out fso");
        $this->db->select("sum(fso.fertilizer_quantity) total_stock_out");
        $this->db->where("fso.fertilizer_id",$fertilizer);
        $this->db->group_by("fso.fertilizer_id");
        $this->db->where('fso.status',$this->config->item('active'));
        $stock_out_result=$this->db->get()->row_array();

        if(!$stock_out_result)
        {

            $stock_out_result['total_stock_out'] =0  ;
        }
            $this->db->from("rnd_fertilizer_stock_in fsi");
            $this->db->select("sum(fsi.fertilizer_quantity) total_stock_in");
            $this->db->where("fsi.fertilizer_id",$fertilizer);
            $this->db->where('fsi.status',$this->config->item('active'));
            $this->db->group_by("fsi.fertilizer_id");
            $result_stock_in=$this->db->get()->row_array();

        if(!$result_stock_in)
        {

            $result_stock_in['total_stock_in'] =0  ;
        }

        $current_stock = $result_stock_in['total_stock_in']-$stock_out_result['total_stock_out'];

        if($current_stock>=$quantity)
        {
           return true;
        }
        else
        {
            return false;
        }
    }

    public function check_existing_fertilizer($fertilizer)
    {
        $this->db->from("rnd_fertilizer_stock_in fsi");
        $this->db->where("fsi.fertilizer_id",$fertilizer);
        $this->db->where('fsi.status',$this->config->item('active'));

        $result_fertilizer_stock_in = $this->db->get()->result_array();
//echo $this->db->last_query();exit;
        if($result_fertilizer_stock_in)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

}