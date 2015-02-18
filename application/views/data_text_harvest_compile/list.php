<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    $info=json_decode($variety_info['info'],true);
    $total_harvest = sizeof($harvest_data);

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

    $first_harvest_array = get_specific_array($harvest_data, 1);
    $last_harvest_array = get_specific_array($harvest_data, $total_harvest);

    $first_harvest_data = json_decode($first_harvest_array['info'],true);
    $last_harvest_data = json_decode($last_harvest_array['info'],true);

    $first_harvesting_date_normal = $first_harvest_data['normal']['harvesting_date'];
    $first_harvesting_date_replica = $first_harvest_data['replica']['harvesting_date'];

    $last_harvesting_date_normal = $last_harvest_data['normal']['harvesting_date'];
    $last_harvesting_date_replica = $last_harvest_data['replica']['harvesting_date'];

    $interval_of_harvest_normal = abs((strtotime($last_harvesting_date_normal) - strtotime($first_harvesting_date_normal))/(60*60*24));
    $interval_of_harvest_replica = abs((strtotime($last_harvesting_date_replica) - strtotime($first_harvesting_date_replica))/(60*60*24));

    $sum_no_of_plants_normal = '';
    $sum_no_of_plants_replica = '';

    $sum_total_harvested_wt_normal = '';
    $sum_total_harvested_wt_replica = '';

    $sum_total_mrkt_curds_normal = '';
    $sum_total_mrkt_curds_replica = '';

    $sum_total_mrkt_curd_wt_normal = '';
    $sum_total_mrkt_curd_wt_replica = '';

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

        $total_mrkt_curds_normal = $detail['normal']['total_mrkt_curds'];
        $total_mrkt_curds_replica = $detail['replica']['total_mrkt_curds'];
        $sum_total_mrkt_curds_normal += $total_mrkt_curds_normal;
        $sum_total_mrkt_curds_replica += $total_mrkt_curds_replica;

        $total_mrkt_curd_wt_normal = $detail['normal']['total_mrkt_curd_wt'];
        $total_mrkt_curd_wt_replica = $detail['replica']['total_mrkt_curd_wt'];
        $sum_total_mrkt_curd_wt_normal += $total_mrkt_curd_wt_normal;
        $sum_total_mrkt_curd_wt_replica += $total_mrkt_curd_wt_replica;
    }

    $percentage_of_marketed_curds_normal = ($sum_total_mrkt_curds_normal/$sum_no_of_plants_normal)*100;
    $percentage_of_marketed_curds_replica = ($sum_total_mrkt_curds_replica/$sum_no_of_plants_replica)*100;

    $percentage_of_marketed_curd_weight_normal = ($sum_total_mrkt_curd_wt_normal/$sum_total_harvested_wt_normal)*100;
    $percentage_of_marketed_curds_weight_replica = ($sum_total_mrkt_curd_wt_replica/$sum_total_harvested_wt_replica)*100;

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
    $percentage_of_mrkt_curd_normal="";
    if(is_array($info)&& !empty($info['normal']['percentage_of_mrkt_curd']))
    {
        $percentage_of_mrkt_curd_normal=$info['normal']['percentage_of_mrkt_curd'];
    }
    $percentage_of_mrkt_curd_replica="";
    if(is_array($info)&& !empty($info['replica']['percentage_of_mrkt_curd']))
    {
        $percentage_of_mrkt_curd_replica=$info['replica']['percentage_of_mrkt_curd'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('PERCENTAGE_OF_MRKT_CURD');?></label>
        </div>

        <div class="col-xs-3">
            <input type="text" id="percentage_of_mrkt_curd" name="normal[percentage_of_mrkt_curd]" class="form-control" value="<?php echo $percentage_of_mrkt_curd_normal;?>" />
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[percentage_of_mrkt_curd]" class="form-control" value="<?php echo $percentage_of_mrkt_curd_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[percentage_of_mrkt_curd]" value="<?php echo $percentage_of_mrkt_curd_replica;?>">
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
    $percentage_of_mrkt_curd_wt_normal="";
    if(is_array($info)&& !empty($info['normal']['percentage_of_mrkt_curd_wt']))
    {
        $percentage_of_mrkt_curd_wt_normal=$info['normal']['percentage_of_mrkt_curd_wt'];
    }
    $percentage_of_mrkt_curd_wt_replica="";
    if(is_array($info)&& !empty($info['replica']['percentage_of_mrkt_curd_wt']))
    {
        $percentage_of_mrkt_curd_wt_replica=$info['replica']['percentage_of_mrkt_curd_wt'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('PERCENTAGE_OF_MRKT_CURD_WT');?></label>
        </div>

        <div class="col-xs-3">
            <input type="text" id="percentage_of_mrkt_curd_wt" name="normal[percentage_of_mrkt_curd_wt]" class="form-control" value="<?php echo $percentage_of_mrkt_curd_wt_normal;?>" />
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[percentage_of_mrkt_curd_wt]" class="form-control" value="<?php echo $percentage_of_mrkt_curd_wt_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[percentage_of_mrkt_curd_wt]" value="<?php echo $percentage_of_mrkt_curd_wt_replica;?>">
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
    $avg_curd_wt_normal="";
    if(is_array($info)&& !empty($info['normal']['avg_curd_wt']))
    {
        $avg_curd_wt_normal=$info['normal']['avg_curd_wt'];
    }
    $avg_curd_wt_replica="";
    if(is_array($info)&& !empty($info['replica']['avg_curd_wt']))
    {
        $avg_curd_wt_replica=$info['replica']['avg_curd_wt'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('AVG_CURD_WT');?></label>
        </div>

        <div class="col-xs-3">
            <input type="text" id="avg_curd_wt" name="normal[avg_curd_wt]" class="form-control" value="<?php echo $avg_curd_wt_normal;?>" />
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[avg_curd_wt]" class="form-control" value="<?php echo $avg_curd_wt_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[avg_curd_wt]" value="<?php echo $avg_curd_wt_replica;?>">
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
    $total_harv_heads_normal="";
    if(is_array($info)&& !empty($info['normal']['total_harv_heads']))
    {
        $total_harv_heads_normal=$info['normal']['total_harv_heads'];
    }
    $total_harv_heads_replica="";
    if(is_array($info)&& !empty($info['replica']['total_harv_heads']))
    {
        $total_harv_heads_replica=$info['replica']['total_harv_heads'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('TOTAL_HARV_HEADS');?></label>
        </div>

        <div class="col-xs-3">
            <input type="text" id="total_harv_heads" name="normal[total_harv_heads]" class="form-control" value="<?php echo $total_harv_heads_normal;?>" />
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[total_harv_heads]" class="form-control" value="<?php echo $total_harv_heads_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[total_harv_heads]" value="<?php echo $total_harv_heads_replica;?>">
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
    $total_head_wt_normal="";
    if(is_array($info)&& !empty($info['normal']['total_head_wt']))
    {
        $total_head_wt_normal=$info['normal']['total_head_wt'];
    }
    $total_head_wt_replica="";
    if(is_array($info)&& !empty($info['replica']['total_head_wt']))
    {
        $total_head_wt_replica=$info['replica']['total_head_wt'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('TOTAL_HEAD_WT');?></label>
        </div>

        <div class="col-xs-3">
            <input type="text" id="total_head_wt" name="normal[total_head_wt]" class="form-control" value="<?php echo $total_head_wt_normal;?>" />
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[total_head_wt]" class="form-control" value="<?php echo $total_head_wt_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[total_head_wt]" value="<?php echo $total_head_wt_replica;?>">
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
    $total_market_heads_normal="";
    if(is_array($info)&& !empty($info['normal']['total_market_heads']))
    {
        $total_market_heads_normal=$info['normal']['total_market_heads'];
    }
    $total_market_heads_replica="";
    if(is_array($info)&& !empty($info['replica']['total_market_heads']))
    {
        $total_market_heads_replica=$info['replica']['total_market_heads'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('TOTAL_MARKET_HEADS');?></label>
        </div>

        <div class="col-xs-3">
            <input type="text" id="total_market_heads" name="normal[total_market_heads]" class="form-control" value="<?php echo $total_market_heads_normal;?>" />
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[total_market_heads]" class="form-control" value="<?php echo $total_market_heads_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[total_market_heads]" value="<?php echo $total_market_heads_replica;?>">
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
    $total_market_head_wt_normal="";
    if(is_array($info)&& !empty($info['normal']['total_market_head_wt']))
    {
        $total_market_head_wt_normal=$info['normal']['total_market_head_wt'];
    }
    $total_market_head_wt_replica="";
    if(is_array($info)&& !empty($info['replica']['total_market_head_wt']))
    {
        $total_market_head_wt_replica=$info['replica']['total_market_head_wt'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('TOTAL_MARKET_HEAD_WT');?></label>
        </div>

        <div class="col-xs-3">
            <input type="text" id="total_market_head_wt" name="normal[total_market_head_wt]" class="form-control" value="<?php echo $total_market_head_wt_normal;?>" />
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[total_market_head_wt]" class="form-control" value="<?php echo $total_market_head_wt_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[total_market_head_wt]" value="<?php echo $total_market_head_wt_replica;?>">
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
    $percentage_of_mrkt_head_normal="";
    if(is_array($info)&& !empty($info['normal']['percentage_of_mrkt_head']))
    {
        $percentage_of_mrkt_head_normal=$info['normal']['percentage_of_mrkt_head'];
    }
    $percentage_of_mrkt_head_replica="";
    if(is_array($info)&& !empty($info['replica']['percentage_of_mrkt_head']))
    {
        $percentage_of_mrkt_head_replica=$info['replica']['percentage_of_mrkt_head'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('PERCENTAGE_OF_MRKT_HEAD');?></label>
        </div>

        <div class="col-xs-3">
            <input type="text" id="percentage_of_mrkt_head" name="normal[percentage_of_mrkt_head]" class="form-control" value="<?php echo $percentage_of_mrkt_head_normal;?>" />
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[percentage_of_mrkt_head]" class="form-control" value="<?php echo $percentage_of_mrkt_head_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[percentage_of_mrkt_head]" value="<?php echo $percentage_of_mrkt_head_replica;?>">
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
    $percentage_of_mrkt_head_wt_normal="";
    if(is_array($info)&& !empty($info['normal']['percentage_of_mrkt_head_wt']))
    {
        $percentage_of_mrkt_head_wt_normal=$info['normal']['percentage_of_mrkt_head_wt'];
    }
    $percentage_of_mrkt_head_wt_replica="";
    if(is_array($info)&& !empty($info['replica']['percentage_of_mrkt_head_wt']))
    {
        $percentage_of_mrkt_head_wt_replica=$info['replica']['percentage_of_mrkt_head_wt'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('PERCENTAGE_OF_MRKT_HEAD_WT');?></label>
        </div>

        <div class="col-xs-3">
            <input type="text" id="percentage_of_mrkt_head_wt" name="normal[percentage_of_mrkt_head_wt]" class="form-control" value="<?php echo $percentage_of_mrkt_head_wt_normal;?>" />
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[percentage_of_mrkt_head_wt]" class="form-control" value="<?php echo $percentage_of_mrkt_head_wt_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[percentage_of_mrkt_head_wt]" value="<?php echo $percentage_of_mrkt_head_wt_replica;?>">
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
    $avg_head_wt_normal="";
    if(is_array($info)&& !empty($info['normal']['avg_head_wt']))
    {
        $avg_head_wt_normal=$info['normal']['avg_head_wt'];
    }
    $avg_head_wt_replica="";
    if(is_array($info)&& !empty($info['replica']['avg_head_wt']))
    {
        $avg_head_wt_replica=$info['replica']['avg_head_wt'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('AVG_HEAD_WT');?></label>
        </div>

        <div class="col-xs-3">
            <input type="text" id="avg_head_wt" name="normal[avg_head_wt]" class="form-control" value="<?php echo $avg_head_wt_normal;?>" />
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[avg_head_wt]" class="form-control" value="<?php echo $avg_head_wt_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[avg_head_wt]" value="<?php echo $avg_head_wt_replica;?>">
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
    $total_harv_fruits_normal="";
    if(is_array($info)&& !empty($info['normal']['total_harv_fruits']))
    {
        $total_harv_fruits_normal=$info['normal']['total_harv_fruits'];
    }
    $total_harv_fruits_replica="";
    if(is_array($info)&& !empty($info['replica']['total_harv_fruits']))
    {
        $total_harv_fruits_replica=$info['replica']['total_harv_fruits'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('TOTAL_HARV_FRUITS');?></label>
        </div>

        <div class="col-xs-3">
            <input type="text" id="total_harv_fruits" name="normal[total_harv_fruits]" class="form-control" value="<?php echo $total_harv_fruits_normal;?>" />
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[total_harv_fruits]" class="form-control" value="<?php echo $total_harv_fruits_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[total_harv_fruits]" value="<?php echo $total_harv_fruits_replica;?>">
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
    $total_fruit_wt_normal="";
    if(is_array($info)&& !empty($info['normal']['total_fruit_wt']))
    {
        $total_fruit_wt_normal=$info['normal']['total_fruit_wt'];
    }
    $total_fruit_wt_replica="";
    if(is_array($info)&& !empty($info['replica']['total_fruit_wt']))
    {
        $total_fruit_wt_replica=$info['replica']['total_fruit_wt'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('TOTAL_FRUIT_WT');?></label>
        </div>

        <div class="col-xs-3">
            <input type="text" id="total_fruit_wt" name="normal[total_fruit_wt]" class="form-control" value="<?php echo $total_fruit_wt_normal;?>" />
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[total_fruit_wt]" class="form-control" value="<?php echo $total_fruit_wt_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[total_fruit_wt]" value="<?php echo $total_fruit_wt_replica;?>">
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
    $total_market_fruits_normal="";
    if(is_array($info)&& !empty($info['normal']['total_market_fruits']))
    {
        $total_market_fruits_normal=$info['normal']['total_market_fruits'];
    }
    $total_market_fruits_replica="";
    if(is_array($info)&& !empty($info['replica']['total_market_fruits']))
    {
        $total_market_fruits_replica=$info['replica']['total_market_fruits'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('TOTAL_MARKET_FRUITS');?></label>
        </div>

        <div class="col-xs-3">
            <input type="text" id="total_market_fruits" name="normal[total_market_fruits]" class="form-control" value="<?php echo $total_market_fruits_normal;?>" />
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[total_market_fruits]" class="form-control" value="<?php echo $total_market_fruits_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[total_market_fruits]" value="<?php echo $total_market_fruits_replica;?>">
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
    $total_market_fruit_wt_normal="";
    if(is_array($info)&& !empty($info['normal']['total_market_fruit_wt']))
    {
        $total_market_fruit_wt_normal=$info['normal']['total_market_fruit_wt'];
    }
    $total_market_fruit_wt_replica="";
    if(is_array($info)&& !empty($info['replica']['total_market_fruit_wt']))
    {
        $total_market_fruit_wt_replica=$info['replica']['total_market_fruit_wt'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('TOTAL_MARKET_FRUIT_WT');?></label>
        </div>

        <div class="col-xs-3">
            <input type="text" id="total_market_fruit_wt" name="normal[total_market_fruit_wt]" class="form-control" value="<?php echo $total_market_fruit_wt_normal;?>" />
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[total_market_fruit_wt]" class="form-control" value="<?php echo $total_market_fruit_wt_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[total_market_fruit_wt]" value="<?php echo $total_market_fruit_wt_replica;?>">
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
    $percentage_of_mrkt_fruit_normal="";
    if(is_array($info)&& !empty($info['normal']['percentage_of_mrkt_fruit']))
    {
        $percentage_of_mrkt_fruit_normal=$info['normal']['percentage_of_mrkt_fruit'];
    }
    $percentage_of_mrkt_fruit_replica="";
    if(is_array($info)&& !empty($info['replica']['percentage_of_mrkt_fruit']))
    {
        $percentage_of_mrkt_fruit_replica=$info['replica']['percentage_of_mrkt_fruit'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('PERCENTAGE_OF_MRKT_FRUIT');?></label>
        </div>

        <div class="col-xs-3">
            <input type="text" id="percentage_of_mrkt_fruit" name="normal[percentage_of_mrkt_fruit]" class="form-control" value="<?php echo $percentage_of_mrkt_fruit_normal;?>" />
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[percentage_of_mrkt_fruit]" class="form-control" value="<?php echo $percentage_of_mrkt_fruit_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[percentage_of_mrkt_fruit]" value="<?php echo $percentage_of_mrkt_fruit_replica;?>">
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
    $percentage_of_mrkt_fruit_wt_normal="";
    if(is_array($info)&& !empty($info['normal']['percentage_of_mrkt_fruit_wt']))
    {
        $percentage_of_mrkt_fruit_wt_normal=$info['normal']['percentage_of_mrkt_fruit_wt'];
    }
    $percentage_of_mrkt_fruit_wt_replica="";
    if(is_array($info)&& !empty($info['replica']['percentage_of_mrkt_fruit_wt']))
    {
        $percentage_of_mrkt_fruit_wt_replica=$info['replica']['percentage_of_mrkt_fruit_wt'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('PERCENTAGE_OF_MRKT_FRUIT_WT');?></label>
        </div>

        <div class="col-xs-3">
            <input type="text" id="percentage_of_mrkt_fruit_wt" name="normal[percentage_of_mrkt_fruit_wt]" class="form-control" value="<?php echo $percentage_of_mrkt_fruit_wt_normal;?>" />
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[percentage_of_mrkt_fruit_wt]" class="form-control" value="<?php echo $percentage_of_mrkt_fruit_wt_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[percentage_of_mrkt_fruit_wt]" value="<?php echo $percentage_of_mrkt_fruit_wt_replica;?>">
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
    $no_of_fruit_plant_normal="";
    if(is_array($info)&& !empty($info['normal']['no_of_fruit_plant']))
    {
        $no_of_fruit_plant_normal=$info['normal']['no_of_fruit_plant'];
    }
    $no_of_fruit_plant_replica="";
    if(is_array($info)&& !empty($info['replica']['no_of_fruit_plant']))
    {
        $no_of_fruit_plant_replica=$info['replica']['no_of_fruit_plant'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('NO_OF_FRUIT_PLANT');?></label>
        </div>

        <div class="col-xs-3">
            <input type="text" id="no_of_fruit_plant" name="normal[no_of_fruit_plant]" class="form-control" value="<?php echo $no_of_fruit_plant_normal;?>" />
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[no_of_fruit_plant]" class="form-control" value="<?php echo $no_of_fruit_plant_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[no_of_fruit_plant]" value="<?php echo $no_of_fruit_plant_replica;?>">
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
    $avg_fruit_wt_normal="";
    if(is_array($info)&& !empty($info['normal']['avg_fruit_wt']))
    {
        $avg_fruit_wt_normal=$info['normal']['avg_fruit_wt'];
    }
    $avg_fruit_wt_replica="";
    if(is_array($info)&& !empty($info['replica']['avg_fruit_wt']))
    {
        $avg_fruit_wt_replica=$info['replica']['avg_fruit_wt'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('AVG_FRUIT_WT');?></label>
        </div>

        <div class="col-xs-3">
            <input type="text" id="avg_fruit_wt" name="normal[avg_fruit_wt]" class="form-control" value="<?php echo $avg_fruit_wt_normal;?>" />
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[avg_fruit_wt]" class="form-control" value="<?php echo $avg_fruit_wt_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[avg_fruit_wt]" value="<?php echo $avg_fruit_wt_replica;?>">
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
    $fr_wt_plant_normal="";
    if(is_array($info)&& !empty($info['normal']['fr_wt_plant']))
    {
        $fr_wt_plant_normal=$info['normal']['fr_wt_plant'];
    }
    $fr_wt_plant_replica="";
    if(is_array($info)&& !empty($info['replica']['fr_wt_plant']))
    {
        $fr_wt_plant_replica=$info['replica']['fr_wt_plant'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('FR_WT_PLANT');?></label>
        </div>

        <div class="col-xs-3">
            <input type="text" id="fr_wt_plant" name="normal[fr_wt_plant]" class="form-control" value="<?php echo $fr_wt_plant_normal;?>" />
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[fr_wt_plant]" class="form-control" value="<?php echo $fr_wt_plant_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[fr_wt_plant]" value="<?php echo $fr_wt_plant_replica;?>">
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
    $total_harv_roots_normal="";
    if(is_array($info)&& !empty($info['normal']['total_harv_roots']))
    {
        $total_harv_roots_normal=$info['normal']['total_harv_roots'];
    }
    $total_harv_roots_replica="";
    if(is_array($info)&& !empty($info['replica']['total_harv_roots']))
    {
        $total_harv_roots_replica=$info['replica']['total_harv_roots'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('TOTAL_HARV_ROOTS');?></label>
        </div>

        <div class="col-xs-3">
            <input type="text" id="total_harv_roots" name="normal[total_harv_roots]" class="form-control" value="<?php echo $total_harv_roots_normal;?>" />
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[total_harv_roots]" class="form-control" value="<?php echo $total_harv_roots_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[total_harv_roots]" value="<?php echo $total_harv_roots_replica;?>">
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
    $total_root_wt_normal="";
    if(is_array($info)&& !empty($info['normal']['total_root_wt']))
    {
        $total_root_wt_normal=$info['normal']['total_root_wt'];
    }
    $total_root_wt_replica="";
    if(is_array($info)&& !empty($info['replica']['total_root_wt']))
    {
        $total_root_wt_replica=$info['replica']['total_root_wt'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('TOTAL_ROOT_WT');?></label>
        </div>

        <div class="col-xs-3">
            <input type="text" id="total_root_wt" name="normal[total_root_wt]" class="form-control" value="<?php echo $total_root_wt_normal;?>" />
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[total_root_wt]" class="form-control" value="<?php echo $total_root_wt_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[total_root_wt]" value="<?php echo $total_root_wt_replica;?>">
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
    $total_market_roots_normal="";
    if(is_array($info)&& !empty($info['normal']['total_market_roots']))
    {
        $total_market_roots_normal=$info['normal']['total_market_roots'];
    }
    $total_market_roots_replica="";
    if(is_array($info)&& !empty($info['replica']['total_market_roots']))
    {
        $total_market_roots_replica=$info['replica']['total_market_roots'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('TOTAL_MARKET_ROOTS');?></label>
        </div>

        <div class="col-xs-3">
            <input type="text" id="total_market_roots" name="normal[total_market_roots]" class="form-control" value="<?php echo $total_market_roots_normal;?>" />
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[total_market_roots]" class="form-control" value="<?php echo $total_market_roots_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[total_market_roots]" value="<?php echo $total_market_roots_replica;?>">
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
    $total_market_root_wt_normal="";
    if(is_array($info)&& !empty($info['normal']['total_market_root_wt']))
    {
        $total_market_root_wt_normal=$info['normal']['total_market_root_wt'];
    }
    $total_market_root_wt_replica="";
    if(is_array($info)&& !empty($info['replica']['total_market_root_wt']))
    {
        $total_market_root_wt_replica=$info['replica']['total_market_root_wt'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('TOTAL_MARKET_ROOT_WT');?></label>
        </div>

        <div class="col-xs-3">
            <input type="text" id="total_market_root_wt" name="normal[total_market_root_wt]" class="form-control" value="<?php echo $total_market_root_wt_normal;?>" />
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[total_market_root_wt]" class="form-control" value="<?php echo $total_market_root_wt_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[total_market_root_wt]" value="<?php echo $total_market_root_wt_replica;?>">
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
    $percentage_of_mrkt_root_normal="";
    if(is_array($info)&& !empty($info['normal']['percentage_of_mrkt_root']))
    {
        $percentage_of_mrkt_root_normal=$info['normal']['percentage_of_mrkt_root'];
    }
    $percentage_of_mrkt_root_replica="";
    if(is_array($info)&& !empty($info['replica']['percentage_of_mrkt_root']))
    {
        $percentage_of_mrkt_root_replica=$info['replica']['percentage_of_mrkt_root'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('PERCENTAGE_OF_MRKT_ROOT');?></label>
        </div>

        <div class="col-xs-3">
            <input type="text" id="percentage_of_mrkt_root" name="normal[percentage_of_mrkt_root]" class="form-control" value="<?php echo $percentage_of_mrkt_root_normal;?>" />
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[percentage_of_mrkt_root]" class="form-control" value="<?php echo $percentage_of_mrkt_root_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[percentage_of_mrkt_root]" value="<?php echo $percentage_of_mrkt_root_replica;?>">
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
    $percentage_of_mrkt_root_wt_normal="";
    if(is_array($info)&& !empty($info['normal']['percentage_of_mrkt_root_wt']))
    {
        $percentage_of_mrkt_root_wt_normal=$info['normal']['percentage_of_mrkt_root_wt'];
    }
    $percentage_of_mrkt_root_wt_replica="";
    if(is_array($info)&& !empty($info['replica']['percentage_of_mrkt_root_wt']))
    {
        $percentage_of_mrkt_root_wt_replica=$info['replica']['percentage_of_mrkt_root_wt'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('PERCENTAGE_OF_MRKT_ROOT_WT');?></label>
        </div>

        <div class="col-xs-3">
            <input type="text" id="percentage_of_mrkt_root_wt" name="normal[percentage_of_mrkt_root_wt]" class="form-control" value="<?php echo $percentage_of_mrkt_root_wt_normal;?>" />
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[percentage_of_mrkt_root_wt]" class="form-control" value="<?php echo $percentage_of_mrkt_root_wt_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[percentage_of_mrkt_root_wt]" value="<?php echo $percentage_of_mrkt_root_wt_replica;?>">
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
    $avg_root_wt_normal="";
    if(is_array($info)&& !empty($info['normal']['avg_root_wt']))
    {
        $avg_root_wt_normal=$info['normal']['avg_root_wt'];
    }
    $avg_root_wt_replica="";
    if(is_array($info)&& !empty($info['replica']['avg_root_wt']))
    {
        $avg_root_wt_replica=$info['replica']['avg_root_wt'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('AVG_ROOT_WT');?></label>
        </div>

        <div class="col-xs-3">
            <input type="text" id="avg_root_wt" name="normal[avg_root_wt]" class="form-control" value="<?php echo $avg_root_wt_normal;?>" />
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[avg_root_wt]" class="form-control" value="<?php echo $avg_root_wt_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[avg_root_wt]" value="<?php echo $avg_root_wt_replica;?>">
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
    $total_leaf_wt_normal="";
    if(is_array($info)&& !empty($info['normal']['total_leaf_wt']))
    {
        $total_leaf_wt_normal=$info['normal']['total_leaf_wt'];
    }
    $total_leaf_wt_replica="";
    if(is_array($info)&& !empty($info['replica']['total_leaf_wt']))
    {
        $total_leaf_wt_replica=$info['replica']['total_leaf_wt'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('TOTAL_LEAF_WT');?></label>
        </div>

        <div class="col-xs-3">
            <input type="text" id="total_leaf_wt" name="normal[total_leaf_wt]" class="form-control" value="<?php echo $total_leaf_wt_normal;?>" />
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[total_leaf_wt]" class="form-control" value="<?php echo $total_leaf_wt_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[total_leaf_wt]" value="<?php echo $total_leaf_wt_replica;?>">
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
    $total_market_leaf_wt_normal="";
    if(is_array($info)&& !empty($info['normal']['total_market_leaf_wt']))
    {
        $total_market_leaf_wt_normal=$info['normal']['total_market_leaf_wt'];
    }
    $total_market_leaf_wt_replica="";
    if(is_array($info)&& !empty($info['replica']['total_market_leaf_wt']))
    {
        $total_market_leaf_wt_replica=$info['replica']['total_market_leaf_wt'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('TOTAL_MARKET_LEAF_WT');?></label>
        </div>

        <div class="col-xs-3">
            <input type="text" id="total_market_leaf_wt" name="normal[total_market_leaf_wt]" class="form-control" value="<?php echo $total_market_leaf_wt_normal;?>" />
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[total_market_leaf_wt]" class="form-control" value="<?php echo $total_market_leaf_wt_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[total_market_leaf_wt]" value="<?php echo $total_market_leaf_wt_replica;?>">
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
    $percentage_of_mrkt_leaf_normal="";
    if(is_array($info)&& !empty($info['normal']['percentage_of_mrkt_leaf']))
    {
        $percentage_of_mrkt_leaf_normal=$info['normal']['percentage_of_mrkt_leaf'];
    }
    $percentage_of_mrkt_leaf_replica="";
    if(is_array($info)&& !empty($info['replica']['percentage_of_mrkt_leaf']))
    {
        $percentage_of_mrkt_leaf_replica=$info['replica']['percentage_of_mrkt_leaf'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('PERCENTAGE_OF_MRKT_LEAF');?></label>
        </div>

        <div class="col-xs-3">
            <input type="text" id="percentage_of_mrkt_leaf" name="normal[percentage_of_mrkt_leaf]" class="form-control" value="<?php echo $percentage_of_mrkt_leaf_normal;?>" />
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[percentage_of_mrkt_leaf]" class="form-control" value="<?php echo $percentage_of_mrkt_leaf_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[percentage_of_mrkt_leaf]" value="<?php echo $percentage_of_mrkt_leaf_replica;?>">
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
    $percentage_of_mrkt_leaf_wt_normal="";
    if(is_array($info)&& !empty($info['normal']['percentage_of_mrkt_leaf_wt']))
    {
        $percentage_of_mrkt_leaf_wt_normal=$info['normal']['percentage_of_mrkt_leaf_wt'];
    }
    $percentage_of_mrkt_leaf_wt_replica="";
    if(is_array($info)&& !empty($info['replica']['percentage_of_mrkt_leaf_wt']))
    {
        $percentage_of_mrkt_leaf_wt_replica=$info['replica']['percentage_of_mrkt_leaf_wt'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('PERCENTAGE_OF_MRKT_LEAF_WT');?></label>
        </div>

        <div class="col-xs-3">
            <input type="text" id="percentage_of_mrkt_leaf_wt" name="normal[percentage_of_mrkt_leaf_wt]" class="form-control" value="<?php echo $percentage_of_mrkt_leaf_wt_normal;?>" />
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[percentage_of_mrkt_leaf_wt]" class="form-control" value="<?php echo $percentage_of_mrkt_leaf_wt_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[percentage_of_mrkt_leaf_wt]" value="<?php echo $percentage_of_mrkt_leaf_wt_replica;?>">
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
    $uniformity_normal="";
    if(is_array($info)&& !empty($info['normal']['uniformity']))
    {
        $uniformity_normal=$info['normal']['uniformity'];
    }
    $uniformity_replica="";
    if(is_array($info)&& !empty($info['replica']['uniformity']))
    {
        $uniformity_replica=$info['replica']['uniformity'];
    }
?>
<div class="row show-grid">
    <div class="col-xs-4">
        <label class="control-label pull-right"><?php echo $this->lang->line('UNIFORMITY');?></label>
    </div>

    <div class="col-xs-3">
        <input type="text" id="uniformity" name="normal[uniformity]" class="form-control" value="<?php echo $uniformity_normal;?>" />
    </div>

    <?php
    if($variety_info['replica_status']==1)
    {
        ?>
        <div class="col-xs-3">
            <input type="text" name="replica[uniformity]" class="form-control" value="<?php echo $uniformity_replica;?>" />
        </div>
    <?php
    }
    else
    {
        ?>
        <input type="hidden" name="replica[uniformity]" value="<?php echo $uniformity_replica;?>">
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


