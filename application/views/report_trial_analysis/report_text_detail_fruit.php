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
//print_r($fruit);
//echo "</pre>";
//echo "<pre>";
//print_r($delivery_and_sowing_info);
//echo "</pre>";
$this->config->load('fruit_config');
$this->lang->load('rnd_fruit');
$table_heads=array();
$final_varieties=array();
foreach($varieties as $variety)
{
    $info=array();
    if(isset($fruit[$variety['id']]['info']))
    {
        $info=json_decode($fruit[$variety['id']]['info'],true);
    }

    $data=array();
    $data['replica_status']=$variety['replica_status'];
    $data['id']=$variety['id'];

    //for rnd code
    $table_heads['rnd_code']='rnd_code';
    $data['rnd_code']['normal']=$data['rnd_code']['replica']=System_helper::get_rnd_code($variety);

    if($options['fruit_size']==1)
    {
        $curd_Type_rating=$this->config->item('fc_fruit_size');
        $table_heads['fruit_size']='fruit_size';
        $data['fruit_size']['normal']=$data['fruit_size']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['fruit_size']))
        {
            $data['fruit_size']['normal']=$curd_Type_rating[$info['normal']['fruit_size']];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['fruit_size']))
            {
                $data['fruit_size']['replica']=$curd_Type_rating[$info['replica']['fruit_size']];
            }
        }
    }

    if($options['fruit_size_evaluation']==1)
    {
        $table_heads['fruit_size_evaluation']='fruit_size_evaluation';
        $data['fruit_size_evaluation']['normal']=$data['fruit_size_evaluation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['fruit_size_evaluation']))
        {
            $data['fruit_size_evaluation']['normal']=$info['normal']['fruit_size_evaluation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['fruit_size_evaluation']))
            {
                $data['fruit_size_evaluation']['replica']=$info['replica']['fruit_size_evaluation'];
            }
        }
    }

    if($options['fruit_shape']==1)
    {
        $curd_Type_rating=$this->config->item('fc_fruit_shape_'.$variety['crop_id']);
        $table_heads['fruit_shape']='fruit_shape';
        $data['fruit_shape']['normal']=$data['fruit_shape']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['fruit_shape']))
        {
            $data['fruit_shape']['normal']=$curd_Type_rating[$info['normal']['fruit_shape']];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['fruit_shape']))
            {
                $data['fruit_shape']['replica']=$curd_Type_rating[$info['replica']['fruit_shape']];
            }
        }
    }

    if($options['root_shape']==1)
    {
        $curd_Type_rating=$this->config->item('fc_root_shape');
        $table_heads['root_shape']='root_shape';
        $data['root_shape']['normal']=$data['root_shape']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['root_shape']))
        {
            $data['root_shape']['normal']=$curd_Type_rating[$info['normal']['root_shape']];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['root_shape']))
            {
                $data['root_shape']['replica']=$curd_Type_rating[$info['replica']['root_shape']];
            }
        }
    }

    if($options['fruit_shape_evaluation']==1)
    {
        $table_heads['fruit_shape_evaluation']='fruit_shape_evaluation';
        $data['fruit_shape_evaluation']['normal']=$data['fruit_shape_evaluation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['fruit_shape_evaluation']))
        {
            $data['fruit_shape_evaluation']['normal']=$info['normal']['fruit_shape_evaluation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['fruit_shape_evaluation']))
            {
                $data['fruit_shape_evaluation']['replica']=$info['replica']['fruit_shape_evaluation'];
            }
        }
    }

    if($options['root_shape_evaluation']==1)
    {
        $table_heads['root_shape_evaluation']='root_shape_evaluation';
        $data['root_shape_evaluation']['normal']=$data['root_shape_evaluation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['root_shape_evaluation']))
        {
            $data['root_shape_evaluation']['normal']=$info['normal']['root_shape_evaluation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['root_shape_evaluation']))
            {
                $data['root_shape_evaluation']['replica']=$info['replica']['root_shape_evaluation'];
            }
        }
    }

    if($options['fruit_colour']==1)
    {
        $curd_Type_rating=$this->config->item('fc_fruit_colour_'.$variety['crop_id']);
        $table_heads['fruit_colour']='fruit_colour';
        $data['fruit_colour']['normal']=$data['fruit_colour']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['fruit_colour']))
        {
            $data['fruit_colour']['normal']=$curd_Type_rating[$info['normal']['fruit_colour']];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['fruit_colour']))
            {
                $data['fruit_colour']['replica']=$curd_Type_rating[$info['replica']['fruit_colour']];
            }
        }
    }

    if($options['curd_colour']==1)
    {
        $curd_Type_rating=$this->config->item('fc_curd_colour_'.$variety['crop_id']);
        $table_heads['curd_colour']='curd_colour';
        $data['curd_colour']['normal']=$data['curd_colour']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['curd_colour']))
        {
            $data['curd_colour']['normal']=$curd_Type_rating[$info['normal']['curd_colour']];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['curd_colour']))
            {
                $data['curd_colour']['replica']=$curd_Type_rating[$info['replica']['curd_colour']];
            }
        }
    }

    if($options['head_colour']==1)
    {
        $curd_Type_rating=$this->config->item('fc_head_colour');
        $table_heads['head_colour']='head_colour';
        $data['head_colour']['normal']=$data['head_colour']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['head_colour']))
        {
            $data['head_colour']['normal']=$curd_Type_rating[$info['normal']['head_colour']];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['head_colour']))
            {
                $data['head_colour']['replica']=$curd_Type_rating[$info['replica']['head_colour']];
            }
        }
    }

    if($options['leaf_colour']==1)
    {
        $curd_Type_rating=$this->config->item('fc_leaf_colour');
        $table_heads['leaf_colour']='leaf_colour';
        $data['leaf_colour']['normal']=$data['leaf_colour']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['leaf_colour']))
        {
            $data['leaf_colour']['normal']=$curd_Type_rating[$info['normal']['leaf_colour']];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['leaf_colour']))
            {
                $data['leaf_colour']['replica']=$curd_Type_rating[$info['replica']['leaf_colour']];
            }
        }
    }

    if($options['root_colour']==1)
    {
        $curd_Type_rating=$this->config->item('fc_root_colour_'.$variety['crop_id']);
        $table_heads['root_colour']='root_colour';
        $data['root_colour']['normal']=$data['root_colour']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['root_colour']))
        {
            $data['root_colour']['normal']=$curd_Type_rating[$info['normal']['root_colour']];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['root_colour']))
            {
                $data['root_colour']['replica']=$curd_Type_rating[$info['replica']['root_colour']];
            }
        }
    }

    if($options['fruit_colour_evaluation']==1)
    {
        $table_heads['fruit_colour_evaluation']='fruit_colour_evaluation';
        $data['fruit_colour_evaluation']['normal']=$data['fruit_colour_evaluation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['fruit_colour_evaluation']))
        {
            $data['fruit_colour_evaluation']['normal']=$info['normal']['fruit_colour_evaluation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['fruit_colour_evaluation']))
            {
                $data['fruit_colour_evaluation']['replica']=$info['replica']['fruit_colour_evaluation'];
            }
        }
    }

    if($options['curd_colour_evaluation']==1)
    {
        $table_heads['curd_colour_evaluation']='curd_colour_evaluation';
        $data['curd_colour_evaluation']['normal']=$data['curd_colour_evaluation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['curd_colour_evaluation']))
        {
            $data['curd_colour_evaluation']['normal']=$info['normal']['curd_colour_evaluation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['curd_colour_evaluation']))
            {
                $data['curd_colour_evaluation']['replica']=$info['replica']['curd_colour_evaluation'];
            }
        }
    }

    if($options['head_colour_evaluation']==1)
    {
        $table_heads['head_colour_evaluation']='head_colour_evaluation';
        $data['head_colour_evaluation']['normal']=$data['head_colour_evaluation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['head_colour_evaluation']))
        {
            $data['head_colour_evaluation']['normal']=$info['normal']['head_colour_evaluation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['head_colour_evaluation']))
            {
                $data['head_colour_evaluation']['replica']=$info['replica']['head_colour_evaluation'];
            }
        }
    }

    if($options['leaf_colour_evaluation']==1)
    {
        $table_heads['leaf_colour_evaluation']='leaf_colour_evaluation';
        $data['leaf_colour_evaluation']['normal']=$data['leaf_colour_evaluation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['leaf_colour_evaluation']))
        {
            $data['leaf_colour_evaluation']['normal']=$info['normal']['leaf_colour_evaluation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['leaf_colour_evaluation']))
            {
                $data['leaf_colour_evaluation']['replica']=$info['replica']['leaf_colour_evaluation'];
            }
        }
    }

    if($options['root_colour_evaluation']==1)
    {
        $table_heads['root_colour_evaluation']='root_colour_evaluation';
        $data['root_colour_evaluation']['normal']=$data['root_colour_evaluation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['root_colour_evaluation']))
        {
            $data['root_colour_evaluation']['normal']=$info['normal']['root_colour_evaluation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['root_colour_evaluation']))
            {
                $data['root_colour_evaluation']['replica']=$info['replica']['root_colour_evaluation'];
            }
        }
    }

    if($options['targeted_weight']==1)
    {
        $table_heads['targeted_weight']='targeted_weight';
        $data['targeted_weight']['normal']=$data['targeted_weight']['replica']=$variety['terget_weight'];

    }

    if($options['fruit_weight']==1)
    {
        $table_heads['fruit_weight']='fruit_weight';
        $data['fruit_weight']['normal']=$data['fruit_weight']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['fruit_weight']))
        {
            $data['fruit_weight']['normal']=$info['normal']['fruit_weight'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['fruit_weight']))
            {
                $data['fruit_weight']['replica']=$info['replica']['fruit_weight'];
            }
        }
    }

    if($options['curd_weight']==1)
    {
        $table_heads['curd_weight']='curd_weight';
        $data['curd_weight']['normal']=$data['curd_weight']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['curd_weight']))
        {
            $data['curd_weight']['normal']=$info['normal']['curd_weight'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['curd_weight']))
            {
                $data['curd_weight']['replica']=$info['replica']['curd_weight'];
            }
        }
    }


    if($options['head_weight']==1)
    {
        $table_heads['head_weight']='head_weight';
        $data['head_weight']['normal']=$data['head_weight']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['head_weight']))
        {
            $data['head_weight']['normal']=$info['normal']['head_weight'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['head_weight']))
            {
                $data['head_weight']['replica']=$info['replica']['head_weight'];
            }
        }
    }

    if($options['root_weight']==1)
    {
        $table_heads['root_weight']='root_weight';
        $data['root_weight']['normal']=$data['root_weight']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['root_weight']))
        {
            $data['root_weight']['normal']=$info['normal']['root_weight'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['root_weight']))
            {
                $data['root_weight']['replica']=$info['replica']['root_weight'];
            }
        }
    }

    if($options['fruit_weight_evaluation']==1)
    {
        $table_heads['fruit_weight_evaluation']='fruit_weight_evaluation';
        $data['fruit_weight_evaluation']['normal']=$data['fruit_weight_evaluation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['fruit_weight_evaluation']))
        {
            $data['fruit_weight_evaluation']['normal']=$info['normal']['fruit_weight_evaluation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['fruit_weight_evaluation']))
            {
                $data['fruit_weight_evaluation']['replica']=$info['replica']['fruit_weight_evaluation'];
            }
        }
    }

    if($options['curd_weight_evaluation']==1)
    {
        $table_heads['curd_weight_evaluation']='curd_weight_evaluation';
        $data['curd_weight_evaluation']['normal']=$data['curd_weight_evaluation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['curd_weight_evaluation']))
        {
            $data['curd_weight_evaluation']['normal']=$info['normal']['curd_weight_evaluation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['curd_weight_evaluation']))
            {
                $data['curd_weight_evaluation']['replica']=$info['replica']['curd_weight_evaluation'];
            }
        }
    }

    if($options['head_weight_evaluation']==1)
    {
        $table_heads['head_weight_evaluation']='head_weight_evaluation';
        $data['head_weight_evaluation']['normal']=$data['head_weight_evaluation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['head_weight_evaluation']))
        {
            $data['head_weight_evaluation']['normal']=$info['normal']['head_weight_evaluation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['head_weight_evaluation']))
            {
                $data['head_weight_evaluation']['replica']=$info['replica']['head_weight_evaluation'];
            }
        }
    }

    if($options['root_weight_evaluation']==1)
    {
        $table_heads['root_weight_evaluation']='root_weight_evaluation';
        $data['root_weight_evaluation']['normal']=$data['root_weight_evaluation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['root_weight_evaluation']))
        {
            $data['root_weight_evaluation']['normal']=$info['normal']['root_weight_evaluation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['root_weight_evaluation']))
            {
                $data['root_weight_evaluation']['replica']=$info['replica']['root_weight_evaluation'];
            }
        }
    }

    if($options['fruit_diameter']==1)
    {
        $table_heads['fruit_diameter']='fruit_diameter';
        $data['fruit_diameter']['normal']=$data['fruit_diameter']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['fruit_diameter']))
        {
            $data['fruit_diameter']['normal']=$info['normal']['fruit_diameter'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['fruit_diameter']))
            {
                $data['fruit_diameter']['replica']=$info['replica']['fruit_diameter'];
            }
        }
    }

    if($options['curd_diameter']==1)
    {
        $table_heads['curd_diameter']='curd_diameter';
        $data['curd_diameter']['normal']=$data['curd_diameter']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['curd_diameter']))
        {
            $data['curd_diameter']['normal']=$info['normal']['curd_diameter'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['curd_diameter']))
            {
                $data['curd_diameter']['replica']=$info['replica']['curd_diameter'];
            }
        }
    }

    if($options['head_diameter']==1)
    {
        $table_heads['head_diameter']='head_diameter';
        $data['head_diameter']['normal']=$data['head_diameter']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['head_diameter']))
        {
            $data['head_diameter']['normal']=$info['normal']['head_diameter'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['head_diameter']))
            {
                $data['head_diameter']['replica']=$info['replica']['head_diameter'];
            }
        }
    }

    if($options['root_diameter']==1)
    {
        $table_heads['root_diameter']='root_diameter';
        $data['root_diameter']['normal']=$data['root_diameter']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['root_diameter']))
        {
            $data['root_diameter']['normal']=$info['normal']['root_diameter'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['root_diameter']))
            {
                $data['root_diameter']['replica']=$info['replica']['root_diameter'];
            }
        }
    }

    if($options['fruit_diameter_evaluation']==1)
    {
        $table_heads['fruit_diameter_evaluation']='fruit_diameter_evaluation';
        $data['fruit_diameter_evaluation']['normal']=$data['fruit_diameter_evaluation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['fruit_diameter_evaluation']))
        {
            $data['fruit_diameter_evaluation']['normal']=$info['normal']['fruit_diameter_evaluation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['fruit_diameter_evaluation']))
            {
                $data['fruit_diameter_evaluation']['replica']=$info['replica']['fruit_diameter_evaluation'];
            }
        }
    }

    if($options['curd_diameter_evaluation']==1)
    {
        $table_heads['curd_diameter_evaluation']='curd_diameter_evaluation';
        $data['curd_diameter_evaluation']['normal']=$data['curd_diameter_evaluation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['curd_diameter_evaluation']))
        {
            $data['curd_diameter_evaluation']['normal']=$info['normal']['curd_diameter_evaluation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['curd_diameter_evaluation']))
            {
                $data['curd_diameter_evaluation']['replica']=$info['replica']['curd_diameter_evaluation'];
            }
        }
    }

    if($options['head_diameter_evaluation']==1)
    {
        $table_heads['head_diameter_evaluation']='head_diameter_evaluation';
        $data['head_diameter_evaluation']['normal']=$data['head_diameter_evaluation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['head_diameter_evaluation']))
        {
            $data['head_diameter_evaluation']['normal']=$info['normal']['head_diameter_evaluation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['head_diameter_evaluation']))
            {
                $data['head_diameter_evaluation']['replica']=$info['replica']['head_diameter_evaluation'];
            }
        }
    }

    if($options['root_diameter_evaluation']==1)
    {
        $table_heads['root_diameter_evaluation']='root_diameter_evaluation';
        $data['root_diameter_evaluation']['normal']=$data['root_diameter_evaluation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['root_diameter_evaluation']))
        {
            $data['root_diameter_evaluation']['normal']=$info['normal']['root_diameter_evaluation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['root_diameter_evaluation']))
            {
                $data['root_diameter_evaluation']['replica']=$info['replica']['root_diameter_evaluation'];
            }
        }
    }

    if($options['targeted_height']==1)
    {
        $table_heads['targeted_height']='targeted_height';
        $data['targeted_height']['normal']=$data['targeted_height']['replica']=$variety['terget_length'];

    }

    if($options['targeted_root_height']==1)
    {
        $table_heads['targeted_root_height']='targeted_root_height';
        $data['targeted_root_height']['normal']=$data['targeted_root_height']['replica']=$variety['targeted_root_height'];

    }

    if($options['fruit_height']==1)
    {
        $table_heads['fruit_height']='fruit_height';
        $data['fruit_height']['normal']=$data['fruit_height']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['fruit_height']))
        {
            $data['fruit_height']['normal']=$info['normal']['fruit_height'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['fruit_height']))
            {
                $data['fruit_height']['replica']=$info['replica']['fruit_height'];
            }
        }
    }
    if($options['fruit_length']==1)
    {
        $table_heads['fruit_length']='fruit_length';
        $data['fruit_length']['normal']=$data['fruit_length']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['fruit_length']))
        {
            $data['fruit_length']['normal']=$info['normal']['fruit_length'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['fruit_length']))
            {
                $data['fruit_length']['replica']=$info['replica']['fruit_length'];
            }
        }
    }


    if($options['curd_height']==1)
    {
        $table_heads['curd_height']='curd_height';
        $data['curd_height']['normal']=$data['curd_height']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['curd_height']))
        {
            $data['curd_height']['normal']=$info['normal']['curd_height'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['curd_height']))
            {
                $data['curd_height']['replica']=$info['replica']['curd_height'];
            }
        }
    }

    if($options['head_height']==1)
    {
        $table_heads['head_height']='head_height';
        $data['head_height']['normal']=$data['head_height']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['head_height']))
        {
            $data['head_height']['normal']=$info['normal']['head_height'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['head_height']))
            {
                $data['head_height']['replica']=$info['replica']['head_height'];
            }
        }
    }


    if($options['leaf_length']==1)
    {
        $table_heads['leaf_length']='leaf_length';
        $data['leaf_length']['normal']=$data['leaf_length']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['leaf_length']))
        {
            $data['leaf_length']['normal']=$info['normal']['leaf_length'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['leaf_length']))
            {
                $data['leaf_length']['replica']=$info['replica']['leaf_length'];
            }
        }
    }

    if($options['root_height']==1)
    {
        $table_heads['root_height']='root_height';
        $data['root_height']['normal']=$data['root_height']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['root_height']))
        {
            $data['root_height']['normal']=$info['normal']['root_height'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['root_height']))
            {
                $data['root_height']['replica']=$info['replica']['root_height'];
            }
        }
    }

    if($options['fruit_height_evaluation']==1)
    {
        $table_heads['fruit_height_evaluation']='fruit_height_evaluation';
        $data['fruit_height_evaluation']['normal']=$data['fruit_height_evaluation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['fruit_height_evaluation']))
        {
            $data['fruit_height_evaluation']['normal']=$info['normal']['fruit_height_evaluation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['fruit_height_evaluation']))
            {
                $data['fruit_height_evaluation']['replica']=$info['replica']['fruit_height_evaluation'];
            }
        }
    }

    if($options['curd_height_evaluation']==1)
    {
        $table_heads['curd_height_evaluation']='curd_height_evaluation';
        $data['curd_height_evaluation']['normal']=$data['curd_height_evaluation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['curd_height_evaluation']))
        {
            $data['curd_height_evaluation']['normal']=$info['normal']['curd_height_evaluation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['curd_height_evaluation']))
            {
                $data['curd_height_evaluation']['replica']=$info['replica']['curd_height_evaluation'];
            }
        }
    }

    if($options['head_height_evaluation']==1)
    {
        $table_heads['head_height_evaluation']='head_height_evaluation';
        $data['head_height_evaluation']['normal']=$data['head_height_evaluation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['head_height_evaluation']))
        {
            $data['head_height_evaluation']['normal']=$info['normal']['head_height_evaluation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['head_height_evaluation']))
            {
                $data['head_height_evaluation']['replica']=$info['replica']['head_height_evaluation'];
            }
        }
    }

    if($options['leaf_length_evaluation']==1)
    {
        $table_heads['leaf_length_evaluation']='leaf_length_evaluation';
        $data['leaf_length_evaluation']['normal']=$data['leaf_length_evaluation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['leaf_length_evaluation']))
        {
            $data['leaf_length_evaluation']['normal']=$info['normal']['leaf_length_evaluation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['leaf_length_evaluation']))
            {
                $data['leaf_length_evaluation']['replica']=$info['replica']['leaf_length_evaluation'];
            }
        }
    }

    if($options['root_height_evaluation']==1)
    {
        $table_heads['root_height_evaluation']='root_height_evaluation';
        $data['root_height_evaluation']['normal']=$data['root_height_evaluation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['root_height_evaluation']))
        {
            $data['root_height_evaluation']['normal']=$info['normal']['root_height_evaluation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['root_height_evaluation']))
            {
                $data['root_height_evaluation']['replica']=$info['replica']['root_height_evaluation'];
            }
        }
    }

    if($options['fruit_firmness']==1)
    {
        $table_heads['fruit_firmness']='fruit_firmness';
        $data['fruit_firmness']['normal']=$data['fruit_firmness']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['fruit_firmness']))
        {
            $data['fruit_firmness']['normal']=$info['normal']['fruit_firmness'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['fruit_firmness']))
            {
                $data['fruit_firmness']['replica']=$info['replica']['fruit_firmness'];
            }
        }
    }

    if($options['fruit_taste']==1)
    {
        $curd_Type_rating=$this->config->item('fc_fruit_taste');
        $table_heads['fruit_taste']='fruit_taste';
        $data['fruit_taste']['normal']=$data['fruit_taste']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['fruit_taste']))
        {
            $data['fruit_taste']['normal']=$curd_Type_rating[$info['normal']['fruit_taste']];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['fruit_taste']))
            {
                $data['fruit_taste']['replica']=$curd_Type_rating[$info['replica']['fruit_taste']];
            }
        }
    }

    if($options['fruit_type']==1)
    {
        $curd_Type_rating=$this->config->item('fc_fruit_type');
        $table_heads['fruit_type']='fruit_type';
        $data['fruit_type']['normal']=$data['fruit_type']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['fruit_type']))
        {
            $data['fruit_type']['normal']=$curd_Type_rating[$info['normal']['fruit_type']];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['fruit_type']))
            {
                $data['fruit_type']['replica']=$curd_Type_rating[$info['replica']['fruit_type']];
            }
        }
    }

    if($options['curd_type']==1)
    {
        $curd_Type_rating=$this->config->item('fc_curd_type');
        $table_heads['curd_type']='curd_type';
        $data['curd_type']['normal']=$data['curd_type']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['curd_type']))
        {
            $data['curd_type']['normal']=$curd_Type_rating[$info['normal']['curd_type']];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['curd_type']))
            {
                $data['curd_type']['replica']=$curd_Type_rating[$info['replica']['curd_type']];
            }
        }
    }

    if($options['head_type']==1)
    {
        $curd_Type_rating=$this->config->item('fc_head_type');
        $table_heads['head_type']='head_type';
        $data['head_type']['normal']=$data['head_type']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['head_type']))
        {
            $data['head_type']['normal']=$curd_Type_rating[$info['normal']['head_type']];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['head_type']))
            {
                $data['head_type']['replica']=$curd_Type_rating[$info['replica']['head_type']];
            }
        }
    }

    if($options['leaf_type']==1)
    {
        $curd_Type_rating=$this->config->item('fc_leaf_type');
        $table_heads['leaf_type']='leaf_type';
        $data['leaf_type']['normal']=$data['leaf_type']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['leaf_type']))
        {
            $data['leaf_type']['normal']=$curd_Type_rating[$info['normal']['leaf_type']];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['leaf_type']))
            {
                $data['leaf_type']['replica']=$curd_Type_rating[$info['replica']['leaf_type']];
            }
        }
    }

    if($options['fruit_type_evaluation']==1)
    {
        $table_heads['fruit_type_evaluation']='fruit_type_evaluation';
        $data['fruit_type_evaluation']['normal']=$data['fruit_type_evaluation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['fruit_type_evaluation']))
        {
            $data['fruit_type_evaluation']['normal']=$info['normal']['fruit_type_evaluation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['fruit_type_evaluation']))
            {
                $data['fruit_type_evaluation']['replica']=$info['replica']['fruit_type_evaluation'];
            }
        }
    }

    if($options['curd_type_evaluation']==1)
    {
        $table_heads['curd_type_evaluation']='curd_type_evaluation';
        $data['curd_type_evaluation']['normal']=$data['curd_type_evaluation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['curd_type_evaluation']))
        {
            $data['curd_type_evaluation']['normal']=$info['normal']['curd_type_evaluation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['curd_type_evaluation']))
            {
                $data['curd_type_evaluation']['replica']=$info['replica']['curd_type_evaluation'];
            }
        }
    }

    if($options['head_type_evaluation']==1)
    {
        $table_heads['head_type_evaluation']='head_type_evaluation';
        $data['head_type_evaluation']['normal']=$data['head_type_evaluation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['head_type_evaluation']))
        {
            $data['head_type_evaluation']['normal']=$info['normal']['head_type_evaluation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['head_type_evaluation']))
            {
                $data['head_type_evaluation']['replica']=$info['replica']['head_type_evaluation'];
            }
        }
    }

    if($options['leaf_type_evaluation']==1)
    {
        $table_heads['leaf_type_evaluation']='leaf_type_evaluation';
        $data['leaf_type_evaluation']['normal']=$data['leaf_type_evaluation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['leaf_type_evaluation']))
        {
            $data['leaf_type_evaluation']['normal']=$info['normal']['leaf_type_evaluation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['leaf_type_evaluation']))
            {
                $data['leaf_type_evaluation']['replica']=$info['replica']['leaf_type_evaluation'];
            }
        }
    }

    if($options['fruit_bearing_type']==1)
    {
        $curd_Type_rating=$this->config->item('fc_fruit_bearing_type');
        $table_heads['fruit_bearing_type']='fruit_bearing_type';
        $data['fruit_bearing_type']['normal']=$data['fruit_bearing_type']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['fruit_bearing_type']))
        {
            $data['fruit_bearing_type']['normal']=$curd_Type_rating[$info['normal']['fruit_bearing_type']];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['fruit_bearing_type']))
            {
                $data['fruit_bearing_type']['replica']=$curd_Type_rating[$info['replica']['fruit_bearing_type']];
            }
        }
    }

    if($options['fruit_bearing_type_evaluation']==1)
    {
        $table_heads['fruit_bearing_type_evaluation']='fruit_bearing_type_evaluation';
        $data['fruit_bearing_type_evaluation']['normal']=$data['fruit_bearing_type_evaluation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['fruit_bearing_type_evaluation']))
        {
            $data['fruit_bearing_type_evaluation']['normal']=$info['normal']['fruit_bearing_type_evaluation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['fruit_bearing_type_evaluation']))
            {
                $data['fruit_bearing_type_evaluation']['replica']=$info['replica']['fruit_bearing_type_evaluation'];
            }
        }
    }


    //////////////////////////////////////////////Ordering Done Above for similar fields///////////////////////////////////////////




    if($options['curd_compactness']==1)
    {
        $table_heads['curd_compactness']='curd_compactness';
        $data['curd_compactness']['normal']=$data['curd_compactness']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['curd_compactness']))
        {
            $data['curd_compactness']['normal']=$info['normal']['curd_compactness'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['curd_compactness']))
            {
                $data['curd_compactness']['replica']=$info['replica']['curd_compactness'];
            }
        }
    }


    if($options['head_compactness']==1)
    {
        $table_heads['head_compactness']='head_compactness';
        $data['head_compactness']['normal']=$data['head_compactness']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['head_compactness']))
        {
            $data['head_compactness']['normal']=$info['normal']['head_compactness'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['head_compactness']))
            {
                $data['head_compactness']['replica']=$info['replica']['head_compactness'];
            }
        }
    }

    if($options['root_above_ground']==1)
    {
        $table_heads['root_above_ground']='root_above_ground';
        $data['root_above_ground']['normal']=$data['root_above_ground']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['root_above_ground']))
        {
            $data['root_above_ground']['normal']=$info['normal']['root_above_ground'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['root_above_ground']))
            {
                $data['root_above_ground']['replica']=$info['replica']['root_above_ground'];
            }
        }
    }
    if($options['root_above_ground_evaluation']==1)
    {
        $table_heads['root_above_ground_evaluation']='root_above_ground_evaluation';
        $data['root_above_ground_evaluation']['normal']=$data['root_above_ground_evaluation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['root_above_ground_evaluation']))
        {
            $data['root_above_ground_evaluation']['normal']=$info['normal']['root_above_ground_evaluation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['root_above_ground_evaluation']))
            {
                $data['root_above_ground_evaluation']['replica']=$info['replica']['root_above_ground_evaluation'];
            }
        }
    }


    if($options['root_taste']==1)
    {
        $curd_Type_rating=$this->config->item('fc_root_taste');
        $table_heads['root_taste']='root_taste';
        $data['root_taste']['normal']=$data['root_taste']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['root_taste']))
        {
            $data['root_taste']['normal']=$curd_Type_rating[$info['normal']['root_taste']];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['root_taste']))
            {
                $data['root_taste']['replica']=$curd_Type_rating[$info['replica']['root_taste']];
            }
        }
    }

    if($options['taste']==1)
    {
        $curd_Type_rating=$this->config->item('fc_taste');
        $table_heads['taste']='taste';
        $data['taste']['normal']=$data['taste']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['taste']))
        {
            $data['taste']['normal']=$curd_Type_rating[$info['normal']['taste']];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['taste']))
            {
                $data['taste']['replica']=$curd_Type_rating[$info['replica']['taste']];
            }
        }
    }
    if($options['keeping_quality']==1)
    {
        $curd_Type_rating=$this->config->item('keeping_quality');
        $table_heads['keeping_quality']='keeping_quality';
        $data['keeping_quality']['normal']=$data['keeping_quality']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['keeping_quality']))
        {
            $data['keeping_quality']['normal']=$curd_Type_rating[$info['normal']['keeping_quality']];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['keeping_quality']))
            {
                $data['keeping_quality']['replica']=$curd_Type_rating[$info['replica']['keeping_quality']];
            }
        }
    }
    if($options['pungency']==1)
    {
        $table_heads['pungency']='pungency';
        $data['pungency']['normal']=$data['pungency']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['pungency']))
        {
            $data['pungency']['normal']=$info['normal']['pungency'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['pungency']))
            {
                $data['pungency']['replica']=$info['replica']['pungency'];
            }
        }
    }
    if($options['seed_maturity_during_harvest']==1)
    {
        $curd_Type_rating=$this->config->item('fc_seed_maturity_during_harvest');
        $table_heads['seed_maturity_during_harvest']='seed_maturity_during_harvest';
        $data['seed_maturity_during_harvest']['normal']=$data['seed_maturity_during_harvest']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['seed_maturity_during_harvest']))
        {
            $data['seed_maturity_during_harvest']['normal']=$curd_Type_rating[$info['normal']['seed_maturity_during_harvest']];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['seed_maturity_during_harvest']))
            {
                $data['seed_maturity_during_harvest']['replica']=$curd_Type_rating[$info['replica']['seed_maturity_during_harvest']];
            }
        }
    }
    if($options['seed_density']==1)
    {
        $table_heads['seed_density']='seed_density';
        $data['seed_density']['normal']=$data['seed_density']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['seed_density']))
        {
            $data['seed_density']['normal']=$info['normal']['seed_density'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['seed_density']))
            {
                $data['seed_density']['replica']=$info['replica']['seed_density'];
            }
        }
    }
    if($options['spine_type']==1)
    {
        $curd_Type_rating=$this->config->item('fc_spine_type');
        $table_heads['spine_type']='spine_type';
        $data['spine_type']['normal']=$data['spine_type']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['spine_type']))
        {
            $data['spine_type']['normal']=$curd_Type_rating[$info['normal']['spine_type']];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['spine_type']))
            {
                $data['spine_type']['replica']=$curd_Type_rating[$info['replica']['spine_type']];
            }
        }
    }
    if($options['spine_type_evaluation']==1)
    {
        $table_heads['spine_type_evaluation']='spine_type_evaluation';
        $data['spine_type_evaluation']['normal']=$data['spine_type_evaluation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['spine_type_evaluation']))
        {
            $data['spine_type_evaluation']['normal']=$info['normal']['spine_type_evaluation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['spine_type_evaluation']))
            {
                $data['spine_type_evaluation']['replica']=$info['replica']['spine_type_evaluation'];
            }
        }
    }
    if($options['hardness_of_spines']==1)
    {
        $table_heads['hardness_of_spines']='hardness_of_spines';
        $data['hardness_of_spines']['normal']=$data['hardness_of_spines']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['hardness_of_spines']))
        {
            $data['hardness_of_spines']['normal']=$info['normal']['hardness_of_spines'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['hardness_of_spines']))
            {
                $data['hardness_of_spines']['replica']=$info['replica']['hardness_of_spines'];
            }
        }
    }
    if($options['core_diameter']==1)
    {
        $table_heads['core_diameter']='core_diameter';
        $data['core_diameter']['normal']=$data['core_diameter']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['core_diameter']))
        {
            $data['core_diameter']['normal']=$info['normal']['core_diameter'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['core_diameter']))
            {
                $data['core_diameter']['replica']=$info['replica']['core_diameter'];
            }
        }
    }
    if($options['core_diameter_evaluation']==1)
    {
        $table_heads['core_diameter_evaluation']='core_diameter_evaluation';
        $data['core_diameter_evaluation']['normal']=$data['core_diameter_evaluation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['core_diameter_evaluation']))
        {
            $data['core_diameter_evaluation']['normal']=$info['normal']['core_diameter_evaluation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['core_diameter_evaluation']))
            {
                $data['core_diameter_evaluation']['replica']=$info['replica']['core_diameter_evaluation'];
            }
        }
    }
    if($options['flesh_colour']==1)
    {
        $curd_Type_rating=$this->config->item('fc_flesh_colour_'.$variety['crop_id']);
        $table_heads['flesh_colour']='flesh_colour';
        $data['flesh_colour']['normal']=$data['flesh_colour']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['flesh_colour']))
        {
            $data['flesh_colour']['normal']=$curd_Type_rating[$info['normal']['flesh_colour']];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['flesh_colour']))
            {
                $data['flesh_colour']['replica']=$curd_Type_rating[$info['replica']['flesh_colour']];
            }
        }
    }
    if($options['flesh_colour_evaluation']==1)
    {
        $table_heads['flesh_colour_evaluation']='flesh_colour_evaluation';
        $data['flesh_colour_evaluation']['normal']=$data['flesh_colour_evaluation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['flesh_colour_evaluation']))
        {
            $data['flesh_colour_evaluation']['normal']=$info['normal']['flesh_colour_evaluation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['flesh_colour_evaluation']))
            {
                $data['flesh_colour_evaluation']['replica']=$info['replica']['flesh_colour_evaluation'];
            }
        }
    }
    if($options['smoothness_of_skin']==1)
    {
        $table_heads['smoothness_of_skin']='smoothness_of_skin';
        $data['smoothness_of_skin']['normal']=$data['smoothness_of_skin']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['smoothness_of_skin']))
        {
            $data['smoothness_of_skin']['normal']=$info['normal']['smoothness_of_skin'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['smoothness_of_skin']))
            {
                $data['smoothness_of_skin']['replica']=$info['replica']['smoothness_of_skin'];
            }
        }
    }
    if($options['ridge_type']==1)
    {
        $curd_Type_rating=$this->config->item('fc_ridge_type');
        $table_heads['ridge_type']='ridge_type';
        $data['ridge_type']['normal']=$data['ridge_type']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['ridge_type']))
        {
            $data['ridge_type']['normal']=$curd_Type_rating[$info['normal']['ridge_type']];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['ridge_type']))
            {
                $data['ridge_type']['replica']=$curd_Type_rating[$info['replica']['ridge_type']];
            }
        }
    }
    if($options['ridge_strength']==1)
    {
        $table_heads['ridge_strength']='ridge_strength';
        $data['ridge_strength']['normal']=$data['ridge_strength']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['ridge_strength']))
        {
            $data['ridge_strength']['normal']=$info['normal']['ridge_strength'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['ridge_strength']))
            {
                $data['ridge_strength']['replica']=$info['replica']['ridge_strength'];
            }
        }
    }
    if($options['waxiness_of_skin']==1)
    {
        $table_heads['waxiness_of_skin']='waxiness_of_skin';
        $data['waxiness_of_skin']['normal']=$data['waxiness_of_skin']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['waxiness_of_skin']))
        {
            $data['waxiness_of_skin']['normal']=$info['normal']['waxiness_of_skin'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['waxiness_of_skin']))
            {
                $data['waxiness_of_skin']['replica']=$info['replica']['waxiness_of_skin'];
            }
        }
    }
    if($options['no_of_edges_in_fruit']==1)
    {
        $table_heads['no_of_edges_in_fruit']='no_of_edges_in_fruit';
        $data['no_of_edges_in_fruit']['normal']=$data['no_of_edges_in_fruit']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['no_of_edges_in_fruit']))
        {
            $data['no_of_edges_in_fruit']['normal']=$info['normal']['no_of_edges_in_fruit'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['no_of_edges_in_fruit']))
            {
                $data['no_of_edges_in_fruit']['replica']=$info['replica']['no_of_edges_in_fruit'];
            }
        }
    }
    if($options['no_of_edges_in_fruit_evaluation']==1)
    {
        $table_heads['no_of_edges_in_fruit_evaluation']='no_of_edges_in_fruit_evaluation';
        $data['no_of_edges_in_fruit_evaluation']['normal']=$data['no_of_edges_in_fruit_evaluation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['no_of_edges_in_fruit_evaluation']))
        {
            $data['no_of_edges_in_fruit_evaluation']['normal']=$info['normal']['no_of_edges_in_fruit_evaluation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['no_of_edges_in_fruit_evaluation']))
            {
                $data['no_of_edges_in_fruit_evaluation']['replica']=$info['replica']['no_of_edges_in_fruit_evaluation'];
            }
        }
    }
    if($options['tenderness_of_fruit']==1)
    {
        $table_heads['tenderness_of_fruit']='tenderness_of_fruit';
        $data['tenderness_of_fruit']['normal']=$data['tenderness_of_fruit']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['tenderness_of_fruit']))
        {
            $data['tenderness_of_fruit']['normal']=$info['normal']['tenderness_of_fruit'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['tenderness_of_fruit']))
            {
                $data['tenderness_of_fruit']['replica']=$info['replica']['tenderness_of_fruit'];
            }
        }
    }
    if($options['plant_height']==1)
    {
        $table_heads['plant_height']='plant_height';
        $data['plant_height']['normal']=$data['plant_height']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['plant_height']))
        {
            $data['plant_height']['normal']=$info['normal']['plant_height'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['plant_height']))
            {
                $data['plant_height']['replica']=$info['replica']['plant_height'];
            }
        }
    }
    if($options['plant_height_evaluation']==1)
    {
        $table_heads['plant_height_evaluation']='plant_height_evaluation';
        $data['plant_height_evaluation']['normal']=$data['plant_height_evaluation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['plant_height_evaluation']))
        {
            $data['plant_height_evaluation']['normal']=$info['normal']['plant_height_evaluation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['plant_height_evaluation']))
            {
                $data['plant_height_evaluation']['replica']=$info['replica']['plant_height_evaluation'];
            }
        }
    }
    if($options['brix_percent']==1)
    {
        $table_heads['brix_percent']='brix_percent';
        $data['brix_percent']['normal']=$data['brix_percent']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['brix_percent']))
        {
            $data['brix_percent']['normal']=$info['normal']['brix_percent'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['brix_percent']))
            {
                $data['brix_percent']['replica']=$info['replica']['brix_percent'];
            }
        }
    }
    if($options['flavor']==1)
    {
        $table_heads['flavor']='flavor';
        $data['flavor']['normal']=$data['flavor']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['flavor']))
        {
            $data['flavor']['normal']=$info['normal']['flavor'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['flavor']))
            {
                $data['flavor']['replica']=$info['replica']['flavor'];
            }
        }
    }
    if($options['seed_percentage']==1)
    {
        $curd_Type_rating=$this->config->item('fc_seed_percentage');
        $table_heads['seed_percentage']='seed_percentage';
        $data['seed_percentage']['normal']=$data['seed_percentage']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['seed_percentage']))
        {
            $data['seed_percentage']['normal']=$curd_Type_rating[$info['normal']['seed_percentage']];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['seed_percentage']))
            {
                $data['seed_percentage']['replica']=$curd_Type_rating[$info['replica']['seed_percentage']];
            }
        }
    }
    if($options['seed_percentage_evaluation']==1)
    {
        $table_heads['seed_percentage_evaluation']='seed_percentage_evaluation';
        $data['seed_percentage_evaluation']['normal']=$data['seed_percentage_evaluation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['seed_percentage_evaluation']))
        {
            $data['seed_percentage_evaluation']['normal']=$info['normal']['seed_percentage_evaluation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['seed_percentage_evaluation']))
            {
                $data['seed_percentage_evaluation']['replica']=$info['replica']['seed_percentage_evaluation'];
            }
        }
    }
    if($options['special_characters']==1)
    {
        $table_heads['special_characters']='special_characters';
        $data['special_characters']['normal']=$data['special_characters']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['special_characters']))
        {
            $data['special_characters']['normal']=$info['normal']['special_characters'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['special_characters']))
            {
                $data['special_characters']['replica']=$info['replica']['special_characters'];
            }
        }
    }




    ///
    if($options['accepted']==1)
    {
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
    }
    if($options['remarks']==1)
    {
        $table_heads['remarks']='remarks';
        $data['remarks']['normal']=$data['remarks']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['remarks']))
        {
            $data['remarks']['normal']=$data['remarks']['replica']=$info['normal']['remarks'];
        }
    }


    //for ranking
    $table_heads['ranking']='ranking';
    $data['ranking']['normal']=$data['ranking']['replica']='';
    if(isset($fruit[$variety['id']]['ranking']))
    {
        $data['ranking']['normal']=$data['ranking']['replica']=$fruit[$variety['id']]['ranking'];
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
                            <th style="min-width: 300px;"><?php echo $this->lang->line('LABEL_'.strtoupper($th)); ?></th>
                            <?php
                        }
                        else
                        {
                            ?>
                            <th><?php echo $this->lang->line('LABEL_'.strtoupper($th)); ?></th>
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