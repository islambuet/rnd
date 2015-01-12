<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    $data["link_new"]=base_url()."trail_fiftyfive_fortnighly_report/index/add";
    $data["link_back"]=base_url()."trail_fiftyfive_fortnighly_report";
    $this->load->view("action_buttons_edit",$data);

//echo '<pre>';
//print_r($fortnightlyInfo);
//echo '</pre>';
?>
<form class="form_valid" id="save_form" action="<?php echo base_url();?>trail_fiftyfive_fortnighly_report/index/save" method="post">
<input type="hidden" name="fortnightly_id" id="fortnightly_id" value="<?php echo $fortnightlyInfo['id'];?>"/>
    <div class="row widget">
        <div class="widget-header">
            <div class="title">
                <?php echo $title; ?>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_RND_CODE');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <select name="rnd_code_id" id="rnd_code_id" class="form-control validate[required]" >
                    <option value=""><?php echo $this->lang->line("SELECT");?></option>
                    <?php
                    $rndCodes = System_helper::get_rnd_codes();
                    foreach($rndCodes as $code){?>
                    <option value="<?php echo $code['id']?>" <?php if($fortnightlyInfo['rnd_code_id']==$code['id']){ echo 'selected';}?>><?php echo $code['rnd_code'];?></option>
                    <?php }?>
                </select>
            </div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SOWING_DATE');?></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="sowing_date" id="sowing_date" class="form-control" value="<?php if(!empty($fortnightlyInfo['sowing_date'])){ echo date('Y-m-d',$fortnightlyInfo['sowing_date']);}?>" >
            </div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_TRANSPLANTING_DATE');?></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="transplanting_date" id="transplanting_date" class="form-control" value="<?php if(!empty($fortnightlyInfo['transplanting_date'])){ echo date('Y-m-d',$fortnightlyInfo['transplanting_date']);}?>" >
            </div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_INITIAL_PLANTS');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="initial_plants_during_trial" id="initial_plants_during_trial" class="form-control validate[required]" value="<?php echo $fortnightlyInfo['initial_plants_during_trial_start'];?>" >
            </div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_FORTNIGHTLY_REPORTING_DATE');?></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="fortnightly_reporting_date" id="fortnightly_reporting_date" class="form-control" value="<?php if(!empty($fortnightlyInfo['fortnightly_reporting_date'])){ echo date('Y-m-d',$fortnightlyInfo['fortnightly_reporting_date']);}?>" >
            </div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_PLANT_TYPE_APPEARANCE');?></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <select name="plant_type_appearance" id="plant_type_appearance" class="form-control" >
                    <option value=""><?php echo $this->lang->line("SELECT");?></option>
                    <option value="<?php echo $this->config->item('good');?>" <?php if($fortnightlyInfo['plant_type']==$this->config->item('good')){ echo "selected";}?>><?php echo $this->lang->line('LABEL_GOOD');?></option>
                    <option value="<?php echo $this->config->item('average');?>" <?php if($fortnightlyInfo['plant_type']==$this->config->item('average')){ echo "selected";}?>><?php echo $this->lang->line('LABEL_AVERAGE');?></option>
                    <option value="<?php echo $this->config->item('belowAverage');?>" <?php if($fortnightlyInfo['plant_type']==$this->config->item('belowAverage')){ echo "selected";}?>><?php echo $this->lang->line('LABEL_BELOW_AVERAGE');?></option>
                </select>
            </div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_PLANT_UNIFORMITY');?></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <select name="plant_uniformity" id="plant_uniformity" class="form-control" >
                    <option value=""><?php echo $this->lang->line("SELECT");?></option>
                    <option value="<?php echo $this->config->item('good');?>" <?php if($fortnightlyInfo['plant_uniformity']==$this->config->item('good')){ echo "selected";}?>><?php echo $this->lang->line('LABEL_GOOD');?></option>
                    <option value="<?php echo $this->config->item('average');?>" <?php if($fortnightlyInfo['plant_uniformity']==$this->config->item('average')){ echo "selected";}?>><?php echo $this->lang->line('LABEL_AVERAGE');?></option>
                    <option value="<?php echo $this->config->item('belowAverage');?>" <?php if($fortnightlyInfo['plant_uniformity']==$this->config->item('belowAverage')){ echo "selected";}?>><?php echo $this->lang->line('LABEL_BELOW_AVERAGE');?></option>
                </select>
            </div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_DISTANCE_GROUND_TO_CURD');?></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <select name="distance_from_ground_to_curd" id="distance_from_ground_to_curd" class="form-control" >
                    <option value=""><?php echo $this->lang->line("SELECT");?></option>
                    <option value="<?php echo $this->config->item('good');?>" <?php if($fortnightlyInfo['distance_from_ground_curd']==$this->config->item('good')){ echo "selected";}?>><?php echo $this->lang->line('LABEL_GOOD');?></option>
                    <option value="<?php echo $this->config->item('average');?>" <?php if($fortnightlyInfo['distance_from_ground_curd']==$this->config->item('average')){ echo "selected";}?>><?php echo $this->lang->line('LABEL_AVERAGE');?></option>
                    <option value="<?php echo $this->config->item('belowAverage');?>" <?php if($fortnightlyInfo['distance_from_ground_curd']==$this->config->item('belowAverage')){ echo "selected";}?>><?php echo $this->lang->line('LABEL_BELOW_AVERAGE');?></option>
                </select>
            </div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_CURD_TYPE');?></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <select name="curd_type" id="curd_type" class="form-control" >
                    <option value=""><?php echo $this->lang->line("SELECT");?></option>
                    <option value="<?php echo $this->config->item('curd_type_dome');?>" <?php if($fortnightlyInfo['crud_type']==$this->config->item('curd_type_dome')){ echo "selected";}?>><?php echo $this->lang->line('LABEL_DOME');?></option>
                    <option value="<?php echo $this->config->item('curd_type_semi_dome');?>" <?php if($fortnightlyInfo['crud_type']==$this->config->item('curd_type_semi_dome')){ echo "selected";}?>><?php echo $this->lang->line('LABEL_SEMI_DOME');?></option>
                </select>
            </div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_CURD_COLOR');?></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <select name="curd_color" id="curd_color" class="form-control" >
                    <option value=""><?php echo $this->lang->line("SELECT");?></option>
                    <option value="<?php echo $this->config->item('good');?>" <?php if($fortnightlyInfo['crud_color']==$this->config->item('good')){ echo "selected";}?>><?php echo $this->lang->line('LABEL_GOOD');?></option>
                    <option value="<?php echo $this->config->item('average');?>" <?php if($fortnightlyInfo['crud_color']==$this->config->item('average')){ echo "selected";}?>><?php echo $this->lang->line('LABEL_AVERAGE');?></option>
                    <option value="<?php echo $this->config->item('belowAverage');?>" <?php if($fortnightlyInfo['crud_color']==$this->config->item('belowAverage')){ echo "selected";}?>><?php echo $this->lang->line('LABEL_BELOW_AVERAGE');?></option>
                </select>
            </div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_CURD_COMPACTNESS');?></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <select name="curd_compactness" id="curd_compactness" class="form-control" >
                    <option value=""><?php echo $this->lang->line("SELECT");?></option>
                    <option value="<?php echo $this->config->item('good');?>" <?php if($fortnightlyInfo['crud_compactness']==$this->config->item('good')){ echo "selected";}?>><?php echo $this->lang->line('LABEL_GOOD');?></option>
                    <option value="<?php echo $this->config->item('average');?>" <?php if($fortnightlyInfo['crud_compactness']==$this->config->item('average')){ echo "selected";}?>><?php echo $this->lang->line('LABEL_AVERAGE');?></option>
                    <option value="<?php echo $this->config->item('belowAverage');?>" <?php if($fortnightlyInfo['crud_compactness']==$this->config->item('belowAverage')){ echo "selected";}?>><?php echo $this->lang->line('LABEL_BELOW_AVERAGE');?></option>
                </select>
            </div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_CURD_UNIFORMITY');?></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <select name="curd_uniformity" id="curd_uniformity" class="form-control" >
                    <option value=""><?php echo $this->lang->line("SELECT");?></option>
                    <option value="<?php echo $this->config->item('good');?>" <?php if($fortnightlyInfo['crud_uniformity']==$this->config->item('good')){ echo "selected";}?>><?php echo $this->lang->line('LABEL_GOOD');?></option>
                    <option value="<?php echo $this->config->item('average');?>" <?php if($fortnightlyInfo['crud_uniformity']==$this->config->item('average')){ echo "selected";}?>><?php echo $this->lang->line('LABEL_AVERAGE');?></option>
                    <option value="<?php echo $this->config->item('belowAverage');?>" <?php if($fortnightlyInfo['crud_uniformity']==$this->config->item('belowAverage')){ echo "selected";}?>><?php echo $this->lang->line('LABEL_BELOW_AVERAGE');?></option>
                </select>
            </div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_DISEASE_SEVERITY');?></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <select name="disease_severity" id="disease_severity" class="form-control" >
                    <option value=""><?php echo $this->lang->line("SELECT");?></option>
                    <option value="<?php echo $this->config->item('good');?>" <?php if($fortnightlyInfo['disease_severity']==$this->config->item('good')){ echo "selected";}?>><?php echo $this->lang->line('LABEL_GOOD');?></option>
                    <option value="<?php echo $this->config->item('average');?>" <?php if($fortnightlyInfo['disease_severity']==$this->config->item('average')){ echo "selected";}?>><?php echo $this->lang->line('LABEL_AVERAGE');?></option>
                    <option value="<?php echo $this->config->item('belowAverage');?>" <?php if($fortnightlyInfo['disease_severity']==$this->config->item('belowAverage')){ echo "selected";}?>><?php echo $this->lang->line('LABEL_BELOW_AVERAGE');?></option>
                </select>
            </div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SPECIAL_CHARACTERS');?></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <select name="special_characters_status" id="special_characters_status" class="form-control" >
                    <option value=""><?php echo $this->lang->line("SELECT");?></option>
                    <option value="<?php echo $this->config->item('good');?>" <?php if($fortnightlyInfo['special_characters_status']==$this->config->item('good')){ echo "selected";}?>><?php echo $this->lang->line('LABEL_GOOD');?></option>
                    <option value="<?php echo $this->config->item('average');?>" <?php if($fortnightlyInfo['special_characters_status']==$this->config->item('average')){ echo "selected";}?>><?php echo $this->lang->line('LABEL_AVERAGE');?></option>
                    <option value="<?php echo $this->config->item('belowAverage');?>" <?php if($fortnightlyInfo['special_characters_status']==$this->config->item('belowAverage')){ echo "selected";}?>><?php echo $this->lang->line('LABEL_BELOW_AVERAGE');?></option>
                </select>
            </div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_ACCEPTED');?></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="radio" name="accepted_status" id="accepted_status" class="" value="<?php echo $this->config->item('accepted_code_yes');?>" <?php if($fortnightlyInfo['accepted_status']==$this->config->item('accepted_code_yes')){ echo "checked";}?>> <?php echo $this->lang->line('YES');?>
                <input type="radio" name="accepted_status" id="accepted_status" class="" value="<?php echo $this->config->item('accepted_code_no');?>" <?php if($fortnightlyInfo['accepted_status']==$this->config->item('accepted_code_no')){ echo "checked";}?>> <?php echo $this->lang->line('NO');?>
            </div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SPECIAL_CHARACTERS');?></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <textarea name="special_characters" id="special_characters" class="form-control"><?php echo $fortnightlyInfo['special_characters'];?></textarea>
            </div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_REMARKS');?></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <textarea name="remarks" id="remarks" class="form-control"><?php echo $fortnightlyInfo['remark'];?></textarea>
            </div>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('STATUS');?></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <select name="status" id="status" class="form-control">
                    <option value="<?php echo $this->config->item('active');?>" <?php if($fortnightlyInfo['status']==$this->config->item('active')){ echo "selected";}?>><?php echo $this->lang->line('ACTIVE');?></option>
                    <option value="<?php echo $this->config->item('inactive');?>" <?php if($fortnightlyInfo['status']==$this->config->item('inactive')){ echo "selected";}?>><?php echo $this->lang->line('INACTIVE');?></option>
                </select>
            </div>
        </div>

    </div>
    <div class="clearfix"></div>
</form>

<script type="text/javascript">

    jQuery(document).ready(function()
    {
        $(".form_valid").validationEngine();
    });


    Calendar.setup({
        inputField: "sowing_date",
        trigger: "sowing_date",
        onSelect: function() {
            this.hide()
        },
        showTime: 12,
        dateFormat: "%Y-%m-%d"
    });

    Calendar.setup({
        inputField: "transplanting_date",
        trigger: "transplanting_date",
        onSelect: function() {
            this.hide()
        },
        showTime: 12,
        dateFormat: "%Y-%m-%d"
    });

    Calendar.setup({
        inputField: "fortnightly_reporting_date",
        trigger: "fortnightly_reporting_date",
        onSelect: function() {
            this.hide()
        },
        showTime: 12,
        dateFormat: "%Y-%m-%d"
    });


</script>