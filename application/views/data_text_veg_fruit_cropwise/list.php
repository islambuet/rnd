<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$info = json_decode($variety_info['info'],true);

$flowering_data = json_decode($flowering_data['info'], true);
$fruit_data = json_decode($fruit_data['info'], true);
$compile_data = json_decode($compile_data['info'], true);

function get_specific_array($harvest_data, $num)
{
    foreach($harvest_data as $harvest)
    {
        if($harvest['harvest_no']==$num)
        {
            return $harvest;
        }
    }
    return null;
}

?>
<div class="widget-header">
    <div class="title">
        <?php echo $title; ?>
    </div>
    <div class="clearfix"></div>
</div>
<input type="hidden" name="data_text_id" value="<?php echo $variety_info['data_text_id'];?>">
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
        </di
    </div>
    <?php
}
?>

<?php
    $germination_normal="";
    if(is_array($info)&& !empty($info['normal']['germination']))
    {
        $germination_normal=$info['normal']['germination'];
    }
    $germination_replica="";
    if(is_array($info)&& !empty($info['replica']['germination']))
    {
        $germination_replica=$info['replica']['germination'];
    }
?>
<div class="row show-grid">
    <div class="col-xs-4">
        <label class="control-label pull-right"><?php echo $this->lang->line('GERMINATION');?></label>
    </div>

    <div class="col-xs-3">
        <input type="text" id="germination" name="normal[germination]" class="form-control" value="<?php echo $germination_normal;?>" />
    </div>

    <?php
    if($variety_info['replica_status']==1)
    {
        ?>
        <div class="col-xs-3">
            <input type="text" name="replica[germination]" class="form-control" value="<?php echo $germination_replica;?>" />
        </div>
    <?php
    }
    else
    {
        ?>
        <input type="hidden" name="replica[germination]" value="<?php echo $germination_replica;?>">
    <?php
    }
    ?>
</div>

<?php
    $plant_vigor_normal="";
    if(is_array($info)&& !empty($info['normal']['plant_vigor']))
    {
        $plant_vigor_normal=$info['normal']['plant_vigor'];
    }
    $plant_vigor_replica="";
    if(is_array($info)&& !empty($info['replica']['plant_vigor']))
    {
        $plant_vigor_replica=$info['replica']['plant_vigor'];
    }
?>
<div class="row show-grid">
    <div class="col-xs-4">
        <label class="control-label pull-right"><?php echo $this->lang->line('PLANT_VIGOR');?></label>
    </div>

    <div class="col-xs-3">
        <select class="form-control" name="normal[plant_vigor]">
            <option value=""><?php echo $this->lang->line('SELECT');?></option>
            <?php foreach($this->config->item('vc_plant_vigor') as $val=>$name){?>
                <option value="<?php echo $val;?>" <?php if($val==$plant_vigor_normal){echo 'selected';}?>><?php echo $name;?></option>
            <?php }?>
        </select>
    </div>

    <?php
    if($variety_info['replica_status']==1)
    {
        ?>
        <div class="col-xs-3">
            <select class="form-control" name="replica[plant_vigor]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('vc_plant_vigor') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$plant_vigor_replica){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
    <?php
    }
    else
    {
        ?>
        <input type="hidden" name="replica[plant_vigor]" value="<?php echo $plant_vigor_replica;?>">
    <?php
    }
    ?>
</div>

<?php
if($options['first_curd_formation']==1)
{
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('FIRST_CURD_FORMATION');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control"><?php echo $flowering_data['normal']['1st_curd_formation']; ?></label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $flowering_data['replica']['1st_curd_formation']; ?></label>
            </div>
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['first_head_formation']==1)
{
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('FIRST_HEAD_FORMATION');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control"><?php echo $flowering_data['normal']['1st_head_formation']; ?></label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $flowering_data['replica']['1st_head_formation']; ?></label>
            </div>
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['first_flow']==1)
{
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('FIRST_FLOW');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control"><?php echo $flowering_data['normal']['1st_flowering_days']; ?></label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $flowering_data['replica']['1st_flowering_days']; ?></label>
            </div>
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['first_root']==1)
{
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('FIRST_ROOT');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control"><?php echo $flowering_data['normal']['1st_root_formation']; ?></label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $flowering_data['replica']['1st_root_formation']; ?></label>
            </div>
        <?php
        }
        ?>

    </div>
<?php
}
?>


<?php
if($options['first_cutting']==1)
{
    $first_harvest_array = get_specific_array($harvest_data, 1); //hard coded 1 for first harvest
    $first_harvest_data = json_decode($first_harvest_array['info'], true);
    $first_cutting_normal = $first_harvest_data['normal']['harvesting_date'];
    $first_cutting_normal_time=System_helper::get_time($first_cutting_normal);

    $sowing_date = $variety_info['sowing_date'];
    $date_difference_normal=$this->lang->line("NOT_SET");
    if($first_cutting_normal_time>0)
    {
        $date_difference_normal = ($first_cutting_normal_time-$sowing_date)/(60*60*24);
    }

    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('FIRST_CUTTING');?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-6">
                <label class="form-control"><?php echo $date_difference_normal; ?></label>
            </div>
        <?php
        }
        else
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $date_difference_normal; ?></label>
            </div>
            <?php
        }
        ?>

    </div>
<?php
}
?>


<?php
if($options['last_cutting']==1)
{
    $last_harvest_array = get_specific_array($harvest_data, sizeof($harvest_data)); //hard coded 1 for first harvest
    $last_harvest_data = json_decode($last_harvest_array['info'], true);
    $last_cutting_normal = $last_harvest_data['normal']['harvesting_date'];

    $last_cutting_normal_time=System_helper::get_time($last_cutting_normal);

    $sowing_date = $variety_info['sowing_date'];
    $last_date_difference_normal = $this->lang->line("NOT_SET");
    if($last_cutting_normal_time>0)
    {
        $last_date_difference_normal = ($last_cutting_normal_time-$sowing_date)/(60*60*24);
    }

    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LAST_CUTTING');?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-6">
                <label class="form-control"><?php echo $last_date_difference_normal; ?></label>
            </div>
        <?php
        }
        else
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $last_date_difference_normal; ?></label>
            </div>
        <?php
        }
        ?>

    </div>
<?php
}
?>


<?php
if($options['no_of_cutting']==1)
{
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('NO_OF_CUTTING');?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-6">
                <label class="form-control"><?php echo sizeof($harvest_data); ?></label>
            </div>
        <?php
        }
        else{
            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo sizeof($harvest_data); ?></label>
            </div>
            <?php
        }
        ?>

    </div>
<?php
}
?>


