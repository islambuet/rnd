<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$data["link_back"]="#";
$data["hide_back"]="1";
$this->load->view("action_buttons_edit",$data);

?>
<form class="form_valid" id="save_form" action="<?php echo base_url();?>setup_image_flowering/index/save" method="post">
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

        <div class="row show-grid" id="crop_id_container" style="display: none">
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

        <div class="row show-grid" id="crop_type_id_container" style="display: none">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_TYPE');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-xs-4">
                <select name="crop_type_id" id="crop_type_id" class="form-control validate[required]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                </select>
            </div>
        </div>

    </div>
    <div class="row widget" id="config_flowering_images">

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
            $("#config_flowering_images").html("");
            $("#season_id").val("");
            $("#crop_id_container").hide();
            $("#crop_type_id_container").hide();
        });

        $(document).on("change", "#season_id", function(event)
        {
            $("#config_flowering_images").html("");
            $("#crop_id").val("");
            $("#crop_id_container").show();
            $("#crop_type_id_container").hide();
        });

        $(document).on("change", "#crop_id", function(event)
        {
            $("#config_flowering_images").html("");
            $("#crop_type_id").val("");
            $("#crop_type_id_container").show();

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
            $("#config_flowering_images").html("");
            if($(this).val()>0)
            {
                $.ajax({
                    url: base_url+"setup_image_flowering/index/list",
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
        $(document).on("change", ".browse_button", function(event)
        {
            var id=$(this).attr("data-image-container");
            display_browse_image(this,"#"+id);
        });

    });

</script>