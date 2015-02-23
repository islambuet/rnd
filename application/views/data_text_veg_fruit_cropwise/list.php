<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$info=json_decode($variety_info['info'],true);

$flowering_data = json_decode($flowering_data['info'], true);
$fruit_data = json_decode($fruit_data['info'], true);
$compile_data = json_decode($compile_data['info'], true);

echo '<pre>';
print_r($fruit_data);
echo '</pre>';

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
    $sample_code_normal="";
    if(is_array($info)&& !empty($info['normal']['sample_code']))
    {
        $sample_code_normal=$info['normal']['sample_code'];
    }
    $sample_code_replica="";
    if(is_array($info)&& !empty($info['replica']['sample_code']))
    {
        $sample_code_replica=$info['replica']['sample_code'];
    }
?>
<div class="row show-grid">
    <div class="col-xs-4">
        <label class="control-label pull-right"><?php echo $this->lang->line('SAMPLE_CODE');?></label>
    </div>

    <div class="col-xs-3">
        <input type="text" id="sample_code" name="normal[sample_code]" class="form-control" value="<?php echo $sample_code_normal;?>" />
    </div>

    <?php
    if($variety_info['replica_status']==1)
    {
        ?>
        <div class="col-xs-3">
            <input type="text" name="replica[sample_code]" class="form-control" value="<?php echo $sample_code_replica;?>" />
        </div>
    <?php
    }
    else
    {
        ?>
        <input type="hidden" name="replica[sample_code]" value="<?php echo $sample_code_replica;?>">
    <?php
    }
    ?>

</div>


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
            <label class="control-label"><?php echo $flowering_data['normal']['1st_curd_formation']; ?></label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="control-label"><?php echo $flowering_data['replica']['1st_curd_formation']; ?></label>
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
            <label class="control-label"><?php echo $flowering_data['normal']['1st_head_formation']; ?></label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="control-label"><?php echo $flowering_data['replica']['1st_head_formation']; ?></label>
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
            <label class="control-label"><?php echo $flowering_data['normal']['1st_flowering_days']; ?></label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="control-label"><?php echo $flowering_data['replica']['1st_flowering_days']; ?></label>
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
            <label class="control-label"><?php echo $flowering_data['normal']['1st_root_formation']; ?></label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="control-label"><?php echo $flowering_data['replica']['1st_root_formation']; ?></label>
            </div>
        <?php
        }
        ?>

    </div>
<?php
}
?>

