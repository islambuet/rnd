<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    $data["link_new"]=base_url()."create_crop/index/add";
    $data["link_back"]=base_url()."create_crop";
    $this->load->view("action_buttons_edit",$data);

//echo '<pre>';
//print_r($cropInfo);
//echo '</pre>';
?>
<form class="form_valid" id="save_form" action="<?php echo base_url();?>create_crop/index/save" method="post">
    <div class="row widget">
        <div class="widget-header">
            <div class="title">
                <?php echo $title; ?>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_CROP_NAME');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="crop_name" id="crop_name" class="form-control validate[required]" value=""/>
            </div>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_CROP_CODE');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="crop_code" id="crop_code" class="form-control validate[required]" value="" >
            </div>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_CROP_WIDTH');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="crop_width" id="crop_width" class="form-control validate[required, custom[number]]" value="" >
            </div>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_CROP_HEIGHT');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="crop_height" id="crop_height" class="form-control validate[required, custom[number]]" value="" >
            </div>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_FLOWERING_TYPE');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <?php
                    foreach($this->config->item('fruit_type') as $val=>$fruit)
                    {
                        ?>
                            <input type="radio" name="fruit_type" class="validate[required]" value="<?php echo $val;?>"> <?php echo $fruit;?>
                        <?php
                    }
                ?>
            </div>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SAMPLE_SIZE_RND');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="sample_size" id="sample_size" class="form-control validate[required, custom[number]]" value="" />
            </div>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_INITIAL_PLANTS');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="initial_plants" id="initial_plants" class="form-control validate[required, custom[number]]" value="" />
            </div>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_PLANTS_PER_HECTARE');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="plants_per_hectare" id="plants_per_hectare" class="form-control validate[required, custom[number]]" value="" />
            </div>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_OPTIMUM_TRANSPLANTING_DATE');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="optimum_transplanting_days" id="optimum_transplanting_days" class="form-control validate[required, custom[number]]" value="" />
            </div>
        </div>
    </div>

    <div class="clearfix"></div>
</form>
<script type="text/javascript">

    jQuery(document).ready(function()
    {
        turn_off_triggers();
        $(".form_valid").validationEngine();

    });
</script>