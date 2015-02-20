<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$info=json_decode($variety_info['info'],true);

$sum_no_of_plants_normal = '';
$sum_no_of_plants_replica = '';
$sum_total_harvested_wt_normal = '';
$sum_total_harvested_wt_replica = '';

foreach($harvest_data as $harvest)
{
    $detail = json_decode($harvest['info'],true);

    $no_of_plants_normal = $detail['normal']['no_of_plants_harvested'];
    $no_of_plants_replica = $detail['replica']['no_of_plants_harvested'];
    $sum_no_of_plants_normal += $no_of_plants_normal;
    $sum_no_of_plants_replica += $no_of_plants_replica;

    $total_harvested_wt_normal = $detail['normal']['total_harvested_wt'];
    $total_harvested_wt_replica = $detail['replica']['total_harvested_wt'];
    $sum_total_harvested_wt_normal += $total_harvested_wt_normal;
    $sum_total_harvested_wt_replica += $total_harvested_wt_replica;
}

if(!empty($sum_total_harvested_wt_normal) && !empty($sum_no_of_plants_normal))
{
    $average_plant_weight_normal = round($sum_total_harvested_wt_normal/$sum_no_of_plants_normal, 2);
}
else
{
    $average_plant_weight_normal = '';
}

if(!empty($sum_total_harvested_wt_replica) && !empty($sum_no_of_plants_replica))
{
    $average_plant_weight_replica = round($sum_total_harvested_wt_replica/$sum_no_of_plants_replica, 2);
}
else
{
    $average_plant_weight_replica = '';
}

?>
<div class="widget-header">
    <div class="title">
        <?php echo $title; ?>
    </div>
    <div class="clearfix"></div>
</div>
<input type="hidden" name="data_text_id" value="<?php echo $variety_info['data_text_id'];?>">
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
        </di
    </div>
<?php
}
?>

<div class="row show-grid">
    <div class="col-xs-4">
        <label class="control-label pull-right"><?php echo $this->lang->line('INITIAL_PLANTS_DURING_TRIAL_STARTED');?></label>
    </div>

    <div class="col-xs-3">
        <label class="control-label"><?php echo $initial_plants;?></label>
        <input type="hidden" class="hidden_initial" value="<?php echo $initial_plants;?>"/>
    </div>

    <?php
    if($variety_info['replica_status']==1)
    {
        ?>
        <div class="col-xs-3">
            <label class="control-label"><?php echo $initial_plants;?></label>
        </div>
    <?php
    }
    ?>