<?php
if($options['fifty_percent_curd_formation']==1)
{
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('FIFTY_PERCENT_CURD_FORMATION');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control"><?php echo $flowering_data['normal']['50_percent_curd_formation_days']; ?></label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $flowering_data['replica']['50_percent_curd_formation_days']; ?></label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>

<?php
if($options['fifty_percent_head_formation']==1)
{
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('FIFTY_PERCENT_HEAD_FORMATION');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control"><?php echo $flowering_data['normal']['50_percent_head_formation_days']; ?></label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $flowering_data['replica']['50_percent_head_formation_days']; ?></label>
            </div>
        <?php
        }
        ?>

    </div>
<?php
}
?>


<?php
if($options['fifty_percent_flow']==1)
{
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('FIFTY_PERCENT_FLOW');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control"><?php echo $flowering_data['normal']['50_percent_flowering_days']; ?></label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $flowering_data['replica']['50_percent_flowering_days']; ?></label>
            </div>
        <?php
        }
        ?>

    </div>
<?php
}
?>


<?php
if($options['fifty_percent_root']==1)
{
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('FIFTY_PERCENT_ROOT');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control"><?php echo $flowering_data['normal']['50_percent_root_formation_days']; ?></label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $flowering_data['replica']['50_percent_root_formation_days']; ?></label>
            </div>
        <?php
        }
        ?>

    </div>
<?php
}
?>



<?php
if($options['first_harvest']==1)
{
    $first_harvest_array = get_specific_array($harvest_data, 1); //hard coded 1 for first harvest
    $first_harvest_data = json_decode($first_harvest_array['info'],true);
    $first_harvesting_date_normal = $first_harvest_data['normal']['harvesting_date'];

    $sowing_date = $variety_info['sowing_date'];
    $first_harvest_normal_time=System_helper::get_time($first_harvesting_date_normal);

    $first_date_difference_normal = $this->lang->line("NOT_SET");
    if($first_harvest_normal_time>0)
    {
        $first_date_difference_normal = ($first_harvest_normal_time-$sowing_date)/(60*60*24);
    }

    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('FIRST_HARVEST');?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-6">
                <label class="form-control"><?php echo $first_date_difference_normal;?></label>
            </div>
        <?php
        }
        else
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $first_date_difference_normal;?></label>
            </div>
            <?php
        }
        ?>
    </div>
<?php
}
?>



<?php
if($options['last_harvest']==1)
{
    $last_harvest_array = get_specific_array($harvest_data, sizeof($harvest_data)); //hard coded 1 for first harvest
    $last_harvest_data = json_decode($last_harvest_array['info'],true);
    $last_harvesting_date_normal = $last_harvest_data['normal']['harvesting_date'];

    $sowing_date = $variety_info['sowing_date'];
    $last_harvest_normal_time = System_helper::get_time($last_harvesting_date_normal);

    $last_date_difference_normal = $this->lang->line("NOT_SET");
    if($last_harvest_normal_time>0)
    {
        $last_date_difference_normal = ($last_harvest_normal_time-$sowing_date)/(60*60*24);
    }

    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LAST_HARVEST');?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-6">
                <label class="form-control"><?php echo $last_date_difference_normal; ?></label>
            </div>
        <?php
        }
        else
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $last_date_difference_normal; ?></label>
            </div>
            <?php
        }
        ?>
    </div>
<?php
}
?>

