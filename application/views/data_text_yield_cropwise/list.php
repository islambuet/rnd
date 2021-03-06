<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    $info=json_decode($variety_info['info'],true);

    $sum_total_harvested_wt_normal = 0;
    $sum_total_harvested_wt_replica = 0;

    foreach($harvest_data as $harvest)
    {
        $detail = json_decode($harvest['info'],true);

        $total_harvested_wt_normal = $detail['normal']['total_harvested_wt'];
        $total_harvested_wt_replica = $detail['replica']['total_harvested_wt'];
        $sum_total_harvested_wt_normal += $total_harvested_wt_normal;
        $sum_total_harvested_wt_replica += $total_harvested_wt_replica;
    }
$maximum_estimated_yeild_normal=0;
$maximum_estimated_yeild_replica=0;





?>
<div class="widget-header">
    <div class="title">
        <?php echo $title; ?>
    </div>
    <div class="clearfix"></div>
</div>
<input type="hidden" name="data_text_id" value="<?php echo $variety_info['data_text_id'];?>">
<input type="hidden" class="hidden_initial" value="<?php echo $variety_info['initial_plants'];?>"/>
<div class="row show-grid">
    <div class="col-xs-4">

    </div>
    <?php
    foreach($this->config->item('rating_label') as $key=>$rating)
    {
        ?>
        <button type="button" class="btn-primary"><?php echo $key.'='.$rating; ?></button>
    <?php
    }
    ?>
</div>
<?php
if($variety_info['replica_status']==1)
{
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">

        </div>
        <div class="col-xs-3">
            <label class="form-control btn-primary"><?php echo $this->lang->line('LABEL_NORMAL');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control btn-danger"><?php echo $this->lang->line('LABEL_REPLICA');?></label>
        </div>
    </div>
<?php
}
?>

<?php
if($options['initial_plants']==1)
{
    ?>

    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('INITIAL_PLANTS_DURING_TRIAL_STARTED');?></label>
        </div>


        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-6">
                <label class="form-control"><?php echo $variety_info['initial_plants'];?></label>
            </div>
        <?php
        }
        else
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $variety_info['initial_plants'];?></label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>

