<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

//echo '<pre>';
//print_r($procurements);
//echo '</pre>';
?>

<div class="col-sm-12">
    <table class="table table-hover table-bordered" style="font-size: 13px;">
        <thead>
        <tr>
            <th><?php echo $this->lang->line("LABEL_NAMES_OF_CROPS"); ?></th>
            <th><?php echo $this->lang->line("LABEL_CLASSIFICATION"); ?></th>
            <th><?php echo $this->lang->line("LABEL_VARIETY_NAME"); ?></th>
            <th><?php echo $this->lang->line("LABEL_COMPANY_NAME"); ?></th>
            <th><?php echo $this->lang->line("LABEL_TYPE"); ?></th>
            <th><?php echo $this->lang->line("LABEL_PROCUREMENT_DATE"); ?></th>
            <th><?php echo $this->lang->line("LABEL_QUANTITY"); ?></th>
            <th><?php echo $this->lang->line("LABEL_RND_CODE"); ?></th>
        </tr>
        </thead>

        <tbody>
        <?php
        foreach($procurements as $procurement)
        {
        ?>
            <tr>
                <td><?php echo $procurement['crop_name'];?></td>
                <td><?php echo $procurement['product_type'];?></td>
                <td><?php echo $procurement['variety_name'];?></td>
                <td><?php echo $procurement['company_name'];?></td>
                <td><?php echo $procurement['company_name'];?></td>
                <td><?php echo date('d-m-Y',$procurement['creation_date']);?></td>
                <td><?php echo $procurement['quantity'];?></td>
                <td><?php echo $procurement['rnd_code'];?></td>
            </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
</div>