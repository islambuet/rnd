<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$data["link_new"]=base_url()."trial_fruit_report_entry/index/add";
$data["link_back"]=base_url()."trial_fruit_report_entry";
$this->load->view("action_buttons_edit",$data);

//echo '<pre>';
////print_r($pictureInfo);
//print_r($images);
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
<form class="form_valid" id="save_form" enctype="multipart/form-data" action="<?php echo base_url()?>trial_fruit_report_entry/index/save" method="post">
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
                <select name="season_id" id="picture_report_season_id" class="form-control validate[required]" <?php if(!empty($pictureInfo['season_id'])){ echo "disabled";}?>>
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
            <input type="hidden" name="fruit_report_id" id="fruit_report_id" value="<?php echo $pictureInfo['id'];?>"/>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_CROP');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <select name="crop_id" id="picture_report_crop_id" class="form-control validate[required]" <?php if(!empty($pictureInfo['crop_id'])){ echo "disabled";}?>>
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
                <select name="crop_type" id="picture_report_crop_type" class="form-control" <?php if(!empty($pictureInfo['product_type_id'])){ echo "disabled";}?>>
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php foreach($types as $type){?>
                        <option value="<?php echo $type['id'];?>" <?php if($type['id']==$pictureInfo['product_type_id']){ echo "selected";}?>><?php echo $type['product_type'];?></option>
                    <?php }?>
                </select>
            </div>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_RND_CODE');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <select name="rnd_code" id="picture_report_rnd_code" class="form-control" <?php if(!empty($pictureInfo['rnd_code_id'])){ echo "disabled";}?>>
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php
                    $rndCode = System_helper::get_rnd_codes();
                    foreach($rndCode as $code)
                    {
                        ?>
                        <option value="<?php echo $code['id'];?>" <?php if($code['id']==$pictureInfo['rnd_code_id']){ echo "selected";}?>><?php echo $code['rnd_code'];?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>

        <!--    Image ---->

        <!--    Before Harvest ---->

        <div class="widget-header">
            <div class="title">
                <?php echo $this->lang->line('LABEL_FRUIT_REPORT_BEFORE_HARVEST'); ?>
            </div>
            <div class="clearfix"></div>
        </div>
        <div style="" class="row show-grid pic_upload">
            <?php
                $img=base_url()."images/no_image.jpg";

                if(isset($images[$this->config->item("fruit_report_before_harvest")][0]['image']))
                {
                    $img=base_url()."images/trial_fruit_picture_entry/before_harvesting/".$images[$this->config->item("fruit_report_before_harvest")][0]['image'];

                }
            ?>

            <label class="control-label">
                <img src="<?php echo $img;?>" style="width: 77px; height: 77px;" id="before_harvest_pic_1"  class="file_display_container"/>
                <?php echo $this->lang->line('Plot Plant');?>
<!--                <input type="text" readonly name="before_harvest_image_caption[]" value="--><?php //echo $this->lang->line('LABEL_FRUIT_REPORT_PLOT');?><!--"/> -->
                <input type="file" name="before_harvest[]" value="" class="file_button"/>
            </label>
            <?php
            $img=base_url()."images/no_image.jpg";

            if(isset($images[$this->config->item("fruit_report_before_harvest")][1]['image']))
            {
                $img=base_url()."images/trial_fruit_picture_entry/before_harvesting/".$images[$this->config->item("fruit_report_before_harvest")][1]['image'];

            }
            ?>

            <label class="control-label">
                <img src="<?php echo $img;?>" style="width: 77px; height: 77px;" id="before_harvest_pic_2" class="file_display_container"/>
                <?php echo $this->lang->line('LABEL_FRUIT_REPORT_PLANT');?>
                <input type="file" name="before_harvest[]" value="" class="file_button"/>
            </label>
            <?php
            $img=base_url()."images/no_image.jpg";

            if(isset($images[$this->config->item("fruit_report_before_harvest")][2]['image']))
            {
                $img=base_url()."images/trial_fruit_picture_entry/before_harvesting/".$images[$this->config->item("fruit_report_before_harvest")][2]['image'];

            }
            ?>
            <label class="control-label">
                <img src="<?php echo $img;?>" style="width: 77px; height: 77px;" id="before_harvest_pic_3" class="file_display_container"/>
                <?php echo $this->lang->line('LABEL_FRUIT_REPORT_CLOSE_FRUIT');?>
                <input type="file" name="before_harvest[]" value="" class="file_button"/>
            </label>

        </div>
        <div class="clearfix"></div>


        <!--    After Harvest ---->

        <div class="widget-header">
            <div class="title">
                <?php echo $this->lang->line('LABEL_FRUIT_REPORT_AFTER_HARVEST'); ?>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
        <!--    After Harvest:: Single Fruit ---->


        <div class="title cat_harvest">
            <?php echo $this->lang->line('LABEL_FRUIT_REPORT_SINGLE'); ?>
        </div>
        <div class="clearfix"></div>
        <div style="" class="row show-grid pic_upload">
            <?php
            $img=base_url()."images/no_image.jpg";

            if(isset($images[$this->config->item("fruit_report_after_harvest_single")][0]['image']))
            {
                $img=base_url()."images/trial_fruit_picture_entry/after_harvesting/".$images[$this->config->item("fruit_report_after_harvest_single")][0]['image'];

            }
            ?>

            <label class="control-label">
                <img src="<?php echo $img;?>" style="width: 77px; height: 77px;" id="after_harvest_single_1" class="file_display_container"/>
                <?php echo $this->lang->line('LABEL_FRUIT_REPORT_PIC1');?>
                <input type="file" name="after_harvest_single[]" value=""  class="file_button"/>
            </label>
            <?php
            $img=base_url()."images/no_image.jpg";

            if(isset($images[$this->config->item("fruit_report_after_harvest_single")][1]['image']))
            {
                $img=base_url()."images/trial_fruit_picture_entry/after_harvesting/".$images[$this->config->item("fruit_report_after_harvest_single")][1]['image'];

            }
            ?>

            <label class="control-label">
                <img src="<?php echo $img;?>" style="width: 77px; height: 77px;" id="after_harvest_single_2" class="file_display_container"/>
                <?php echo $this->lang->line('LABEL_FRUIT_REPORT_PIC2');?>
                <input type="file" name="after_harvest_single[]" value="" class="file_button" /></label>
            <?php
            $img=base_url()."images/no_image.jpg";

            if(isset($images[$this->config->item("fruit_report_after_harvest_single")][2]['image']))
            {
                $img=base_url()."images/trial_fruit_picture_entry/after_harvesting/".$images[$this->config->item("fruit_report_after_harvest_single")][2]['image'];

            }
            ?>

            <label class="control-label">
                <img src="<?php echo $img;?>" style="width: 77px; height: 77px;" id="after_harvest_single_3" class="file_display_container"/>
                <?php echo $this->lang->line('LABEL_FRUIT_REPORT_PIC3');?>
                <input type="file" name="after_harvest_single[]" value="" class="file_button" /></label>

        </div>
        <div class="clearfix"></div>

        <!--    After Harvest:: Several Fruit ---->

        <div class="title cat_harvest">
            <?php echo $this->lang->line('LABEL_FRUIT_REPORT_SEVERAL'); ?>
        </div>
        <div class="clearfix"></div>
        <div style="" class="row show-grid pic_upload">

            <?php
            $img=base_url()."images/no_image.jpg";

            if(isset($images[$this->config->item("fruit_report_after_harvest_several")][0]['image']))
            {
                $img=base_url()."images/trial_fruit_picture_entry/after_harvesting/".$images[$this->config->item("fruit_report_after_harvest_several")][0]['image'];

            }
            ?>
            <label class="control-label">
                <img src="<?php echo $img;?>" style="width: 77px; height: 77px;" id="after_harvest_several_1" class="file_display_container"/>
                <?php echo $this->lang->line('LABEL_FRUIT_REPORT_PIC1');?>
                <input type="file" name="after_harvest_several[]" value="" class="file_button" /></label>

            <?php
            $img=base_url()."images/no_image.jpg";

            if(isset($images[$this->config->item("fruit_report_after_harvest_several")][1]['image']))
            {
                $img=base_url()."images/trial_fruit_picture_entry/after_harvesting/".$images[$this->config->item("fruit_report_after_harvest_several")][1]['image'];

            }
            ?>
            <label class="control-label">
                <img src="<?php echo $img;?>" style="width: 77px; height: 77px;" id="after_harvest_several_2" class="file_display_container"/>
                <?php echo $this->lang->line('LABEL_FRUIT_REPORT_PIC2');?>
                <input type="file" name="after_harvest_several[]" value="" class="file_button" /></label>


        </div>
        <div class="clearfix"></div>

        <!--    After Harvest:: Cut Fruit ---->
        <div class="title cat_harvest">
            <?php echo $this->lang->line('LABEL_FRUIT_REPORT_CUT'); ?>
        </div>
        <div class="clearfix"></div>
        <div style="" class="row show-grid pic_upload">

            <?php
            $img=base_url()."images/no_image.jpg";

            if(isset($images[$this->config->item("fruit_report_after_harvest_cut")][0]['image']))
            {
                $img=base_url()."images/trial_fruit_picture_entry/after_harvesting/".$images[$this->config->item("fruit_report_after_harvest_cut")][0]['image'];

            }
            ?>
            <label class="control-label">
                <img src="<?php echo $img;?>" style="width: 77px; height: 77px;" id="after_harvest_cut_1" class="file_display_container"/>
                <?php echo $this->lang->line('LABEL_FRUIT_REPORT_PIC1');?>
                <input type="file" name="after_harvest_cut[]" value="" class="file_button" /></label>
            <?php
            $img=base_url()."images/no_image.jpg";

            if(isset($images[$this->config->item("fruit_report_after_harvest_cut")][1]['image']))
            {
                $img=base_url()."images/trial_fruit_picture_entry/after_harvesting/".$images[$this->config->item("fruit_report_after_harvest_cut")][1]['image'];

            }
            ?>

            <label class="control-label">
                <img src="<?php echo $img;?>" style="width: 77px; height: 77px;" id="after_harvest_cut_2"  class="file_display_container"/>
                <?php echo $this->lang->line('LABEL_FRUIT_REPORT_PIC2');?>
                <input type="file" name="after_harvest_cut[]" value="" class="file_button" /></label>
            <?php
            $img=base_url()."images/no_image.jpg";

            if(isset($images[$this->config->item("fruit_report_after_harvest_cut")][2]['image']))
            {
                $img=base_url()."images/trial_fruit_picture_entry/after_harvesting/".$images[$this->config->item("fruit_report_after_harvest_cut")][2]['image'];

            }
            ?>

            <label class="control-label">
                <img src="<?php echo $img;?>" style="width: 77px; height: 77px;" id="after_harvest_cut_3" class="file_display_container"/>
                <?php echo $this->lang->line('LABEL_FRUIT_REPORT_PIC3');?>
                <input type="file" name="after_harvest_cut[]" value="" class="file_button" />
            </label>

        </div>

    </div>
    <div class="clearfix"></div>

</form>


<script type="text/javascript">

//    function readURL1(input)
//    {
//        if (input.files && input.files[0])
//        {
//            var reader = new FileReader();
//
//            reader.onload = function ( e )
//            {
//                $('#before_harvest_pic_1').attr('src', e.target.result);
//            }
//
//            reader.readAsDataURL(input.files[0]);
//        }
//    }
//    function readURL2(input)
//    {
//        if (input.files && input.files[0])
//        {
//            var reader = new FileReader();
//
//            reader.onload = function ( e )
//            {
//                $('#before_harvest_pic_2').attr('src', e.target.result);
//            }
//
//            reader.readAsDataURL(input.files[0]);
//        }
//    }
//    function readURL3(input)
//    {
//        if (input.files && input.files[0])
//        {
//            var reader = new FileReader();
//
//            reader.onload = function ( e )
//            {
//                $('#before_harvest_pic_3').attr('src', e.target.result);
//            }
//
//            reader.readAsDataURL(input.files[0]);
//        }
//    }
//    function readURL4(input)
//    {
//        if (input.files && input.files[0])
//        {
//            var reader = new FileReader();
//
//            reader.onload = function ( e )
//            {
//                $('#after_harvest_single_1').attr('src', e.target.result);
//            }
//
//            reader.readAsDataURL(input.files[0]);
//        }
//    }
//    function readURL5(input)
//    {
//        if (input.files && input.files[0])
//        {
//            var reader = new FileReader();
//
//            reader.onload = function ( e )
//            {
//                $('#after_harvest_single_2').attr('src', e.target.result);
//            }
//
//            reader.readAsDataURL(input.files[0]);
//        }
//    }
//    function readURL6(input)
//    {
//        if (input.files && input.files[0])
//        {
//            var reader = new FileReader();
//
//            reader.onload = function ( e )
//            {
//                $('#after_harvest_single_3').attr('src', e.target.result);
//            }
//
//            reader.readAsDataURL(input.files[0]);
//        }
//    }
//    function readURL7(input)
//    {
//        if (input.files && input.files[0])
//        {
//            var reader = new FileReader();
//
//            reader.onload = function ( e )
//            {
//                $('#after_harvest_several_1').attr('src', e.target.result);
//            }
//
//            reader.readAsDataURL(input.files[0]);
//        }
//    }
//    function readURL8(input)
//    {
//        if (input.files && input.files[0])
//        {
//            var reader = new FileReader();
//
//            reader.onload = function ( e )
//            {
//                $('#after_harvest_several_2').attr('src', e.target.result);
//            }
//
//            reader.readAsDataURL(input.files[0]);
//        }
//    }
//    function readURL9(input)
//    {
//        if (input.files && input.files[0])
//        {
//            var reader = new FileReader();
//
//            reader.onload = function ( e )
//            {
//                $('#after_harvest_cut_1').attr('src', e.target.result);
//            }
//
//            reader.readAsDataURL(input.files[0]);
//        }
//    }
//    function readURL10(input)
//    {
//        if (input.files && input.files[0])
//        {
//            var reader = new FileReader();
//
//            reader.onload = function ( e )
//            {
//                $('#after_harvest_cut_2').attr('src', e.target.result);
//            }
//
//            reader.readAsDataURL(input.files[0]);
//        }
//    }
//    function readURL11(input)
//    {
//        if (input.files && input.files[0])
//        {
//            var reader = new FileReader();
//
//            reader.onload = function ( e )
//            {
//                $('#after_harvest_cut_3').attr('src', e.target.result);
//            }
//
//            reader.readAsDataURL(input.files[0]);
//        }
//    }


    ///// image view end

    jQuery(document).ready(function()
    {
        $(".form_valid").validationEngine();

    });



</script>