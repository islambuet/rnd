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
        <label class="control-label pull-right"><?php echo $day_number.' DAS';?></label>
    </div>
    <div class="col-xs-4">
        <label class="form-control"><?php echo System_helper::display_date($sowing_info['sowing_date']+$day_number*24 * 60 * 60);?></label>
    </div>
</div>
<div class="col-sm-12" style="overflow-x: auto">
    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th><?php echo $this->lang->line("SERIAL"); ?></th>
            <th><?php echo $this->lang->line("LABEL_RND_CODE"); ?></th>
            <th><?php echo $this->lang->line("LABEL_UPLOAD_BUTTONS"); ?></th>
            <th>
                <img style="max-width: 250px;" src="<?php echo base_url().$dir['15_days_image_config'].'/'.$sample_image; ?>">

            </th>
            <th><?php echo $this->lang->line("LABEL_REMARKS"); ?></th>

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
                        <input name="rdifd_id_<?php echo $variety['id'];?>" type="hidden" value="<?php echo $variety['rdifd_id'];?>">
                    </td>
                    <td><?php echo System_helper::get_rnd_code($variety,1);?></td>

                    <td style="min-width: 200px;">

                        <input type="file" class="browse_button file_style_normal" data-image-container="image_normal_<?php echo $variety['id'];?>" name="file_normal_<?php echo $variety['id'];?>">
                        <?php
                           if($variety['replica_status']==1)
                           {
                               ?>
                               <br><input type="file" class="browse_button file_style_replica" data-image-container="image_replica_<?php echo $variety['id'];?>" name="file_replica_<?php echo $variety['id'];?>">
                               <?php
                           }
                        ?>


                    </td>
                    <td style="min-width: 300px;">
                        <?php
                        $images=json_decode($variety['images'],true);
                        $image='no_image.jpg';

                        if(is_array($images))
                        {
                            $image=$images['normal'];

                        }
                        ?>
                        <img id="image_normal_<?php echo $variety['id'];?>" style="max-width: 250px;" src="<?php echo base_url().$dir['15_days_image_data'].'/'.$image; ?>">
                        <input type="hidden" name="old_normal_image_<?php echo $variety['id'];?>" value="<?php echo $image; ?>">
                        <?php
                        if($variety['replica_status']==1)
                        {
                            $image='no_image.jpg';
                            if(is_array($images))
                            {
                                $image=$images['replica'];

                            }

                            ?>
                            <br><br><img id="image_replica_<?php echo $variety['id'];?>" style="max-width: 250px;" src="<?php echo base_url().$dir['15_days_image_data'].'/'.$image; ?>">
                            <input type="hidden" name="old_replica_image_<?php echo $variety['id'];?>" value="<?php echo $image; ?>">
                        <?php
                        }
                        else
                        {
                            ?>
                            <input type="hidden" name="old_replica_image_<?php echo $variety['id'];?>" value="no_image.jpg">
                            <?php
                        }
                        ?>
                    </td>
                    <td><textarea name="remarks_<?php echo $variety['id'];?>"><?php echo $variety['remarks'];?></textarea></td>

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
        system_resized_image_files=[];
        $(".file_style_normal").filestyle({input: false,icon: false,buttonText: "Image For Single",buttonName: "btn-primary"});
        $(".file_style_replica").filestyle({input: false,icon: false,buttonText: "Image For Replica",buttonName: "btn-danger"});
    });

</script>
