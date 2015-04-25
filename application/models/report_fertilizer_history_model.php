<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Report_fertilizer_history_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }

    public function stocks_info($report_id,$date_from,$date_to,$fertilizer_id)
    {
        $transaction_config=$this->config->item('stock_history_report_type');
        $stocks=array();
        if(($report_id=='' )||$report_id==1)
        {
            $this->db->from('rnd_fertilizer_stock_in fsi');
            $this->db->select('fsi.*');
            $this->db->select('rfi.fertilizer_name fertilizer_name');
            $this->db->join('rnd_fertilizer_info rfi', 'rfi.id = fsi.fertilizer_id', 'INNER');
            $this->db->where('fsi.status',$this->config->item('status_active'));
            $this->db->where('fsi.stock_in_date >=',$date_from);
            $this->db->where('fsi.stock_in_date <',$date_to);
            if($fertilizer_id>0)
            {
                $this->db->where('fsi.fertilizer_id',$fertilizer_id);
            }
            $this->db->order_by('fsi.id DESC');
            $results = $this->db->get()->result_array();
            foreach($results as $result)
            {
                $data=array();
                $data['fertilizer_name']=$result['fertilizer_name'];
                $data['transaction_type']=$transaction_config[1];
                $data['quantity']=$result['fertilizer_quantity'];
                $data['date']=$result['stock_in_date'];


                $stocks[]=$data;
            }

        }
        if(($report_id=='' )||$report_id==2)
        {
            $this->db->from('rnd_fertilizer_stock_out fso');
            $this->db->select('fso.*');
            $this->db->select('rfi.fertilizer_name fertilizer_name');
            $this->db->join('rnd_fertilizer_info rfi', 'rfi.id = fso.fertilizer_id', 'INNER');
            $this->db->where('fso.status',$this->config->item('status_active'));

            $this->db->where('fso.stock_out_date >=',$date_from);
            $this->db->where('fso.stock_out_date <',$date_to);
            if($fertilizer_id>0)
            {
                $this->db->where('fso.fertilizer_id',$fertilizer_id);
            }

            $results=$this->db->get()->result_array();
            foreach($results as $result)
            {
                $data=array();
                $data['fertilizer_name']=$result['fertilizer_name'];
                $data['transaction_type']=$transaction_config[2];
                $data['quantity']=$result['fertilizer_quantity'];
                $data['date']=$result['stock_out_date'];
                $stocks[]=$data;
            }

        }

        if(($report_id=='' )||$report_id==3)
        {

            $this->db->from('rnd_fertilizer_inventory rfinv');
            $this->db->select('rfinv.*');
            $this->db->select('rfi.fertilizer_name');

            $this->db->join('rnd_fertilizer_info rfi', 'rfi.id = rfinv.fertilizer_id', 'INNER');
            $this->db->where('rfinv.status',$this->config->item('status_active'));

            $this->db->where('rfinv.inventory_date >=',$date_from);
            $this->db->where('rfinv.inventory_date <',$date_to);
            $this->db->where('rfinv.inventory_type',1);
            if($fertilizer_id>0)
            {
                $this->db->where('rfinv.fertilizer_id',$fertilizer_id);
            }

            $results=$this->db->get()->result_array();
            foreach($results as $result)
            {
                $data=array();
                $data['fertilizer_name']=$result['fertilizer_name'];
                $data['transaction_type']=$transaction_config[3];
                $data['quantity']=$result['fertilizer_quantity'];
                $data['date']=$result['inventory_date'];
                $stocks[]=$data;
            }

        }
        if(($report_id=='' )||$report_id==4)
        {

            $this->db->from('rnd_fertilizer_inventory rfinv');
            $this->db->select('rfinv.*');
            $this->db->select('rfi.fertilizer_name');

            $this->db->join('rnd_fertilizer_info rfi', 'rfi.id = rfinv.fertilizer_id', 'INNER');
            $this->db->where('rfinv.status',$this->config->item('status_active'));

            $this->db->where('rfinv.inventory_date >=',$date_from);
            $this->db->where('rfinv.inventory_date <',$date_to);
            $this->db->where('rfinv.inventory_type',2);
            if($fertilizer_id>0)
            {
                $this->db->where('rfinv.fertilizer_id',$fertilizer_id);
            }

            $results=$this->db->get()->result_array();
            foreach($results as $result)
            {
                $data=array();
                $data['fertilizer_name']=$result['fertilizer_name'];
                $data['transaction_type']=$transaction_config[4];
                $data['quantity']=$result['fertilizer_quantity'];
                $data['date']=$result['inventory_date'];
                $stocks[]=$data;
            }

        }
        //order stocks by time
        for($i=0;$i<(sizeof($stocks)-1);$i++)
        {
            for($j=$i+1;$j<sizeof($stocks);$j++)
            {
                if(($stocks[$i]['date']>$stocks[$j]['date']))
                {
                    $temp=$stocks[$i];
                    $stocks[$i]=$stocks[$j];
                    $stocks[$j]=$temp;
                }
            }
        }
        return $stocks;
    }
}