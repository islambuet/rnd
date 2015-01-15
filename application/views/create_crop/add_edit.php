<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    $data["link_new"]=base_url()."create_crop/index/add";
    $data["link_back"]=base_url()."create_crop";
    $this->load->view("action_buttons_edit",$data);

//echo '<pre>';
//print_r($cropInfo);
//echo '</pre>';
?>
<form class="form_valid" id="save_form" action="<?php echo base_url();?>create_crop/index/save" method="post">
    <input type="hidden" name="crop_id" id="crop_id" value="<?php echo $cropInfo['id'];?>"/>
    <div class="row widget">
        <div class="widget-header">
            <div class="title">
                <?php echo $title; ?>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_CROP_NAME');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="cc_crop_name" id="cc_crop_name" class="form-control validate[required]" value="<?php echo $cropInfo['crop_name'];?>"/>
            </div>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_CROP_CODE');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="cc_crop_code" id="cc_crop_code" class="form-control validate[required]" value="<?php echo $cropInfo['crop_code'];?>" >
            </div>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_CROP_WIDTH');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="crop_width" id="crop_width" class="form-control validate[required, custom[number]]" value="<?php echo $cropInfo['crop_width'];?>" >
            </div>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_CROP_HEIGHT');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="crop_height" id="crop_height" class="form-control validate[required, custom[number]]" value="<?php echo $cropInfo['crop_height'];?>" >
            </div>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_FLOWERING_TYPE');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="radio" name="fruit_type" id="fruit_type" class="validate[required]" checked <?php if($cropInfo['fruit_type']==$this->config->item('rnd_fruit_code')){ echo "checked";}?> value="<?php echo $this->config->item('rnd_fruit_code');?>"> <?php echo $this->lang->line('LABEL_FRUIT');?>
                <input type="radio" name="fruit_type" id="fruit_type" class="validate[required]" <?php if($cropInfo['fruit_type']==$this->config->item('rnd_curt_code')){ echo "checked";}?> value="<?php echo $this->config->item('rnd_curt_code');?>"> <?php echo $this->lang->line('LABEL_CURT');?>
                <input type="radio" name="fruit_type" id="fruit_type" class="validate[required]" <?php if($cropInfo['fruit_type']==$this->config->item('rnd_root_code')){ echo "checked";}?> value="<?php echo $this->config->item('rnd_root_code');?>"> <?php echo $this->lang->line('LABEL_ROOT');?>
                <input type="radio" name="fruit_type" id="fruit_type" class="validate[required]" <?php if($cropInfo['fruit_type']==$this->config->item('rnd_leaf_code')){ echo "checked";}?> value="<?php echo $this->config->item('rnd_leaf_code');?>"> <?php echo $this->lang->line('LABEL_LEAF');?>
                <input type="radio" name="fruit_type" id="fruit_type" class="validate[required]" <?php if($cropInfo['fruit_type']==$this->config->item('rnd_head_code')){ echo "checked";}?> value="<?php echo $this->config->item('rnd_head_code');?>"> <?php echo $this->lang->line('LABEL_HEAD');?>
            </div>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SAMPLE_SIZE_RND');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="sample_size" id="sample_size" class="form-control validate[required, custom[number]]" value="<?php echo $cropInfo['sample_size'];?>" />
            </div>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_INITIAL_PLANTS');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="initial_plants" id="initial_plants" class="form-control validate[required, custom[number]]" value="<?php echo $cropInfo['initial_plants'];?>" />
            </div>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('STATUS');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <select name="status" id="status" class="form-control validate[required]">
                    <option value="<?php echo $this->config->item('active');?>" <?php if($cropInfo['status']==$this->config->item('active')){ echo "selected";}?>><?php echo $this->lang->line('ACTIVE');?></option>
                    <option value="<?php echo $this->config->item('inactive');?>" <?php if($cropInfo['status']==$this->config->item('inactive')){ echo "selected";}?>><?php echo $this->lang->line('INACTIVE');?></option>
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