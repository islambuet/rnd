<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    $data["link_new"]=base_url()."delivery_and_sowing_setup/index/add";
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
                <th><?php echo $this->lang->line("LABEL_YEAR"); ?></th>
                <th><?php echo $this->lang->line("LABEL_SEASON"); ?></th>
                <th><?php echo $this->lang->line("LABEL_CROP_NAME"); ?></th>
                <th><?php echo $this->lang->line("LABEL_ESTIMATED_DELIVERY_DATE"); ?></th>
                <th><?php echo $this->lang->line("LABEL_DELIVERY_DATE"); ?></th>
                <th><?php echo $this->lang->line("LABEL_RECEIVE_DATE"); ?></th>
                <th><?php echo $this->lang->line("LABEL_SOWING_DATE"); ?></th>
                <th><?php echo $this->lang->line("LABEL_TRANSPLANTING_DATE"); ?></th>
                <th><?php echo $this->lang->line("LABEL_SEASON_END_DATE"); ?></th>
                <th><?php echo $this->lang->line("ACTION"); ?></th>
            </tr>
            </thead>

            <tbody>
            <?php
            if(sizeof($samples)>0)
            {
                foreach($samples as $key=>$sample)
                {
                    ?>
                    <tr>
                        <td><?php echo $key+1;?></td>
                        <td><?php echo $sample['year'];?></td>
                        <td><?php echo $sample['season_name'];?></td>
                        <td><?php echo $sample['crop_name'];?></td>
                        <td>
                            <?php
                            if(($sample['estimated_delivery_date'])>0)
                            {
                                echo System_helper::display_date($sample['estimated_delivery_date']);
                            }
                            else
                            {
                                echo $this->lang->line("LABEL_NOT_SET");
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if(($sample['delivery_date'])>0)
                            {
                                echo System_helper::display_date($sample['delivery_date']);
                            }
                            else
                            {
                                echo $this->lang->line("LABEL_NOT_SET");
                            }
                            ?>
                        </td>

                        <td>
                            <?php
                            if(($sample['receive_date'])>0)
                            {
                                echo System_helper::display_date($sample['receive_date']);
                            }
                            else
                            {
                                echo $this->lang->line("LABEL_NOT_SET");
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if(($sample['sowing_status'])==1)
                            {
                                echo System_helper::display_date($sample['sowing_date']);
                            }
                            else
                            {
                                echo $this->lang->line("LABEL_NOT_SET");
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if(($sample['transplanting_date'])>0)
                            {
                                echo System_helper::display_date($sample['transplanting_date']);
                            }
                            else
                            {
                                echo $this->lang->line("LABEL_NOT_SET");
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if(($sample['season_end_status'])==1)
                            {
                                echo System_helper::display_date($sample['season_end_date']);
                            }
                            else
                            {
                                echo $this->lang->line("LABEL_NOT_SET");
                            }
                            ?>
                        </td>
                        <td>
                            <a href="<?php echo base_url();?>delivery_and_sowing_setup/index/edit/<?php echo $sample['id'];?>">
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
    <div class="col-sm-12">
        <div class="pagination_container pull-right">
            <?php
            echo $links;
            ?>
        </div>
    </div>


</div>
<div class="clearfix"></div>