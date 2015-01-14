<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Rnd_labour_activity_report_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }


    public function get_activity_infos($season,$crop,$variety,$start_date,$end_date)
    {
        $this->db->select('lai.*');
        $this->db->from('rnd_labor_activity_info lai');

        $this->db->select('rsi.season_name season_name');
        $this->db->join('rnd_season_info rsi', 'rsi.id = lai.season_id', 'left');

        $this->db->select('rci.crop_name crop_name');
        $this->db->join('rnd_crop_info rci', 'rci.id = lai.crop_id', 'left');

        $this->db->select('rvi.variety_name variety_name');
        $this->db->join('rnd_variety_info rvi', 'rvi.id = lai.varity_type_id', 'left');


        $this->db->where('lai.status',$this->config->item('active'));


        if($season !='')
        {

            $this->db->where("lai.season_id",$season);
        }
        if($crop !='')
        {

            $this->db->where("lai.crop_id",$crop);
        }
        if($variety !='')
        {

            $this->db->where("lai.varity_type_id",$variety);
        }

        if($start_date !='')
        {

            if($end_date !='')
            {
                $this->db->where("lai.activity_date >=",$start_date);
                $this->db->where("lai.activity_date <=",$end_date);
            }
            else
            {
                $this->db->where("lai.activity_date",$start_date);

            }

        }
//        if($end_date !='' )
//        {
//
//            //$this->db->where("lai.activity_date >=",$start_date);
//            $this->db->where("lai.activity_date <=",$end_date);
//
//        }
        $result = $this->db->get()->result_array();
        //$this->db->last_query();exit;
        return $result;
    }
//    public function get_fertilizer_stock_in($id=0)
//    {
//        $this->db->from("rnd_fertilizer_stock_in fsi");
//        $this->db->select("fsi.fertilizer_id id,sum(fsi.fertilizer_quantity) total");
//        if($id>0)
//        {
//            $this->db->where("fsi.fertilizer_id",$id);
//
//        }
//        $this->db->where('fsi.status',$this->config->item('active'));
//        $this->db->group_by("fsi.fertilizer_id");
//        $result=$this->db->get()->result_array();
//        return $result;
//    }
//    public function get_fertilizer_stock_out($id=0)
//    {
//        $this->db->from("rnd_fertilizer_stock_out fso");
//        $this->db->select("fso.fertilizer_id id,sum(fso.fertilizer_quantity) total");
//        if($id>0)
//        {
//            $this->db->where("fso.fertilizer_id",$id);
//
//        }
//
//        $this->db->group_by("fso.fertilizer_id");
//        $this->db->where('fso.status',$this->config->item('active'));
//        $result=$this->db->get()->result_array();
//        return $result;
//    }
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