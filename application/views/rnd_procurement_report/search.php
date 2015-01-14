<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

?>

<form class="form_valid" id="save_form" action="<?php echo base_url()?>rnd_procurement_report/index/report" method="post">
    <div class="row widget">
        <div class="widget-header">
            <div class="title">
                <?php echo $title; ?>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-1">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_SEASON');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-2 col-xs-4">
                <select name="procurement_season_id" id="procurement_season_id" class="form-control">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php
                    foreach($seasons as $season)
                    {?>
                        <option value="<?php echo $season['id']?>"><?php echo $season['season_name'];?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>

            <div class="col-xs-1">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_CROP');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-2 col-xs-4">
                <select name="procurement_crop_id" id="procurement_crop_id" class="form-control">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>

                </select>
            </div>

            <div class="col-xs-1">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_VARIETY_TYPE');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-3 col-xs-5">
                <select name="procurement_variety" id="procurement_variety" class="form-control">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <option value="<?php echo $this->config->item('variety_type_principal');?>"><?php echo $this->lang->line('LABEL_PRINCIPAL_VARIETY');?></option>
                    <option value="<?php echo $this->config->item('variety_type_arm');?>"><?php echo $this->lang->line('LABEL_CHECK_VARIETY_ARM');?></option>
                    <option value="<?php echo $this->config->item('variety_type_company');?>"><?php echo $this->lang->line('LABEL_COMPETITOR_VARIETY');?></option>
                </select>
            </div>
            <div class="col-xs-1">
                <input type="submit" class="btn btn-default btn-primary" name="search_report" value="Search">
            </div>
        </div>
    </div>

</form>
<div class="row widget" id="report_list">

</div>
