<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
//echo "<pre>";
//print_r($varieties);
//echo "</pre>";
//echo "<pre>";
//print_r($delivery_and_sowing_info);
//echo "</pre>";
echo "<pre>";
print_r($options);
echo "</pre>";
echo "<pre>";
print_r($flowering);
echo "</pre>";
//echo "<pre>";
//print_r($delivery_and_sowing_info);
//echo "</pre>";

$table_heads=array();
$final_varieties=array();
foreach($varieties as $variety)
{
    $info=array();
    if(isset($flowering[$variety['id']]['info']))
    {
        $info=json_decode($flowering[$variety['id']]['info'],true);
    }

    $data=array();
    $data['replica_status']=$variety['replica_status'];
    $data['id']=$variety['id'];

    //for rnd code
    $table_heads['rnd_code']='rnd_code';
    $data['rnd_code']['normal']=$data['rnd_code']['replica']=System_helper::get_rnd_code($variety);
    //rnd code finish
    /*if($options['sowing_date']==1)
    {
        $table_heads['sowing_date']='sowing_date';
        $data['sowing_date']['normal']=$data['sowing_date']['replica']=$this->lang->line('NOT_SET');
        if($delivery_and_sowing_info['sowing_date']>0)
        {
            $data['sowing_date']['normal']=$data['sowing_date']['replica']=System_helper::display_date($delivery_and_sowing_info['sowing_date']);
        }
    }
    if($options['transplanting_date']==1)
    {
        $table_heads['transplanting_date']='transplanting_date';
        $table_heads['expected_transplanting_date']='expected_transplanting_date';
        $data['expected_transplanting_date']['normal']=$data['expected_transplanting_date']['replica']=$this->lang->line('NOT_SET');
        $data['transplanting_date']['normal']=$data['transplanting_date']['replica']=$this->lang->line('NOT_SET');
        if($delivery_and_sowing_info['transplanting_date']>0)
        {
            $data['transplanting_date']['normal']=$data['transplanting_date']['replica']=System_helper::display_date($delivery_and_sowing_info['transplanting_date']);
            $data['expected_transplanting_date']['normal']=$data['expected_transplanting_date']['replica']=System_helper::display_date($delivery_and_sowing_info['sowing_date']+$variety['optimum_transplanting_days']*24*3600);

        }

    }
    if($options['fortnightly_reporting_date']==1)
    {
        $table_heads['fortnightly_reporting_date']='fortnightly_reporting_date';
        $data['fortnightly_reporting_date']['normal']=$data['fortnightly_reporting_date']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['actual_reporting_date']))
        {
            $data['fortnightly_reporting_date']['normal']=$data['fortnightly_reporting_date']['replica']=$info['normal']['actual_reporting_date'];
        }
    }
    if($options['initial_plants_during_trial_started']==1)
    {
        $table_heads['initial_plants_during_trial_started']='initial_plants_during_trial_started';
        $data['initial_plants_during_trial_started']['normal']=$data['initial_plants_during_trial_started']['replica']=$variety['initial_plants'];

    }
    if($options['plant_type_appearance']==1)
    {
        $table_heads['plant_type_appearance']='plant_type_appearance';
        $data['plant_type_appearance']['normal']=$data['plant_type_appearance']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['plant_type_appearance']))
        {
            $data['plant_type_appearance']['normal']=$info['normal']['plant_type_appearance'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['plant_type_appearance']))
            {
                $data['plant_type_appearance']['replica']=$info['replica']['plant_type_appearance'];
            }
        }
    }
    if($options['plant_type']==1)
    {
        $table_heads['plant_type']='plant_type';
        $data['plant_type']['normal']=$data['plant_type']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['plant_type']))
        {
            $data['plant_type']['normal']=$info['normal']['plant_type'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['plant_type']))
            {
                $data['plant_type']['replica']=$info['replica']['plant_type'];
            }
        }
    }
    if($options['plant_uniformity']==1)
    {
        $table_heads['plant_uniformity']='plant_uniformity';
        $data['plant_uniformity']['normal']=$data['plant_uniformity']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['plant_uniformity']))
        {
            $data['plant_uniformity']['normal']=$info['normal']['plant_uniformity'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['plant_uniformity']))
            {
                $data['plant_uniformity']['replica']=$info['replica']['plant_uniformity'];
            }
        }
    }
    if($options['distance_from_ground_to_curd']==1)
    {
        $table_heads['distance_from_ground_to_curd']='distance_from_ground_to_curd';
        $data['distance_from_ground_to_curd']['normal']=$data['distance_from_ground_to_curd']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['distance_from_ground_to_curd']))
        {
            $data['distance_from_ground_to_curd']['normal']=$info['normal']['distance_from_ground_to_curd'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['distance_from_ground_to_curd']))
            {
                $data['distance_from_ground_to_curd']['replica']=$info['replica']['distance_from_ground_to_curd'];
            }
        }
    }
    if($options['distance_from_ground_to_head']==1)
    {
        $table_heads['distance_from_ground_to_head']='distance_from_ground_to_head';
        $data['distance_from_ground_to_head']['normal']=$data['distance_from_ground_to_head']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['distance_from_ground_to_head']))
        {
            $data['distance_from_ground_to_head']['normal']=$info['normal']['distance_from_ground_to_head'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['distance_from_ground_to_head']))
            {
                $data['distance_from_ground_to_head']['replica']=$info['replica']['distance_from_ground_to_head'];
            }
        }
    }
    if($options['distance_from_ground_to_root_shoulder']==1)
    {
        $table_heads['distance_from_ground_to_root_shoulder']='distance_from_ground_to_root_shoulder';
        $data['distance_from_ground_to_root_shoulder']['normal']=$data['distance_from_ground_to_root_shoulder']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['distance_from_ground_to_root_shoulder']))
        {
            $data['distance_from_ground_to_root_shoulder']['normal']=$info['normal']['distance_from_ground_to_root_shoulder'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['distance_from_ground_to_root_shoulder']))
            {
                $data['distance_from_ground_to_root_shoulder']['replica']=$info['replica']['distance_from_ground_to_root_shoulder'];
            }
        }
    }
    if($options['distance_from_ground_leaf_shoulder']==1)
    {
        $table_heads['distance_from_ground_leaf_shoulder']='distance_from_ground_leaf_shoulder';
        $data['distance_from_ground_leaf_shoulder']['normal']=$data['distance_from_ground_leaf_shoulder']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['distance_from_ground_leaf_shoulder']))
        {
            $data['distance_from_ground_leaf_shoulder']['normal']=$info['normal']['distance_from_ground_leaf_shoulder'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['distance_from_ground_leaf_shoulder']))
            {
                $data['distance_from_ground_leaf_shoulder']['replica']=$info['replica']['distance_from_ground_leaf_shoulder'];
            }
        }
    }
    if($options['curd_type']==1)
    {
        $curd_Type_rating=$this->config->item('curd_Type_rating');
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
        $curd_Type_rating=$this->config->item('head_Type_rating');
        $table_heads['head_type']='leaf_type';
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
    if($options['leaf_shape']==1)
    {
        $table_heads['leaf_shape']='leaf_shape';
        $data['leaf_shape']['normal']=$data['leaf_shape']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['leaf_shape']))
        {
            $data['leaf_shape']['normal']=$info['normal']['leaf_shape'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['leaf_shape']))
            {
                $data['leaf_shape']['replica']=$info['replica']['leaf_shape'];
            }
        }
    }
    if($options['root_shape']==1)
    {
        $table_heads['root_shape']='root_shape';
        $data['root_shape']['normal']=$data['root_shape']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['root_shape']))
        {
            $data['root_shape']['normal']=$info['normal']['root_shape'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['root_shape']))
            {
                $data['root_shape']['replica']=$info['replica']['root_shape'];
            }
        }
    }
    if($options['fruit_shape']==1)
    {
        $table_heads['fruit_shape']='fruit_shape';
        $data['fruit_shape']['normal']=$data['fruit_shape']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['fruit_shape']))
        {
            $data['fruit_shape']['normal']=$info['normal']['fruit_shape'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['fruit_shape']))
            {
                $data['fruit_shape']['replica']=$info['replica']['fruit_shape'];
            }
        }
    }
    if($options['root_type']==1)
    {
        $curd_Type_rating=$this->config->item('root_Type_rating');
        $table_heads['root_type']='root_type';
        $data['root_type']['normal']=$data['root_type']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['root_type']))
        {
            $data['root_type']['normal']=$curd_Type_rating[$info['normal']['root_type']];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['root_type']))
            {
                $data['root_type']['replica']=$curd_Type_rating[$info['replica']['root_type']];
            }
        }
    }
    if($options['leaf_type']==1)
    {
        $curd_Type_rating=$this->config->item('leaf_Type_rating');
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
    if($options['spine_type']==1)
    {
        $curd_Type_rating=$this->config->item('spine_type_rating');
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
    if($options['curd_colour']==1)
    {
        $table_heads['curd_colour']='curd_colour';
        $data['curd_colour']['normal']=$data['curd_colour']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['curd_colour']))
        {
            $data['curd_colour']['normal']=$info['normal']['curd_colour'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['curd_colour']))
            {
                $data['curd_colour']['replica']=$info['replica']['curd_colour'];
            }
        }
    }
    if($options['head_colour']==1)
    {
        $table_heads['head_colour']='head_colour';
        $data['head_colour']['normal']=$data['head_colour']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['head_colour']))
        {
            $data['head_colour']['normal']=$info['normal']['head_colour'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['head_colour']))
            {
                $data['head_colour']['replica']=$info['replica']['head_colour'];
            }
        }
    }
    if($options['leaf_colour']==1)
    {
        $table_heads['leaf_colour']='leaf_colour';
        $data['leaf_colour']['normal']=$data['leaf_colour']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['leaf_colour']))
        {
            $data['leaf_colour']['normal']=$info['normal']['leaf_colour'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['leaf_colour']))
            {
                $data['leaf_colour']['replica']=$info['replica']['leaf_colour'];
            }
        }
    }
    if($options['fruit_colour']==1)
    {
        $table_heads['fruit_colour']='fruit_colour';
        $data['fruit_colour']['normal']=$data['fruit_colour']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['fruit_colour']))
        {
            $data['fruit_colour']['normal']=$info['normal']['fruit_colour'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['fruit_colour']))
            {
                $data['fruit_colour']['replica']=$info['replica']['fruit_colour'];
            }
        }
    }
    if($options['root_colour']==1)
    {
        $table_heads['root_colour']='root_colour';
        $data['root_colour']['normal']=$data['root_colour']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['root_colour']))
        {
            $data['root_colour']['normal']=$info['normal']['root_colour'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['root_colour']))
            {
                $data['root_colour']['replica']=$info['replica']['root_colour'];
            }
        }
    }
    if($options['fruit_size']==1)
    {
        $table_heads['fruit_size']='fruit_size';
        $data['fruit_size']['normal']=$data['fruit_size']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['fruit_size']))
        {
            $data['fruit_size']['normal']=$info['normal']['fruit_size'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['fruit_size']))
            {
                $data['fruit_size']['replica']=$info['replica']['fruit_size'];
            }
        }
    }
    if($options['fruit_bearing']==1)
    {
        $table_heads['fruit_bearing']='fruit_bearing';
        $data['fruit_bearing']['normal']=$data['fruit_bearing']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['fruit_bearing']))
        {
            $data['fruit_bearing']['normal']=$info['normal']['fruit_bearing'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['fruit_bearing']))
            {
                $data['fruit_bearing']['replica']=$info['replica']['fruit_bearing'];
            }
        }
    }
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
    if($options['curd_uniformity']==1)
    {
        $table_heads['curd_uniformity']='curd_uniformity';
        $data['curd_uniformity']['normal']=$data['curd_uniformity']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['curd_uniformity']))
        {
            $data['curd_uniformity']['normal']=$info['normal']['curd_uniformity'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['curd_uniformity']))
            {
                $data['curd_uniformity']['replica']=$info['replica']['curd_uniformity'];
            }
        }
    }
    if($options['head_uniformity']==1)
    {
        $table_heads['head_uniformity']='head_uniformity';
        $data['head_uniformity']['normal']=$data['head_uniformity']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['head_uniformity']))
        {
            $data['head_uniformity']['normal']=$info['normal']['head_uniformity'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['head_uniformity']))
            {
                $data['head_uniformity']['replica']=$info['replica']['head_uniformity'];
            }
        }
    }
    if($options['fruit_size_uniformity']==1)
    {
        $table_heads['fruit_size_uniformity']='fruit_size_uniformity';
        $data['fruit_size_uniformity']['normal']=$data['fruit_size_uniformity']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['fruit_size_uniformity']))
        {
            $data['fruit_size_uniformity']['normal']=$info['normal']['fruit_size_uniformity'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['fruit_size_uniformity']))
            {
                $data['fruit_size_uniformity']['replica']=$info['replica']['fruit_size_uniformity'];
            }
        }
    }
    if($options['fruit_uniformity']==1)
    {
        $table_heads['fruit_uniformity']='fruit_uniformity';
        $data['fruit_uniformity']['normal']=$data['fruit_uniformity']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['fruit_uniformity']))
        {
            $data['fruit_uniformity']['normal']=$info['normal']['fruit_uniformity'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['fruit_uniformity']))
            {
                $data['fruit_uniformity']['replica']=$info['replica']['fruit_uniformity'];
            }
        }
    }
    if($options['uniformity_of_leaves']==1)
    {
        $table_heads['uniformity_of_leaves']='uniformity_of_leaves';
        $data['uniformity_of_leaves']['normal']=$data['uniformity_of_leaves']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['uniformity_of_leaves']))
        {
            $data['uniformity_of_leaves']['normal']=$info['normal']['uniformity_of_leaves'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['uniformity_of_leaves']))
            {
                $data['uniformity_of_leaves']['replica']=$info['replica']['uniformity_of_leaves'];
            }
        }
    }
    if($options['disease_sustainability']==1)
    {
        $table_heads['disease_sustainability']='disease_sustainability';
        $data['disease_sustainability']['normal']=$data['disease_sustainability']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['disease_sustainability']))
        {
            $data['disease_sustainability']['normal']=$info['normal']['disease_sustainability'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['disease_sustainability']))
            {
                $data['disease_sustainability']['replica']=$info['replica']['disease_sustainability'];
            }
        }
    }
    if($options['internode_distance']==1)
    {
        $table_heads['internode_distance']='internode_distance';
        $data['internode_distance']['normal']=$data['internode_distance']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['internode_distance']))
        {
            $data['internode_distance']['normal']=$info['normal']['internode_distance'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['internode_distance']))
            {
                $data['internode_distance']['replica']=$info['replica']['internode_distance'];
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
    if($options['leaf_height_from_root']==1)
    {
        $table_heads['leaf_height_from_root']='leaf_height_from_root';
        $data['leaf_height_from_root']['normal']=$data['leaf_height_from_root']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['leaf_height_from_root']))
        {
            $data['leaf_height_from_root']['normal']=$info['normal']['leaf_height_from_root'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['leaf_height_from_root']))
            {
                $data['leaf_height_from_root']['replica']=$info['replica']['leaf_height_from_root'];
            }
        }
    }
    if($options['adaptability']==1)
    {
        $table_heads['adaptability']='adaptability';
        $data['adaptability']['normal']=$data['adaptability']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['adaptability']))
        {
            $data['adaptability']['normal']=$info['normal']['adaptability'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['adaptability']))
            {
                $data['adaptability']['replica']=$info['replica']['adaptability'];
            }
        }
    }
    if($options['ridge_quality']==1)
    {
        $table_heads['ridge_quality']='ridge_quality';
        $data['ridge_quality']['normal']=$data['ridge_quality']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['ridge_quality']))
        {
            $data['ridge_quality']['normal']=$info['normal']['ridge_quality'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['ridge_quality']))
            {
                $data['ridge_quality']['replica']=$info['replica']['ridge_quality'];
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
    }*/


    //for ranking
    $table_heads['ranking']='ranking';
    $data['ranking']['normal']=$data['ranking']['replica']='';
    if(isset($flowering[$variety['id']]['ranking']))
    {
        $data['ranking']['normal']=$data['ranking']['replica']=$flowering[$variety['id']]['ranking'];
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