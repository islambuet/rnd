<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
//echo "<pre>";
//print_r($varieties);
//echo "</pre>";
//echo "<pre>";
//print_r($delivery_and_sowing_info);
//echo "</pre>";
//echo "<pre>";
//print_r($options);
//echo "</pre>";
//echo "<pre>";
//print_r($harvest);
//echo "</pre>";
//echo "<pre>";
//print_r($harvest_compile);
//echo "</pre>";
//echo "<pre>";
//print_r($delivery_and_sowing_info);
//echo "</pre>";

$this->lang->load('rnd_harvest');
$table_heads=array();
$final_varieties=array();
foreach($varieties as $variety)
{
    $info=array();
    if(isset($harvest_compile[$variety['id']]['info']))
    {
        $info=json_decode($harvest_compile[$variety['id']]['info'],true);
    }

    $data=array();
    $data['replica_status']=$variety['replica_status'];
    $data['id']=$variety['id'];

    //for rnd code
    $table_heads['rnd_code']='rnd_code';
    $data['rnd_code']['normal']=$data['rnd_code']['replica']=System_helper::get_rnd_code($variety);
    if($options['initial_plants']==1)
    {
        $table_heads['initial_plants_during_trial_started']='initial_plants_during_trial_started';
        $data['initial_plants_during_trial_started']['normal']=$data['initial_plants_during_trial_started']['replica']=$variety['initial_plants'];

    }
    //global used
    $first_harvest_days=$last_harvest_days=$diff_last_first_days=$this->lang->line("NOT_SET");
    $total_harvest=0;
    $total_harvested_weight_normal=0;
    $total_harvested_weight_replica=0;
    if(isset($harvest[$variety['id']]))
    {
        $total_normal = 0;
        $total_replica = 0;
        foreach($harvest[$variety['id']] as $hcd)
        {
            $detail = json_decode($hcd,true);
            $value_normal = $detail['normal']['total_harvested_wt'];
            $value_replica = $detail['replica']['total_harvested_wt'];
            $total_normal += $value_normal;
            $total_replica += $value_replica;
        }

        $total_harvested_weight_normal=$total_normal;
        $total_harvested_weight_replica=$total_replica;
    }



    $table_heads['first_harvest_days']='first_harvest_days';
    $table_heads['last_harvest_days']='last_harvest_days';
    $table_heads['interval_first_and_last_harvest']='interval_first_and_last_harvest';
    $table_heads['total_no_of_harvest']='total_no_of_harvest';
    $data['first_harvest_days']['normal']=$data['first_harvest_days']['replica']=$this->lang->line('NOT_SET');
    $data['last_harvest_days']['normal']=$data['last_harvest_days']['replica']=$this->lang->line('NOT_SET');
    $data['interval_first_and_last_harvest']['normal']=$data['interval_first_and_last_harvest']['replica']=$this->lang->line('CANNOT_CALCULATE');
    $data['total_no_of_harvest']['normal']=$data['total_no_of_harvest']['replica']=$this->lang->line('NOT_SET');;
    if($options['total_harv_curds']==1)
    {
        $table_heads['total_harv_curds']='total_harv_curds';
        $data['total_harv_curds']['normal']=$data['total_harv_curds']['replica']=$this->lang->line("CANNOT_CALCULATE");
    }
    if($options['total_curd_wt']==1)
    {
        $table_heads['total_curd_wt']='total_curd_wt';
        $data['total_curd_wt']['normal']=$data['total_curd_wt']['replica']=$this->lang->line("CANNOT_CALCULATE");
    }
    if($options['total_market_curds']==1)
    {
        $table_heads['total_market_curds']='total_market_curds';
        $data['total_market_curds']['normal']=$data['total_market_curds']['replica']=$this->lang->line("CANNOT_CALCULATE");
    }
    if($options['total_market_curd_wt']==1)
    {
        $table_heads['total_market_curd_wt']='total_market_curd_wt';
        $data['total_market_curd_wt']['normal']=$data['total_market_curd_wt']['replica']=$this->lang->line("CANNOT_CALCULATE");
    }
    if($options['percentage_of_mrkt_curd']==1)
    {
        $table_heads['percentage_of_mrkt_curd']='percentage_of_mrkt_curd';
        $data['percentage_of_mrkt_curd']['normal']=$data['percentage_of_mrkt_curd']['replica']=$this->lang->line("CANNOT_CALCULATE");
    }
    if($options['percentage_of_mrkt_curd_wt']==1)
    {
        $table_heads['percentage_of_mrkt_curd_wt']='percentage_of_mrkt_curd_wt';
        $data['percentage_of_mrkt_curd_wt']['normal']=$data['percentage_of_mrkt_curd_wt']['replica']=$this->lang->line("CANNOT_CALCULATE");
    }
    if($options['avg_curd_wt']==1)
    {
        $table_heads['avg_curd_wt']='avg_curd_wt';
        $data['avg_curd_wt']['normal']=$data['avg_curd_wt']['replica']=$this->lang->line("CANNOT_CALCULATE");
    }
    if($options['total_harv_heads']==1)
    {
        $table_heads['total_harv_heads']='total_harv_heads';
        $data['total_harv_heads']['normal']=$data['total_harv_heads']['replica']=$this->lang->line("CANNOT_CALCULATE");
    }
    if($options['total_head_wt']==1)
    {
        $table_heads['total_head_wt']='total_head_wt';
        $data['total_head_wt']['normal']=$data['total_head_wt']['replica']=$this->lang->line("CANNOT_CALCULATE");
    }
    if($options['total_market_heads']==1)
    {
        $table_heads['total_market_heads']='total_market_heads';
        $data['total_market_heads']['normal']=$data['total_market_heads']['replica']=$this->lang->line("CANNOT_CALCULATE");
    }
    if($options['total_market_head_wt']==1)
    {
        $table_heads['total_market_head_wt']='total_market_head_wt';
        $data['total_market_head_wt']['normal']=$data['total_market_head_wt']['replica']=$this->lang->line("CANNOT_CALCULATE");
    }
    if($options['percentage_of_mrkt_head']==1)
    {
        $table_heads['percentage_of_mrkt_head']='percentage_of_mrkt_head';
        $data['percentage_of_mrkt_head']['normal']=$data['percentage_of_mrkt_head']['replica']=$this->lang->line("CANNOT_CALCULATE");
    }
    if($options['percentage_of_mrkt_head_wt']==1)
    {
        $table_heads['percentage_of_mrkt_head_wt']='percentage_of_mrkt_head_wt';
        $data['percentage_of_mrkt_head_wt']['normal']=$data['percentage_of_mrkt_head_wt']['replica']=$this->lang->line("CANNOT_CALCULATE");
    }
    if($options['avg_head_wt']==1)
    {
        $table_heads['avg_head_wt']='avg_head_wt';
        $data['avg_head_wt']['normal']=$data['avg_head_wt']['replica']=$this->lang->line("CANNOT_CALCULATE");
    }
    if($options['total_harv_fruits']==1)
    {
        $table_heads['total_harv_fruits']='total_harv_fruits';
        $data['total_harv_fruits']['normal']=$data['total_harv_fruits']['replica']=$this->lang->line("CANNOT_CALCULATE");
    }
    if($options['total_fruit_wt']==1)
    {
        $table_heads['total_fruit_wt']='total_fruit_wt';
        $data['total_fruit_wt']['normal']=$data['total_fruit_wt']['replica']=$this->lang->line("CANNOT_CALCULATE");
    }
    if($options['total_market_fruits']==1)
    {

        $table_heads['total_market_fruits']='total_market_fruits';
        $data['total_market_fruits']['normal']=$data['total_market_fruits']['replica']=$this->lang->line("CANNOT_CALCULATE");
    }
    if($options['total_market_fruit_wt']==1)
    {
        $table_heads['total_market_fruit_wt']='total_market_fruit_wt';
        $data['total_market_fruit_wt']['normal']=$data['total_market_fruit_wt']['replica']=$this->lang->line("CANNOT_CALCULATE");
    }
    if($options['percentage_of_mrkt_fruit']==1)
    {
        $table_heads['percentage_of_mrkt_fruit']='percentage_of_mrkt_fruit';
        $data['percentage_of_mrkt_fruit']['normal']=$data['percentage_of_mrkt_fruit']['replica']=$this->lang->line("CANNOT_CALCULATE");
    }
    if($options['percentage_of_mrkt_fruit_wt']==1)
    {
        $table_heads['percentage_of_mrkt_fruit_wt']='percentage_of_mrkt_fruit_wt';
        $data['percentage_of_mrkt_fruit_wt']['normal']=$data['percentage_of_mrkt_fruit_wt']['replica']=$this->lang->line("CANNOT_CALCULATE");
    }
    if($options['no_of_fruits_per_plant']==1)
    {
        $table_heads['no_of_fruits_per_plant']='no_of_fruits_per_plant';
        $data['no_of_fruits_per_plant']['normal']=$data['no_of_fruits_per_plant']['replica']=$this->lang->line("CANNOT_CALCULATE");
    }
    if($options['avg_fruit_wt']==1)
    {
        $table_heads['avg_fruit_wt']='avg_fruit_wt';
        $data['avg_fruit_wt']['normal']=$data['avg_fruit_wt']['replica']=$this->lang->line("CANNOT_CALCULATE");
    }
    if($options['fr_wt_per_plant']==1)
    {
        $table_heads['fr_wt_per_plant']='fr_wt_per_plant';
        $data['fr_wt_per_plant']['normal']=$data['fr_wt_per_plant']['replica']=$this->lang->line("CANNOT_CALCULATE");
    }
    if($options['total_harv_roots']==1)
    {
        $table_heads['total_harv_roots']='total_harv_roots';
        $data['total_harv_roots']['normal']=$data['total_harv_roots']['replica']=$this->lang->line("CANNOT_CALCULATE");
    }
    if($options['total_root_wt']==1)
    {
        $table_heads['total_root_wt']='total_root_wt';
        $data['total_root_wt']['normal']=$data['total_root_wt']['replica']=$this->lang->line("CANNOT_CALCULATE");
    }
    if($options['total_market_roots']==1)
    {
        $table_heads['total_market_roots']='total_market_roots';
        $data['total_market_roots']['normal']=$data['total_market_roots']['replica']=$this->lang->line("CANNOT_CALCULATE");
    }
    if($options['total_market_root_wt']==1)
    {
        $table_heads['total_market_root_wt']='total_market_root_wt';
        $data['total_market_root_wt']['normal']=$data['total_market_root_wt']['replica']=$this->lang->line("CANNOT_CALCULATE");
    }
    if($options['percentage_of_mrkt_root']==1)
    {
        $table_heads['percentage_of_mrkt_root']='percentage_of_mrkt_root';
        $data['percentage_of_mrkt_root']['normal']=$data['percentage_of_mrkt_root']['replica']=$this->lang->line("CANNOT_CALCULATE");
    }
    if($options['percentage_of_mrkt_root_wt']==1)
    {
        $table_heads['percentage_of_mrkt_root_wt']='percentage_of_mrkt_root_wt';
        $data['percentage_of_mrkt_root_wt']['normal']=$data['percentage_of_mrkt_root_wt']['replica']=$this->lang->line("CANNOT_CALCULATE");
    }
    if($options['avg_root_wt']==1)
    {
        $table_heads['avg_root_wt']='avg_root_wt';
        $data['avg_root_wt']['normal']=$data['avg_root_wt']['replica']=$this->lang->line("CANNOT_CALCULATE");
    }
    if($options['total_no_of_leaves']==1)
    {
        $table_heads['total_no_of_leaves']='total_no_of_leaves';
        $data['total_no_of_leaves']['normal']=$data['total_no_of_leaves']['replica']=$this->lang->line("CANNOT_CALCULATE");
    }
    if($options['total_leaf_wt']==1)
    {
        $table_heads['total_leaf_wt']='total_leaf_wt';
        $data['total_leaf_wt']['normal']=$data['total_leaf_wt']['replica']=$this->lang->line("CANNOT_CALCULATE");
    }
    if($options['total_mrkt_leaf']==1)
    {
        $table_heads['total_mrkt_leaf']='total_mrkt_leaf';
        $data['total_mrkt_leaf']['normal']=$data['total_mrkt_leaf']['replica']=$this->lang->line("CANNOT_CALCULATE");
    }
    if($options['total_market_leaf_wt']==1)
    {
        $table_heads['total_market_leaf_wt']='total_market_leaf_wt';
        $data['total_market_leaf_wt']['normal']=$data['total_market_leaf_wt']['replica']=$this->lang->line("CANNOT_CALCULATE");
    }
    if($options['percentage_of_mrkt_leaf']==1)
    {
        $table_heads['percentage_of_mrkt_leaf']='percentage_of_mrkt_leaf';
        $data['percentage_of_mrkt_leaf']['normal']=$data['percentage_of_mrkt_leaf']['replica']=$this->lang->line("CANNOT_CALCULATE");
    }
    if($options['percentage_of_mrkt_leaf_wt']==1)
    {
        $table_heads['percentage_of_mrkt_leaf_wt']='percentage_of_mrkt_leaf_wt';
        $data['percentage_of_mrkt_leaf_wt']['normal']=$data['percentage_of_mrkt_leaf_wt']['replica']=$this->lang->line("CANNOT_CALCULATE");
    }
    $table_heads['f_holding_capacity']='f_holding_capacity';
    $data['f_holding_capacity']['normal']=$data['f_holding_capacity']['replica']=$this->lang->line('NOT_SET');
    $table_heads['average_uniformity']='average_uniformity';
    $data['average_uniformity']['normal']=$data['average_uniformity']['replica']=$this->lang->line('CANNOT_CALCULATE');
    $table_heads['evaluation']='evaluation';
    $data['evaluation']['normal']=$data['evaluation']['replica']=$this->lang->line('NOT_SET');
    $table_heads['accepted']='accepted';
    $data['accepted']['normal']=$data['accepted']['replica']=$this->lang->line('NOT_SET');
    $table_heads['remarks']='remarks';
    $data['remarks']['normal']=$data['remarks']['replica']=$this->lang->line('NOT_SET');
    $table_heads['ranking']='ranking';
    $data['ranking']['normal']=$data['ranking']['replica']='';

    if(isset($harvest[$variety['id']]))
    {
        $total_harvest=sizeof($harvest[$variety['id']]);
        $first_info=json_decode($harvest[$variety['id']][1],true);
        $last_info=json_decode($harvest[$variety['id']][$total_harvest],true);
        $first_harvest_time=System_helper::get_time($first_info['normal']['harvesting_date']);
        $last_harvest_time=System_helper::get_time($last_info['normal']['harvesting_date']);
        if($first_harvest_time>0)
        {
            $first_harvest_days=($first_harvest_time-$delivery_and_sowing_info['sowing_date'])/(3600*24);
        }
        if($last_harvest_time>0)
        {
            $last_harvest_days=($last_harvest_time-$delivery_and_sowing_info['sowing_date'])/(3600*24);
        }
        if(($first_harvest_time>0)&&($last_harvest_time>0))
        {
            $diff_last_first_days=($last_harvest_time-$first_harvest_time)/(3600*24);
        }


        $data['first_harvest_days']['normal']=$data['first_harvest_days']['replica']=$first_harvest_days;
        $data['last_harvest_days']['normal']=$data['last_harvest_days']['replica']=$last_harvest_days;
        $data['interval_first_and_last_harvest']['normal']=$data['interval_first_and_last_harvest']['replica']=$diff_last_first_days;
        $data['total_no_of_harvest']['normal']=$data['total_no_of_harvest']['replica']=$total_harvest;

        if($options['total_harv_curds']==1)
        {

            $total_normal = 0;
            $total_replica = 0;
            foreach($harvest[$variety['id']] as $hcd)
            {
                $detail = json_decode($hcd,true);
                $value_normal = $detail['normal']['no_of_plants_harvested'];
                $value_replica = $detail['replica']['no_of_plants_harvested'];
                $total_normal += $value_normal;
                $total_replica += $value_replica;
            }
            $data['total_harv_curds']['normal']=$total_normal;
            $data['total_harv_curds']['replica']=$total_replica;
        }
        if($options['total_curd_wt']==1)
        {
            $data['total_curd_wt']['normal']=$total_harvested_weight_normal;
            $data['total_curd_wt']['replica']=$total_harvested_weight_replica;
        }
        if($options['total_market_curds']==1)
        {

            $total_normal = 0;
            $total_replica = 0;
            foreach($harvest[$variety['id']] as $hcd)
            {
                $detail = json_decode($hcd,true);
                $value_normal = $detail['normal']['total_mrkt_curds'];
                $value_replica = $detail['replica']['total_mrkt_curds'];
                $total_normal += $value_normal;
                $total_replica += $value_replica;
            }
            $data['total_market_curds']['normal']=$total_normal;
            $data['total_market_curds']['replica']=$total_replica;
        }

        if($options['total_market_curd_wt']==1)
        {

            $total_normal = 0;
            $total_replica = 0;
            foreach($harvest[$variety['id']] as $hcd)
            {
                $detail = json_decode($hcd,true);
                $value_normal = $detail['normal']['total_mrkt_curd_wt'];
                $value_replica = $detail['replica']['total_mrkt_curd_wt'];
                $total_normal += $value_normal;
                $total_replica += $value_replica;
            }
            $data['total_market_curd_wt']['normal']=$total_normal;
            $data['total_market_curd_wt']['replica']=$total_replica;
        }
        //percentage style
        if($options['percentage_of_mrkt_curd']==1)
        {

            $total_normal_up = 0;
            $total_replica_up = 0;
            $total_normal_down = 0;
            $total_replica_down = 0;

            foreach($harvest[$variety['id']] as $hcd)
            {
                $detail = json_decode($hcd,true);
                $value_normal = $detail['normal']['total_mrkt_curds'];
                $value_replica = $detail['replica']['total_mrkt_curds'];
                $total_normal_up += $value_normal;
                $total_replica_up += $value_replica;

                $value_normal = $detail['normal']['no_of_plants_harvested'];
                $value_replica = $detail['replica']['no_of_plants_harvested'];
                $total_normal_down += $value_normal;
                $total_replica_down += $value_replica;
            }
            if(($total_normal_up>0)&&($total_normal_down>0))
            {
                $data['percentage_of_mrkt_curd']['normal']=round(($total_normal_up/$total_normal_down)*100,2);
            }
            if(($total_replica_up>0)&&($total_replica_down>0))
            {
                $data['percentage_of_mrkt_curd']['replica']=round(($total_replica_up/$total_replica_down)*100,2);
            }
        }
        if($options['percentage_of_mrkt_curd_wt']==1)
        {

            $total_normal_up = 0;
            $total_replica_up = 0;


            foreach($harvest[$variety['id']] as $hcd)
            {
                $detail = json_decode($hcd,true);
                $value_normal = $detail['normal']['total_mrkt_curd_wt'];
                $value_replica = $detail['replica']['total_mrkt_curd_wt'];
                $total_normal_up += $value_normal;
                $total_normal_up += $value_replica;
            }
            if(($total_normal_up>0)&&($total_harvested_weight_normal>0))
            {
                $data['percentage_of_mrkt_curd_wt']['normal']=round(($total_normal_up/$total_harvested_weight_normal)*100,2);
            }
            if(($total_replica_up>0)&&($total_harvested_weight_replica>0))
            {
                $data['percentage_of_mrkt_curd_wt']['replica']=round(($total_replica_up/$total_harvested_weight_replica)*100,2);
            }
        }
        if($options['avg_curd_wt']==1)
        {
            $total_normal_down = 0;
            $total_replica_down = 0;

            foreach($harvest[$variety['id']] as $hcd)
            {
                $detail = json_decode($hcd,true);
                $value_normal = $detail['normal']['no_of_plants_harvested'];
                $value_replica = $detail['replica']['no_of_plants_harvested'];
                $total_normal_down += $value_normal;
                $total_replica_down += $value_replica;
            }
            if(($total_normal_down>0)&&($total_harvested_weight_normal>0))
            {
                $data['avg_curd_wt']['normal']=round(($total_harvested_weight_normal/$total_normal_down)*1000,2);
            }
            if(($total_replica_down>0)&&($total_harvested_weight_replica>0))
            {
                $data['avg_curd_wt']['replica']=round(($total_harvested_weight_replica/$total_replica_down)*1000,2);
            }
        }
        if($options['total_harv_heads']==1)
        {

            $total_normal = 0;
            $total_replica = 0;
            foreach($harvest[$variety['id']] as $hcd)
            {
                $detail = json_decode($hcd,true);
                $value_normal = $detail['normal']['no_of_plants_harvested'];
                $value_replica = $detail['replica']['no_of_plants_harvested'];
                $total_normal += $value_normal;
                $total_replica += $value_replica;
            }
            $data['total_harv_heads']['normal']=$total_normal;
            $data['total_harv_heads']['replica']=$total_replica;
        }

        if($options['total_head_wt']==1)
        {
            $data['total_head_wt']['normal']=$total_harvested_weight_normal;
            $data['total_head_wt']['replica']=$total_harvested_weight_replica;
        }
        if($options['total_market_heads']==1)
        {

            $total_normal = 0;
            $total_replica = 0;
            foreach($harvest[$variety['id']] as $hcd)
            {
                $detail = json_decode($hcd,true);
                $value_normal = $detail['normal']['total_mrkt_heads'];
                $value_replica = $detail['replica']['total_mrkt_heads'];
                $total_normal += $value_normal;
                $total_replica += $value_replica;
            }
            $data['total_market_heads']['normal']=$total_normal;
            $data['total_market_heads']['replica']=$total_replica;
        }
        if($options['total_market_head_wt']==1)
        {

            $total_normal = 0;
            $total_replica = 0;
            foreach($harvest[$variety['id']] as $hcd)
            {
                $detail = json_decode($hcd,true);
                $value_normal = $detail['normal']['total_mrkt_head_wt'];
                $value_replica = $detail['replica']['total_mrkt_head_wt'];
                $total_normal += $value_normal;
                $total_replica += $value_replica;
            }
            $data['total_market_head_wt']['normal']=$total_normal;
            $data['total_market_head_wt']['replica']=$total_replica;
        }
        if($options['percentage_of_mrkt_head']==1)
        {

            $total_normal_up = 0;
            $total_replica_up = 0;
            $total_normal_down = 0;
            $total_replica_down = 0;

            foreach($harvest[$variety['id']] as $hcd)
            {
                $detail = json_decode($hcd,true);
                $value_normal = $detail['normal']['total_mrkt_heads'];
                $value_replica = $detail['replica']['total_mrkt_heads'];
                $total_normal_up += $value_normal;
                $total_replica_up += $value_replica;

                $value_normal = $detail['normal']['no_of_plants_harvested'];
                $value_replica = $detail['replica']['no_of_plants_harvested'];
                $total_normal_down += $value_normal;
                $total_replica_down += $value_replica;
            }
            if(($total_normal_up>0)&&($total_normal_down>0))
            {
                $data['percentage_of_mrkt_head']['normal']=round(($total_normal_up/$total_normal_down)*100,2);
            }
            if(($total_replica_up>0)&&($total_replica_down>0))
            {
                $data['percentage_of_mrkt_head']['replica']=round(($total_replica_up/$total_replica_down)*100,2);
            }
        }
        if($options['percentage_of_mrkt_head_wt']==1)
        {

            $total_normal_up = 0;
            $total_replica_up = 0;


            foreach($harvest[$variety['id']] as $hcd)
            {
                $detail = json_decode($hcd,true);
                $value_normal = $detail['normal']['total_mrkt_head_wt'];
                $value_replica = $detail['replica']['total_mrkt_head_wt'];
                $total_normal_up += $value_normal;
                $total_normal_up += $value_replica;
            }
            if(($total_normal_up>0)&&($total_harvested_weight_normal>0))
            {
                $data['percentage_of_mrkt_head_wt']['normal']=round(($total_normal_up/$total_harvested_weight_normal)*100,2);
            }
            if(($total_replica_up>0)&&($total_harvested_weight_replica>0))
            {
                $data['percentage_of_mrkt_head_wt']['replica']=round(($total_replica_up/$total_harvested_weight_replica)*100,2);
            }
        }
        if($options['avg_head_wt']==1)
        {
            $total_normal_down = 0;
            $total_replica_down = 0;

            foreach($harvest[$variety['id']] as $hcd)
            {
                $detail = json_decode($hcd,true);
                $value_normal = $detail['normal']['no_of_plants_harvested'];
                $value_replica = $detail['replica']['no_of_plants_harvested'];
                $total_normal_down += $value_normal;
                $total_replica_down += $value_replica;
            }
            if(($total_normal_down>0)&&($total_harvested_weight_normal>0))
            {
                $data['avg_head_wt']['normal']=round(($total_harvested_weight_normal/$total_normal_down)*1000,2);
            }
            if(($total_replica_down>0)&&($total_harvested_weight_replica>0))
            {
                $data['avg_head_wt']['replica']=round(($total_harvested_weight_replica/$total_replica_down)*1000,2);
            }
        }
        if($options['total_harv_fruits']==1)
        {

            $total_normal = 0;
            $total_replica = 0;
            foreach($harvest[$variety['id']] as $hcd)
            {
                $detail = json_decode($hcd,true);
                $value_normal = $detail['normal']['no_of_fruits'];
                $value_replica = $detail['replica']['no_of_fruits'];
                $total_normal += $value_normal;
                $total_replica += $value_replica;
            }
            $data['total_harv_fruits']['normal']=$total_normal;
            $data['total_harv_fruits']['replica']=$total_replica;
        }
        if($options['total_fruit_wt']==1)
        {
            $data['total_fruit_wt']['normal']=$total_harvested_weight_normal;
            $data['total_fruit_wt']['replica']=$total_harvested_weight_replica;
        }
        if($options['total_market_fruits']==1)
        {

            $total_normal = 0;
            $total_replica = 0;
            foreach($harvest[$variety['id']] as $hcd)
            {
                $detail = json_decode($hcd,true);
                $value_normal = $detail['normal']['total_mrkt_fruits'];
                $value_replica = $detail['replica']['total_mrkt_fruits'];
                $total_normal += $value_normal;
                $total_replica += $value_replica;
            }
            $data['total_market_fruits']['normal']=$total_normal;
            $data['total_market_fruits']['replica']=$total_replica;
        }
        if($options['total_market_fruit_wt']==1)
        {

            $total_normal = 0;
            $total_replica = 0;
            foreach($harvest[$variety['id']] as $hcd)
            {
                $detail = json_decode($hcd,true);
                $value_normal = $detail['normal']['total_mrkt_fruit_wt'];
                $value_replica = $detail['replica']['total_mrkt_fruit_wt'];
                $total_normal += $value_normal;
                $total_replica += $value_replica;
            }
            $data['total_market_fruit_wt']['normal']=$total_normal;
            $data['total_market_fruit_wt']['replica']=$total_replica;
        }
        if($options['percentage_of_mrkt_fruit']==1)
        {

            $total_normal_up = 0;
            $total_replica_up = 0;
            $total_normal_down = 0;
            $total_replica_down = 0;

            foreach($harvest[$variety['id']] as $hcd)
            {
                $detail = json_decode($hcd,true);
                $value_normal = $detail['normal']['total_mrkt_fruits'];
                $value_replica = $detail['replica']['total_mrkt_fruits'];
                $total_normal_up += $value_normal;
                $total_replica_up += $value_replica;

                $value_normal = $detail['normal']['no_of_fruits'];
                $value_replica = $detail['replica']['no_of_fruits'];
                $total_normal_down += $value_normal;
                $total_replica_down += $value_replica;
            }
            if(($total_normal_up>0)&&($total_normal_down>0))
            {
                $data['percentage_of_mrkt_fruit']['normal']=round(($total_normal_up/$total_normal_down)*100,2);
            }
            if(($total_replica_up>0)&&($total_replica_down>0))
            {
                $data['percentage_of_mrkt_fruit']['replica']=round(($total_replica_up/$total_replica_down)*100,2);
            }
        }
        if($options['percentage_of_mrkt_fruit_wt']==1)
        {

            $total_normal_up = 0;
            $total_replica_up = 0;


            foreach($harvest[$variety['id']] as $hcd)
            {
                $detail = json_decode($hcd,true);
                $value_normal = $detail['normal']['total_mrkt_fruit_wt'];
                $value_replica = $detail['replica']['total_mrkt_fruit_wt'];
                $total_normal_up += $value_normal;
                $total_normal_up += $value_replica;
            }
            if(($total_normal_up>0)&&($total_harvested_weight_normal>0))
            {
                $data['percentage_of_mrkt_fruit_wt']['normal']=round(($total_normal_up/$total_harvested_weight_normal)*100,2);
            }
            if(($total_replica_up>0)&&($total_harvested_weight_replica>0))
            {
                $data['percentage_of_mrkt_fruit_wt']['replica']=round(($total_replica_up/$total_harvested_weight_replica)*100,2);
            }
        }
        if($options['no_of_fruits_per_plant']==1)
        {

            $total_normal_up = 0;
            $total_replica_up = 0;
            $total_normal_down = 0;
            $total_replica_down = 0;

            foreach($harvest[$variety['id']] as $hcd)
            {
                $detail = json_decode($hcd,true);
                $value_normal = $detail['normal']['no_of_plants_harvested'];
                $value_replica = $detail['replica']['no_of_plants_harvested'];
                $total_normal_down += $value_normal;
                $total_replica_down += $value_replica;

                $value_normal = $detail['normal']['no_of_fruits'];
                $value_replica = $detail['replica']['no_of_fruits'];
                $total_normal_up += $value_normal;
                $total_replica_up += $value_replica;
            }
            if(($total_normal_up>0)&&($total_normal_down>0))
            {
                $data['no_of_fruits_per_plant']['normal']=round(($total_normal_up/$total_normal_down*$total_harvest),2);
            }
            if(($total_replica_up>0)&&($total_replica_down>0))
            {
                $data['no_of_fruits_per_plant']['replica']=round(($total_replica_up/$total_replica_down*$total_harvest),2);
            }
        }
        if($options['avg_fruit_wt']==1)
        {
            $total_normal_down = 0;
            $total_replica_down = 0;

            foreach($harvest[$variety['id']] as $hcd)
            {
                $detail = json_decode($hcd,true);
                $value_normal = $detail['normal']['no_of_fruits'];
                $value_replica = $detail['replica']['no_of_fruits'];
                $total_normal_down += $value_normal;
                $total_replica_down += $value_replica;
            }
            if(($total_normal_down>0)&&($total_harvested_weight_normal>0))
            {
                $data['avg_fruit_wt']['normal']=round(($total_harvested_weight_normal/$total_normal_down)*1000,2);
            }
            if(($total_replica_down>0)&&($total_harvested_weight_replica>0))
            {
                $data['avg_fruit_wt']['replica']=round(($total_harvested_weight_replica/$total_replica_down)*1000,2);
            }
        }
        if($options['fr_wt_per_plant']==1)
        {
            $total_normal_down = 0;
            $total_replica_down = 0;

            foreach($harvest[$variety['id']] as $hcd)
            {
                $detail = json_decode($hcd,true);
                $value_normal = $detail['normal']['no_of_plants_harvested'];
                $value_replica = $detail['replica']['no_of_plants_harvested'];
                $total_normal_down += $value_normal;
                $total_replica_down += $value_replica;
            }
            if(($total_normal_down>0)&&($total_harvested_weight_normal>0))
            {
                $data['fr_wt_per_plant']['normal']=round(($total_harvested_weight_normal/$total_normal_down*$total_harvest),2);
            }
            if(($total_replica_down>0)&&($total_harvested_weight_replica>0))
            {
                $data['fr_wt_per_plant']['replica']=round(($total_harvested_weight_replica/$total_replica_down*$total_harvest),2);
            }
        }
        if($options['total_harv_roots']==1)
        {

            $total_normal = 0;
            $total_replica = 0;
            foreach($harvest[$variety['id']] as $hcd)
            {
                $detail = json_decode($hcd,true);
                $value_normal = $detail['normal']['no_of_roots_harvested'];
                $value_replica = $detail['replica']['no_of_roots_harvested'];
                $total_normal += $value_normal;
                $total_replica += $value_replica;
            }
            $data['total_harv_roots']['normal']=$total_normal;
            $data['total_harv_roots']['replica']=$total_replica;
        }
        if($options['total_root_wt']==1)
        {
            $data['total_root_wt']['normal']=$total_harvested_weight_normal;
            $data['total_root_wt']['replica']=$total_harvested_weight_replica;
        }
        if($options['total_market_roots']==1)
        {

            $total_normal = 0;
            $total_replica = 0;
            foreach($harvest[$variety['id']] as $hcd)
            {
                $detail = json_decode($hcd,true);
                $value_normal = $detail['normal']['total_mrkt_roots'];
                $value_replica = $detail['replica']['total_mrkt_roots'];
                $total_normal += $value_normal;
                $total_replica += $value_replica;
            }
            $data['total_market_roots']['normal']=$total_normal;
            $data['total_market_roots']['replica']=$total_replica;
        }
        if($options['total_market_root_wt']==1)
        {

            $total_normal = 0;
            $total_replica = 0;
            foreach($harvest[$variety['id']] as $hcd)
            {
                $detail = json_decode($hcd,true);
                $value_normal = $detail['normal']['total_mrkt_roots_wt'];
                $value_replica = $detail['replica']['total_mrkt_roots_wt'];
                $total_normal += $value_normal;
                $total_replica += $value_replica;
            }
            $data['total_market_root_wt']['normal']=$total_normal;
            $data['total_market_root_wt']['replica']=$total_replica;
        }
        if($options['percentage_of_mrkt_root']==1)
        {

            $total_normal_up = 0;
            $total_replica_up = 0;
            $total_normal_down = 0;
            $total_replica_down = 0;

            foreach($harvest[$variety['id']] as $hcd)
            {
                $detail = json_decode($hcd,true);
                $value_normal = $detail['normal']['total_mrkt_roots'];
                $value_replica = $detail['replica']['total_mrkt_roots'];
                $total_normal_up += $value_normal;
                $total_replica_up += $value_replica;

                $value_normal = $detail['normal']['no_of_roots_harvested'];
                $value_replica = $detail['replica']['no_of_roots_harvested'];
                $total_normal_down += $value_normal;
                $total_replica_down += $value_replica;
            }
            if(($total_normal_up>0)&&($total_normal_down>0))
            {
                $data['percentage_of_mrkt_root']['normal']=round(($total_normal_up/$total_normal_down)*100,2);
            }
            if(($total_replica_up>0)&&($total_replica_down>0))
            {
                $data['percentage_of_mrkt_root']['replica']=round(($total_replica_up/$total_replica_down)*100,2);
            }
        }
        if($options['percentage_of_mrkt_root_wt']==1)
        {
            $total_normal_down = 0;
            $total_replica_down = 0;

            foreach($harvest[$variety['id']] as $hcd)
            {
                $detail = json_decode($hcd,true);
                $value_normal = $detail['normal']['total_mrkt_roots_wt'];
                $value_replica = $detail['replica']['total_mrkt_roots_wt'];
                $total_normal_up += $value_normal;
                $total_replica_up += $value_replica;
            }
            if(($total_normal_down>0)&&($total_harvested_weight_normal>0))
            {
                $data['percentage_of_mrkt_root_wt']['normal']=round(($total_normal_up/$total_harvested_weight_normal)*100,2);
            }
            if(($total_replica_down>0)&&($total_harvested_weight_replica>0))
            {
                $data['percentage_of_mrkt_root_wt']['replica']=round(($total_replica_up/$total_harvested_weight_replica)*100,2);
            }
        }
        if($options['avg_root_wt']==1)
        {
            $total_normal_down = 0;
            $total_replica_down = 0;

            foreach($harvest[$variety['id']] as $hcd)
            {
                $detail = json_decode($hcd,true);
                $value_normal = $detail['normal']['no_of_roots_harvested'];
                $value_replica = $detail['replica']['no_of_roots_harvested'];
                $total_normal_down += $value_normal;
                $total_replica_down += $value_replica;
            }
            if(($total_normal_down>0)&&($total_harvested_weight_normal>0))
            {
                $data['avg_root_wt']['normal']=round(($total_harvested_weight_normal/$total_normal_down)*1000,2);
            }
            if(($total_replica_down>0)&&($total_harvested_weight_replica>0))
            {
                $data['avg_root_wt']['replica']=round(($total_harvested_weight_replica/$total_replica_down)*1000,2);
            }
        }
        if($options['total_no_of_leaves']==1)
        {

            $total_normal = 0;
            $total_replica = 0;
            foreach($harvest[$variety['id']] as $hcd)
            {
                $detail = json_decode($hcd,true);
                $value_normal = $detail['normal']['total_no_of_leaves'];
                $value_replica = $detail['replica']['total_no_of_leaves'];
                $total_normal += $value_normal;
                $total_replica += $value_replica;
            }
            $data['total_no_of_leaves']['normal']=$total_normal;
            $data['total_no_of_leaves']['replica']=$total_replica;
        }
        if($options['total_leaf_wt']==1)
        {
            $data['total_leaf_wt']['normal']=$total_harvested_weight_normal;
            $data['total_leaf_wt']['replica']=$total_harvested_weight_replica;
        }
        if($options['total_mrkt_leaf']==1)
        {

            $total_normal = 0;
            $total_replica = 0;
            foreach($harvest[$variety['id']] as $hcd)
            {
                $detail = json_decode($hcd,true);
                $value_normal = $detail['normal']['total_mrkt_leaf'];
                $value_replica = $detail['replica']['total_mrkt_leaf'];
                $total_normal += $value_normal;
                $total_replica += $value_replica;
            }
            $data['total_mrkt_leaf']['normal']=$total_normal;
            $data['total_mrkt_leaf']['replica']=$total_replica;
        }
        if($options['total_market_leaf_wt']==1)
        {

            $total_normal = 0;
            $total_replica = 0;
            foreach($harvest[$variety['id']] as $hcd)
            {
                $detail = json_decode($hcd,true);
                $value_normal = $detail['normal']['total_mrkt_leaf_wt'];
                $value_replica = $detail['replica']['total_mrkt_leaf_wt'];
                $total_normal += $value_normal;
                $total_replica += $value_replica;
            }
            $data['total_market_leaf_wt']['normal']=$total_normal;
            $data['total_market_leaf_wt']['replica']=$total_replica;
        }
        if($options['percentage_of_mrkt_leaf']==1)
        {

            $total_normal_up = 0;
            $total_replica_up = 0;
            $total_normal_down = 0;
            $total_replica_down = 0;

            foreach($harvest[$variety['id']] as $hcd)
            {
                $detail = json_decode($hcd,true);
                $value_normal = $detail['normal']['total_mrkt_leaf'];
                $value_replica = $detail['replica']['total_mrkt_leaf'];
                $total_normal_up += $value_normal;
                $total_replica_up += $value_replica;

                $value_normal = $detail['normal']['total_no_of_leaves'];
                $value_replica = $detail['replica']['total_no_of_leaves'];
                $total_normal_down += $value_normal;
                $total_replica_down += $value_replica;
            }
            if(($total_normal_up>0)&&($total_normal_down>0))
            {
                $data['percentage_of_mrkt_leaf']['normal']=round(($total_normal_up/$total_normal_down)*100,2);
            }
            if(($total_replica_up>0)&&($total_replica_down>0))
            {
                $data['percentage_of_mrkt_leaf']['replica']=round(($total_replica_up/$total_replica_down)*100,2);
            }
        }
        if($options['percentage_of_mrkt_leaf_wt']==1)
        {
            $total_normal_down = 0;
            $total_replica_down = 0;

            foreach($harvest[$variety['id']] as $hcd)
            {
                $detail = json_decode($hcd,true);
                $value_normal = $detail['normal']['total_mrkt_leaf_wt'];
                $value_replica = $detail['replica']['total_mrkt_leaf_wt'];
                $total_normal_up += $value_normal;
                $total_replica_up += $value_replica;
            }
            if(($total_normal_down>0)&&($total_harvested_weight_normal>0))
            {
                $data['percentage_of_mrkt_leaf_wt']['normal']=round(($total_normal_up/$total_harvested_weight_normal)*100,2);
            }
            if(($total_replica_down>0)&&($total_harvested_weight_replica>0))
            {
                $data['percentage_of_mrkt_leaf_wt']['replica']=round(($total_replica_up/$total_harvested_weight_replica)*100,2);
            }
        }
        $sum_uniformity_normal = 0;
        $sum_uniformity_replica = 0;
        foreach($harvest[$variety['id']] as $hcd)
        {
            $detail = json_decode($hcd,true);

            if(isset($detail['normal']['curd_uniformity']))
            {
                $uniformity_normal = $detail['normal']['curd_uniformity'];
                $uniformity_replica = $detail['replica']['curd_uniformity'];
                $sum_uniformity_normal += $uniformity_normal;
                $sum_uniformity_replica += $uniformity_replica;
            }
            elseif(isset($detail['normal']['head_uniformity']))
            {
                $uniformity_normal = $detail['normal']['head_uniformity'];
                $uniformity_replica = $detail['replica']['head_uniformity'];
                $sum_uniformity_normal += $uniformity_normal;
                $sum_uniformity_replica += $uniformity_replica;
            }
            elseif(isset($detail['normal']['fruit_uniformity']))
            {
                $uniformity_normal = $detail['normal']['fruit_uniformity'];
                $uniformity_replica = $detail['replica']['fruit_uniformity'];
                $sum_uniformity_normal += $uniformity_normal;
                $sum_uniformity_replica += $uniformity_replica;
            }
            elseif(isset($detail['normal']['roots_uniformity']))
            {
                $uniformity_normal = $detail['normal']['roots_uniformity'];
                $uniformity_replica = $detail['replica']['roots_uniformity'];
                $sum_uniformity_normal += $uniformity_normal;
                $sum_uniformity_replica += $uniformity_replica;
            }
            elseif(isset($detail['normal']['leaf_uniformity']))
            {
                $uniformity_normal = $detail['normal']['leaf_uniformity'];
                $uniformity_replica = $detail['replica']['leaf_uniformity'];
                $sum_uniformity_normal += $uniformity_normal;
                $sum_uniformity_replica += $uniformity_replica;
            }
        }
        if(($sum_uniformity_normal>0)&&($total_harvest>0))
        {
            $data['average_uniformity']['normal']=round($sum_uniformity_normal/$total_harvest, 2);
        }
        if(($sum_uniformity_replica>0)&&($total_harvest>0))
        {
            $data['average_uniformity']['replica']=round($sum_uniformity_replica/$total_harvest, 2);
        }

    }



    if(is_array($info)&& isset($info['normal']['f_holding_capacity']))
    {
        $data['f_holding_capacity']['normal']=$info['normal']['f_holding_capacity'];
    }
    if($variety['replica_status']==1)
    {
        if(is_array($info)&& isset($info['replica']['f_holding_capacity']))
        {
            $data['f_holding_capacity']['replica']=$info['replica']['f_holding_capacity'];
        }

    }




    if(is_array($info)&& isset($info['normal']['evaluation']))
    {
        $data['evaluation']['normal']=$info['normal']['evaluation'];
    }
    if($variety['replica_status']==1)
    {
        if(is_array($info)&& isset($info['replica']['evaluation']))
        {
            $data['evaluation']['replica']=$info['replica']['evaluation'];
        }

    }




    //accepted without option

    if(is_array($info)&& isset($info['normal']['accepted']))
    {
        if(($info['normal']['accepted'])==1)
        {
            $data['accepted']['normal']=$this->lang->line('YES');
        }
        else
        {
            $data['accepted']['normal']=$this->lang->line('NO');
        }

    }
    if($variety['replica_status']==1)
    {
        if(is_array($info)&& isset($info['replica']['accepted']))
        {
            if(($info['replica']['accepted'])==1)
            {
                $data['accepted']['replica']=$this->lang->line('YES');
            }
            else
            {
                $data['accepted']['replica']=$this->lang->line('NO');
            }

        }
    }
    //accepted without option
    //remarks without option

    if(is_array($info)&& !empty($info['normal']['remarks']))
    {
        $data['remarks']['normal']=$data['remarks']['replica']=$info['normal']['remarks'];
    }

    //remarks without option

    //for ranking

    if(isset($harvest_compile[$variety['id']]['ranking']))
    {
        $data['ranking']['normal']=$data['ranking']['replica']=$harvest_compile[$variety['id']]['ranking'];
    }
    //ranking finished

    $final_varieties[]=$data;
}

