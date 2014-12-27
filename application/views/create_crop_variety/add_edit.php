<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    $data["link_new"]=base_url()."create_crop_variety/index/add";
    $data["link_back"]=base_url()."create_crop_variety";
    $this->load->view("action_buttons_edit",$data);

//echo '<pre>';
//print_r($typeInfo);
//echo '</pre>';
?>
<form class="form_valid" id="save_form" action="<?php base_url()?>create_crop_variety/index/save" method="post">
    <div class="row widget">
        <div class="widget-header">
            <div class="title">
                <?php echo $title; ?>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_CROP');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <select name="crop_select" id="crop_select" class="form-control validate[required]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php
                    foreach($crops as $crop)
                    {?>
                        <option value="<?php echo $crop['id']?>" <?php if($crop['id']==$typeInfo['crop_id']){ echo "selected";}?>><?php echo $crop['crop_name'];?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <input type="hidden" name="type_id" id="type_id" value="<?php echo $typeInfo['id'];?>"/>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_PRODUCT_TYPE');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <select name="crop_select" id="crop_select" class="form-control validate[required]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php
                    foreach($crops as $crop)
                    {?>
                        <option value="<?php echo $crop['id']?>" <?php if($crop['id']==$typeInfo['crop_id']){ echo "selected";}?>><?php echo $crop['crop_name'];?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_PRINCIPAL_NAME');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <select name="crop_select" id="crop_select" class="form-control validate[required]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php
                    foreach($crops as $crop)
                    {?>
                        <option value="<?php echo $crop['id']?>" <?php if($crop['id']==$typeInfo['crop_id']){ echo "selected";}?>><?php echo $crop['crop_name'];?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_VARIETY_NAME');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="type_code" id="type_code" class="form-control validate[required]" value="<?php echo $typeInfo['product_type_code'];?>" >
            </div>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_FLOWERING_TYPE');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="radio" name="type_code" id="type_code" class="validate[required]" value="<?php echo $this->config->item('rnd_fruit_code');?>"> <?php echo $this->lang->line('LABEL_FRUIT');?>
                <input type="radio" name="type_code" id="type_code" class="validate[required]" value="<?php echo $this->config->item('rnd_curt_code');?>"> <?php echo $this->lang->line('LABEL_CURT');?>
                <input type="radio" name="type_code" id="type_code" class="validate[required]" value="<?php echo $this->config->item('rnd_root_code');?>"> <?php echo $this->lang->line('LABEL_ROOT');?>
                <input type="radio" name="type_code" id="type_code" class="validate[required]" value="<?php echo $this->config->item('rnd_leaf_code');?>"> <?php echo $this->lang->line('LABEL_LEAF');?>
            </div>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_VARIETY_TYPE');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="radio" name="variety_type" id="variety_type" class=" validate[required]" value="1"> <?php echo $this->lang->line('LABEL_CHECK_VARIETY_ARM');?>
                <input type="radio" name="variety_type" id="variety_type" class=" validate[required]" value="2"> <?php echo $this->lang->line('LABEL_COMPETITOR_VARIETY');?>
            </div>
        </div>

        <div class="row show-grid" id="season_div">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_SEASON');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <?php
                foreach($seasons as $season)
                {
                ?>
                <input type="radio" name="season" id="season" class="validate[required]" value="<?php echo $season['id'];?>"> <?php echo $season['season_name'];?>
                <?php
                }
                ?>
            </div>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('STATUS');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <select name="status" id="status" class="form-control validate[required]">
                    <option value="<?php echo $this->config->item('active');?>" <?php if($this->config->item('active')==$typeInfo['status']){ echo "selected";}?>><?php echo $this->lang->line('ACTIVE');?></option>
                    <option value="<?php echo $this->config->item('inactive');?>" <?php if($this->config->item('inactive')==$typeInfo['status']){ echo "selected";}?>><?php echo $this->lang->line('INACTIVE');?></option>
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
</script>