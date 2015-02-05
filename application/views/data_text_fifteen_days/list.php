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
if($options['fortnightly_reporting_date']==1)
{
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_FORTNIGHTLY_REPORTING_DATE');?></label>
        </div>
        <?php
        if($variety_info['replica_status']==1)
        {
            ?>
            <div class="col-xs-6">
                <label class="form-control"><?php echo System_helper::display_date($variety_info['sowing_date']+$day_number*24*60*60);?></label>
            </div>
        <?php
        }
        else
        {
            ?>
            <div class="col-xs-3">
                <label class="form-control"><?php echo System_helper::display_date($variety_info['sowing_date']+$day_number*24*60*60);?></label>
            </div>
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
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_INITIAL_PLANTS_DURING_TRIAL');?></label>
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
            <select class="form-control" name="normal[plant_type_appearance]"">
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
                <select class="form-control" name="replica[plant_type_appearance]"">
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



    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_PLANT_UNIFORMITY');?></label>
        </div>
        <div class="col-xs-4">
            <select class="form-control" name="plant_uniformity" id="plant_uniformity">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>"><?php echo $rating;?></option>
                <?php }?>
            </select>
        </div>
    </div>

    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_DISTANCE_FROM_GROUND_TO_CURD');?></label>
        </div>
        <div class="col-xs-4">
            <select class="form-control" name="distance_from_ground_to_curd" id="distance_from_ground_to_curd">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>"><?php echo $rating;?></option>
                <?php }?>
            </select>
        </div>
    </div>

    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_DISTANCE_FROM_GROUND_TO_HEAD');?></label>
        </div>
        <div class="col-xs-4">
            <select class="form-control" name="distance_from_ground_to_head" id="distance_from_ground_to_head">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>"><?php echo $rating;?></option>
                <?php }?>
            </select>
        </div>
    </div>

    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_DISTANCE_FROM_GROUND_TO_ROOT_SHOULDER');?></label>
        </div>
        <div class="col-xs-4">
            <select class="form-control" name="distance_from_ground_to_root_shoulder" id="distance_from_ground_to_root_shoulder">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>"><?php echo $rating;?></option>
                <?php }?>
            </select>
        </div>
    </div>

    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_DISTANCE_FROM_GROUND_LEAF_SHOULDER');?></label>
        </div>
        <div class="col-xs-4">
            <select class="form-control" name="distance_from_ground_leaf_shoulder" id="distance_from_ground_leaf_shoulder">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>"><?php echo $rating;?></option>
                <?php }?>
            </select>
        </div>
    </div>

    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_CURD_TYPE');?></label>
        </div>
        <div class="col-xs-4">
            <select class="form-control" name="curd_type" id="curd_type">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('curd_Type_rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>"><?php echo $rating;?></option>
                <?php }?>
            </select>
        </div>
    </div>

    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_HEAD_TYPE');?></label>
        </div>
        <div class="col-xs-4">
            <select class="form-control" name="head_type" id="head_type">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('head_Type_rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>"><?php echo $rating;?></option>
                <?php }?>
            </select>
        </div>
    </div>

    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_ROOT_TYPE');?></label>
        </div>
        <div class="col-xs-4">
            <select class="form-control" name="root_type" id="root_type">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('root_Type_rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>"><?php echo $rating;?></option>
                <?php }?>
            </select>
        </div>
    </div>

    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_LEAF_TYPE');?></label>
        </div>
        <div class="col-xs-4">
            <select class="form-control" name="leaf_type" id="leaf_type">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('leaf_Type_rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>"><?php echo $rating;?></option>
                <?php }?>
            </select>
        </div>
    </div>

    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SPINE_TYPE');?></label>
        </div>
        <div class="col-xs-4">
            <select class="form-control" name="spine_type" id="spine_type">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('spine_type_rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>"><?php echo $rating;?></option>
                <?php }?>
            </select>
        </div>
    </div>

    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_LEAF_SHAPE');?></label>
        </div>
        <div class="col-xs-4">
            <select class="form-control" name="leaf_shape" id="leaf_shape">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>"><?php echo $rating;?></option>
                <?php }?>
            </select>
        </div>
    </div>

    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_ROOT_SHAPE');?></label>
        </div>
        <div class="col-xs-4">
            <select class="form-control" name="root_shape" id="root_shape">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>"><?php echo $rating;?></option>
                <?php }?>
            </select>
        </div>
    </div>

    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_FRUIT_SHAPE');?></label>
        </div>
        <div class="col-xs-4">
            <select class="form-control" name="fruit_shape" id="fruit_shape">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>"><?php echo $rating;?></option>
                <?php }?>
            </select>
        </div>
    </div>

    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_CURD_COLOUR');?></label>
        </div>
        <div class="col-xs-4">
            <select class="form-control" name="curd_colour" id="curd_colour">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>"><?php echo $rating;?></option>
                <?php }?>
            </select>
        </div>
    </div>

    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_HEAD_COLOUR');?></label>
        </div>
        <div class="col-xs-4">
            <select class="form-control" name="head_colour" id="head_colour">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>"><?php echo $rating;?></option>
                <?php }?>
            </select>
        </div>
    </div>

    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_LEAF_COLOUR');?></label>
        </div>
        <div class="col-xs-4">
            <select class="form-control" name="leaf_colour" id="leaf_colour">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>"><?php echo $rating;?></option>
                <?php }?>
            </select>
        </div>
    </div>

    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_FRUIT_COLOUR');?></label>
        </div>
        <div class="col-xs-4">
            <select class="form-control" name="fruit_colour" id="fruit_colour">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>"><?php echo $rating;?></option>
                <?php }?>
            </select>
        </div>
    </div>

    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_ROOT_COLOUR');?></label>
        </div>
        <div class="col-xs-4">
            <select class="form-control" name="root_colour" id="root_colour">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>"><?php echo $rating;?></option>
                <?php }?>
            </select>
        </div>
    </div>

    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_FRUIT_SIZE');?></label>
        </div>
        <div class="col-xs-4">
            <select class="form-control" name="fruit_size" id="fruit_size">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>"><?php echo $rating;?></option>
                <?php }?>
            </select>
        </div>
    </div>

    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_FRUIT_BEARING');?></label>
        </div>
        <div class="col-xs-4">
            <select class="form-control" name="fruit_bearing" id="fruit_bearing">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>"><?php echo $rating;?></option>
                <?php }?>
            </select>
        </div>
    </div>

    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_CURD_COMPACTNESS');?></label>
        </div>
        <div class="col-xs-4">
            <select class="form-control" name="curd_compactness" id="curd_compactness">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>"><?php echo $rating;?></option>
                <?php }?>
            </select>
        </div>
    </div>

    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_HEAD_COMPACTNESS');?></label>
        </div>
        <div class="col-xs-4">
            <select class="form-control" name="head_compactness" id="head_compactness">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>"><?php echo $rating;?></option>
                <?php }?>
            </select>
        </div>
    </div>

    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_CURD_UNIFORMITY');?></label>
        </div>
        <div class="col-xs-4">
            <select class="form-control" name="curd_uniformity" id="curd_uniformity">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>"><?php echo $rating;?></option>
                <?php }?>
            </select>
        </div>
    </div>

    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_HEAD_UNIFORMITY');?></label>
        </div>
        <div class="col-xs-4">
            <select class="form-control" name="head_uniformity" id="head_uniformity">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>"><?php echo $rating;?></option>
                <?php }?>
            </select>
        </div>
    </div>

    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_FRUIT_SIZE_UNIFORMITY');?></label>
        </div>
        <div class="col-xs-4">
            <select class="form-control" name="fruit_size_uniformity" id="fruit_size_uniformity">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>"><?php echo $rating;?></option>
                <?php }?>
            </select>
        </div>
    </div>

    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_FRUIT_UNIFORMITY');?></label>
        </div>
        <div class="col-xs-4">
            <select class="form-control" name="fruit_uniformity" id="fruit_uniformity">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>"><?php echo $rating;?></option>
                <?php }?>
            </select>
        </div>
    </div>

    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_UNIFORMITY_OF_LEAVES');?></label>
        </div>
        <div class="col-xs-4">
            <select class="form-control" name="uniformity_of_leaves" id="uniformity_of_leaves">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>"><?php echo $rating;?></option>
                <?php }?>
            </select>
        </div>
    </div>

    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_DISEASE_SUSTAINABILITY');?></label>
        </div>
        <div class="col-xs-4">
            <select class="form-control" name="disease_sustainability" id="disease_sustainability">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>"><?php echo $rating;?></option>
                <?php }?>
            </select>
        </div>
    </div>

    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_INTERNODE_DISTANCE');?></label>
        </div>
        <div class="col-xs-4">
            <select class="form-control" name="internode_distance" id="internode_distance">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>"><?php echo $rating;?></option>
                <?php }?>
            </select>
        </div>
    </div>

    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_HARDNESS_OF_SPINES');?></label>
        </div>
        <div class="col-xs-4">
            <select class="form-control" name="hardness_of_spines" id="hardness_of_spines">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>"><?php echo $rating;?></option>
                <?php }?>
            </select>
        </div>
    </div>

    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_LEAF_HEIGHT_FROM_ROOT');?></label>
        </div>
        <div class="col-xs-4">
            <select class="form-control" name="leaf_height_from_root" id="leaf_height_from_root">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>"><?php echo $rating;?></option>
                <?php }?>
            </select>
        </div>
    </div>

    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_ADAPTABILITY');?></label>
        </div>
        <div class="col-xs-4">
             <textarea class="form-control" name="adaptability" id="adaptability"></textarea>
        </div>
    </div>

    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_RIDGE_QUALITY');?></label>
        </div>
        <div class="col-xs-4">
             <select class="form-control" name="ridge_quality" id="ridge_quality">
                 <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>"><?php echo $rating;?></option>
                <?php }?>
            </select>
        </div>
    </div>

    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SPECIAL_CHARACTERS');?></label>
        </div>
        <div class="col-xs-4">
            <textarea class="form-control" name="special_characters" id="special_characters"></textarea>
        </div>
    </div>

    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_ACCEPTED');?></label>
        </div>
        <div class="col-xs-4">
            <input type="radio" name="accepted" checked value="1"><?php echo $this->lang->line('YES');?>
            <input type="radio" name="accepted" value="0"><?php echo $this->lang->line('NO');?>
        </div>
    </div>

    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_REMARKS');?></label>
        </div>
        <div class="col-xs-4">
            <textarea class="form-control" name="remarks" id="remarks"></textarea>
        </div>
    </div>

<script type="text/javascript">

</script>
