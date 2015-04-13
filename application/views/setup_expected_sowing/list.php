<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$data["link_new"]="#";
$data["hide_new"]="1";
$this->load->view("action_buttons",$data);

?>

<div class="row widget">
    <div class="widget-header">
        <div class="title">
            <?php echo $title; ?>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="col-sm-12" style="overflow-x: auto;">
        <table class="table table-hover table-bordered" style="font-size: 13px;">
            <thead>
            <tr>
                <th><?php echo $this->lang->line("SERIAL"); ?></th>
                <th><?php echo $this->lang->line("LABEL_SEASON"); ?></th>
                <th><?php echo $this->lang->line("LABEL_EXPECTED_SOWING_DATE"); ?></th>
                <th><?php echo $this->lang->line("LABEL_DESTINED_DELIVERY_DATE"); ?></th>
                <th><?php echo $this->lang->line("ACTION"); ?></th>
            </tr>
            </thead>

            <tbody>
            <?php
            if(sizeof($seasons)>0)
            {
                foreach($seasons as $key=>$season)
                {
                    ?>
                    <tr>
                        <td><?php echo $key+1;?></td>
                        <td><?php echo $season['season_name'];?></td>
                        <td>
                            <?php
                            if(($season['expected_sowing_start']>0)&&(($season['expected_sowing_end']>0)))
                            {
                                echo System_helper::display_date($season['expected_sowing_start'])." TO ".System_helper::display_date($season['expected_sowing_end']);
                            }
                            else
                            {
                                echo $this->lang->line("LABEL_NOT_SET");
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if(($season['estimated_delivery_date']>0))
                            {
                                echo System_helper::display_date($season['estimated_delivery_date']);
                            }
                            else
                            {
                                echo $this->lang->line("LABEL_NOT_SET");
                            }
                            ?>
                        </td>
                        <td>
                            <a href="<?php echo base_url();?>setup_expected_sowing/index/edit/<?php echo $season['id'];?>">
                                <img src="<?php echo base_url();?>images/edit_record.png">
                            </a>
                        </td>
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

</div>
<div class="clearfix"></div>
<script type="text/javascript">
    jQuery(document).ready(function()
    {
        turn_off_triggers();
    });
</script>