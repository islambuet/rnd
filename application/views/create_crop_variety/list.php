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
                <th><?php echo $this->lang->line("LABEL_YEAR"); ?></th>
                <th><?php echo $this->lang->line("LABEL_VARIETY_NAME"); ?></th>
                <th><?php echo $this->lang->line("LABEL_RND_CODE"); ?></th>
                <th><?php echo $this->lang->line("LABEL_VARIETY_TYPE"); ?></th>
                <th><?php echo $this->lang->line("LABEL_CROP_NAME"); ?></th>
                <th><?php echo $this->lang->line("LABEL_CROP_TYPE"); ?></th>
                <th><?php echo $this->lang->line("LABEL_REPLICA_STATUS"); ?></th>
                <th><?php echo $this->lang->line("ACTION"); ?></th>
            </tr>
            </thead>

            <tbody>
            <?php
            if(sizeof($varietyInfo)>0)
            {
                foreach($varietyInfo as $key=>$variety)
                {
                ?>
                <tr>
                    <td><?php echo $key+1;?></td>
                    <td><?php echo $variety['year'];?></td>
                    <td><?php echo $variety['variety_name'];?></td>
                    <td><?php echo System_helper::get_rnd_code($variety);?></td>

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
                        elseif($variety['variety_type']==$this->config->item('variety_type_principal'))
                        {
                            echo $this->lang->line('LABEL_PRINCIPAL_VARIETY');
                        }
                        else
                        {
                            echo '';
                        }
                        ?>
                    </td>
                    <td><?php echo $variety['crop_name'];?></td>
                    <td><?php echo $variety['type_name'];?></td>
                    <td><?php if($variety['replica_status']==1){ echo 'Yes';}else{ echo 'No';}?></td>

                    <td>
                        <a href="<?php echo base_url();?>create_crop_variety/index/edit/<?php echo $variety['id'];?>">
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