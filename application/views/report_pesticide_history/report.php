<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

?>

<div class="col-sm-12">
    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th><?php echo $this->lang->line("SERIAL"); ?></th>
            <th><?php echo $this->lang->line("LABEL_PESTICIDE_NAME"); ?></th>
            <th><?php echo $this->lang->line("LABEL_TRANSACTION_TYPE"); ?></th>
            <th><?php echo $this->lang->line("LABEL_QUANTITY_STOCK_IN"); ?></th>
            <th><?php echo $this->lang->line("LABEL_DATE"); ?></th>


        </tr>
        </thead>

        <tbody>
        <?php
        if(sizeof($stocks_info)>0)
        {
            $index=0;
            foreach($stocks_info as $stock)
            {
                ?>
                <tr>
                    <td><?php echo ++$index;?></td>
                    <td><?php echo $stock['pesticide_name'];?></td>
                    <td><?php echo $stock['transaction_type'];?></td>
                    <td><?php echo $stock['quantity'];?></td>
                    <td><?php echo System_helper::display_date($stock['date']);?></td>


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