//sorting final variety
for($i=0;$i<(sizeof($final_varieties)-1);$i++)
{
    for($j=$i+1;$j<sizeof($final_varieties);$j++)
    {
        if(($final_varieties[$i]['ranking']['normal']=='')&&($final_varieties[$j]['ranking']['normal']==''))
        {

        }
        elseif($final_varieties[$i]['ranking']['normal']=='')
        {
            $temp=$final_varieties[$i];
            $final_varieties[$i]=$final_varieties[$j];
            $final_varieties[$j]=$temp;
        }
        elseif($final_varieties[$j]['ranking']['normal']=='')
        {

        }
        elseif(($final_varieties[$i]['ranking']['normal']>$final_varieties[$j]['ranking']['normal']))
        {
            $temp=$final_varieties[$i];
            $final_varieties[$i]=$final_varieties[$j];
            $final_varieties[$j]=$temp;
        }
    }
}
?>
<div class="row show-grid">
    <div class="col-xs-12" style="overflow-x: auto">
        <table class="table table-hover table-bordered" >
            <thead class="hidden-print">
            <tr>
                <th><?php echo $this->lang->line("SERIAL"); ?></th>
                <?php
                    foreach($table_heads as $th)
                    {
                        if($th=='remarks')
                        {
                            ?>
                            <th style="min-width: 300px;"><?php echo $this->lang->line(strtoupper($th)); ?></th>
                            <?php
                        }
                        else
                        {
                            ?>
                            <th><?php echo $this->lang->line(strtoupper($th)); ?></th>
                            <?php
                        }
                    }
                ?>

            </tr>
            </thead>
            <tbody>
                <?php
                    $index=0;
                    foreach($final_varieties as $variety)
                    {
                        ?>
                        <tr>
                            <td><?php echo ++$index;?></td>
                            <?php
                            foreach($table_heads as $th)
                            {
                                ?>
                                <td><?php echo $variety[$th]['normal']; ?></td>
                                <?php
                            }
                            ?>
                        </tr>
                        <?php
                        if($variety['replica_status'])
                        {
                            ?>
                            <tr style="color: red;">
                                <td><?php echo $index;?></td>
                                <?php
                                foreach($table_heads as $th)
                                {
                                    ?>
                                    <td><?php echo $variety[$th]['replica']; ?></td>
                                <?php
                                }
                                ?>
                            </tr>
                            <?php
                        }
                    }
                ?>

            </tbody>
        </table>

    </div>
</div>