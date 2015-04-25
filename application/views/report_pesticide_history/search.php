<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

$data["link_back"]="#";
$data["hide_back"]="1";
$data["hide_save"]="1";
$this->load->view("action_buttons_edit",$data);
?>
<form class="form_valid" id="save_form" action="<?php echo base_url()?>report_pesticide_history/index/report" method="post">
    <div class="row widget">
        <div class="widget-header">
            <div class="title">
                <?php echo $title; ?>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_PESTICIDE');?></label>
            </div>
            <div class="col-sm-5">
                <select name="pesticide_id" id="pesticide_id" class="form-control validate[required]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php
                    foreach($pesticides as $pesticide)
                    {?>
                        <option value="<?php echo $pesticide['id']?>"><?php echo $pesticide['pesticide_name'];?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_DATE');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-xs-2">
                <input type="text" name="date_from" id="date_from" class="form-control" value="">
            </div>
            <div class="col-xs-1"style="text-align: center">
                TO
            </div>
            <div class="col-xs-2">
                <input type="text" name="date_to" id="date_to" class="form-control" value="">
            </div>
        </div>
        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_TRANSACTION_TYPE');?></label>
            </div>
            <div class="col-sm-5">
                <select name="report_id" id="report_id" class="form-control validate[required]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php
                    foreach($this->config->item('stock_history_report_type') as $key=>$report_name)
                    {?>
                        <option value="<?php echo $key?>"><?php echo $report_name;?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row show-grid">
            <div class="col-xs-4">

            </div>
            <div class="col-xs-5">
                <input type="submit" name="search_report" class="form-control btn-primary" value="<?php echo $this->lang->line('VIEW_REPORT');?>" />
            </div>
            <div class="col-xs-3">

            </div>
        </div>


    </div>

</form>
<div class="row widget" id="report_list">

</div>
<script type="text/javascript">

    jQuery(document).ready(function()
    {
        //$(".form_valid").validationEngine();
        $( "#date_from" ).datepicker({dateFormat : display_date_format});
        $( "#date_to" ).datepicker({dateFormat : display_date_format});

    });
</script>