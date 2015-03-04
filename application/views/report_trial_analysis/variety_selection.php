<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

?>

<div class="widget-header">
    <div class="title">
        <?php echo $title; ?>
    </div>
    <div class="clearfix"></div>
</div>

<div class="row show-grid">
    <?php
        foreach($varieties as $variety)
        {
            ?>
            <div class="col-xs-2">
                <input type="checkbox" name="varieties[]" value="<?php echo $variety['id'];?>"><?php echo System_helper::get_rnd_code($variety,1);?>
            </div>
        <?php
        }
    ?>
</div>


<div class="row show-grid">
    <div class="col-xs-2">
        <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_REPORT_NAME');?><span style="color:#FF0000">*</span></label>
    </div>
    <div class="col-xs-3">
        <select name="report_name" id="report_name" class="form-control">
            <option value=""><?php echo $this->lang->line('SELECT');?></option>
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
    <div class="col-xs-3">
        <select name="report_type" id="report_type" class="form-control">
            <option value=""><?php echo $this->lang->line('SELECT');?></option>
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

    <div class="col-lg-2 pull-right">
        <input type="button" id="load_report" class="form-control btn-primary" value="<?php echo $this->lang->line('VIEW_REPORT');?>" />
    </div>
</div>