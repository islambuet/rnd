<?php if(!definded('BASEPATH')) exit('No direct script access allowed');
$data["link_new"]= base_url()."rnd_pesticide_stock_out/index/add";
$data["link_back"]=base_url()."rnd_pesticide_stock_out";
$this->load->view("action_buttons_edit",$data);

?>
<form class="form_valid" id="save_form" action="<?php base_url()?>rnd_pesticide_stock_out/index/save" method="post">
    <div class="row widget">
        <div class="widget-header">
            <div class="title">
                <?php echo $title; ?>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_PESTICIDE_STOCK_IN');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <select name="pesticide_in" id="pesticide_in" class="form-control validate[required]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php
                    foreach($pesticide_info as $pesticide_in)
                    {
                        ?>
                        <option value="<?php echo $pesticide_in['id']?>" <?php if ($pesticide_in['id']== $pesticideInfo['pesticide_id']){ echo 'selected';}?>><?php echo $pesticide_in['pesticide_name'];?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <input type="hidden" name="pesticide_stock_in_id" id="pesticide_stock_in_id" value="<?php echo $pesticideInfo['id'];?>"/>
        </div>
        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_QUANTITY_STOCK_IN');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="pesticide_out_quantity" id="pesticide_out_quantity" class="form-control validate[required]" value="<?php echo $pesticideInfo['pesticide_quantity'];?>" >
            </div>
        </div>
        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_PRICE_STOCK_IN');?></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="pesticide_out_price" id="pesticide_out_price" class="form-control validate[required, custom[number]]" value="<?php echo $pesticideInfo['pesticide_price'];?>" >
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