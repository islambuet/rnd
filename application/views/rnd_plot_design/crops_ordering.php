<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
//echo '<pre>';
//print_r($crops);
//echo '</pre>';
?>

<div class="widget-header">
    <div class="title">
        <?php echo $title; ?>
    </div>
    <div class="clearfix"></div>
</div>
<input type="hidden" name="year" value="<?php echo $year; ?>">
<input type="hidden" name="season_id" value="<?php echo $season_id; ?>">
<input type="hidden" name="plot_id" value="<?php echo $plot_id; ?>">
<div id="first_selection">
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_CROP');?><span style="color:#FF0000">*</span></label>
        </div>
        <div class="col-xs-4">
            <select name="crop_order[]" class="form-control validate[required]">
                <?php
                foreach($crops as $crop)
                {?>
                    <option value="<?php echo $crop['crop_id']?>"><?php echo $crop['crop_name'].'('.$crop['total_variety'].')';?></option>
                <?php
                }
                ?>
            </select>
        </div>
    </div>
</div>
<div class="row show-grid" id="container_btn_add_more">
    <div class="col-xs-4">
    </div>
    <div class="col-xs-4">
        <input type="button" id="btn_add_more" class="form-control btn-info" value="<?php echo $this->lang->line('LABEL_ADD_MORE');?>" />
    </div>
</div>
<div class="row show-grid">
    <div class="col-xs-4">
    </div>
    <div class="col-xs-4">
        <input type="button" id="load_report" class="form-control btn-primary" value="<?php echo $this->lang->line('LABEL_LOAD_PLOT');?>" />
    </div>
</div>

