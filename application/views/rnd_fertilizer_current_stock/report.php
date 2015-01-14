<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
function get_stock($id,$array)
{
    foreach($array as $a)
    {
        if($a['id']==$id)
        {
            return $a['total']>0?$a['total']:0;
        }
    }
    return 0;
}

?>

<div class="col-sm-12">
    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th><?php echo $this->lang->line("SERIAL"); ?></th>
            <th><?php echo $this->lang->line("LABEL_FERTILIZER_NAME"); ?></th>
            <th><?php echo $this->lang->line("STOCK IN"); ?></th>
            <th><?php echo $this->lang->line("STOCK OUT"); ?></th>
            <th><?php echo $this->lang->line("CURRENT STOCK"); ?></th>

        </tr>
        </thead>

        <tbody>
        <?php
        foreach($fertilizers as $key=>$fertilizer)
        {
            $total_stock_in=get_stock($fertilizer['id'],$stock_in_infos);
            $total_stock_out=get_stock($fertilizer['id'],$stock_out_infos);
            /*$total_stock_in=0;
            $total_stock_out=get_stock_out($stock_in['id'],$stock_out_infos);
            if($stock_in['total_in']>0)
            {
                $total_stock_in=$stock_in['total_in'];
            }*/

            ?>
            <tr>
                <td><?php echo $key+1;?></td>
                <td><?php echo $fertilizer['fertilizer_name'];?></td>
                <td><?php echo $total_stock_in;?></td>
                <td><?php echo $total_stock_out;?></td>
                <td><?php echo ($total_stock_in-$total_stock_out);?></td>




            </tr>
        <?php
        }
        ?>

        </tbody>
    </table>
</div>