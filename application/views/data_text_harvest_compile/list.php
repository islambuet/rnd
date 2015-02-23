<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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

    $info = json_decode($variety_info['info'],true);//info of this variety

    $sum_no_of_plants_normal = 0;
    $sum_no_of_plants_replica = 0;
    $sum_total_harvested_wt_normal = 0;
    $sum_total_harvested_wt_replica = 0;

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
    </div>
<?php
}
?>

<div class="row show-grid">
    <div class="col-xs-4">
        <label class="control-label pull-right"><?php echo $this->lang->line('INITIAL_PLANTS_DURING_TRIAL_STARTED');?></label>
    </div>

    <div class="col-xs-3">
        <label class="control-label"><?php echo $variety_info['initial_plants'];?></label>
    </div>

    <?php
    if($variety_info['replica_status']==1)
    {
        ?>
        <div class="col-xs-3">
            <label class="control-label"><?php echo $variety_info['initial_plants'];?></label>
        </div>
    <?php
    }
    ?>
</div>

<?php
    $first_harvest_array = get_specific_array($harvest_data, 1);//hard coded 1 for first harverst
    $first_harvest_data = json_decode($first_harvest_array['info'],true);
    $first_harvesting_date_normal = $first_harvest_data['normal']['harvesting_date'];
    $first_harvesting_date_replica = $first_harvest_data['replica']['harvesting_date'];
?>
<div class="row show-grid">
    <div class="col-xs-4">
        <label class="control-label pull-right"><?php echo $this->lang->line('FIRST_HARVEST_DAYS');?></label>
    </div>

    <div class="col-xs-3">
        <label class="control-label"><?php echo $first_harvesting_date_normal;?></label>
    </div>

    <?php
    if($variety_info['replica_status']==1)
    {
        ?>
        <div class="col-xs-3">
            <label class="control-label"><?php echo $first_harvesting_date_replica;?></label>
        </div>
    <?php
    }
    ?>
</div>

<?php
    $total_harvest = sizeof($harvest_data);//check needed
    $last_harvest_array = get_specific_array($harvest_data, $total_harvest);
    $last_harvest_data = json_decode($last_harvest_array['info'],true);
    $last_harvesting_date_normal = $last_harvest_data['normal']['harvesting_date'];
    $last_harvesting_date_replica = $last_harvest_data['replica']['harvesting_date'];

?>
<div class="row show-grid">
    <div class="col-xs-4">
        <label class="control-label pull-right"><?php echo $this->lang->line('LAST_HARVEST_DAYS');?></label>
    </div>

    <div class="col-xs-3">
        <label class="control-label"><?php echo $last_harvesting_date_normal;?></label>
    </div>

    <?php
    if($variety_info['replica_status']==1)
    {
        ?>
        <div class="col-xs-3">
            <label class="control-label"><?php echo $last_harvesting_date_replica;?></label>
        </div>
    <?php
    }
    ?>

</div>

<?php
    $interval_of_harvest_normal = ((strtotime($last_harvesting_date_normal) - strtotime($first_harvesting_date_normal))/(60*60*24));
    $interval_of_harvest_replica = ((strtotime($last_harvesting_date_replica) - strtotime($first_harvesting_date_replica))/(60*60*24));
?>
<div class="row show-grid">
    <div class="col-xs-4">
        <label class="control-label pull-right"><?php echo $this->lang->line('INTERVAL_FIRST_AND_LAST_HARVEST');?></label>
    </div>

    <div class="col-xs-3">
        <label class="control-label"><?php echo $interval_of_harvest_normal;?></label>
    </div>

    <?php
    if($variety_info['replica_status']==1)
    {
        ?>
        <div class="col-xs-3">
            <label class="control-label"><?php echo $interval_of_harvest_replica;?></label>
        </div>
    <?php
    }
    ?>
</div>

<div class="row show-grid">
    <div class="col-xs-4">
        <label class="control-label pull-right"><?php echo $this->lang->line('TOTAL_NO_OF_HARVEST');?></label>
    </div>

    <div class="col-xs-3">
        <label class="control-label"><?php echo $total_harvest;?></label>
    </div>
</div>

