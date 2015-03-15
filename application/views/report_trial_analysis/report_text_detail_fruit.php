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