<!-- HOW FIRST CUTTING WILL COME FROM FLOWERING???-->
<?php
if($options['first_cutting']==1)
{
    $first_cutting_normal="";
    if(is_array($info)&& !empty($info['normal']['first_cutting']))
    {
        $first_cutting_normal=$info['normal']['first_cutting'];
    }
    $first_cutting_replica="";
    if(is_array($info)&& !empty($info['replica']['first_cutting']))
    {
        $first_cutting_replica=$info['replica']['first_cutting'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('FIRST_CUTTING');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" id="first_cutting_normal" class="form-control" name="normal[first_cutting]" value="<?php echo $first_cutting_normal; ?>" />
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" id="first_cutting_replica" class="form-control" name="replica[first_cutting]" value="<?php echo $first_cutting_replica; ?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[first_cutting]" value="<?php echo $first_cutting_replica;?>">
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
            <label class="control-label"><?php echo $flowering_data['normal']['50_percent_curd_formation_days']; ?></label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="control-label"><?php echo $flowering_data['replica']['50_percent_curd_formation_days']; ?></label>
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
            <label class="control-label"><?php echo $flowering_data['normal']['50_percent_head_formation_days']; ?></label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="control-label"><?php echo $flowering_data['replica']['50_percent_head_formation_days']; ?></label>
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
            <label class="control-label"><?php echo $flowering_data['normal']['50_percent_flowering_days']; ?></label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="control-label"><?php echo $flowering_data['replica']['50_percent_flowering_days']; ?></label>
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
            <label class="control-label"><?php echo $flowering_data['normal']['50_percent_root_formation_days']; ?></label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="control-label"><?php echo $flowering_data['replica']['50_percent_root_formation_days']; ?></label>
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
    $last_cutting_normal="";
    if(is_array($info)&& !empty($info['normal']['last_cutting']))
    {
        $last_cutting_normal=$info['normal']['last_cutting'];
    }
    $last_cutting_replica="";
    if(is_array($info)&& !empty($info['replica']['last_cutting']))
    {
        $last_cutting_replica=$info['replica']['last_cutting'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LAST_CUTTING');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" id="last_cutting_normal" class="form-control" name="normal[last_cutting]" value="<?php echo $last_cutting_normal; ?>" />
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" id="last_cutting_replica" class="form-control" name="replica[last_cutting]" value="<?php echo $last_cutting_replica; ?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[last_cutting]" value="<?php echo $last_cutting_replica;?>">
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
    $first_harvesting_date_replica = $first_harvest_data['replica']['harvesting_date'];

    $sowing_date = $variety_info['sowing_date'];
    $date_difference_normal = (strtotime($first_harvesting_date_normal)-$sowing_date)/(60*60*24);

    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('FIRST_HARVEST');?></label>
        </div>
        <div class="col-xs-3">
            <label class="control-label"><?php echo $date_difference_normal;?></label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            $date_difference_replica = (strtotime($first_harvesting_date_replica)-$sowing_date)/(60*60*24);
            ?>
            <div class="col-xs-3">
                <label class="control-label"><?php echo $date_difference_replica;?></label>
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
    $no_of_cutting_normal="";
    if(is_array($info)&& !empty($info['normal']['no_of_cutting']))
    {
        $no_of_cutting_normal=$info['normal']['no_of_cutting'];
    }
    $no_of_cutting_replica="";
    if(is_array($info)&& !empty($info['replica']['no_of_cutting']))
    {
        $no_of_cutting_replica=$info['replica']['no_of_cutting'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('NO_OF_CUTTING');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" class="form-control" name="normal[no_of_cutting]" value="<?php echo $no_of_cutting_normal; ?>" />
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" class="form-control" name="replica[no_of_cutting]" value="<?php echo $no_of_cutting_replica; ?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[no_of_cutting]" value="<?php echo $no_of_cutting_replica;?>">
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
    $last_harvesting_date_replica = $last_harvest_data['replica']['harvesting_date'];
    $sowing_date = $variety_info['sowing_date'];
    $date_difference_normal = (strtotime($last_harvesting_date_normal)-$sowing_date)/(60*60*24);

    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LAST_HARVEST');?></label>
        </div>
        <div class="col-xs-3">
            <label class="control-label"><?php echo $date_difference_normal; ?></label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            $date_difference_replica = (strtotime($last_harvesting_date_replica)-$sowing_date)/(60*60*24);
            ?>
            <div class="col-xs-3">
                <label class="control-label"><?php echo $date_difference_replica; ?></label>
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
        <div class="col-xs-3">
            <label class="control-label"><?php echo sizeof($harvest_data); ?></label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="control-label"><?php echo sizeof($harvest_data);; ?></label>
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
            <label class="control-label">
                <?php
                    foreach($this->config->item('fc_curd_colour_'.$crop_id) as $val=>$name)
                    {
                        if($val==$fruit_data['normal']['curd_colour'])
                        {
                            echo $name;
                        }
                    }
                ?>
            </label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="control-label">
                    <?php
                    foreach($this->config->item('fc_curd_colour_'.$crop_id) as $val=>$name)
                    {
                        if($val==$fruit_data['replica']['curd_colour'])
                        {
                            echo $name;
                        }
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
            <label class="control-label pull-right"><?php echo $this->lang->line('CURD_COLOUR_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <label class="control-label">
                <?php
                    foreach($this->config->item('rating') as $val=>$name)
                    {
                        if($val==$fruit_data['normal']['curd_colour_evaluation'])
                        {
                            echo $name;
                        }
                    }
                ?>
            </label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="control-label">
                    <?php
                    foreach($this->config->item('rating') as $val=>$name)
                    {
                        if($val==$fruit_data['replica']['curd_colour_evaluation'])
                        {
                            echo $name;
                        }
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
            <label class="control-label">
                <?php
                    foreach($this->config->item('fc_head_colour') as $val=>$name)
                    {
                        if($val==$fruit_data['normal']['head_colour'])
                        {
                            echo $name;
                        }
                    }
                ?>
            </label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="control-label">
                    <?php
                        foreach($this->config->item('fc_head_colour') as $val=>$name)
                        {
                            if($val==$fruit_data['replica']['head_colour'])
                            {
                                echo $name;
                            }
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
            <label class="control-label pull-right"><?php echo $this->lang->line('HEAD_COLOUR_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <label class="control-label">
                <?php
                    foreach($this->config->item('rating') as $val=>$name)
                    {
                        if($val==$fruit_data['normal']['head_colour_evaluation'])
                        {
                            echo $name;
                        }
                    }
                ?>
            </label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="control-label">
                    <?php
                        foreach($this->config->item('rating') as $val=>$name)
                        {
                            if($val==$fruit_data['replica']['head_colour_evaluation'])
                            {
                                echo $name;
                            }
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
            <label class="control-label">
                <?php
                foreach($this->config->item('fc_fruit_colour_'.$crop_id) as $val=>$name)
                {
                    if($val==$fruit_data['normal']['fruit_colour'])
                    {
                        echo $name;
                    }
                }
                ?>
            </label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="control-label">
                    <?php
                    foreach($this->config->item('fc_fruit_colour_'.$crop_id) as $val=>$name)
                    {
                        if($val==$fruit_data['replica']['fruit_colour'])
                        {
                            echo $name;
                        }
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
            <label class="control-label pull-right"><?php echo $this->lang->line('FRUIT_COLOUR_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <label class="control-label">
                <?php
                foreach($this->config->item('rating') as $val=>$name)
                {
                    if($val==$fruit_data['normal']['fruit_colour_evaluation'])
                    {
                        echo $name;
                    }
                }
                ?>
            </label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="control-label">
                    <?php
                    foreach($this->config->item('rating') as $val=>$name)
                    {
                        if($val==$fruit_data['replica']['fruit_colour_evaluation'])
                        {
                            echo $name;
                        }
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
            <label class="control-label">
                <?php
                    foreach($this->config->item('fc_root_colour_'.$crop_id) as $val=>$name)
                    {
                        if($val==$fruit_data['normal']['root_colour'])
                        {
                            echo $name;
                        }
                    }
                ?>
            </label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="control-label">
                    <?php
                        foreach($this->config->item('fc_root_colour_'.$crop_id) as $val=>$name)
                        {
                            if($val==$fruit_data['replica']['root_colour'])
                            {
                                echo $name;
                            }
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
            <label class="control-label pull-right"><?php echo $this->lang->line('ROOT_COLOUR_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <label class="control-label">
                <?php
                    foreach($this->config->item('rating') as $val=>$name)
                    {
                        if($val==$fruit_data['normal']['root_colour_evaluation'])
                        {
                            echo $name;
                        }
                    }
                ?>
            </label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="control-label">
                    <?php
                        foreach($this->config->item('rating') as $val=>$name)
                        {
                            if($val==$fruit_data['replica']['root_colour_evaluation'])
                            {
                                echo $name;
                            }
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
            <label class="control-label">
                <?php
                    foreach($this->config->item('fc_leaf_colour') as $val=>$name)
                    {
                        if($val==$fruit_data['normal']['leaf_colour'])
                        {
                            echo $name;
                        }
                    }
                ?>
            </label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="control-label">
                    <?php
                        foreach($this->config->item('fc_leaf_colour') as $val=>$name)
                        {
                            if($val==$fruit_data['replica']['leaf_colour'])
                            {
                                echo $name;
                            }
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
            <label class="control-label pull-right"><?php echo $this->lang->line('LEAF_COLOUR_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <label class="control-label">
                <?php
                    foreach($this->config->item('rating') as $val=>$name)
                    {
                        if($val==$fruit_data['normal']['leaf_colour_evaluation'])
                        {
                            echo $name;
                        }
                    }
                ?>
            </label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="control-label">
                    <?php
                        foreach($this->config->item('rating') as $val=>$name)
                        {
                            if($val==$fruit_data['replica']['leaf_colour_evaluation'])
                            {
                                echo $name;
                            }
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
            <label class="control-label">
                <?php echo $fruit_data['normal']['leaf_length'];?>
            </label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="control-label">
                    <?php echo $fruit_data['replica']['leaf_length'];?>
                </label>
            </div>
        <?php
        }
        ?>
    </div>

    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LEAF_LENGTH_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <label class="control-label">
                <?php
                    foreach($this->config->item('rating') as $val=>$name)
                    {
                        if($val==$fruit_data['normal']['leaf_length_evaluation'])
                        {
                            echo $name;
                        }
                    }
                ?>
            </label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="control-label">
                    <?php
                        foreach($this->config->item('rating') as $val=>$name)
                        {
                            if($val==$fruit_data['replica']['leaf_length_evaluation'])
                            {
                                echo $name;
                            }
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
            <label class="control-label">
                <?php
                    foreach($this->config->item('fc_leaf_type') as $val=>$name)
                    {
                        if($val==$fruit_data['normal']['leaf_type'])
                        {
                            echo $name;
                        }
                    }
                ?>
            </label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="control-label">
                    <?php
                        foreach($this->config->item('fc_leaf_type') as $val=>$name)
                        {
                            if($val==$fruit_data['replica']['leaf_type'])
                            {
                                echo $name;
                            }
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
            <label class="control-label pull-right"><?php echo $this->lang->line('LEAF_TYPE_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <label class="control-label">
                <?php
                    foreach($this->config->item('rating') as $val=>$name)
                    {
                        if($val==$fruit_data['normal']['leaf_type_evaluation'])
                        {
                            echo $name;
                        }
                    }
                ?>
            </label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="control-label">
                    <?php
                        foreach($this->config->item('rating') as $val=>$name)
                        {
                            if($val==$fruit_data['replica']['leaf_type_evaluation'])
                            {
                                echo $name;
                            }
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
            <label class="control-label pull-right"><?php echo $this->lang->line('FRUIT_SIZE');?></label>
        </div>
        <div class="col-xs-3">
            <label class="control-label">
                <?php
                    foreach($this->config->item('fc_fruit_size') as $val=>$name)
                    {
                        if($val==$fruit_data['normal']['fruit_size'])
                        {
                            echo $name;
                        }
                    }
                ?>
            </label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="control-label">
                    <?php
                        foreach($this->config->item('fc_fruit_size') as $val=>$name)
                        {
                            if($val==$fruit_data['replica']['fruit_size'])
                            {
                                echo $name;
                            }
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
            <label class="control-label pull-right"><?php echo $this->lang->line('FRUIT_SIZE_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <label class="control-label">
                <?php
                    foreach($this->config->item('rating') as $val=>$name)
                    {
                        if($val==$fruit_data['normal']['fruit_size_evaluation'])
                        {
                            echo $name;
                        }
                    }
                ?>
            </label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="control-label">
                    <?php
                        foreach($this->config->item('rating') as $val=>$name)
                        {
                            if($val==$fruit_data['replica']['fruit_size_evaluation'])
                            {
                                echo $name;
                            }
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





<script type="text/javascript">

    jQuery(document).ready(function()
    {
        $( "#first_curd_formation_normal" ).datepicker({dateFormat : display_date_format});
        $( "#first_curd_formation_replica" ).datepicker({dateFormat : display_date_format});

        $( "#first_head_formation_normal" ).datepicker({dateFormat : display_date_format});
        $( "#first_head_formation_replica" ).datepicker({dateFormat : display_date_format});

        $( "#first_root_normal" ).datepicker({dateFormat : display_date_format});
        $( "#first_root_replica" ).datepicker({dateFormat : display_date_format});

        $( "#first_cutting_normal" ).datepicker({dateFormat : display_date_format});
        $( "#first_cutting_replica" ).datepicker({dateFormat : display_date_format});

        $( "#fifty_percent_curd_formation_normal" ).datepicker({dateFormat : display_date_format});
        $( "#fifty_percent_curd_formation_replica" ).datepicker({dateFormat : display_date_format});

        $( "#fifty_percent_head_formation_normal" ).datepicker({dateFormat : display_date_format});
        $( "#fifty_percent_head_formation_replica" ).datepicker({dateFormat : display_date_format});

        $( "#fifty_percent_flow_normal" ).datepicker({dateFormat : display_date_format});
        $( "#fifty_percent_flow_replica" ).datepicker({dateFormat : display_date_format});

        $( "#fifty_percent_root_normal" ).datepicker({dateFormat : display_date_format});
        $( "#fifty_percent_root_replica" ).datepicker({dateFormat : display_date_format});

        $( "#last_cutting_normal" ).datepicker({dateFormat : display_date_format});
        $( "#last_cutting_replica" ).datepicker({dateFormat : display_date_format});

        $( "#first_harvest_normal" ).datepicker({dateFormat : display_date_format});
        $( "#first_harvest_replica" ).datepicker({dateFormat : display_date_format});

        $( "#last_harvest_normal" ).datepicker({dateFormat : display_date_format});
        $( "#last_harvest_replica" ).datepicker({dateFormat : display_date_format});
    });


</script>