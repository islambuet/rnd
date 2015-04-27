<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    $data["link_new"]=base_url()."rnd_pesticide_inventory/index/add";
    $this->load->view("action_buttons",$data);
//echo '<pre>';
//print_r($typeInfo);
//echo '</pre>';
?>

<div class="row widget">
    <div class="widget-header">
        <div class="title">
            <?php echo $title; ?>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="col-xs-12"style="overflow-x: auto;">
        <table class="table table-hover table-bordered">
            <thead>
            <tr>
                <th><?php echo $this->lang->line("SERIAL"); ?></th>
                <th><?php echo $this->lang->line("LABEL_PESTICIDE_NAME"); ?></th>
                <th><?php echo $this->lang->line("LABEL_INVENTORY_TYPE"); ?></th>
                <th><?php echo $this->lang->line("LABEL_DATE"); ?></th>
                <th><?php echo $this->lang->line("LABEL_PESTICIDE_QUANTITY"); ?></th>
                <th><?php echo $this->lang->line("LABEL_REMARKS"); ?></th>

            </tr>
            </thead>

            <tbody>
            <?php
            if(sizeof($inventories_info)>0)
            {
                foreach($inventories_info as $key=>$inventory)
                {
                ?>
                <tr>
                    <td><?php echo $key+1;?></td>
                    <td><?php echo $inventory['pesticide_name'];?></td>
                    <td>
                        <?php
                        if($inventory['inventory_type']==1)
                        {
                            echo $this->lang->line('LABEL_STOCK_IN');
                        }
                        else if($inventory['inventory_type']==2)
                        {
                            echo $this->lang->line('LABEL_STOCK_OUT');
                        }
                        ?>
                    </td>
                    <td><?php echo System_helper::display_date($inventory['inventory_date']);?></td>
                    <td><?php echo $inventory['pesticide_quantity'].'('.$inventory['unit'].')';?></td>
                    <td><?php echo $inventory['remarks'];?></td>

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
    <div class="col-xs-12">
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