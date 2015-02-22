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
            <input type="text" id="harvesting_date_normal" name="normal[harvesting_date]" class="form-control" value="<?php echo $harvesting_date_normal;?>" />
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" id="harvesting_date_replica" name="replica[harvesting_date]" class="form-control" value="<?php echo $harvesting_date_replica;?>" />
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


<?php
if($options['no_of_plants_harvested']==1)
{
    $plants_harvested_normal="";
    if(is_array($info)&& !empty($info['normal']['no_of_plants_harvested']))
    {
        $plants_harvested_normal=$info['normal']['no_of_plants_harvested'];
    }
    $plants_harvested_replica="";
    if(is_array($info)&& !empty($info['replica']['no_of_plants_harvested']))
    {
        $plants_harvested_replica=$info['replica']['no_of_plants_harvested'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('NO_OF_PLANTS_HARVESTED');?></label>
        </div>

        <div class="col-xs-3">
            <input type="text" name="normal[no_of_plants_harvested]" class="form-control" value="<?php echo $plants_harvested_normal;?>" />
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[no_of_plants_harvested]" class="form-control" value="<?php echo $plants_harvested_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[no_of_plants_harvested]" value="<?php echo $plants_harvested_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['total_harvested_wt']==1)
{
    $total_harvested_wt_normal="";
    if(is_array($info)&& !empty($info['normal']['total_harvested_wt']))
    {
        $total_harvested_wt_normal=$info['normal']['total_harvested_wt'];
    }
    $total_harvested_wt_replica="";
    if(is_array($info)&& !empty($info['replica']['total_harvested_wt']))
    {
        $total_harvested_wt_replica=$info['replica']['total_harvested_wt'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('TOTAL_HARVESTED_WT');?></label>
        </div>

        <div class="col-xs-3">
            <input type="text" name="normal[total_harvested_wt]" class="form-control" value="<?php echo $total_harvested_wt_normal;?>" />
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[total_harvested_wt]" class="form-control" value="<?php echo $total_harvested_wt_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[total_harvested_wt]" value="<?php echo $total_harvested_wt_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['total_mrkt_curds']==1)
{
    $total_mrkt_curds_normal="";
    if(is_array($info)&& !empty($info['normal']['total_mrkt_curds']))
    {
        $total_mrkt_curds_normal=$info['normal']['total_mrkt_curds'];
    }
    $total_mrkt_curds_replica="";
    if(is_array($info)&& !empty($info['replica']['total_mrkt_curds']))
    {
        $total_mrkt_curds_replica=$info['replica']['total_mrkt_curds'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('TOTAL_MRKT_CURDS');?></label>
        </div>

        <div class="col-xs-3">
            <input type="text" name="normal[total_mrkt_curds]" class="form-control" value="<?php echo $total_mrkt_curds_normal;?>" />
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[total_mrkt_curds]" class="form-control" value="<?php echo $total_mrkt_curds_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[total_mrkt_curds]" value="<?php echo $total_mrkt_curds_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['total_mrkt_curd_wt']==1)
{
    $total_mrkt_curd_wt_normal="";
    if(is_array($info)&& !empty($info['normal']['total_mrkt_curd_wt']))
    {
        $total_mrkt_curd_wt_normal=$info['normal']['total_mrkt_curd_wt'];
    }
    $total_mrkt_curd_wt_replica="";
    if(is_array($info)&& !empty($info['replica']['total_mrkt_curd_wt']))
    {
        $total_mrkt_curd_wt_replica=$info['replica']['total_mrkt_curd_wt'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('TOTAL_MRKT_CURD_WT');?></label>
        </div>

        <div class="col-xs-3">
            <input type="text" name="normal[total_mrkt_curd_wt]" class="form-control" value="<?php echo $total_mrkt_curd_wt_normal;?>" />
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[total_mrkt_curd_wt]" class="form-control" value="<?php echo $total_mrkt_curd_wt_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[total_mrkt_curd_wt]" value="<?php echo $total_mrkt_curd_wt_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['curd_uniformity']==1)
{
    $curd_uniformity_normal="";
    if(is_array($info)&& !empty($info['normal']['curd_uniformity']))
    {
        $curd_uniformity_normal=$info['normal']['curd_uniformity'];
    }
    $curd_uniformity_replica="";
    if(is_array($info)&& !empty($info['replica']['curd_uniformity']))
    {
        $curd_uniformity_replica=$info['replica']['curd_uniformity'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('CURD_UNIFORMITY');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[curd_uniformity]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$curd_uniformity_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[curd_uniformity]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('rating') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$curd_uniformity_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[curd_uniformity]" value="<?php echo $curd_uniformity_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['total_mrkt_heads']==1)
{
    $total_mrkt_heads_normal="";
    if(is_array($info)&& !empty($info['normal']['total_mrkt_heads']))
    {
        $total_mrkt_heads_normal=$info['normal']['total_mrkt_heads'];
    }
    $total_mrkt_heads_replica="";
    if(is_array($info)&& !empty($info['replica']['total_mrkt_heads']))
    {
        $total_mrkt_heads_replica=$info['replica']['total_mrkt_heads'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('TOTAL_MRKT_HEADS');?></label>
        </div>

        <div class="col-xs-3">
            <input type="text" name="normal[total_mrkt_heads]" class="form-control" value="<?php echo $total_mrkt_heads_normal;?>" />
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[total_mrkt_heads]" class="form-control" value="<?php echo $total_mrkt_heads_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[total_mrkt_heads]" value="<?php echo $total_mrkt_heads_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>


<?php
if($options['total_mrkt_head_wt']==1)
{
    $total_mrkt_head_wt_normal="";
    if(is_array($info)&& !empty($info['normal']['total_mrkt_head_wt']))
    {
        $total_mrkt_head_wt_normal=$info['normal']['total_mrkt_head_wt'];
    }
    $total_mrkt_head_wt_replica="";
    if(is_array($info)&& !empty($info['replica']['total_mrkt_head_wt']))
    {
        $total_mrkt_head_wt_replica=$info['replica']['total_mrkt_head_wt'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('TOTAL_MRKT_HEAD_WT');?></label>
        </div>

        <div class="col-xs-3">
            <input type="text" name="normal[total_mrkt_head_wt]" class="form-control" value="<?php echo $total_mrkt_head_wt_normal;?>" />
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[total_mrkt_head_wt]" class="form-control" value="<?php echo $total_mrkt_head_wt_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[total_mrkt_head_wt]" value="<?php echo $total_mrkt_head_wt_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['head_uniformity']==1)
{
    $head_uniformity_normal="";
    if(is_array($info)&& !empty($info['normal']['head_uniformity']))
    {
        $head_uniformity_normal=$info['normal']['head_uniformity'];
    }
    $head_uniformity_replica="";
    if(is_array($info)&& !empty($info['replica']['head_uniformity']))
    {
        $head_uniformity_replica=$info['replica']['head_uniformity'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('HEAD_UNIFORMITY');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[head_uniformity]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$head_uniformity_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[head_uniformity]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('rating') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$head_uniformity_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[head_uniformity]" value="<?php echo $head_uniformity_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>


<?php
if($options['no_of_fruits']==1)
{
    $no_of_fruits_normal="";
    if(is_array($info)&& !empty($info['normal']['no_of_fruits']))
    {
        $no_of_fruits_normal=$info['normal']['no_of_fruits'];
    }
    $no_of_fruits_replica="";
    if(is_array($info)&& !empty($info['replica']['no_of_fruits']))
    {
        $no_of_fruits_replica=$info['replica']['no_of_fruits'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('NO_OF_FRUITS');?></label>
        </div>

        <div class="col-xs-3">
            <input type="text" name="normal[no_of_fruits]" class="form-control" value="<?php echo $no_of_fruits_normal;?>" />
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[no_of_fruits]" class="form-control" value="<?php echo $no_of_fruits_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[no_of_fruits]" value="<?php echo $no_of_fruits_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['total_mrkt_fruits']==1)
{
    $total_mrkt_fruits_normal="";
    if(is_array($info)&& !empty($info['normal']['total_mrkt_fruits']))
    {
        $total_mrkt_fruits_normal=$info['normal']['total_mrkt_fruits'];
    }
    $total_mrkt_fruits_replica="";
    if(is_array($info)&& !empty($info['replica']['total_mrkt_fruits']))
    {
        $total_mrkt_fruits_replica=$info['replica']['total_mrkt_fruits'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('TOTAL_MRKT_FRUITS');?></label>
        </div>

        <div class="col-xs-3">
            <input type="text" name="normal[total_mrkt_fruits]" class="form-control" value="<?php echo $total_mrkt_fruits_normal;?>" />
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[total_mrkt_fruits]" class="form-control" value="<?php echo $total_mrkt_fruits_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[total_mrkt_fruits]" value="<?php echo $total_mrkt_fruits_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['total_mrkt_fruit_wt']==1)
{
    $total_mrkt_fruit_wt_normal="";
    if(is_array($info)&& !empty($info['normal']['total_mrkt_fruit_wt']))
    {
        $total_mrkt_fruit_wt_normal=$info['normal']['total_mrkt_fruit_wt'];
    }
    $total_mrkt_fruit_wt_replica="";
    if(is_array($info)&& !empty($info['replica']['total_mrkt_fruit_wt']))
    {
        $total_mrkt_fruit_wt_replica=$info['replica']['total_mrkt_fruit_wt'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('TOTAL_MRKT_FRUIT_WT');?></label>
        </div>

        <div class="col-xs-3">
            <input type="text" name="normal[total_mrkt_fruit_wt]" class="form-control" value="<?php echo $total_mrkt_fruit_wt_normal;?>" />
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[total_mrkt_fruit_wt]" class="form-control" value="<?php echo $total_mrkt_fruit_wt_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[total_mrkt_fruit_wt]" value="<?php echo $total_mrkt_fruit_wt_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['fruit_uniformity']==1)
{
    $fruit_uniformity_normal="";
    if(is_array($info)&& !empty($info['normal']['fruit_uniformity']))
    {
        $fruit_uniformity_normal=$info['normal']['fruit_uniformity'];
    }
    $fruit_uniformity_replica="";
    if(is_array($info)&& !empty($info['replica']['fruit_uniformity']))
    {
        $fruit_uniformity_replica=$info['replica']['fruit_uniformity'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('FRUIT_UNIFORMITY');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[fruit_uniformity]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$fruit_uniformity_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[fruit_uniformity]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('rating') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$fruit_uniformity_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[fruit_uniformity]" value="<?php echo $fruit_uniformity_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>


<?php
if($options['no_of_roots_harvested']==1)
{
    $no_of_roots_harvested_normal="";
    if(is_array($info)&& !empty($info['normal']['no_of_roots_harvested']))
    {
        $no_of_roots_harvested_normal=$info['normal']['no_of_roots_harvested'];
    }
    $no_of_roots_harvested_replica="";
    if(is_array($info)&& !empty($info['replica']['no_of_roots_harvested']))
    {
        $no_of_roots_harvested_replica=$info['replica']['no_of_roots_harvested'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('NO_OF_ROOTS_HARVESTED');?></label>
        </div>

        <div class="col-xs-3">
            <input type="text" name="normal[no_of_roots_harvested]" class="form-control" value="<?php echo $no_of_roots_harvested_normal;?>" />
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[no_of_roots_harvested]" class="form-control" value="<?php echo $no_of_roots_harvested_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[no_of_roots_harvested]" value="<?php echo $no_of_roots_harvested_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['total_mrkt_roots']==1)
{
    $total_mrkt_roots_normal="";
    if(is_array($info)&& !empty($info['normal']['total_mrkt_roots']))
    {
        $total_mrkt_roots_normal=$info['normal']['total_mrkt_roots'];
    }
    $total_mrkt_roots_replica="";
    if(is_array($info)&& !empty($info['replica']['total_mrkt_roots']))
    {
        $total_mrkt_roots_replica=$info['replica']['total_mrkt_roots'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('TOTAL_MRKT_ROOTS');?></label>
        </div>

        <div class="col-xs-3">
            <input type="text" name="normal[total_mrkt_roots]" class="form-control" value="<?php echo $total_mrkt_roots_normal;?>" />
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[total_mrkt_roots]" class="form-control" value="<?php echo $total_mrkt_roots_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[total_mrkt_roots]" value="<?php echo $total_mrkt_roots_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['total_mrkt_roots_wt']==1)
{
    $total_mrkt_roots_wt_normal="";
    if(is_array($info)&& !empty($info['normal']['total_mrkt_roots_wt']))
    {
        $total_mrkt_roots_wt_normal=$info['normal']['total_mrkt_roots_wt'];
    }
    $total_mrkt_roots_wt_replica="";
    if(is_array($info)&& !empty($info['replica']['total_mrkt_roots_wt']))
    {
        $total_mrkt_roots_wt_replica=$info['replica']['total_mrkt_roots_wt'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('TOTAL_MRKT_ROOTS_WT');?></label>
        </div>

        <div class="col-xs-3">
            <input type="text" name="normal[total_mrkt_roots_wt]" class="form-control" value="<?php echo $total_mrkt_roots_wt_normal;?>" />
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[total_mrkt_roots_wt]" class="form-control" value="<?php echo $total_mrkt_roots_wt_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[total_mrkt_roots_wt]" value="<?php echo $total_mrkt_roots_wt_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['roots_uniformity']==1)
{
    $roots_uniformity_normal="";
    if(is_array($info)&& !empty($info['normal']['roots_uniformity']))
    {
        $roots_uniformity_normal=$info['normal']['roots_uniformity'];
    }
    $roots_uniformity_replica="";
    if(is_array($info)&& !empty($info['replica']['roots_uniformity']))
    {
        $roots_uniformity_replica=$info['replica']['roots_uniformity'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('ROOTS_UNIFORMITY');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[roots_uniformity]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$roots_uniformity_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[roots_uniformity]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('rating') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$roots_uniformity_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[roots_uniformity]" value="<?php echo $roots_uniformity_replica;?>">
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
    $total_mrkt_leaf_normal="";
    if(is_array($info)&& !empty($info['normal']['total_mrkt_leaf']))
    {
        $total_mrkt_leaf_normal=$info['normal']['total_mrkt_leaf'];
    }
    $total_mrkt_leaf_replica="";
    if(is_array($info)&& !empty($info['replica']['total_mrkt_leaf']))
    {
        $total_mrkt_leaf_replica=$info['replica']['total_mrkt_leaf'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('TOTAL_MRKT_LEAF');?></label>
        </div>

        <div class="col-xs-3">
            <input type="text" name="normal[total_mrkt_leaf]" class="form-control" value="<?php echo $total_mrkt_leaf_normal;?>" />
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[total_mrkt_leaf]" class="form-control" value="<?php echo $total_mrkt_leaf_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[total_mrkt_leaf]" value="<?php echo $total_mrkt_leaf_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['total_mrkt_leaf_wt']==1)
{
    $total_mrkt_leaf_wt_normal="";
    if(is_array($info)&& !empty($info['normal']['total_mrkt_leaf_wt']))
    {
        $total_mrkt_leaf_wt_normal=$info['normal']['total_mrkt_leaf_wt'];
    }
    $total_mrkt_leaf_wt_replica="";
    if(is_array($info)&& !empty($info['replica']['total_mrkt_leaf_wt']))
    {
        $total_mrkt_leaf_wt_replica=$info['replica']['total_mrkt_leaf_wt'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('TOTAL_MRKT_LEAF_WT');?></label>
        </div>

        <div class="col-xs-3">
            <input type="text" name="normal[total_mrkt_leaf_wt]" class="form-control" value="<?php echo $total_mrkt_leaf_wt_normal;?>" />
        </div>

        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <input type="text" name="replica[total_mrkt_leaf_wt]" class="form-control" value="<?php echo $total_mrkt_leaf_wt_replica;?>" />
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[total_mrkt_leaf_wt]" value="<?php echo $total_mrkt_leaf_wt_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['leaf_uniformity']==1)
{
    $leaf_uniformity_normal="";
    if(is_array($info)&& !empty($info['normal']['leaf_uniformity']))
    {
        $leaf_uniformity_normal=$info['normal']['leaf_uniformity'];
    }
    $leaf_uniformity_replica="";
    if(is_array($info)&& !empty($info['replica']['leaf_uniformity']))
    {
        $leaf_uniformity_replica=$info['replica']['leaf_uniformity'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LEAF_UNIFORMITY');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[leaf_uniformity]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$name){?>
                    <option value="<?php echo $val;?>" <?php if($val==$leaf_uniformity_normal){echo 'selected';}?>><?php echo $name;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[leaf_uniformity]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($this->config->item('rating') as $val=>$name){?>
                        <option value="<?php echo $val;?>" <?php if($val==$leaf_uniformity_replica){echo 'selected';}?>><?php echo $name;?></option>
                    <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[leaf_uniformity]" value="<?php echo $leaf_uniformity_replica;?>">
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
<?php
}
?>

<script type="text/javascript">

    jQuery(document).ready(function()
    {
        //turn_off_triggers();
        $( "#harvesting_date_normal" ).datepicker({dateFormat : display_date_format});
        $( "#harvesting_date_replica" ).datepicker({dateFormat : display_date_format});
    });


</script>