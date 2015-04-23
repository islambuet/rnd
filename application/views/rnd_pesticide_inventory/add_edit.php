<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$data["link_back"]=base_url()."rnd_pesticide_inventory";
$this->load->view("action_buttons_edit",$data);

//echo '<pre>';
//print_r($feriliser_info);
//echo '</pre>';
?>
<form class="form_valid" id="save_form" action="<?php echo base_url()?>rnd_pesticide_inventory/index/save" method="post">

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
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_INVENTORY_TYPE');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <select name="inventory_type" id="inventory_type" class="form-control validate[required]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <option value="1"><?php echo $this->lang->line('LABEL_STOCK_IN');?></option>
                    <option value="2"><?php echo $this->lang->line('LABEL_STOCK_OUT');?></option>

                </select>
            </div>
        </div>
        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_QUANTITY_STOCK_IN');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="pesticide_quantity" id="pesticide_quantity" class="form-control validate[required]" value="" >
            </div>
        </div>
        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_INVENTORY_DATE');?></label>
            </div>
            <div class="col-xs-4">
                <input type="text" name="inventory_date" id="inventory_date" class="form-control" value="">
            </div>
        </div>
        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_REMARKS');?></label>
            </div>
            <div class="col-xs-4">
                <textarea class="form-control" name="remarks"></textarea>
            </div>
        </div>



    </div>
    <div class="clearfix"></div>
</form>
<script type="text/javascript">

    jQuery(document).ready(function()
    {
        //$(".form_valid").validationEngine();
        $( "#inventory_date" ).datepicker({dateFormat : display_date_format});

    });
</script>