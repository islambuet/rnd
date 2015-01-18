<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
$data["link_new"]= base_url()."rnd_labour_activities/index/add";
$data["link_back"]=base_url()."rnd_labour_activities";
$this->load->view("action_buttons_edit",$data);

?>
<form class="form_valid" id="save_form" action="<?php base_url()?>rnd_labour_activities/index/save" method="post">
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
                <select name="season_id" id="labour_activity_season_id" class="form-control validate[required]" <?php if(!empty($pesticideInfo['season_id'])){ echo "disabled";}?>>
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
            <input type="hidden" name="labour_activity_id" id="labour_activity_id" value="<?php echo $pesticideInfo['id'];?>"/>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_CROP');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <select name="crop_id" id="labour_activity_crop_id" class="form-control validate[required]" <?php if(!empty($pesticideInfo['crop_id'])){ echo "disabled";}?>>
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php

                    foreach($crops as $crop)
                    {
                        ?>
                        <option value="<?php echo $crop['id']?>" <?php if ($crop['id']== $pesticideInfo['crop_id']){ echo 'selected';}?>><?php echo $crop['crop_name'];?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>

        </div>
        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('Crop Type');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <select name="labour_activity_variety" id="labour_activity_crop_type" class="form-control validate[required]" <?php if(!empty($pesticideInfo['varity_type_id'])){ echo "disabled";}?>>
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php
                    foreach($types as $type)
                    {
                        ?>
                        <option value="<?php echo $type['id']?>" <?php if ($type['id']== $pesticideInfo['crop_type_id']){ echo 'selected';}?>><?php echo $type['product_type'];?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>

        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_RND_CODE');?></label>
            </div>
            <div class="col-sm-4 col-xs-8" id="load_rnd_code">
                <table class="table table-condensed table-striped table-bordered table-hover no-margin">
                    <thead>
                    <tr>
                        <th>
                            <input type="checkbox" name="" id="" class="checkAll" checked="" /><?php echo $this->lang->line('All Select (R&D Code)');?>
                        </th>
                    </tr>
                    </thead>

                    <tbody id="div_rnd_code">
                    <?php if(!empty($rndCodes)){ foreach($rndCodes as $codes){?>
                        <tr>
                            <td>
                                <input type='checkbox' name='rnd_code[]' id='rnd_code' class="checksingle" value='<?php echo $codes['rnd_id'];?>' <?php if(in_array($codes['rnd_id'],$newarray)){ echo "checked";}?> /><?php echo ' '.$codes['rnd_code'];?>
                            </td>
                        </tr>
                    <?php }}else{?>
                        <tr class='first_row_id'>
                            <td colspan='21' style='text-align: center;' class='btn-warning2'><?php echo $this->lang->line('LABEL_NO_DATA_AVAILABLE');?></td>
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>
        </div>


        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_LABOUR_ACTIVITY');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">

                    <textarea rows="1" cols="50" name="labour_activity_name" id="labour_activity_name" class="form-control validate[required]" placeholder="Labour Activity">
                        <?php echo $pesticideInfo['labor_activity_name'];?>
                    </textarea>

            </div>

        </div>
        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_DATE');?></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="labour_activity_date" id="labour_activity_date" class="form-control validate[required]" value="<?php if(!empty($pesticideInfo['activity_date'])){ echo date('d-m-Y',$pesticideInfo['activity_date']);}?>" placeholder="Date" >
            </div>
        </div>
        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_LABOUR_QUANTITY');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="labour_activity_quantity" id="labour_activity_quantity" class="form-control validate[required]" value="<?php echo $pesticideInfo['number_of_labor'];?>" placeholder="Number of Labour">
            </div>
        </div>
        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_REMARKS');?></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <textarea rows="4" cols="50" name="labour_remark" id="labour_remark" class="form-control validate[required]" placeholder="Remark's"><?php echo $pesticideInfo['remark'];?>
                </textarea>
            </div>
        </div>



    </div>
    <div class="clearfix"></div>
</form>


<script type="text/javascript">

    jQuery(document).ready(function()
    {
        $(".form_valid").validationEngine();
        $('.checkAll').click(function(event)
        {
            if(this.checked)
            {
                $('.checksingle').each(function()
                {
                    this.checked = true;
                });
            }
            else
            {
                $('.checksingle').each(function()
                {
                    this.checked = false;
                });
            }
        });

    });

    Calendar.setup({
        inputField: "labour_activity_date",
        trigger: "labour_activity_date",
        onSelect: function() {
            this.hide()
        },
        showTime: 12,
        dateFormat: "%d-%m-%Y"
    });


</script>