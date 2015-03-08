<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

?>
<div class="row show-grid">
    <div class="col-xs-2">
        <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_REPORT_NAME');?><span style="color:#FF0000">*</span></label>
    </div>
    <div class="col-xs-2">
        <select name="report_name" id="report_name" class="form-control">
            <?php
            foreach($this->config->item('trial_report_name') as $val=>$reportName)
            {
                ?>
                <option value="<?php echo $val;?>"><?php echo $reportName;?></option>
            <?php
            }
            ?>
        </select>
    </div>

    <div class="col-xs-2">
        <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_REPORT_TYPE');?><span style="color:#FF0000">*</span></label>
    </div>
    <div class="col-xs-2">
        <select name="report_type" id="report_type" class="form-control">
            <?php
            foreach($this->config->item('trial_report_type') as $val=>$reportType)
            {
                ?>
                <option value="<?php echo $val;?>"><?php echo $reportType;?></option>
            <?php
            }
            ?>
        </select>
    </div>
    <div class="col-xs-2">
        <input type="button" id="load_report" class="form-control btn-primary" value="<?php echo $this->lang->line('VIEW_REPORT');?>" />
    </div>
</div>