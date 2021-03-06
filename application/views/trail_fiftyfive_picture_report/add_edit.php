<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    $data["link_new"]=base_url()."trail_fiftyfive_picture_report/index/add";
    $data["link_back"]=base_url()."trail_fiftyfive_picture_report";
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

<form class="form_valid" id="save_form" enctype="multipart/form-data" action="<?php echo base_url();?>trail_fiftyfive_picture_report/index/save" method="post">
    <input type="hidden" name="fifteen_id" id="fifteen_id" value="<?php echo $pictureInfo['id'];?>"/>
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
                <select name="pr_common_season_id" id="pr_common_season_id" class="form-control validate[required]" <?php if(!empty($pictureInfo['crop_id'])){ echo "disabled";}?>>
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php
                    foreach($seasons as $season)
                    {?>
                        <option value="<?php echo $season['id']?>" <?php if($season['id']==$pictureInfo['season_id']){ echo "selected";}?>><?php echo $season['season_name'];?></option>
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
                <select name="common_crop_id" id="common_crop_id" class="form-control validate[required]" <?php if(!empty($pictureInfo['crop_id'])){ echo "disabled";}?>>
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php
                    foreach($crops as $crop)
                    {?>
                        <option value="<?php echo $crop['id']?>" <?php if($crop['id']==$pictureInfo['crop_id']){ echo "selected";}?>><?php echo $crop['crop_name'];?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_PRODUCT_TYPE');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <select name="common_crop_type" id="common_crop_type" class="form-control" <?php if(!empty($pictureInfo['type_id'])){ echo "disabled";}?>>
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($types as $type){?>
                        <option value="<?php echo $type['id'];?>" <?php if($type['id']==$pictureInfo['type_id']){ echo "selected";}?>><?php echo $type['product_type'];?></option>
                    <?php }?>
                </select>
            </div>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_RND_CODE');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <select name="common_rnd_code" id="common_rnd_code" class="form-control" <?php if(!empty($pictureInfo['rnd_code'])){ echo "disabled";}?>>
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php
                    $rndCode = System_helper::get_rnd_codes();
                    foreach($rndCode as $code)
                    {
                    ?>
                        <option value="<?php echo $code['id'];?>" <?php if($code['id']==$pictureInfo['rnd_code']){ echo "selected";}?>><?php echo $code['rnd_code'];?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SOWING_DATE');?></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="sowing_date" id="sowing_date" class="form-control" value="<?php if(!empty($pictureInfo['sowing_date'])){ echo date('d-m-Y',$pictureInfo['sowing_date']);}?>" >
            </div>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_ACTUAL_PICTURE_DATE');?></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="actual_picture_date" id="actual_picture_date" readonly class="form-control" value="<?php echo date('d-m-Y',time());?>" >
            </div>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_PICTURE_DATE');?></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="picture_date" id="picture_date" class="form-control" value="" >
            </div>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_PICTURE_DAY');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="picture_day" id="picture_day" class="form-control" value="<?php if(!empty($count)){ echo $count*15+15;}else{ echo 15;}?>" >
            </div>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_ADD_IMAGE');?></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <img src="<?php echo base_url();?>images/no_image.jpg" style="width: 77px; height: 77px;" class="file_display_container" />
                <input type="file" name="rnd_image" id="rnd_image" class="file_button" value="" />
            </div>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_REMARKS');?></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <textarea name="remarks" id="remarks" class="form-control"></textarea>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    <?php if(!empty($details)){?>
        <div class="row widget">
            <?php
            $i = 0;
            foreach($details as $detail)
            {
                ?>
                <div class="col-xs-3">
                    <label class="control-label"><?php echo $detail['picture_day'];?> <?php echo $this->lang->line('LABEL_DAYS');?>
                        <img width="80px" height="80px" src="<?php echo base_url()?>images/trail_fiftyfive_picture_report/<?php echo $detail['image_name'];?>"/>
                    </label>
                    <input type="hidden" name="row_spec_id[]" value="<?php echo $detail['id']?>">
                    <label class="control-label"><?php echo $this->lang->line('LABEL_PICTURE_DAY');?> <input type="text" name="picture_day_spec[]" value="<?php echo $detail['picture_day'];?>"/></label>
                    <label class="control-label"><?php echo $this->lang->line('LABEL_PICTURE_DATE');?> <input type="text" name="picture_date_spec[]" id="picture_date_spec<?php echo $i;?>" value="<?php echo date('d-m-Y',$detail['picture_date']);?>"/></label>
                    <label class="control-label"><?php echo $this->lang->line('LABEL_CHANGE_PICTURE');?> <input type="file" name="image_spec[]" value=""/></label>
                </div>

                <script>
                    var serial = '<?php echo $i;?>';
                    Calendar.setup({
                        inputField: "picture_date_spec"+serial,
                        trigger: "picture_date_spec"+serial,
                        onSelect: function() {
                            this.hide()
                        },
                        showTime: 12,
                        dateFormat: "%d-%m-%Y"
                    });
                </script>
            <?php
            $i++;
            }?>
        </div>
    <?php }?>
</form>


<script type="text/javascript">

    jQuery(document).ready(function()
    {
        $(".form_valid").validationEngine();

    });


    Calendar.setup({
        inputField: "sowing_date",
        trigger: "sowing_date",
        onSelect: function() {
            this.hide()
        },
        showTime: 12,
        dateFormat: "%d-%m-%Y"
    });

    Calendar.setup({
        inputField: "picture_date",
        trigger: "picture_date",
        onSelect: function() {
            this.hide()
        },
        showTime: 12,
        dateFormat: "%d-%m-%Y"
    });

</script>