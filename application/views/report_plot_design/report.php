<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
$variety_types=$this->config->item('variety_type');
//echo "<pre>";
//print_r($varieties);
//echo "</pre>";
//return;

if(sizeof($plot_info)>0)
{
    $infos=json_decode($plot_info['plot_info'],true);

    for($i=1;$i<=$plot_info['num_rows'];$i++)
    {
        ?>
            <div style="width:<?php echo $infos[$i]['col_num']*$infos[$i]['crop_length']+100;?>px;height: <?php echo $infos[$i]['crop_width']; ?>px;">
                <div style="width: 100px;height: <?php echo $infos[$i]['crop_width']; ?>px; border: 1px solid #000000;float: left;text-align: center;line-height: <?php echo $infos[$i]['crop_width']; ?>px;">
                    <?php
                    echo $i;
                    ?>
                </div>
                <?php
                    for($j=1;$j<=$infos[$i]['col_num'];$j++)
                    {
                        ?>
                        <div style="width: <?php echo $infos[$i]['crop_length'];?>px;height: <?php echo $infos[$i]['crop_width']; ?>px; border: 1px solid #000000;float: left;text-align: center;line-height: <?php echo $infos[$i]['crop_width']; ?>px;">
                            <?php
                                $id=$infos[$i]['variety_id'][$j];
                                if(isset($plot_info['varieties'][$id]))
                                {
                                    echo $plot_info['varieties'][$id];
                                }
                                else
                                {
                                    echo '---';
                                }

                            ?>

                        </div>
                        <?php
                    }
                ?>
            </div>
        <?php

    }
}
else
{
    ?>

        <div class="col-xs-12 text-center alert-danger">
            <?php echo $this->lang->line("NO_DATA_FOUND"); ?>
        </div>


<?php
}
