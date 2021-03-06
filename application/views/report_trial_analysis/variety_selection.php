<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

?>

<div class="widget-header">
    <div class="title">
        <?php echo $title; ?>
    </div>
    <div class="clearfix"></div>
</div>

<div class="row show-grid">
    <div class="col-xs-12 text-center">
        <input type="checkbox" id="select_all_variety" style="margin-right: 5px;">SELECT ALL
    </div>
</div>
<form class="form_valid" id="report_form" action="<?php echo base_url();?>report_trial_analysis/index/report" method="post">
    <input type="hidden" name="year" value="<?php echo $year; ?>">
    <input type="hidden" name="season_id" value="<?php echo $season_id; ?>">
    <input type="hidden" name="crop_id" value="<?php echo $crop_id; ?>">
    <input type="hidden" name="crop_type_id" value="<?php echo $crop_type_id; ?>">
    <div class="row show-grid">

        <table class="table table-hover table-bordered" style="font-size: 13px;">
            <tr>
                <?php
                    $i=0;
                    foreach($varieties as $variety)
                    {
                        ?>
                            <td><input type="checkbox" class="select_variety" name="varieties[]" value="<?php echo $variety['id'];?>" style="margin-right: 5px;"><?php echo System_helper::get_rnd_code($variety);?></td>
                        <?php
                        $i++;
                        if($i==6)
                        {
                            $i=0;
                            ?>
                            </tr><tr>
                            <?php
                        }
                    }
                ?>
            </tr>

        </table>
    </div>


    <?php $this->load->view('report_trial_analysis/report_type_selection');?>
</form>