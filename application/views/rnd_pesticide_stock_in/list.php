<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    $data["link_new"]=base_url()."rnd_pesticide_stock_in/index/add";
    $this->load->view("action_buttons",$data);
//echo '<pre>';
//print_r($stock_in_info);
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
                <th><?php echo $this->lang->line("LABEL_PESTICIDE_STOCK_IN"); ?></th>
                <th><?php echo $this->lang->line("LABEL_DATE"); ?></th>
                <th><?php echo $this->lang->line("LABEL_PESTICIDE_QUANTITY"); ?></th>
                <th><?php echo $this->lang->line("LABEL_PRICE_STOCK_IN"); ?></th>
            </tr>
            </thead>

            <tbody>
            <?php
            if(sizeof($stock_in_info)>0)
            {
                foreach($stock_in_info as $key=>$stock_in)
                {
                    ?>
                    <tr>
                        <td><?php echo $key+1;?></td>
                        <td><?php echo $stock_in['pesticide_name'];?></td>
                        <td><?php echo System_helper::display_date($stock_in['stock_in_date']);?></td>
                        <td><?php echo $stock_in['pesticide_quantity'].'('.$stock_in['unit'].')';?></td>
                        <td><?php echo $stock_in['pesticide_price'];?></td>
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