<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
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
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_SEASON');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <select name="season_id" id="season_id" class="form-control validate[required]" <?php if(!empty($pesticideInfo['season_id'])){ echo "disabled";}?>>
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php
                    foreach($seasons as $season)
                    {?>
                        <option value="<?php echo $season['id']?>" <?php if($season['id']==$pesticideInfo['season_id']){ echo "selected";}?>><?php echo $season['season_name'];?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <input type="hidden" name="pesticide_stock_out_id" id="pesticide_stock_out_id" value="<?php echo $pesticideInfo['id'];?>"/>
        </div>



        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_CROP');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <select name="crop_id" id="crop_id" class="form-control validate[required]" <?php if(!empty($pesticideInfo['crop_id'])){ echo "disabled";}?>>
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php
                    foreach($crops as $crop)
                    {?>
                        <option value="<?php echo $crop['id']?>" <?php if($crop['id']==$pesticideInfo['crop_id']){ echo "selected";}?>><?php echo $crop['crop_name'];?></option>
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
                <select name="pesticide_out_rnd" id="pesticide_out_rnd" class="form-control validate[required]" <?php if(!empty($pesticideInfo['rnd_code_id'])){ echo "disabled";}?>>
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php
                    $rndCodes = System_helper::get_rnd_codes();
                    foreach($rndCodes as $rndCode)
                    {
                        ?>
                        <option value="<?php echo $rndCode['id']?>" <?php if ($rndCode['id']== $pesticideInfo['rnd_code_id']){ echo 'selected';}?>><?php echo $rndCode['rnd_code'];?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>

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

        </div>
        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_QUANTITY_STOCK_IN');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="pesticide_out_quantity" id="pesticide_out_quantity" class="form-control validate[required]" value="<?php echo $pesticideInfo['pesticide_quantity'];?>" >
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

    $(document).on("change", "#season_id", function(event)
    {
        var season_id = $("#season_id").val();
        //var crop_selected = '<?php //echo $pesticideInfo['crop_id'];?>';
        $.ajax({
            url: base_url+"rnd_common/dropDown_crop_by_season/",
            type: 'POST',
            dataType: "JSON",
            data:{season_id:season_id},
            success: function (data, status)
            {

            },
            error: function (xhr, desc, err)
            {
                console.log("error");

            }
        });

    });

    $(document).on("change", "#crop_id", function(event)
    {
        var crop_id = $("#crop_id").val();
       //var selected = '<?php //echo $pesticideInfo['pesticide_out_rnd'];?>';
        $.ajax({
            url: base_url+"rnd_common/dropDown_rnd_code_by_crop_name/",
            type: 'POST',
            dataType: "JSON",
            data:{crop_id:crop_id},
            success: function (data, status)
            {

            },
            error: function (xhr, desc, err)
            {
                console.log("error");
            }
        });

    });



</script>