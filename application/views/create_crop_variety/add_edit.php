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
                <select name="year" class="form-control validate[required]">
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
                <select name="crop_id" id="crop_id" class="form-control validate[required]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php
                    foreach($crops as $crop)
                    {?>
                        <option value="<?php echo $crop['id']?>"><?php echo $crop['crop_name'];?></option>
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
                <select name="crop_type_id" id="crop_type_id" class="form-control validate[required]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
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
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_VARIETY_TYPE');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-3 col-xs-2">
                <?php
                    foreach($this->config->item("variety_type") as $val=>$variety_types)
                    {
                        ?>
                            <input type="radio" name="variety_type" <?php if($varietyInfo['variety_type']==$val){ echo 'checked';}?> class="validate[required]" value="<?php echo $val;?>"> <?php echo $this->lang->line($variety_types);?><br>
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
                <select name="principal_id" class="form-control validate[required]">
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
                <input type="text" name="company_name" id="company_name" class="form-control" value="<?php echo $varietyInfo['company_name'];?>">
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
                ?>
                    <input type="checkbox" name="season[]" class="validate[required]" value="<?php echo $season['id'];?>"> <?php echo $season['season_name'];?><br>
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
                <input type="text" name="number_of_seeds" class="form-control validate[required, custom[number]]" value="<?php echo $varietyInfo['number_of_seeds'];?>" >
            </div>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_QUANTITY_IN_GRAM');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="quantity" class="form-control validate[required, custom[number]]" value="<?php echo $varietyInfo['quantity'];?>" >
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
                <input type="checkbox" name="replica_status" class="validate[required]" value="1" <?php if($varietyInfo["replica_status"]==1) echo "checked";?>>
            </div>
        </div>

    </div>
    <div class="clearfix"></div>
</form>


<script type="text/javascript">

    jQuery(document).ready(function()
    {
        //$(".form_valid").validationEngine();
        $(document).off("change","#crop_id");
        $(document).on("change","#crop_id",function()
        {
            var crop_id=$(this).val();


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
        });
        $(document).off("change",'input[name="variety_type"]:radio');
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