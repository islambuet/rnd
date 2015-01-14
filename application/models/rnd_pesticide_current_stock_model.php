<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Rnd_pesticide_current_stock_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }


    public function get_pesticides($id=0)
    {
        $this->db->select('rnd_pesticide_fungicide_info.*');
        $this->db->from('rnd_pesticide_fungicide_info');
        $this->db->where('status',$this->config->item('active'));
        if($id>0)
        {
            $this->db->where("id",$id);
        }
        $result = $this->db->get()->result_array();
        return $result;
    }
    public function get_pesticide_stock_in($id=0)
    {
        $this->db->from("rnd_pesticide_fungicide_stock_in psi");
        $this->db->select("psi.pesticide_id id,sum(psi.pesticide_quantity) total");
        if($id>0)
        {
            $this->db->where("psi.pesticide_id",$id);

        }
        $this->db->where('psi.status',$this->config->item('active'));
        $this->db->group_by("psi.pesticide_id");
        $result=$this->db->get()->result_array();
        return $result;
    }
    public function get_pesticide_stock_out($id=0)
    {
        $this->db->from("rnd_pesticide_fungicide_stock_out pso");
        $this->db->select("pso.pesticide_id id,sum(pso.pesticide_quantity) total");
        if($id>0)
        {
            $this->db->where("pso.pesticide_id",$id);

        }

        $this->db->group_by("pso.pesticide_id");
        $this->db->where('pso.status',$this->config->item('active'));
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