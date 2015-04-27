<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Report_pesticide_history_model extends CI_Model
{

    public function __construct() {
        parent::__construct();
    }

    public function stocks_info($report_id,$date_from,$date_to,$pesticide_id)
    {
        $transaction_config=$this->config->item('stock_history_report_type');
        $stocks=array();
        if(($report_id=='' )||$report_id==1)
        {
            $this->db->from('rnd_pesticide_fungicide_in fsi');
            $this->db->select('fsi.*');
            $this->db->select('rfi.pesticide_name pesticide_name,rfi.unit');
            $this->db->join('rnd_pesticide_fungicide_info rfi', 'rfi.id = fsi.pesticide_id', 'INNER');
            $this->db->where('fsi.status',$this->config->item('status_active'));
            $this->db->where('fsi.stock_in_date >=',$date_from);
            $this->db->where('fsi.stock_in_date <',$date_to);
            if($pesticide_id>0)
            {
                $this->db->where('fsi.pesticide_id',$pesticide_id);
            }
            $this->db->order_by('fsi.id DESC');
            $results = $this->db->get()->result_array();
            foreach($results as $result)
            {
                $data=array();
                $data['pesticide_name']=$result['pesticide_name'];
                $data['unit']=$result['unit'];
                $data['transaction_type']=$transaction_config[1];
                $data['quantity']=$result['pesticide_quantity'];
                $data['date']=$result['stock_in_date'];


                $stocks[]=$data;
            }

        }
        if(($report_id=='' )||$report_id==2)
        {
            $this->db->from('rnd_pesticide_fungicide_out fso');
            $this->db->select('fso.*');
            $this->db->select('rfi.pesticide_name pesticide_name,rfi.unit');
            $this->db->join('rnd_pesticide_fungicide_info rfi', 'rfi.id = fso.pesticide_id', 'INNER');
            $this->db->where('fso.status',$this->config->item('status_active'));

            $this->db->where('fso.stock_out_date >=',$date_from);
            $this->db->where('fso.stock_out_date <',$date_to);
            if($pesticide_id>0)
            {
                $this->db->where('fso.pesticide_id',$pesticide_id);
            }

            $results=$this->db->get()->result_array();
            foreach($results as $result)
            {
                $data=array();
                $data['pesticide_name']=$result['pesticide_name'];
                $data['unit']=$result['unit'];
                $data['transaction_type']=$transaction_config[2];
                $data['quantity']=$result['pesticide_quantity'];
                $data['date']=$result['stock_out_date'];
                $stocks[]=$data;
            }

        }

        if(($report_id=='' )||$report_id==3)
        {

            $this->db->from('rnd_pesticide_inventory rfinv');
            $this->db->select('rfinv.*');
            $this->db->select('rfi.pesticide_name,rfi.unit');

            $this->db->join('rnd_pesticide_fungicide_info rfi', 'rfi.id = rfinv.pesticide_id', 'INNER');
            $this->db->where('rfinv.status',$this->config->item('status_active'));

            $this->db->where('rfinv.inventory_date >=',$date_from);
            $this->db->where('rfinv.inventory_date <',$date_to);
            $this->db->where('rfinv.inventory_type',1);
            if($pesticide_id>0)
            {
                $this->db->where('rfinv.pesticide_id',$pesticide_id);
            }

            $results=$this->db->get()->result_array();
            foreach($results as $result)
            {
                $data=array();
                $data['pesticide_name']=$result['pesticide_name'];
                $data['unit']=$result['unit'];
                $data['transaction_type']=$transaction_config[3];
                $data['quantity']=$result['pesticide_quantity'];
                $data['date']=$result['inventory_date'];
                $stocks[]=$data;
            }

        }
        if(($report_id=='' )||$report_id==4)
        {

            $this->db->from('rnd_pesticide_inventory rfinv');
            $this->db->select('rfinv.*');
            $this->db->select('rfi.pesticide_name,rfi.unit');

            $this->db->join('rnd_pesticide_fungicide_info rfi', 'rfi.id = rfinv.pesticide_id', 'INNER');
            $this->db->where('rfinv.status',$this->config->item('status_active'));

            $this->db->where('rfinv.inventory_date >=',$date_from);
            $this->db->where('rfinv.inventory_date <',$date_to);
            $this->db->where('rfinv.inventory_type',2);
            if($pesticide_id>0)
            {
                $this->db->where('rfinv.pesticide_id',$pesticide_id);
            }

            $results=$this->db->get()->result_array();
            foreach($results as $result)
            {
                $data=array();
                $data['pesticide_name']=$result['pesticide_name'];
                $data['unit']=$result['unit'];
                $data['transaction_type']=$transaction_config[4];
                $data['quantity']=$result['pesticide_quantity'];
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