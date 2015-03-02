<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$dir=$this->config->item('dir');
//echo "<pre>";
//print_r($varieties[0]);
//echo "</pre>";
//echo System_helper::get_rnd_code($varieties[0],1);

?>
<div class="widget-header">
    <div class="title">
        <?php echo $title; ?>
    </div>
    <div class="clearfix"></div>
</div>
<div class="row show-grid">
    <div class="col-xs-4">
        <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SOWING_DATE');?></label>
    </div>
    <div class="col-xs-4">
        <label class="form-control"><?php echo System_helper::display_date($sowing_info['sowing_date']);?></label>
    </div>
</div>
<div class="row show-grid">
    <div class="col-xs-4">
        <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_HARVEST_NO');?></label>
    </div>
    <div class="col-xs-4">
        <label class="form-control"><?php echo $harvest_no;?></label>
    </div>
</div>
<div class="col-sm-12" style="overflow-x: auto">
    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th><?php echo $this->lang->line("SERIAL"); ?></th>
            <th><?php echo $this->lang->line("LABEL_RND_CODE"); ?></th>

            <?php
                foreach($this->config->item('harvest cropwise_image') as $key=>$harvest_config)
                {
                    ?>
                    <th><?php echo $this->lang->line("LABEL_UPLOAD_BUTTONS")." For ".$harvest_config; ?></th>
                    <th>
                        <?php
                            $head_image=isset($head_images[$key])?$head_images[$key]:'no_image.jpg';
                        ?>
                        <img style="max-width: 250px;" src="<?php echo base_url().$dir['harvest cropwise_image_config'].'/'.$head_image; ?>">
                    </th>

                    <th><?php echo $this->lang->line("LABEL_REMARKS")." For ".$harvest_config; ; ?></th>
                    <?php

                }
            ?>



        </tr>
        </thead>

        <tbody>
        <?php
        if(sizeof($varieties)>0)
        {
            foreach($varieties as $key=>$variety)
            {
                ?>
                <tr>
                    <td>
                        <?php echo $key+1;?>
                        <input name="variety_id[]" type="hidden" value="<?php echo $variety['id'];?>">
                        <input name="rdihc_id_<?php echo $variety['id'];?>" type="hidden" value="<?php echo $variety['rdihc_id'];?>">
                    </td>
                    <td><?php echo System_helper::get_rnd_code($variety,1);?></td>
                    <?php
                    foreach($this->config->item('harvest cropwise_image') as $key=>$harvest_config)
                    {
                        ?>
                        <td style="min-width: 200px;">

                            <input type="file" class="browse_button file_style_normal" data-image-container="image_normal_<?php echo $key.'_'.$variety['id'];?>" name="file_normal_<?php echo $key.'_'.$variety['id'];?>">
                            <?php
                            if($variety['replica_status']==1)
                            {
                                ?>
                                <br><input type="file" class="browse_button file_style_replica" data-image-container="image_replica_<?php echo $key.'_'.$variety['id'];?>" name="file_replica_<?php echo $key.'_'.$variety['id'];?>">
                            <?php
                            }
                            ?>
                        </td>
                        <td style="min-width: 300px;">
                            <?php
                            $images=json_decode($variety['images'],true);
                            $image='no_image.jpg';

                            if(is_array($images)&&($images['normal'][$key]))
                            {
                                $image=$images['normal'][$key];

                            }
                            ?>
                            <img id="image_normal_<?php echo $key.'_'.$variety['id'];?>" style="max-width: 250px;" src="<?php echo base_url().$dir['harvest cropwise_image_data'].'/'.$image; ?>">
                            <input type="hidden" name="old_normal_image_<?php echo $key.'_'.$variety['id'];?>" value="<?php echo $image; ?>">
                            <?php
                            if($variety['replica_status']==1)
                            {
                                $image='no_image.jpg';
                                if(is_array($images)&&($images['replica'][$key]))
                                {
                                    $image=$images['replica'][$key];

                                }

                                ?>
                                <br><br><img id="image_replica_<?php echo $key.'_'.$variety['id'];?>" style="max-width: 250px;" src="<?php echo base_url().$dir['harvest cropwise_image_data'].'/'.$image; ?>">
                                <input type="hidden" name="old_replica_image_<?php echo $key.'_'.$variety['id'];?>" value="<?php echo $image; ?>">
                            <?php
                            }
                            else
                            {
                                ?>
                                <input type="hidden" name="old_replica_image_<?php echo $key.'_'.$variety['id'];?>" value="no_image.jpg">
                            <?php
                            }
                            ?>
                        </td>
                        <?php
                            $remarks=json_decode($variety['remarks'],true);

                            $remark='';

                            if(is_array($remarks)&&($remarks[$key]))
                            {
                                $remark=$remarks[$key];

                            }
                        ?>
                        <td><textarea name="remarks_<?php echo $key.'_'.$variety['id'];?>"><?php echo $remark;?></textarea></td>

                    <?php

                    }
                    ?>
                </tr>
            <?php
            }
        }
        else
        {
            ?>
            <tr>
                <td colspan="20" class="text-center alert-danger">
                    <?php echo $this->lang->line("NO_DATA_FOUND"); ?>
                </td>
            </tr>
        <?php
        }
        ?>

        </tbody>
    </table>
</div>
<script type="text/javascript">

    jQuery(document).ready(function()
    {
        $(".file_style_normal").filestyle({input: false,icon: false,buttonText: "Image For Single",buttonName: "btn-primary"});
        $(".file_style_replica").filestyle({input: false,icon: false,buttonText: "Image For Replica",buttonName: "btn-danger"});
    });

</script>
