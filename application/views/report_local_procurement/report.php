<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
$variety_types=$this->config->item('variety_type');
//echo "<pre>";
//print_r($varieties);
//echo "</pre>";
//return;


?>
<div class="row show-grid">
    <div class="col-xs-12" style="overflow-x: auto">
        <table class="table table-hover table-bordered" >
            <thead class="hidden-print">
            <tr>
                <th><?php echo $this->lang->line("LABEL_COMPANY_NAME"); ?></th>
                <th><?php echo $this->lang->line("LABEL_CROP_NAME"); ?></th>
                <th><?php echo $this->lang->line("LABEL_CROP_TYPE"); ?></th>
                <th><?php echo $this->lang->line("LABEL_VARIETY_NAME"); ?></th>
                <th><?php echo $this->lang->line("LABEL_RND_CODE"); ?></th>
                <th><?php echo $this->lang->line("LABEL_PRO_QUANTITY"); ?></th>
                <th><?php echo $this->lang->line("LABEL_CURRENT_STOCK"); ?></th>
                <th><?php echo $this->lang->line("LABEL_PRO_TIME"); ?></th>
                <th><?php echo $this->lang->line("LABEL_SAMPLE_READY_FOR_TRIAL"); ?></th>
                <th><?php echo $this->lang->line("LABEL_PREVIOUS_TRIAL"); ?></th>
            </tr>
            </thead>
            <tbody>
                <?php
                if(sizeof($varieties)>0)
                {
                    foreach($varieties as $variety)
                    {
                        ?>
                        <tr>
                            <td>
                                <?php
                                if($variety['variety_type']==3)//CKO
                                {
                                    echo $variety['company_name'];

                                }
                                elseif($variety['variety_type']==2)//CKA
                                {
                                    echo $variety_types[2];
                                }
                                elseif($variety['variety_type']==1)//PRINCIPAL
                                {

                                    echo $variety['principal_name'];
                                }
                                ?>
                            </td>
                            <td><?php echo $variety['crop_name'];?></td>
                            <td><?php echo $variety['type_name'];?></td>
                            <td><?php echo $variety['variety_name'];?></td>
                            <td><?php echo System_helper::get_rnd_code($variety);?></td>
                            <td><?php echo $variety['quantity'];?></td>
                            <td>
                                <?php
                                    if($variety['replica_status']==1)
                                    {
                                        echo ($variety['quantity']-2*$variety['total_send']);
                                    }
                                    else
                                    {
                                        echo ($variety['quantity']-$variety['total_send']);
                                    }
                                ?>
                            </td>
                            <td><?php echo System_helper::display_date($variety['creation_date']);?></td>
                            <td><?php echo $this->lang->line('LABEL_YES');?></td>
                            <td>
                                <?php
                                if($variety['variety_no']==1)//CKO
                                {
                                    echo $this->lang->line('LABEL_NO');

                                }
                                else
                                {
                                    echo $this->lang->line('LABEL_YES');
                                }
                                ?>
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
</div>
