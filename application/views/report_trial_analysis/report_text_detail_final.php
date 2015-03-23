<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
$trial_status_config=$this->config->item('trial_status');
$this->load->config('veg_config');
$plant_vigor_config=$this->config->item('vc_plant_vigor');
$this->load->config('fruit_config');
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
//print_r($final);
//echo "</pre>";
//echo "<pre>";
//print_r($delivery_and_sowing_info);
//echo "</pre>";

$this->lang->load('rnd_veg');

$table_heads=array();
$final_varieties=array();
foreach($varieties as $variety)
{
    /*$total_harvested_weight_normal=0;
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
    }*/
    $info=array();
    if(isset($final[$variety['id']]['info']))
    {
        $info=json_decode($final[$variety['id']]['info'],true);
    }
    $flower_info=array();
    if(isset($flowering[$variety['id']]['info']))
    {
        $flower_info=json_decode($flowering[$variety['id']]['info'],true);
    }
    $fruit_info=array();
    if(isset($fruit[$variety['id']]['info']))
    {
        $fruit_info=json_decode($fruit[$variety['id']]['info'],true);
    }



    $data=array();
    $data['replica_status']=$variety['replica_status'];
    $data['id']=$variety['id'];

    //for rnd code
    $table_heads['rnd_code']='rnd_code';
    $data['rnd_code']['normal']=$data['rnd_code']['replica']=System_helper::get_rnd_code($variety);

    $table_heads['germination']='germination';
    $data['germination']['normal']=$data['germination']['replica']=$this->lang->line('NOT_SET');
    if(is_array($info)&& !empty($info['normal']['germination']))
    {
        $data['germination']['normal']=$info['normal']['germination'];
    }
    if($variety['replica_status']==1)
    {
        if(is_array($info)&& !empty($info['replica']['germination']))
        {
            $data['germination']['replica']=$info['replica']['germination'];
        }
    }

    $table_heads['plant_vigor']='plant_vigor';
    $data['plant_vigor']['normal']=$data['plant_vigor']['replica']=$this->lang->line('NOT_SET');
    if(is_array($info)&& !empty($info['normal']['plant_vigor']))
    {
        $data['plant_vigor']['normal']=$plant_vigor_config[$info['normal']['plant_vigor']];
    }
    if($variety['replica_status']==1)
    {
        if(is_array($info)&& !empty($info['replica']['plant_vigor']))
        {
            $data['plant_vigor']['replica']=$plant_vigor_config[$info['replica']['plant_vigor']];
        }
    }
    if($options['first_curd_formation']==1)
    {
        $table_heads['first_curd_formation']='first_curd_formation';
        $data['first_curd_formation']['normal']=$data['first_curd_formation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($flower_info)&& !empty($flower_info['normal']['1st_curd_formation']))
        {
            $data['first_curd_formation']['normal']=$flower_info['normal']['1st_curd_formation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($flower_info)&& !empty($flower_info['replica']['1st_curd_formation']))
            {
                $data['first_curd_formation']['replica']=$flower_info['replica']['1st_curd_formation'];
            }
        }
    }

    if($options['first_head_formation']==1)
    {
        $table_heads['first_head_formation']='first_head_formation';
        $data['first_head_formation']['normal']=$data['first_head_formation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($flower_info)&& !empty($flower_info['normal']['1st_head_formation']))
        {
            $data['first_head_formation']['normal']=$flower_info['normal']['1st_head_formation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($flower_info)&& !empty($flower_info['replica']['1st_head_formation']))
            {
                $data['first_head_formation']['replica']=$flower_info['replica']['1st_head_formation'];
            }
        }
    }
    if($options['first_flow']==1)
    {
        $table_heads['first_flow']='first_flow';
        $data['first_flow']['normal']=$data['first_flow']['replica']=$this->lang->line('NOT_SET');
        if(is_array($flower_info)&& !empty($flower_info['normal']['1st_flowering_days']))
        {
            $data['first_flow']['normal']=$flower_info['normal']['1st_flowering_days'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($flower_info)&& !empty($flower_info['replica']['1st_flowering_days']))
            {
                $data['first_flow']['replica']=$flower_info['replica']['1st_flowering_days'];
            }
        }
    }
    if($options['first_root']==1)
    {
        $table_heads['first_root']='first_root';
        $data['first_root']['normal']=$data['first_root']['replica']=$this->lang->line('NOT_SET');
        if(is_array($flower_info)&& !empty($flower_info['normal']['1st_root_formation']))
        {
            $data['first_root']['normal']=$flower_info['normal']['1st_root_formation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($flower_info)&& !empty($flower_info['replica']['1st_root_formation']))
            {
                $data['first_root']['replica']=$flower_info['replica']['1st_root_formation'];
            }
        }
    }
    if($options['first_cutting']==1)
    {
        $table_heads['first_cutting']='first_cutting';
        $data['first_cutting']['normal']=$data['first_cutting']['replica']=$this->lang->line('NOT_SET');
        if(isset($harvest[$variety['id']]))
        {
            $first_info=json_decode($harvest[$variety['id']][1],true);
            $first_harvest_time=System_helper::get_time($first_info['normal']['harvesting_date']);
            if($first_harvest_time>0)
            {
                $data['first_cutting']['normal']=$data['first_cutting']['replica']=($first_harvest_time-$delivery_and_sowing_info['sowing_date'])/(3600*24);
            }

        }
    }
    if($options['last_cutting']==1)
    {
        $table_heads['last_cutting']='last_cutting';
        $data['last_cutting']['normal']=$data['last_cutting']['replica']=$this->lang->line('NOT_SET');
        if(isset($harvest[$variety['id']]))
        {
            $total_harvest=sizeof($harvest[$variety['id']]);
            $last_info=json_decode($harvest[$variety['id']][$total_harvest],true);
            $last_harvest_time=System_helper::get_time($last_info['normal']['harvesting_date']);
            if($last_harvest_time>0)
            {
                $data['last_cutting']['normal']=$data['last_cutting']['replica']=($last_harvest_time-$delivery_and_sowing_info['sowing_date'])/(3600*24);
            }

        }
    }
    if($options['no_of_cutting']==1)
    {
        $table_heads['no_of_cutting']='no_of_cutting';
        $data['no_of_cutting']['normal']=$data['no_of_cutting']['replica']=$this->lang->line('NOT_SET');
        if(isset($harvest[$variety['id']]))
        {
            $total_harvest=sizeof($harvest[$variety['id']]);
            $data['no_of_cutting']['normal']=$data['no_of_cutting']['replica']=$total_harvest;
        }
    }
    if($options['fifty_percent_curd_formation']==1)
    {
        $table_heads['fifty_percent_curd_formation']='fifty_percent_curd_formation';
        $data['fifty_percent_curd_formation']['normal']=$data['fifty_percent_curd_formation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($flower_info)&& !empty($flower_info['normal']['50_percent_curd_formation_days']))
        {
            $data['fifty_percent_curd_formation']['normal']=$flower_info['normal']['50_percent_curd_formation_days'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($flower_info)&& !empty($flower_info['replica']['50_percent_curd_formation_days']))
            {
                $data['fifty_percent_curd_formation']['replica']=$info['replica']['50_percent_curd_formation_days'];
            }
        }
    }
    if($options['fifty_percent_head_formation']==1)
    {
        $table_heads['fifty_percent_head_formation']='fifty_percent_head_formation';
        $data['fifty_percent_head_formation']['normal']=$data['fifty_percent_head_formation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($flower_info)&& !empty($flower_info['normal']['50_percent_head_formation_days']))
        {
            $data['fifty_percent_head_formation']['normal']=$flower_info['normal']['50_percent_head_formation_days'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($flower_info)&& !empty($flower_info['replica']['50_percent_head_formation_days']))
            {
                $data['fifty_percent_head_formation']['replica']=$info['replica']['50_percent_head_formation_days'];
            }
        }
    }
    if($options['fifty_percent_flow']==1)
    {
        $table_heads['fifty_percent_flow']='fifty_percent_flow';
        $data['fifty_percent_flow']['normal']=$data['fifty_percent_flow']['replica']=$this->lang->line('NOT_SET');
        if(is_array($flower_info)&& !empty($flower_info['normal']['50_percent_flowering_days']))
        {
            $data['fifty_percent_flow']['normal']=$flower_info['normal']['50_percent_flowering_days'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($flower_info)&& !empty($flower_info['replica']['50_percent_flowering_days']))
            {
                $data['fifty_percent_flow']['replica']=$info['replica']['50_percent_flowering_days'];
            }
        }
    }
    if($options['fifty_percent_root']==1)
    {
        $table_heads['fifty_percent_root']='fifty_percent_root';
        $data['fifty_percent_root']['normal']=$data['fifty_percent_root']['replica']=$this->lang->line('NOT_SET');
        if(is_array($flower_info)&& !empty($flower_info['normal']['50_percent_root_formation_days']))
        {
            $data['fifty_percent_root']['normal']=$flower_info['normal']['50_percent_root_formation_days'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($flower_info)&& !empty($flower_info['replica']['50_percent_root_formation_days']))
            {
                $data['fifty_percent_root']['replica']=$info['replica']['50_percent_root_formation_days'];
            }
        }
    }
    if($options['first_harvest']==1)
    {
        $table_heads['first_harvest']='first_harvest';
        $data['first_harvest']['normal']=$data['first_harvest']['replica']=$this->lang->line('NOT_SET');
        if(isset($harvest[$variety['id']]))
        {
            $first_info=json_decode($harvest[$variety['id']][1],true);
            $first_harvest_time=System_helper::get_time($first_info['normal']['harvesting_date']);
            if($first_harvest_time>0)
            {
                $data['first_harvest']['normal']=$data['first_harvest']['replica']=($first_harvest_time-$delivery_and_sowing_info['sowing_date'])/(3600*24);
            }

        }
    }
    if($options['last_harvest']==1)
    {
        $table_heads['last_harvest']='last_harvest';
        $data['last_harvest']['normal']=$data['last_harvest']['replica']=$this->lang->line('NOT_SET');
        if(isset($harvest[$variety['id']]))
        {
            $total_harvest=sizeof($harvest[$variety['id']]);
            $last_info=json_decode($harvest[$variety['id']][$total_harvest],true);
            $last_harvest_time=System_helper::get_time($last_info['normal']['harvesting_date']);
            if($last_harvest_time>0)
            {
                $data['last_harvest']['normal']=$data['last_harvest']['replica']=($last_harvest_time-$delivery_and_sowing_info['sowing_date'])/(3600*24);
            }

        }
    }
    if($options['no_of_harvest']==1)
    {
        $table_heads['no_of_harvest']='no_of_harvest';
        $data['no_of_harvest']['normal']=$data['no_of_harvest']['replica']=$this->lang->line('NOT_SET');
        if(isset($harvest[$variety['id']]))
        {
            $total_harvest=sizeof($harvest[$variety['id']]);
            $data['no_of_harvest']['normal']=$data['no_of_harvest']['replica']=$total_harvest;
        }
    }
    if($options['curd_colour']==1)
    {
        $curd_Type_rating=$this->config->item('fc_curd_colour_'.$variety['crop_id']);
        $table_heads['curd_colour']='curd_colour';
        $data['curd_colour']['normal']=$data['curd_colour']['replica']=$this->lang->line('NOT_SET');
        if(is_array($fruit_info)&& !empty($fruit_info['normal']['curd_colour']))
        {
            $data['curd_colour']['normal']=$curd_Type_rating[$fruit_info['normal']['curd_colour']];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($fruit_info)&& !empty($fruit_info['replica']['curd_colour']))
            {
                $data['curd_colour']['replica']=$curd_Type_rating[$fruit_info['replica']['curd_colour']];
            }
        }
        $table_heads['curd_colour_evaluation']='curd_colour_evaluation';
        $data['curd_colour_evaluation']['normal']=$data['curd_colour_evaluation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($fruit_info)&& !empty($fruit_info['normal']['curd_colour_evaluation']))
        {
            $data['curd_colour_evaluation']['normal']=$fruit_info['normal']['curd_colour_evaluation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($fruit_info)&& !empty($fruit_info['replica']['curd_colour_evaluation']))
            {
                $data['curd_colour_evaluation']['replica']=$fruit_info['replica']['curd_colour_evaluation'];
            }
        }
    }
    if($options['head_colour']==1)
    {
        $curd_Type_rating=$this->config->item('fc_head_colour');
        $table_heads['head_colour']='head_colour';
        $data['head_colour']['normal']=$data['head_colour']['replica']=$this->lang->line('NOT_SET');
        if(is_array($fruit_info)&& !empty($fruit_info['normal']['head_colour']))
        {
            $data['head_colour']['normal']=$curd_Type_rating[$fruit_info['normal']['head_colour']];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($fruit_info)&& !empty($fruit_info['replica']['head_colour']))
            {
                $data['head_colour']['replica']=$curd_Type_rating[$fruit_info['replica']['head_colour']];
            }
        }

        $table_heads['head_colour_evaluation']='head_colour_evaluation';
        $data['head_colour_evaluation']['normal']=$data['head_colour_evaluation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($fruit_info)&& !empty($fruit_info['normal']['head_colour_evaluation']))
        {
            $data['head_colour_evaluation']['normal']=$fruit_info['normal']['head_colour_evaluation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($fruit_info)&& !empty($fruit_info['replica']['head_colour_evaluation']))
            {
                $data['head_colour_evaluation']['replica']=$fruit_info['replica']['head_colour_evaluation'];
            }
        }
    }
    if($options['fruit_colour']==1)
    {
        $curd_Type_rating=$this->config->item('fc_fruit_colour_'.$variety['crop_id']);
        $table_heads['fruit_colour']='fruit_colour';
        $data['fruit_colour']['normal']=$data['fruit_colour']['replica']=$this->lang->line('NOT_SET');
        if(is_array($fruit_info)&& !empty($fruit_info['normal']['fruit_colour']))
        {
            $data['fruit_colour']['normal']=$curd_Type_rating[$fruit_info['normal']['fruit_colour']];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($fruit_info)&& !empty($fruit_info['replica']['fruit_colour']))
            {
                $data['fruit_colour']['replica']=$curd_Type_rating[$fruit_info['replica']['fruit_colour']];
            }
        }
        $table_heads['fruit_colour_evaluation']='fruit_colour_evaluation';
        $data['fruit_colour_evaluation']['normal']=$data['fruit_colour_evaluation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($fruit_info)&& !empty($fruit_info['normal']['fruit_colour_evaluation']))
        {
            $data['fruit_colour_evaluation']['normal']=$fruit_info['normal']['fruit_colour_evaluation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($fruit_info)&& !empty($fruit_info['replica']['fruit_colour_evaluation']))
            {
                $data['fruit_colour_evaluation']['replica']=$fruit_info['replica']['fruit_colour_evaluation'];
            }
        }
    }
    if($options['root_colour']==1)
    {
        $curd_Type_rating=$this->config->item('fc_root_colour_'.$variety['crop_id']);
        $table_heads['root_colour']='root_colour';
        $data['root_colour']['normal']=$data['root_colour']['replica']=$this->lang->line('NOT_SET');
        if(is_array($fruit_info)&& !empty($fruit_info['normal']['root_colour']))
        {
            $data['root_colour']['normal']=$curd_Type_rating[$fruit_info['normal']['root_colour']];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($fruit_info)&& !empty($fruit_info['replica']['root_colour']))
            {
                $data['root_colour']['replica']=$curd_Type_rating[$fruit_info['replica']['root_colour']];
            }
        }
        $table_heads['root_colour_evaluation']='root_colour_evaluation';
        $data['root_colour_evaluation']['normal']=$data['root_colour_evaluation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($fruit_info)&& !empty($fruit_info['normal']['root_colour_evaluation']))
        {
            $data['root_colour_evaluation']['normal']=$fruit_info['normal']['root_colour_evaluation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($fruit_info)&& !empty($fruit_info['replica']['root_colour_evaluation']))
            {
                $data['root_colour_evaluation']['replica']=$fruit_info['replica']['root_colour_evaluation'];
            }
        }
    }
    if($options['leaf_colour']==1)
    {
        $curd_Type_rating=$this->config->item('fc_leaf_colour');
        $table_heads['leaf_colour']='leaf_colour';
        $data['leaf_colour']['normal']=$data['leaf_colour']['replica']=$this->lang->line('NOT_SET');
        if(is_array($fruit_info)&& !empty($fruit_info['normal']['leaf_colour']))
        {
            $data['leaf_colour']['normal']=$curd_Type_rating[$fruit_info['normal']['leaf_colour']];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($fruit_info)&& !empty($fruit_info['replica']['leaf_colour']))
            {
                $data['leaf_colour']['replica']=$curd_Type_rating[$fruit_info['replica']['leaf_colour']];
            }
        }
        $table_heads['leaf_colour_evaluation']='leaf_colour_evaluation';
        $data['leaf_colour_evaluation']['normal']=$data['leaf_colour_evaluation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($fruit_info)&& !empty($fruit_info['normal']['leaf_colour_evaluation']))
        {
            $data['leaf_colour_evaluation']['normal']=$fruit_info['normal']['leaf_colour_evaluation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($fruit_info)&& !empty($fruit_info['replica']['leaf_colour_evaluation']))
            {
                $data['leaf_colour_evaluation']['replica']=$fruit_info['replica']['leaf_colour_evaluation'];
            }
        }
    }
    if($options['leaf_length']==1)
    {
        $table_heads['leaf_length']='leaf_length';
        $data['leaf_length']['normal']=$data['leaf_length']['replica']=$this->lang->line('NOT_SET');
        if(is_array($fruit_info)&& !empty($fruit_info['normal']['leaf_length']))
        {
            $data['leaf_length']['normal']=$fruit_info['normal']['leaf_length'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($fruit_info)&& !empty($fruit_info['replica']['leaf_length']))
            {
                $data['leaf_length']['replica']=$fruit_info['replica']['leaf_length'];
            }
        }
        $table_heads['leaf_length_evaluation']='leaf_length_evaluation';
        $data['leaf_length_evaluation']['normal']=$data['leaf_length_evaluation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($fruit_info)&& !empty($fruit_info['normal']['leaf_length_evaluation']))
        {
            $data['leaf_length_evaluation']['normal']=$fruit_info['normal']['leaf_length_evaluation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($fruit_info)&& !empty($fruit_info['replica']['leaf_length_evaluation']))
            {
                $data['leaf_length_evaluation']['replica']=$fruit_info['replica']['leaf_length_evaluation'];
            }
        }
    }
    if($options['leaf_type']==1)
    {
        $curd_Type_rating=$this->config->item('fc_leaf_type');
        $table_heads['leaf_type']='leaf_type';
        $data['leaf_type']['normal']=$data['leaf_type']['replica']=$this->lang->line('NOT_SET');
        if(is_array($fruit_info)&& !empty($fruit_info['normal']['leaf_type']))
        {
            $data['leaf_type']['normal']=$curd_Type_rating[$fruit_info['normal']['leaf_type']];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($fruit_info)&& !empty($fruit_info['replica']['leaf_type']))
            {
                $data['leaf_type']['replica']=$curd_Type_rating[$fruit_info['replica']['leaf_type']];
            }
        }
        $table_heads['leaf_type_evaluation']='leaf_type_evaluation';
        $data['leaf_type_evaluation']['normal']=$data['leaf_type_evaluation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($fruit_info)&& !empty($fruit_info['normal']['leaf_type_evaluation']))
        {
            $data['leaf_type_evaluation']['normal']=$fruit_info['normal']['leaf_type_evaluation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($fruit_info)&& !empty($fruit_info['replica']['leaf_type_evaluation']))
            {
                $data['leaf_type_evaluation']['replica']=$fruit_info['replica']['leaf_type_evaluation'];
            }
        }
    }
    if($options['fruit_size']==1)//actually fruit_dia+dia evaluation+fruit height +fruit height evaluation
    {
        $table_heads['fruit_diameter']='fruit_diameter';
        $data['fruit_diameter']['normal']=$data['fruit_diameter']['replica']=$this->lang->line('NOT_SET');
        if(is_array($fruit_info)&& !empty($fruit_info['normal']['fruit_diameter']))
        {
            $data['fruit_diameter']['normal']=$fruit_info['normal']['fruit_diameter'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($fruit_info)&& !empty($fruit_info['replica']['fruit_diameter']))
            {
                $data['fruit_diameter']['replica']=$fruit_info['replica']['fruit_diameter'];
            }
        }
        $table_heads['fruit_diameter_evaluation']='fruit_diameter_evaluation';
        $data['fruit_diameter_evaluation']['normal']=$data['fruit_diameter_evaluation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($fruit_info)&& !empty($fruit_info['normal']['fruit_diameter_evaluation']))
        {
            $data['fruit_diameter_evaluation']['normal']=$fruit_info['normal']['fruit_diameter_evaluation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($fruit_info)&& !empty($fruit_info['replica']['fruit_diameter_evaluation']))
            {
                $data['fruit_diameter_evaluation']['replica']=$fruit_info['replica']['fruit_diameter_evaluation'];
            }
        }
        $table_heads['fruit_height']='fruit_height';
        $data['fruit_height']['normal']=$data['fruit_height']['replica']=$this->lang->line('NOT_SET');
        if(is_array($fruit_info)&& !empty($fruit_info['normal']['fruit_height']))
        {
            $data['fruit_height']['normal']=$fruit_info['normal']['fruit_height'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($fruit_info)&& !empty($fruit_info['replica']['fruit_height']))
            {
                $data['fruit_height']['replica']=$fruit_info['replica']['fruit_height'];
            }
        }
        $table_heads['fruit_height_evaluation']='fruit_height_evaluation';
        $data['fruit_height_evaluation']['normal']=$data['fruit_height_evaluation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($fruit_info)&& !empty($fruit_info['normal']['fruit_height_evaluation']))
        {
            $data['fruit_height_evaluation']['normal']=$fruit_info['normal']['fruit_height_evaluation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($fruit_info)&& !empty($fruit_info['replica']['fruit_height_evaluation']))
            {
                $data['fruit_height_evaluation']['replica']=$fruit_info['replica']['fruit_height_evaluation'];
            }
        }
    }
    if($options['root_size']==1)//actually root_dia+dia evaluation+root height +root height evaluation
    {
        $table_heads['root_diameter']='root_diameter';
        $data['root_diameter']['normal']=$data['root_diameter']['replica']=$this->lang->line('NOT_SET');
        if(is_array($fruit_info)&& !empty($fruit_info['normal']['root_diameter']))
        {
            $data['root_diameter']['normal']=$fruit_info['normal']['root_diameter'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($fruit_info)&& !empty($fruit_info['replica']['root_diameter']))
            {
                $data['root_diameter']['replica']=$fruit_info['replica']['root_diameter'];
            }
        }
        $table_heads['root_diameter_evaluation']='root_diameter_evaluation';
        $data['root_diameter_evaluation']['normal']=$data['root_diameter_evaluation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($fruit_info)&& !empty($fruit_info['normal']['root_diameter_evaluation']))
        {
            $data['root_diameter_evaluation']['normal']=$fruit_info['normal']['root_diameter_evaluation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($fruit_info)&& !empty($fruit_info['replica']['root_diameter_evaluation']))
            {
                $data['root_diameter_evaluation']['replica']=$fruit_info['replica']['root_diameter_evaluation'];
            }
        }
        $table_heads['root_height']='root_height';
        $data['root_height']['normal']=$data['root_height']['replica']=$this->lang->line('NOT_SET');
        if(is_array($fruit_info)&& !empty($fruit_info['normal']['root_height']))
        {
            $data['root_height']['normal']=$fruit_info['normal']['root_height'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($fruit_info)&& !empty($fruit_info['replica']['root_height']))
            {
                $data['root_height']['replica']=$fruit_info['replica']['root_height'];
            }
        }
        $table_heads['root_height_evaluation']='root_height_evaluation';
        $data['root_height_evaluation']['normal']=$data['root_height_evaluation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($fruit_info)&& !empty($fruit_info['normal']['root_height_evaluation']))
        {
            $data['root_height_evaluation']['normal']=$fruit_info['normal']['root_height_evaluation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($fruit_info)&& !empty($fruit_info['replica']['root_height_evaluation']))
            {
                $data['root_height_evaluation']['replica']=$fruit_info['replica']['root_height_evaluation'];
            }
        }
    }
    if($options['curd_shape']==1)
    {
        $curd_Type_rating=$this->config->item('fc_curd_type');
        $table_heads['curd_type']='curd_type';
        $data['curd_type']['normal']=$data['curd_type']['replica']=$this->lang->line('NOT_SET');
        if(is_array($fruit_info)&& !empty($fruit_info['normal']['curd_type']))
        {
            $data['curd_type']['normal']=$curd_Type_rating[$fruit_info['normal']['curd_type']];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($fruit_info)&& !empty($fruit_info['replica']['curd_type']))
            {
                $data['curd_type']['replica']=$curd_Type_rating[$fruit_info['replica']['curd_type']];
            }
        }
        $table_heads['curd_type_evaluation']='curd_type_evaluation';
        $data['curd_type_evaluation']['normal']=$data['curd_type_evaluation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($fruit_info)&& !empty($fruit_info['normal']['curd_type_evaluation']))
        {
            $data['curd_type_evaluation']['normal']=$fruit_info['normal']['curd_type_evaluation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($fruit_info)&& !empty($fruit_info['replica']['curd_type_evaluation']))
            {
                $data['curd_type_evaluation']['replica']=$fruit_info['replica']['curd_type_evaluation'];
            }
        }
    }
    if($options['head_shape']==1)
    {
        $curd_Type_rating=$this->config->item('fc_head_type');
        $table_heads['head_type']='head_type';
        $data['head_type']['normal']=$data['head_type']['replica']=$this->lang->line('NOT_SET');
        if(is_array($fruit_info)&& !empty($fruit_info['normal']['head_type']))
        {
            $data['head_type']['normal']=$curd_Type_rating[$fruit_info['normal']['head_type']];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($fruit_info)&& !empty($fruit_info['replica']['head_type']))
            {
                $data['head_type']['replica']=$curd_Type_rating[$fruit_info['replica']['head_type']];
            }
        }
        $table_heads['head_type_evaluation']='head_type_evaluation';
        $data['head_type_evaluation']['normal']=$data['head_type_evaluation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($fruit_info)&& !empty($fruit_info['normal']['head_type_evaluation']))
        {
            $data['head_type_evaluation']['normal']=$fruit_info['normal']['head_type_evaluation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($fruit_info)&& !empty($fruit_info['replica']['head_type_evaluation']))
            {
                $data['head_type_evaluation']['replica']=$fruit_info['replica']['head_type_evaluation'];
            }
        }
    }
    if($options['fruit_shape']==1)
    {
        $curd_Type_rating=$this->config->item('fc_fruit_shape_'.$variety['crop_id']);
        $table_heads['fruit_shape']='fruit_shape';
        $data['fruit_shape']['normal']=$data['fruit_shape']['replica']=$this->lang->line('NOT_SET');
        if(is_array($fruit_info)&& !empty($fruit_info['normal']['fruit_shape']))
        {
            $data['fruit_shape']['normal']=$curd_Type_rating[$fruit_info['normal']['fruit_shape']];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($fruit_info)&& !empty($fruit_info['replica']['fruit_shape']))
            {
                $data['fruit_shape']['replica']=$curd_Type_rating[$fruit_info['replica']['fruit_shape']];
            }
        }
        $table_heads['fruit_shape_evaluation']='fruit_shape_evaluation';
        $data['fruit_shape_evaluation']['normal']=$data['fruit_shape_evaluation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($fruit_info)&& !empty($fruit_info['normal']['fruit_shape_evaluation']))
        {
            $data['fruit_shape_evaluation']['normal']=$fruit_info['normal']['fruit_shape_evaluation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($fruit_info)&& !empty($fruit_info['replica']['fruit_shape_evaluation']))
            {
                $data['fruit_shape_evaluation']['replica']=$fruit_info['replica']['fruit_shape_evaluation'];
            }
        }
    }
    if($options['root_shape']==1)
    {
        $curd_Type_rating=$this->config->item('fc_root_shape');
        $table_heads['root_shape']='root_shape';
        $data['root_shape']['normal']=$data['root_shape']['replica']=$this->lang->line('NOT_SET');
        if(is_array($fruit_info)&& !empty($fruit_info['normal']['root_shape']))
        {
            $data['root_shape']['normal']=$curd_Type_rating[$fruit_info['normal']['root_shape']];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($fruit_info)&& !empty($fruit_info['replica']['root_shape']))
            {
                $data['root_shape']['replica']=$curd_Type_rating[$fruit_info['replica']['root_shape']];
            }
        }
        $table_heads['root_shape_evaluation']='root_shape_evaluation';
        $data['root_shape_evaluation']['normal']=$data['root_shape_evaluation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($fruit_info)&& !empty($fruit_info['normal']['root_shape_evaluation']))
        {
            $data['root_shape_evaluation']['normal']=$fruit_info['normal']['root_shape_evaluation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($fruit_info)&& !empty($fruit_info['replica']['root_shape_evaluation']))
            {
                $data['root_shape_evaluation']['replica']=$fruit_info['replica']['root_shape_evaluation'];
            }
        }
    }
    if($options['curd_diam']==1)
    {
        $table_heads['curd_diameter']='curd_diameter';
        $data['curd_diameter']['normal']=$data['curd_diameter']['replica']=$this->lang->line('NOT_SET');
        if(is_array($fruit_info)&& !empty($fruit_info['normal']['curd_diameter']))
        {
            $data['curd_diameter']['normal']=$fruit_info['normal']['curd_diameter'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($fruit_info)&& !empty($fruit_info['replica']['curd_diameter']))
            {
                $data['curd_diameter']['replica']=$fruit_info['replica']['curd_diameter'];
            }
        }
        $table_heads['curd_diameter_evaluation']='curd_diameter_evaluation';
        $data['curd_diameter_evaluation']['normal']=$data['curd_diameter_evaluation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($fruit_info)&& !empty($fruit_info['normal']['curd_diameter_evaluation']))
        {
            $data['curd_diameter_evaluation']['normal']=$fruit_info['normal']['curd_diameter_evaluation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($fruit_info)&& !empty($fruit_info['replica']['curd_diameter_evaluation']))
            {
                $data['curd_diameter_evaluation']['replica']=$fruit_info['replica']['curd_diameter_evaluation'];
            }
        }
    }
    if($options['head_diam']==1)
    {
        $table_heads['head_diameter']='head_diameter';
        $data['head_diameter']['normal']=$data['head_diameter']['replica']=$this->lang->line('NOT_SET');
        if(is_array($fruit_info)&& !empty($fruit_info['normal']['head_diameter']))
        {
            $data['head_diameter']['normal']=$fruit_info['normal']['head_diameter'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($fruit_info)&& !empty($fruit_info['replica']['head_diameter']))
            {
                $data['head_diameter']['replica']=$fruit_info['replica']['head_diameter'];
            }
        }
        $table_heads['head_diameter_evaluation']='head_diameter_evaluation';
        $data['head_diameter_evaluation']['normal']=$data['head_diameter_evaluation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($fruit_info)&& !empty($fruit_info['normal']['head_diameter_evaluation']))
        {
            $data['head_diameter_evaluation']['normal']=$fruit_info['normal']['head_diameter_evaluation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($fruit_info)&& !empty($fruit_info['replica']['head_diameter_evaluation']))
            {
                $data['head_diameter_evaluation']['replica']=$fruit_info['replica']['head_diameter_evaluation'];
            }
        }
    }

    $table_heads['accepted']='accepted';
    $data['accepted']['normal']=$data['accepted']['replica']=$this->lang->line('NOT_SET');
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


    $table_heads['remarks']='remarks';
    $data['remarks']['normal']=$data['remarks']['replica']=$this->lang->line('NOT_SET');
    if(is_array($info)&& !empty($info['normal']['remarks']))
    {
        $data['remarks']['normal']=$data['remarks']['replica']=$info['normal']['remarks'];
    }



    //for ranking
    $table_heads['ranking']='ranking';
    $data['ranking']['normal']=$data['ranking']['replica']='';
    if(isset($final[$variety['id']]['ranking']))
    {
        $data['ranking']['normal']=$data['ranking']['replica']=$final[$variety['id']]['ranking'];
    }
    //ranking finished
    $table_heads['trial_status']='trial_status';
    $data['trial_status']['normal']=$data['trial_status']['replica']=$this->lang->line('NOT_SET');
    if(isset($final[$variety['id']]['trial_status']))
    {
        $data['trial_status']['normal']=$data['trial_status']['replica']=$trial_status_config[$final[$variety['id']]['trial_status']];
    }

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
            <thead class="">
            <tr>
                <th><?php echo $this->lang->line("SL"); ?></th>
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