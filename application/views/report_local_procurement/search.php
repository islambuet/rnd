<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

$data["link_back"]="#";
$data["hide_back"]="1";
$data["hide_save"]="1";
$this->load->view("action_buttons_edit",$data);
?>

<div class="row widget hidden-print">
    <div class="widget-header">
        <div class="title">
            <?php echo $title; ?>
        </div>
        <div class="clearfix"></div>
    </div>

    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_YEAR');?><span style="color:#FF0000">*</span></label>
        </div>
        <div class="col-xs-4">
            <select name="year" id="year" class="form-control validate[required]">
                <?php
                    $current_year=date("Y",time());
                    for($i=$this->config->item("start_year");$i<=($current_year+$this->config->item("next_year_range"));$i++)
                    {?>
                        <option value="<?php echo $i;?>" <?php echo ($i==$current_year)?"selected":"";?>><?php echo $i;?></option>
                    <?php
                    }
                ?>
            </select>
        </div>

    </div>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_VARIETY_TYPE');?><span style="color:#FF0000">*</span></label>
        </div>
        <div class="col-xs-4">
            <select name="variety_type" id="variety_type" class="form-control validate[required]">
                <?php
                foreach($this->config->item("variety_type") as $val=>$variety_types)
                {
                    ?>
                    <option value="<?php echo $val;?>"> <?php echo $variety_types;?></option>
                <?php

                }
                ?>
            </select>
        </div>

    </div>
    <div class="row show-grid">
        <div class="col-xs-4">

        </div>
        <div class="col-xs-4">
            <input type="button" id="variety_button" class="form-control btn-primary" value="<?php echo $this->lang->line('VIEW_REPORT');?>" />
        </div>
        <div class="col-xs-4">

        </div>
    </div>
</div>

<div class="row widget" id="report_list">

</div>

<script type="text/javascript">
    jQuery(document).ready(function()
    {
        turn_off_triggers();
        $(document).on("click", "#variety_button", function(event)
        {
            $("#report_list").html("");
            $.ajax({
                url: base_url+"report_local_procurement/index/report",
                type: 'POST',
                dataType: "JSON",
                data:{year:$("#year").val(),variety_type:$("#variety_type").val()},
                success: function (data, status)
                {

                },
                error: function (xhr, desc, err)
                {
                    console.log("error");
                }
            });

        });


    });

</script>