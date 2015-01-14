<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
$data["link_new"]= base_url()."rnd_feriliser_stock_out/index/add";
$data["link_back"]=base_url()."rnd_feriliser_stock_out";
$this->load->view("action_buttons_edit",$data);

?>
<form class="form_valid" id="save_form" action="<?php base_url()?>rnd_feriliser_stock_out/index/save" method="post">
    <div class="row widget">
        <div class="widget-header">
            <div class="title">
                <?php echo $title; ?>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_SEASON');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <select name="season_id" id="fertilizer_season_id" class="form-control validate[required]" <?php if(!empty($feriliserInfo['season_id'])){ echo "disabled";}?>>
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php
                    foreach($seasons as $season)
                    {?>
                        <option value="<?php echo $season['id']?>" <?php if($season['id']==$feriliserInfo['season_id']){ echo "selected";}?>><?php echo $season['season_name'];?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <input type="hidden" name="feriliser_stock_out_id" id="feriliser_stock_out_id" value="<?php echo $feriliserInfo['id'];?>"/>
        </div>



        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_CROP');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <select name="crop_id" id="fertilizer_crop_id" class="form-control validate[required]" <?php if(!empty($feriliserInfo['crop_id'])){ echo "disabled";}?> <?php if(!empty($feriliserInfo['crop_id'])){ echo "disabled";}?>>
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php
                    foreach($crops as $crop)
                    {?>
                        <option value="<?php echo $crop['id']?>" <?php if($crop['id']==$feriliserInfo['crop_id']){ echo "selected";}?>><?php echo $crop['crop_name'];?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>

        </div>




        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_PESTICIDE_RND');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <select name="feriliser_out_rnd" id="fertilizer_out_rnd" class="form-control validate[required]" <?php if(!empty($feriliserInfo['rnd_code_id'])){ echo "disabled";}?>>
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php
                    $rndCodes = System_helper::get_rnd_codes();
                    foreach($rndCodes as $rndCode)
                    {
                        ?>
                        <option value="<?php echo $rndCode['id']?>" <?php if ($rndCode['id']== $feriliserInfo['rnd_code_id']){ echo 'selected';}?>><?php echo $rndCode['rnd_code'];?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>

        </div>
        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_FERTILIZER_NAME');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <select name="feriliser_in" id="feriliser_out" class="form-control validate[required]">
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

        </div>
        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_QUANTITY_STOCK_IN');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="feriliser_out_quantity" id="feriliser_out_quantity" class="form-control validate[required]" value="<?php echo $feriliserInfo['fertilizer_quantity'];?>" >
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