<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
//echo '<pre>';
//print_r($crops);
//echo '</pre>';
//
//echo '<pre>';
//print_r($plot_setup);
//echo '</pre>';
$unit=10;
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
<?php
    for($i=1;$i<=$num_rows;$i++)
    {
        $crop_length=ceil($crops[$plot_setup[$i]['crop_id']]['crop_height']*$unit);
        $crop_width=ceil($crops[$plot_setup[$i]['crop_id']]['crop_width']*$unit);


        ?>
        <div style="width:<?php echo $plot_setup[$i]['col_num']*$crop_length;?>px;height: <?php echo $crop_width; ?>px;">
            <input type="hidden" name="plot[<?php echo $i;?>]['col_num']" value="<?php echo $plot_setup[$i]['col_num']; ?>">
            <input type="hidden" name="plot[<?php echo $i;?>]['crop_length']" value="<?php echo $crop_length; ?>">
            <input type="hidden" name="plot[<?php echo $i;?>]['crop_width']" value="<?php echo $crop_width; ?>">
            <?php
                for($j=1;$j<=$plot_setup[$i]['col_num'];$j++)
                {
                    ?>
                    <div style="width: <?php echo $crop_length;?>px;height: <?php echo $crop_width; ?>px; border: 1px solid #000000;float: left;">

                        <select name="plot[<?php echo $i;?>]['variety_id'][<?php echo $j;?>]" class="form-control">
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
