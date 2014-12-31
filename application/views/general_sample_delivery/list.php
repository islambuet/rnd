<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    $data["link_new"]=base_url()."general_sample_delivery/index/add";
    $this->load->view("action_buttons",$data);
//echo '<pre>';
//print_r($sampleInfo);
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
        <table class="table table-hover table-bordered" style="font-size: 13px;">
            <thead>
            <tr>
                <th><?php echo $this->lang->line("SERIAL"); ?></th>
                <th><?php echo $this->lang->line("LABEL_SEASON"); ?></th>
                <th><?php echo $this->lang->line("LABEL_DESTINED_DELIVERY_DATE"); ?></th>
                <th><?php echo $this->lang->line("LABEL_DELIVERED"); ?></th>
                <th><?php echo $this->lang->line("LABEL_DELIVERY_DATE"); ?></th>
                <th><?php echo $this->lang->line("LABEL_RECEIVED"); ?></th>
                <th><?php echo $this->lang->line("LABEL_RND_RECEIVE_DATE"); ?></th>
                <th><?php echo $this->lang->line("LABEL_DESTINED_SOWING_DATE"); ?></th>
                <th><?php echo $this->lang->line("LABEL_SOWING"); ?></th>
                <th><?php echo $this->lang->line("LABEL_SOWING_DATE"); ?></th>
                <th><?php echo $this->lang->line("ACTION"); ?></th>
            </tr>
            </thead>

            <tbody>
            <?php
            foreach($sampleInfo as $key=>$sample)
            {
            ?>
            <tr>
                <td><?php echo $key+1;?></td>
                <td><?php echo $sample['season_name'];?></td>
                <td><?php echo date('Y-m-d', $sample['destined_delivery_date']);?></td>
                <td><?php if($sample['delivered_status']==$this->config->item('sample_delivery_delivered_status_yes')){ echo $this->lang->line('LABEL_YES');}else{ echo $this->lang->line('LABEL_NO');}?></td>
                <td><?php echo date('Y-m-d',$sample['delivery_date']);?></td>
                <td><?php if($sample['received_status']==$this->config->item('sample_delivery_received_status_yes')){ echo $this->lang->line('LABEL_YES');}else{ echo $this->lang->line('LABEL_NO');}?></td>
                <td><?php echo date('Y-m-d',$sample['rnd_received_date']);?></td>
                <td><?php echo date('Y-m-d',$sample['destined_sowing_date']);?></td>
                <td><?php if($sample['sowing_status']==$this->config->item('sample_delivery_sowing_status_yes')){ echo $this->lang->line('LABEL_YES');}else{ echo $this->lang->line('LABEL_NO');}?></td>
                <td><?php echo date('Y-m-d',$sample['sowing_date']);?></td>
                <td>
                    <a href="<?php echo base_url();?>general_sample_delivery/index/edit/<?php echo $sample['id'];?>">
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