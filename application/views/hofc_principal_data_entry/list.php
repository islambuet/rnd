<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

?>

<div class="widget-header">
    <div class="title">
        <?php echo $title; ?>
    </div>
    <div class="clearfix"></div>
</div>
<input type="hidden" name="hpde_id" value="<?php echo $variety_info['hpde_id'];?>">
<div class="row show-grid">
    <div class="col-xs-4">
        <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_FORTH_NIGHTLY_REMARK');?></label>
    </div>
    <div class="col-xs-6">
        <textarea class="form-control" name="forth_nightly_remark"><?php echo $variety_info['forth_nightly_remark'];?></textarea>
    </div>
</div>
<div class="row show-grid">
    <div class="col-xs-4">
        <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_FRUIT_REMARK');?></label>
    </div>
    <div class="col-xs-6">
        <textarea class="form-control" name="fruit_remark"><?php echo $variety_info['fruit_remark'];?></textarea>
    </div>
</div>
<div class="row show-grid">
    <div class="col-xs-4">
        <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_YIELD_REMARK');?></label>
    </div>
    <div class="col-xs-6">
        <textarea class="form-control" name="yield_remark"><?php echo $variety_info['yield_remark'];?></textarea>
    </div>
</div>
<div class="row show-grid">
    <div class="col-xs-4">
        <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_FINAL_REMARK');?></label>
    </div>
    <div class="col-xs-6">
        <textarea class="form-control" name="final_remark"><?php echo $variety_info['final_remark'];?></textarea>
    </div>
</div>
<div class="row show-grid">
    <div class="col-xs-4">
        <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_PRINCIPAL_REMARK');?></label>
    </div>
    <div class="col-xs-6">
        <textarea class="form-control" name="principal_remark"><?php echo $variety_info['principal_remark'];?></textarea>
    </div>
</div>