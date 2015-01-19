<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Rnd_pesticide_stock_out_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }

    public function get_stock_out_info($page=null)
    {
        $limit=$this->config->item('view_per_page');
        $start=$page*$limit;
        $this->db->from('rnd_pesticide_fungicide_stock_out pfs');
        $this->db->select('pfs.*');

        $this->db->select('pfi.pesticide_name pesticide_name');
        $this->db->select('vi.rnd_code rnd_code');

        $this->db->join('rnd_pesticide_fungicide_info pfi', 'pfi.id = pfs.pesticide_id', 'left');
        $this->db->join('rnd_variety_info vi', 'vi.id = pfs.rnd_code_id', 'left');

        $this->db->where('pfs.status',$this->config->item('active'));
        $this->db->limit($limit,$start);



        $query = $this->db->get();
        //echo $this->db->last_query();exit;

        return $query->result_array();
    }

    public function get_total_pesticide_stock_out()
    {
        $this->db->select('rnd_pesticide_fungicide_stock_out.*');
        $this->db->from('rnd_pesticide_fungicide_stock_out');
        $this->db->where('status',$this->config->item('active'));

        return $this->db->count_all_results();
    }

    public function get_pesticide_row($id)
    {
        $this->db->select('pfs.*');
        $this->db->from('rnd_pesticide_fungicide_stock_out pfs');
        $this->db->select('pfi.pesticide_name pesticide_name');

        $this->db->join('rnd_pesticide_fungicide_info pfi', 'pfi.id = pfs.pesticide_id', 'left');

        $this->db->where('pfs.id',$id);

        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_pesticides()
    {
        $this->db->select('rnd_pesticide_fungicide_info.*');
        $this->db->from('rnd_pesticide_fungicide_info');
        $this->db->where('status',$this->config->item('active'));

        $query = $this->db->get();
        return $query->result_array();
    }

    public function check_existing_stock($pesticide, $quantity, $rowid)
    {
        if(!empty($rowid) || $rowid!=0)
        {
            $this->db->where("pso.id !=", $rowid);
        }

        $this->db->from("rnd_pesticide_fungicide_stock_out pso");
        $this->db->select("sum(pso.pesticide_quantity) total_stock_out");
        $this->db->where("pso.pesticide_id",$pesticide);
        $this->db->group_by("pso.pesticide_id");
        $this->db->where('pso.status',$this->config->item('active'));
        $stock_out_result=$this->db->get()->row_array();
//        echo $this->db->last_query();
        if(!$stock_out_result)
        {
            $stock_out_result['total_stock_out'] =0  ;
        }

        $this->db->from("rnd_pesticide_fungicide_stock_in psi");
        $this->db->select("sum(psi.pesticide_quantity) total_stock_in");
        $this->db->where("psi.pesticide_id",$pesticide);
        $this->db->where('psi.status',$this->config->item('active'));
        $this->db->group_by("psi.pesticide_id");
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

    public function check_existing_pesticide($pesticide)
    {
        $this->db->from("rnd_pesticide_fungicide_stock_in psi");
        $this->db->where("psi.pesticide_id",$pesticide);
        $this->db->where('psi.status',$this->config->item('active'));

        $result_pesticide_stock_in = $this->db->get()->result_array();
//echo $this->db->last_query();exit;
        if($result_pesticide_stock_in)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

}