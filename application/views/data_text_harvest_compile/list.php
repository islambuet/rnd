<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


//echo '<pre>';
//print_r($harvest_data);
//echo '</pre>';


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
        <button class="btn-primary"><?php echo $key.'='.$rating; ?></button>
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
    $first_harvest_array = get_specific_array($harvest_data, 1);//hard coded 1 for first harvest
    $first_harvest_data = json_decode($first_harvest_array['info'],true);
    $first_harvesting_date_normal = $first_harvest_data['normal']['harvesting_date'];

    $first_harvest_time=System_helper::get_time($first_harvesting_date_normal);


    $first_harvest_text=$this->lang->line("NOT_SET");
    if($first_harvest_time>0)
    {
        $first_harvest_text=($first_harvest_time-$variety_info['sowing_date'])/(3600*24);
    }


?>
<div class="row show-grid">
    <div class="col-xs-4">
        <label class="control-label pull-right"><?php echo $this->lang->line('FIRST_HARVEST_DAYS');?></label>
    </div>



    <?php
    if($variety_info['replica_status']==1)
    {
        ?>
        <div class="col-xs-6">
            <label class="form-control"><?php echo $first_harvest_text;?></label>
        </div>
    <?php
    }
    else
    {
        ?>
        <div class="col-xs-3">
            <label class="form-control"><?php echo $first_harvest_text;?></label>
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
    $last_harvest_time=System_helper::get_time($last_harvesting_date_normal);


    $last_harvest_text=$this->lang->line("NOT_SET");
    if($last_harvest_time>0)
    {
        $last_harvest_text=($last_harvest_time-$variety_info['sowing_date'])/(3600*24);
    }


?>
<div class="row show-grid">
    <div class="col-xs-4">
        <label class="control-label pull-right"><?php echo $this->lang->line('LAST_HARVEST_DAYS');?></label>
    </div>
    <?php
    if($variety_info['replica_status']==1)
    {
        ?>
        <div class="col-xs-6">
            <label class="form-control"><?php echo $last_harvest_text;?></label>
        </div>
    <?php
    }
    else
    {
        ?>
        <div class="col-xs-3">
            <label class="form-control"><?php echo $last_harvest_text;?></label>
        </div>
        <?php
    }
    ?>

</div>

<?php
    $interval_text='';
    if($first_harvest_time==0)
    {
        $interval_text=$this->lang->line("FIRST_HARVEST_DATE_NOT_SET");
    }
    elseif($last_harvest_time==0)
    {
        $interval_text=$this->lang->line("LAST_HARVEST_DATE_NOT_SET");
    }
    else
    {
        $interval_text=($last_harvest_time-$first_harvest_time)/(3600*24);
    }
?>
<div class="row show-grid">
    <div class="col-xs-4">
        <label class="control-label pull-right"><?php echo $this->lang->line('INTERVAL_FIRST_AND_LAST_HARVEST');?></label>
    </div>
    <?php
    if($variety_info['replica_status']==1)
    {
        ?>
        <div class="col-xs-6">
            <label class="form-control"><?php echo $interval_text;?></label>
        </div>
    <?php
    }
    else
    {
        ?>
        <div class="col-xs-3">
            <label class="form-control"><?php echo $interval_text;?></label>
        </div>
        <?php
    }
    ?>
</div>

<div class="row show-grid">
    <div class="col-xs-4">
        <label class="control-label pull-right"><?php echo $this->lang->line('TOTAL_NO_OF_HARVEST');?></label>
    </div>
    <?php
    if($variety_info['replica_status']==1)
    {
        ?>
        <div class="col-xs-6">
            <label class="form-control"><?php echo $total_harvest;?></label>
        </div>
    <?php
    }
    else
    {
        ?>
        <div class="col-xs-3">
            <label class="form-control"><?php echo $total_harvest;?></label>
        </div>
    <?php
    }
    ?>
</div>

<?php
if($options['total_harv_curds']==1)
{
    $sum_no_of_plants_harvested_normal = 0;
    $sum_no_of_plants_harvested_replica = 0;

    foreach($harvest_data as $harvest)
    {
        $detail = json_decode($harvest['info'],true);
        $no_of_plants_harvested_normal = $detail['normal']['no_of_plants_harvested'];
        $no_of_plants_harvested_replica = $detail['replica']['no_of_plants_harvested'];
        $sum_no_of_plants_harvested_normal += $no_of_plants_harvested_normal;
        $sum_no_of_plants_harvested_replica += $no_of_plants_harvested_replica;
    }

    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('TOTAL_HARV_CURDS');?></label>
        </div>

        <div class="col-xs-3">
            <label class="form-control"><?php echo $sum_no_of_plants_harvested_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $sum_no_of_plants_harvested_replica;?></label>
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
            <label class="form-control"><?php echo $sum_total_harvested_wt_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $sum_total_harvested_wt_replica;?></label>
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
            <label class="form-control"><?php echo $sum_total_mrkt_curds_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $sum_total_mrkt_curds_replica;?></label>
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
        $detail = json_decode($harvest['info'],true);
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
            <label class="form-control"><?php echo $sum_total_mrkt_curd_wt_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $sum_total_mrkt_curd_wt_replica;?></label>
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
    $sum_no_of_plants_harvested_normal = 0;
    $sum_no_of_plants_harvested_replica = 0;

    $sum_total_mrkt_curds_normal = 0;
    $sum_total_mrkt_curds_replica = 0;

    foreach($harvest_data as $harvest)
    {
        $detail = json_decode($harvest['info'],true);
        $total_mrkt_curds_normal = $detail['normal']['total_mrkt_curds'];
        $total_mrkt_curds_replica = $detail['replica']['total_mrkt_curds'];
        $sum_total_mrkt_curds_normal += $total_mrkt_curds_normal;
        $sum_total_mrkt_curds_replica += $total_mrkt_curds_replica;

        $no_of_plants_harvested_normal = $detail['normal']['no_of_plants_harvested'];
        $no_of_plants_harvested_replica = $detail['replica']['no_of_plants_harvested'];
        $sum_no_of_plants_harvested_normal += $no_of_plants_harvested_normal;
        $sum_no_of_plants_harvested_replica += $no_of_plants_harvested_replica;
    }

    $percentage_of_marketed_curds_normal = $this->lang->line("CANNOT_CALCULATE");
    if(($sum_no_of_plants_harvested_normal>0) && ($sum_total_mrkt_curds_normal>0))
    {
        $percentage_of_marketed_curds_normal = round(($sum_total_mrkt_curds_normal/$sum_no_of_plants_harvested_normal)*100, 2);
    }
    $percentage_of_marketed_curds_replica = $this->lang->line("CANNOT_CALCULATE");

    if(($sum_total_mrkt_curds_replica>0) && ($sum_no_of_plants_harvested_replica)>0)
    {
        $percentage_of_marketed_curds_replica = round(($sum_total_mrkt_curds_replica/$sum_no_of_plants_harvested_replica)*100, 2);
    }

    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('PERCENTAGE_OF_MRKT_CURD');?></label>
        </div>

        <div class="col-xs-3">
            <label class="form-control"><?php echo $percentage_of_marketed_curds_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $percentage_of_marketed_curds_replica;?></label>
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
        $detail = json_decode($harvest['info'],true);
        $total_mrkt_curd_wt_normal = $detail['normal']['total_mrkt_curd_wt'];
        $total_mrkt_curd_wt_replica = $detail['replica']['total_mrkt_curd_wt'];
        $sum_total_mrkt_curd_wt_normal += $total_mrkt_curd_wt_normal;
        $sum_total_mrkt_curd_wt_replica += $total_mrkt_curd_wt_replica;
    }
    $percentage_of_marketed_curds_weight_normal=$this->lang->line("CANNOT_CALCULATE");
    if(($sum_total_mrkt_curd_wt_normal>0) && ($sum_total_harvested_wt_normal>0))
    {
        $percentage_of_marketed_curds_weight_normal = round(($sum_total_mrkt_curd_wt_normal/$sum_total_harvested_wt_normal)*100, 2);
    }
    $percentage_of_marketed_curds_weight_replica=$this->lang->line("CANNOT_CALCULATE");

    if(($sum_total_mrkt_curd_wt_replica>0) && ($sum_total_harvested_wt_replica>0))
    {
        $percentage_of_marketed_curds_weight_replica = round(($sum_total_mrkt_curd_wt_replica/$sum_total_harvested_wt_replica)*100, 2);
    }

    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('PERCENTAGE_OF_MRKT_CURD_WT');?></label>
        </div>

        <div class="col-xs-3">
            <label class="form-control"><?php echo $percentage_of_marketed_curds_weight_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $percentage_of_marketed_curds_weight_replica;?></label>
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
    $sum_no_of_plants_harvested_normal = 0;
    $sum_no_of_plants_harvested_replica = 0;

    foreach($harvest_data as $harvest)
    {
        $detail = json_decode($harvest['info'],true);
        $no_of_plants_harvested_normal = $detail['normal']['no_of_plants_harvested'];
        $no_of_plants_harvested_replica = $detail['replica']['no_of_plants_harvested'];

        $sum_no_of_plants_harvested_normal += $no_of_plants_harvested_normal;
        $sum_no_of_plants_harvested_replica += $no_of_plants_harvested_replica;
    }
    $average_curd_weight_normal=$this->lang->line("CANNOT_CALCULATE");

    if(($sum_total_harvested_wt_normal>0) && ($sum_no_of_plants_harvested_normal>0))
    {
        $average_curd_weight_normal = round($sum_total_harvested_wt_normal/$sum_no_of_plants_harvested_normal, 2);
    }

    $average_curd_weight_replica = $this->lang->line("CANNOT_CALCULATE");
    if(($sum_total_harvested_wt_replica>0) && ($sum_no_of_plants_harvested_replica>0))
    {
        $average_curd_weight_replica = round($sum_total_harvested_wt_replica/$sum_no_of_plants_harvested_replica, 2);
    }


    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('AVG_CURD_WT');?></label>
        </div>

        <div class="col-xs-3">
            <label class="form-control"><?php echo $average_curd_weight_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $average_curd_weight_replica;?></label>
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
    $sum_no_of_plants_harvested_normal = 0;
    $sum_no_of_plants_harvested_replica = 0;

    foreach($harvest_data as $harvest)
    {
        $detail = json_decode($harvest['info'],true);
        $no_of_plants_harvested_normal = $detail['normal']['no_of_plants_harvested'];
        $no_of_plants_harvested_replica = $detail['replica']['no_of_plants_harvested'];
        $sum_no_of_plants_harvested_normal += $no_of_plants_harvested_normal;
        $sum_no_of_plants_harvested_replica += $no_of_plants_harvested_replica;
    }

    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('TOTAL_HARV_HEADS');?></label>
        </div>

        <div class="col-xs-3">
            <label class="form-control"><?php echo $sum_no_of_plants_harvested_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $sum_no_of_plants_harvested_replica;?></label>
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
            <label class="form-control"><?php echo $sum_total_harvested_wt_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $sum_total_harvested_wt_replica;?></label>
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
            <label class="form-control"><?php echo $sum_total_mrkt_heads_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $sum_total_mrkt_heads_replica;?></label>
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
        $detail = json_decode($harvest['info'],true);
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
            <label class="form-control"><?php echo $sum_total_mrkt_head_wt_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $sum_total_mrkt_head_wt_replica;?></label>
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
    $sum_no_of_plants_harvested_normal = 0;
    $sum_no_of_plants_harvested_replica = 0;

    $sum_total_mrkt_heads_normal = 0;
    $sum_total_mrkt_heads_replica = 0;

    foreach($harvest_data as $harvest)
    {
        $detail = json_decode($harvest['info'],true);
        $total_mrkt_heads_normal = $detail['normal']['total_mrkt_heads'];
        $total_mrkt_heads_replica = $detail['replica']['total_mrkt_heads'];
        $sum_total_mrkt_heads_normal += $total_mrkt_heads_normal;
        $sum_total_mrkt_heads_replica += $total_mrkt_heads_replica;

        $no_of_plants_harvested_normal = $detail['normal']['no_of_plants_harvested'];
        $no_of_plants_harvested_replica = $detail['replica']['no_of_plants_harvested'];
        $sum_no_of_plants_harvested_normal += $no_of_plants_harvested_normal;
        $sum_no_of_plants_harvested_replica += $no_of_plants_harvested_replica;
    }
    $percentage_of_marketed_heads_normal=$this->lang->line("CANNOT_CALCULATE");
    if(($sum_total_mrkt_heads_normal>0)&&($sum_no_of_plants_harvested_normal>0))
    {
        $percentage_of_marketed_heads_normal = round(($sum_total_mrkt_heads_normal/$sum_no_of_plants_harvested_normal)*100, 2);
    }



    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('PERCENTAGE_OF_MRKT_HEAD');?></label>
        </div>

        <div class="col-xs-3">
            <label class="form-control"><?php echo $percentage_of_marketed_heads_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            $percentage_of_marketed_heads_replica=$this->lang->line("CANNOT_CALCULATE");
            if(($sum_total_mrkt_heads_replica>0)&&($sum_no_of_plants_harvested_replica>0))
            {
                $percentage_of_marketed_heads_replica = round(($sum_total_mrkt_heads_replica/$sum_no_of_plants_harvested_replica)*100, 2);
            }

            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $percentage_of_marketed_heads_replica;?></label>
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
        $detail = json_decode($harvest['info'],true);
        $total_mrkt_head_wt_normal = $detail['normal']['total_mrkt_head_wt'];
        $total_mrkt_head_wt_replica = $detail['replica']['total_mrkt_head_wt'];
        $sum_total_mrkt_head_wt_normal += $total_mrkt_head_wt_normal;
        $sum_total_mrkt_head_wt_replica += $total_mrkt_head_wt_replica;
    }
    $percentage_of_marketed_heads_weight_normal=$this->lang->line("CANNOT_CALCULATE");
    if(($sum_total_mrkt_head_wt_normal>0)&&($sum_total_harvested_wt_normal>0))
    {
        $percentage_of_marketed_heads_weight_normal = round(($sum_total_mrkt_head_wt_normal/$sum_total_harvested_wt_normal)*100, 2);
    }




    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('PERCENTAGE_OF_MRKT_HEAD_WT');?></label>
        </div>

        <div class="col-xs-3">
            <label class="form-control"><?php echo $percentage_of_marketed_heads_weight_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            $percentage_of_marketed_heads_weight_replica=$this->lang->line("CANNOT_CALCULATE");
            if(($sum_total_mrkt_head_wt_replica>0)&&($sum_total_harvested_wt_replica>0))
            {
                $percentage_of_marketed_heads_weight_replica = round(($sum_total_mrkt_head_wt_replica/$sum_total_harvested_wt_replica)*100, 2);
            }

            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $percentage_of_marketed_heads_weight_replica;?></label>
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
    $sum_no_of_plants_harvested_normal = 0;
    $sum_no_of_plants_harvested_replica = 0;

    foreach($harvest_data as $harvest)
    {
        $detail = json_decode($harvest['info'],true);
        $no_of_plants_harvested_normal = $detail['normal']['no_of_plants_harvested'];
        $no_of_plants_harvested_replica = $detail['replica']['no_of_plants_harvested'];
        $sum_no_of_plants_harvested_normal += $no_of_plants_harvested_normal;
        $sum_no_of_plants_harvested_replica += $no_of_plants_harvested_replica;
    }
    $average_head_weight_normal=$this->lang->line("CANNOT_CALCULATE");
    if(($sum_total_harvested_wt_normal>0)&&($sum_no_of_plants_harvested_normal>0))
    {
        $average_head_weight_normal = round($sum_total_harvested_wt_normal/$sum_no_of_plants_harvested_normal, 2);
    }


    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('AVG_HEAD_WT');?></label>
        </div>

        <div class="col-xs-3">
            <label class="form-control"><?php echo $average_head_weight_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            $average_head_weight_replica=$this->lang->line("CANNOT_CALCULATE");
            if(($sum_total_harvested_wt_replica>0)&&($sum_no_of_plants_harvested_replica>0))
            {
                $average_head_weight_replica = round($sum_total_harvested_wt_replica/$sum_no_of_plants_harvested_replica, 2);
            }

            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $average_head_weight_replica;?></label>
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

    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('TOTAL_HARV_FRUITS');?></label>
        </div>

        <div class="col-xs-3">
            <label class="form-control"><?php echo $sum_no_of_fruits_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $sum_no_of_fruits_replica;?></label>
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
            <label class="form-control"><?php echo $sum_total_harvested_wt_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $sum_total_harvested_wt_replica;?></label>
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
        $detail = json_decode($harvest['info'],true);
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
            <label class="form-control"><?php echo $sum_total_mrkt_fruits_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $sum_total_mrkt_fruits_replica;?></label>
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
        $detail = json_decode($harvest['info'],true);
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
            <label class="form-control"><?php echo $sum_total_mrkt_fruit_wt_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $sum_total_mrkt_fruit_wt_replica;?></label>
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
    $sum_of_no_of_fruits_normal = 0;
    $sum_of_no_of_fruits_replica = 0;

    foreach($harvest_data as $harvest)
    {
        $detail = json_decode($harvest['info'],true);
        $total_mrkt_fruits_normal = $detail['normal']['total_mrkt_fruits'];
        $total_mrkt_fruits_replica = $detail['replica']['total_mrkt_fruits'];
        $sum_total_mrkt_fruits_normal += $total_mrkt_fruits_normal;
        $sum_total_mrkt_fruits_replica += $total_mrkt_fruits_replica;

        $no_of_fruits_normal = $detail['normal']['no_of_fruits'];
        $no_of_fruits_replica = $detail['replica']['no_of_fruits'];
        $sum_of_no_of_fruits_normal += $no_of_fruits_normal;
        $sum_of_no_of_fruits_replica += $no_of_fruits_replica;
    }
    $percentage_of_marketed_fruits_normal=$this->lang->line("CANNOT_CALCULATE");
    if(($sum_total_mrkt_fruits_normal>0)&&($sum_of_no_of_fruits_normal>0))
    {
        $percentage_of_marketed_fruits_normal = round(($sum_total_mrkt_fruits_normal/$sum_of_no_of_fruits_normal)*100, 2);
    }



    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('PERCENTAGE_OF_MRKT_FRUIT');?></label>
        </div>

        <div class="col-xs-3">
            <label class="form-control"><?php echo $percentage_of_marketed_fruits_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            $percentage_of_marketed_fruits_replica=$this->lang->line("CANNOT_CALCULATE");
            if(($sum_total_mrkt_fruits_replica>0)&&($sum_of_no_of_fruits_replica>0))
            {
                $percentage_of_marketed_fruits_replica = round(($sum_total_mrkt_fruits_replica/$sum_of_no_of_fruits_replica)*100, 2);
            }



            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $percentage_of_marketed_fruits_replica;?></label>
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
        $detail = json_decode($harvest['info'],true);
        $total_mrkt_fruit_wt_normal = $detail['normal']['total_mrkt_fruit_wt'];
        $total_mrkt_fruit_wt_replica = $detail['replica']['total_mrkt_fruit_wt'];
        $sum_total_mrkt_fruit_wt_normal += $total_mrkt_fruit_wt_normal;
        $sum_total_mrkt_fruit_wt_replica += $total_mrkt_fruit_wt_replica;
    }
    $percentage_of_marketed_fruits_weight_normal=$this->lang->line("CANNOT_CALCULATE");
    if(($sum_total_mrkt_fruit_wt_normal>0)&&($sum_total_harvested_wt_normal>0))
    {
        $percentage_of_marketed_fruits_weight_normal = round(($sum_total_mrkt_fruit_wt_normal/$sum_total_harvested_wt_normal)*100, 2);
    }


    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('PERCENTAGE_OF_MRKT_FRUIT_WT');?></label>
        </div>

        <div class="col-xs-3">
            <label class="form-control"><?php echo $percentage_of_marketed_fruits_weight_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            $percentage_of_marketed_fruits_weight_replica=$this->lang->line("CANNOT_CALCULATE");
            if(($sum_total_mrkt_fruit_wt_replica>0)&&($sum_total_harvested_wt_replica>0))
            {
                $percentage_of_marketed_fruits_weight_replica = round(($sum_total_mrkt_fruit_wt_replica/$sum_total_harvested_wt_replica)*100, 2);
            }

            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $percentage_of_marketed_fruits_weight_replica;?></label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>


