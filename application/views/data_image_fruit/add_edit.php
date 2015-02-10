<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$data["link_back"]="#";
$data["hide_back"]="1";
$this->load->view("action_buttons_edit",$data);

?>
<form class="form_valid" id="save_form" action="<?php echo base_url();?>data_image_fruit/index/save" method="post">
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

        <div class="row show-grid" style="display: none;"  id="fruit_image_type_container">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_FRUIT_IMAGE_TYPE');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-xs-4">
                <select name="fruit_image_type" id="fruit_image_type" class="form-control validate[required]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php
                    foreach($this->config->item('fruit_image') as $val=>$flower)
                    {
                        ?>
                        <option value="<?php echo $val;?>"><?php echo $flower;?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>

    </div>
    <div class="row widget" id="data_fruit">

    </div>
    <div class="clearfix"></div>

</form>
<script type="text/javascript">

    jQuery(document).ready(function()
    {
        turn_off_triggers();

//        $(".form_valid").validationEngine();
        $(document).on("change", "#year", function(event)
        {
            $("#data_fruit").html("");
            $("#season_id").val("");
            $("#crop_id_container").hide();
            $("#crop_type_id_container").hide();
            $("#fruit_image_type_container").hide();
        });

        $(document).on("change", "#season_id", function(event)
        {
            $("#data_fruit").html("");
            $("#crop_id").val("");
            $("#crop_id_container").show();
            $("#crop_type_id_container").hide();
            $("#fruit_image_type_container").hide();
        });

        $(document).on("change", "#crop_id", function(event)
        {
            $("#data_fruit").html("");
            $("#crop_type_id").val("");
            $("#crop_type_id_container").show();
            $("#fruit_image_type_container").hide();
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

        $(document).on("change", "#crop_type_id", function(event)
        {
            $("#data_fruit").html("");
            $("#fruit_image_type").val("");
            $("#fruit_image_type_container").show();
            var crop_type_id = $("#crop_type_id").val();
            if(crop_type_id>0)
            {
                $.ajax({
                    url: base_url+"data_image_fruit/get_dropDown_fruit_image_type",
                    type: 'POST',
                    dataType: "JSON",
                    data:{crop_id:$("#crop_id").val()},
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

        $(document).on("change", "#fruit_image_type", function(event)
        {
            $("#data_flowerings").html("");
            if($(this).val()>0)
            {
                $.ajax({
                    url: base_url+"data_image_fruit/index/list",
                    type: 'POST',
                    dataType: "JSON",
                    data:{year:$("#year").val(),season_id:$("#season_id").val(),crop_id:$("#crop_id").val(),crop_type_id:$("#crop_type_id").val(),fruit_image_type:$("#fruit_image_type").val()},
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
        $(document).on("change", ".browse_button", function(event)
        {
            var id=$(this).attr("data-image-container");
            display_browse_image(this,"#"+id);
        });
    });

</script>