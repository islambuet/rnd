<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    $data["link_new"]=base_url()."create_crop_variety/index/add";
    $data["link_back"]=base_url()."create_crop_variety";
    $this->load->view("action_buttons_edit",$data);

$newarray=array();

foreach($seasonInfo as $result)
{
    $newarray[]=$result['season_id'];
}

?>
<form class="form_valid" id="save_form" action="<?php base_url()?>create_crop_variety/index/save" method="post">
    <div class="row widget">
        <div class="widget-header">
            <div class="title">
                <?php echo $title; ?>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_CROP');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <select name="crop_select" id="crop_select" class="form-control validate[required]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php
                    foreach($crops as $crop)
                    {?>
                        <option value="<?php echo $crop['id']?>" <?php if($crop['id']==$varietyInfo['crop_id']){ echo "selected";}?>><?php echo $crop['crop_name'];?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <input type="hidden" name="variety_id" id="variety_id" value="<?php echo $varietyInfo['id'];?>"/>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_PRODUCT_TYPE');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <select name="crop_type" id="crop_type" class="form-control validate[required]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php
                    foreach($cropTypes as $ctypes)
                    {
                    ?>
                        <option value="<?php echo $ctypes['id']?>" <?php if($ctypes['id']==$varietyInfo['product_type_id']){ echo 'selected';}?>><?php echo $ctypes['product_type'];?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_PRINCIPAL_NAME');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <select name="principal_id" id="principal_id" class="form-control validate[required]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php
                    foreach($principals as $principal)
                    {?>
                        <option value="<?php echo $principal['id']?>" <?php if($principal['id']==$varietyInfo['principal_id']){ echo 'selected';}?>><?php echo $principal['principal_name'];?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_VARIETY_NAME');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="variety_name" id="variety_name" class="form-control validate[required]" value="<?php echo $varietyInfo['variety_name'];?>" >
            </div>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_FLOWERING_TYPE');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="radio" name="flowering_type" id="flowering_type" <?php if($varietyInfo['flowering_type_id']==$this->config->item('rnd_fruit_code')){ echo 'checked';}?> class="validate[required]" checked value="<?php echo $this->config->item('rnd_fruit_code');?>"> <?php echo $this->lang->line('LABEL_FRUIT');?>
                <input type="radio" name="flowering_type" id="flowering_type" <?php if($varietyInfo['flowering_type_id']==$this->config->item('rnd_curt_code')){ echo 'checked';}?> class="validate[required]" value="<?php echo $this->config->item('rnd_curt_code');?>"> <?php echo $this->lang->line('LABEL_CURT');?>
                <input type="radio" name="flowering_type" id="flowering_type" <?php if($varietyInfo['flowering_type_id']==$this->config->item('rnd_root_code')){ echo 'checked';}?> class="validate[required]" value="<?php echo $this->config->item('rnd_root_code');?>"> <?php echo $this->lang->line('LABEL_ROOT');?>
                <input type="radio" name="flowering_type" id="flowering_type" <?php if($varietyInfo['flowering_type_id']==$this->config->item('rnd_leaf_code')){ echo 'checked';}?> class="validate[required]" value="<?php echo $this->config->item('rnd_leaf_code');?>"> <?php echo $this->lang->line('LABEL_LEAF');?>
            </div>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_VARIETY_TYPE');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="radio" name="variety_type" id="variety_type_arm" <?php if($varietyInfo['variety_type']==$this->config->item('variety_type_arm')){ echo 'checked';}?> class="validate[required]" checked value="<?php echo $this->config->item('variety_type_arm');?>"> <?php echo $this->lang->line('LABEL_CHECK_VARIETY_ARM');?>
                <input type="radio" name="variety_type" id="variety_type_competitor" <?php if($varietyInfo['variety_type']==$this->config->item('variety_type_company')){ echo 'checked';}?> class="validate[required]" value="<?php echo $this->config->item('variety_type_company');?>"> <?php echo $this->lang->line('LABEL_COMPETITOR_VARIETY');?>
            </div>
        </div>

        <div class="row show-grid hiddenCompany" id="competitor_div">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_COMPANY_NAME');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="company_name" id="company_name" class="form-control" value="<?php echo $varietyInfo['company_name'];?>">
            </div>
        </div>

        <div class="row show-grid" id="season_div">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_SEASON');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <?php
                foreach($seasons as $season)
                {
                ?>
                    <input type="checkbox" name="season[]" id="season" class="validate[required]" value="<?php echo $season['id'];?>" <?php if(in_array($season['id'],$newarray)){ echo "checked";}?>> <?php echo $season['season_name'];?>
                <?php
                }
                ?>
            </div>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('STATUS');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <select name="status" id="status" class="form-control validate[required]">
                    <option value="<?php echo $this->config->item('active');?>" <?php if($this->config->item('active')==$varietyInfo['status']){ echo "selected";}?>><?php echo $this->lang->line('ACTIVE');?></option>
                    <option value="<?php echo $this->config->item('inactive');?>" <?php if($this->config->item('inactive')==$varietyInfo['status']){ echo "selected";}?>><?php echo $this->lang->line('INACTIVE');?></option>
                </select>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</form>

<style>
    .hiddenCompany
    {
       display: none;
    }
</style>

<script type="text/javascript">

    jQuery(document).ready(function()
    {
        $(".form_valid").validationEngine();

    });

    $(document).on("change", "#variety_type_competitor", function(event)
    {
        if( $(this).is(':checked') )
        {
            $("#competitor_div").removeClass('hiddenCompany');
        }
    });

    $(document).on("change", "#variety_type_arm", function(event)
    {
        if( $(this).is(':checked') )
        {
            $("#competitor_div").addClass('hiddenCompany');
        }

    });

    $(document).on("change", "#crop_select", function(event)
    {
        var crop_id = $("#crop_select").val();
        var product_type_id = '<?php echo $varietyInfo['product_type_id'];?>';
        $.ajax({
            url: base_url+"rnd_common/dropDown_crop_type_by_name/",
            type: 'POST',
            dataType: "JSON",
            data:{crop_id:crop_id,product_type_id:product_type_id},
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