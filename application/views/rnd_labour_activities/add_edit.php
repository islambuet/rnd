<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
$data["link_new"]= base_url()."rnd_labour_activities/index/add";
$data["link_back"]=base_url()."rnd_labour_activities";
$this->load->view("action_buttons_edit",$data);

?>
<form class="form_valid" id="save_form" action="<?php base_url()?>rnd_labour_activities/index/save" method="post">
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
                <select name="labour_crop" id="labour_crop" class="form-control validate[required]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php

                    foreach($crops as $crop)
                    {
                        ?>
                        <option value="<?php echo $crop['id']?>" <?php if ($crop['id']== $pesticideInfo['crop_id']){ echo 'selected';}?>><?php echo $crop['crop_name'];?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <input type="hidden" name="labour_activity_id" id="labour_activity_id" value="<?php echo $pesticideInfo['id'];?>"/>
        </div>
        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_PRODUCT_TYPE');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <select name="labour_activity_product" id="labour_activity_product" class="form-control validate[required]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php
                    foreach($product_types as $product_type)
                    {
                        ?>
                        <option value="<?php echo $product_type['id']?>" <?php if ($product_type['id']== $pesticideInfo['product_type_id']){ echo 'selected';}?>><?php echo $product_type['product_type'];?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>

        </div>
        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_LABOUR_ACTIVITY');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <select name="labour_activity_name" id="labour_activity_name" class="form-control validate[required]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php
                    foreach($activity_names as $activity_name)
                    {
                        ?>
                        <option value="<?php echo $activity_name['id']?>" <?php if ($activity_name['id']== $pesticideInfo['labor_activity_name_id']){ echo 'selected';}?>><?php echo $activity_name['labor_activity_name'];?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>

        </div>
        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_DATE');?></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="labour_activity_date" id="labour_activity_date" class="form-control validate[required]" value="<?php echo date('d-m-Y',$pesticideInfo['activity_date']);?>" placeholder="Date" >
            </div>
        </div>
        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_LABOUR_QUANTITY');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="labour_activity_quantity" id="labour_activity_quantity" class="form-control validate[required]" value="<?php echo $pesticideInfo['number_of_labor'];?>" placeholder="Number of Labour">
            </div>
        </div>
        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_REMARKS');?></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <textarea rows="4" cols="50" name="labour_remark" id="labour_remark" class="form-control validate[required]" placeholder="Remark's"><?php echo $pesticideInfo['remark'];?>
                </textarea>
            </div>
        </div>



    </div>
    <div class="clearfix"></div>
</form>


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