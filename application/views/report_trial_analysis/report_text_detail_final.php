<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
$trial_status_config=$this->config->item('trial_status');
$this->load->config('veg_config');
$vc_plant_vigor_config=$this->config->item('vc_plant_vigor');
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

    //rnd code finish

    /*if($options['initial_plants']==1)
    {
        $table_heads['initial_plants']='initial_plants';
        $data['initial_plants']['normal']=$data['initial_plants']['replica']=$variety['initial_plants'];

    }
    if($options['no_of_plants_survived']==1)
    {
        $table_heads['no_of_plants_survived']='no_of_plants_survived';
        $data['no_of_plants_survived']['normal']=$data['no_of_plants_survived']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['no_of_plants_survived']))
        {
            $data['no_of_plants_survived']['normal']=$info['normal']['no_of_plants_survived'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['no_of_plants_survived']))
            {
                $data['no_of_plants_survived']['replica']=$info['replica']['no_of_plants_survived'];
            }
        }
    }
    if($options['survival_percentage']==1)
    {
        $table_heads['survival_percentage']='survival_percentage';
        $data['survival_percentage']['normal']=$data['survival_percentage']['replica']=$this->lang->line('CANNOT_CALCULATE');
        if((isset($data['no_of_plants_survived']['normal']))&&($data['no_of_plants_survived']['normal']>0)&&($variety['initial_plants']>0))
        {
            $data['survival_percentage']['normal']=round($data['no_of_plants_survived']['normal']/$variety['initial_plants']*100,2);
        }
        if($variety['replica_status']==1)
        {
            if((isset($data['no_of_plants_survived']['replica']))&&($data['no_of_plants_survived']['replica']>0)&&($variety['initial_plants']>0))
            {
                $data['survival_percentage']['replica']=round($data['no_of_plants_survived']['replica']/$variety['initial_plants']*100,2);
            }
        }

    }
    if($options['total_plant_per_ha']==1)
    {
        $table_heads['total_plant_per_ha']='total_plant_per_ha';
        $data['total_plant_per_ha']['normal']=$data['total_plant_per_ha']['replica']=$variety['plants_per_hectare'];

    }


    if($options['avg_curd_wt']==1)
    {
        $table_heads['avg_curd_wt']='avg_curd_wt';
        $data['avg_curd_wt']['normal']=$data['avg_curd_wt']['replica']=$this->lang->line("CANNOT_CALCULATE");
    }
    if($options['avg_head_wt']==1)
    {
        $table_heads['avg_head_wt']='avg_head_wt';
        $data['avg_head_wt']['normal']=$data['avg_head_wt']['replica']=$this->lang->line("CANNOT_CALCULATE");
    }
    if($options['avg_fruit_wt']==1)
    {
        $table_heads['avg_fruit_wt']='avg_fruit_wt';
        $data['avg_fruit_wt']['normal']=$data['avg_fruit_wt']['replica']=$this->lang->line("CANNOT_CALCULATE");
    }
    if($options['avg_root_wt']==1)
    {
        $table_heads['avg_root_wt']='avg_root_wt';
        $data['avg_root_wt']['normal']=$data['avg_root_wt']['replica']=$this->lang->line("CANNOT_CALCULATE");
    }
    if($options['avg_leaf_wt']==1)
    {
        $table_heads['avg_leaf_wt']='avg_leaf_wt';
        $data['avg_leaf_wt']['normal']=$data['avg_leaf_wt']['replica']=$this->lang->line("CANNOT_CALCULATE");
    }
    $avg_wt_normal=0;
    $avg_wt_replica=0;
    if(isset($harvest[$variety['id']]))
    {
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
                $avg_wt_normal=$data['avg_curd_wt']['normal']=round(($total_harvested_weight_normal/$total_normal_down)*1000,2);
            }
            if(($total_replica_down>0)&&($total_harvested_weight_replica>0))
            {
                $avg_wt_replica=$data['avg_curd_wt']['replica']=round(($total_harvested_weight_replica/$total_replica_down)*1000,2);
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
                $avg_wt_normal=$data['avg_head_wt']['normal']=round(($total_harvested_weight_normal/$total_normal_down)*1000,2);
            }
            if(($total_replica_down>0)&&($total_harvested_weight_replica>0))
            {
                $avg_wt_replica=$data['avg_head_wt']['replica']=round(($total_harvested_weight_replica/$total_replica_down)*1000,2);
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
                $avg_wt_normal=$data['avg_fruit_wt']['normal']=round(($total_harvested_weight_normal/$total_normal_down)*1000,2);
            }
            if(($total_replica_down>0)&&($total_harvested_weight_replica>0))
            {
                $avg_wt_replica=$data['avg_fruit_wt']['replica']=round(($total_harvested_weight_replica/$total_replica_down)*1000,2);
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
                $avg_wt_normal=$data['avg_root_wt']['normal']=round(($total_harvested_weight_normal/$total_normal_down)*1000,2);
            }
            if(($total_replica_down>0)&&($total_harvested_weight_replica>0))
            {
                $avg_wt_replica=$data['avg_root_wt']['replica']=round(($total_harvested_weight_replica/$total_replica_down)*1000,2);
            }
        }
        if($options['avg_leaf_wt']==1)
        {
            $total_normal_down = 0;
            $total_replica_down = 0;

            foreach($harvest[$variety['id']] as $hcd)
            {
                $detail = json_decode($hcd,true);
                $value_normal = $detail['normal']['total_no_of_leaves'];
                $value_replica = $detail['replica']['total_no_of_leaves'];
                $total_normal_down += $value_normal;
                $total_replica_down += $value_replica;
            }
            if(($total_normal_down>0)&&($total_harvested_weight_normal>0))
            {
                $avg_wt_normal=$data['avg_root_wt']['normal']=round(($total_harvested_weight_normal/$total_normal_down)*1000,2);
            }
            if(($total_replica_down>0)&&($total_harvested_weight_replica>0))
            {
                $avg_wt_replica=$data['avg_root_wt']['replica']=round(($total_harvested_weight_replica/$total_replica_down)*1000,2);
            }
        }
    }
    if($options['max_estimated_yield_per_ha']==1)
    {
        $table_heads['max_estimated_yield_per_ha']='max_estimated_yield_per_ha';
        $data['max_estimated_yield_per_ha']['normal']=$data['max_estimated_yield_per_ha']['replica']=$this->lang->line("CANNOT_CALCULATE");
        if(($avg_wt_normal>0)&&($variety['plants_per_hectare']>0))
        {
            $data['max_estimated_yield_per_ha']['normal']=round($variety['plants_per_hectare']*$avg_wt_normal/1000000,2);
        }
        if($variety['replica_status']==1)
        {
            if(($avg_wt_replica>0)&&($variety['plants_per_hectare']>0))
            {
                $data['max_estimated_yield_per_ha']['replica']=round($variety['plants_per_hectare']*$avg_wt_replica/1000000,2);
            }
        }

    }


    if($options['max_estimated_yield_evaluation']==1)
    {
        $table_heads['max_estimated_yield_evaluation']='max_estimated_yield_evaluation';
        $data['max_estimated_yield_evaluation']['normal']=$data['max_estimated_yield_evaluation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['max_estimated_yield_evaluation']))
        {
            $data['max_estimated_yield_evaluation']['normal']=$info['normal']['max_estimated_yield_evaluation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['max_estimated_yield_evaluation']))
            {
                $data['max_estimated_yield_evaluation']['replica']=$info['replica']['max_estimated_yield_evaluation'];
            }
        }
    }
    if($options['targeted_yield_per_ha']==1)
    {
        $table_heads['targeted_yield_per_ha']='targeted_yield_per_ha';
        $data['targeted_yield_per_ha']['normal']=$data['targeted_yield_per_ha']['replica']=$variety['terget_yeild'];

    }
    if($options['actual_yield_per_ha']==1)
    {
        $table_heads['actual_yield_per_ha']='actual_yield_per_ha';
        $data['actual_yield_per_ha']['normal']=$data['actual_yield_per_ha']['replica']=$this->lang->line("CANNOT_CALCULATE");
        if(($data['survival_percentage']['normal'])&&($data['survival_percentage']['normal']>0)&&($data['max_estimated_yield_per_ha']['normal'])&&($data['max_estimated_yield_per_ha']['normal']>0))
        {
            $data['actual_yield_per_ha']['normal']=round($data['survival_percentage']['normal']*$data['max_estimated_yield_per_ha']['normal']/100,2);
        }
        if($variety['replica_status']==1)
        {
            if(($data['survival_percentage']['replica'])&&($data['survival_percentage']['replica']>0)&&($data['max_estimated_yield_per_ha']['replica'])&&($data['max_estimated_yield_per_ha']['replica']>0))
            {
                $data['actual_yield_per_ha']['replica']=round($data['survival_percentage']['replica']*$data['max_estimated_yield_per_ha']['replica']/100,2);
            }
        }

    }
    if($options['actual_yield_per_ha_evaluation']==1)
    {
        $table_heads['actual_yield_per_ha_evaluation']='actual_yield_per_ha_evaluation';
        $data['actual_yield_per_ha_evaluation']['normal']=$data['actual_yield_per_ha_evaluation']['replica']=$this->lang->line('NOT_SET');
        if(is_array($info)&& !empty($info['normal']['actual_yield_per_ha_evaluation']))
        {
            $data['actual_yield_per_ha_evaluation']['normal']=$info['normal']['actual_yield_per_ha_evaluation'];
        }
        if($variety['replica_status']==1)
        {
            if(is_array($info)&& !empty($info['replica']['actual_yield_per_ha_evaluation']))
            {
                $data['actual_yield_per_ha_evaluation']['replica']=$info['replica']['actual_yield_per_ha_evaluation'];
            }
        }
    }*/


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