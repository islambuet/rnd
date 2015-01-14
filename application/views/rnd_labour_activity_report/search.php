<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


?>
<form class="form_valid" id="save_form" action="<?php echo base_url()?>rnd_labour_activity_report/index/report" method="post">
    <div class="row widget">
        <div class="widget-header">
            <div class="title">
                <?php echo $title; ?>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-1">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_SEASON');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-2 col-xs-4">
                <select name="season_id" id="labour_activity_season_id" class="form-control" <?php //if(!empty($pesticideInfo['season_id'])){ echo "disabled";}?>>
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php
                    foreach($seasons as $season)
                    {?>
                        <option value="<?php echo $season['id']?>" <?php //if($season['id']==$pesticideInfo['season_id']){ echo "selected";}?>><?php echo $season['season_name'];?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="col-xs-1">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_CROP');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-2 col-xs-4">
                <select name="crop_id" id="labour_activity_crop_id" class="form-control" <?php //if(!empty($pesticideInfo['crop_id'])){ echo "disabled";}?>>
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php

                    foreach($crops as $crop)
                    {
                        ?>
                        <option value="<?php echo $crop['id']?>" <?php //if ($crop['id']== $pesticideInfo['crop_id']){ echo 'selected';}?>><?php echo $crop['crop_name'];?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>

            <div class="col-xs-1">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_VARIETY_TYPE');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-2 col-xs-4">
                <select name="labour_activity_variety" id="labour_activity_variety" class="form-control" <?php //if(!empty($pesticideInfo['varity_type_id'])){ echo "disabled";}?>>
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php
                    foreach($types as $type)
                    {
                        ?>
                        <option value="<?php echo $type['id']?>" <?php //if ($type['id']== $pesticideInfo['varity_type_id']){ echo 'selected';}?>><?php echo $type['variety_name'];?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="col-xs-1">
                <input type="submit" class="btn btn-default btn-primary" name="search_report" value="Search">
            </div>
        </div>


    </div>

</form>
<div class="row widget" id="report_list">

</div>

<script type="text/javascript">

    jQuery(document).ready(function()
    {
        $(".form_valid").validationEngine();

    });

    Calendar.setup({
        inputField: "labour_activity_date",
        trigger: "labour_activity_date",
        onSelect: function() {
            this.hide()
        },
        showTime: 12,
        dateFormat: "%d-%m-%Y"
    });




</script>
