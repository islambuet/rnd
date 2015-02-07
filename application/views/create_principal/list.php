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
    <div class="col-xs-12" style="overflow-x: auto;">
        <table class="table table-hover table-bordered">
            <thead>
            <tr>
                <th><?php echo $this->lang->line("SERIAL"); ?></th>
                <th><?php echo $this->lang->line("LABEL_PRINCIPAL_NAME"); ?></th>
                <th><?php echo $this->lang->line("LABEL_PRINCIPAL_CODE"); ?></th>
                <th><?php echo $this->lang->line("LABEL_CONTACT_PERSON"); ?></th>
                <th><?php echo $this->lang->line("LABEL_CONTACT"); ?></th>
                <th><?php echo $this->lang->line("ACTION"); ?></th>
            </tr>
            </thead>

            <tbody>
            <?php
            if(sizeof($principalInfo)>0)
            {
                foreach($principalInfo as $key=>$principal)
                {
                ?>
                    <tr>
                        <td><?php echo $key+1;?></td>
                        <td><?php echo $principal['principal_name'];?></td>
                        <td><?php echo $principal['principal_code'];?></td>
                        <td><?php echo $principal['contact_person_name'];?></td>
                        <td><?php echo $principal['contact_number'];?></td>
                        <td>
                            <a href="<?php echo base_url();?>create_principal/index/edit/<?php echo $principal['id'];?>">
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
<script type="text/javascript">
    jQuery(document).ready(function()
    {
        turn_off_triggers();
    });
</script>