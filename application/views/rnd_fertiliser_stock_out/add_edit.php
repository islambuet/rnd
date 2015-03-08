<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$data["link_back"]=base_url()."rnd_fertiliser_stock_out";
$this->load->view("action_buttons_edit",$data);

//echo '<pre>';
//print_r($feriliser_info);
//echo '</pre>';
?>
<form class="form_valid" id="save_form" action="<?php echo base_url()?>rnd_fertiliser_stock_out/index/save" method="post">
    <input type="hidden" name="stock_out_id" id="stock_out_id" value="<?php echo $fertiliserInfo['id'];?>"/>
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
                <select name="fertiliser_id" id="fertiliser_id" class="form-control validate[required]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php
                    foreach($fertilisers as $fertiliser)
                    {
                        ?>
                        <option value="<?php echo $fertiliser['id']?>" <?php if ($fertiliser['id']== $fertiliserInfo['fertilizer_id']){ echo 'selected';}?>><?php echo $fertiliser['fertilizer_name'];?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>

        </div>
        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_QUANTITY_STOCK_IN');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="fertilizer_quantity" id="fertilizer_quantity" class="form-control validate[required]" value="<?php echo $fertiliserInfo['fertilizer_quantity'];?>" >
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