<?php
if($options['no_of_fruits_per_plant']==1)
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
    $percentage=$this->lang->line("CANNOT_CALCULATE");
    if(($sum_no_of_fruits_normal>0)&&($sum_no_of_plants_harvested_normal>0))
    {
        $percentage = round($sum_no_of_fruits_normal/$sum_no_of_plants_harvested_normal, 2);
    }

    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('NO_OF_FRUITS_PER_PLANT');?></label>
        </div>

        <div class="col-xs-3">
            <label class="form-control"><?php echo $percentage;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            $percentage=$this->lang->line("CANNOT_CALCULATE");
            if(($sum_no_of_fruits_replica>0)&&($sum_no_of_plants_harvested_replica>0))
            {
                $percentage = round($sum_no_of_fruits_replica/$sum_no_of_plants_harvested_replica, 2);
            }
            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $percentage;?></label>
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
    $sum_of_no_of_fruits_normal = 0;
    $sum_of_no_of_fruits_replica = 0;

    foreach($harvest_data as $harvest)
    {
        $detail = json_decode($harvest['info'],true);
        $no_of_fruits_normal = $detail['normal']['no_of_fruits'];
        $no_of_fruits_replica = $detail['replica']['no_of_fruits'];
        $sum_of_no_of_fruits_normal += $no_of_fruits_normal;
        $sum_of_no_of_fruits_replica += $no_of_fruits_replica;
    }
    $average_fruit_weight_normal=$this->lang->line("CANNOT_CALCULATE");
    if(($sum_total_harvested_wt_normal>0)&&($sum_of_no_of_fruits_normal>0))
    {
        $average_fruit_weight_normal = round($sum_total_harvested_wt_normal/$sum_of_no_of_fruits_normal, 2);
    }


    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('AVG_FRUIT_WT');?></label>
        </div>

        <div class="col-xs-3">
            <label class="form-control"><?php echo $average_fruit_weight_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            $average_fruit_weight_replica=$this->lang->line("CANNOT_CALCULATE");
            if(($sum_total_harvested_wt_replica>0)&&($sum_of_no_of_fruits_replica>0))
            {
                $average_fruit_weight_replica = round($sum_total_harvested_wt_replica/$sum_of_no_of_fruits_replica, 2);
            }

            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $average_fruit_weight_replica;?></label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>


