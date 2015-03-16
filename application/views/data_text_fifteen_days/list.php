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
if($options['sowing_date']==1)
{
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SOWING_DATE');?></label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-6">
                <label class="form-control"><?php echo System_helper::display_date($variety_info['sowing_date']);?></label>
            </div>
        <?php
        }
        else
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo System_helper::display_date($variety_info['sowing_date']);?></label>
            </div>
        <?php
        }
        ?>

    </div>
    <?php
}
?>

<?php

if($options['transplanting_date']==1)
{
    // && $variety_info['transplanting_date']
    if($variety_info['sowing_date'] && $variety_info['optimum_transplanting_days'])
    {
    ?>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_EXPECTED_TRANSPLANTING_DATE');?></label>
            </div>
            <?php
            if($variety_info['replica_status']==1)
            {
                ?>
                <div class="col-xs-6">
                    <label class="form-control">
                        <?php
                        if($variety_info['optimum_transplanting_days'])
                        {
                            echo System_helper::display_date(($variety_info['optimum_transplanting_days']*60*60*24)+$variety_info['sowing_date']);
                        }
                        else
                        {
                            echo $this->lang->line("LABEL_NOT_SET");
                        }
                        ?>
                    </label>
                </div>
            <?php
            }
            else
            {
                ?>
                <div class="col-xs-3">
                    <label class="form-control">
                        <?php
                        if($variety_info['optimum_transplanting_days'])
                        {
                            echo System_helper::display_date(($variety_info['optimum_transplanting_days']*60*60*24)+$variety_info['sowing_date']);
                        }
                        else
                        {
                            echo $this->lang->line("LABEL_NOT_SET");
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

    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_TRANSPLANTING_DATE');?></label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-6">
                <label class="form-control">
                    <?php
                    if($variety_info['transplanting_date'])
                    {
                        echo System_helper::display_date($variety_info['transplanting_date']);
                    }
                    else
                    {
                        echo $this->lang->line("LABEL_NOT_SET");
                    }
                    ?>
                </label>
            </div>
        <?php
        }
        else
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control">
                    <?php
                    if($variety_info['transplanting_date'])
                    {
                        echo System_helper::display_date($variety_info['transplanting_date']);
                    }
                    else
                    {
                        echo $this->lang->line("LABEL_NOT_SET");
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
//if($options['fortnightly_reporting_date']==1)
//{
//    ?>
<!--    <div class="row show-grid">-->
<!--        <div class="col-xs-4">-->
<!--            <label class="control-label pull-right">--><?php //echo $this->lang->line('LABEL_TRANSPLANTING_REPORTING_DATE');?><!--</label>-->
<!--        </div>-->
<!--        --><?php
//        if($variety_info['replica_status']==1)
//        {
//            ?>
<!--            <div class="col-xs-6">-->
<!--                <label class="form-control">--><?php //echo System_helper::display_date($variety_info['transplanting_date']);?><!--</label>-->
<!--            </div>-->
<!--        --><?php
//        }
//        else
//        {
//            ?>
<!--            <div class="col-xs-3">-->
<!--                <label class="form-control">--><?php //echo System_helper::display_date($variety_info['transplanting_date']);?><!--</label>-->
<!--            </div>-->
<!--        --><?php
//        }
//        ?>
<!--    </div>-->
<?php
//}
//?>


<?php
    $actual_reporting_date_normal="";
    if(is_array($info)&& !empty($info['normal']['actual_reporting_date']))
    {
        $actual_reporting_date_normal=$info['normal']['actual_reporting_date'];
    }
?>

<div class="row show-grid">
    <div class="col-xs-4">
        <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_REPORTING_DATE');?></label>
    </div>
    <?php
    if($variety_info['replica_status']==1)
    {
        ?>
        <div class="col-xs-6">
            <input type="text" class="form-control actual_reporting_date" name="normal[actual_reporting_date]" value="<?php echo $actual_reporting_date_normal;?>" />
        </div>
    <?php
    }
    else
    {
        ?>
        <div class="col-xs-3">
            <input type="text" class="form-control actual_reporting_date" name="normal[actual_reporting_date]" value="<?php echo $actual_reporting_date_normal;?>" />
        </div>
    <?php
    }
    ?>
</div>


<?php
if($options['initial_plants_during_trial_started']==1)
{
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_INITIAL_PLANTS_DURING_TRIAL_STARTED');?></label>
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
}
?>


<?php
if($options['plant_type_appearance']==1)
{
    $plant_type_appearance_normal="";
    if(is_array($info)&& !empty($info['normal']['plant_type_appearance']))
    {
        $plant_type_appearance_normal=$info['normal']['plant_type_appearance'];
    }
    $plant_type_appearance_replica="";
    if(is_array($info)&& !empty($info['replica']['plant_type_appearance']))
    {
        $plant_type_appearance_replica=$info['replica']['plant_type_appearance'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_PLANT_TYPE_APPEARANCE');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[plant_type_appearance]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>" <?php if($val==$plant_type_appearance_normal){echo 'selected';} ?>><?php echo $val;?></option>
                <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[plant_type_appearance]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>" <?php if($val==$plant_type_appearance_replica){echo 'selected';} ?>><?php echo $val;?></option>
                <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[plant_type_appearance]" value="<?php echo $plant_type_appearance_replica;?>">
            <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['plant_type']==1)
{
    $plant_type_normal="";
    if(is_array($info)&& !empty($info['normal']['plant_type']))
    {
        $plant_type_normal=$info['normal']['plant_type'];
    }
    $plant_type_replica="";
    if(is_array($info)&& !empty($info['replica']['plant_type']))
    {
        $plant_type_replica=$info['replica']['plant_type'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_PLANT_TYPE');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[plant_type]"">
            <option value=""><?php echo $this->lang->line('SELECT');?></option>
            <?php foreach($this->config->item('rating') as $val=>$rating){?>
                <option value="<?php echo $val;?>" <?php if($val==$plant_type_normal){echo 'selected';} ?>><?php echo $val;?></option>
            <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[plant_type]"">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>" <?php if($val==$plant_type_replica){echo 'selected';} ?>><?php echo $val;?></option>
                <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[plant_type]" value="<?php echo $plant_type_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['plant_uniformity']==1)
{
    $plant_uniformity_normal="";
    if(is_array($info)&& !empty($info['normal']['plant_uniformity']))
    {
        $plant_uniformity_normal=$info['normal']['plant_uniformity'];
    }
    $plant_uniformity_replica="";
    if(is_array($info)&& !empty($info['replica']['plant_uniformity']))
    {
        $plant_uniformity_replica=$info['replica']['plant_uniformity'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_PLANT_UNIFORMITY');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[plant_uniformity]"">
            <option value=""><?php echo $this->lang->line('SELECT');?></option>
            <?php foreach($this->config->item('rating') as $val=>$rating){?>
                <option value="<?php echo $val;?>" <?php if($val==$plant_uniformity_normal){echo 'selected';} ?>><?php echo $val;?></option>
            <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[plant_uniformity]"">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>" <?php if($val==$plant_uniformity_replica){echo 'selected';} ?>><?php echo $val;?></option>
                <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[plant_uniformity]" value="<?php echo $plant_uniformity_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['distance_from_ground_to_curd']==1)
{
    $distance_from_ground_to_curd_normal="";
    if(is_array($info)&& !empty($info['normal']['distance_from_ground_to_curd']))
    {
        $distance_from_ground_to_curd_normal=$info['normal']['distance_from_ground_to_curd'];
    }
    $distance_from_ground_to_curd_replica="";
    if(is_array($info)&& !empty($info['replica']['distance_from_ground_to_curd']))
    {
        $distance_from_ground_to_curd_replica=$info['replica']['distance_from_ground_to_curd'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_DISTANCE_FROM_GROUND_TO_CURD');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[distance_from_ground_to_curd]"">
            <option value=""><?php echo $this->lang->line('SELECT');?></option>
            <?php foreach($this->config->item('rating') as $val=>$rating){?>
                <option value="<?php echo $val;?>" <?php if($val==$distance_from_ground_to_curd_normal){echo 'selected';} ?>><?php echo $val;?></option>
            <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[distance_from_ground_to_curd]"">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>" <?php if($val==$distance_from_ground_to_curd_replica){echo 'selected';} ?>><?php echo $val;?></option>
                <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[distance_from_ground_to_curd]" value="<?php echo $distance_from_ground_to_curd_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['distance_from_ground_to_head']==1)
{
    $distance_from_ground_to_head_normal="";
    if(is_array($info)&& !empty($info['normal']['distance_from_ground_to_head']))
    {
        $distance_from_ground_to_head_normal=$info['normal']['distance_from_ground_to_head'];
    }
    $distance_from_ground_to_head_replica="";
    if(is_array($info)&& !empty($info['replica']['distance_from_ground_to_head']))
    {
        $distance_from_ground_to_head_replica=$info['replica']['distance_from_ground_to_head'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_DISTANCE_FROM_GROUND_TO_HEAD');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[distance_from_ground_to_head]"">
            <option value=""><?php echo $this->lang->line('SELECT');?></option>
            <?php foreach($this->config->item('rating') as $val=>$rating){?>
                <option value="<?php echo $val;?>" <?php if($val==$distance_from_ground_to_head_normal){echo 'selected';} ?>><?php echo $val;?></option>
            <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[distance_from_ground_to_head]"">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>" <?php if($val==$distance_from_ground_to_head_replica){echo 'selected';} ?>><?php echo $val;?></option>
                <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[distance_from_ground_to_head]" value="<?php echo $distance_from_ground_to_head_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['distance_from_ground_to_root_shoulder']==1)
{
    $distance_from_ground_to_root_shoulder_normal="";
    if(is_array($info)&& !empty($info['normal']['distance_from_ground_to_root_shoulder']))
    {
        $distance_from_ground_to_root_shoulder_normal=$info['normal']['distance_from_ground_to_root_shoulder'];
    }
    $distance_from_ground_to_root_shoulder_replica="";
    if(is_array($info)&& !empty($info['replica']['distance_from_ground_to_root_shoulder']))
    {
        $distance_from_ground_to_root_shoulder_replica=$info['replica']['distance_from_ground_to_root_shoulder'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_DISTANCE_FROM_GROUND_TO_ROOT_SHOULDER');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[distance_from_ground_to_root_shoulder]"">
            <option value=""><?php echo $this->lang->line('SELECT');?></option>
            <?php foreach($this->config->item('rating') as $val=>$rating){?>
                <option value="<?php echo $val;?>" <?php if($val==$distance_from_ground_to_root_shoulder_normal){echo 'selected';} ?>><?php echo $val;?></option>
            <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[distance_from_ground_to_root_shoulder]"">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>" <?php if($val==$distance_from_ground_to_root_shoulder_replica){echo 'selected';} ?>><?php echo $val;?></option>
                <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[distance_from_ground_to_root_shoulder]" value="<?php echo $distance_from_ground_to_root_shoulder_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>
<?php
if($options['distance_from_ground_leaf_shoulder']==1)
{
    $distance_from_ground_leaf_shoulder_normal="";
    if(is_array($info)&& !empty($info['normal']['distance_from_ground_leaf_shoulder']))
    {
        $distance_from_ground_leaf_shoulder_normal=$info['normal']['distance_from_ground_leaf_shoulder'];
    }
    $distance_from_ground_leaf_shoulder_replica="";
    if(is_array($info)&& !empty($info['replica']['distance_from_ground_leaf_shoulder']))
    {
        $distance_from_ground_leaf_shoulder_replica=$info['replica']['distance_from_ground_leaf_shoulder'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_DISTANCE_FROM_GROUND_LEAF_SHOULDER');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[distance_from_ground_leaf_shoulder]"">
            <option value=""><?php echo $this->lang->line('SELECT');?></option>
            <?php foreach($this->config->item('rating') as $val=>$rating){?>
                <option value="<?php echo $val;?>" <?php if($val==$distance_from_ground_leaf_shoulder_normal){echo 'selected';} ?>><?php echo $val;?></option>
            <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[distance_from_ground_leaf_shoulder]"">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>" <?php if($val==$distance_from_ground_leaf_shoulder_replica){echo 'selected';} ?>><?php echo $val;?></option>
                <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[distance_from_ground_leaf_shoulder]" value="<?php echo $distance_from_ground_leaf_shoulder_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['curd_type']==1)
{
    $curd_type_normal="";
    if(is_array($info)&& !empty($info['normal']['curd_type']))
    {
        $curd_type_normal=$info['normal']['curd_type'];
    }
    $curd_type_replica="";
    if(is_array($info)&& !empty($info['replica']['curd_type']))
    {
        $curd_type_replica=$info['replica']['curd_type'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_CURD_TYPE');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[curd_type]"">
            <option value=""><?php echo $this->lang->line('SELECT');?></option>
            <?php foreach($this->config->item('curd_Type_rating') as $val=>$rating){?>
                <option value="<?php echo $val;?>" <?php if($val==$curd_type_normal){echo 'selected';} ?>><?php echo $rating;?></option>
            <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[curd_type]"">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('curd_Type_rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>" <?php if($val==$curd_type_replica){echo 'selected';} ?>><?php echo $rating;?></option>
                <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[curd_type]" value="<?php echo $curd_type_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['head_type']==1)
{
    $head_type_normal="";
    if(is_array($info)&& !empty($info['normal']['head_type']))
    {
        $head_type_normal=$info['normal']['head_type'];
    }
    $head_type_replica="";
    if(is_array($info)&& !empty($info['replica']['head_type']))
    {
        $head_type_replica=$info['replica']['head_type'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_HEAD_TYPE');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[head_type]"">
            <option value=""><?php echo $this->lang->line('SELECT');?></option>
            <?php foreach($this->config->item('head_Type_rating') as $val=>$rating){?>
                <option value="<?php echo $val;?>" <?php if($val==$head_type_normal){echo 'selected';} ?>><?php echo $rating;?></option>
            <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[head_type]"">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('head_Type_rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>" <?php if($val==$head_type_replica){echo 'selected';} ?>><?php echo $rating;?></option>
                <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[head_type]" value="<?php echo $head_type_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>
<?php
if($options['leaf_shape']==1)
{
    $leaf_shape_normal="";
    if(is_array($info)&& !empty($info['normal']['leaf_shape']))
    {
        $leaf_shape_normal=$info['normal']['leaf_shape'];
    }
    $leaf_shape_replica="";
    if(is_array($info)&& !empty($info['replica']['leaf_shape']))
    {
        $leaf_shape_replica=$info['replica']['leaf_shape'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_LEAF_SHAPE');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[leaf_shape]"">
            <option value=""><?php echo $this->lang->line('SELECT');?></option>
            <?php foreach($this->config->item('rating') as $val=>$rating){?>
                <option value="<?php echo $val;?>" <?php if($val==$leaf_shape_normal){echo 'selected';} ?>><?php echo $val;?></option>
            <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[leaf_shape]"">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>" <?php if($val==$leaf_shape_replica){echo 'selected';} ?>><?php echo $val;?></option>
                <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[leaf_shape]" value="<?php echo $leaf_shape_replica;?>">
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
    $root_shape_normal="";
    if(is_array($info)&& !empty($info['normal']['root_shape']))
    {
        $root_shape_normal=$info['normal']['root_shape'];
    }
    $root_shape_replica="";
    if(is_array($info)&& !empty($info['replica']['root_shape']))
    {
        $root_shape_replica=$info['replica']['root_shape'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_ROOT_SHAPE');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[root_shape]"">
            <option value=""><?php echo $this->lang->line('SELECT');?></option>
            <?php foreach($this->config->item('rating') as $val=>$rating){?>
                <option value="<?php echo $val;?>" <?php if($val==$root_shape_normal){echo 'selected';} ?>><?php echo $val;?></option>
            <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[root_shape]"">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>" <?php if($val==$root_shape_replica){echo 'selected';} ?>><?php echo $val;?></option>
                <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[root_shape]" value="<?php echo $root_shape_replica;?>">
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
    $fruit_shape_normal="";
    if(is_array($info)&& !empty($info['normal']['fruit_shape']))
    {
        $fruit_shape_normal=$info['normal']['fruit_shape'];
    }
    $fruit_shape_replica="";
    if(is_array($info)&& !empty($info['replica']['fruit_shape']))
    {
        $fruit_shape_replica=$info['replica']['fruit_shape'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_FRUIT_SHAPE');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[fruit_shape]"">
            <option value=""><?php echo $this->lang->line('SELECT');?></option>
            <?php foreach($this->config->item('rating') as $val=>$rating){?>
                <option value="<?php echo $val;?>" <?php if($val==$fruit_shape_normal){echo 'selected';} ?>><?php echo $val;?></option>
            <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[fruit_shape]"">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>" <?php if($val==$fruit_shape_replica){echo 'selected';} ?>><?php echo $val;?></option>
                <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[fruit_shape]" value="<?php echo $fruit_shape_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>
<?php
if($options['root_type']==1)
{
    $root_type_normal="";
    if(is_array($info)&& !empty($info['normal']['root_type']))
    {
        $root_type_normal=$info['normal']['root_type'];
    }
    $root_type_replica="";
    if(is_array($info)&& !empty($info['replica']['root_type']))
    {
        $root_type_replica=$info['replica']['root_type'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_ROOT_TYPE');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[root_type]"">
            <option value=""><?php echo $this->lang->line('SELECT');?></option>
            <?php foreach($this->config->item('root_Type_rating') as $val=>$rating){?>
                <option value="<?php echo $val;?>" <?php if($val==$root_type_normal){echo 'selected';} ?>><?php echo $rating;?></option>
            <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[root_type]"">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('root_Type_rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>" <?php if($val==$root_type_replica){echo 'selected';} ?>><?php echo $rating;?></option>
                <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[root_type]" value="<?php echo $root_type_replica;?>">
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
    $leaf_type_normal="";
    if(is_array($info)&& !empty($info['normal']['leaf_type']))
    {
        $leaf_type_normal=$info['normal']['leaf_type'];
    }
    $leaf_type_replica="";
    if(is_array($info)&& !empty($info['replica']['leaf_type']))
    {
        $leaf_type_replica=$info['replica']['leaf_type'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_LEAF_TYPE');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[leaf_type]"">
            <option value=""><?php echo $this->lang->line('SELECT');?></option>
            <?php foreach($this->config->item('leaf_Type_rating') as $val=>$rating){?>
                <option value="<?php echo $val;?>" <?php if($val==$leaf_type_normal){echo 'selected';} ?>><?php echo $rating;?></option>
            <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[leaf_type]"">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('leaf_Type_rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>" <?php if($val==$leaf_type_replica){echo 'selected';} ?>><?php echo $rating;?></option>
                <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[leaf_type]" value="<?php echo $leaf_type_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['spine_type']==1)
{
    $spine_type_normal="";
    if(is_array($info)&& !empty($info['normal']['spine_type']))
    {
        $spine_type_normal=$info['normal']['spine_type'];
    }
    $spine_type_replica="";
    if(is_array($info)&& !empty($info['replica']['spine_type']))
    {
        $spine_type_replica=$info['replica']['spine_type'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SPINE_TYPE');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[spine_type]"">
            <option value=""><?php echo $this->lang->line('SELECT');?></option>
            <?php foreach($this->config->item('spine_type_rating') as $val=>$rating){?>
                <option value="<?php echo $val;?>" <?php if($val==$spine_type_normal){echo 'selected';} ?>><?php echo $rating;?></option>
            <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[spine_type]"">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('spine_type_rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>" <?php if($val==$spine_type_replica){echo 'selected';} ?>><?php echo $rating;?></option>
                <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[spine_type]" value="<?php echo $spine_type_replica;?>">
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
    $curd_colour_normal="";
    if(is_array($info)&& !empty($info['normal']['curd_colour']))
    {
        $curd_colour_normal=$info['normal']['curd_colour'];
    }
    $curd_colour_replica="";
    if(is_array($info)&& !empty($info['replica']['curd_colour']))
    {
        $curd_colour_replica=$info['replica']['curd_colour'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_CURD_COLOUR');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[curd_colour]"">
            <option value=""><?php echo $this->lang->line('SELECT');?></option>
            <?php foreach($this->config->item('rating') as $val=>$rating){?>
                <option value="<?php echo $val;?>" <?php if($val==$curd_colour_normal){echo 'selected';} ?>><?php echo $val;?></option>
            <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[curd_colour]"">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>" <?php if($val==$curd_colour_replica){echo 'selected';} ?>><?php echo $val;?></option>
                <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[curd_colour]" value="<?php echo $curd_colour_replica;?>">
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
    $head_colour_normal="";
    if(is_array($info)&& !empty($info['normal']['head_colour']))
    {
        $head_colour_normal=$info['normal']['head_colour'];
    }
    $head_colour_replica="";
    if(is_array($info)&& !empty($info['replica']['head_colour']))
    {
        $head_colour_replica=$info['replica']['head_colour'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_HEAD_COLOUR');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[head_colour]"">
            <option value=""><?php echo $this->lang->line('SELECT');?></option>
            <?php foreach($this->config->item('rating') as $val=>$rating){?>
                <option value="<?php echo $val;?>" <?php if($val==$head_colour_normal){echo 'selected';} ?>><?php echo $val;?></option>
            <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[head_colour]"">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>" <?php if($val==$head_colour_replica){echo 'selected';} ?>><?php echo $val;?></option>
                <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[head_colour]" value="<?php echo $head_colour_replica;?>">
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
    $leaf_colour_normal="";
    if(is_array($info)&& !empty($info['normal']['leaf_colour']))
    {
        $leaf_colour_normal=$info['normal']['leaf_colour'];
    }
    $leaf_colour_replica="";
    if(is_array($info)&& !empty($info['replica']['leaf_colour']))
    {
        $leaf_colour_replica=$info['replica']['leaf_colour'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_LEAF_COLOUR');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[leaf_colour]"">
            <option value=""><?php echo $this->lang->line('SELECT');?></option>
            <?php foreach($this->config->item('rating') as $val=>$rating){?>
                <option value="<?php echo $val;?>" <?php if($val==$leaf_colour_normal){echo 'selected';} ?>><?php echo $val;?></option>
            <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[leaf_colour]"">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>" <?php if($val==$leaf_colour_replica){echo 'selected';} ?>><?php echo $val;?></option>
                <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[leaf_colour]" value="<?php echo $leaf_colour_replica;?>">
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
    $fruit_colour_normal="";
    if(is_array($info)&& !empty($info['normal']['fruit_colour']))
    {
        $fruit_colour_normal=$info['normal']['fruit_colour'];
    }
    $fruit_colour_replica="";
    if(is_array($info)&& !empty($info['replica']['fruit_colour']))
    {
        $fruit_colour_replica=$info['replica']['fruit_colour'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_FRUIT_COLOUR');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[fruit_colour]"">
            <option value=""><?php echo $this->lang->line('SELECT');?></option>
            <?php foreach($this->config->item('rating') as $val=>$rating){?>
                <option value="<?php echo $val;?>" <?php if($val==$fruit_colour_normal){echo 'selected';} ?>><?php echo $val;?></option>
            <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[fruit_colour]"">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>" <?php if($val==$fruit_colour_replica){echo 'selected';} ?>><?php echo $val;?></option>
                <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[fruit_colour]" value="<?php echo $fruit_colour_replica;?>">
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
    $root_colour_normal="";
    if(is_array($info)&& !empty($info['normal']['root_colour']))
    {
        $root_colour_normal=$info['normal']['root_colour'];
    }
    $root_colour_replica="";
    if(is_array($info)&& !empty($info['replica']['root_colour']))
    {
        $root_colour_replica=$info['replica']['root_colour'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_ROOT_COLOUR');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[root_colour]"">
            <option value=""><?php echo $this->lang->line('SELECT');?></option>
            <?php foreach($this->config->item('rating') as $val=>$rating){?>
                <option value="<?php echo $val;?>" <?php if($val==$root_colour_normal){echo 'selected';} ?>><?php echo $val;?></option>
            <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[root_colour]"">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>" <?php if($val==$root_colour_replica){echo 'selected';} ?>><?php echo $val;?></option>
                <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[root_colour]" value="<?php echo $root_colour_replica;?>">
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
    $fruit_size_normal="";
    if(is_array($info)&& !empty($info['normal']['fruit_size']))
    {
        $fruit_size_normal=$info['normal']['fruit_size'];
    }
    $fruit_size_replica="";
    if(is_array($info)&& !empty($info['replica']['fruit_size']))
    {
        $fruit_size_replica=$info['replica']['fruit_size'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_FRUIT_SIZE');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[fruit_size]"">
            <option value=""><?php echo $this->lang->line('SELECT');?></option>
            <?php foreach($this->config->item('rating') as $val=>$rating){?>
                <option value="<?php echo $val;?>" <?php if($val==$fruit_size_normal){echo 'selected';} ?>><?php echo $val;?></option>
            <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[fruit_size]"">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>" <?php if($val==$fruit_size_replica){echo 'selected';} ?>><?php echo $val;?></option>
                <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[fruit_size]" value="<?php echo $fruit_size_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>
<?php
if($options['fruit_bearing']==1)
{
    $fruit_bearing_normal="";
    if(is_array($info)&& !empty($info['normal']['fruit_bearing']))
    {
        $fruit_bearing_normal=$info['normal']['fruit_bearing'];
    }
    $fruit_bearing_replica="";
    if(is_array($info)&& !empty($info['replica']['fruit_bearing']))
    {
        $fruit_bearing_replica=$info['replica']['fruit_bearing'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_FRUIT_BEARING');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[fruit_bearing]"">
            <option value=""><?php echo $this->lang->line('SELECT');?></option>
            <?php foreach($this->config->item('rating') as $val=>$rating){?>
                <option value="<?php echo $val;?>" <?php if($val==$fruit_bearing_normal){echo 'selected';} ?>><?php echo $val;?></option>
            <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[fruit_bearing]"">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>" <?php if($val==$fruit_bearing_replica){echo 'selected';} ?>><?php echo $val;?></option>
                <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[fruit_bearing]" value="<?php echo $fruit_bearing_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['curd_compactness']==1)
{
    $curd_compactness_normal="";
    if(is_array($info)&& !empty($info['normal']['curd_compactness']))
    {
        $curd_compactness_normal=$info['normal']['curd_compactness'];
    }
    $curd_compactness_replica="";
    if(is_array($info)&& !empty($info['replica']['curd_compactness']))
    {
        $curd_compactness_replica=$info['replica']['curd_compactness'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_CURD_COMPACTNESS');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[curd_compactness]"">
            <option value=""><?php echo $this->lang->line('SELECT');?></option>
            <?php foreach($this->config->item('rating') as $val=>$rating){?>
                <option value="<?php echo $val;?>" <?php if($val==$curd_compactness_normal){echo 'selected';} ?>><?php echo $val;?></option>
            <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[curd_compactness]"">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>" <?php if($val==$curd_compactness_replica){echo 'selected';} ?>><?php echo $val;?></option>
                <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[curd_compactness]" value="<?php echo $curd_compactness_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>
<?php
if($options['head_compactness']==1)
{
    $head_compactness_normal="";
    if(is_array($info)&& !empty($info['normal']['head_compactness']))
    {
        $head_compactness_normal=$info['normal']['head_compactness'];
    }
    $head_compactness_replica="";
    if(is_array($info)&& !empty($info['replica']['head_compactness']))
    {
        $head_compactness_replica=$info['replica']['head_compactness'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_HEAD_COMPACTNESS');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[head_compactness]"">
            <option value=""><?php echo $this->lang->line('SELECT');?></option>
            <?php foreach($this->config->item('rating') as $val=>$rating){?>
                <option value="<?php echo $val;?>" <?php if($val==$head_compactness_normal){echo 'selected';} ?>><?php echo $val;?></option>
            <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[head_compactness]"">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>" <?php if($val==$head_compactness_replica){echo 'selected';} ?>><?php echo $val;?></option>
                <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[head_compactness]" value="<?php echo $head_compactness_replica;?>">
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
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_CURD_UNIFORMITY');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[curd_uniformity]"">
            <option value=""><?php echo $this->lang->line('SELECT');?></option>
            <?php foreach($this->config->item('rating') as $val=>$rating){?>
                <option value="<?php echo $val;?>" <?php if($val==$curd_uniformity_normal){echo 'selected';} ?>><?php echo $val;?></option>
            <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[curd_uniformity]"">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>" <?php if($val==$curd_uniformity_replica){echo 'selected';} ?>><?php echo $val;?></option>
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
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_HEAD_UNIFORMITY');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[head_uniformity]"">
            <option value=""><?php echo $this->lang->line('SELECT');?></option>
            <?php foreach($this->config->item('rating') as $val=>$rating){?>
                <option value="<?php echo $val;?>" <?php if($val==$head_uniformity_normal){echo 'selected';} ?>><?php echo $val;?></option>
            <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[head_uniformity]"">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>" <?php if($val==$head_uniformity_replica){echo 'selected';} ?>><?php echo $val;?></option>
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
if($options['fruit_size_uniformity']==1)
{
    $fruit_size_uniformity_normal="";
    if(is_array($info)&& !empty($info['normal']['fruit_size_uniformity']))
    {
        $fruit_size_uniformity_normal=$info['normal']['fruit_size_uniformity'];
    }
    $fruit_size_uniformity_replica="";
    if(is_array($info)&& !empty($info['replica']['fruit_size_uniformity']))
    {
        $fruit_size_uniformity_replica=$info['replica']['fruit_size_uniformity'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_FRUIT_SIZE_UNIFORMITY');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[fruit_size_uniformity]"">
            <option value=""><?php echo $this->lang->line('SELECT');?></option>
            <?php foreach($this->config->item('rating') as $val=>$rating){?>
                <option value="<?php echo $val;?>" <?php if($val==$fruit_size_uniformity_normal){echo 'selected';} ?>><?php echo $val;?></option>
            <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[fruit_size_uniformity]"">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>" <?php if($val==$fruit_size_uniformity_replica){echo 'selected';} ?>><?php echo $val;?></option>
                <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[fruit_size_uniformity]" value="<?php echo $fruit_size_uniformity_replica;?>">
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
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_FRUIT_UNIFORMITY');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[fruit_uniformity]"">
            <option value=""><?php echo $this->lang->line('SELECT');?></option>
            <?php foreach($this->config->item('rating') as $val=>$rating){?>
                <option value="<?php echo $val;?>" <?php if($val==$fruit_uniformity_normal){echo 'selected';} ?>><?php echo $val;?></option>
            <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[fruit_uniformity]"">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>" <?php if($val==$fruit_uniformity_replica){echo 'selected';} ?>><?php echo $val;?></option>
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
if($options['uniformity_of_leaves']==1)
{
    $uniformity_of_leaves_normal="";
    if(is_array($info)&& !empty($info['normal']['uniformity_of_leaves']))
    {
        $uniformity_of_leaves_normal=$info['normal']['uniformity_of_leaves'];
    }
    $uniformity_of_leaves_replica="";
    if(is_array($info)&& !empty($info['replica']['uniformity_of_leaves']))
    {
        $uniformity_of_leaves_replica=$info['replica']['uniformity_of_leaves'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_UNIFORMITY_OF_LEAVES');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[uniformity_of_leaves]"">
            <option value=""><?php echo $this->lang->line('SELECT');?></option>
            <?php foreach($this->config->item('rating') as $val=>$rating){?>
                <option value="<?php echo $val;?>" <?php if($val==$uniformity_of_leaves_normal){echo 'selected';} ?>><?php echo $val;?></option>
            <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[uniformity_of_leaves]"">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>" <?php if($val==$uniformity_of_leaves_replica){echo 'selected';} ?>><?php echo $val;?></option>
                <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[uniformity_of_leaves]" value="<?php echo $uniformity_of_leaves_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>


<?php
if($options['disease_sustainability']==1)
{
    $disease_sustainability_normal="";
    if(is_array($info)&& !empty($info['normal']['disease_sustainability']))
    {
        $disease_sustainability_normal=$info['normal']['disease_sustainability'];
    }
    $disease_sustainability_replica="";
    if(is_array($info)&& !empty($info['replica']['disease_sustainability']))
    {
        $disease_sustainability_replica=$info['replica']['disease_sustainability'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_DISEASE_SUSTAINABILITY');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[disease_sustainability]"">
            <option value=""><?php echo $this->lang->line('SELECT');?></option>
            <?php foreach($this->config->item('rating') as $val=>$rating){?>
                <option value="<?php echo $val;?>" <?php if($val==$disease_sustainability_normal){echo 'selected';} ?>><?php echo $val;?></option>
            <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[disease_sustainability]"">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>" <?php if($val==$disease_sustainability_replica){echo 'selected';} ?>><?php echo $val;?></option>
                <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[disease_sustainability]" value="<?php echo $disease_sustainability_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['internode_distance']==1)
{
    $internode_distance_normal="";
    if(is_array($info)&& !empty($info['normal']['internode_distance']))
    {
        $internode_distance_normal=$info['normal']['internode_distance'];
    }
    $internode_distance_replica="";
    if(is_array($info)&& !empty($info['replica']['internode_distance']))
    {
        $internode_distance_replica=$info['replica']['internode_distance'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_INTERNODE_DISTANCE');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[internode_distance]"">
            <option value=""><?php echo $this->lang->line('SELECT');?></option>
            <?php foreach($this->config->item('rating') as $val=>$rating){?>
                <option value="<?php echo $val;?>" <?php if($val==$internode_distance_normal){echo 'selected';} ?>><?php echo $val;?></option>
            <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[internode_distance]"">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>" <?php if($val==$internode_distance_replica){echo 'selected';} ?>><?php echo $val;?></option>
                <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[internode_distance]" value="<?php echo $internode_distance_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['hardness_of_spines']==1)
{
    $hardness_of_spines_normal="";
    if(is_array($info)&& !empty($info['normal']['hardness_of_spines']))
    {
        $hardness_of_spines_normal=$info['normal']['hardness_of_spines'];
    }
    $hardness_of_spines_replica="";
    if(is_array($info)&& !empty($info['replica']['hardness_of_spines']))
    {
        $hardness_of_spines_replica=$info['replica']['hardness_of_spines'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_HARDNESS_OF_SPINES');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[hardness_of_spines]"">
            <option value=""><?php echo $this->lang->line('SELECT');?></option>
            <?php foreach($this->config->item('rating') as $val=>$rating){?>
                <option value="<?php echo $val;?>" <?php if($val==$hardness_of_spines_normal){echo 'selected';} ?>><?php echo $val;?></option>
            <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[hardness_of_spines]"">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>" <?php if($val==$hardness_of_spines_replica){echo 'selected';} ?>><?php echo $val;?></option>
                <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[hardness_of_spines]" value="<?php echo $hardness_of_spines_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['leaf_height_from_root']==1)
{
    $leaf_height_from_root_normal="";
    if(is_array($info)&& !empty($info['normal']['leaf_height_from_root']))
    {
        $leaf_height_from_root_normal=$info['normal']['leaf_height_from_root'];
    }
    $leaf_height_from_root_replica="";
    if(is_array($info)&& !empty($info['replica']['leaf_height_from_root']))
    {
        $leaf_height_from_root_replica=$info['replica']['leaf_height_from_root'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_LEAF_HEIGHT_FROM_ROOT');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[leaf_height_from_root]"">
            <option value=""><?php echo $this->lang->line('SELECT');?></option>
            <?php foreach($this->config->item('rating') as $val=>$rating){?>
                <option value="<?php echo $val;?>" <?php if($val==$leaf_height_from_root_normal){echo 'selected';} ?>><?php echo $val;?></option>
            <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[leaf_height_from_root]"">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>" <?php if($val==$leaf_height_from_root_replica){echo 'selected';} ?>><?php echo $val;?></option>
                <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[leaf_height_from_root]" value="<?php echo $leaf_height_from_root_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>

<?php
if($options['adaptability']==1)
{
    $adaptability_normal="";
    if(is_array($info)&& !empty($info['normal']['adaptability']))
    {
        $adaptability_normal=$info['normal']['adaptability'];
    }
    $adaptability_replica="";
    if(is_array($info)&& !empty($info['replica']['adaptability']))
    {
        $adaptability_replica=$info['replica']['adaptability'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_ADAPTABILITY');?></label>
        </div>
        <div class="col-xs-3">
            <textarea class="form-control" name="normal[adaptability]""><?php echo $adaptability_normal; ?></textarea>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <textarea class="form-control" name="replica[adaptability]""><?php echo $adaptability_replica; ?></textarea>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[adaptability]" value="<?php echo $adaptability_replica;?>">
        <?php
        }
        ?>

    </div>
<?php
}
?>
<?php
if($options['ridge_quality']==1)
{
    $ridge_quality_normal="";
    if(is_array($info)&& !empty($info['normal']['ridge_quality']))
    {
        $ridge_quality_normal=$info['normal']['ridge_quality'];
    }
    $ridge_quality_replica="";
    if(is_array($info)&& !empty($info['replica']['ridge_quality']))
    {
        $ridge_quality_replica=$info['replica']['ridge_quality'];
    }
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_RIDGE_QUALITY');?></label>
        </div>
        <div class="col-xs-3">
            <select class="form-control" name="normal[ridge_quality]"">
            <option value=""><?php echo $this->lang->line('SELECT');?></option>
            <?php foreach($this->config->item('rating') as $val=>$rating){?>
                <option value="<?php echo $val;?>" <?php if($val==$ridge_quality_normal){echo 'selected';} ?>><?php echo $val;?></option>
            <?php }?>
            </select>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <select class="form-control" name="replica[ridge_quality]"">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>" <?php if($val==$ridge_quality_replica){echo 'selected';} ?>><?php echo $val;?></option>
                <?php }?>
                </select>
            </div>
        <?php
        }
        else
        {
            ?>
            <input type="hidden" name="replica[ridge_quality]" value="<?php echo $ridge_quality_replica;?>">
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
            <textarea class="form-control" name="normal[special_characters]""><?php echo $special_characters_normal; ?></textarea>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-3">
                <textarea class="form-control" name="replica[special_characters]""><?php echo $special_characters_replica; ?></textarea>
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
        $( ".actual_reporting_date" ).datepicker({dateFormat : display_date_format});

        $(document).on("keypress", ".ranking", function(event)
        {
            return isNumberKey(event);
        });
    });

</script>