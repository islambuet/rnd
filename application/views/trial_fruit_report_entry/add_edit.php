<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$data["link_new"]=base_url()."trial_fruit_report_entry/index/add";
$data["link_back"]=base_url()."trial_fruit_report_entry";
$this->load->view("action_buttons_edit",$data);

//echo '<pre>';
//print_r($pictureInfo);
////print_r($details);
//echo '</pre>';
if(!empty($details))
{
    $count = sizeof($details);
}

?>
<style type="text/css">
    .pic_upload label{
        margin: 0 0 0 5px;
    }
    .cat_harvest{
        background-color: #e8e8e8;
        border-bottom: 1px solid #cfcfcf;
        line-height: 10px;
        margin-bottom: 10px;
        padding: 10px 10px 10px 20px;
        color: #6D7C89;
        float: left;
        font-size: 12px;
        font-weight: bold;
    }
</style>
<form class="form_valid" id="save_form" enctype="multipart/form-data" action="<?php base_url()?>trial_fruit_report_entry/index/save" method="post">
    <div class="row widget">
        <div class="widget-header">
            <div class="title">
                <?php echo $title; ?>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_SEASON');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <select name="season_id" id="season_id" class="form-control validate[required]" <?php if(!empty($pictureInfo['crop_id'])){ echo "disabled";}?>>
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php
                    foreach($seasons as $season)
                    {?>
                        <option value="<?php echo $season['id']?>" <?php //if($season['id']==$pictureInfo['season_id']){ echo "selected";}?>><?php echo $season['season_name'];?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_CROP');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <select name="crop_id" id="crop_id" class="form-control validate[required]" <?php //if(!empty($pictureInfo['crop_id'])){ echo "disabled";}?>>
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php
                    foreach($crops as $crop)
                    {?>
                        <option value="<?php echo $crop['id']?>" <?php //if($crop['id']==$pictureInfo['crop_id']){ echo "selected";}?>><?php echo $crop['crop_name'];?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <input type="hidden" name="fifteen_id" id="fifteen_id" value="<?php //echo $pictureInfo['id'];?>"/>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_PRODUCT_TYPE');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <select name="crop_type" id="crop_type" class="form-control" <?php //if(!empty($pictureInfo['type_id'])){ echo "disabled";}?>>
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($types as $type){?>
                        <option value="<?php echo $type['id'];?>" <?php //if($type['id']==$pictureInfo['type_id']){ echo "selected";}?>><?php echo $type['product_type'];?></option>
                    <?php }?>
                </select>
            </div>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_RND_CODE');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <select name="rnd_code" id="rnd_code" class="form-control" <?php //if(!empty($pictureInfo['rnd_code'])){ echo "disabled";}?>>
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php
                    $rndCode = System_helper::get_rnd_codes();
                    foreach($rndCode as $code)
                    {
                        ?>
                        <option value="<?php echo $code['id'];?>" <?php //if($code['id']==$pictureInfo['rnd_code']){ echo "selected";}?>><?php echo $code['rnd_code'];?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>

        <!--    Image ---->

        <div class="widget-header">
            <div class="title">
                <?php echo $this->lang->line('LABEL_FRUIT_REPORT_BEFORE_HARVEST'); ?>
            </div>
            <div class="clearfix"></div>
        </div>
        <div style="" class="row show-grid pic_upload">

        <label class="control-label"><?php echo $this->lang->line('LABEL_FRUIT_REPORT_PLOT');?> <input type="file" name="before_harvest[]" value=""/></label>
        <label class="control-label"><?php echo $this->lang->line('LABEL_FRUIT_REPORT_PLANT');?> <input type="file" name="before_harvest[]" value=""/></label>
        <label class="control-label"><?php echo $this->lang->line('LABEL_FRUIT_REPORT_CLOSE_FRUIT');?> <input type="file" name="before_harvest[]" value=""/></label>

        </div>
        <div class="widget-header">
            <div class="title">
                <?php echo $this->lang->line('LABEL_FRUIT_REPORT_AFTER_HARVEST'); ?>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="title cat_harvest">
            <?php echo $this->lang->line('LABEL_FRUIT_REPORT_SINGLE'); ?>
        </div>
        <div class="clearfix"></div>
        <div style="" class="row show-grid pic_upload">

            <label class="control-label"><?php echo $this->lang->line('LABEL_FRUIT_REPORT_PIC1');?> <input type="file" name="after_harvest_single[]" value=""/></label>
            <label class="control-label"><?php echo $this->lang->line('LABEL_FRUIT_REPORT_PIC2');?> <input type="file" name="after_harvest_single[]" value=""/></label>
            <label class="control-label"><?php echo $this->lang->line('LABEL_FRUIT_REPORT_PIC3');?> <input type="file" name="after_harvest_single[]" value=""/></label>

        </div>
        <div class="title cat_harvest">
            <?php echo $this->lang->line('LABEL_FRUIT_REPORT_SEVERAL'); ?>
        </div>
        <div class="clearfix"></div>
        <div style="" class="row show-grid pic_upload">

            <label class="control-label"><?php echo $this->lang->line('LABEL_FRUIT_REPORT_PIC1');?> <input type="file" name="after_harvest_several[]" value=""/></label>
            <label class="control-label"><?php echo $this->lang->line('LABEL_FRUIT_REPORT_PIC2');?> <input type="file" name="after_harvest_several[]" value=""/></label>


        </div>
        <div class="title cat_harvest">
            <?php echo $this->lang->line('LABEL_FRUIT_REPORT_CUT'); ?>
        </div>
        <div class="clearfix"></div>
        <div style="" class="row show-grid pic_upload">

            <label class="control-label"><?php echo $this->lang->line('LABEL_FRUIT_REPORT_PIC1');?> <input type="file" name="after_harvest_cut[]" value=""/></label>
            <label class="control-label"><?php echo $this->lang->line('LABEL_FRUIT_REPORT_PIC2');?> <input type="file" name="after_harvest_cut[]" value=""/></label>
            <label class="control-label"><?php echo $this->lang->line('LABEL_FRUIT_REPORT_PIC3');?> <input type="file" name="after_harvest_cut[]" value=""/></label>

        </div>

    </div>
    <div class="clearfix"></div>

</form>


<script type="text/javascript">

    jQuery(document).ready(function()
    {
        $(".form_valid").validationEngine();

    });

    $(document).on("change", "#season_id", function(event)
    {
        var season_id = $("#season_id").val();
        var crop_selected = '<?php echo $pictureInfo['crop_id'];?>';
        $.ajax({
            url: base_url+"rnd_common/dropDown_crop_by_season/",
            type: 'POST',
            dataType: "JSON",
            data:{season_id:season_id,crop_selected:crop_selected},
            success: function (data, status)
            {

            },
            error: function (xhr, desc, err)
            {
                console.log("error");

            }
        });

    });

    $(document).on("change", "#crop_id", function(event)
    {
        var crop_id = $("#crop_id").val();
        var product_type_id = '<?php echo $pictureInfo['type_id'];?>';
        $.ajax({
            url: base_url+"rnd_common/dropDown_crop_type_by_name/",
            type: 'POST',
            dataType: "JSON",
            data:{crop_id:crop_id,product_type_id:product_type_id},
            success: function (data, status)
            {

            },
            error: function (xhr, desc, err)
            {
                console.log("error");

            }
        });

    });

    $(document).on("change", "#crop_type", function(event)
    {
        var crop_id = $("#crop_id").val();
        var type_id = $("#crop_type").val();
        var selected = '<?php echo $pictureInfo['rnd_code'];?>';
        $.ajax({
            url: base_url+"rnd_common/dropDown_rnd_code_by_name_type/",
            type: 'POST',
            dataType: "JSON",
            data:{crop_id:crop_id,type_id:type_id},
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