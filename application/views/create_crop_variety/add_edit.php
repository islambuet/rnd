<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    $data["link_new"]=base_url()."create_crop_variety/index/add";
    $data["link_back"]=base_url()."create_crop_variety";
    $this->load->view("action_buttons_edit",$data);
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
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_YEAR');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">

                <select name="year" class="form-control validate[required]" <?php if($varietyInfo['id']>0){echo "disabled";} ?>>
                    <?php
                    $current_year=date("Y",time());

                    for($i=$this->config->item("start_year");$i<=($current_year+$this->config->item("next_year_range"));$i++)
                    {?>
                        <option value="<?php echo $i;?>" <?php if($i==$varietyInfo['year']){ echo "selected";}?>><?php echo $i;?></option>
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
            <div class="col-sm-4 col-xs-8">
                <select name="crop_id" id="crop_id" class="form-control validate[required]" <?php if($varietyInfo['id']>0){echo "disabled";} ?>>
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
                <select name="crop_type_id" id="crop_type_id" class="form-control validate[required]" <?php if($varietyInfo['id']>0){echo "disabled";} ?>>
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php
                    foreach($cropTypes as $ct)
                    {?>
                        <option value="<?php echo $ct['id']?>" <?php if($ct['id']==$varietyInfo['crop_type_id']){ echo "selected";}?>><?php echo $ct['type_name'];?></option>
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
                <input type="text" name="variety_name" id="variety_name" class="form-control validate[required]" value="<?php echo $varietyInfo['variety_name'];?>" <?php if($varietyInfo['id']>0){echo "disabled";}?>>
            </div>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_VARIETY_TYPE');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-3 col-xs-2">
                <?php
                    foreach($this->config->item("variety_type") as $val=>$variety_types)
                    {
                        ?>
                            <input type="radio" name="variety_type" <?php if($varietyInfo['variety_type']==$val){ echo 'checked';}?> class="validate[required]" value="<?php echo $val;?>" <?php if($varietyInfo['id']>0){echo "disabled";}?>> <?php echo $this->lang->line($variety_types);?><br>
                        <?php

                    }
                ?>

            </div>
        </div>

        <div class="row show-grid" id="principal_id_div" style="display: <?php if($varietyInfo['variety_type']==1){echo "block";}else{echo "none";} ?>">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_PRINCIPAL_NAME');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <select name="principal_id" class="form-control validate[required]" <?php if($varietyInfo['id']>0){echo "disabled";}?>>
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

        <div class="row show-grid" id="company_name_div" style="display: <?php if($varietyInfo['variety_type']==3){echo "block";}else{echo "none";} ?>">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_COMPANY_NAME');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <select name="company_name" id="company_name" class="form-control validate[required]" <?php if($varietyInfo['id']>0){echo "disabled";}?>>
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php
                    foreach($companies as $company)
                    {?>
                        <option value="<?php echo $company['id']?>" <?php if($company['id']==$varietyInfo['company_name']){ echo 'selected';}?>><?php echo $company['company_name'];?></option>
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
            <div class="col-sm-4 col-xs-8">
                <?php
                foreach($seasons as $season)
                {
                    $checked="";
                    $show=true;
                    if($varietyInfo['id']>0)
                    {
                        if(isset($seasonInfo[$season['id']]))
                        {
                            if($seasonInfo[$season['id']]['season_status']==1)
                            {
                                $checked=" checked";
                            }
                            if($seasonInfo[$season['id']]['sample_delivery_status']==1)
                            {
                                $show=false;
                            }

                        }
                        else
                        {
                            $show = false;
                        }

                    }
                    if($show)
                    {
                        ?>
                            <input type="checkbox" name="season[]" class="validate[required]" value="<?php echo $season['id'];?>"<?php echo $checked; ?> > <?php echo $season['season_name'];?><br>
                        <?php
                    }
                }
                ?>
            </div>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_EXPECTED_SEED_PER_GRAM');?></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <label id="expected_seed_per_gram" class="form-control"><?php echo $varietyInfo['number_of_seeds'];?></label>
            </div>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SEEDS_PER_GRAM');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="number_of_seeds" class="form-control validate[required, custom[number]]" value="<?php echo $varietyInfo['number_of_seeds'];?>" >
            </div>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_QUANTITY_IN_GRAM');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="quantity" class="form-control validate[required, custom[number]]" value="<?php echo $varietyInfo['quantity'];?>" <?php if($varietyInfo['id']>0){echo "disabled";}?> >
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
        <div class="row show-grid" id="season_div">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_REPLICA');?></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="checkbox" name="replica_status" class="" value="1" <?php if($varietyInfo["replica_status"]==1) echo "checked";?>  <?php if($varietyInfo['id']>0){echo "disabled";}?>>
            </div>
        </div>

    </div>
    <div class="clearfix"></div>
</form>


<script type="text/javascript">

    jQuery(document).ready(function()
    {
        //$(".form_valid").validationEngine();
        turn_off_triggers();
        $(document).on("change","#crop_id",function()
        {
            $("#crop_type_id").val("");
            $("#expected_seed_per_gram").val('');

            var crop_id=$(this).val();
            if(crop_id>0)
            {
                $.ajax({
                    url: base_url+"rnd_common/get_dropDown_cropType_by_cropId/",
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
            }
        });

        $(document).on("change","#crop_type_id",function()
        {
            var crop_id = $("#crop_id").val();
            var crop_type_id = $(this).val();

            if(crop_type_id>0 && crop_id>0)
            {
                $.ajax({
                    url: base_url+"create_crop_variety/get_expected_seed_per_gram_by_type/",
                    type: 'POST',
                    dataType: "JSON",
                    data:{crop_id:crop_id, crop_type_id:crop_type_id},
                    success: function (data, status)
                    {
                        if(data)
                        {
                            $("#expected_seed_per_gram").val(data)
                        }
                        else
                        {
                            $("#expected_seed_per_gram").val('');
                        }
                    },
                    error: function (xhr, desc, err)
                    {
                        console.log("error");
                    }
                });
            }
            else
            {
                $("#expected_seed_per_gram").val('');
            }
        });

        $(document).on("change",'input[name="variety_type"]:radio',function()
        {
            var variety_type=$(this).val();
            if(variety_type==1)
            {
                $("#principal_id_div").show();
                $("#company_name_div").hide();
            }
            else if(variety_type==2)
            {
                $("#principal_id_div").hide();
                $("#company_name_div").hide();
            }
            if(variety_type==3)
            {
                $("#principal_id_div").hide();
                $("#company_name_div").show();
            }

        });

    });

</script>