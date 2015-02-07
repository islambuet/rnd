<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    $data["link_new"]=base_url()."create_crop_type/index/add";
    $data["link_back"]=base_url()."create_crop_type";
    $this->load->view("action_buttons_edit",$data);

//echo '<pre>';
//print_r($typeInfo);
//echo '</pre>';
?>
<form class="form_valid" id="save_form" action="<?php echo base_url();?>create_crop_type/index/save" method="post">
    <input type="hidden" name="type_id" id="type_id" value="<?php echo $typeInfo['id'];?>"/>
    <div class="row widget">
        <div class="widget-header">
            <div class="title">
                <?php echo $title; ?>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_CROP');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <?php
                if(!$typeInfo['crop_id'])
                {
                ?>
                    <select name="crop_id" id="crop_id" class="form-control validate[required]">
                        <option value=""><?php echo $this->lang->line('SELECT');?></option>
                        <?php
                        foreach($crops as $crop)
                        {?>
                            <option value="<?php echo $crop['id']?>" <?php if($crop['id']==$typeInfo['crop_id']){ echo "selected";}?>><?php echo $crop['crop_name'];?></option>
                        <?php
                        }
                        ?>
                    </select>
                <?php
                }
                else
                {
                    ?>
                    <input type="text" class="form-control validate[required]" readonly value="<?php echo $typeInfo['crop_name']?>">
                    <input type="hidden" name="crop_id" class="form-control validate[required]" value="<?php echo $typeInfo['crop_id']?>">
                <?php
                }
                ?>
            </div>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_PRODUCT_TYPE');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="type_name" id="type_name" class="form-control validate[required]" <?php if(!empty($typeInfo['type_name'])){echo "readonly";}?> value="<?php echo $typeInfo['type_name'];?>" >
            </div>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_TYPE_CODE');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="type_code" id="type_code" class="form-control validate[required]" <?php if(!empty($typeInfo['type_code'])){echo "readonly";}?> value="<?php echo $typeInfo['type_code'];?>" >
            </div>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_TARGET_LENGTH');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="target_length" id="target_length" class="form-control validate[required, custom[number]]" value="<?php echo $typeInfo['terget_length'];?>" >
            </div>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_TARGET_WEIGHT');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="target_weight" id="target_weight" class="form-control validate[required, custom[number]]" value="<?php echo $typeInfo['terget_weight'];?>" >
            </div>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_TARGET_YIELD');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="target_yield" id="target_yield" class="form-control validate[required, custom[number]]" value="<?php echo $typeInfo['terget_yeild'];?>" >
            </div>
        </div>

    </div>
    <div class="clearfix"></div>
</form>

<script type="text/javascript">

    jQuery(document).ready(function()
    {
        $(".form_valid").validationEngine();
        turn_off_triggers();

    });
</script>