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
            <select name="year" id="year" class="form-control">
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
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_PRINCIPAL_NAME');?></label>
        </div>
        <div class="col-xs-4">
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
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_SEASON');?></label>
        </div>
        <div class="col-xs-4">
            <select name="season_id" id="season_id" class="form-control">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php
                foreach($seasons as $season)
                {
                    ?>
                    <option value="<?php echo $season['id']?>"><?php echo $season['season_name'];?></option>
                <?php
                }
                ?>
            </select>
        </div>

    </div>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_CROP');?></label>
        </div>
        <div class="col-xs-4">
            <select name="crop_id" id="crop_id" class="form-control">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                <?php
                foreach($crops as $crop)
                {
                    ?>
                    <option value="<?php echo $crop['id'];?>"><?php echo $crop['crop_name'];?></option>
                <?php
                }
                ?>
            </select>
        </div>

    </div>
    <div class="row show-grid crop_type_id_container" style="display: none">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_TYPE');?></label>
        </div>
        <div class="col-xs-4">
            <select name="crop_type_id" id="crop_type_id" class="form-control">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>

            </select>
        </div>

    </div>
    <div class="row show-grid">
        <div class="col-xs-4">

        </div>
        <div class="col-xs-4">
            <input type="button" id="load_report" class="form-control btn-primary" value="<?php echo $this->lang->line('VIEW_REPORT');?>" />
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
        $(document).on("change", "#year", function(event)
        {
            $("#report_list").html("");
        });

        $(document).on("change", "#season_id", function(event)
        {
            $("#report_list").html("");
        });

        $(document).on("change", "#crop_id", function(event)
        {
            $("#report_list").html("");
            $("#crop_type_id").val("");
            var crop_id = $("#crop_id").val();
            if(crop_id>0)
            {
                $(".crop_type_id_container").show();
                $.ajax({
                    url: base_url+"rnd_common/get_dropDown_cropType_by_cropId/",
                    type: 'POST',
                    dataType: "JSON",
                    data:{crop_id:crop_id},
                    success: function (data, status)
                    {

                    },
                    error: function (xhr, desc, err)
                    {
                        console.log("error");

                    }
                });
            }
            else
            {
                $(".crop_type_id_container").hide();
            }
        });
        $(document).on("change", "#crop_type_id", function(event)
        {
            $("#report_list").html("");

        });

        $(document).on("click", "#load_report", function(event)
        {

            $("#report_list").html("");
            $.ajax({
                url: base_url+"report_variety/index/report",
                type: 'POST',
                dataType: "JSON",
                data:{year:$("#year").val(),principal_id:$("#principal_id").val(),season_id:$("#season_id").val(),crop_id:$("#crop_id").val(),crop_type_id:$("#crop_type_id").val()},
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