<?php
if($options['no_of_harvest']==1)
{
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('NO_OF_HARVEST');?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-6">
                <label class="form-control"><?php echo sizeof($harvest_data);; ?></label>
            </div>
        <?php
        }
        else
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo sizeof($harvest_data); ?></label>
            </div>
            <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['curd_colour']==1)
{
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('CURD_COLOUR');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control">
                <?php
                    if(!empty($fruit_data['normal']['curd_colour']))
                    {
                        $colors=$this->config->item('fc_curd_colour_'.$crop_id);
                        echo $colors[$fruit_data['normal']['curd_colour']];
                    }
                    else
                    {
                        echo $this->lang->line("NOT_SET");
                    }
                ?>
            </label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control">
                    <?php
                        if(!empty($fruit_data['replica']['curd_colour']))
                        {
                            $colors=$this->config->item('fc_curd_colour_'.$crop_id);
                            echo $colors[$fruit_data['replica']['curd_colour']];
                        }
                        else
                        {
                            echo $this->lang->line("NOT_SET");
                        }
                    ?>
                </label>
            </div>
        <?php
        }
        ?>
    </div>

    <div class="row show-grid" <?php echo empty($fruit_data['normal']['curd_colour_evaluation'])?'style="display:none"':''?>>
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('CURD_COLOUR_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control">
                <?php
                    if(!empty($fruit_data['normal']['curd_colour_evaluation']))
                    {
                        $rating = $this->config->item('rating');
                        echo $rating[$fruit_data['normal']['curd_colour_evaluation']];
                    }
                    else
                    {
                        echo $this->lang->line("NOT_SET");
                    }
                ?>
            </label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control">
                    <?php
                        if(!empty($fruit_data['replica']['curd_colour_evaluation']))
                        {
                            $rating = $this->config->item('rating');
                            echo $rating[$fruit_data['replica']['curd_colour_evaluation']];
                        }
                        else
                        {
                            echo $this->lang->line("NOT_SET");
                        }
                    ?>
                </label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>

<?php
if($options['head_colour']==1)
{
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('HEAD_COLOUR');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control">
                <?php
                    if(!empty($fruit_data['normal']['head_colour']))
                    {
                        $headColors=$this->config->item('fc_head_colour');
                        echo $headColors[$fruit_data['normal']['head_colour']];
                    }
                    else
                    {
                        echo $this->lang->line("NOT_SET");
                    }
                ?>
            </label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control">
                    <?php
                        if(!empty($fruit_data['replica']['head_colour']))
                        {
                            $headColors=$this->config->item('fc_head_colour');
                            echo $headColors[$fruit_data['replica']['head_colour']];
                        }
                        else
                        {
                            echo $this->lang->line("NOT_SET");
                        }
                    ?>
                </label>
            </div>
        <?php
        }
        ?>
    </div>

    <div class="row show-grid" <?php echo empty($fruit_data['normal']['head_colour_evaluation'])?'style="display:none"':''?>>
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('HEAD_COLOUR_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control">
                <?php
                    if(!empty($fruit_data['normal']['head_colour_evaluation']))
                    {
                        $rating = $this->config->item('rating');
                        echo $rating[$fruit_data['normal']['head_colour_evaluation']];
                    }
                    else
                    {
                        echo $this->lang->line("NOT_SET");
                    }
                ?>
            </label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control">
                    <?php
                        if(!empty($fruit_data['replica']['head_colour_evaluation']))
                        {
                            $rating = $this->config->item('rating');
                            echo $rating[$fruit_data['replica']['head_colour_evaluation']];
                        }
                        else
                        {
                            echo $this->lang->line("NOT_SET");
                        }
                    ?>
                </label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>

<?php
if($options['fruit_colour']==1)
{
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('FRUIT_COLOUR');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control">
                <?php
                    if(!empty($fruit_data['normal']['fruit_colour']))
                    {
                        $colors=$this->config->item('fc_fruit_colour_'.$crop_id);
                        echo $colors[$fruit_data['normal']['fruit_colour']];
                    }
                    else
                    {
                        echo $this->lang->line("NOT_SET");
                    }
                ?>
            </label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control">
                    <?php
                        if(!empty($fruit_data['replica']['fruit_colour']))
                        {
                            $colors=$this->config->item('fc_fruit_colour_'.$crop_id);
                            echo $colors[$fruit_data['replica']['fruit_colour']];
                        }
                        else
                        {
                            echo $this->lang->line("NOT_SET");
                        }
                    ?>
                </label>
            </div>
        <?php
        }
        ?>
    </div>

    <div class="row show-grid" <?php echo empty($fruit_data['normal']['fruit_colour_evaluation'])?'style="display:none"':''?>>
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('FRUIT_COLOUR_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control">
                <?php
                    if(!empty($fruit_data['normal']['fruit_colour_evaluation']))
                    {
                        $rating = $this->config->item('rating');
                        echo $rating[$fruit_data['normal']['fruit_colour_evaluation']];
                    }
                    else
                    {
                        echo $this->lang->line("NOT_SET");
                    }
                ?>
            </label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control">
                    <?php
                        if(!empty($fruit_data['replica']['fruit_colour_evaluation']))
                        {
                            $rating = $this->config->item('rating');
                            echo $rating[$fruit_data['replica']['fruit_colour_evaluation']];
                        }
                        else
                        {
                            echo $this->lang->line("NOT_SET");
                        }
                    ?>
                </label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>

<?php
if($options['root_colour']==1)
{
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('ROOT_COLOUR');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control">
                <?php
                    if(!empty($fruit_data['normal']['root_colour']))
                    {
                        $colors=$this->config->item('fc_root_colour_'.$crop_id);
                        echo $colors[$fruit_data['normal']['root_colour']];
                    }
                    else
                    {
                        echo $this->lang->line("NOT_SET");
                    }
                ?>
            </label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control">
                    <?php
                        if(!empty($fruit_data['replica']['root_colour']))
                        {
                            $colors=$this->config->item('fc_root_colour_'.$crop_id);
                            echo $colors[$fruit_data['replica']['root_colour']];
                        }
                        else
                        {
                            echo $this->lang->line("NOT_SET");
                        }
                    ?>
                </label>
            </div>
        <?php
        }
        ?>
    </div>

    <div class="row show-grid" <?php echo empty($fruit_data['normal']['root_colour_evaluation'])?'style="display:none"':''?>>
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('ROOT_COLOUR_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control">
                <?php
                    if(!empty($fruit_data['normal']['root_colour_evaluation']))
                    {
                        $rating = $this->config->item('rating');
                        echo $rating[$fruit_data['normal']['root_colour_evaluation']];
                    }
                    else
                    {
                        echo $this->lang->line("NOT_SET");
                    }
                ?>
            </label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control">
                    <?php
                        if(!empty($fruit_data['replica']['root_colour_evaluation']))
                        {
                            $rating = $this->config->item('rating');
                            echo $rating[$fruit_data['replica']['root_colour_evaluation']];
                        }
                        else
                        {
                            echo $this->lang->line("NOT_SET");
                        }
                    ?>
                </label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>

<?php
if($options['leaf_colour']==1)
{
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LEAF_COLOUR');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control">
                <?php
                    if(!empty($fruit_data['normal']['leaf_colour']))
                    {
                        $colors=$this->config->item('fc_leaf_colour');
                        echo $colors[$fruit_data['normal']['leaf_colour']];
                    }
                    else
                    {
                        echo $this->lang->line("NOT_SET");
                    }
                ?>
            </label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control">
                    <?php
                        if(!empty($fruit_data['replica']['leaf_colour']))
                        {
                            $colors=$this->config->item('fc_leaf_colour');
                            echo $colors[$fruit_data['replica']['leaf_colour']];
                        }
                        else
                        {
                            echo $this->lang->line("NOT_SET");
                        }
                    ?>
                </label>
            </div>
        <?php
        }
        ?>
    </div>

    <div class="row show-grid" <?php echo empty($fruit_data['normal']['leaf_colour_evaluation'])?'style="display:none"':''?>>
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LEAF_COLOUR_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control">
                <?php
                    if(!empty($fruit_data['normal']['leaf_colour_evaluation']))
                    {
                        $rating = $this->config->item('rating');
                        echo $rating[$fruit_data['normal']['leaf_colour_evaluation']];
                    }
                    else
                    {
                        echo $this->lang->line("NOT_SET");
                    }
                ?>
            </label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control">
                    <?php
                        if(!empty($fruit_data['replica']['leaf_colour_evaluation']))
                        {
                            $rating = $this->config->item('rating');
                            echo $rating[$fruit_data['replica']['leaf_colour_evaluation']];
                        }
                        else
                        {
                            echo $this->lang->line("NOT_SET");
                        }
                    ?>
                </label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>


<?php
if($options['leaf_length']==1)
{
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LEAF_LENGTH');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control">
                <?php echo $fruit_data['normal']['leaf_length'];?>
            </label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control">
                    <?php echo $fruit_data['replica']['leaf_length'];?>
                </label>
            </div>
        <?php
        }
        ?>
    </div>

    <div class="row show-grid" <?php echo empty($fruit_data['normal']['leaf_length_evaluation'])?'style="display:none"':''?>>
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LEAF_LENGTH_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control">
                <?php
                    if(!empty($fruit_data['normal']['leaf_length_evaluation']))
                    {
                        $rating = $this->config->item('rating');
                        echo $rating[$fruit_data['normal']['leaf_length_evaluation']];
                    }
                    else
                    {
                        echo $this->lang->line("NOT_SET");
                    }
                ?>
            </label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control">
                    <?php
                        if(!empty($fruit_data['replica']['leaf_length_evaluation']))
                        {
                            $rating = $this->config->item('rating');
                            echo $rating[$fruit_data['replica']['leaf_length_evaluation']];
                        }
                        else
                        {
                            echo $this->lang->line("NOT_SET");
                        }
                    ?>
                </label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>


<?php
if($options['leaf_type']==1)
{
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LEAF_TYPE');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control">
                <?php
                    if(!empty($fruit_data['normal']['leaf_type']))
                    {
                        $leafTypes=$this->config->item('fc_leaf_type');
                        echo $leafTypes[$fruit_data['normal']['leaf_type']];
                    }
                    else
                    {
                        echo $this->lang->line("NOT_SET");
                    }
                ?>
            </label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control">
                    <?php
                        if(!empty($fruit_data['replica']['leaf_type']))
                        {
                            $leafTypes=$this->config->item('fc_leaf_type');
                            echo $leafTypes[$fruit_data['replica']['leaf_type']];
                        }
                        else
                        {
                            echo $this->lang->line("NOT_SET");
                        }
                    ?>
                </label>
            </div>
        <?php
        }
        ?>
    </div>

    <div class="row show-grid" <?php echo empty($fruit_data['normal']['leaf_type_evaluation'])?'style="display:none"':''?>>
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LEAF_TYPE_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control">
                <?php
                    if(!empty($fruit_data['normal']['leaf_type_evaluation']))
                    {
                        $rating = $this->config->item('rating');
                        echo $rating[$fruit_data['normal']['leaf_type_evaluation']];
                    }
                    else
                    {
                        echo $this->lang->line("NOT_SET");
                    }
                ?>
            </label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control">
                    <?php
                        if(!empty($fruit_data['replica']['leaf_type_evaluation']))
                        {
                            $rating = $this->config->item('rating');
                            echo $rating[$fruit_data['replica']['leaf_type_evaluation']];
                        }
                        else
                        {
                            echo $this->lang->line("NOT_SET");
                        }
                    ?>
                </label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>


<?php
if($options['fruit_size']==1)
{
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('FRUIT_DIA');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control">
                <?php echo $fruit_data['normal']['fruit_diameter'];?>
            </label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control">
                    <?php echo $fruit_data['replica']['fruit_diameter'];?>
                </label>
            </div>
        <?php
        }
        ?>
    </div>

    <div class="row show-grid" <?php echo empty($fruit_data['normal']['fruit_diameter_evaluation'])?'style="display:none"':''?>>
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('FRUIT_DIA_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control">
                <?php
                    if(!empty($fruit_data['normal']['fruit_diameter_evaluation']))
                    {
                        $rating = $this->config->item('rating');
                        echo $rating[$fruit_data['normal']['fruit_diameter_evaluation']];
                    }
                    else
                    {
                        echo $this->lang->line("NOT_SET");
                    }
                ?>
            </label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control">
                    <?php
                        if(!empty($fruit_data['replica']['fruit_diameter_evaluation']))
                        {
                            $rating = $this->config->item('rating');
                            echo $rating[$fruit_data['replica']['fruit_diameter_evaluation']];
                        }
                        else
                        {
                            echo $this->lang->line("NOT_SET");
                        }
                    ?>
                </label>
            </div>
        <?php
        }
        ?>
    </div>

    <?php
        if(isset($fruit_data['normal']['fruit_length']))
        {


            ?>
            <div class="row show-grid">
                <div class="col-xs-4">
                    <label class="control-label pull-right"><?php echo $this->lang->line('FRUIT_LENGTH');?></label>
                </div>
                <div class="col-xs-3">
                    <label class="form-control">
                        <?php echo $fruit_data['normal']['fruit_length'];?>
                    </label>
                </div>
                <?php
                if($variety_info['replica_status']==1)
                {
                    ?>
                    <div class="col-xs-3">
                        <label class="form-control">
                            <?php echo $fruit_data['replica']['fruit_length'];?>
                        </label>
                    </div>
                <?php
                }
                ?>
            </div>
            <?php
        }
        ?>

    <div class="row show-grid" <?php echo empty($fruit_data['normal']['fruit_height_evaluation'])?'style="display:none"':''?>>
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('FRUIT_LENGTH_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control">
                <?php
                    if(!empty($fruit_data['normal']['fruit_height_evaluation']))
                    {
                        $rating = $this->config->item('rating');
                        echo $rating[$fruit_data['normal']['fruit_height_evaluation']];
                    }
                    else
                    {
                        echo $this->lang->line("NOT_SET");
                    }
                ?>
            </label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control">
                    <?php
                        if(!empty($fruit_data['replica']['fruit_height_evaluation']))
                        {
                            $rating = $this->config->item('rating');
                            echo $rating[$fruit_data['replica']['fruit_height_evaluation']];
                        }
                        else
                        {
                            echo $this->lang->line("NOT_SET");
                        }
                    ?>
                </label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>


<?php
if($options['root_size']==1)
{
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('ROOT_DIA');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control">
                <?php echo $fruit_data['normal']['root_diameter'];?>
            </label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control">
                    <?php echo $fruit_data['normal']['root_diameter'];?>
                </label>
            </div>
        <?php
        }
        ?>
    </div>

    <div class="row show-grid" <?php echo empty($fruit_data['normal']['root_diameter_evaluation'])?'style="display:none"':''?>>
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('ROOT_DIA_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control">
                <?php
                    if(!empty($fruit_data['normal']['root_diameter_evaluation']))
                    {
                        $rating = $this->config->item('rating');
                        echo $rating[$fruit_data['normal']['root_diameter_evaluation']];
                    }
                    else
                    {
                        echo $this->lang->line("NOT_SET");
                    }
                ?>
            </label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control">
                    <?php
                        if(!empty($fruit_data['replica']['root_diameter_evaluation']))
                        {
                            $rating = $this->config->item('rating');
                            echo $rating[$fruit_data['replica']['root_diameter_evaluation']];
                        }
                        else
                        {
                            echo $this->lang->line("NOT_SET");
                        }
                    ?>
                </label>
            </div>
        <?php
        }
        ?>
    </div>


    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('ROOT_HEIGHT');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control">
                <?php echo $fruit_data['normal']['root_height'];?>
            </label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control">
                    <?php echo $fruit_data['normal']['root_height'];?>
                </label>
            </div>
        <?php
        }
        ?>
    </div>

    <div class="row show-grid" <?php echo empty($fruit_data['normal']['root_height_evaluation'])?'style="display:none"':''?>>
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('ROOT_HEIGHT_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control">
                <?php
                    if(!empty($fruit_data['normal']['root_height_evaluation']))
                    {
                        $rating = $this->config->item('rating');
                        echo $rating[$fruit_data['normal']['root_height_evaluation']];
                    }
                    else
                    {
                        echo $this->lang->line("NOT_SET");
                    }
                ?>
            </label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control">
                    <?php
                        if(!empty($fruit_data['replica']['root_height_evaluation']))
                        {
                            $rating = $this->config->item('rating');
                            echo $rating[$fruit_data['replica']['root_height_evaluation']];
                        }
                        else
                        {
                            echo $this->lang->line("NOT_SET");
                        }
                    ?>
                </label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>


<?php
if($options['curd_shape']==1)
{
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('CURD_SHAPE');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control">
                <?php
                    if(!empty($fruit_data['normal']['curd_type']))
                    {
                        $leafTypes=$this->config->item('fc_curd_type');
                        echo $leafTypes[$fruit_data['normal']['curd_type']];
                    }
                    else
                    {
                        echo $this->lang->line("NOT_SET");
                    }
                ?>
            </label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control">
                    <?php
                        if(!empty($fruit_data['replica']['curd_type']))
                        {
                            $leafTypes=$this->config->item('fc_curd_type');
                            echo $leafTypes[$fruit_data['replica']['curd_type']];
                        }
                        else
                        {
                            echo $this->lang->line("NOT_SET");
                        }
                    ?>
                </label>
            </div>
        <?php
        }
        ?>
    </div>

    <div class="row show-grid" <?php echo empty($fruit_data['normal']['curd_type_evaluation'])?'style="display:none"':''?>>
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('CURD_SHAPE_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control">
                <?php
                    if(!empty($fruit_data['normal']['curd_type_evaluation']))
                    {
                        $rating = $this->config->item('rating');
                        echo $rating[$fruit_data['normal']['curd_type_evaluation']];
                    }
                    else
                    {
                        echo $this->lang->line("NOT_SET");
                    }
                ?>
            </label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control">
                    <?php
                        if(!empty($fruit_data['replica']['curd_type_evaluation']))
                        {
                            $rating = $this->config->item('rating');
                            echo $rating[$fruit_data['replica']['curd_type_evaluation']];
                        }
                        else
                        {
                            echo $this->lang->line("NOT_SET");
                        }
                    ?>
                </label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>


<?php
if($options['head_shape']==1)
{
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('HEAD_SHAPE');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control">
                <?php
                    if(!empty($fruit_data['normal']['head_type']))
                    {
                        $headType = $this->config->item('fc_head_type');
                        echo $headType[$fruit_data['normal']['head_type']];
                    }
                    else
                    {
                        echo $this->lang->line("NOT_SET");
                    }
                ?>
            </label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control">
                    <?php
                        if(!empty($fruit_data['replica']['head_type']))
                        {
                            $headType = $this->config->item('fc_head_type');
                            echo $headType[$fruit_data['replica']['head_type']];
                        }
                        else
                        {
                            echo $this->lang->line("NOT_SET");
                        }
                    ?>
                </label>
            </div>
        <?php
        }
        ?>
    </div>

    <div class="row show-grid" <?php echo empty($fruit_data['normal']['head_type_evaluation'])?'style="display:none"':''?>>
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('HEAD_SHAPE_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control">
                <?php
                    if(!empty($fruit_data['normal']['head_type_evaluation']))
                    {
                        $rating = $this->config->item('rating');
                        echo $rating[$fruit_data['normal']['head_type_evaluation']];
                    }
                    else
                    {
                        echo $this->lang->line("NOT_SET");
                    }
                ?>
            </label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control">
                    <?php
                        if(!empty($fruit_data['replica']['head_type_evaluation']))
                        {
                            $rating = $this->config->item('rating');
                            echo $rating[$fruit_data['replica']['head_type_evaluation']];
                        }
                        else
                        {
                            echo $this->lang->line("NOT_SET");
                        }
                    ?>
                </label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>

<?php
if($options['fruit_shape']==1)
{
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('FRUIT_SHAPE');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control">
                <?php
                    if(!empty($fruit_data['normal']['fruit_shape']))
                    {
                        $fruitShape = $this->config->item('fc_fruit_shape_'.$crop_id);
                        echo $fruitShape[$fruit_data['normal']['fruit_shape']];
                    }
                    else
                    {
                        echo $this->lang->line("NOT_SET");
                    }
                ?>
            </label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control">
                    <?php
                        if(!empty($fruit_data['replica']['fruit_shape']))
                        {
                            $fruitShape = $this->config->item('fc_fruit_shape_'.$crop_id);
                            echo $fruitShape[$fruit_data['replica']['fruit_shape']];
                        }
                        else
                        {
                            echo $this->lang->line("NOT_SET");
                        }
                    ?>
                </label>
            </div>
        <?php
        }
        ?>
    </div>

    <div class="row show-grid" <?php echo empty($fruit_data['normal']['fruit_shape_evaluation'])?'style="display:none"':''?>>
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('FRUIT_SHAPE_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control">
                <?php
                    if(!empty($fruit_data['normal']['fruit_shape_evaluation']))
                    {
                        $rating = $this->config->item('rating');
                        echo $rating[$fruit_data['normal']['fruit_shape_evaluation']];
                    }
                    else
                    {
                        echo $this->lang->line("NOT_SET");
                    }
                ?>
            </label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control">
                    <?php
                        if(!empty($fruit_data['replica']['fruit_shape_evaluation']))
                        {
                            $rating = $this->config->item('rating');
                            echo $rating[$fruit_data['replica']['fruit_shape_evaluation']];
                        }
                        else
                        {
                            echo $this->lang->line("NOT_SET");
                        }
                    ?>
                </label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>

<?php
if($options['root_shape']==1)
{
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('ROOT_SHAPE');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control">
                <?php
                    if(!empty($fruit_data['normal']['root_shape']))
                    {
                        $rootShape = $this->config->item('fc_root_shape');
                        echo $rootShape[$fruit_data['normal']['root_shape']];
                    }
                    else
                    {
                        echo $this->lang->line("NOT_SET");
                    }
                ?>
            </label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control">
                    <?php
                        if(!empty($fruit_data['replica']['root_shape']))
                        {
                            $rootShape = $this->config->item('fc_root_shape');
                            echo $rootShape[$fruit_data['replica']['root_shape']];
                        }
                        else
                        {
                            echo $this->lang->line("NOT_SET");
                        }
                    ?>
                </label>
            </div>
        <?php
        }
        ?>
    </div>

    <div class="row show-grid" <?php echo empty($fruit_data['normal']['root_shape_evaluation'])?'style="display:none"':''?>>
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('ROOT_SHAPE_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control">
                <?php
                    if(!empty($fruit_data['normal']['root_shape_evaluation']))
                    {
                        $rating = $this->config->item('rating');
                        echo $rating[$fruit_data['normal']['root_shape_evaluation']];
                    }
                    else
                    {
                        echo $this->lang->line("NOT_SET");
                    }
                ?>
            </label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control">
                    <?php
                        if(!empty($fruit_data['replica']['root_shape_evaluation']))
                        {
                            $rating = $this->config->item('rating');
                            echo $rating[$fruit_data['replica']['root_shape_evaluation']];
                        }
                        else
                        {
                            echo $this->lang->line("NOT_SET");
                        }
                    ?>
                </label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>

<?php
if($options['curd_diam']==1)
{
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('CURD_DIAM');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control">
                <?php echo $fruit_data['normal']['curd_diameter']; ?>
            </label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control">
                    <?php echo $fruit_data['replica']['curd_diameter']; ?>
                </label>
            </div>
        <?php
        }
        ?>
    </div>

    <div class="row show-grid" <?php echo empty($fruit_data['normal']['curd_diameter_evaluation'])?'style="display:none"':''?>>
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('CURD_DIAM_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control">
                <?php
                    if(!empty($fruit_data['normal']['curd_diameter_evaluation']))
                    {
                        $rating = $this->config->item('rating');
                        echo $rating[$fruit_data['normal']['curd_diameter_evaluation']];
                    }
                    else
                    {
                        echo $this->lang->line("NOT_SET");
                    }
                ?>
            </label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control">
                    <?php
                        if(!empty($fruit_data['replica']['curd_diameter_evaluation']))
                        {
                            $rating = $this->config->item('rating');
                            echo $rating[$fruit_data['replica']['curd_diameter_evaluation']];
                        }
                        else
                        {
                            echo $this->lang->line("NOT_SET");
                        }
                    ?>
                </label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>

<?php
if($options['head_diam']==1)
{
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('HEAD_DIAM');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control">
                <?php echo $fruit_data['normal']['head_diameter']; ?>
            </label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control">
                    <?php echo $fruit_data['replica']['head_diameter']; ?>
                </label>
            </div>
        <?php
        }
        ?>
    </div>

    <div class="row show-grid" <?php echo empty($fruit_data['normal']['head_diameter_evaluation'])?'style="display:none"':''?>>
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('HEAD_DIAM_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control">
                <?php
                    if(!empty($fruit_data['normal']['head_diameter_evaluation']))
                    {
                        $rating = $this->config->item('rating');
                        echo $rating[$fruit_data['normal']['curd_diameter_evaluation']];
                    }
                    else
                    {
                        echo $this->lang->line("NOT_SET");
                    }
                ?>
            </label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control">
                    <?php
                        if(!empty($fruit_data['replica']['head_diameter_evaluation']))
                        {
                            $rating = $this->config->item('rating');
                            echo $rating[$fruit_data['replica']['curd_diameter_evaluation']];
                        }
                        else
                        {
                            echo $this->lang->line("NOT_SET");
                        }
                    ?>
                </label>
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
    $sum_of_no_of_plants_harvested_normal = 0;
    $sum_of_no_of_plants_harvested_replica = 0;
    $sum_of_total_marketed_curds_wt_normal = 0;
    $sum_of_total_marketed_curds_wt_replica = 0;

    foreach($harvest_data as $harvest)
    {
        $detail = json_decode($harvest['info'],true);

        $no_of_plants_harvested_normal = $detail['normal']['no_of_plants_harvested'];
        $no_of_plants_harvested_replica = $detail['replica']['no_of_plants_harvested'];
        $sum_of_no_of_plants_harvested_normal += $no_of_plants_harvested_normal;
        $sum_of_no_of_plants_harvested_replica += $no_of_plants_harvested_replica;

        $total_marketed_curds_wt_normal = $detail['normal']['total_harvested_wt'];
        $total_marketed_curds_wt_replica = $detail['replica']['total_harvested_wt'];
        $sum_of_total_marketed_curds_wt_normal += $total_marketed_curds_wt_normal;
        $sum_of_total_marketed_curds_wt_replica += $total_marketed_curds_wt_replica;
    }
    $avg_curd_wt_normal = $this->lang->line("CANNOT_CALCULATE");;

    if(($sum_of_total_marketed_curds_wt_normal>0) && ($sum_of_no_of_plants_harvested_normal)>0)
    {
        $avg_curd_wt_normal = round($sum_of_total_marketed_curds_wt_normal/$sum_of_no_of_plants_harvested_normal*1000, 2);
    }


    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('AVG_CURD_WT');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control">
                <?php echo $avg_curd_wt_normal; ?>
            </label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            $avg_curd_wt_replica = $this->lang->line("CANNOT_CALCULATE");;

            if(($sum_of_total_marketed_curds_wt_replica>0) && ($sum_of_no_of_plants_harvested_replica)>0)
            {
                $avg_curd_wt_replica = round($sum_of_total_marketed_curds_wt_replica/$sum_of_no_of_plants_harvested_replica*1000, 2);
            }

            ?>
            <div class="col-xs-3">
                <label class="form-control">
                    <?php echo $avg_curd_wt_replica; ?>
                </label>
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
    $sum_of_total_marketed_leafs_normal = 0;
    $sum_of_total_marketed_leafs_replica = 0;
    $sum_of_total_marketed_leafs_wt_normal = 0;
    $sum_of_total_marketed_leafs_wt_replica = 0;

    foreach($harvest_data as $harvest)
    {
        $detail = json_decode($harvest['info'],true);

        $total_marketed_leafs_normal = $detail['normal']['total_mrkt_leaf'];
        $total_marketed_leafs_replica = $detail['replica']['total_mrkt_leaf'];
        $sum_of_total_marketed_leafs_normal += $total_marketed_leafs_normal;
        $sum_of_total_marketed_leafs_replica += $total_marketed_leafs_replica;

        $total_marketed_leafs_wt_normal = $detail['normal']['total_mrkt_leaf_wt'];
        $total_marketed_leafs_wt_replica = $detail['replica']['total_mrkt_leaf_wt'];
        $sum_of_total_marketed_leafs_wt_normal += $total_marketed_leafs_wt_normal;
        $sum_of_total_marketed_leafs_wt_replica += $total_marketed_leafs_wt_replica;
    }

    $avg_leaf_wt_normal = $this->lang->line("CANNOT_CALCULATE");;

    if(($sum_of_total_marketed_leafs_wt_normal>0) && ($sum_of_total_marketed_leafs_normal)>0)
    {
        $avg_leaf_wt_normal = round($sum_of_total_marketed_leafs_wt_normal/$sum_of_total_marketed_leafs_normal, 2);
    }

    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('AVG_LEAF_WT');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control">
                <?php echo $avg_leaf_wt_normal; ?>
            </label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            $avg_leaf_wt_replica = $this->lang->line("CANNOT_CALCULATE");;

            if(($sum_of_total_marketed_leafs_wt_replica>0) && ($sum_of_total_marketed_leafs_replica)>0)
            {
                $avg_leaf_wt_replica = round($sum_of_total_marketed_leafs_wt_replica/$sum_of_total_marketed_leafs_replica, 2);
            }

            ?>
            <div class="col-xs-3">
                <label class="form-control">
                    <?php echo $avg_leaf_wt_replica; ?>
                </label>
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
    $sum_of_total_marketed_heads_normal = 0;
    $sum_of_total_marketed_heads_replica = 0;
    $sum_of_total_marketed_heads_wt_normal = 0;
    $sum_of_total_marketed_heads_wt_replica = 0;

    foreach($harvest_data as $harvest)
    {
        $detail = json_decode($harvest['info'],true);

        $total_marketed_heads_normal = $detail['normal']['no_of_plants_harvested'];
        $total_marketed_heads_replica = $detail['replica']['no_of_plants_harvested'];
        $sum_of_total_marketed_heads_normal += $total_marketed_heads_normal;
        $sum_of_total_marketed_heads_replica += $total_marketed_heads_replica;

        $total_marketed_heads_wt_normal = $detail['normal']['total_harvested_wt'];
        $total_marketed_heads_wt_replica = $detail['replica']['total_harvested_wt'];
        $sum_of_total_marketed_heads_wt_normal += $total_marketed_heads_wt_normal;
        $sum_of_total_marketed_heads_wt_replica += $total_marketed_heads_wt_replica;
    }

    $avg_head_wt_normal = $this->lang->line("CANNOT_CALCULATE");;

    if(($sum_of_total_marketed_heads_wt_normal>0) && ($sum_of_total_marketed_heads_normal)>0)
    {
        $avg_head_wt_normal = round($sum_of_total_marketed_heads_wt_normal/$sum_of_total_marketed_heads_normal, 2);
    }

    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('AVG_HEAD_WT');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control">
                <?php echo $avg_head_wt_normal; ?>
            </label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            $avg_head_wt_replica = $this->lang->line("CANNOT_CALCULATE");;

            if(($sum_of_total_marketed_heads_wt_replica>0) && ($sum_of_total_marketed_heads_replica)>0)
            {
                $avg_head_wt_replica = round($sum_of_total_marketed_heads_wt_replica/$sum_of_total_marketed_heads_replica, 2);
            }
            ?>
            <div class="col-xs-3">
                <label class="form-control">
                    <?php echo $avg_head_wt_replica; ?>
                </label>
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
    $sum_of_total_marketed_roots_normal = 0;
    $sum_of_total_marketed_roots_replica = 0;
    $sum_of_total_marketed_roots_wt_normal = 0;
    $sum_of_total_marketed_roots_wt_replica = 0;

    foreach($harvest_data as $harvest)
    {
        $detail = json_decode($harvest['info'],true);

        $total_marketed_roots_normal = $detail['normal']['no_of_roots_harvested'];
        $total_marketed_roots_replica = $detail['replica']['no_of_roots_harvested'];
        $sum_of_total_marketed_roots_normal += $total_marketed_roots_normal;
        $sum_of_total_marketed_roots_replica += $total_marketed_roots_replica;

        $total_marketed_roots_wt_normal = $detail['normal']['total_harvested_wt'];
        $total_marketed_roots_wt_replica = $detail['replica']['total_harvested_wt'];
        $sum_of_total_marketed_roots_wt_normal += $total_marketed_roots_wt_normal;
        $sum_of_total_marketed_roots_wt_replica += $total_marketed_roots_wt_replica;
    }

    $avg_root_wt_normal = $this->lang->line("CANNOT_CALCULATE");;

    if(($sum_of_total_marketed_roots_wt_normal>0) && ($sum_of_total_marketed_roots_normal)>0)
    {
        $avg_root_wt_normal = round($sum_of_total_marketed_roots_wt_normal/$sum_of_total_marketed_roots_normal, 2);
    }

    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('AVG_ROOT_WT');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control">
                <?php echo $avg_root_wt_normal; ?>
            </label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            $avg_root_wt_replica = $this->lang->line("CANNOT_CALCULATE");;

            if(($sum_of_total_marketed_roots_wt_replica>0) && ($sum_of_total_marketed_roots_replica)>0)
            {
                $avg_root_wt_replica = round($sum_of_total_marketed_roots_wt_replica/$sum_of_total_marketed_roots_replica, 2);
            }

            ?>
            <div class="col-xs-3">
                <label class="form-control">
                    <?php echo $avg_root_wt_replica; ?>
                </label>
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
    $sum_of_total_marketed_fruits_normal = 0;
    $sum_of_total_marketed_fruits_replica = 0;
    $sum_of_total_marketed_fruits_wt_normal = 0;
    $sum_of_total_marketed_fruits_wt_replica = 0;

    foreach($harvest_data as $harvest)
    {
        $detail = json_decode($harvest['info'],true);

        $total_marketed_fruits_normal = $detail['normal']['no_of_fruits'];
        $total_marketed_fruits_replica = $detail['replica']['no_of_fruits'];
        $sum_of_total_marketed_fruits_normal += $total_marketed_fruits_normal;
        $sum_of_total_marketed_fruits_replica += $total_marketed_fruits_replica;

        $total_marketed_fruits_wt_normal = $detail['normal']['total_harvested_wt'];
        $total_marketed_fruits_wt_replica = $detail['replica']['total_harvested_wt'];
        $sum_of_total_marketed_fruits_wt_normal += $total_marketed_fruits_wt_normal;
        $sum_of_total_marketed_fruits_wt_replica += $total_marketed_fruits_wt_replica;
    }

    $avg_fruit_wt_normal = $this->lang->line("CANNOT_CALCULATE");;

    if(($sum_of_total_marketed_fruits_wt_normal>0) && ($sum_of_total_marketed_fruits_normal)>0)
    {
        $avg_fruit_wt_normal = round($sum_of_total_marketed_fruits_wt_normal/$sum_of_total_marketed_fruits_normal, 2);
    }

    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('AVG_FRUIT_WT');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control">
                <?php echo $avg_fruit_wt_normal; ?>
            </label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            $avg_fruit_wt_replica = $this->lang->line("CANNOT_CALCULATE");;

            if(($sum_of_total_marketed_fruits_wt_replica>0) && ($sum_of_total_marketed_fruits_replica)>0)
            {
                $avg_fruit_wt_replica = round($sum_of_total_marketed_fruits_wt_replica/$sum_of_total_marketed_fruits_replica, 2);
            }

            ?>
            <div class="col-xs-3">
                <label class="form-control">
                    <?php echo $avg_fruit_wt_replica; ?>
                </label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>

<?php
if($options['plant_height']==1)
{
    $plant_height_normal="";
    if(is_array($info)&& !empty($info['normal']['plant_height']))
    {
        $plant_height_normal=$info['normal']['plant_height'];
    }
    $plant_height_replica="";
    if(is_array($info)&& !empty($info['replica']['plant_height']))
    {
        $plant_height_replica=$info['replica']['plant_height'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('PLANT_HEIGHT');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" class="form-control" name="normal[plant_height]" value="<?php echo $plant_height_normal;?>" />
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" class="form-control" name="replica[plant_height]" value="<?php echo $plant_height_replica;?>" />
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>

<?php
if($options['harvest_unif']==1)
{
    $harvest_unif_normal="";
    if(is_array($info)&& !empty($info['normal']['harvest_unif']))
    {
        $harvest_unif_normal = $info['normal']['harvest_unif'];
    }
    $harvest_unif_replica="";
        if(is_array($info)&& !empty($info['replica']['harvest_unif']))
    {
        $harvest_unif_replica = $info['replica']['harvest_unif'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('HARVEST_UNIF');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" class="form-control" name="normal[harvest_unif]" value="<?php echo $harvest_unif_normal;?>">
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" class="form-control" name="replica[harvest_unif]" value="<?php echo $harvest_unif_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[harvest_unif]" value="<?php echo $harvest_unif_replica;?>">
        <?php
        }
        ?>
    </div>
<?php
}
?>

<?php
if($options['cluster_per_plant']==1)
{
    $cluster_per_plant_normal = "";
    if(is_array($info)&& !empty($info['normal']['cluster_per_plant']))
    {
        $cluster_per_plant_normal = $info['normal']['cluster_per_plant'];
    }
    $cluster_per_plant_replica = "";
    if(is_array($info)&& !empty($info['replica']['cluster_per_plant']))
    {
        $cluster_per_plant_replica = $info['replica']['cluster_per_plant'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('CLUSTER_PER_PLANT');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" class="form-control" name="normal[cluster_per_plant]" value="<?php echo $cluster_per_plant_normal;?>" />
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" class="form-control" name="replica[cluster_per_plant]" value="<?php echo $cluster_per_plant_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[cluster_per_plant]" value="<?php echo $cluster_per_plant_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['fruit_per_cluster']==1)
{
    $fruit_per_cluster_normal = "";
    if(is_array($info)&& !empty($info['normal']['fruit_per_cluster']))
    {
        $fruit_per_cluster_normal = $info['normal']['fruit_per_cluster'];
    }
    $fruit_per_cluster_replica = "";
    if(is_array($info)&& !empty($info['replica']['fruit_per_cluster']))
    {
        $fruit_per_cluster_replica = $info['replica']['fruit_per_cluster'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('FRUIT_PER_CLUSTER');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" class="form-control" name="normal[fruit_per_cluster]" value="<?php echo $fruit_per_cluster_normal;?>" />
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" class="form-control" name="replica[fruit_per_cluster]" value="<?php echo $fruit_per_cluster_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[fruit_per_cluster]" value="<?php echo $fruit_per_cluster_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['fruit_pungency']==1)
{
    $fruit_pungency_normal = "";
    if(is_array($info)&& !empty($info['normal']['fruit_pungency']))
    {
        $fruit_pungency_normal = $info['normal']['fruit_pungency'];
    }
    $fruit_pungency_replica = "";
    if(is_array($info)&& !empty($info['replica']['fruit_pungency']))
    {
        $fruit_pungency_replica = $info['replica']['fruit_pungency'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('FRUIT_PUNGENCY');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" class="form-control" name="normal[fruit_pungency]" value="<?php echo $fruit_pungency_normal;?>" />
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" class="form-control" name="replica[fruit_pungency]" value="<?php echo $fruit_pungency_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[fruit_pungency]" value="<?php echo $fruit_pungency_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['no_of_plants_per_plot']==1)
{
    $no_of_plants_per_plot_normal = "";
    if(is_array($info)&& !empty($info['normal']['no_of_plants_per_plot']))
    {
        $no_of_plants_per_plot_normal = $info['normal']['no_of_plants_per_plot'];
    }
    $no_of_plants_per_plot_replica = "";
    if(is_array($info)&& !empty($info['replica']['no_of_plants_per_plot']))
    {
        $no_of_plants_per_plot_replica = $info['replica']['no_of_plants_per_plot'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('NO_OF_PLANTS_PER_PLOT');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" class="form-control" name="normal[no_of_plants_per_plot]" value="<?php echo $no_of_plants_per_plot_normal;?>" />
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" class="form-control" name="replica[no_of_plants_per_plot]" value="<?php echo $no_of_plants_per_plot_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[no_of_plants_per_plot]" value="<?php echo $no_of_plants_per_plot_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['avg_fruit_wt_per_plant']==1)
{
    $avg_fruit_wt_per_plant_normal = "";
    if(is_array($info)&& !empty($info['normal']['avg_fruit_wt_per_plant']))
    {
        $avg_fruit_wt_per_plant_normal = $info['normal']['avg_fruit_wt_per_plant'];
    }
    $avg_fruit_wt_per_plant_replica = "";
    if(is_array($info)&& !empty($info['replica']['avg_fruit_wt_per_plant']))
    {
        $avg_fruit_wt_per_plant_replica = $info['replica']['avg_fruit_wt_per_plant'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('AVG_FRUIT_WT_PER_PLANT');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" class="form-control" name="normal[avg_fruit_wt_per_plant]" value="<?php echo $avg_fruit_wt_per_plant_normal;?>" />
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" class="form-control" name="replica[avg_fruit_wt_per_plant]" value="<?php echo $avg_fruit_wt_per_plant_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[avg_fruit_wt_per_plant]" value="<?php echo $avg_fruit_wt_per_plant_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['average_harvested_plant']==1)
{
    $sum_of_no_of_plants_harvested_normal = 0;
    $sum_of_no_of_plants_harvested_replica = 0;

    foreach($harvest_data as $harvest)
    {
        $detail = json_decode($harvest['info'],true);

        $no_of_plants_harvested_normal = $detail['normal']['no_of_plants_harvested'];
        $no_of_plants_harvested_replica = $detail['replica']['no_of_plants_harvested'];
        $sum_of_no_of_plants_harvested_normal += $no_of_plants_harvested_normal;
        $sum_of_no_of_plants_harvested_replica += $no_of_plants_harvested_replica;
    }

    $avg_harvested_plant_normal = $this->lang->line("CANNOT_CALCULATE");;

    if($sum_of_no_of_plants_harvested_normal>0)
    {
        $avg_harvested_plant_normal = round($sum_of_no_of_plants_harvested_normal/sizeof($harvest_data), 2);
    }

    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('AVERAGE_HARVESTED_PLANT');?></label>
        </div>
        <div class="col-xs-3">
            <label class="form-control">
                <?php echo $avg_harvested_plant_normal; ?>
            </label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            $avg_harvested_plant_replica = $this->lang->line("CANNOT_CALCULATE");;

            if($sum_of_no_of_plants_harvested_normal>0)
            {
                $avg_harvested_plant_replica = round($sum_of_no_of_plants_harvested_normal/sizeof($harvest_data), 2);
            }

            ?>
            <div class="col-xs-3">
                <label class="form-control">
                    <?php echo $avg_harvested_plant_replica; ?>
                </label>
            </div>
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
<div class="row show-grid">
    <div class="col-xs-4">
        <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_TRIAL_STATUS');?></label>
    </div>
    <div class="col-xs-<?php echo $variety_info['replica_status']?6:3; ?>">
        <select class="form-control" name="trial_status">
            <?php
                foreach($this->config->item('trial_status') as $val=>$trial_status)
                {
                    ?>
                    <option value="<?php echo $val; ?>" <?php if($val==$variety_info['trial_status']){echo 'selected';}?>><?php echo $trial_status;?></option>
                    <?php
                }
            ?>
        </select>
    </div>
</div>

<script type="text/javascript">

    jQuery(document).ready(function()
    {
        $(document).on("keypress", ".ranking", function(event)
        {
            return isNumberKey(event);
        });

    });

</script>
