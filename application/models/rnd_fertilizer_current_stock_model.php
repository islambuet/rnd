<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Rnd_fertilizer_current_stock_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }


    public function get_fertilizers($id=0)
    {
        $this->db->select('rnd_fertilizer_info.*');
        $this->db->from('rnd_fertilizer_info');
        $this->db->where('status',$this->config->item('active'));
        if($id>0)
        {
            $this->db->where("id",$id);
        }
        $result = $this->db->get()->result_array();
        return $result;
    }
    public function get_fertilizer_stock_in($id=0)
    {
        $this->db->from("rnd_fertilizer_stock_in fsi");
        $this->db->select("fsi.fertilizer_id id,sum(fsi.fertilizer_quantity) total");
        if($id>0)
        {
            $this->db->where("fsi.fertilizer_id",$id);

        }
        $this->db->where('fsi.status',$this->config->item('active'));
        $this->db->group_by("fsi.fertilizer_id");
        $result=$this->db->get()->result_array();
        return $result;
    }
    public function get_fertilizer_stock_out($id=0)
    {
        $this->db->from("rnd_fertilizer_stock_out fso");
        $this->db->select("fso.fertilizer_id id,sum(fso.fertilizer_quantity) total");
        if($id>0)
        {
            $this->db->where("fso.fertilizer_id",$id);

        }

        $this->db->group_by("fso.fertilizer_id");
        $this->db->where('fso.status',$this->config->item('active'));
        $result=$this->db->get()->result_array();
        return $result;
    }
    /*public function get_fertilizer_stock_info($id=0)
    {
        $this->db->from("rnd_fertilizer_info rfi");
        $this->db->select("rfi.id,rfi.fertilizer_name,sum(rfsi.fertilizer_quantity) total_in,,sum(rfso.fertilizer_quantity) total_out");
        if($id>0)
        {
            $this->db->where("rfi.id",$id);

        }
        $this->db->join("rnd_fertilizer_stock_in rfsi","rfi.id = rfsi.fertilizer_id","left");
        $this->db->join("rnd_fertilizer_stock_out rfso","rfi.id = rfso.fertilizer_id","left");

        $this->db->group_by("rfi.id");
        $result=$this->db->get()->result_array();
        echo $this->db->last_query();
        return $result;


    }*/

}