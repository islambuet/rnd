<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Report_fertilizer_current_stock_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    public function get_fertilizer_current_stock($id)
    {
        $fertilizer_stock_info=array();
        $this->db->from('rnd_fertilizer_info');
        $this->db->select('id,fertilizer_name');
        $this->db->where('status',1);
        if($id>0)
        {
            $this->db->where('id',$id);
        }
        $results=$this->db->get()->result_array();
        if(sizeof($results)>0)
        {
            foreach($results as $result)
            {
                $fertilizer_stock_info[$result['id']]=$result;
                $fertilizer_stock_info[$result['id']]['stock_in']=0;
                $fertilizer_stock_info[$result['id']]['stock_out']=0;
                $fertilizer_stock_info[$result['id']]['inventory_stock_in']=0;
                $fertilizer_stock_info[$result['id']]['inventory_stock_out']=0;
            }
            $this->db->from('rnd_fertilizer_stock_in rfsin');
            $this->db->select('rfsin.fertilizer_id');
            $this->db->select_sum('rfsin.fertilizer_quantity');
            $this->db->group_by('rfsin.fertilizer_id');
            if($id>0)
            {
                $this->db->where('fertilizer_id',$id);
            }
            $results=$this->db->get()->result_array();
            foreach($results as $result)
            {
                $fertilizer_stock_info[$result['fertilizer_id']]['stock_in']=$fertilizer_stock_info[$result['fertilizer_id']]['stock_in']+$result['fertilizer_quantity'];
            }

            $this->db->from('rnd_fertilizer_stock_out rfsout');
            $this->db->select('rfsout.fertilizer_id');
            $this->db->select_sum('rfsout.fertilizer_quantity');
            $this->db->group_by('rfsout.fertilizer_id');
            if($id>0)
            {
                $this->db->where('fertilizer_id',$id);
            }
            $results=$this->db->get()->result_array();
            foreach($results as $result)
            {
                $fertilizer_stock_info[$result['fertilizer_id']]['stock_out']=$fertilizer_stock_info[$result['fertilizer_id']]['stock_out']+$result['fertilizer_quantity'];
            }

            $this->db->from('rnd_fertilizer_inventory rfsinv');
            $this->db->select('rfsinv.fertilizer_id');
            $this->db->select_sum('rfsinv.fertilizer_quantity');
            $this->db->group_by('rfsinv.fertilizer_id');
            $this->db->where('inventory_type',1);
            if($id>0)
            {
                $this->db->where('fertilizer_id',$id);
            }
            $results=$this->db->get()->result_array();
            foreach($results as $result)
            {
                $fertilizer_stock_info[$result['fertilizer_id']]['inventory_stock_in']=$fertilizer_stock_info[$result['fertilizer_id']]['inventory_stock_in']+$result['fertilizer_quantity'];
            }

            $this->db->from('rnd_fertilizer_inventory rfsinv');
            $this->db->select('rfsinv.fertilizer_id');
            $this->db->select_sum('rfsinv.fertilizer_quantity');
            $this->db->group_by('rfsinv.fertilizer_id');
            $this->db->where('inventory_type',2);
            if($id>0)
            {
                $this->db->where('fertilizer_id',$id);
            }
            $results=$this->db->get()->result_array();
            foreach($results as $result)
            {
                $fertilizer_stock_info[$result['fertilizer_id']]['inventory_stock_out']=$fertilizer_stock_info[$result['fertilizer_id']]['inventory_stock_out']+$result['fertilizer_quantity'];
            }


        }

        return $fertilizer_stock_info;

    }
}