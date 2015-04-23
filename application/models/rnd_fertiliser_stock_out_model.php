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
        $this->db->from('rnd_fertilizer_stock_out fso');
        $this->db->select('fso.*');
        $this->db->select('rfi.fertilizer_name fertilizer_name');
        $this->db->select('rc.crop_name');
        $this->db->select('rs.season_name');
        $this->db->join('rnd_fertilizer_info rfi', 'rfi.id = fso.fertilizer_id', 'INNER');
        $this->db->join('rnd_crop rc','rc.id = fso.crop_id','INNER');
        $this->db->join('rnd_season rs','rs.id = fso.season_id','INNER');
        $this->db->where('fso.status',$this->config->item('status_active'));
        $this->db->limit($limit,$start);
        $results=$this->db->get()->result_array();
        $ids=array();
        $stock_out=array();
        foreach($results as $result)
        {
            $ids[]=$result['id'];
            $stock_out[$result['id']]=$result;
            $stock_out[$result['id']]['rnd_code']=array();
        }
        if(sizeof($stock_out)>0)
        {



            $this->db->from('rnd_fertilizer_stock_out_varieties rfsov');
            $this->db->where_in('rfsov.stock_out_id',$ids);

            $this->db->join('rnd_variety rv','rfsov.variety_id = rv.id','INNER');
            $this->db->select('rfsov.stock_out_id');
            $this->db->select('rv.*');

            $this->db->select('rc.crop_name,rc.crop_code');
            $this->db->select('rct.type_name,rct.type_code');
            $this->db->select('rp.principal_code');

            $this->db->join('rnd_crop rc','rc.id =rv.crop_id','INNER');
            $this->db->join('rnd_crop_type rct','rct.id =rv.crop_type_id','INNER');
            $this->db->join('rnd_principal rp','rp.id =rv.principal_id','LEFT');
            $results = $this->db->get()->result_array();
            foreach($results as $result)
            {
                $stock_out[$result['stock_out_id']]['rnd_code'][]=System_helper::get_rnd_code($result);
            }
        }

        return $stock_out;
    }

    public function get_total_fertiliser_stock_out()
    {
        $this->db->select('rnd_fertilizer_stock_out.*');
        $this->db->from('rnd_fertilizer_stock_out');
        $this->db->where('status',$this->config->item('status_active'));

        return $this->db->count_all_results();
    }
    public function get_varieties_info($year,$season_id,$crop_id)
    {
        $this->db->from('rnd_variety rv');
        $this->db->select('rv.*');

        $this->db->select('rc.crop_name crop_name, rc.crop_code crop_code');
        $this->db->select('ct.type_name type_name ,ct.type_code type_code');
        $this->db->select('rp.principal_name,rp.principal_code');

        $this->db->join('rnd_variety_season rvs','rvs.variety_id = rv.id','INNER');
        $this->db->join('rnd_crop rc', 'rc.id = rv.crop_id', 'inner');
        $this->db->join('rnd_crop_type ct', 'ct.id = rv.crop_type_id', 'inner');
        $this->db->join('rnd_principal rp', 'rp.id = rv.principal_id', 'left');

        $this->db->where('rv.year',$year);
        $this->db->where('rv.crop_id',$crop_id);
        $this->db->where('rvs.season_id',$season_id);
        $this->db->where('rvs.season_status',1);
        $this->db->where('rvs.sample_delivery_status',1);
        $this->db->order_by('rv.id');

        $result = $this->db->get()->result_array();
        return $result;
    }



}