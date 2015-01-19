<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

?>

<form class="form_valid" id="save_form" action="<?php echo base_url()?>general_crop_info_report/index/report" method="post">
    <div class="row widget">
        <div class="widget-header">
            <div class="title">
                <?php echo $title; ?>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-2">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_SEASON');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-xs-4">
                <select name="common_season_id" id="common_season_id" class="form-control validate[required]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php
                    foreach($seasons as $season)
                    {?>
                        <option value="<?php echo $season['id']?>" ><?php echo $season['season_name'];?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>

            <div class="col-xs-2">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_CROP');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-xs-4">
                <select name="common_crop_id" id="common_crop_id" class="form-control validate[required]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>

                </select>
            </div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-2">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_PRODUCT_TYPE');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-xs-4">
                <select name="common_crop_type" id="common_crop_type" class="form-control validate[required]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>

                </select>
            </div>

            <div class="col-xs-2">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_RND_CODE');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-xs-4">
                <select name="common_rnd_code" id="common_rnd_code" class="form-control validate[required]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                </select>
            </div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-2">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_TYPE_RND_CODE');?></label>
            </div>
            <div class="col-xs-4">
                <input type="text" name="input_rnd_code" class="form-control" />
            </div>

            <div class="col-lg-6">
                <input type="submit" class="btn btn-default btn-primary pull-right" name="search_report" value="Search">
            </div>
        </div>

    </div>

</form>
<div class="row widget" id="report_list">

</div>
<script type="text/javascript">

//    jQuery(document).ready(function()
//    {
//        $(".form_valid").validationEngine();
//
//    });
</script>