</div>

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
    $survival_percentage_normal="";
    if(is_array($info)&& !empty($info['normal']['survival_percentage']))
    {
        $survival_percentage_normal=$info['normal']['survival_percentage'];
    }
    $survival_percentage_replica="";
    if(is_array($info)&& !empty($info['replica']['survival_percentage']))
    {
        $survival_percentage_replica=$info['replica']['survival_percentage'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('SURVIVAL_PERCENTAGE');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" class="survival_percentage_normal form-control" name="normal[survival_percentage]" value="<?php echo $survival_percentage_normal;?>" />
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" class="survival_percentage_replica form-control" name="replica[survival_percentage]" value="<?php echo $survival_percentage_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[survival_percentage]" value="<?php echo $survival_percentage_replica;?>">
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
    $total_plant_per_ha_normal="";
    if(is_array($info)&& !empty($info['normal']['total_plant_per_ha']))
    {
        $total_plant_per_ha_normal=$info['normal']['total_plant_per_ha'];
    }
    $total_plant_per_ha_replica="";
    if(is_array($info)&& !empty($info['replica']['total_plant_per_ha']))
    {
        $total_plant_per_ha_replica=$info['replica']['total_plant_per_ha'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('TOTAL_PLANT_PER_HA');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" class="total_plant_per_ha_normal form-control" name="normal[total_plant_per_ha]" value="<?php echo $total_plant_per_ha_normal;?>" />
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" class="total_plant_per_ha_replica form-control" name="replica[total_plant_per_ha]" value="<?php echo $total_plant_per_ha_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[total_plant_per_ha]" value="<?php echo $total_plant_per_ha_replica;?>">
        <?php
        }
        ?>
    </div>
<?php
}
?>


<input type="hidden" class="average_plant_weight_normal" value="<?php echo $average_plant_weight_normal;?>"/>
<input type="hidden" class="average_plant_weight_replica" value="<?php echo $average_plant_weight_replica;?>"/>
<?php
if($options['avg_curd_wt']==1)
{
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('AVG_CURD_WT');?></label>
        </div>
        <div class="col-xs-3">
            <label class="control-label"><?php echo $average_plant_weight_normal;?></label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="control-label"><?php echo $average_plant_weight_replica;?></label>
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

    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('AVG_HEAD_WT');?></label>
        </div>
        <div class="col-xs-3">
            <label class="control-label"><?php echo $average_plant_weight_normal;?></label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="control-label"><?php echo $average_plant_weight_replica;?></label>
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

    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('AVG_FRUIT_WT');?></label>
        </div>
        <div class="col-xs-3">
            <label class="control-label"><?php echo $average_plant_weight_normal;?></label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="control-label"><?php echo $average_plant_weight_replica;?></label>
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

    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('AVG_ROOT_WT');?></label>
        </div>
        <div class="col-xs-3">
            <label class="control-label"><?php echo $average_plant_weight_normal;?></label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="control-label"><?php echo $average_plant_weight_replica;?></label>
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
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('AVG_LEAF_WT');?></label>
        </div>
        <div class="col-xs-3">
            <label class="control-label"><?php echo $average_plant_weight_normal;?></label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="control-label"><?php echo $average_plant_weight_replica;?></label>
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
    $max_estimated_yield_per_ha_normal="";
    if(is_array($info)&& !empty($info['normal']['max_estimated_yield_per_ha']))
    {
        $max_estimated_yield_per_ha_normal=$info['normal']['max_estimated_yield_per_ha'];
    }
    $max_estimated_yield_per_ha_replica="";
    if(is_array($info)&& !empty($info['replica']['max_estimated_yield_per_ha']))
    {
        $max_estimated_yield_per_ha_replica=$info['replica']['max_estimated_yield_per_ha'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('MAX_ESTIMATED_YIELD_PER_HA');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" class="max_estimated_normal form-control" name="normal[max_estimated_yield_per_ha]" value="<?php echo $max_estimated_yield_per_ha_normal;?>" />
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" class="max_estimated_replica form-control" name="replica[max_estimated_yield_per_ha]" value="<?php echo $max_estimated_yield_per_ha_replica;?>" />
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>

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
            <label class="control-label pull-right"><?php echo $this->lang->line('EVALUATION');?></label>
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
if($options['actual_yield_per_ha']==1)
{
    $actual_yield_per_ha_normal="";
    if(is_array($info)&& !empty($info['normal']['actual_yield_per_ha']))
    {
        $actual_yield_per_ha_normal=$info['normal']['actual_yield_per_ha'];
    }
    $actual_yield_per_ha_replica="";
    if(is_array($info)&& !empty($info['replica']['actual_yield_per_ha']))
    {
        $actual_yield_per_ha_replica=$info['replica']['actual_yield_per_ha'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('ACTUAL_YIELD_PER_HA');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" class="actual_yield_per_ha_normal form-control" name="normal[actual_yield_per_ha]" value="<?php echo $actual_yield_per_ha_normal;?>" />
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" class="actual_yield_per_ha_replica form-control" name="replica[actual_yield_per_ha]" value="<?php echo $actual_yield_per_ha_replica;?>" />
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
            <label class="control-label pull-right"><?php echo $this->lang->line('EVALUATION');?></label>
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
if($options['targeted_yield_per_ha']==1)
{
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('TARGETED_YIELD_PER_HA');?></label>
        </div>
        <div class="col-xs-3">
            <label class="control-label"><?php echo $targeted_yield;?></label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="control-label"><?php echo $targeted_yield;?></label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>

<?php

    $accepted_normal="";
    if(is_array($info)&& !empty($info['normal']['accepted']))
    {
        $accepted_normal=$info['normal']['accepted'];
    }
    $accepted_replica="";
    if(is_array($info)&& !empty($info['replica']['accepted']))
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



<script>

    jQuery(document).ready(function()
    {
        $(document).on("keyup", ".no_of_plants_survived_normal", function(event)
        {
            var hidden_initial = $(".hidden_initial").val();
            var no_of_plants_survived_normal = $(".no_of_plants_survived_normal").val();

            var percentage_normal = ((parseInt(no_of_plants_survived_normal)/parseInt(hidden_initial))*100).toFixed(2);

            if(percentage_normal)
            {
                $(".survival_percentage_normal").val(percentage_normal);
            }
        });

        $(document).on("keyup", ".no_of_plants_survived_replica", function(event)
        {
            var hidden_initial = $(".hidden_initial").val();
            var no_of_plants_survived_replica = $(".no_of_plants_survived_replica").val();

            var percentage_replica = ((parseInt(no_of_plants_survived_replica)/parseInt(hidden_initial))*100).toFixed(2);

            if(percentage_replica)
            {
                $(".survival_percentage_replica").val(percentage_replica);
            }

        });

        $(document).on("keyup", ".total_plant_per_ha_normal", function(event)
        {
            var average_plant_weight_normal = $(".average_plant_weight_normal").val();
            var total_plant_per_ha_normal = $(".total_plant_per_ha_normal").val();
            var max_estimated_yield = (parseInt(average_plant_weight_normal)*parseInt(total_plant_per_ha_normal))/1000;
            var actual_yield_normal = parseInt($(".survival_percentage_normal").val())*parseInt(max_estimated_yield);

            if(max_estimated_yield)
            {
                $(".max_estimated_normal").val(max_estimated_yield);
            }
            if(actual_yield_normal)
            {
                $(".actual_yield_per_ha_normal").val(actual_yield_normal);
            }
        });

        $(document).on("keyup", ".total_plant_per_ha_replica", function(event)
        {
            var average_plant_weight_replica = $(".average_plant_weight_replica").val();
            var total_plant_per_ha_replica = $(".total_plant_per_ha_replica").val();
            var max_estimated_yield = (parseInt(average_plant_weight_replica)*parseInt(total_plant_per_ha_replica))/1000;
            var actual_yield_replica = parseInt($(".survival_percentage_replica").val())*parseInt(max_estimated_yield);

            if(max_estimated_yield)
            {
                $(".max_estimated_replica").val(max_estimated_yield);
            }
            if(actual_yield_replica)
            {
                $(".actual_yield_per_ha_replica").val(actual_yield_replica);
            }
        });

    });

</script>


