<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    $data["link_new"]=base_url()."rnd_feriliser_requirement/index/add";
    $data["link_back"]=base_url()."rnd_feriliser_requirement";
    $this->load->view("action_buttons_edit",$data);

?>
<form class="form_valid" id="save_form" action="<?php echo base_url()?>rnd_feriliser_requirement/index/save" method="post">
    <input type="hidden" name="row_elm_id" id="row_elm_id" value="<?php echo $row_info['id'];?>" />
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
                <select name="fertilizer_id" id="fertilizer_id" class="form-control validate[required]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php
                        foreach($fertilizers as $fertilizer)
                        {
                            ?>
                        <option value="<?php echo $fertilizer['id']?>" <?php if($fertilizer['id']==$row_info['fertilizer_id']){ echo "selected";}?>><?php echo $fertilizer['fertilizer_name'];?></option>
                        <?php
                        }
                    ?>
                </select>
            </div>

        </div>
        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_BED');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <select name="seed_bed_id" id="seed_bed_id" class="form-control validate[required]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php
                        foreach($seedbeds as $seedbed)
                        {
                        ?>
                        <option value="<?php echo $seedbed['id'];?>" <?php if($seedbed['id']==$row_info['seed_bed_id']){ echo "selected";}?>><?php echo $seedbed['seed_bed'];?></option>
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
                <input type="text" name="fertilizer_quantity" id="fertilizer_quantity" class="form-control validate[required, custom[number]]" value="<?php echo $row_info['fertilizer_quantity'];?>" >
            </div>
        </div>
        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_PRICE');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="fertilizer_price" id="fertilizer_price" class="form-control validate[required, custom[number]]" value="<?php echo $row_info['fertilizer_price'];?>" >
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