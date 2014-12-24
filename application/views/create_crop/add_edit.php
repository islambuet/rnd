<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    $data["link_new"]=base_url()."create_crop/index/add";
    $data["link_back"]=base_url()."create_crop";
    $this->load->view("action_buttons_edit",$data);

//echo '<pre>';
//print_r($cropInfo);
//echo '</pre>';
?>
<form class="form_valid" id="save_form" action="<?php base_url()?>create_crop/index/save" method="post">
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
                <input type="text" name="crop_name" id="crop_name" class="form-control validate[required]" value="<?php echo $cropInfo['crop_name'];?>"/>
            </div>
            <input type="hidden" name="crop_id" id="crop_id" value="<?php echo $cropInfo['id'];?>"/>
        </div>
        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_CROP_CODE');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="crop_code" id="crop_code" class="form-control validate[required]" value="<?php echo $cropInfo['crop_code'];?>" >
            </div>
        </div>
        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_CROP_WIDTH');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="crop_width" id="crop_width" class="form-control validate[required]" value="<?php echo $cropInfo['crop_width'];?>" >
            </div>
        </div>
        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_CROP_HEIGHT');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="crop_height" id="crop_height" class="form-control validate[required]" value="<?php echo $cropInfo['crop_height'];?>" >
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