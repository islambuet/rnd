<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    $data["link_new"]=base_url()."rnd_feriliser_stock_in/index/add";
    $data["link_back"]=base_url()."rnd_feriliser_stock_in";
    $this->load->view("action_buttons_edit",$data);

//echo '<pre>';
//print_r($feriliser_info);
//echo '</pre>';
?>
<form class="form_valid" id="save_form" action="<?php echo base_url()?>rnd_feriliser_stock_in/index/save" method="post">
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
                <select name="feriliser_in" id="feriliser_in" class="form-control validate[required]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php
                    foreach($feriliser_info as $feriliser_in)
                    {
                        ?>
                        <option value="<?php echo $feriliser_in['id']?>" <?php if ($feriliser_in['id']== $feriliserInfo['fertilizer_id']){ echo 'selected';}?>><?php echo $feriliser_in['fertilizer_name'];?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <input type="hidden" name="feriliser_stock_in_id" id="feriliser_stock_in_id" value="<?php echo $feriliserInfo['id'];?>"/>
        </div>
        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_QUANTITY_STOCK_IN');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="feriliser_in_quantity" id="feriliser_in_quantity" class="form-control validate[required]" value="<?php echo $feriliserInfo['fertilizer_quantity'];?>" >
            </div>
        </div>
        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_PRICE_STOCK_IN');?></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="feriliser_in_price" id="feriliser_in_price" class="form-control validate[required, custom[number]]" value="<?php echo $feriliserInfo['fertilizer_price'];?>" >
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