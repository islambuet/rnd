<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    $data["link_new"]=base_url()."general_sample_delivery/index/add";
    $this->load->view("action_buttons",$data);
//echo '<pre>';
//print_r($cropInfo);
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
                <th><?php echo $this->lang->line("LABEL_CROP_NAME"); ?></th>
                <th><?php echo $this->lang->line("LABEL_CROP_CODE"); ?></th>
                <th><?php echo $this->lang->line("LABEL_CROP_WIDTH"); ?></th>
                <th><?php echo $this->lang->line("LABEL_CROP_HEIGHT"); ?></th>
                <th><?php echo $this->lang->line("STATUS"); ?></th>
                <th><?php echo $this->lang->line("ACTION"); ?></th>
            </tr>
            </thead>

            <tbody>
            <?php
            foreach($cropInfo as $key=>$crop)
            {
            ?>
            <tr>
                <td><?php echo $key+1;?></td>
                <td><?php echo $crop['crop_name'];?></td>
                <td><?php echo $crop['crop_code'];?></td>
                <td><?php echo $crop['crop_width'];?></td>
                <td><?php echo $crop['crop_height'];?></td>
                <td><?php if($crop['status']==$this->config->item('active')){ echo $this->lang->line('ACTIVE');}else{ echo $this->lang->line('INACTIVE');};?></td>
                <td>
                    <a href="<?php echo base_url();?>general_sample_delivery/index/edit/<?php echo $crop['id'];?>">
                        <img src="<?php echo base_url();?>images/edit_record.png">
                    </a>
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