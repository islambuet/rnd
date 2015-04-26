<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

?>

<div class="col-sm-12">
    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th><?php echo $this->lang->line("SERIAL"); ?></th>
            <th><?php echo $this->lang->line("LABEL_PESTICIDE_NAME"); ?></th>
            <th><?php echo $this->lang->line("LABEL_STOCK_IN"); ?></th>
            <th><?php echo $this->lang->line("LABEL_STOCK_OUT"); ?></th>
            <th><?php echo 'Inventory '.$this->lang->line("LABEL_STOCK_IN"); ?></th>
            <th><?php echo 'Inventory '.$this->lang->line("LABEL_STOCK_OUT"); ?></th>
            <th><?php echo $this->lang->line("LABEL_CURRENT_STOCK"); ?></th>

        </tr>
        </thead>

        <tbody>
        <?php
        if(sizeof($current_stock_info)>0)
        {
            $index=0;
            foreach($current_stock_info as $current_stock)
            {
                $stock_in=round($current_stock['stock_in'],2);
                $stock_out=round($current_stock['stock_out'],2);
                $inventory_stock_in=round($current_stock['inventory_stock_in'],2);
                $inventory_stock_out=round($current_stock['inventory_stock_out'],2);
                $total=$stock_in+$inventory_stock_in-$stock_out-$inventory_stock_out;
                ?>
                <tr>
                    <td><?php echo ++$index;?></td>
                    <td><?php echo $current_stock['pesticide_name'];?></td>
                    <td><?php echo $stock_in;?></td>
                    <td><?php echo $stock_out;?></td>
                    <td><?php echo $inventory_stock_in;?></td>
                    <td><?php echo $inventory_stock_out;?></td>
                    <td><?php echo $total;?></td>

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