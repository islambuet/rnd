<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
//echo '<pre>';
//print_r($crops);
//echo '</pre>';
$pix_width=100;
$pix_height=200;
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
        ?>
        <div style="width:<?php echo $plot_setup[$i]['col_num']*200;?>px;height: 200px;">
            <?php
                for($j=1;$j<=$plot_setup[$i]['col_num'];$j++)
                {
                    ?>
                    <div style="width: 200px;height: 200px; border: 1px solid #000000;float: left;">

                    </div>
                    <?php
                }
            ?>
        </div>
        <?php
    }
?>
