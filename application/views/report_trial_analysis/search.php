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
        <div class="col-xs-1">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_YEAR');?><span style="color:#FF0000">*</span></label>
        </div>
        <div class="col-xs-2">
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

        <div class="col-xs-1">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_SEASON');?><span style="color:#FF0000">*</span></label>
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

        <div class="col-xs-1">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_CROP');?><span style="color:#FF0000">*</span></label>
        </div>
        <div class="col-xs-2">
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

        <div class="col-xs-1">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_TYPE');?></label>
        </div>
        <div class="col-xs-2">
            <select name="crop_type_id" id="crop_type_id" class="form-control validate[required]">
                <option value=""><?php echo $this->lang->line('SELECT');?></option>

            </select>
        </div>
    </div>

    <div class="row show-grid">
        <div class="col-lg-2 pull-right">
            <input type="button" id="variety_button" class="form-control btn-primary" value="<?php echo $this->lang->line('LOAD_VARIETY');?>" />
        </div>
    </div>
</div>



<div class="row widget" id="variety_list">

</div>


<script>

    turn_off_triggers();

    $(document).on("change", "#year", function(event)
    {
        $("#variety_list").html("");
        $("#season_id").val("");
    });

    $(document).on("change", "#season_id", function(event)
    {
        $("#variety_list").html("");
        $("#crop_id").val("");
    });

    $(document).on("change", "#crop_id", function(event)
    {
        $("#variety_list").html("");
        $("#crop_type_id").val("");

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

    $(document).on("click", "#variety_button", function(event)
    {
        $("#variety_list").html("");

        $.ajax({
            url: base_url+"report_trial_analysis/load_varieties_for_trial_report",
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

    });


</script>