<?php
if($options['no_of_plants_survived']==1)
{
    $no_of_plants_survived_normal="";
    if(is_array($info)&& !empty($info['normal']['no_of_plants_survived']))
    {
        $no_of_plants_survived_normal=$info['normal']['no_of_plants_survived'];
    }
    $no_of_plants_survived_replica="";
    if(is_array($info)&& !empty($info['replica']['no_of_plants_survived']))
    {
        $no_of_plants_survived_replica=$info['replica']['no_of_plants_survived'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('NO_OF_PLANTS_SURVIVED');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" class="no_of_plants_survived_normal form-control" name="normal[no_of_plants_survived]" value="<?php echo $no_of_plants_survived_normal;?>" />
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" class="no_of_plants_survived_replica form-control" name="replica[no_of_plants_survived]" value="<?php echo $no_of_plants_survived_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[no_of_plants_survived]" value="<?php echo $no_of_plants_survived_replica;?>">
        <?php
        }
        ?>
    </div>
<?php
}
?>

<?php
if($options['survival_percentage']==1)
{
    $no_of_plants_survived_normal="";
    if(is_array($info)&& !empty($info['normal']['no_of_plants_survived']))
    {
        $no_of_plants_survived_normal=$info['normal']['no_of_plants_survived'];
        $survival_percentage_normal = round(($no_of_plants_survived_normal/$crop_info['initial_plants'])*100, 2);
    }
    else
    {
        $survival_percentage_normal = '';
    }

    $no_of_plants_survived_replica="";
    if(is_array($info)&& !empty($info['replica']['no_of_plants_survived']))
    {
        $no_of_plants_survived_replica=$info['replica']['no_of_plants_survived'];
        $survival_percentage_replica = round(($no_of_plants_survived_replica/$crop_info['initial_plants'])*100, 2);
    }
    else
    {
        $survival_percentage_replica = '';
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('SURVIVAL_PERCENTAGE');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control survival_percentage_normal"><?php echo $survival_percentage_normal;?></label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control survival_percentage_replica"><?php echo $survival_percentage_replica;?></label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>

<?php
if($options['total_plant_per_ha']==1)
{
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('TOTAL_PLANT_PER_HA');?></label>
        </div>
        <input type="hidden" class="total_plant_per_ha_normal form-control" name="normal[total_plant_per_ha]" value="<?php echo $variety_info['plants_per_hectare'];?>" />
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-6">
                <label class="form-control"><?php echo $variety_info['plants_per_hectare'];?></label>
            </div>
        <?php
        }
        else
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $variety_info['plants_per_hectare'];?></label>
            </div>
            <?php
        }
        ?>
    </div>
<?php
}
?>


<?php
if($options['avg_curd_wt']==1)
{
    $sum_no_of_plants_normal = 0;
    $sum_no_of_plants_replica = 0;

    foreach($harvest_data as $harvest)
    {
        $detail = json_decode($harvest['info'],true);

        $no_of_plants_normal = $detail['normal']['no_of_plants_harvested'];
        $no_of_plants_replica = $detail['replica']['no_of_plants_harvested'];
        $sum_no_of_plants_normal += $no_of_plants_normal;
        $sum_no_of_plants_replica += $no_of_plants_replica;
    }
    $average_plant_weight_normal = $this->lang->line("CANNOT_CALCULATE");
    if(!empty($sum_total_harvested_wt_normal) && !empty($sum_no_of_plants_normal))
    {
        $average_plant_weight_normal = round($sum_total_harvested_wt_normal/$sum_no_of_plants_normal*1000, 2);
    }

    $average_plant_weight_replica = $this->lang->line("CANNOT_CALCULATE");
    if(!empty($sum_total_harvested_wt_replica) && !empty($sum_no_of_plants_replica))
    {
        $average_plant_weight_replica = round($sum_total_harvested_wt_replica/$sum_no_of_plants_replica*1000, 2);
    }

    ?>



    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('AVG_CURD_WT');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control"><?php echo $average_plant_weight_normal;?></label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $average_plant_weight_replica;?></label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>

<?php
if($options['avg_head_wt']==1)
{
    $sum_no_of_plants_normal = '';
    $sum_no_of_plants_replica = '';

    foreach($harvest_data as $harvest)
    {
        $detail = json_decode($harvest['info'],true);

        $no_of_plants_normal = $detail['normal']['no_of_plants_harvested'];
        $no_of_plants_replica = $detail['replica']['no_of_plants_harvested'];
        $sum_no_of_plants_normal += $no_of_plants_normal;
        $sum_no_of_plants_replica += $no_of_plants_replica;
    }

    if(!empty($sum_total_harvested_wt_normal) && !empty($sum_no_of_plants_normal))
    {
        $average_plant_weight_normal = round($sum_total_harvested_wt_normal/$sum_no_of_plants_normal*1000, 2);
    }
    else
    {
        $average_plant_weight_normal = '';
    }

    if(!empty($sum_total_harvested_wt_replica) && !empty($sum_no_of_plants_replica))
    {
        $average_plant_weight_replica = round($sum_total_harvested_wt_replica/$sum_no_of_plants_replica*1000, 2);
    }
    else
    {
        $average_plant_weight_replica = '';
    }
    ?>



    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('AVG_HEAD_WT');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control"><?php echo $average_plant_weight_normal;?></label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $average_plant_weight_replica;?></label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>

<?php
if($options['avg_fruit_wt']==1)
{
    $sum_no_of_fruits_normal = 0;
    $sum_no_of_fruits_replica = 0;

    foreach($harvest_data as $harvest)
    {
        $detail = json_decode($harvest['info'],true);

        $no_of_fruits_normal = $detail['normal']['no_of_fruits'];
        $no_of_fruits_replica = $detail['replica']['no_of_fruits'];
        $sum_no_of_fruits_normal += $no_of_fruits_normal;
        $sum_no_of_fruits_replica += $no_of_fruits_replica;
    }

    if(!empty($sum_total_harvested_wt_normal) && !empty($sum_no_of_fruits_normal))
    {
        $average_plant_weight_normal = round($sum_total_harvested_wt_normal/$sum_no_of_fruits_normal*1000, 2);
    }
    else
    {
        $average_plant_weight_normal = '';
    }

    if(!empty($sum_total_harvested_wt_replica) && !empty($sum_no_of_fruits_replica))
    {
        $average_plant_weight_replica = round($sum_total_harvested_wt_replica/$sum_no_of_fruits_replica*1000, 2);
    }
    else
    {
        $average_plant_weight_replica = '';
    }
    ?>



    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('AVG_FRUIT_WT');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control"><?php echo $average_plant_weight_normal;?></label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $average_plant_weight_replica;?></label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>

<?php
if($options['avg_root_wt']==1)
{
    $sum_no_of_roots_normal = '';
    $sum_no_of_roots_replica = '';

    foreach($harvest_data as $harvest)
    {
        $detail = json_decode($harvest['info'],true);

        $no_of_roots_normal = $detail['normal']['no_of_roots_harvested'];
        $no_of_roots_replica = $detail['replica']['no_of_roots_harvested'];
        $sum_no_of_roots_normal += $no_of_roots_normal;
        $sum_no_of_roots_replica += $no_of_roots_replica;
    }

    if(!empty($sum_total_harvested_wt_normal) && !empty($sum_no_of_roots_normal))
    {
        $average_plant_weight_normal = round($sum_total_harvested_wt_normal/$sum_no_of_roots_normal*1000, 2);
    }
    else
    {
        $average_plant_weight_normal = '';
    }

    if(!empty($sum_total_harvested_wt_replica) && !empty($sum_no_of_roots_replica))
    {
        $average_plant_weight_replica = round($sum_total_harvested_wt_replica/$sum_no_of_roots_replica*1000, 2);
    }
    else
    {
        $average_plant_weight_replica = '';
    }
    ?>



    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('AVG_ROOT_WT');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control"><?php echo $average_plant_weight_normal;?></label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $average_plant_weight_replica;?></label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>

<?php
if($options['avg_leaf_wt']==1)
{
    $sum_no_of_leaves_normal = '';
    $sum_no_of_leaves_replica = '';

    foreach($harvest_data as $harvest)
    {
        $detail = json_decode($harvest['info'],true);

        $no_of_leaves_normal = $detail['normal']['total_no_of_leaves'];
        $no_of_leaves_replica = $detail['replica']['total_no_of_leaves'];
        $sum_no_of_leaves_normal += $no_of_leaves_normal;
        $sum_no_of_leaves_replica += $no_of_leaves_replica;
    }

    if(!empty($sum_total_harvested_wt_normal) && !empty($sum_no_of_leaves_normal))
    {
        $average_plant_weight_normal = round($sum_total_harvested_wt_normal/$sum_no_of_leaves_normal*1000, 2);
    }
    else
    {
        $average_plant_weight_normal = '';
    }

    if(!empty($sum_total_harvested_wt_replica) && !empty($sum_no_of_leaves_replica))
    {
        $average_plant_weight_replica = round($sum_total_harvested_wt_replica/$sum_no_of_leaves_replica*1000, 2);
    }
    else
    {
        $average_plant_weight_replica = '';
    }
    ?>



    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('AVG_LEAF_WT');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control"><?php echo $average_plant_weight_normal;?></label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $average_plant_weight_replica;?></label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>

<?php
if($options['max_estimated_yield_per_ha']==1)
{
    $has_fruit=false;
    if(sizeof($harvest_data)>0)
    {
        $detail = json_decode($harvest_data[0]['info'],true);
        $total_harvest = sizeof($harvest_data);//check needed
        if(isset($detail['normal']['no_of_fruits']))
        {
            $has_fruit=true;
        }
        if($has_fruit)
        {
            $sum_no_of_plants_harvested_normal=0;
            $sum_no_of_plants_harvested_replica=0;
            $sum_no_of_fruits_normal=0;
            $sum_no_of_fruits_replica=0;
            foreach($harvest_data as $harvest)
            {
                $detail = json_decode($harvest['info'],true);
                $no_of_plants_harvested_normal = $detail['normal']['no_of_plants_harvested'];
                $no_of_plants_harvested_replica = $detail['replica']['no_of_plants_harvested'];
                $sum_no_of_plants_harvested_normal += $no_of_plants_harvested_normal;
                $sum_no_of_plants_harvested_replica += $no_of_plants_harvested_replica;

                $no_of_fruits_normal = $detail['normal']['no_of_fruits'];
                $no_of_fruits_replica = $detail['replica']['no_of_fruits'];
                $sum_no_of_fruits_normal += $no_of_fruits_normal;
                $sum_no_of_fruits_replica += $no_of_fruits_replica;
            }
            if(($sum_no_of_fruits_normal>0)&&($sum_no_of_plants_harvested_normal>0)&&(isset($average_plant_weight_normal))&&($average_plant_weight_normal>0))
            {
                $maximum_estimated_yeild_normal=round($variety_info['plants_per_hectare']*$sum_no_of_fruits_normal*$average_plant_weight_normal*$total_harvest/$sum_no_of_plants_harvested_normal/1000000, 2);

            }
            if(($variety_info['replica_status']==1)&&($sum_no_of_fruits_replica>0)&&($sum_no_of_plants_harvested_replica>0)&&(isset($average_plant_weight_replica))&&($average_plant_weight_replica>0))
            {

                $maximum_estimated_yeild_replica=round($variety_info['plants_per_hectare']*$sum_no_of_fruits_replica*$average_plant_weight_replica*$total_harvest/$sum_no_of_plants_harvested_replica/1000000, 2);
            }

        }
        else
        {
            if(isset($average_plant_weight_normal)&&($average_plant_weight_normal>0))
            {
                $maximum_estimated_yeild_normal=round($variety_info['plants_per_hectare']*$average_plant_weight_normal/1000000, 2);
            }
            if(isset($average_plant_weight_replica)&&($average_plant_weight_replica>0))
            {
                $maximum_estimated_yeild_replica=round($variety_info['plants_per_hectare']*$average_plant_weight_replica/1000000, 2);
            }
        }
    }

    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('MAX_ESTIMATED_YIELD_PER_HA');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control max_estimated_normal"><?php echo $maximum_estimated_yeild_normal>0?$maximum_estimated_yeild_normal:'';?></label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {

            ?>
            <div class="col-xs-3">
                <label class="form-control max_estimated_replica"><?php echo $maximum_estimated_yeild_replica>0?$maximum_estimated_yeild_replica:'';?></label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>
<input type="hidden" class="maximum_estimated_yeild_normal" value="<?php echo $maximum_estimated_yeild_normal;?>"/>
<input type="hidden" class="maximum_estimated_yeild_replica" value="<?php echo $maximum_estimated_yeild_replica;?>"/>

<?php
if($options['max_estimated_yield_evaluation']==1)
{
    $max_estimated_yield_evaluation_normal="";
    if(is_array($info)&& !empty($info['normal']['max_estimated_yield_evaluation']))
    {
        $max_estimated_yield_evaluation_normal=$info['normal']['max_estimated_yield_evaluation'];
    }
    $max_estimated_yield_evaluation_replica="";
    if(is_array($info)&& !empty($info['replica']['max_estimated_yield_evaluation']))
    {
        $max_estimated_yield_evaluation_replica=$info['replica']['max_estimated_yield_evaluation'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('MAX_ESTIMATED_YIELD_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[max_estimated_yield_evaluation]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$max_estimated_yield_evaluation_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[max_estimated_yield_evaluation]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('rating') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$max_estimated_yield_evaluation_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[max_estimated_yield_evaluation]" value="<?php echo $max_estimated_yield_evaluation_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['targeted_yield_per_ha']==1)
{
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('TARGETED_YIELD_PER_HA');?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $variety_info['terget_yeild'];;?></label>
            </div>
        <?php
        }
        else
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $variety_info['terget_yeild'];;?></label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>

<?php
if($options['actual_yield_per_ha']==1)
{
    //$average_plant_weight_**
    //means average curd/root/fruit/leaf weight


    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('ACTUAL_YIELD_PER_HA');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control actual_yield_per_ha_normal"><?php echo round($maximum_estimated_yeild_normal*$survival_percentage_normal/100,2);?></label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control actual_yield_per_ha_replica"><?php echo round($maximum_estimated_yeild_replica*$survival_percentage_replica/100,2);?></label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>

<?php
if($options['actual_yield_per_ha_evaluation']==1)
{
    $actual_yield_per_ha_evaluation_normal="";
    if(is_array($info)&& !empty($info['normal']['actual_yield_per_ha_evaluation']))
    {
        $actual_yield_per_ha_evaluation_normal=$info['normal']['actual_yield_per_ha_evaluation'];
    }
    $actual_yield_per_ha_evaluation_replica="";
    if(is_array($info)&& !empty($info['replica']['actual_yield_per_ha_evaluation']))
    {
        $actual_yield_per_ha_evaluation_replica=$info['replica']['actual_yield_per_ha_evaluation'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('ACTUAL_YIELD_PER_HA_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[actual_yield_per_ha_evaluation]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$actual_yield_per_ha_evaluation_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[actual_yield_per_ha_evaluation]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('rating') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$actual_yield_per_ha_evaluation_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[actual_yield_per_ha_evaluation]" value="<?php echo $actual_yield_per_ha_evaluation_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>


<?php

    $accepted_normal=1;
    if(is_array($info)&& isset($info['normal']['accepted']))
    {
        $accepted_normal=$info['normal']['accepted'];
    }

    $accepted_replica="";
    if(is_array($info)&& isset($info['replica']['accepted']))
    {
        $accepted_replica=$info['replica']['accepted'];
    }
    ?>
<div class="row show-grid">
    <div class="col-xs-4">
        <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_ACCEPTED');?></label>
    </div>
    <div class="col-xs-3">
        <input type="radio" name="normal[accepted]" value="1" <?php if($accepted_normal!=0){echo 'checked';} ?>><?php echo $this->lang->line('YES');?>
        <input type="radio" name="normal[accepted]" value="0" <?php if($accepted_normal==0){echo 'checked';} ?>><?php echo $this->lang->line('NO');?>
    </div>
    <?php
    if($variety_info['replica_status']==1)
    {
        ?>
        <div class="col-xs-3">
            <input type="radio" name="replica[accepted]" value="1" <?php if($accepted_replica!=0){echo 'checked';} ?>><?php echo $this->lang->line('YES');?>
            <input type="radio" name="replica[accepted]" value="0" <?php if($accepted_replica==0){echo 'checked';} ?>><?php echo $this->lang->line('NO');?>
        </div>
    <?php
    }
    else
    {
        ?>
        <input type="hidden" name="replica[accepted]" value="<?php echo $accepted_replica;?>">
    <?php
    }
    ?>
</div>



<?php

    $remarks_normal="";
    if(is_array($info)&& !empty($info['normal']['remarks']))
    {
        $remarks_normal=$info['normal']['remarks'];
    }
    $remarks_replica="";
    if(is_array($info)&& !empty($info['replica']['remarks']))
    {
        $remarks_replica=$info['replica']['remarks'];
    }
?>
<div class="row show-grid">
    <div class="col-xs-4">
        <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_REMARKS');?></label>
    </div>
    <div class="col-xs-3">
        <textarea class="form-control" name="normal[remarks]"><?php echo $remarks_normal; ?></textarea>
    </div>
    <?php
    if($variety_info['replica_status']==1)
    {
        ?>
        <div class="col-xs-3">
            <textarea class="form-control" name="replica[remarks]"><?php echo $remarks_replica; ?></textarea>
        </div>
    <?php
    }
    else
    {
        ?>
        <input type="hidden" name="replica[remarks]" value="<?php echo $remarks_replica;?>">
    <?php
    }
    ?>
</div>

<div class="row show-grid">
    <div class="col-xs-4">
        <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_RANKING');?></label>
    </div>

    <?php
    if($variety_info['replica_status']==1)
    {
        ?>
        <div class="col-xs-6">
            <input type="text" class="ranking form-control" name="ranking" value="<?php echo $variety_info['ranking'];?>" />
        </div>
    <?php
    }
    else
    {
        ?>
        <div class="col-xs-3">
            <input type="text" class="ranking form-control" name="ranking" value="<?php echo $variety_info['ranking'];?>" />
        </div>
    <?php
    }
    ?>
</div>


<script>

    jQuery(document).ready(function()
    {
        $(document).on("keypress", ".ranking", function(event)
        {
            return isNumberKey(event);
        });

        $(document).off("keyup", ".no_of_plants_survived_normal");
        $(document).off("keyup", ".no_of_plants_survived_replica");

        $(document).on("keyup", ".no_of_plants_survived_normal", function(event)
        {
            var hidden_initial = $(".hidden_initial").val();
            var no_of_plants_survived_normal = $(".no_of_plants_survived_normal").val();

            var percentage_normal = ((parseInt(no_of_plants_survived_normal)/parseInt(hidden_initial))*100).toFixed(2);

            if(percentage_normal)
            {
                $(".survival_percentage_normal").html(percentage_normal);
            }
            var maximum_estimated_yeild_normal = $(".maximum_estimated_yeild_normal").val();
            var actual_yield_normal = ((percentage_normal/100)*maximum_estimated_yeild_normal).toFixed(2);
            if(actual_yield_normal)
            {
                $(".actual_yield_per_ha_normal").html(actual_yield_normal);
            }
        });

        $(document).on("keyup", ".no_of_plants_survived_replica", function(event)
        {
            var hidden_initial = $(".hidden_initial").val();
            var no_of_plants_survived_replica = $(".no_of_plants_survived_replica").val();

            var percentage_replica = ((parseInt(no_of_plants_survived_replica)/parseInt(hidden_initial))*100).toFixed(2);

            if(percentage_replica)
            {
                $(".survival_percentage_replica").html(percentage_replica);
            }

            var average_plant_weight_replica = $(".average_plant_weight_replica").val();
            var total_plant_per_ha_normal = $(".total_plant_per_ha_normal").val();
            var max_estimated_yield = ((average_plant_weight_replica*parseInt(total_plant_per_ha_normal))/1000).toFixed(2);
            var actual_yield_replica = ((percentage_replica/100)*max_estimated_yield).toFixed(2);

            var maximum_estimated_yeild_replica = $(".maximum_estimated_yeild_replica").val();
            var actual_yield_replica = ((percentage_normal/100)*maximum_estimated_yeild_replica).toFixed(2);

            if(actual_yield_replica)
            {
                $(".actual_yield_per_ha_replica").html(actual_yield_replica);
            }

        });

    });

</script>