<?php
if($options['total_harv_curds']==1)
{
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('TOTAL_HARV_CURDS');?></label>
        </div>

        <div class="col-xs-3">
            <label class="control-label"><?php echo $sum_no_of_plants_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="control-label"><?php echo $sum_no_of_plants_replica;?></label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>

<?php
if($options['total_curd_wt']==1)
{
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('TOTAL_CURD_WT');?></label>
        </div>

        <div class="col-xs-3">
            <label class="control-label"><?php echo $sum_total_harvested_wt_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="control-label"><?php echo $sum_total_harvested_wt_replica;?></label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>

<?php
if($options['total_market_curds']==1)
{
    $sum_total_mrkt_curds_normal = 0;
    $sum_total_mrkt_curds_replica = 0;
    foreach($harvest_data as $harvest)
    {
        $detail = json_decode($harvest['info'],true);
        $total_mrkt_curds_normal = $detail['normal']['total_mrkt_curds'];
        $total_mrkt_curds_replica = $detail['replica']['total_mrkt_curds'];
        $sum_total_mrkt_curds_normal += $total_mrkt_curds_normal;
        $sum_total_mrkt_curds_replica += $total_mrkt_curds_replica;
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('TOTAL_MARKET_CURDS');?></label>
        </div>

        <div class="col-xs-3">
            <label class="control-label"><?php echo $sum_total_mrkt_curds_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="control-label"><?php echo $sum_total_mrkt_curds_replica;?></label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>

<?php
if($options['total_market_curd_wt']==1)
{
    $sum_total_mrkt_curd_wt_normal = 0;
    $sum_total_mrkt_curd_wt_replica = 0;
    foreach($harvest_data as $harvest)
    {
        $total_mrkt_curd_wt_normal = $detail['normal']['total_mrkt_curd_wt'];
        $total_mrkt_curd_wt_replica = $detail['replica']['total_mrkt_curd_wt'];
        $sum_total_mrkt_curd_wt_normal += $total_mrkt_curd_wt_normal;
        $sum_total_mrkt_curd_wt_replica += $total_mrkt_curd_wt_replica;
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('TOTAL_MARKET_CURD_WT');?></label>
        </div>

        <div class="col-xs-3">
            <label class="control-label"><?php echo $sum_total_mrkt_curd_wt_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="control-label"><?php echo $sum_total_mrkt_curd_wt_replica;?></label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>

<?php
if($options['percentage_of_mrkt_curd']==1)
{
    $sum_total_mrkt_curds_normal = 0;
    $sum_total_mrkt_curds_replica = 0;
    foreach($harvest_data as $harvest)
    {
        $detail = json_decode($harvest['info'],true);
        $total_mrkt_curds_normal = $detail['normal']['total_mrkt_curds'];
        $total_mrkt_curds_replica = $detail['replica']['total_mrkt_curds'];
        $sum_total_mrkt_curds_normal += $total_mrkt_curds_normal;
        $sum_total_mrkt_curds_replica += $total_mrkt_curds_replica;
    }

    if(!empty($sum_no_of_plants_normal) && !empty($sum_total_mrkt_curds_normal))
    {
        $percentage_of_marketed_curds_normal = round(($sum_total_mrkt_curds_normal/$sum_no_of_plants_normal)*100, 2);
    }
    else
    {
        $percentage_of_marketed_curds_normal = '';
    }

    if(!empty($sum_total_mrkt_curds_replica) && !empty($sum_no_of_plants_replica))
    {
        $percentage_of_marketed_curds_replica = round(($sum_total_mrkt_curds_replica/$sum_no_of_plants_replica)*100, 2);
    }
    else
    {
        $percentage_of_marketed_curds_replica = '';
    }

    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('PERCENTAGE_OF_MRKT_CURD');?></label>
        </div>

        <div class="col-xs-3">
            <label class="control-label"><?php echo $percentage_of_marketed_curds_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="control-label"><?php echo $percentage_of_marketed_curds_replica;?></label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>

<?php
if($options['percentage_of_mrkt_curd_wt']==1)
{
    $sum_total_mrkt_curd_wt_normal = 0;
    $sum_total_mrkt_curd_wt_replica = 0;
    foreach($harvest_data as $harvest)
    {
        $total_mrkt_curd_wt_normal = $detail['normal']['total_mrkt_curd_wt'];
        $total_mrkt_curd_wt_replica = $detail['replica']['total_mrkt_curd_wt'];
        $sum_total_mrkt_curd_wt_normal += $total_mrkt_curd_wt_normal;
        $sum_total_mrkt_curd_wt_replica += $total_mrkt_curd_wt_replica;
    }

    if(!empty($sum_total_mrkt_curd_wt_normal) && !empty($sum_total_harvested_wt_normal))
    {
        $percentage_of_marketed_curds_weight_normal = round(($sum_total_mrkt_curd_wt_normal/$sum_total_harvested_wt_normal)*100, 2);
    }
    else
    {
        $percentage_of_marketed_curds_weight_normal = '';
    }

    if(!empty($sum_total_mrkt_curd_wt_replica) && !empty($sum_total_harvested_wt_replica))
    {
        $percentage_of_marketed_curds_weight_replica = round(($sum_total_mrkt_curd_wt_replica/$sum_total_harvested_wt_replica)*100, 2);
    }
    else
    {
        $percentage_of_marketed_curds_weight_replica = '';
    }

    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('PERCENTAGE_OF_MRKT_CURD_WT');?></label>
        </div>

        <div class="col-xs-3">
            <label class="control-label"><?php echo $percentage_of_marketed_curds_weight_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="control-label"><?php echo $percentage_of_marketed_curds_weight_replica;?></label>
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
    if(!empty($sum_total_harvested_wt_normal) && !empty($sum_no_of_plants_normal))
    {
        $average_curd_weight_normal = round($sum_total_harvested_wt_normal/$sum_no_of_plants_normal, 2);
    }
    else
    {
        $average_curd_weight_normal = '';
    }

    if(!empty($sum_total_harvested_wt_replica) && !empty($sum_no_of_plants_replica))
    {
        $average_curd_weight_replica = round($sum_total_harvested_wt_replica/$sum_no_of_plants_replica, 2);
    }
    else
    {
        $average_curd_weight_replica = '';
    }

    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('AVG_CURD_WT');?></label>
        </div>

        <div class="col-xs-3">
            <label class="control-label"><?php echo $average_curd_weight_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="control-label"><?php echo $average_curd_weight_replica;?></label>
            </div>
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['total_harv_heads']==1)
{
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('TOTAL_HARV_HEADS');?></label>
        </div>

        <div class="col-xs-3">
            <label class="control-label"><?php echo $sum_no_of_plants_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="control-label"><?php echo $sum_no_of_plants_replica;?></label>
            </div>
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['total_head_wt']==1)
{
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('TOTAL_HEAD_WT');?></label>
        </div>

        <div class="col-xs-3">
            <label class="control-label"><?php echo $sum_total_harvested_wt_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="control-label"><?php echo $sum_total_harvested_wt_replica;?></label>
            </div>
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['total_market_heads']==1)
{
    $sum_total_mrkt_heads_normal = 0;
    $sum_total_mrkt_heads_replica = 0;
    foreach($harvest_data as $harvest)
    {
        $detail = json_decode($harvest['info'],true);
        $total_mrkt_heads_normal = $detail['normal']['total_mrkt_heads'];
        $total_mrkt_heads_replica = $detail['replica']['total_mrkt_heads'];
        $sum_total_mrkt_heads_normal += $total_mrkt_heads_normal;
        $sum_total_mrkt_heads_replica += $total_mrkt_heads_replica;
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('TOTAL_MARKET_HEADS');?></label>
        </div>

        <div class="col-xs-3">
            <label class="control-label"><?php echo $sum_total_mrkt_heads_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="control-label"><?php echo $sum_total_mrkt_heads_replica;?></label>
            </div>
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['total_market_head_wt']==1)
{
    $sum_total_mrkt_head_wt_normal = 0;
    $sum_total_mrkt_head_wt_replica = 0;
    foreach($harvest_data as $harvest)
    {
        $total_mrkt_head_wt_normal = $detail['normal']['total_mrkt_head_wt'];
        $total_mrkt_head_wt_replica = $detail['replica']['total_mrkt_head_wt'];
        $sum_total_mrkt_head_wt_normal += $total_mrkt_head_wt_normal;
        $sum_total_mrkt_head_wt_replica += $total_mrkt_head_wt_replica;
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('TOTAL_MARKET_HEAD_WT');?></label>
        </div>

        <div class="col-xs-3">
            <label class="control-label"><?php echo $sum_total_mrkt_head_wt_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="control-label"><?php echo $sum_total_mrkt_head_wt_replica;?></label>
            </div>
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['percentage_of_mrkt_head']==1)
{
    $sum_total_mrkt_heads_normal = 0;
    $sum_total_mrkt_heads_replica = 0;
    foreach($harvest_data as $harvest)
    {
        $detail = json_decode($harvest['info'],true);
        $total_mrkt_heads_normal = $detail['normal']['total_mrkt_heads'];
        $total_mrkt_heads_replica = $detail['replica']['total_mrkt_heads'];
        $sum_total_mrkt_heads_normal += $total_mrkt_heads_normal;
        $sum_total_mrkt_heads_replica += $total_mrkt_heads_replica;
    }

    $percentage_of_marketed_heads_normal = round(($sum_total_mrkt_heads_normal/$sum_no_of_plants_normal)*100, 2);
    $percentage_of_marketed_heads_replica = round(($sum_total_mrkt_heads_replica/$sum_no_of_plants_replica)*100, 2);

    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('PERCENTAGE_OF_MRKT_HEAD');?></label>
        </div>

        <div class="col-xs-3">
            <label class="control-label"><?php echo $percentage_of_marketed_heads_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="control-label"><?php echo $percentage_of_marketed_heads_replica;?></label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>

<?php
if($options['percentage_of_mrkt_head_wt']==1)
{
    $sum_total_mrkt_head_wt_normal = 0;
    $sum_total_mrkt_head_wt_replica = 0;
    foreach($harvest_data as $harvest)
    {
        $total_mrkt_head_wt_normal = $detail['normal']['total_mrkt_head_wt'];
        $total_mrkt_head_wt_replica = $detail['replica']['total_mrkt_head_wt'];
        $sum_total_mrkt_head_wt_normal += $total_mrkt_head_wt_normal;
        $sum_total_mrkt_head_wt_replica += $total_mrkt_head_wt_replica;
    }

    $percentage_of_marketed_heads_weight_normal = round(($sum_total_mrkt_head_wt_normal/$sum_total_harvested_wt_normal)*100, 2);
    $percentage_of_marketed_heads_weight_replica = round(($sum_total_mrkt_head_wt_replica/$sum_total_harvested_wt_replica)*100, 2);

    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('PERCENTAGE_OF_MRKT_HEAD_WT');?></label>
        </div>

        <div class="col-xs-3">
            <label class="control-label"><?php echo $percentage_of_marketed_heads_weight_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="control-label"><?php echo $percentage_of_marketed_heads_weight_replica;?></label>
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
    $average_head_weight_normal = round($sum_total_harvested_wt_normal/$sum_no_of_plants_normal, 2);
    $average_head_weight_replica = round($sum_total_harvested_wt_replica/$sum_no_of_plants_replica, 2);
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('AVG_HEAD_WT');?></label>
        </div>

        <div class="col-xs-3">
            <label class="control-label"><?php echo $average_head_weight_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="control-label"><?php echo $average_head_weight_replica;?></label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>

<?php
if($options['total_harv_fruits']==1)
{
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('TOTAL_HARV_FRUITS');?></label>
        </div>

        <div class="col-xs-3">
            <label class="control-label"><?php echo $sum_no_of_plants_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="control-label"><?php echo $sum_no_of_plants_replica;?></label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>

<?php
if($options['total_fruit_wt']==1)
{
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('TOTAL_FRUIT_WT');?></label>
        </div>

        <div class="col-xs-3">
            <label class="control-label"><?php echo $total_harvested_wt_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="control-label"><?php echo $total_harvested_wt_replica;?></label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>

<?php
if($options['total_market_fruits']==1)
{
    $sum_total_mrkt_fruits_normal = 0;
    $sum_total_mrkt_fruits_replica = 0;
    foreach($harvest_data as $harvest)
    {
        $total_mrkt_fruits_normal = $detail['normal']['total_mrkt_fruits'];
        $total_mrkt_fruits_replica = $detail['replica']['total_mrkt_fruits'];
        $sum_total_mrkt_fruits_normal += $total_mrkt_fruits_normal;
        $sum_total_mrkt_fruits_replica += $total_mrkt_fruits_replica;
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('TOTAL_MARKET_FRUITS');?></label>
        </div>

        <div class="col-xs-3">
            <label class="control-label"><?php echo $sum_total_mrkt_fruits_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="control-label"><?php echo $sum_total_mrkt_fruits_replica;?></label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>

<?php
if($options['total_market_fruit_wt']==1)
{
    $sum_total_mrkt_fruit_wt_normal = 0;
    $sum_total_mrkt_fruit_wt_replica = 0;
    foreach($harvest_data as $harvest)
    {
        $total_mrkt_fruit_wt_normal = $detail['normal']['total_mrkt_fruit_wt'];
        $total_mrkt_fruit_wt_replica = $detail['replica']['total_mrkt_fruit_wt'];
        $sum_total_mrkt_fruit_wt_normal += $total_mrkt_fruit_wt_normal;
        $sum_total_mrkt_fruit_wt_replica += $total_mrkt_fruit_wt_replica;
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('TOTAL_MARKET_FRUIT_WT');?></label>
        </div>

        <div class="col-xs-3">
            <label class="control-label"><?php echo $sum_total_mrkt_fruit_wt_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="control-label"><?php echo $sum_total_mrkt_fruit_wt_replica;?></label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>

<?php
if($options['percentage_of_mrkt_fruit']==1)
{
    $sum_total_mrkt_fruits_normal = 0;
    $sum_total_mrkt_fruits_replica = 0;
    foreach($harvest_data as $harvest)
    {
        $total_mrkt_fruits_normal = $detail['normal']['total_mrkt_fruits'];
        $total_mrkt_fruits_replica = $detail['replica']['total_mrkt_fruits'];
        $sum_total_mrkt_fruits_normal += $total_mrkt_fruits_normal;
        $sum_total_mrkt_fruits_replica += $total_mrkt_fruits_replica;
    }

    $percentage_of_marketed_fruits_normal = round(($sum_total_mrkt_fruits_normal/$sum_no_of_plants_normal)*100, 2);

    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('PERCENTAGE_OF_MRKT_FRUIT');?></label>
        </div>

        <div class="col-xs-3">
            <label class="control-label"><?php echo $percentage_of_marketed_fruits_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            $percentage_of_marketed_fruits_replica = round(($sum_total_mrkt_fruits_replica/$sum_no_of_plants_replica)*100, 2);

            ?>
            <div class="col-xs-3">
                <label class="control-label"><?php echo $percentage_of_marketed_fruits_replica;?></label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>

<?php
if($options['percentage_of_mrkt_fruit_wt']==1)
{
    $sum_total_mrkt_fruit_wt_normal = 0;
    $sum_total_mrkt_fruit_wt_replica = 0;
    foreach($harvest_data as $harvest)
    {
        $total_mrkt_fruit_wt_normal = $detail['normal']['total_mrkt_fruit_wt'];
        $total_mrkt_fruit_wt_replica = $detail['replica']['total_mrkt_fruit_wt'];
        $sum_total_mrkt_fruit_wt_normal += $total_mrkt_fruit_wt_normal;
        $sum_total_mrkt_fruit_wt_replica += $total_mrkt_fruit_wt_replica;
    }

    $percentage_of_marketed_fruits_weight_normal = round(($sum_total_mrkt_fruit_wt_normal/$sum_total_harvested_wt_normal)*100, 2);
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('PERCENTAGE_OF_MRKT_FRUIT_WT');?></label>
        </div>

        <div class="col-xs-3">
            <label class="control-label"><?php echo $percentage_of_marketed_fruits_weight_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            $percentage_of_marketed_fruits_weight_replica = round(($sum_total_mrkt_fruit_wt_replica/$sum_total_harvested_wt_replica)*100, 2);
            ?>
            <div class="col-xs-3">
                <label class="control-label"><?php echo $percentage_of_marketed_fruits_weight_replica;?></label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>

<?php
if($options['no_of_fruit_plant']==1)
{
    $sum_no_of_fruits_normal=0;
    $sum_no_of_fruits_replica=0;
    foreach($harvest_data as $harvest)
    {
        $no_of_fruits_normal = $detail['normal']['no_of_fruits'];
        $no_of_fruits_replica = $detail['replica']['no_of_fruits'];
        $sum_no_of_fruits_normal += $no_of_fruits_normal;
        $sum_no_of_fruits_replica += $no_of_fruits_replica;
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('NO_OF_FRUIT_PLANT');?></label>
        </div>

        <div class="col-xs-3">
            <label class="control-label"><?php echo $sum_no_of_fruits_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="control-label"><?php echo $sum_no_of_fruits_replica;?></label>
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
    $average_fruit_weight_normal = round($sum_total_harvested_wt_normal/$sum_no_of_plants_normal, 2);
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('AVG_FRUIT_WT');?></label>
        </div>

        <div class="col-xs-3">
            <label class="control-label"><?php echo $average_fruit_weight_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            $average_fruit_weight_replica = round($sum_total_harvested_wt_replica/$sum_no_of_plants_replica, 2);
            ?>
            <div class="col-xs-3">
                <label class="control-label"><?php echo $average_fruit_weight_replica;?></label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>

<?php
if($options['fr_wt_plant']==1)
{
    $average_fruit_weight_normal = round($sum_total_harvested_wt_normal/$sum_no_of_plants_normal, 2);
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('FR_WT_PLANT');?></label>
        </div>

        <div class="col-xs-3">
            <label class="control-label"><?php echo $average_fruit_weight_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            $average_fruit_weight_replica = round($sum_total_harvested_wt_replica/$sum_no_of_plants_replica, 2);
            ?>
            <div class="col-xs-3">
                <label class="control-label"><?php echo $average_fruit_weight_replica;?></label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>

<?php
if($options['total_harv_roots']==1)
{
    $sum_no_of_roots_normal = 0;
    $sum_no_of_roots_replica = 0;
    foreach($harvest_data as $harvest)
    {
        $no_of_roots_normal = $detail['normal']['no_of_roots_harvested'];
        $no_of_roots_replica = $detail['replica']['no_of_roots_harvested'];
        $sum_no_of_roots_normal += $no_of_roots_normal;
        $sum_no_of_roots_replica += $no_of_roots_replica;
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('TOTAL_HARV_ROOTS');?></label>
        </div>

        <div class="col-xs-3">
            <label class="control-label"><?php echo $sum_no_of_roots_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="control-label"><?php echo $sum_no_of_roots_replica;?></label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>

<?php
if($options['total_root_wt']==1)
{
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('TOTAL_ROOT_WT');?></label>
        </div>

        <div class="col-xs-3">
            <label class="control-label"><?php echo $total_harvested_wt_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="control-label"><?php echo $total_harvested_wt_replica;?></label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>

<?php
if($options['total_market_roots']==1)
{
    $sum_total_mrkt_roots_normal = 0;
    $sum_total_mrkt_roots_replica = 0;
    foreach($harvest_data as $harvest)
    {
        $total_mrkt_roots_normal = $detail['normal']['total_mrkt_roots'];
        $total_mrkt_roots_replica = $detail['replica']['total_mrkt_roots'];
        $sum_total_mrkt_roots_normal += $total_mrkt_roots_normal;
        $sum_total_mrkt_roots_replica += $total_mrkt_roots_replica;
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('TOTAL_MARKET_ROOTS');?></label>
        </div>

        <div class="col-xs-3">
            <label class="control-label"><?php echo $sum_total_mrkt_roots_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="control-label"><?php echo $sum_total_mrkt_roots_replica;?></label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>

<?php
if($options['total_market_root_wt']==1)
{
    $sum_total_mrkt_roots_wt_normal = 0;
    $sum_total_mrkt_roots_wt_replica = 0;
    foreach($harvest_data as $harvest)
    {
        $total_mrkt_roots_wt_normal = $detail['normal']['total_mrkt_roots_wt'];
        $total_mrkt_roots_wt_replica = $detail['replica']['total_mrkt_roots_wt'];
        $sum_total_mrkt_roots_wt_normal += $total_mrkt_roots_wt_normal;
        $sum_total_mrkt_roots_wt_replica += $total_mrkt_roots_wt_replica;
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('TOTAL_MARKET_ROOT_WT');?></label>
        </div>

        <div class="col-xs-3">
            <label class="control-label"><?php echo $sum_total_mrkt_roots_wt_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="control-label"><?php echo $sum_total_mrkt_roots_wt_replica;?></label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>

<?php
if($options['percentage_of_mrkt_root']==1)
{
    $sum_total_mrkt_roots_normal = 0;
    $sum_total_mrkt_roots_replica = 0;
    foreach($harvest_data as $harvest)
    {
        $total_mrkt_roots_normal = $detail['normal']['total_mrkt_roots'];
        $total_mrkt_roots_replica = $detail['replica']['total_mrkt_roots'];
        $sum_total_mrkt_roots_normal += $total_mrkt_roots_normal;
        $sum_total_mrkt_roots_replica += $total_mrkt_roots_replica;
    }

    $percentage_of_marketed_roots_normal = round(($sum_total_mrkt_roots_normal/$sum_no_of_roots_normal)*100, 2);

    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('PERCENTAGE_OF_MRKT_ROOT');?></label>
        </div>

        <div class="col-xs-3">
            <label class="control-label"><?php echo $percentage_of_marketed_roots_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            $percentage_of_marketed_roots_replica = round(($sum_total_mrkt_roots_replica/$sum_no_of_roots_replica)*100, 2);

            ?>
            <div class="col-xs-3">
                <label class="control-label"><?php echo $percentage_of_marketed_roots_replica;?></label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>

<?php
if($options['percentage_of_mrkt_root_wt']==1)
{
    $sum_total_mrkt_roots_wt_normal = 0;
    $sum_total_mrkt_roots_wt_replica = 0;
    foreach($harvest_data as $harvest)
    {
        $total_mrkt_roots_wt_normal = $detail['normal']['total_mrkt_roots_wt'];
        $total_mrkt_roots_wt_replica = $detail['replica']['total_mrkt_roots_wt'];
        $sum_total_mrkt_roots_wt_normal += $total_mrkt_roots_wt_normal;
        $sum_total_mrkt_roots_wt_replica += $total_mrkt_roots_wt_replica;
    }

    $percentage_of_marketed_roots_weight_normal = round(($sum_total_mrkt_roots_wt_normal/$sum_total_harvested_wt_normal)*100, 2);

    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('PERCENTAGE_OF_MRKT_ROOT_WT');?></label>
        </div>

        <div class="col-xs-3">
            <label class="control-label"><?php echo $percentage_of_marketed_roots_weight_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            $percentage_of_marketed_roots_weight_replica = round(($sum_total_mrkt_roots_wt_replica/$sum_total_harvested_wt_replica)*100, 2);
            ?>
            <div class="col-xs-3">
                <label class="control-label"><?php echo $percentage_of_marketed_roots_weight_replica;?></label>
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
    $average_root_weight_normal = round($sum_total_harvested_wt_normal/$sum_no_of_roots_normal, 2);

    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('AVG_ROOT_WT');?></label>
        </div>

        <div class="col-xs-3">
            <label class="control-label"><?php echo $average_root_weight_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            $average_root_weight_replica = round($sum_total_harvested_wt_replica/$sum_no_of_roots_replica, 2);
            ?>
            <div class="col-xs-3">
                <label class="control-label"><?php echo $average_root_weight_replica;?></label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>

<?php
if($options['total_leaf_wt']==1)
{
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('TOTAL_LEAF_WT');?></label>
        </div>

        <div class="col-xs-3">
            <label class="control-label"><?php echo $total_harvested_wt_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="control-label"><?php echo $total_harvested_wt_replica;?></label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>

<?php
if($options['total_market_leaf_wt']==1)
{
    $sum_total_mrkt_leaf_wt_normal = 0;
    $sum_total_mrkt_leaf_wt_replica = 0;
    foreach($harvest_data as $harvest)
    {
        $total_mrkt_leaf_wt_normal = $detail['normal']['total_mrkt_leaf_wt'];
        $total_mrkt_leaf_wt_replica = $detail['replica']['total_mrkt_leaf_wt'];
        $sum_total_mrkt_leaf_wt_normal += $total_mrkt_leaf_wt_normal;
        $sum_total_mrkt_leaf_wt_replica += $total_mrkt_leaf_wt_replica;
    }

    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('TOTAL_MARKET_LEAF_WT');?></label>
        </div>

        <div class="col-xs-3">
            <label class="control-label"><?php echo $sum_total_mrkt_leaf_wt_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="control-label"><?php echo $sum_total_mrkt_leaf_wt_replica;?></label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>


<!--Total Market leaf not exist in the excel sheet, how percentage will be calculated??-->

<?php
//if($options['percentage_of_mrkt_leaf']==1)
//{
//    $percentage_of_mrkt_leaf_normal="";
//    if(is_array($info)&& !empty($info['normal']['percentage_of_mrkt_leaf']))
//    {
//        $percentage_of_mrkt_leaf_normal=$info['normal']['percentage_of_mrkt_leaf'];
//    }
//    $percentage_of_mrkt_leaf_replica="";
//    if(is_array($info)&& !empty($info['replica']['percentage_of_mrkt_leaf']))
//    {
//        $percentage_of_mrkt_leaf_replica=$info['replica']['percentage_of_mrkt_leaf'];
//    }
//    ?>
<!--    <div class="row show-grid">-->
<!--        <div class="col-xs-4">-->
<!--            <label class="control-label pull-right">--><?php //echo $this->lang->line('PERCENTAGE_OF_MRKT_LEAF');?><!--</label>-->
<!--        </div>-->
<!---->
<!--        <div class="col-xs-3">-->
<!--            <input type="text" id="percentage_of_mrkt_leaf" name="normal[percentage_of_mrkt_leaf]" class="form-control" value="--><?php //echo $percentage_of_mrkt_leaf_normal;?><!--" />-->
<!--        </div>-->
<!---->
<!--        --><?php
//        if($variety_info['replica_status']==1)
//        {
//            ?>
<!--            <div class="col-xs-3">-->
<!--                <input type="text" name="replica[percentage_of_mrkt_leaf]" class="form-control" value="--><?php //echo $percentage_of_mrkt_leaf_replica;?><!--" />-->
<!--            </div>-->
<!--        --><?php
//        }
//        else
//        {
//            ?>
<!--            <input type="hidden" name="replica[percentage_of_mrkt_leaf]" value="--><?php //echo $percentage_of_mrkt_leaf_replica;?><!--">-->
<!--        --><?php
//        }
//        ?>
<!--    </div>-->
<?php
//}
//?>

<?php
if($options['percentage_of_mrkt_leaf_wt']==1)
{
    $sum_total_mrkt_leaf_wt_normal = 0;
    $sum_total_mrkt_leaf_wt_replica = 0;
    foreach($harvest_data as $harvest)
    {
        $total_mrkt_leaf_wt_normal = $detail['normal']['total_mrkt_leaf_wt'];
        $total_mrkt_leaf_wt_replica = $detail['replica']['total_mrkt_leaf_wt'];
        $sum_total_mrkt_leaf_wt_normal += $total_mrkt_leaf_wt_normal;
        $sum_total_mrkt_leaf_wt_replica += $total_mrkt_leaf_wt_replica;
    }

    $percentage_of_marketed_leafs_weight_normal = round(($sum_total_mrkt_leaf_wt_normal/$sum_total_harvested_wt_normal)*100, 2);


    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('PERCENTAGE_OF_MRKT_LEAF_WT');?></label>
        </div>

        <div class="col-xs-3">
            <label class="control-label"><?php echo $percentage_of_marketed_leafs_weight_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            $percentage_of_marketed_leafs_weight_replica = round(($sum_total_mrkt_leaf_wt_replica/$sum_total_harvested_wt_replica)*100, 2);
            ?>
            <div class="col-xs-3">
                <label class="control-label"><?php echo $percentage_of_marketed_leafs_weight_replica;?></label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>

<?php
    $f_holding_capacity_normal="";
    if(is_array($info)&& !empty($info['normal']['f_holding_capacity']))
    {
        $f_holding_capacity_normal=$info['normal']['f_holding_capacity'];
    }

    $f_holding_capacity_replica="";
    if(is_array($info)&& !empty($info['replica']['f_holding_capacity']))
    {
        $f_holding_capacity_replica=$info['replica']['f_holding_capacity'];
    }
?>
<div class="row show-grid">
    <div class="col-xs-4">
        <label class="control-label pull-right"><?php echo $this->lang->line('F_HOLDING_CAPACITY');?></label>
    </div>

    <div class="col-xs-3">
        <input type="text" id="f_holding_capacity" name="normal[f_holding_capacity]" class="form-control" value="<?php echo $f_holding_capacity_normal;?>" />
    </div>

    <?php
    if($variety_info['replica_status']==1)
    {
        ?>
        <div class="col-xs-3">
            <input type="text" name="replica[f_holding_capacity]" class="form-control" value="<?php echo $f_holding_capacity_replica;?>" />
        </div>
    <?php
    }
    else
    {
        ?>
        <input type="hidden" name="replica[f_holding_capacity]" value="<?php echo $f_holding_capacity_replica;?>">
    <?php
    }
    ?>
</div>

<?php

    $sum_uniformity_normal = 0;
    $sum_uniformity_replica = 0;

    foreach($harvest_data as $harvest)
    {
        $detail = json_decode($harvest['info'],true);

        if(isset($detail['normal']['curd_uniformity']))
        {
            $uniformity_normal = $detail['normal']['curd_uniformity'];
            $uniformity_replica = $detail['replica']['curd_uniformity'];
            $sum_uniformity_normal += $uniformity_normal;
            $sum_uniformity_replica += $uniformity_replica;
        }
        elseif(isset($detail['normal']['head_uniformity']))
        {
            $uniformity_normal = $detail['normal']['head_uniformity'];
            $uniformity_replica = $detail['replica']['head_uniformity'];
            $sum_uniformity_normal += $uniformity_normal;
            $sum_uniformity_replica += $uniformity_replica;
        }
        elseif(isset($detail['normal']['fruit_uniformity']))
        {
            $uniformity_normal = $detail['normal']['fruit_uniformity'];
            $uniformity_replica = $detail['replica']['fruit_uniformity'];
            $sum_uniformity_normal += $uniformity_normal;
            $sum_uniformity_replica += $uniformity_replica;
        }
        elseif(isset($detail['normal']['roots_uniformity']))
        {
            $uniformity_normal = $detail['normal']['roots_uniformity'];
            $uniformity_replica = $detail['replica']['roots_uniformity'];
            $sum_uniformity_normal += $uniformity_normal;
            $sum_uniformity_replica += $uniformity_replica;
        }
        elseif(isset($detail['normal']['leaf_uniformity']))
        {
            $uniformity_normal = $detail['normal']['leaf_uniformity'];
            $uniformity_replica = $detail['replica']['leaf_uniformity'];
            $sum_uniformity_normal += $uniformity_normal;
            $sum_uniformity_replica += $uniformity_replica;
        }
    }
?>

<div class="row show-grid">
    <div class="col-xs-4">
        <label class="control-label pull-right"><?php echo $this->lang->line('UNIFORMITY');?></label>
    </div>

    <div class="col-xs-3">
        <label class="control-label"><?php echo $sum_uniformity_normal;?></label>
    </div>

    <?php
    if($variety_info['replica_status']==1)
    {
        ?>
        <div class="col-xs-3">
            <label class="control-label"><?php echo $sum_uniformity_replica;?></label>
        </div>
    <?php
    }
    ?>
</div>


<?php
    $evaluation_normal="";
    if(is_array($info)&& !empty($info['normal']['evaluation']))
    {
        $evaluation_normal=$info['normal']['evaluation'];
    }
    $evaluation_replica="";
    if(is_array($info)&& !empty($info['replica']['evaluation']))
    {
        $evaluation_replica=$info['replica']['evaluation'];
    }
?>

<div class="row show-grid">
    <div class="col-xs-4">
        <label class="control-label pull-right"><?php echo $this->lang->line('EVALUATION');?></label>
    </div>
    <div class="col-xs-3">
        <select class="form-control" name="normal[evaluation]">
            <option value=""><?php echo $this->lang->line('SELECT');?></option>
            <?php foreach($this->config->item('rating') as $val=>$name){?>
                <option value="<?php echo $val;?>" <?php if($val==$evaluation_normal){echo 'selected';}?>><?php echo $name;?></option>
            <?php }?>
        </select>
    </div>
    <?php
    if($variety_info['replica_status']==1)
    {
        ?>
        <div class="col-xs-3">
            <select class="form-control" name="replica[evaluation]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$evaluation_replica){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
    <?php
    }
    else
    {
        ?>
        <input type="hidden" name="replica[evaluation]" value="<?php echo $evaluation_replica;?>">
    <?php
    }
    ?>
</div>


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