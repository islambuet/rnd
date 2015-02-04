<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$dir=$this->config->item('dir');
//echo "<pre>";
//print_r($varieties[0]);
//echo "</pre>";
//echo System_helper::get_rnd_code($varieties[0],1);
?>
<div class="widget-header">
    <div class="title">
        <?php echo $title; ?>
    </div>

    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SOWING_DATE');?><span style="color:#FF0000">*</span></label>
        </div>
        <div class="col-xs-4">
            <input type="text" class="form-control" name="sowing_date" id="sowing_date" value=""/>
        </div>
    </div>

    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_TRANSPLANTING_DATE');?><span style="color:#FF0000">*</span></label>
        </div>
        <div class="col-xs-4">
            <input type="text" class="form-control" name="transplanting_date" id="transplanting_date" value=""/>
        </div>
    </div>

    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_FORTNIGHTLY_REPORTING_DATE');?><span style="color:#FF0000">*</span></label>
        </div>
        <div class="col-xs-4">
            <input type="text" class="form-control" name="fortnightly_reporting_date" id="fortnightly_reporting_date" value=""/>
        </div>
    </div>

    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_INITIAL_PLANTS_DURING_TRIAL');?><span style="color:#FF0000">*</span></label>
        </div>
        <div class="col-xs-4">
            <input type="text" class="form-control" name="initial_plants_during_trial_started" id="initial_plants_during_trial_started" value=""/>
        </div>
    </div>

    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_PLANT_TYPE_APPEARANCE');?><span style="color:#FF0000">*</span></label>
        </div>
        <div class="col-xs-4">
            <select class="form-control" name="plant_type_appearance" id="plant_type_appearance">
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>"><?php echo $rating;?></option>
                <?php }?>
            </select>
        </div>
    </div>

    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_PLANT_TYPE');?><span style="color:#FF0000">*</span></label>
        </div>
        <div class="col-xs-4">
            <select class="form-control" name="plant_type_appearance" id="plant_type_appearance">
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>"><?php echo $rating;?></option>
                <?php }?>
            </select>
        </div>
    </div>

    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_PLANT_TYPE');?><span style="color:#FF0000">*</span></label>
        </div>
        <div class="col-xs-4">
            <select class="form-control" name="plant_type_appearance" id="plant_type_appearance">
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>"><?php echo $rating;?></option>
                <?php }?>
            </select>
        </div>
    </div>

    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_DISTANCE_FROM_GROUND_TO_CURD');?><span style="color:#FF0000">*</span></label>
        </div>
        <div class="col-xs-4">
            <select class="form-control" name="distance_from_ground_to_curd" id="distance_from_ground_to_curd">
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>"><?php echo $rating;?></option>
                <?php }?>
            </select>
        </div>
    </div>

    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_DISTANCE_FROM_GROUND_TO_HEAD');?><span style="color:#FF0000">*</span></label>
        </div>
        <div class="col-xs-4">
            <select class="form-control" name="distance_from_ground_to_head" id="distance_from_ground_to_head">
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>"><?php echo $rating;?></option>
                <?php }?>
            </select>
        </div>
    </div>

    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_DISTANCE_FROM_GROUND_TO_ROOT_SHOULDER');?><span style="color:#FF0000">*</span></label>
        </div>
        <div class="col-xs-4">
            <select class="form-control" name="distance_from_ground_to_root_shoulder" id="distance_from_ground_to_root_shoulder">
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>"><?php echo $rating;?></option>
                <?php }?>
            </select>
        </div>
    </div>

    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_DISTANCE_FROM_GROUND_LEAF_SHOULDER');?><span style="color:#FF0000">*</span></label>
        </div>
        <div class="col-xs-4">
            <select class="form-control" name="distance_from_ground_leaf_shoulder" id="distance_from_ground_leaf_shoulder">
                <?php foreach($this->config->item('rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>"><?php echo $rating;?></option>
                <?php }?>
            </select>
        </div>
    </div>

    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_CURD_TYPE');?><span style="color:#FF0000">*</span></label>
        </div>
        <div class="col-xs-4">
            <select class="form-control" name="curd_type" id="curd_type">
                <?php foreach($this->config->item('curd_Type_rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>"><?php echo $rating;?></option>
                <?php }?>
            </select>
        </div>
    </div>

    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_HEAD_TYPE');?><span style="color:#FF0000">*</span></label>
        </div>
        <div class="col-xs-4">
            <select class="form-control" name="head_type" id="head_type">
                <?php foreach($this->config->item('head_Type_rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>"><?php echo $rating;?></option>
                <?php }?>
            </select>
        </div>
    </div>

    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_ROOT_TYPE');?><span style="color:#FF0000">*</span></label>
        </div>
        <div class="col-xs-4">
            <select class="form-control" name="root_type" id="root_type">
                <?php foreach($this->config->item('root_Type_rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>"><?php echo $rating;?></option>
                <?php }?>
            </select>
        </div>
    </div>

    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_LEAF_TYPE');?><span style="color:#FF0000">*</span></label>
        </div>
        <div class="col-xs-4">
            <select class="form-control" name="leaf_type" id="leaf_type">
                <?php foreach($this->config->item('leaf_Type_rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>"><?php echo $rating;?></option>
                <?php }?>
            </select>
        </div>
    </div>

    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SPINE_TYPE');?><span style="color:#FF0000">*</span></label>
        </div>
        <div class="col-xs-4">
            <select class="form-control" name="spine_type" id="spine_type">
                <?php foreach($this->config->item('spine_type_rating') as $val=>$rating){?>
                    <option value="<?php echo $val;?>"><?php echo $rating;?></option>
                <?php }?>
            </select>
        </div>
    </div>


    <div class="clearfix"></div>
</div>


<script type="text/javascript">

</script>