<?php
if($options['fr_wt_per_plant']==1)
{
    $sum_fr_wt_per_plant_normal = 0;
    $sum_fr_wt_per_plant_replica = 0;

    foreach($harvest_data as $harvest)
    {
        $detail = json_decode($harvest['info'],true);
        $fr_wt_per_plant_normal = $detail['normal']['no_of_plants_harvested'];
        $fr_wt_per_plant_replica = $detail['replica']['no_of_plants_harvested'];
        $sum_fr_wt_per_plant_normal += $fr_wt_per_plant_normal;
        $sum_fr_wt_per_plant_replica += $fr_wt_per_plant_replica;
    }
    $average_fruit_weight_normal=$this->lang->line("CANNOT_CALCULATE");
    if(($sum_total_harvested_wt_normal>0)&&($sum_no_of_plants_harvested_normal>0))
    {
        $average_fruit_weight_normal = round($sum_total_harvested_wt_normal/$sum_no_of_plants_harvested_normal, 2);
    }


    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('FR_WT_PER_PLANT');?></label>
        </div>

        <div class="col-xs-3">
            <label class="form-control"><?php echo $average_fruit_weight_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            $average_fruit_weight_replica=$this->lang->line("CANNOT_CALCULATE");
            if(($sum_total_harvested_wt_replica>0)&&($sum_no_of_plants_harvested_replica>0))
            {
                $average_fruit_weight_replica = round($sum_total_harvested_wt_replica/$sum_no_of_plants_harvested_replica, 2);
            }

            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $average_fruit_weight_replica;?></label>
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
        $detail = json_decode($harvest['info'],true);
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
            <label class="form-control"><?php echo $sum_no_of_roots_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $sum_no_of_roots_replica;?></label>
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
            <label class="form-control"><?php echo $sum_total_harvested_wt_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $sum_total_harvested_wt_replica;?></label>
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
        $detail = json_decode($harvest['info'],true);
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
            <label class="form-control"><?php echo $sum_total_mrkt_roots_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $sum_total_mrkt_roots_replica;?></label>
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
        $detail = json_decode($harvest['info'],true);
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
            <label class="form-control"><?php echo $sum_total_mrkt_roots_wt_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $sum_total_mrkt_roots_wt_replica;?></label>
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
    $sum_no_of_roots_harvested_normal = 0;
    $sum_no_of_roots_harvested_replica = 0;

    foreach($harvest_data as $harvest)
    {
        $detail = json_decode($harvest['info'],true);
        $total_mrkt_roots_normal = $detail['normal']['total_mrkt_roots'];
        $total_mrkt_roots_replica = $detail['replica']['total_mrkt_roots'];
        $sum_total_mrkt_roots_normal += $total_mrkt_roots_normal;
        $sum_total_mrkt_roots_replica += $total_mrkt_roots_replica;

        $no_of_roots_harvested_normal = $detail['normal']['no_of_roots_harvested'];
        $no_of_roots_harvested_replica = $detail['replica']['no_of_roots_harvested'];
        $sum_no_of_roots_harvested_normal += $no_of_roots_harvested_normal;
        $sum_no_of_roots_harvested_replica += $no_of_roots_harvested_replica;
    }

    $percentage_of_marketed_roots_normal=$this->lang->line("CANNOT_CALCULATE");
    if(($sum_total_mrkt_roots_normal>0)&&($sum_no_of_roots_harvested_normal>0))
    {
        $percentage_of_marketed_roots_normal = round(($sum_total_mrkt_roots_normal/$sum_no_of_roots_harvested_normal)*100, 2);
    }

    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('PERCENTAGE_OF_MRKT_ROOT');?></label>
        </div>

        <div class="col-xs-3">
            <label class="form-control"><?php echo $percentage_of_marketed_roots_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            $percentage_of_marketed_roots_replica=$this->lang->line("CANNOT_CALCULATE");
            if(($sum_total_mrkt_roots_replica>0)&&($sum_no_of_roots_harvested_replica>0))
            {
                $percentage_of_marketed_roots_replica = round(($sum_total_mrkt_roots_replica/$sum_no_of_roots_harvested_replica)*100, 2);
            }


            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $percentage_of_marketed_roots_replica;?></label>
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
        $detail = json_decode($harvest['info'],true);
        $total_mrkt_roots_wt_normal = $detail['normal']['total_mrkt_roots_wt'];
        $total_mrkt_roots_wt_replica = $detail['replica']['total_mrkt_roots_wt'];
        $sum_total_mrkt_roots_wt_normal += $total_mrkt_roots_wt_normal;
        $sum_total_mrkt_roots_wt_replica += $total_mrkt_roots_wt_replica;
    }

    $percentage_of_marketed_roots_weight_normal=$this->lang->line("CANNOT_CALCULATE");
    if(($sum_total_mrkt_roots_wt_normal>0)&&($sum_total_harvested_wt_normal>0))
    {
        $percentage_of_marketed_roots_weight_normal = round(($sum_total_mrkt_roots_wt_normal/$sum_total_harvested_wt_normal)*100, 2);
    }

    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('PERCENTAGE_OF_MRKT_ROOT_WT');?></label>
        </div>

        <div class="col-xs-3">
            <label class="form-control"><?php echo $percentage_of_marketed_roots_weight_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            $percentage_of_marketed_roots_weight_replica=$this->lang->line("CANNOT_CALCULATE");
            if(($sum_total_mrkt_roots_wt_replica>0)&&($sum_total_harvested_wt_replica>0))
            {
                $percentage_of_marketed_roots_weight_replica = round(($sum_total_mrkt_roots_wt_replica/$sum_total_harvested_wt_replica)*100, 2);
            }

            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $percentage_of_marketed_roots_weight_replica;?></label>
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
    $sum_no_of_roots_normal = 0;
    $sum_no_of_roots_replica = 0;
    foreach($harvest_data as $harvest)
    {
        $detail = json_decode($harvest['info'],true);
        $no_of_roots_normal = $detail['normal']['no_of_roots_harvested'];
        $no_of_roots_replica = $detail['replica']['no_of_roots_harvested'];
        $sum_no_of_roots_normal += $no_of_roots_normal;
        $sum_no_of_roots_replica += $no_of_roots_replica;
    }

    $average_root_weight_normal=$this->lang->line("CANNOT_CALCULATE");
    if(($sum_total_harvested_wt_normal>0)&&($sum_no_of_roots_normal>0))
    {
        $average_root_weight_normal = round($sum_total_harvested_wt_normal/$sum_no_of_roots_normal, 2);
    }

    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('AVG_ROOT_WT');?></label>
        </div>

        <div class="col-xs-3">
            <label class="form-control"><?php echo $average_root_weight_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            $average_root_weight_replica=$this->lang->line("CANNOT_CALCULATE");
            if(($sum_total_harvested_wt_replica>0)&&($sum_no_of_roots_replica>0))
            {
                $average_root_weight_replica = round($sum_total_harvested_wt_replica/$sum_no_of_roots_replica, 2);
            }

            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $average_root_weight_replica;?></label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>

