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
        <div class="col-xs-2">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_PRINCIPAL_NAME');?></label>
        </div>
        <div class="col-xs-2">
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
        <div class="col-xs-2">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_YEAR');?></label>
        </div>
        <div class="col-xs-2">
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

        <div class="col-xs-2">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_SEASON');?></label>
        </div>
        <div class="col-xs-2">
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
        <div class="col-xs-2 crop_id_container">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_CROP');?></label>
        </div>
        <div class="col-xs-2 crop_id_container">
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
        <div class="col-xs-2 crop_type_id_container" style="display: none">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_TYPE');?></label>
        </div>
        <div class="col-xs-2 crop_type_id_container" style="display: none">
            <select name="crop_type_id" id="crop_type_id" class="form-control">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>

            </select>
        </div>
        <div class="col-xs-2">

        </div>
        <div class="col-xs-2" id="variety_button_container">
            <input type="button" id="variety_button" class="form-control btn-primary" value="<?php echo $this->lang->line('LOAD_VARIETY');?>" />
        </div>
    </div>
</div>

<div class="row widget hidden-print" id="variety_list">

</div>
<div class="row widget" id="report_list">

</div>

<script type="text/javascript">
    jQuery(document).ready(function()
    {
        turn_off_triggers();

        $(document).on("change", "#year", function(event)
        {
            $("#variety_list").html("");
            $("#report_list").html("");
        });

        $(document).on("change", "#season_id", function(event)
        {
            $("#variety_list").html("");
            $("#report_list").html("");
        });

        $(document).on("change", "#crop_id", function(event)
        {
            $("#variety_list").html("");
            $("#report_list").html("");
            $("#crop_type_id").val("");

            var crop_id = $("#crop_id").val();
            if(crop_id>0)
            {
                $(".crop_type_id_container").show();
                $("#variety_button_container").show();
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
            $("#variety_list").html("");
            $("#report_list").html("");

        });

        $(document).on("click", "#variety_button", function(event)
        {
            $("#variety_list").html("");
            $("#report_list").html("");

            $.ajax({
                url: base_url+"report_principal/load_varieties_for_principal_report",
                type: 'POST',
                dataType: "JSON",
                data:{principal_id:$('#principal_id').val(),year:$("#year").val(),season_id:$("#season_id").val(),crop_id:$("#crop_id").val(),crop_type_id:$("#crop_type_id").val()},
                success: function (data, status)
                {

                },
                error: function (xhr, desc, err)
                {
                    console.log("error");
                }
            });

        });
        $(document).on("change","#select_all_variety",function()
        {
            if($(this).is(':checked'))
            {
                $('.select_variety').prop('checked', true);
            }
            else
            {
                $('.select_variety').prop('checked', false);
            }

        });
        /*$(document).on("click", "#load_report", function(event)
        {
            $("#report_list").html("");
            $("#report_form").submit();

        });
        $(document).on("click", ".full_text_report", function(event)
        {

            $.ajax({
                url: $(this).attr("data-link"),
                type: 'POST',
                dataType: "JSON",
                data: new FormData(document.getElementById("report_form")),
                processData: false,
                contentType: false,
                success: function (data, status)
                {

                },
                error: function (xhr, desc, err)
                {


                }
            });


        });*/

    });

</script>