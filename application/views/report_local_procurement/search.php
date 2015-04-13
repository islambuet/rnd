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
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_YEAR');?></label>
        </div>
        <div class="col-xs-4">
            <select name="year" id="year" class="form-control validate[required]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
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
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_VARIETY_TYPE');?></label>
        </div>
        <div class="col-xs-4">
            <select name="variety_type" id="variety_type" class="form-control">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
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
    <div class="row show-grid" id="principal_id_div" style="display: none;">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_PRINCIPAL_NAME');?></label>
        </div>
        <div class="col-sm-4 col-xs-8">
            <select name="principal_id" id="principal_id" class="form-control">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php
                foreach($principals as $principal)
                {?>
                    <option value="<?php echo $principal['id']?>"><?php echo $principal['principal_name'];?></option>
                <?php
                }
                ?>
            </select>
        </div>
    </div>

    <div class="row show-grid" id="company_id_div" style="display: none;">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_COMPANY_NAME');?></label>
        </div>
        <div class="col-sm-4 col-xs-8">
            <select name="company_id" id="company_id" class="form-control">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php
                foreach($companies as $company)
                {?>
                    <option value="<?php echo $company['id']?>"><?php echo $company['company_name'];?></option>
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
        $(document).on("change",'#variety_type',function()
        {
            var variety_type=$(this).val();
            if(variety_type==1)
            {
                $("#principal_id_div").show();
                $("#company_id_div").hide();
            }
            else if(variety_type==2)
            {
                $("#principal_id_div").hide();
                $("#company_id_div").hide();
            }
            else if(variety_type==3)
            {
                $("#principal_id_div").hide();
                $("#company_id_div").show();
            }
            else
            {
                $("#principal_id_div").hide();
                $("#company_id_div").hide();
            }

        });
        $(document).on("click", "#variety_button", function(event)
        {
            $("#report_list").html("");
            $.ajax({
                url: base_url+"report_local_procurement/index/report",
                type: 'POST',
                dataType: "JSON",
                data:{year:$("#year").val(),variety_type:$("#variety_type").val(),principal_id:$('#principal_id').val(),company_id:$('#company_id').val()},
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