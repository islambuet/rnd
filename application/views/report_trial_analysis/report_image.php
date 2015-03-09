<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
//echo "<pre>";
//print_r($varieties);
//echo "</pre>";
//echo $max_15_days;
//echo "<pre>";
//print_r($fruit_type_name);
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
                    <th colspan="<?php echo $max_15_days; ?>" class="text-center"><?php echo 'Fortnightly Report'; ?></th>
                <?php
                }
                ?>
                <?php
                if(($report_name==0)||($report_name==2))
                {
                    $flowering_image_config=$this->config->item('flowering_image');
                    ?>
                    <th colspan="<?php echo sizeof($flowering_image_config); ?>" class="text-center"><?php echo 'Flowering Report'; ?></th>
                    <?php
                }
                ?>
                <?php
                if(($report_name==0)||($report_name==3))
                {
                    $fruit_image_config=$this->config->item('fruit_image');
                    ?>
                    <th colspan="<?php echo sizeof($fruit_image_config); ?>" class="text-center"><?php echo 'Fruit Report'; ?></th>
                <?php
                }
                ?>
                <?php
                if(($report_name==4))
                {
                    ?>
                    <th colspan="<?php echo $max_harvest; ?>" class="text-center"><?php echo 'Harvest Report'; ?></th>

                <?php
                }
                ?>

            </tr>
            </thead>
            <tr style="font-weight: bold; font-size: 14px;">
                <td><?php echo $this->lang->line("SERIAL"); ?></td>
                <td><?php echo $this->lang->line("LABEL_RND_CODE"); ?></td>
                <?php
                if(($report_name==0)||($report_name==1))
                {
                    for($i=1;$i<=$max_15_days;$i++)
                    {
                        ?>
                        <td class="text-center"><?php echo $i*15; ?></td>
                        <?php
                    }
                }
                ?>
                <?php
                if(($report_name==0)||($report_name==2))
                {
                    foreach($flowering_image_config as $key=>$text)
                    {
                        ?>
                        <td class="text-center"><?php echo $text; ?></td>

                        <?php
                    }
                }
                ?>
                <?php
                if(($report_name==0)||($report_name==3))
                {
                    foreach($fruit_image_config as $key=>$text)
                    {
                        ?>
                        <td class="text-center"><?php echo sprintf($text,$fruit_type_name); ?></td>
                        <?php
                    }
                }
                ?>
                <?php
                if(($report_name==4))
                {
                    for($i=1;$i<=$max_harvest;$i++)
                    {
                        ?>
                        <td class="text-center"><?php echo $i; ?></td>
                    <?php
                    }
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