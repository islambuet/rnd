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
<div class="col-sm-12" style="overflow-x: auto">
    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th><?php echo $this->lang->line("SERIAL"); ?></th>
            <th><?php echo $this->lang->line("LABEL_VARIETY_NAME"); ?></th>
            <th><?php echo $this->lang->line("LABEL_RND_CODE"); ?></th>
            <th><?php echo $this->lang->line("LABEL_UPLOAD"); ?></th>
            <th><?php echo $this->lang->line("LABEL_SAMPLE_PICTURE"); ?></th>
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
                    <td><?php echo $key+1;?></td>
                    <td><?php echo $variety['id'];?></td>
                    <td><?php echo System_helper::get_rnd_code($variety);?></td>

                    <td>
                        <?php
                        echo "browse buttons";
                        ?>
                    </td>
                    <td><?php echo $variety['crop_name'];?></td>
                    <td><textarea name="remarks_<?php echo $variety['id'];?>"><?php $variety['remarks'];?></textarea></td>

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