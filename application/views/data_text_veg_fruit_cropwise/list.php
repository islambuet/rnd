<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$info=json_decode($variety_info['info'],true);

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
    $first_curd_formation_normal="";
    if(is_array($info)&& !empty($info['normal']['first_curd_formation']))
    {
        $first_curd_formation_normal=$info['normal']['first_curd_formation'];
    }
    $first_curd_formation_replica="";
    if(is_array($info)&& !empty($info['replica']['first_curd_formation']))
    {
        $first_curd_formation_replica=$info['replica']['first_curd_formation'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('FIRST_CURD_FORMATION');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" id="first_curd_formation_normal" class="form-control" name="normal[first_curd_formation]" value="<?php echo $first_curd_formation_normal; ?>" />
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" id="first_curd_formation_replica" class="form-control" name="replica[first_curd_formation]" value="<?php echo $first_curd_formation_replica; ?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[first_curd_formation]" value="<?php echo $first_curd_formation_replica;?>">
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
    $first_head_formation_normal="";
    if(is_array($info)&& !empty($info['normal']['first_head_formation']))
    {
        $first_head_formation_normal=$info['normal']['first_head_formation'];
    }
    $first_head_formation_replica="";
    if(is_array($info)&& !empty($info['replica']['first_head_formation']))
    {
        $first_head_formation_replica=$info['replica']['first_head_formation'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('FIRST_HEAD_FORMATION');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" id="first_head_formation_normal" class="form-control" name="normal[first_head_formation]" value="<?php echo $first_head_formation_normal; ?>" />
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" id="first_head_formation_replica" class="form-control" name="replica[first_head_formation]" value="<?php echo $first_head_formation_replica; ?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[first_head_formation]" value="<?php echo $first_head_formation_replica;?>">
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
    $first_flow_normal="";
    if(is_array($info)&& !empty($info['normal']['first_flow']))
    {
        $first_flow_normal=$info['normal']['first_flow'];
    }
    $first_flow_replica="";
    if(is_array($info)&& !empty($info['replica']['first_flow']))
    {
        $first_flow_replica=$info['replica']['first_flow'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('FIRST_FLOW');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" id="first_flow_normal" class="form-control" name="normal[first_flow]" value="<?php echo $first_flow_normal; ?>" />
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" id="first_flow_replica" class="form-control" name="replica[first_flow]" value="<?php echo $first_flow_replica; ?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[first_flow]" value="<?php echo $first_flow_replica;?>">
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
    $first_root_normal="";
    if(is_array($info)&& !empty($info['normal']['first_root']))
    {
        $first_root_normal=$info['normal']['first_root'];
    }
    $first_root_replica="";
    if(is_array($info)&& !empty($info['replica']['first_root']))
    {
        $first_root_replica=$info['replica']['first_root'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('FIRST_ROOT');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" id="first_root_normal" class="form-control" name="normal[first_root]" value="<?php echo $first_root_normal; ?>" />
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" id="first_root_replica" class="form-control" name="replica[first_root]" value="<?php echo $first_root_replica; ?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[first_root]" value="<?php echo $first_root_replica;?>">
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
    $fifty_percent_curd_formation_normal="";
    if(is_array($info)&& !empty($info['normal']['fifty_percent_curd_formation']))
    {
        $fifty_percent_curd_formation_normal=$info['normal']['fifty_percent_curd_formation'];
    }
    $fifty_percent_curd_formation_replica="";
    if(is_array($info)&& !empty($info['replica']['fifty_percent_curd_formation']))
    {
        $fifty_percent_curd_formation_replica=$info['replica']['fifty_percent_curd_formation'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('FIFTY_PERCENT_CURD_FORMATION');?></label>
        </div>
        <div class="col-xs-3">
            <input type="text" id="fifty_percent_curd_formation_normal" class="form-control" name="normal[fifty_percent_curd_formation]" value="<?php echo $fifty_percent_curd_formation_normal; ?>" />
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" id="fifty_percent_curd_formation_replica" class="form-control" name="replica[fifty_percent_curd_formation]" value="<?php echo $fifty_percent_curd_formation_replica; ?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[fifty_percent_curd_formation]" value="<?php echo $fifty_percent_curd_formation_replica;?>">
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
        turn_off_triggers();
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
    });


</script>