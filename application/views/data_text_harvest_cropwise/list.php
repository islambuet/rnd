<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//echo "<pre>";
//print_r($variety_info);
//echo "</pre>";
////echo "<pre>";
////print_r($options);
////echo "</pre>";
$info=json_decode($variety_info['info'],true);
//
//echo "<pre>";
//print_r($info);
//echo "</pre>";
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
if($options['harvesting_date']==1)
{
    $harvesting_date_normal="";
    if(is_array($info)&& !empty($info['normal']['harvesting_date']))
    {
        $harvesting_date_normal=$info['normal']['harvesting_date'];
    }
    $harvesting_date_replica="";
    if(is_array($info)&& !empty($info['replica']['harvesting_date']))
    {
        $harvesting_date_replica=$info['replica']['harvesting_date'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('HARVESTING_DATE');?></label>
        </div>

        <div class="col-xs-3">
            <input type="text" name="normal[harvesting_date]" class="form-control" value="<?php echo $harvesting_date_normal;?>" />
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[harvesting_date]" class="form-control" value="<?php echo $harvesting_date_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[harvesting_date]" value="<?php echo $harvesting_date_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['initial_plants_during_trial_started']==1)
{
    $initial_plants_normal="";
    if(is_array($info)&& !empty($info['normal']['initial_plants_during_trial_started']))
    {
        $initial_plants_normal=$info['normal']['initial_plants_during_trial_started'];
    }
    $initial_plants_replica="";
    if(is_array($info)&& !empty($info['replica']['initial_plants_during_trial_started']))
    {
        $initial_plants_replica=$info['replica']['initial_plants_during_trial_started'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('HARVESTING_DATE');?></label>
        </div>

        <div class="col-xs-3">
            <input type="text" name="normal[initial_plants_during_trial_started]" class="form-control" value="<?php echo $initial_plants_normal;?>" />
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[initial_plants_during_trial_started]" class="form-control" value="<?php echo $initial_plants_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[initial_plants_during_trial_started]" value="<?php echo $initial_plants_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

