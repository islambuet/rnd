<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    $data["link_back"]=base_url()."setup_expected_sowing";
    $this->load->view("action_buttons_edit",$data);

?>
<form class="form_valid" id="save_form" action="<?php echo base_url();?>setup_expected_sowing/index/save" method="post">
    <input type="hidden" name="season_id" value="<?php echo $season_info['id']?>">
    <div class="row widget">
        <div class="widget-header">
            <div class="title">
                <?php echo $title; ?>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_EXPECTED_SOWING_DATE').' From';?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-xs-4">
                <input type="text" name="expected_sowing_start" id="expected_sowing_start" class="form-control" value="<?php if(!empty($season_info['expected_sowing_start'])){echo System_helper::display_date($season_info['expected_sowing_start']);}?>">
            </div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_EXPECTED_SOWING_DATE').' To';?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-xs-4">
                <input type="text" name="expected_sowing_end" id="expected_sowing_end" class="form-control" value="<?php if($season_info['expected_sowing_end']){ echo System_helper::display_date($season_info['expected_sowing_end']);}?>">
            </div>
        </div>
        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_DESTINED_DELIVERY_DATE');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-xs-4">
                <input type="text" name="estimated_delivery_date" id="estimated_delivery_date" class="form-control" value="<?php if($season_info['estimated_delivery_date']){ echo System_helper::display_date($season_info['estimated_delivery_date']);}?>">
            </div>
        </div>
    </div>

    <div class="clearfix"></div>
</form>
<script type="text/javascript">

    jQuery(document).ready(function()
    {
        turn_off_triggers();
        $( "#expected_sowing_start" ).datepicker({dateFormat : display_date_format});
        $( "#expected_sowing_end" ).datepicker({dateFormat : display_date_format});
        $( "#estimated_delivery_date" ).datepicker({dateFormat : display_date_format});
    });


</script>