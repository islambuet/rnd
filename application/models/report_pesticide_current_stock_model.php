<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Report_pesticide_current_stock_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }


    public function get_pesticide_current_stock($id)
    {
        $stock_info=array();
        $this->db->from('rnd_pesticide_fungicide_info');
        $this->db->select('id,pesticide_name,unit');
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
                $stock_info[$result['id']]=$result;
                $stock_info[$result['id']]['stock_in']=0;
                $stock_info[$result['id']]['stock_out']=0;
                $stock_info[$result['id']]['inventory_stock_in']=0;
                $stock_info[$result['id']]['inventory_stock_out']=0;
            }
            $this->db->from('rnd_pesticide_fungicide_in rpfin');
            $this->db->select('rpfin.pesticide_id');
            $this->db->select_sum('rpfin.pesticide_quantity');
            $this->db->group_by('rpfin.pesticide_id');
            if($id>0)
            {
                $this->db->where('pesticide_id',$id);
            }
            $results=$this->db->get()->result_array();
            foreach($results as $result)
            {
                $stock_info[$result['pesticide_id']]['stock_in']=$stock_info[$result['pesticide_id']]['stock_in']+$result['pesticide_quantity'];
            }

            $this->db->from('rnd_pesticide_fungicide_out rpfout');
            $this->db->select('rpfout.pesticide_id');
            $this->db->select_sum('rpfout.pesticide_quantity');
            $this->db->group_by('rpfout.pesticide_id');
            if($id>0)
            {
                $this->db->where('pesticide_id',$id);
            }
            $results=$this->db->get()->result_array();
            foreach($results as $result)
            {
                $stock_info[$result['pesticide_id']]['stock_out']=$stock_info[$result['pesticide_id']]['stock_out']+$result['pesticide_quantity'];
            }

            $this->db->from('rnd_pesticide_inventory rpsinv');
            $this->db->select('rpsinv.pesticide_id');
            $this->db->select_sum('rpsinv.pesticide_quantity');
            $this->db->group_by('rpsinv.pesticide_id');
            $this->db->where('inventory_type',1);
            if($id>0)
            {
                $this->db->where('pesticide_id',$id);
            }
            $results=$this->db->get()->result_array();
            foreach($results as $result)
            {
                $stock_info[$result['pesticide_id']]['inventory_stock_in']=$stock_info[$result['pesticide_id']]['inventory_stock_in']+$result['pesticide_quantity'];
            }

            $this->db->from('rnd_pesticide_inventory rpsinv');
            $this->db->select('rpsinv.pesticide_id');
            $this->db->select_sum('rpsinv.pesticide_quantity');
            $this->db->group_by('rpsinv.pesticide_id');
            $this->db->where('inventory_type',2);
            if($id>0)
            {
                $this->db->where('pesticide_id',$id);
            }
            $results=$this->db->get()->result_array();
            foreach($results as $result)
            {
                $stock_info[$result['pesticide_id']]['inventory_stock_out']=$stock_info[$result['pesticide_id']]['inventory_stock_out']+$result['pesticide_quantity'];
            }


        }

        return $stock_info;

    }

}