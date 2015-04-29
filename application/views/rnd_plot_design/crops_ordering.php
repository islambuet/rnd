<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
//echo '<pre>';
//print_r($crops);
//echo '</pre>';
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
<div class="row show-grid">
    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th><?php echo $this->lang->line("LABEL_ROW_NO"); ?></th>
            <th><?php echo $this->lang->line("LABEL_CROP_NAME"); ?></th>
            <th><?php echo $this->lang->line("LABEL_NUM_COLUMNS"); ?></th>

        </tr>
        </thead>

        <tbody>
        <?php
        if(sizeof($crops)>0)
        {
            for($i=1;$i<=$num_rows;$i++)
            {
                ?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td>
                        <select name="plot_setup[<?php echo $i;?>][crop_id]" class="form-control">
                            <?php
                            foreach($crops as $crop)
                            {?>
                                <option value="<?php echo $crop['crop_id']?>"><?php echo $crop['crop_name'].'('.$crop['total_variety'].')';?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </td>
                    <td>
                        <input type="text" name="plot_setup[<?php echo $i;?>][col_num]" class="form-control">
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
<div class="row show-grid">
    <div class="col-xs-4">
    </div>
    <div class="col-xs-4">
        <input type="button" id="load_report" class="form-control btn-primary" value="<?php echo $this->lang->line('LABEL_LOAD_PLOT');?>" />
    </div>
</div>

