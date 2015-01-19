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
<form class="form_valid" id="save_form" action="<?php echo base_url();?>create_crop_variety/index/save" method="post">
    <input type="hidden" name="variety_id" id="variety_id" value="<?php echo $varietyInfo['id'];?>"/>
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
                <select name="variety_crop_select" id="variety_crop_select" class="form-control validate[required]" <?php if(!empty($varietyInfo['crop_id'])){ echo 'disabled';}?>>
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
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_PRODUCT_TYPE');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <select name="variety_crop_type" id="variety_crop_type" class="form-control validate[required]" <?php if(!empty($varietyInfo['product_type_id'])){ echo 'disabled';}?>>
                    <?php
                        $data=array();
                        $data["selected"]=$varietyInfo['product_type_id'];
                        foreach($cropTypes as $ctypes)
                        {
                            $data['value'][]=$ctypes['id'];
                            $data['name'][]=$ctypes['product_type'];
                        }
                        $this->load->view("dropdown",$data);
                    ?>
                </select>
            </div>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_VARIETY_TYPE');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-3 col-xs-2">
                <input type="radio" name="variety_type" id="variety_type_principal" <?php if(!empty($varietyInfo['variety_type'])){ echo "disabled";}?> <?php if($varietyInfo['variety_type']==$this->config->item('variety_type_principal')){ echo 'checked';}?> class="validate[required]" checked value="<?php echo $this->config->item('variety_type_principal');?>"> <?php echo $this->lang->line('LABEL_PRINCIPAL_VARIETY');?>
                <input type="radio" name="variety_type" id="variety_type_arm" <?php if(!empty($varietyInfo['variety_type'])){ echo "disabled";}?> <?php if($varietyInfo['variety_type']==$this->config->item('variety_type_arm')){ echo 'checked';}?> class="validate[required]" value="<?php echo $this->config->item('variety_type_arm');?>"> <?php echo $this->lang->line('LABEL_CHECK_VARIETY_ARM');?>
                <input type="radio" name="variety_type" id="variety_type_competitor" <?php if(!empty($varietyInfo['variety_type'])){ echo "disabled";}?> <?php if($varietyInfo['variety_type']==$this->config->item('variety_type_company')){ echo 'checked';}?> class="validate[required]" value="<?php echo $this->config->item('variety_type_company');?>"> <?php echo $this->lang->line('LABEL_COMPETITOR_VARIETY');?>
            </div>
        </div>

        <div class="row show-grid <?php if($varietyInfo['variety_type']!=$this->config->item('variety_type_company')){ echo 'hiddenCompany';}?>" id="competitor_div">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_COMPANY_NAME');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="company_name" id="company_name" class="form-control" value="<?php echo $varietyInfo['company_name'];?>">
            </div>
        </div>

        <div class="row show-grid <?php if(!empty($varietyInfo['variety_type'])){if($varietyInfo['variety_type']!=$this->config->item('variety_type_principal')){ echo 'hiddenPrincipal';}}?>" id="principal_div">
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
                <input type="text" name="variety_name" id="variety_name" class="form-control validate[required]" <?php if(!empty($varietyInfo['variety_name'])){ echo "disabled";}?> value="<?php echo $varietyInfo['variety_name'];?>" >
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
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SEEDS_PER_GRAM');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="seed_per_gram" id="seed_per_gram" class="form-control validate[required, custom[number]]" value="<?php echo $varietyInfo['number_of_seeds'];?>" >
            </div>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_QUANTITY_IN_GRAM');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="quantity_in_gram" id="quantity_in_gram" class="form-control validate[required, custom[number]]" value="<?php echo $varietyInfo['quantity'];?>" >
            </div>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_CHARACTERISTICS');?></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <textarea name="characteristics" id="characteristics" class="form-control"><?php echo $varietyInfo['characteristics'];?></textarea>
            </div>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="radio" name="new_old_status" <?php if($this->config->item('variety_new_code')==$varietyInfo['new_old_status']){ echo "checked";}?> value="<?php echo $this->config->item('variety_new_code');?>" /><?php echo $this->lang->line('LABEL_NEW');?>
                <input type="radio" name="new_old_status" <?php if($this->config->item('variety_old_code')==$varietyInfo['new_old_status']){ echo "checked";}?> value="<?php echo $this->config->item('variety_old_code');?>" /><?php echo $this->lang->line('LABEL_OLD');?>
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

    .hiddenPrincipal
    {
       display: none;
    }
</style>

<script type="text/javascript">

    jQuery(document).ready(function()
    {
        $(".form_valid").validationEngine();

    });

</script>