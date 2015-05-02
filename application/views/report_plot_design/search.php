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
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_SEASON');?></label>
        </div>
        <div class="col-xs-4">
            <select name="season_id" id="season_id" class="form-control">

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
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_PART');?></label>
        </div>
        <div class="col-xs-4">
            <select name="plot_id" id="crop_id" class="form-control">

                <?php
                foreach($plots as $plot)
                {
                    ?>
                    <option value="<?php echo $plot['id'];?>"><?php echo $plot['plot_name'];?></option>
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
            <input type="button" id="load_report" class="form-control btn-primary" value="<?php echo $this->lang->line('VIEW_REPORT');?>" />
        </div>
        <div class="col-xs-4">

        </div>
    </div>
</div>

<div class="row widget" id="report_list" style="overflow-x: auto;">

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
        });

        $(document).on("click", "#load_report", function(event)
        {

            $("#report_list").html("");
            $.ajax({
                url: base_url+"report_plot_design/index/report",
                type: 'POST',
                dataType: "JSON",
                data:{year:$("#year").val(),season_id:$("#season_id").val(),plot_id:$("#crop_id").val()},
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