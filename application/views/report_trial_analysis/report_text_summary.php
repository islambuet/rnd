<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
//echo "<pre>";
//print_r($varieties);
//echo "</pre>";
?>
<div class="row show-grid">
    <div class="col-xs-12" style="overflow-x: auto">
        <table class="table table-hover table-bordered" >
            <thead class="hidden-print">
            <tr>
                <th></th>
                <th></th>
                <?php
                if(($report_name==0)||($report_name==1))
                {
                    ?>
                    <th><button data-link="<?php echo base_url();?>report_trial_analysis/index/report_text_details/1" class="btn bg-primary full_text_report"><?php echo $this->lang->line('FULL_REPORT');?></button> </th>
                    <?php
                }
                ?>
                <?php
                if(($report_name==0)||($report_name==2))
                {
                    ?>
                    <th><button data-link="<?php echo base_url();?>report_trial_analysis/index/report_text_details/2" class="btn bg-primary full_text_report"><?php echo $this->lang->line('FULL_REPORT');?></button> </th>
                <?php
                }
                ?>
                <?php
                if(($report_name==0)||($report_name==3))
                {
                    ?>
                    <th><button data-link="<?php echo base_url();?>report_trial_analysis/index/report_text_details/3" class="btn bg-primary full_text_report"><?php echo $this->lang->line('FULL_REPORT');?></button> </th>
                <?php
                }
                ?>
                <?php
                if(($report_name==0)||($report_name==5))
                {
                    ?>
                    <th><button data-link="<?php echo base_url();?>report_trial_analysis/index/report_text_details/5" class="btn bg-primary full_text_report"><?php echo $this->lang->line('FULL_REPORT');?></button> </th>
                <?php
                }
                ?>
                <?php
                if(($report_name==0)||($report_name==6))
                {
                    ?>
                    <th><button data-link="<?php echo base_url();?>report_trial_analysis/index/report_text_details/6" class="btn bg-primary full_text_report"><?php echo $this->lang->line('FULL_REPORT');?></button> </th>
                <?php
                }
                ?>
                <?php
                if(($report_name==0)||($report_name==7))
                {
                    ?>
                    <th><button data-link="<?php echo base_url();?>report_trial_analysis/index/report_text_details/7" class="btn bg-primary full_text_report"><?php echo $this->lang->line('FULL_REPORT');?></button> </th>
                <?php
                }
                ?>

            </tr>
            </thead>
            <tr style="font-weight: bold;">
                <td><?php echo $this->lang->line("SERIAL"); ?></td>
                <td><?php echo $this->lang->line("LABEL_RND_CODE"); ?></td>
                <?php
                if(($report_name==0)||($report_name==1))
                {
                    ?>
                    <td><?php echo 'Fortnightly Report'; ?></td>
                <?php
                }
                ?>
                <?php
                if(($report_name==0)||($report_name==2))
                {
                    ?>
                    <td><?php echo 'Flowering Report'; ?></td>
                <?php
                }
                ?>
                <?php
                if(($report_name==0)||($report_name==3))
                {
                    ?>
                    <td><?php echo 'Fruit Report'; ?></td>
                <?php
                }
                ?>
                <?php
                if(($report_name==0)||($report_name==5))
                {
                    ?>
                    <td><?php echo 'Harvest Compile Report'; ?></td>
                <?php
                }
                ?>
                <?php
                if(($report_name==0)||($report_name==6))
                {
                    ?>
                    <td><?php echo 'Yield Report'; ?></td>
                <?php
                }
                ?>
                <?php
                if(($report_name==0)||($report_name==7))
                {
                    ?>
                    <td><?php echo 'Final Report'; ?></td>
                <?php
                }
                ?>

            </tr>
                <?php
                    $index=0;
                    foreach($varieties as $variety)
                    {
                        ?>
                        <tr>
                            <td><?php echo ++$index; ?></td>
                            <td><?php echo System_helper::get_rnd_code($variety); ?></td>
                            <?php
                            if(($report_name==0)||($report_name==1))
                            {
                                ?>
                                <td>
                                    <?php
                                        if(isset($fortnightly[$variety['id']]['remarks']))
                                        {
                                            echo $fortnightly[$variety['id']]['remarks'];
                                        }
                                        else
                                        {
                                            echo $this->lang->line('NOT_SET');
                                        }

                                    ?>
                                </td>
                            <?php
                            }
                            ?>
                            <?php
                            if(($report_name==0)||($report_name==2))
                            {
                                ?>
                                <td>
                                    <?php
                                    if(isset($flowering[$variety['id']]['remarks']))
                                    {
                                        echo $flowering[$variety['id']]['remarks'];
                                    }
                                    else
                                    {
                                        echo $this->lang->line('NOT_SET');
                                    }

                                    ?>
                                </td>
                            <?php
                            }
                            ?>
                            <?php
                            if(($report_name==0)||($report_name==3))
                            {
                                ?>
                                <td>
                                    <?php
                                    if(isset($fruit[$variety['id']]['remarks']))
                                    {
                                        echo $fruit[$variety['id']]['remarks'];
                                    }
                                    else
                                    {
                                        echo $this->lang->line('NOT_SET');
                                    }

                                    ?>
                                </td>
                            <?php
                            }
                            ?>
                            <?php
                            if(($report_name==0)||($report_name==5))
                            {
                                ?>
                                <td>
                                    <?php
                                    if(isset($harvest_compile[$variety['id']]['remarks']))
                                    {
                                        echo $harvest_compile[$variety['id']]['remarks'];
                                    }
                                    else
                                    {
                                        echo $this->lang->line('NOT_SET');
                                    }

                                    ?>
                                </td>
                            <?php
                            }
                            ?>
                            <?php
                            if(($report_name==0)||($report_name==6))
                            {
                                ?>
                                <td>
                                    <?php
                                    if(isset($yield[$variety['id']]['remarks']))
                                    {
                                        echo $yield[$variety['id']]['remarks'];
                                    }
                                    else
                                    {
                                        echo $this->lang->line('NOT_SET');
                                    }

                                    ?>
                                </td>
                            <?php
                            }
                            ?>
                            <?php
                            if(($report_name==0)||($report_name==7))
                            {
                                ?>
                                <td>
                                    <?php
                                    if(isset($veg_fruit[$variety['id']]['remarks']))
                                    {
                                        echo $veg_fruit[$variety['id']]['remarks'];
                                    }
                                    else
                                    {
                                        echo $this->lang->line('NOT_SET');
                                    }

                                    ?>
                                </td>
                            <?php
                            }
                            ?>
                        </tr>
                        <?php
                    }
                ?>
            <tbody>
            </tbody>
        </table>

    </div>
</div>