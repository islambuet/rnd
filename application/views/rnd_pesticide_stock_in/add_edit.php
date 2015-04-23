<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$data["link_back"]=base_url()."rnd_pesticide_stock_in";
$this->load->view("action_buttons_edit",$data);

//echo '<pre>';
//print_r($feriliser_info);
//echo '</pre>';
?>
<form class="form_valid" id="save_form" action="<?php echo base_url()?>rnd_pesticide_stock_in/index/save" method="post">
    <input type="hidden" name="stock_in_id" id="stock_in_id" value="<?php echo $pesticide_info['id'];?>"/>
    <div class="row widget">
        <div class="widget-header">
            <div class="title">
                <?php echo $title; ?>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_PESTICIDE');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <select name="pesticide_id" id="pesticide_id" class="form-control validate[required]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php
                    foreach($pesticides as $pesticide)
                    {
                        ?>
                        <option value="<?php echo $pesticide['id']?>"><?php echo $pesticide['pesticide_name'];?></option>
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
                <input type="text" name="pesticide_quantity" id="pesticide_quantity" class="form-control validate[required]" value="<?php echo $pesticide_info['pesticide_quantity'];?>" >
            </div>
        </div>
        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_PRICE_STOCK_IN');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="pesticide_price" id="pesticide_price" class="form-control validate[required, custom[number]]" value="<?php echo $pesticide_info['pesticide_price'];?>" >
            </div>
        </div>
        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_STOCK_IN_DATE');?></label>
            </div>
            <div class="col-xs-4">
                <input type="text" name="stock_in_date" id="stock_in_date" class="form-control" value="">
            </div>
        </div>



    </div>
    <div class="clearfix"></div>
</form>
<script type="text/javascript">

    jQuery(document).ready(function()
    {
        //$(".form_valid").validationEngine();
        $( "#stock_in_date" ).datepicker({dateFormat : display_date_format});

    });
</script>