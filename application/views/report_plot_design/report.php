<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
$variety_types=$this->config->item('variety_type');
//echo "<pre>";
//print_r($plot_info);
//echo "</pre>";
//return;


if(sizeof($plot_info)>0)
{
    $unit=10;
    $length_space=ceil($plot_info['length_space']*$unit);
    $width_space=ceil($plot_info['width_space']*$unit);
    $infos=json_decode($plot_info['plot_info'],true);
    $num_rows=$plot_info['num_rows'];

    ?>
    <div style="width: <?php echo $plot_info['plot_length']*$unit+100; ?>px;height: <?php echo $plot_info['plot_width']*$unit; ?>px;" >
        <div style="width: 100px;height: <?php echo $plot_info['plot_width']*$unit; ?>px;float: left;" >
            <?php

            for($i=1;$i<=$num_rows;$i++)
            {
                $crop_length=$infos[$i]['crop_length'];
                $crop_width=$infos[$i]['crop_width'];
                ?>
                <div style="width: 100px;height: <?php echo $crop_width; ?>px; border: 1px solid #000000;text-align: center;line-height: <?php echo $crop_width; ?>px;margin-top:<?php echo $width_space;?>px;">
                    <?php
                    echo $i;
                    ?>
                </div>
            <?php
            }
            ?>
        </div>
    <div style="width: <?php echo $plot_info['plot_length']*$unit; ?>px;height: <?php echo $plot_info['plot_width']*$unit; ?>px;background-color: gray;float: right;" >
        <?php
        for($i=1;$i<=$plot_info['num_rows'];$i++)
        {
            $crop_length=$infos[$i]['crop_length'];
            $crop_width=$infos[$i]['crop_width'];
            ?>
            <div style="width:<?php echo $plot_info['plot_length']*$unit; ?>px;height: <?php echo $crop_width+$width_space; ?>px;padding-top:<?php echo $width_space;?>px; ">

                <?php
                for($j=1;$j<=$infos[$i]['col_num'];$j++)
                {
                    ?>
                    <div style="width: <?php echo $crop_length;?>px;height: <?php echo $crop_width; ?>px;border: 1px solid #000000; float: left;text-align: center;line-height: <?php echo $crop_width; ?>px;margin-left: <?php echo $length_space; ?>px;background-color: white">
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
        ?>
    </div>
    <?php
    /*for($i=1;$i<=$plot_info['num_rows'];$i++)
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

    }*/
}
else
{
    ?>

        <div class="col-xs-12 text-center alert-danger">
            <?php echo $this->lang->line("NO_DATA_FOUND"); ?>
        </div>


<?php
}