<?php
if($options['total_no_of_leaves']==1)
{
    $sum_total_no_of_leaves_normal = 0;
    $sum_total_no_of_leaves_replica = 0;

    foreach($harvest_data as $harvest)
    {
        $detail = json_decode($harvest['info'],true);
        $total_no_of_leaves_normal = $detail['normal']['total_no_of_leaves'];
        $total_no_of_leaves_replica = $detail['replica']['total_no_of_leaves'];
        $sum_total_no_of_leaves_normal += $total_no_of_leaves_normal;
        $sum_total_no_of_leaves_replica += $total_no_of_leaves_replica;
    }

    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('TOTAL_NO_OF_LEAVES');?></label>
        </div>

        <div class="col-xs-3">
            <label class="form-control"><?php echo $sum_total_no_of_leaves_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $sum_total_no_of_leaves_replica;?></label>
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
            <label class="form-control"><?php echo $sum_total_harvested_wt_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $sum_total_harvested_wt_replica;?></label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>

<?php
if($options['total_mrkt_leaf']==1)
{
    $sum_total_mrkt_leaf_normal = 0;
    $sum_total_mrkt_leaf_replica = 0;
    foreach($harvest_data as $harvest)
    {
        $detail = json_decode($harvest['info'],true);
        $total_mrkt_leaf_normal = $detail['normal']['total_mrkt_leaf'];
        $total_mrkt_leaf_replica = $detail['replica']['total_mrkt_leaf'];
        $sum_total_mrkt_leaf_normal += $total_mrkt_leaf_normal;
        $sum_total_mrkt_leaf_replica += $total_mrkt_leaf_replica;
    }

    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('TOTAL_MRKT_LEAF');?></label>
        </div>

        <div class="col-xs-3">
            <label class="form-control"><?php echo $sum_total_mrkt_leaf_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $sum_total_mrkt_leaf_replica;?></label>
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
        $detail = json_decode($harvest['info'],true);
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
            <label class="form-control"><?php echo $sum_total_mrkt_leaf_wt_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $sum_total_mrkt_leaf_wt_replica;?></label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>

<?php
if($options['percentage_of_mrkt_leaf']==1)
{
    $sum_total_mrkt_leaf_normal = 0;
    $sum_total_mrkt_leaf_replica = 0;
    $sum_total_no_of_leaves_normal = 0;
    $sum_total_no_of_leaves_replica = 0;

    foreach($harvest_data as $harvest)
    {
        $detail = json_decode($harvest['info'],true);
        $total_mrkt_leaf_normal = $detail['normal']['total_mrkt_leaf'];
        $total_mrkt_leaf_replica = $detail['replica']['total_mrkt_leaf'];
        $sum_total_mrkt_leaf_normal += $total_mrkt_leaf_normal;
        $sum_total_mrkt_leaf_replica += $total_mrkt_leaf_replica;

        $total_no_of_leaves_normal = $detail['normal']['total_no_of_leaves'];
        $total_no_of_leaves_replica = $detail['replica']['total_no_of_leaves'];
        $sum_total_no_of_leaves_normal += $total_no_of_leaves_normal;
        $sum_total_no_of_leaves_replica += $total_no_of_leaves_replica;
    }

    $percentage_of_marketed_leafs_normal=$this->lang->line("CANNOT_CALCULATE");
    if(($sum_total_mrkt_leaf_normal>0)&&($sum_total_no_of_leaves_normal>0))
    {
        $percentage_of_marketed_leafs_normal = round(($sum_total_mrkt_leaf_normal/$sum_total_no_of_leaves_normal)*100, 2);
    }


    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('PERCENTAGE_OF_MRKT_LEAF');?></label>
        </div>

        <div class="col-xs-3">
            <label class="form-control"><?php echo $percentage_of_marketed_leafs_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            $percentage_of_marketed_leafs_replica=$this->lang->line("CANNOT_CALCULATE");
            if(($sum_total_mrkt_leaf_replica>0)&&($sum_total_no_of_leaves_replica>0))
            {
                $percentage_of_marketed_leafs_replica = round(($sum_total_mrkt_leaf_replica/$sum_total_no_of_leaves_replica)*100,2);
            }
            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $percentage_of_marketed_leafs_replica;?></label>
            </div>
        <?php
        }
        ?>
    </div>
<?php
}
?>

<?php
if($options['percentage_of_mrkt_leaf_wt']==1)
{
    $sum_total_mrkt_leaf_wt_normal = 0;
    $sum_total_mrkt_leaf_wt_replica = 0;

    foreach($harvest_data as $harvest)
    {
        $detail = json_decode($harvest['info'],true);
        $total_mrkt_leaf_wt_normal = $detail['normal']['total_mrkt_leaf_wt'];
        $total_mrkt_leaf_wt_replica = $detail['replica']['total_mrkt_leaf_wt'];
        $sum_total_mrkt_leaf_wt_normal += $total_mrkt_leaf_wt_normal;
        $sum_total_mrkt_leaf_wt_replica += $total_mrkt_leaf_wt_replica;
    }

    $percentage_of_marketed_leafs_weight_normal=$this->lang->line("CANNOT_CALCULATE");
    if(($sum_total_mrkt_leaf_wt_normal>0)&&($sum_total_harvested_wt_normal>0))
    {
        $percentage_of_marketed_leafs_weight_normal = round(($sum_total_mrkt_leaf_wt_normal/$sum_total_harvested_wt_normal)*100, 2);
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('PERCENTAGE_OF_MRKT_LEAF_WT');?></label>
        </div>

        <div class="col-xs-3">
            <label class="form-control"><?php echo $percentage_of_marketed_leafs_weight_normal;?></label>
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            $percentage_of_marketed_leafs_weight_replica=$this->lang->line("CANNOT_CALCULATE");
            if(($sum_total_mrkt_leaf_wt_replica>0)&&($sum_total_harvested_wt_replica>0))
            {
                $percentage_of_marketed_leafs_weight_replica = round(($sum_total_mrkt_leaf_wt_replica/$sum_total_harvested_wt_replica)*100, 2);
            }

            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo $percentage_of_marketed_leafs_weight_replica;?></label>
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
        <label class="control-label pull-right"><?php echo $this->lang->line('AVERAGE_UNIFORMITY');?></label>
    </div>

    <div class="col-xs-3">
        <label class="form-control"><?php echo round($sum_uniformity_normal/$total_harvest, 2);?></label>
    </div>

    <?php
    if($variety_info['replica_status']==1)
    {
        ?>
        <div class="col-xs-3">
            <label class="form-control"><?php echo round($sum_uniformity_replica/$total_harvest, 2);?></label>
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

    $accepted_normal=1;
    if(is_array($info)&& isset($info['normal']['accepted']))
    {
        $accepted_normal=$info['normal']['accepted'];
    }
    $accepted_replica=1;
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
        <input type="radio" name="normal[accepted]" value="1" <?php if($accepted_normal!=0){echo 'checked';} ?>><?php echo $this->lang->line('LABEL_YES');?>
        <input type="radio" name="normal[accepted]" value="0" <?php if($accepted_normal==0){echo 'checked';} ?>><?php echo $this->lang->line('LABEL_NO');?>
    </div>
    <?php
    if($variety_info['replica_status']==1)
    {
        ?>
        <div class="col-xs-3">
            <input type="radio" name="replica[accepted]" value="1" <?php if($accepted_replica!=0){echo 'checked';} ?>><?php echo $this->lang->line('LABEL_YES');?>
            <input type="radio" name="replica[accepted]" value="0" <?php if($accepted_replica==0){echo 'checked';} ?>><?php echo $this->lang->line('LABEL_NO');?>
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

    ?>
<div class="row show-grid">
    <div class="col-xs-4">
        <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_REMARKS');?></label>
    </div>

    <?php
    if($variety_info['replica_status']==1)
    {
        ?>
        <div class="col-xs-6">
            <textarea class="form-control" name="normal[remarks]"><?php echo $remarks_normal; ?></textarea>
        </div>
    <?php
    }
    else
    {
        ?>
        <div class="col-xs-3">
            <textarea class="form-control" name="normal[remarks]"><?php echo $remarks_normal; ?></textarea>
        </div>
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


<script type="text/javascript">

    jQuery(document).ready(function()
    {
        $(document).on("keypress", ".ranking", function(event)
        {
            return isNumberKey(event);
        });

    });

</script>
