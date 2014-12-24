<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    $data["link_new"]=base_url()."create_principal/index/add";
    $this->load->view("action_buttons",$data);
//echo '<pre>';
//print_r($principalInfo);
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
                <th><?php echo $this->lang->line("LABEL_PRINCIPAL_NAME"); ?></th>
                <th><?php echo $this->lang->line("LABEL_PRINCIPAL_CODE"); ?></th>
                <th><?php echo $this->lang->line("LABEL_CONTACT_PERSON"); ?></th>
                <th><?php echo $this->lang->line("LABEL_CONTACT"); ?></th>
                <th><?php echo $this->lang->line("STATUS"); ?></th>
                <th><?php echo $this->lang->line("ACTION"); ?></th>
            </tr>
            </thead>

            <tbody>
            <?php
            foreach($principalInfo as $principal)
            {
            ?>
            <tr>
                <td><?php echo $principal['principal_name'];?></td>
                <td><?php echo $principal['principal_code'];?></td>
                <td><?php echo $principal['contact_person_name'];?></td>
                <td><?php echo $principal['contact_number'];?></td>
                <td><?php if($principal['status']==$this->config->item('active')){ echo $this->lang->line('ACTIVE');}else{ echo $this->lang->line('INACTIVE');};?></td>
                <td>
                    <a href="<?php echo base_url();?>create_principal/index/edit/<?php echo $principal['id'];?>">
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