<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$dir=$this->config->item('dir');
?>


<div class="widget-header">
    <div class="title">
        <?php echo $title; ?>
    </div>
    <div class="clearfix"></div>
</div>

<?php
foreach($this->config->item('flowering_image') as $val=>$flower)
{
    ?>
    <div class="row show-grid">
        <div class="col-xs-4">
            <label class="control-label pull-right"><?php echo $flower;?></label>
        </div>
        <div class="col-xs-4">
            <input class="file_flowering file_style_normal" id="file_<?php echo $val;?>" data-day="<?php echo $val;?>" name="file_<?php echo $val;?>" type="file">
        </div>
        <div class="col-xs-4">
            <img class="image_flowering" id="image_<?php echo $val;?>" style="max-width: 100px;" src="<?php echo base_url().$dir['flowering_image_config'].'/'.$images[$val]; ?>">
            <input type="hidden" name="old_<?php echo $val;?>" value="<?php echo $images[$val];?>">
        </div>
    </div>
    <?php
}
?>

<script type="text/javascript">

    jQuery(document).ready(function()
    {
        $(".file_style_normal").filestyle({input: false,icon: false,buttonText: "SELECT IMAGE",buttonName: "btn-primary"});
    });

</script>

<script type="text/javascript">
    jQuery(document).ready(function()
    {
        turn_off_triggers();
    });
</script>


