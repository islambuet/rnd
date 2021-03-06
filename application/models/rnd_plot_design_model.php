<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Rnd_plot_design_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function get_crops($year,$season_id)
    {
        $this->db->from('rnd_variety_season rvs');
        $this->db->select('count(rvs.id) total_variety');
        $this->db->select('rc.crop_name crop_name, rc.id crop_id');
        $this->db->join('rnd_variety rv', 'rv.id = rvs.variety_id', 'inner');
        $this->db->join('rnd_crop rc', 'rc.id = rv.crop_id', 'inner');

        $this->db->where('rvs.year',$year);
        $this->db->where('rvs.season_id',$season_id);
        $this->db->where('rvs.season_status',1);
        //$this->db->where('rvs.sample_delivery_status',1);
        $this->db->group_by('rc.id');
        $this->db->order_by('rc.ordering ASC');
        $result = $this->db->get()->result_array();
        return $result;
    }
    public function get_crops_variety($year,$season_id)
    {
        $this->db->from('rnd_variety_season rvs');
        $this->db->select('rv.*');
        $this->db->select('rvs.id variety_season_id');
        $this->db->select('rc.crop_name crop_name, rc.crop_code crop_code');
        $this->db->select('ct.type_code type_code, ct.type_name type_name');
        $this->db->select('rp.principal_code,rp.principal_name');
        $this->db->join('rnd_variety rv', 'rv.id = rvs.variety_id', 'inner');
        $this->db->join('rnd_crop rc', 'rc.id = rv.crop_id', 'inner');
        $this->db->join('rnd_crop_type ct', 'ct.id = rv.crop_type_id', 'inner');
        $this->db->join('rnd_principal rp', 'rp.id = rv.principal_id', 'left');

        $this->db->where('rvs.year',$year);
        $this->db->where('rvs.season_id',$season_id);
        $this->db->where('rvs.season_status',1);
        //$this->db->where('rvs.sample_delivery_status',1);
        $this->db->order_by('rv.variety_index ASC');
        $results = $this->db->get()->result_array();
        $crops=array();
        foreach($results as $result)
        {
            $crops[$result['crop_id']]['crop_height']=$result['crop_height'];
            $crops[$result['crop_id']]['crop_width']=$result['crop_width'];
            $crops[$result['crop_id']]['varieties'][]=array('id'=>$result['id'],'rnd_code'=>System_helper::get_rnd_code($result,1));
            $crops[$result['crop_id']]['varieties_selected'][]=$result['id'];
        }

        return $crops;
    }
    public function get_total_plot_design()
    {
        $this->db->select('rnd_plot_design.*');
        $this->db->from('rnd_plot_design');
        $this->db->where('status',$this->config->item('status_active'));
        return $this->db->count_all_results();
    }
    public function get_plots($page=0)
    {
        $limit=$this->config->item('view_per_page');
        $start=$page*$limit;
        $this->db->from('rnd_plot_design rpd');
        $this->db->select('rpd.*');
        $this->db->select('rs.season_name');
        $this->db->select('rspi.plot_name');
        $this->db->join('rnd_season rs','rs.id = rpd.season_id','INNER');
        $this->db->join('rnd_setup_plot_info rspi','rspi.id = rpd.plot_id','INNER');

        $this->db->where('rpd.status != ',$this->config->item('status_delete'));
        $this->db->limit($limit,$start);
        $this->db->order_by("rpd.id","DESC");
        $results = $this->db->get()->result_array();

        return $results;
    }
}