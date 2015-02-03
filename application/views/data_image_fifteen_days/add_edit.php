<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$data["link_back"]="#";
$data["hide_back"]="1";
$this->load->view("action_buttons_edit",$data);

?>
<form class="form_valid" id="save_form" action="<?php echo base_url();?>data_image_fifteen_days/index/save" method="post">
    <div class="row widget">
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
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_SEASON');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-xs-4">
                <select name="season_id" id="season_id" class="form-control validate[required]">
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
        </div>

        <div class="row show-grid" style="display: none;" id="crop_id_container">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_CROP');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-xs-4">
                <select name="crop_id" id="crop_id" class="form-control validate[required]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php
                    foreach($crops as $crop)
                    {?>
                        <option value="<?php echo $crop['id'];?>"><?php echo $crop['crop_name'];?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="row show-grid" style="display: none;" id="crop_type_id_container">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_TYPE');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-xs-4">
                <select name="crop_type_id" id="crop_type_id" class="form-control validate[required]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>

                </select>
            </div>
        </div>

        <div class="row show-grid" style="display: none;"  id="day_number_container">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_DAY_NUMBER');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-xs-4">
                <select name="day_number" id="day_number" class="form-control validate[required]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>

                </select>
            </div>
        </div>

    </div>
    <div class="row widget" id="data_15_images">

    </div>
    <div class="clearfix"></div>

</form>
<script type="text/javascript">

    jQuery(document).ready(function()
    {
//        $(".form_valid").validationEngine();
        $(document).off("change", "#year");
        $(document).on("change", "#year", function(event)
        {
            $("#data_15_images").html("");
            $("#season_id").val("");
            $("#crop_id_container").hide();
            $("#crop_type_id_container").hide();
            $("#day_number_container").hide();


        });
        $(document).off("change", "#season_id");
        $(document).on("change", "#season_id", function(event)
        {
            $("#data_15_images").html("");
            $("#crop_id").val("");
            $("#crop_id_container").show();
            $("#crop_type_id_container").hide();
            $("#day_number_container").hide();
        });

        $(document).off("change", "#crop_id");
        $(document).on("change", "#crop_id", function(event)
        {
            $("#data_15_images").html("");
            $("#crop_type_id").val("");
            $("#crop_type_id_container").show();
            $("#day_number_container").hide();
            var crop_id = $("#crop_id").val();
            if(crop_id>0)
            {
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
        });

        $(document).off("change", "#crop_type_id");
        $(document).on("change", "#crop_type_id", function(event)
        {
            $("#data_15_images").html("");
            $("#day_number").val("");
            $("#day_number_container").show();
            if($(this).val()>0)
            {
                $.ajax({
                    url: base_url+"data_image_fifteen_days/get_fifteen_days_for_data_image",
                    type: 'POST',
                    dataType: "JSON",
                    data:{year:$("#year").val(),season_id:$("#season_id").val(),crop_id:$("#crop_id").val(),crop_type_id:$("#crop_type_id").val()},
                    success: function (data, status)
                    {

                    },
                    error: function (xhr, desc, err)
                    {
                        console.log("error");

                    }
                });
            }
        });
        $(document).off("change", "#day_number");
        $(document).on("change", "#day_number", function(event)
        {
            $("#data_15_images").html("");
            if($(this).val()>0)
            {
                $.ajax({
                    url: base_url+"data_image_fifteen_days/index/list",
                    type: 'POST',
                    dataType: "JSON",
                    data:{year:$("#year").val(),season_id:$("#season_id").val(),crop_id:$("#crop_id").val(),crop_type_id:$("#crop_type_id").val(),day_number:$("#day_number").val()},
                    success: function (data, status)
                    {

                    },
                    error: function (xhr, desc, err)
                    {
                        console.log("error");

                    }
                });
            }
        });
    });

</script>