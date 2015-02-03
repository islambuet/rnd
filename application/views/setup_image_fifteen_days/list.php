<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
?>


<div class="widget-header">
    <div class="title">
        <?php echo $title; ?>
    </div>
    <div class="clearfix"></div>
</div>
<div class="row show-grid">
    <div class="col-xs-4">
        <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_NUMBER_15_DAYS');?><span style="color:#FF0000">*</span></label>
    </div>
    <div class="col-xs-4">

        <select name="number_of_fifteendays" id="number_of_fifteendays" class="form-control validate[required]">
            <?php
            for($i=1;$i<=($this->config->item("max_number_of_fifteen_days"));$i++)
            {?>
                <option value="<?php echo $i;?>" <?php echo ($i==$number_of_fifteendays)?"selected":"";?>><?php echo $i;?></option>
            <?php
            }
            ?>
        </select>
    </div>
</div>
<?php
for($i=1;$i<=$this->config->item('max_number_of_fifteen_days');$i++)
//for($i=1;$i<2;$i++)
{
    ?>
    <div class="row show-grid container_15_days" id="container_15_days_<?php echo $i*15;?>" style="display: <?php if($i<=$number_of_fifteendays){echo "block";}else{echo "none";} ?>">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo 'Day '.($i*15);?></label>
        </div>
        <div class="col-xs-4">
            <input class="file_15_days" id="file_<?php echo $i*15;?>" data-day="<?php echo $i*15;?>" name="file_<?php echo $i*15;?>" type="file">
        </div>
        <div class="col-xs-4">
            <img class="image_15_days" id="image_<?php echo $i*15;?>" style="max-width: 100px;" src="<?php echo $images[$i*15]; ?>">
        </div>
    </div>
    <?php
}
?>





