<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    $data["link_new"]=base_url()."setup_plot_info/index/add";
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
    <div class="col-sm-12">
        <table class="table table-hover table-bordered">
            <thead>
            <tr>
                <th><?php echo $this->lang->line("SERIAL"); ?></th>
                <th><?php echo $this->lang->line("LABEL_PLOT_NAME"); ?></th>
                <th><?php echo $this->lang->line("LABEL_PLOT_LENGTH"); ?></th>
                <th><?php echo $this->lang->line("LABEL_PLOT_WIDTH"); ?></th>
                <th><?php echo $this->lang->line("LABEL_PLOT_LENGTH_SPACE"); ?></th>
                <th><?php echo $this->lang->line("LABEL_PLOT_WIDTH_SPACE"); ?></th>
                <th><?php echo $this->lang->line("ACTION"); ?></th>
            </tr>
            </thead>

            <tbody>
            <?php
            if(sizeof($plots)>0)
            {
                foreach($plots as $key=>$plot)
                {
                ?>
                    <tr>
                        <td><?php echo $key+1;?></td>
                        <td><?php echo $plot['plot_name'];?></td>
                        <td><?php echo $plot['plot_length'];?></td>
                        <td><?php echo $plot['plot_width'];?></td>
                        <td><?php echo $plot['length_space'];?></td>
                        <td><?php echo $plot['width_space'];?></td>
                        <td>
                            <a href="<?php echo base_url();?>setup_plot_info/index/edit/<?php echo $plot['id'];?>">
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