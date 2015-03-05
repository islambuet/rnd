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
if($options['1st_curd_formation']==1)
{
    $f_curd_formation_normal="";
    if(is_array($info)&& !empty($info['normal']['1st_curd_formation']))
    {
        $f_curd_formation_normal=$info['normal']['1st_curd_formation'];
    }
    $f_curd_formation_replica="";
    if(is_array($info)&& !empty($info['replica']['1st_curd_formation']))
    {
        $f_curd_formation_replica=$info['replica']['1st_curd_formation'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_1ST_CURD_FORMATION');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" class="form-control" name="normal[1st_curd_formation]" value="<?php echo $f_curd_formation_normal;?>"/>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" class="form-control" name="replica[1st_curd_formation]" value="<?php echo $f_curd_formation_replica;?>"/>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[1st_curd_formation]" value="<?php echo $f_curd_formation_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['1st_root_formation']==1)
{
    $f_root_formation_normal="";
    if(is_array($info)&& !empty($info['normal']['1st_root_formation']))
    {
        $f_root_formation_normal=$info['normal']['1st_root_formation'];
    }
    $f_root_formation_replica="";
    if(is_array($info)&& !empty($info['replica']['1st_root_formation']))
    {
        $f_root_formation_replica=$info['replica']['1st_root_formation'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_1ST_ROOT_FORMATION');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" class="form-control" name="normal[1st_root_formation]" value="<?php echo $f_root_formation_normal;?>"/>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" class="form-control" name="replica[1st_root_formation]" value="<?php echo $f_root_formation_replica;?>"/>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[1st_root_formation]" value="<?php echo $f_root_formation_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['1st_head_formation']==1)
{
    $f_head_formation_normal="";
    if(is_array($info)&& !empty($info['normal']['1st_head_formation']))
    {
        $f_head_formation_normal=$info['normal']['1st_head_formation'];
    }
    $f_head_formation_replica="";
    if(is_array($info)&& !empty($info['replica']['1st_head_formation']))
    {
        $f_head_formation_replica=$info['replica']['1st_head_formation'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_1ST_HEAD_FORMATION');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" class="form-control" name="normal[1st_head_formation]" value="<?php echo $f_head_formation_normal;?>"/>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" class="form-control" name="replica[1st_head_formation]" value="<?php echo $f_head_formation_replica;?>"/>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[1st_head_formation]" value="<?php echo $f_head_formation_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['1st_flowering_days']==1)
{
    $f_flowering_days_normal="";
    if(is_array($info)&& !empty($info['normal']['1st_flowering_days']))
    {
        $f_flowering_days_normal=$info['normal']['1st_flowering_days'];
    }
    $f_flowering_days_replica="";
    if(is_array($info)&& !empty($info['replica']['1st_flowering_days']))
    {
        $f_flowering_days_replica=$info['replica']['1st_flowering_days'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_1ST_FLOWERING_DAYS');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" class="form-control" name="normal[1st_flowering_days]" value="<?php echo $f_flowering_days_normal;?>"/>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" class="form-control" name="replica[1st_flowering_days]" value="<?php echo $f_flowering_days_replica;?>"/>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[1st_flowering_days]" value="<?php echo $f_flowering_days_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['50_percent_flowering_days']==1)
{
    $fifty_percent_flowering_days_normal="";
    if(is_array($info)&& !empty($info['normal']['50_percent_flowering_days']))
    {
        $fifty_percent_flowering_days_normal=$info['normal']['50_percent_flowering_days'];
    }
    $fifty_percent_flowering_days_replica="";
    if(is_array($info)&& !empty($info['replica']['50_percent_flowering_days']))
    {
        $fifty_percent_flowering_days_replica=$info['replica']['50_percent_flowering_days'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_50_PERCENT_FLOWERING_DAYS');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" class="form-control" name="normal[50_percent_flowering_days]" value="<?php echo $fifty_percent_flowering_days_normal;?>"/>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" class="form-control" name="replica[50_percent_flowering_days]" value="<?php echo $fifty_percent_flowering_days_replica;?>"/>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[50_percent_flowering_days]" value="<?php echo $fifty_percent_flowering_days_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['full_flowering_days']==1)
{
    $full_flowering_days_normal="";
    if(is_array($info)&& !empty($info['normal']['full_flowering_days']))
    {
        $full_flowering_days_normal=$info['normal']['full_flowering_days'];
    }
    $full_flowering_days_replica="";
    if(is_array($info)&& !empty($info['replica']['full_flowering_days']))
    {
        $full_flowering_days_replica=$info['replica']['full_flowering_days'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_FULL_FLOWERING_DAYS');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" class="form-control" name="normal[full_flowering_days]" value="<?php echo $full_flowering_days_normal;?>"/>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" class="form-control" name="replica[full_flowering_days]" value="<?php echo $full_flowering_days_replica;?>"/>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[full_flowering_days]" value="<?php echo $full_flowering_days_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['no_of_1st_curd_formation_plants']==1)
{
    $no_of_1st_curd_formation_plants_normal="";
    if(is_array($info)&& !empty($info['normal']['no_of_1st_curd_formation_plants']))
    {
        $no_of_1st_curd_formation_plants_normal=$info['normal']['no_of_1st_curd_formation_plants'];
    }
    $no_of_1st_curd_formation_plants_replica="";
    if(is_array($info)&& !empty($info['replica']['no_of_1st_curd_formation_plants']))
    {
        $no_of_1st_curd_formation_plants_replica=$info['replica']['no_of_1st_curd_formation_plants'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_NO_OF_1ST_CURD_FORMATION_PLANTS');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" class="form-control" name="normal[no_of_1st_curd_formation_plants]" value="<?php echo $no_of_1st_curd_formation_plants_normal;?>"/>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" class="form-control" name="replica[no_of_1st_curd_formation_plants]" value="<?php echo $no_of_1st_curd_formation_plants_replica;?>"/>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[no_of_1st_curd_formation_plants]" value="<?php echo $no_of_1st_curd_formation_plants_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['no_of_1st_root_formation_plants']==1)
{
    $no_of_1st_root_formation_plants_normal="";
    if(is_array($info)&& !empty($info['normal']['no_of_1st_root_formation_plants']))
    {
        $no_of_1st_root_formation_plants_normal=$info['normal']['no_of_1st_root_formation_plants'];
    }
    $no_of_1st_root_formation_plants_replica="";
    if(is_array($info)&& !empty($info['replica']['no_of_1st_root_formation_plants']))
    {
        $no_of_1st_root_formation_plants_replica=$info['replica']['no_of_1st_root_formation_plants'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_NO_OF_1ST_ROOT_FORMATION_PLANTS');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" class="form-control" name="normal[no_of_1st_root_formation_plants]" value="<?php echo $no_of_1st_root_formation_plants_normal;?>"/>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" class="form-control" name="replica[no_of_1st_root_formation_plants]" value="<?php echo $no_of_1st_root_formation_plants_replica;?>"/>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[no_of_1st_root_formation_plants]" value="<?php echo $no_of_1st_root_formation_plants_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['no_of_1st_head_formation_plants']==1)
{
    $no_of_1st_head_formation_plants_normal="";
    if(is_array($info)&& !empty($info['normal']['no_of_1st_head_formation_plants']))
    {
        $no_of_1st_head_formation_plants_normal=$info['normal']['no_of_1st_head_formation_plants'];
    }
    $no_of_1st_head_formation_plants_replica="";
    if(is_array($info)&& !empty($info['replica']['no_of_1st_head_formation_plants']))
    {
        $no_of_1st_head_formation_plants_replica=$info['replica']['no_of_1st_head_formation_plants'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_NO_OF_1ST_HEAD_FORMATION_PLANTS');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" class="form-control" name="normal[no_of_1st_head_formation_plants]" value="<?php echo $no_of_1st_head_formation_plants_normal;?>"/>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" class="form-control" name="replica[no_of_1st_head_formation_plants]" value="<?php echo $no_of_1st_head_formation_plants_replica;?>"/>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[no_of_1st_head_formation_plants]" value="<?php echo $no_of_1st_head_formation_plants_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['no_of_1st_flowering_plants']==1)
{
    $no_of_1st_flowering_plants_normal="";
    if(is_array($info)&& !empty($info['normal']['no_of_1st_flowering_plants']))
    {
        $no_of_1st_flowering_plants_normal=$info['normal']['no_of_1st_flowering_plants'];
    }
    $no_of_1st_flowering_plants_replica="";
    if(is_array($info)&& !empty($info['replica']['no_of_1st_flowering_plants']))
    {
        $no_of_1st_flowering_plants_replica=$info['replica']['no_of_1st_flowering_plants'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_NO_OF_1ST_FLOWERING_PLANTS');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" class="form-control" name="normal[no_of_1st_flowering_plants]" value="<?php echo $no_of_1st_flowering_plants_normal;?>"/>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" class="form-control" name="replica[no_of_1st_flowering_plants]" value="<?php echo $no_of_1st_flowering_plants_replica;?>"/>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[no_of_1st_flowering_plants]" value="<?php echo $no_of_1st_flowering_plants_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['1st_flowering_to_full_flowering']==1)
{
    $first_flowering_to_full_flowering_normal="";
    if(is_array($info)&& !empty($info['normal']['1st_flowering_to_full_flowering']))
    {
        $first_flowering_to_full_flowering_normal=$info['normal']['1st_flowering_to_full_flowering'];
    }
    $first_flowering_to_full_flowering_replica="";
    if(is_array($info)&& !empty($info['replica']['1st_flowering_to_full_flowering']))
    {
        $first_flowering_to_full_flowering_replica=$info['replica']['1st_flowering_to_full_flowering'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_1ST_FLOWERING_TO_FULL_FLOWERING');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" class="form-control" name="normal[1st_flowering_to_full_flowering]" value="<?php echo $first_flowering_to_full_flowering_normal;?>"/>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" class="form-control" name="replica[1st_flowering_to_full_flowering]" value="<?php echo $first_flowering_to_full_flowering_replica;?>"/>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[1st_flowering_to_full_flowering]" value="<?php echo $first_flowering_to_full_flowering_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['50_percent_curd_formation_days']==1)
{
    $fifty_percent_curd_formation_days_normal="";
    if(is_array($info)&& !empty($info['normal']['50_percent_curd_formation_days']))
    {
        $fifty_percent_curd_formation_days_normal=$info['normal']['50_percent_curd_formation_days'];
    }
    $fifty_percent_curd_formation_days_replica="";
    if(is_array($info)&& !empty($info['replica']['50_percent_curd_formation_days']))
    {
        $fifty_percent_curd_formation_days_replica=$info['replica']['50_percent_curd_formation_days'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_50_PERCENT_CURD_FORMATION_DAYS');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" class="form-control" name="normal[50_percent_curd_formation_days]" value="<?php echo $fifty_percent_curd_formation_days_normal;?>"/>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" class="form-control" name="replica[50_percent_curd_formation_days]" value="<?php echo $fifty_percent_curd_formation_days_replica;?>"/>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[50_percent_curd_formation_days]" value="<?php echo $fifty_percent_curd_formation_days_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['50_percent_head_formation_days']==1)
{
    $fifty_percent_head_formation_days_normal="";
    if(is_array($info)&& !empty($info['normal']['50_percent_head_formation_days']))
    {
        $fifty_percent_head_formation_days_normal=$info['normal']['50_percent_head_formation_days'];
    }
    $fifty_percent_head_formation_days_replica="";
    if(is_array($info)&& !empty($info['replica']['50_percent_head_formation_days']))
    {
        $fifty_percent_head_formation_days_replica=$info['replica']['50_percent_head_formation_days'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_50_PERCENT_HEAD_FORMATION_DAYS');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" class="form-control" name="normal[50_percent_head_formation_days]" value="<?php echo $fifty_percent_head_formation_days_normal;?>"/>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" class="form-control" name="replica[50_percent_head_formation_days]" value="<?php echo $fifty_percent_head_formation_days_replica;?>"/>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[50_percent_head_formation_days]" value="<?php echo $fifty_percent_head_formation_days_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['50_percent_root_formation_days']==1)
{
    $fifty_percent_root_formation_days_normal="";
    if(is_array($info)&& !empty($info['normal']['50_percent_root_formation_days']))
    {
        $fifty_percent_root_formation_days_normal=$info['normal']['50_percent_root_formation_days'];
    }
    $fifty_percent_root_formation_days_replica="";
    if(is_array($info)&& !empty($info['replica']['50_percent_root_formation_days']))
    {
        $fifty_percent_root_formation_days_replica=$info['replica']['50_percent_root_formation_days'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_50_PERCENT_ROOT_FORMATION_DAYS');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" class="form-control" name="normal[50_percent_root_formation_days]" value="<?php echo $fifty_percent_root_formation_days_normal;?>"/>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" class="form-control" name="replica[50_percent_root_formation_days]" value="<?php echo $fifty_percent_root_formation_days_replica;?>"/>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[50_percent_root_formation_days]" value="<?php echo $fifty_percent_head_formation_days_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['1st_curd_formation_to_marketable_curd_formation']==1)
{
    $marketable_curd_formation_normal="";
    if(is_array($info)&& !empty($info['normal']['1st_curd_formation_to_marketable_curd_formation']))
    {
        $marketable_curd_formation_normal=$info['normal']['1st_curd_formation_to_marketable_curd_formation'];
    }
    $marketable_curd_formation_replica="";
    if(is_array($info)&& !empty($info['replica']['1st_curd_formation_to_marketable_curd_formation']))
    {
        $marketable_curd_formation_replica=$info['replica']['1st_curd_formation_to_marketable_curd_formation'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_1ST_CURD_FORMATION_TO_MARKETABLE_CURD_FORMATION');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" class="form-control" name="normal[1st_curd_formation_to_marketable_curd_formation]" value="<?php echo $marketable_curd_formation_normal;?>"/>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" class="form-control" name="replica[1st_curd_formation_to_marketable_curd_formation]" value="<?php echo $marketable_curd_formation_replica;?>"/>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[1st_curd_formation_to_marketable_curd_formation]" value="<?php echo $marketable_curd_formation_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['1st_head_formation_to_marketable_head_formation']==1)
{
    $marketable_head_formation_normal="";
    if(is_array($info)&& !empty($info['normal']['1st_head_formation_to_marketable_head_formation']))
    {
        $marketable_head_formation_normal=$info['normal']['1st_head_formation_to_marketable_head_formation'];
    }
    $marketable_head_formation_replica="";
    if(is_array($info)&& !empty($info['replica']['1st_head_formation_to_marketable_head_formation']))
    {
        $marketable_head_formation_replica=$info['replica']['1st_head_formation_to_marketable_head_formation'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_1ST_HEAD_FORMATION_TO_MARKETABLE_HEAD_FORMATION');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" class="form-control" name="normal[1st_head_formation_to_marketable_head_formation]" value="<?php echo $marketable_head_formation_normal;?>"/>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" class="form-control" name="replica[1st_head_formation_to_marketable_head_formation]" value="<?php echo $marketable_head_formation_replica;?>"/>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[1st_head_formation_to_marketable_head_formation]" value="<?php echo $marketable_head_formation_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['1st_root_formation_to_marketable_root_formation']==1)
{
    $marketable_root_formation_normal="";
    if(is_array($info)&& !empty($info['normal']['1st_root_formation_to_marketable_root_formation']))
    {
        $marketable_root_formation_normal=$info['normal']['1st_root_formation_to_marketable_root_formation'];
    }
    $marketable_root_formation_replica="";
    if(is_array($info)&& !empty($info['replica']['1st_root_formation_to_marketable_root_formation']))
    {
        $marketable_root_formation_replica=$info['replica']['1st_root_formation_to_marketable_root_formation'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_1ST_ROOT_FORMATION_TO_MARKETABLE_ROOT_FORMATION');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" class="form-control" name="normal[1st_root_formation_to_marketable_root_formation]" value="<?php echo $marketable_root_formation_normal;?>"/>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" class="form-control" name="replica[1st_root_formation_to_marketable_root_formation]" value="<?php echo $marketable_root_formation_replica;?>"/>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[1st_root_formation_to_marketable_root_formation]" value="<?php echo $marketable_root_formation_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['1st_flowering_to_first_fruit_setting']==1)
{
    $flowering_to_first_fruit_setting_normal="";
    if(is_array($info)&& !empty($info['normal']['1st_flowering_to_first_fruit_setting']))
    {
        $flowering_to_first_fruit_setting_normal=$info['normal']['1st_flowering_to_first_fruit_setting'];
    }
    $flowering_to_first_fruit_setting_replica="";
    if(is_array($info)&& !empty($info['replica']['1st_flowering_to_first_fruit_setting']))
    {
        $flowering_to_first_fruit_setting_replica=$info['replica']['1st_flowering_to_first_fruit_setting'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_1ST_FLOWERING_TO_FIRST_FRUIT_SETTING');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" class="form-control" name="normal[1st_flowering_to_first_fruit_setting]" value="<?php echo $flowering_to_first_fruit_setting_normal;?>"/>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" class="form-control" name="replica[1st_flowering_to_first_fruit_setting]" value="<?php echo $flowering_to_first_fruit_setting_replica;?>"/>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[1st_flowering_to_first_fruit_setting]" value="<?php echo $flowering_to_first_fruit_setting_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['1st_curd_formation_to_1st_harvest']==1)
{
    $curd_formation_to_1st_harvest_normal="";
    if(is_array($info)&& !empty($info['normal']['1st_curd_formation_to_1st_harvest']))
    {
        $curd_formation_to_1st_harvest_normal=$info['normal']['1st_curd_formation_to_1st_harvest'];
    }
    $curd_formation_to_1st_harvest_replica="";
    if(is_array($info)&& !empty($info['replica']['1st_curd_formation_to_1st_harvest']))
    {
        $curd_formation_to_1st_harvest_replica=$info['replica']['1st_curd_formation_to_1st_harvest'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_1ST_CURD_FORMATION_TO_1ST_HARVEST');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" class="form-control" name="normal[1st_curd_formation_to_1st_harvest]" value="<?php echo $curd_formation_to_1st_harvest_normal;?>"/>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" class="form-control" name="replica[1st_curd_formation_to_1st_harvest]" value="<?php echo $curd_formation_to_1st_harvest_replica;?>"/>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[1st_curd_formation_to_1st_harvest]" value="<?php echo $curd_formation_to_1st_harvest_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['1st_head_formation_to_1st_harvest']==1)
{
    $head_formation_to_1st_harvest_normal="";
    if(is_array($info)&& !empty($info['normal']['1st_head_formation_to_1st_harvest']))
    {
        $head_formation_to_1st_harvest_normal=$info['normal']['1st_head_formation_to_1st_harvest'];
    }
    $head_formation_to_1st_harvest_replica="";
    if(is_array($info)&& !empty($info['replica']['1st_head_formation_to_1st_harvest']))
    {
        $head_formation_to_1st_harvest_replica=$info['replica']['1st_head_formation_to_1st_harvest'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_1ST_HEAD_FORMATION_TO_1ST_HARVEST');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" class="form-control" name="normal[1st_head_formation_to_1st_harvest]" value="<?php echo $head_formation_to_1st_harvest_normal;?>"/>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" class="form-control" name="replica[1st_head_formation_to_1st_harvest]" value="<?php echo $head_formation_to_1st_harvest_replica;?>"/>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[1st_head_formation_to_1st_harvest]" value="<?php echo $head_formation_to_1st_harvest_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['1st_root_formation_to_1st_harvest']==1)
{
    $root_formation_to_1st_harvest_normal="";
    if(is_array($info)&& !empty($info['normal']['1st_root_formation_to_1st_harvest']))
    {
        $root_formation_to_1st_harvest_normal=$info['normal']['1st_root_formation_to_1st_harvest'];
    }
    $root_formation_to_1st_harvest_replica="";
    if(is_array($info)&& !empty($info['replica']['1st_root_formation_to_1st_harvest']))
    {
        $root_formation_to_1st_harvest_replica=$info['replica']['1st_root_formation_to_1st_harvest'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_1ST_ROOT_FORMATION_TO_1ST_HARVEST');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" class="form-control" name="normal[1st_root_formation_to_1st_harvest]" value="<?php echo $root_formation_to_1st_harvest_normal;?>"/>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" class="form-control" name="replica[1st_root_formation_to_1st_harvest]" value="<?php echo $root_formation_to_1st_harvest_replica;?>"/>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[1st_root_formation_to_1st_harvest]" value="<?php echo $root_formation_to_1st_harvest_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['1st_fruit_setting_to_1st_harvest']==1)
{
    $fruit_setting_to_1st_harvest_normal="";
    if(is_array($info)&& !empty($info['normal']['1st_fruit_setting_to_1st_harvest']))
    {
        $fruit_setting_to_1st_harvest_normal=$info['normal']['1st_fruit_setting_to_1st_harvest'];
    }
    $fruit_setting_to_1st_harvest_replica="";
    if(is_array($info)&& !empty($info['replica']['1st_fruit_setting_to_1st_harvest']))
    {
        $fruit_setting_to_1st_harvest_replica=$info['replica']['1st_fruit_setting_to_1st_harvest'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_1ST_FRUIT_SETTING_TO_1ST_HARVEST');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" class="form-control" name="normal[1st_fruit_setting_to_1st_harvest]" value="<?php echo $fruit_setting_to_1st_harvest_replica;?>"/>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" class="form-control" name="replica[1st_fruit_setting_to_1st_harvest]" value="<?php echo $fruit_setting_to_1st_harvest_replica;?>"/>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[1st_fruit_setting_to_1st_harvest]" value="<?php echo $fruit_setting_to_1st_harvest_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['number_of_female_flower']==1)
{
    $number_of_female_flower_normal="";
    if(is_array($info)&& !empty($info['normal']['number_of_female_flower']))
    {
        $number_of_female_flower_normal=$info['normal']['number_of_female_flower'];
    }
    $number_of_female_flower_replica="";
    if(is_array($info)&& !empty($info['replica']['number_of_female_flower']))
    {
        $number_of_female_flower_replica=$info['replica']['number_of_female_flower'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_NUMBER_OF_FEMALE_FLOWER');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" class="form-control" name="normal[number_of_female_flower]" value="<?php echo $number_of_female_flower_normal;?>"/>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" class="form-control" name="replica[number_of_female_flower]" value="<?php echo $number_of_female_flower_replica;?>"/>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[number_of_female_flower]" value="<?php echo $number_of_female_flower_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['evaluation']==1)
{
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
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_EVALUATION');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[evaluation]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>" <?php if($val==$evaluation_normal){echo 'selected';} ?>><?php echo $rating;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[evaluation]"">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('rating') as $val=>$rating){?>
                        <option value="<?php echo $val;?>" <?php if($val==$evaluation_replica){echo 'selected';} ?>><?php echo $rating;?></option>
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
}
?>

<?php
if($options['special_characters']==1)
{
    $special_characters_normal="";
    if(is_array($info)&& !empty($info['normal']['special_characters']))
    {
        $special_characters_normal=$info['normal']['special_characters'];
    }
    $special_characters_replica="";
    if(is_array($info)&& !empty($info['replica']['special_characters']))
    {
        $special_characters_replica=$info['replica']['special_characters'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SPECIAL_CHARACTERS');?></label>
        </div>
        <div class="col-xs-3">
            <textarea class="form-control" name="normal[special_characters]"><?php echo $special_characters_normal; ?></textarea>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <textarea class="form-control" name="replica[special_characters]"><?php echo $special_characters_replica; ?></textarea>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[special_characters]" value="<?php echo $special_characters_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['accepted']==1)
{
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
}
?>

<?php
if($options['remarks']==1)
{
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
<?php
}
?>

<?php

$ranking_normal="";
if(is_array($info)&& isset($info['normal']['ranking']))
{
    $ranking_normal=$info['normal']['ranking'];
}
?>
<div class="row show-grid">
    <div class="col-xs-4">
        <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_RANKING');?></label>
    </div>

    <?php
    if($variety_info['replica_status']==1)
    {
        ?>
        <div class="col-xs-6">
            <input type="text" class="ranking form-control" name="normal[ranking]" value="<?php echo $ranking_normal;?>" />
        </div>
    <?php
    }
    else
    {
        ?>
        <div class="col-xs-3">
            <input type="text" class="ranking form-control" name="normal[ranking]" value="<?php echo $ranking_normal;?>" />
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
