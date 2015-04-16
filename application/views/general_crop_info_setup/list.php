<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    $data["link_new"]=base_url()."general_crop_info_setup/index/add";
    $this->load->view("action_buttons",$data);
//echo '<pre>';
//print_r($plots);
//echo '</pre>';
?>

<div class="row widget">
    <div class="widget-header">
        <div class="title">
            <?php echo $title; ?>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="col-sm-12" style="overflow-x: auto;">
        <table class="table table-hover table-bordered">
            <thead>
            <tr>
                <th><?php echo $this->lang->line("SERIAL"); ?></th>
                <th><?php echo $this->lang->line("LABEL_YEAR"); ?></th>
                <th><?php echo $this->lang->line("LABEL_SEASON"); ?></th>
                <th><?php echo $this->lang->line("LABEL_CROP_NAME"); ?></th>
                <th><?php echo $this->lang->line("LABEL_CROP_TYPE"); ?></th>
                <th><?php echo $this->lang->line("LABEL_DESTINED_DELIVERY_DATE"); ?></th>
                <th><?php echo $this->lang->line("LABEL_DELIVERY_DATE"); ?></th>
                <th><?php echo $this->lang->line("LABEL_RECEIVE_DATE"); ?></th>
                <th><?php echo $this->lang->line("LABEL_EXPECTED_SOWING_DATE"); ?></th>
                <th><?php echo $this->lang->line("LABEL_SOWING_DATE"); ?></th>
                <th><?php echo $this->lang->line("LABEL_EXPECTED_ANALYSIS_DATE"); ?></th>
                <th><?php echo $this->lang->line("LABEL_ANALYSIS_DATE"); ?></th>
                <th><?php echo $this->lang->line("LABEL_EXPECTED_ANALYSIS_WITH_MARKET"); ?></th>
                <th><?php echo $this->lang->line("LABEL_ANALYSIS_WITH_MARKET_DATE"); ?></th>
                <th><?php echo $this->lang->line("LABEL_EXPECTED_PRESENTATION_TO_MANAGEMENT"); ?></th>
                <th><?php echo $this->lang->line("LABEL_PRESENTATION_DATE"); ?></th>
                <th><?php echo $this->lang->line("ACTION"); ?></th>
            </tr>
            </thead>

            <tbody>
            <?php
            if(sizeof($crops)>0)
            {
                foreach($crops as $key=>$crop)
                {
                ?>
                    <tr>
                        <td><?php echo $key+1;?></td>
                        <td><?php echo $crop['year'];?></td>
                        <td><?php echo $crop['crop_name'];?></td>
                        <td><?php echo $crop['season_name'];?></td>
                        <td><?php echo $crop['type_name'];?></td>
                        <td><?php if($crop['estimated_delivery_date']>0){echo System_helper::display_date($crop['estimated_delivery_date']);}?></td>
                        <td><?php if($crop['delivery_date']>0){echo System_helper::display_date($crop['delivery_date']);}?></td>
                        <td><?php if($crop['delivery_date']>0){echo System_helper::display_date($crop['receive_date']);}?></td>
                        <td>
                            <?php
                                if(($crop['expected_sowing_start']>0)&&($crop['expected_sowing_end']>0))
                                {
                                    echo System_helper::display_date($crop['expected_sowing_start']).' TO '.System_helper::display_date($crop['expected_sowing_end']);
                                }
                            ?>
                        </td>
                        <td><?php if($crop['sowing_date']>0){echo System_helper::display_date($crop['sowing_date']);}?></td>
                        <td>
                            <?php
                            if(($crop['expected_analysis_date_from']>0)&&($crop['expected_analysis_date_to']>0))
                            {
                                echo System_helper::display_date($crop['expected_analysis_date_from']).' TO '.System_helper::display_date($crop['expected_analysis_date_to']);
                            }
                            ?>
                        </td>
                        <td><?php if($crop['analysis_date']>0){echo System_helper::display_date($crop['analysis_date']);}?></td>
                        <td>
                            <?php
                            if(($crop['expected_analysis_date_with_market_from']>0)&&($crop['expected_analysis_date_with_market_to']>0))
                            {
                                echo System_helper::display_date($crop['expected_analysis_date_with_market_from']).' TO '.System_helper::display_date($crop['expected_analysis_date_with_market_to']);
                            }
                            ?>
                        </td>
                        <td><?php if($crop['analysis_with_market_date']>0){echo System_helper::display_date($crop['analysis_with_market_date']);}?></td>
                        <td>
                            <?php
                            if(($crop['expected_presentation_to_management_from']>0)&&($crop['expected_presentation_to_management_to']>0))
                            {
                                echo System_helper::display_date($crop['expected_presentation_to_management_from']).' TO '.System_helper::display_date($crop['expected_presentation_to_management_to']);
                            }
                            ?>
                        </td>
                        <td><?php if($crop['presentation_to_management']>0){echo System_helper::display_date($crop['presentation_to_management']);}?></td>

                        <td>
                            <a href="<?php echo base_url();?>general_crop_info_setup/index/edit/<?php echo $crop['id'];?>">
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