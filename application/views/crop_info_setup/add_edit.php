<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    $data["link_new"]=base_url()."crop_info_setup/index/add";
    $data["link_back"]=base_url()."crop_info_setup";
    $this->load->view("action_buttons_edit",$data);

?>
<form class="form_valid" id="save_form" action="<?php echo base_url();?>setup_plot_info/index/save" method="post">
    <input type="hidden" name="plot_id" value="<?php echo $plotInfo['id'];?>" />
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

        <div class="row show-grid dateFields" style="display: none;">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_EXPECTED_ANALYSIS_DATE_FROM');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-xs-4">
                <input type="text" name="expected_analysis_date_from" id="expected_analysis_date_from" class="form-control" value="" />
            </div>
        </div>

        <div class="row show-grid dateFields" style="display: none;">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_EXPECTED_ANALYSIS_DATE_TO');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-xs-4">
                <input type="text" name="expected_analysis_date_to" id="expected_analysis_date_to" class="form-control" value="" />
            </div>
        </div>

        <div class="row show-grid dateFields" style="display: none;">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_ANALYSIS_DATE');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-xs-4">
                <input type="text" name="expected_analysis_date" id="expected_analysis_date" class="form-control" value="" />
            </div>
        </div>

        <div class="row show-grid dateFields" style="display: none;">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_EXPECTED_ANALYSIS_WITH_MARKET_FROM');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-xs-4">
                <input type="text" name="expected_analysis_date_with_market_from" id="expected_analysis_date_with_market_from" class="form-control" value="" />
            </div>
        </div>

        <div class="row show-grid dateFields" style="display: none;">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_EXPECTED_ANALYSIS_WITH_MARKET_TO');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-xs-4">
                <input type="text" name="expected_analysis_date_with_market_to" id="expected_analysis_date_with_market_to" class="form-control" value="" />
            </div>
        </div>

        <div class="row show-grid dateFields" style="display: none;">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_ANALYSIS_DATE');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-xs-4">
                <input type="text" name="analysis_date" id="analysis_date" class="form-control" value="" />
            </div>
        </div>

        <div class="row show-grid dateFields" style="display: none;">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_EXPECTED_PRESENTATION_TO_MANAGEMENT_FROM');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-xs-4">
                <input type="text" name="expected_presentation_to_management_from" id="expected_presentation_to_management_from" class="form-control" value="" />
            </div>
        </div>

        <div class="row show-grid dateFields" style="display: none;">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_EXPECTED_PRESENTATION_TO_MANAGEMENT_TO');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-xs-4">
                <input type="text" name="expected_presentation_to_management_to" id="expected_presentation_to_management_to" class="form-control" value="" />
            </div>
        </div>

        <div class="row show-grid dateFields" style="display: none;">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_PRESENTATION_DATE');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-xs-4">
                <input type="text" name="presentation_to_management" id="presentation_to_management" class="form-control" value="" />
            </div>
        </div>
    </div>

    <div class="clearfix"></div>
</form>
<script type="text/javascript">

    jQuery(document).ready(function()
    {
        turn_off_triggers();

        $( "#expected_analysis_date_from" ).datepicker({dateFormat : display_date_format});
        $( "#expected_analysis_date_to" ).datepicker({dateFormat : display_date_format});
        $( "#expected_analysis_date" ).datepicker({dateFormat : display_date_format});
        $( "#expected_analysis_date_with_market_from" ).datepicker({dateFormat : display_date_format});
        $( "#expected_analysis_date_with_market_to" ).datepicker({dateFormat : display_date_format});
        $( "#analysis_date" ).datepicker({dateFormat : display_date_format});
        $( "#expected_presentation_to_management_from" ).datepicker({dateFormat : display_date_format});
        $( "#expected_presentation_to_management_to" ).datepicker({dateFormat : display_date_format});
        $( "#presentation_to_management" ).datepicker({dateFormat : display_date_format});

        $(".form_valid").validationEngine();

        $(document).on("change", "#year", function(event)
        {
            $("#season_id").val("");
            $("#crop_id_container").hide();
            $("#crop_type_id_container").hide();
        });

        $(document).on("change", "#season_id", function(event)
        {
            $("#crop_id").val("");
            $("#crop_id_container").show();
            $("#crop_type_id_container").hide();
        });

        $(document).on("change", "#crop_id", function(event)
        {
            $("#fruit_text").html("");
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
            else
            {
                $("#crop_type_id_container").hide();
            }
        });

        $(document).on("change", "#crop_type_id", function(event)
        {
            if($(this).val()>0)
            {
                $(".dateFields").show();
            }
            else
            {
                $(".dateFields").hide();
            }
        });
    });
</script>