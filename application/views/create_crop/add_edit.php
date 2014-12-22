<?php
    $data["link_new"]=base_url()."create_crop/index/add";
    $data["link_back"]=base_url()."create_crop";
    $this->load->view("action_buttons_edit",$data);
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
                <label class="control-label pull-right"><?php echo $this->lang->line('CROP_NAME');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="crop_name" id="crop_name" class="form-control validate[required]" value=""/>
            </div>
        </div>
        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('CROP_CODE');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="crop_code" id="crop_code" class="form-control validate[required]" value="" >
            </div>
        </div>
        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('CROP_WIDTH');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="crop_width" id="crop_width" class="form-control validate[required]" value="" >
            </div>
        </div>
        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('CROP_HEIGHT');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="crop_height" id="crop_height" class="form-control validate[required]" value="" >
            </div>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('STATUS');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <select name="status" id="status" class="form-control validate[required]">
                    <option value="0">Active</option>
                    <option value="1">In-active</option>
                </select>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</form>
