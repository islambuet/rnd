<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    $data["link_new"]=base_url()."rnd_feriliser_requirement/index/add";
    $data["link_back"]=base_url()."rnd_feriliser_requirement";
    $this->load->view("action_buttons_edit",$data);

//echo '<pre>';
//print_r($cropInfo);
//echo '</pre>';
?>
<form class="form_valid" id="save_form" action="<?php base_url()?>create_crop/index/save" method="post">
    <div class="row widget">
        <div class="widget-header">
            <div class="title">
                <?php echo $title; ?>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_FERTILIZER');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <select name="fertilizer" id="fertilizer" class="form-control validate[required]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php
                    foreach($fertilizers as $fertilizer)
                    {
                        ?>
                    <option value="<?php echo $fertilizer['id']?>"><?php echo $fertilizer['fertilizer_name'];?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <input type="hidden" name="requirement_id" id="requirement_id" value="<?php echo $fertilizer['id'];?>"/>
        </div>
        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_BED');?></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <select name="seedbed" id="seedbed" class="form-control validate[required]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php
                    foreach($seedbeds as $seedbed){
                                                ?>
                    <option value="<?php echo $seedbed['id'];?>"><?php echo $seedbed['seed_bed'];?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_QUANTITY');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="quantity" id="quantity" class="form-control validate[required, custom[number]]" value="<?php echo $cropInfo['crop_width'];?>" >
            </div>
        </div>
        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_PRICE');?></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="price" id="crop_height" class="form-control validate[required, custom[number]]" value="<?php echo $cropInfo['crop_height'];?>" >
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
</script>