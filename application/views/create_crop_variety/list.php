<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    $data["link_new"]=base_url()."create_crop_variety/index/add";
    $this->load->view("action_buttons",$data);
//echo '<pre>';
//print_r($varietyInfo);
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
                <th><?php echo $this->lang->line("LABEL_VARIETY_NAME"); ?></th>
                <th><?php echo $this->lang->line("LABEL_VARIETY_TYPE"); ?></th>
                <th><?php echo $this->lang->line("LABEL_FLOWERING_TYPE"); ?></th>
                <th><?php echo $this->lang->line("LABEL_SEASON"); ?></th>
                <th><?php echo $this->lang->line("STATUS"); ?></th>
                <th><?php echo $this->lang->line("ACTION"); ?></th>
            </tr>
            </thead>

            <tbody>
            <?php
            foreach($varietyInfo as $key=>$variety)
            {
            ?>
            <tr>
                <td><?php echo $key+1;?></td>
                <td><?php echo $variety['variety_name'];?></td>
                <td>
                    <?php
                    if($variety['variety_type']==$this->config->item('variety_type_arm'))
                    {
                        echo $this->lang->line('LABEL_CHECK_VARIETY_ARM');
                    }
                    elseif($variety['variety_type']==$this->config->item('variety_type_company'))
                    {
                        echo $this->lang->line('LABEL_COMPETITOR_VARIETY');
                    }
                    ?>
                </td>

                <td>
                    <?php
                    if($variety['flowering_type_id']==$this->config->item('rnd_fruit_code'))
                    {
                        echo $this->lang->line('LABEL_FRUIT');
                    }
                    elseif($variety['flowering_type_id']==$this->config->item('rnd_curt_code'))
                    {
                        echo $this->lang->line('LABEL_CURT');
                    }
                    elseif($variety['flowering_type_id']==$this->config->item('rnd_root_code'))
                    {
                        echo $this->lang->line('LABEL_ROOT');
                    }
                    elseif($variety['flowering_type_id']==$this->config->item('rnd_leaf_code'))
                    {
                        echo $this->lang->line('LABEL_LEAF');
                    }
                    ?>
                </td>

                <td><?php echo $variety['season_name'];?></td>

                <td><?php if($variety['status']==$this->config->item('active')){ echo $this->lang->line('ACTIVE');}else{ echo $this->lang->line('INACTIVE');};?></td>
                <td>
                    <a href="<?php echo base_url();?>create_crop_variety/index/edit/<?php echo $variety['id'];?>">
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