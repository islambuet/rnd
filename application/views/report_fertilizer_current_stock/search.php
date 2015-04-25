<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

$data["link_back"]="#";
$data["hide_back"]="1";
$data["hide_save"]="1";
$this->load->view("action_buttons_edit",$data);
?>
<form class="form_valid" id="save_form" action="<?php echo base_url()?>report_fertilizer_current_stock/index/report" method="post">
    <div class="row widget">
        <div class="widget-header">
            <div class="title">
                <?php echo $title; ?>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_FERTILIZER');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <select name="fertilizer_id" id="fertilizer_id" class="form-control validate[required]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php
                    foreach($fertilizers as $fertilizer)
                    {?>
                        <option value="<?php echo $fertilizer['id']?>"><?php echo $fertilizer['fertilizer_name'];?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="col-xs-4">
                <input type="submit" class="btn btn-default btn-primary" name="search_report" value="<?php echo $this->lang->line('VIEW_REPORT');?>">
            </div>
        </div>


    </div>

</form>
<div class="row widget" id="report_list">

</div>
