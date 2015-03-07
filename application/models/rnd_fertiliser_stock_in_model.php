<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Rnd_fertiliser_stock_in_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }

    public function get_stock_in_info($page=0)
    {
        $limit=$this->config->item('view_per_page');
        $start=$page*$limit;
        $this->db->from('rnd_fertilizer_stock_in fsi');
        $this->db->select('fsi.*');
        $this->db->select('rfi.fertilizer_name fertilizer_name');

        $this->db->join('rnd_fertilizer_info rfi', 'rfi.id = fsi.fertilizer_id', 'left');

        $this->db->where('fsi.status',$this->config->item('status_active'));
        $this->db->limit($limit,$start);

        $result = $this->db->get()->result_array();
        return $result;
    }

    public function get_total_fertiliser_stock_in()
    {
        $this->db->select('rnd_fertilizer_stock_in.*');
        $this->db->from('rnd_fertilizer_stock_in');
        $this->db->where('status',$this->config->item('status_active'));

        return $this->db->count_all_results();
    }
    public function check_changeable($stock_in_id,$new_quantity,$new_fertilizer_id)
    {
        $stack_info=Query_helper::get_info('rnd_fertilizer_stock_in',array('id','fertilizer_id','fertilizer_quantity'),array('id ='.$stock_in_id),1);
        $sti_result=Query_helper::get_info('rnd_fertilizer_stock_in',array('SUM(fertilizer_quantity) sti_total'),array('fertilizer_id ='.$stack_info['fertilizer_id'],'id !='.$stock_in_id),1);

        $sti_total=$sti_result['sti_total']?$sti_result['sti_total']:0;
        if($new_fertilizer_id==$stack_info['fertilizer_id'])
        {
            $sti_total+=$new_quantity;
        }
        $sto_result=Query_helper::get_info('rnd_fertilizer_stock_out',array('SUM(fertilizer_quantity) sto_total'),array('fertilizer_id ='.$stack_info['fertilizer_id']),1);
        $sto_total=$sto_result['sto_total']?$sti_result['sto_total']:0;
        if($sti_total<$sto_total)
        {
            return false;
        }
        else
        {
            return true;
        }

    }

    /*public function get_feriliser_row($id)
    {
        $this->db->select('fsi.*');
        $this->db->from('rnd_fertilizer_stock_in fsi');
        $this->db->select('rfi.fertilizer_name fertilizer_name');

        $this->db->join('rnd_fertilizer_info rfi', 'rfi.id = fsi.fertilizer_id', 'left');

        $this->db->where('fsi.id',$id);

        $result = $this->db->get()->row_array();
        return $result;
    }

    public function get_ferilisers()
    {
        $this->db->select('rnd_fertilizer_info.*');
        $this->db->from('rnd_fertilizer_info');
        $this->db->where('status',$this->config->item('status_active'));
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function check_fertiliser_stock_out($fertiliser_id)
    {
        $this->db->from('rnd_fertilizer_stock_out');
        $this->db->where('fertilizer_id',$fertiliser_id);
        $this->db->where('status',$this->config->item('status_active'));
        $query = $this->db->get();
        $result=$query->num_rows();
        if($result>0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }*/

}