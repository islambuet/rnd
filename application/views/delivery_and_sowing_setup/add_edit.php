<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    $data["link_new"]=base_url()."delivery_and_sowing_setup/index/add";
    $data["link_back"]=base_url()."delivery_and_sowing_setup";
    $this->load->view("action_buttons_edit",$data);

//echo '<pre>';
//print_r($deliveryInfo);
//echo '</pre>';

?>
<form class="form_valid" id="save_form" action="<?php echo base_url();?>delivery_and_sowing_setup/index/save" method="post">
    <input type="hidden" name="delivery_id" value="<?php echo $deliveryInfo['id']?>">
    <div class="row widget">
        <div class="widget-header">
            <div class="title">
                <?php echo $title; ?>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_YEAR');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-xs-4">

                <select name="year" class="form-control validate[required]" <?php if(!empty($deliveryInfo['year'])){echo 'disabled';}?>>
                    <?php
                    $current_year=date("Y",time());
                    for($i=$this->config->item("start_year");$i<=($current_year+$this->config->item("next_year_range"));$i++)
                    {?>
                        <option value="<?php echo $i;?>" <?php if($i==$deliveryInfo['year']){echo 'selected';}?>><?php echo $i;?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_SEASON');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-xs-4">
                <select name="season_id" id="season_id" class="form-control validate[required]" <?php if(!empty($deliveryInfo['season_id'])){echo 'disabled';}?>>
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php
                    foreach($seasons as $season)
                    {?>
                        <option value="<?php echo $season['id']?>" <?php if($season['id']==$deliveryInfo['season_id']){echo 'selected';}?>><?php echo $season['season_name'];?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_CROP');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-xs-4">
                <select name="crop_id" id="crop_id" class="form-control validate[required]" <?php if(!empty($deliveryInfo['crop_id'])){echo 'disabled';}?>>
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php
                    foreach($crops as $crop)
                    {?>
                        <option value="<?php echo $crop['id'];?>" <?php if($crop['id']==$deliveryInfo['crop_id']){echo 'selected';}?>><?php echo $crop['crop_name'];?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_ESTIMATED_DELIVERY_DATE');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-xs-4">
                <input type="text" name="estimated_delivery_date" id="estimated_delivery_date" class="form-control" value="<?php if(!empty($deliveryInfo['estimated_delivery_date'])){echo System_helper::display_date($deliveryInfo['estimated_delivery_date']);}?>">
            </div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_DELIVERY_DATE');?></label>
            </div>
            <div class="col-xs-4">
                <input type="text" name="delivery_date" id="delivery_date" class="form-control" value="<?php if($deliveryInfo['delivery_date']){ echo System_helper::display_date($deliveryInfo['delivery_date']);}?>">
            </div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_ESTIMATED_RECEIVE_DATE');?></label>
            </div>
            <div class="col-xs-4">
                <input type="text" name="estimated_receive_date" id="estimated_receive_date" class="form-control" value="<?php if(!empty($deliveryInfo['estimated_receive_date'])){ echo System_helper::display_date($deliveryInfo['estimated_receive_date']);}?>">
            </div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_RECEIVE_DATE');?></label>
            </div>
            <div class="col-xs-4">
                <input type="text" name="receive_date" id="receive_date" class="form-control" value="<?php if(!empty($deliveryInfo['receive_date'])){echo System_helper::display_date($deliveryInfo['receive_date']);}?>">
            </div>
        </div>

        <?php
        if(!empty($deliveryInfo['delivery_date']))
        {
            ?>
        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SOWING');?></label>
            </div>
            <div class="col-xs-8">
                <input type="checkbox" name="sowing_status" id="sowing_status" <?php if($deliveryInfo['sowing_status']==1){ echo 'checked';}?> value="1">
            </div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SOWING_DATE');?></label>
            </div>
            <div class="col-xs-4">
                <input type="text" name="sowing_date" id="sowing_date" class="form-control" value="<?php if(!empty($deliveryInfo['sowing_date'])){ echo System_helper::display_date($deliveryInfo['sowing_date']);}?>">
            </div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SEASON_END');?></label>
            </div>
            <div class="col-xs-8">
                <input type="checkbox" name="season_end_status" id="season_end_status" <?php if($deliveryInfo['season_end_status']==1){ echo 'checked';}?> value="1">
            </div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SEASON_END_DATE');?></label>
            </div>
            <div class="col-xs-4">
                <input type="text" name="season_end_date" id="season_end_date" class="form-control" value="<?php if(!empty($deliveryInfo['season_end_date'])){ echo System_helper::display_date($deliveryInfo['season_end_date']);}?>">
            </div>
        </div>
        <?php
        }
        ?>


    </div>

    <div class="clearfix"></div>
</form>
<script type="text/javascript">

    jQuery(document).ready(function()
    {
        $( "#estimated_delivery_date" ).datepicker();
        $( "#delivery_date" ).datepicker();
        $( "#estimated_receive_date" ).datepicker();
        $( "#receive_date" ).datepicker();
        $( "#sowing_date" ).datepicker();
        $( "#season_end_date" ).datepicker();

//        $(".form_valid").validationEngine();

    });


</script>