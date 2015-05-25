<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
//echo '<pre>';
//print_r($crops);
//echo '</pre>';
//
//echo '<pre>';
//print_r($plot_setup);
//echo '</pre>';
$unit=10;
$length_space=ceil($plot_info['length_space']*$unit);
$width_space=ceil($plot_info['width_space']*$unit);
?>

<div class="widget-header">
    <div class="title">
        <?php echo $title; ?>
    </div>
    <div class="clearfix"></div>
</div>
<input type="hidden" name="year" value="<?php echo $year; ?>">
<input type="hidden" name="season_id" value="<?php echo $season_id; ?>">
<input type="hidden" name="plot_id" value="<?php echo $plot_id; ?>">
<input type="hidden" name="num_rows" value="<?php echo $num_rows; ?>">
<input type="hidden" name="length_space" value="<?php echo $plot_info['length_space']; ?>">
<input type="hidden" name="width_space" value="<?php echo $plot_info['width_space']; ?>">
<div style="width: <?php echo $plot_info['plot_length']*$unit+100; ?>px;height: <?php echo $plot_info['plot_width']*$unit; ?>px;" >

    <div style="width: 100px;height: <?php echo $plot_info['plot_width']*$unit; ?>px;float: left;" >
        <?php

        for($i=1;$i<=$num_rows;$i++)
        {
            $crop_length=ceil($plot_setup[$i]['crop_length']*$unit);
            $crop_width=ceil($plot_setup[$i]['crop_width']*$unit);
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

            for($i=1;$i<=$num_rows;$i++)
            {
                $crop_length=ceil($plot_setup[$i]['crop_length']*$unit);
                $crop_width=ceil($plot_setup[$i]['crop_width']*$unit);
                ?>
                <div style="width:<?php echo $plot_info['plot_length']*$unit; ?>px;height: <?php echo $crop_width+$width_space; ?>px;padding-top:<?php echo $width_space;?>px; ">
                    <input type="hidden" name="plot[<?php echo $i;?>][col_num]" value="<?php echo $plot_setup[$i]['col_num']; ?>">
                    <input type="hidden" name="plot[<?php echo $i;?>][crop_length]" value="<?php echo $crop_length; ?>">
                    <input type="hidden" name="plot[<?php echo $i;?>][crop_width]" value="<?php echo $crop_width; ?>">
                    <input type="hidden" name="plot[<?php echo $i;?>][crop_id]" value="<?php echo $plot_setup[$i]['crop_id']; ?>">
                    <?php
                    for($j=1;$j<=$plot_setup[$i]['col_num'];$j++)
                    {
                        ?>
                        <div style="width: <?php echo $crop_length;?>px;height: <?php echo $crop_width; ?>px; float: left;text-align: center;line-height: <?php echo $crop_width; ?>px;margin-left: <?php echo $length_space; ?>px;">

                            <select name="plot[<?php echo $i;?>][variety_id][<?php echo $j;?>]" class="form-control" style="height: 100%;">
                                <option value=""><?php echo $this->lang->line('SELECT');?></option>
                                <?php
                                foreach($crops[$plot_setup[$i]['crop_id']]['varieties'] as $variety)
                                {?>
                                    <option value="<?php echo $variety['id']?>" <?php if($variety['id']==$plot_setup[$i]['varieties_selected'][$j]){echo 'selected';} ?>><?php echo $variety['rnd_code'];?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <?php
            }
        ?>
    </div>
</div>