<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
//echo "<pre>";
//print_r($varieties);
//echo "</pre>";
//echo "<pre>";
//print_r($delivery_and_sowing_info);
//echo "</pre>";
//echo "<pre>";
//print_r($fortnightly);
//echo "</pre>";

?>
<div class="row show-grid">
    <div class="col-xs-12" style="overflow-x: auto">
        <table class="table table-hover table-bordered" >
            <thead class="hidden-print">
            <tr>
                <th><?php echo $this->lang->line("SERIAL"); ?></th>
                <th><?php echo $this->lang->line("LABEL_RND_CODE"); ?></th>
                <?php
                    if($options['sowing_date']==1){
                        ?>
                        <th><?php echo $this->lang->line('LABEL_SOWING_DATE');?></th>
                        <?php
                    }
                ?>
                <?php
                if($options['transplanting_date']==1){
                    ?>
                    <th><?php echo $this->lang->line('LABEL_EXPECTED_TRANSPLANTING_DATE');?></th>
                    <th><?php echo $this->lang->line('LABEL_TRANSPLANTING_DATE');?></th>
                <?php
                }
                ?>
                <th><?php echo $this->lang->line('LABEL_REPORTING_DATE');?></th>
            </tr>
            </thead>
                <?php
                    $index=0;
                    foreach($varieties as $variety)
                    {
                        $info_normal=null;
                        $info_replica=null;
                        if(isset($fortnightly[$variety['id']]))
                        {
                            $info=json_decode($fortnightly[$variety['id']]['info'],true);
                            $info_normal=$info['normal'];
                            if(isset($info['replica']))
                            {
                                $info_replica=$info['replica'];
                            }
                        }
                        ?>
                        <tr>
                            <td><?php echo ++$index; ?></td>
                            <td><?php echo System_helper::get_rnd_code($variety); ?></td>
                            <?php
                            if($options['sowing_date']==1)
                            {
                                ?>
                                <td>
                                    <?php
                                        echo System_helper::display_date($delivery_and_sowing_info['sowing_date']);
                                    ?>
                                </td>
                                <?php
                            }
                            ?>
                            <?php
                            if($options['transplanting_date']==1)
                            {
                                ?>
                                <td>
                                    <?php
                                    if($variety['optimum_transplanting_days'])
                                    {
                                        echo System_helper::display_date(($variety['optimum_transplanting_days']*60*60*24)+$delivery_and_sowing_info['sowing_date']);
                                    }
                                    else
                                    {
                                        echo $this->lang->line("LABEL_NOT_SET");
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if($delivery_and_sowing_info['transplanting_date'])
                                    {
                                        echo System_helper::display_date($delivery_and_sowing_info['transplanting_date']);
                                    }
                                    else
                                    {
                                        echo $this->lang->line("LABEL_NOT_SET");
                                    }
                                    ?>
                                </td>
                            <?php
                            }
                            ?>
                            <td>
                                <?php
                                    if($info_normal && $info_normal['actual_reporting_date'])
                                    {
                                        echo $info_normal['actual_reporting_date'];
                                    }
                                    else
                                    {
                                        echo $this->lang->line("LABEL_NOT_SET");
                                    }
                                ?>
                            </td>
                        </tr>
                        <?php
                        if($variety['replica_status'])
                        {
                            ?>
                            <tr>
                                <td><?php echo $index; ?></td>
                                <td><?php echo System_helper::get_rnd_code($variety); ?></td>
                                <?php
                                if($options['sowing_date']==1)
                                {
                                    ?>
                                    <td>
                                        <?php
                                        echo System_helper::display_date($delivery_and_sowing_info['sowing_date']);
                                        ?>
                                    </td>
                                <?php
                                }
                                ?>
                                <?php
                                if($options['transplanting_date']==1)
                                {
                                    ?>
                                    <td>
                                        <?php
                                        if($variety['optimum_transplanting_days'])
                                        {
                                            echo System_helper::display_date(($variety['optimum_transplanting_days']*60*60*24)+$delivery_and_sowing_info['sowing_date']);
                                        }
                                        else
                                        {
                                            echo $this->lang->line("LABEL_NOT_SET");
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if($delivery_and_sowing_info['transplanting_date'])
                                        {
                                            echo System_helper::display_date($delivery_and_sowing_info['transplanting_date']);
                                        }
                                        else
                                        {
                                            echo $this->lang->line("LABEL_NOT_SET");
                                        }
                                        ?>
                                    </td>
                                <?php
                                }
                                ?>
                                <td>
                                    <?php
                                    if($info_normal && $info_normal['actual_reporting_date'])
                                    {
                                        echo $info_normal['actual_reporting_date'];
                                    }
                                    else
                                    {
                                        echo $this->lang->line("LABEL_NOT_SET");
                                    }
                                    ?>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                ?>
            <tbody>
            </tbody>
        </table>

    </div>
</div>