<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

//echo '<pre>';
//print_r($labour_activity_infos);
//echo '</pre>';
?>

<div class="col-sm-12">
    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th><?php echo $this->lang->line("SERIAL"); ?></th>
            <th><?php echo $this->lang->line("Season"); ?></th>
            <th><?php echo $this->lang->line("Crop"); ?></th>
            <th><?php echo $this->lang->line("Variety"); ?></th>
            <th><?php echo $this->lang->line("Activity"); ?></th>
            <th><?php echo $this->lang->line("Date"); ?></th>
            <th><?php echo $this->lang->line("Number of Labour"); ?></th>
            <th><?php echo $this->lang->line("Remarks"); ?></th>

        </tr>
        </thead>

        <tbody>
        <?php
        foreach($labour_activity_infos as $key=>$labour_activity_info)
        {
//            $total_stock_in=get_stock($fertilizer['id'],$stock_in_infos);
//            $total_stock_out=get_stock($fertilizer['id'],$stock_out_infos);
            /*$total_stock_in=0;
            $total_stock_out=get_stock_out($stock_in['id'],$stock_out_infos);
            if($stock_in['total_in']>0)
            {
                $total_stock_in=$stock_in['total_in'];
            }*/

            ?>
            <tr>
                <td><?php echo $key+1;?></td>
                <td><?php echo $labour_activity_info['season_name'];?></td>
                <td><?php echo $labour_activity_info['crop_name'];?></td>
                <td><?php echo $labour_activity_info['variety_name'];?></td>
                <td><?php echo $labour_activity_info['labor_activity_name'];?></td>
                <td><?php echo date('d-m-Y',$labour_activity_info['activity_date']);?></td>


                <td><?php echo $labour_activity_info['number_of_labor'];?></td>
                <td><?php echo $labour_activity_info['remark'];?></td>



            </tr>
        <?php
        }
        ?>

        </tbody>
    </table>
</div>