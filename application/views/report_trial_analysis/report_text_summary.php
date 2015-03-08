<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

?>
<div class="row show-grid">
    <div class="col-xs-12">
        <table class="table table-hover table-bordered" style="overflow-x: scroll">
            <thead>
            <tr>
                <th><?php echo $this->lang->line("SERIAL"); ?></th>
                <th><?php echo $this->lang->line("LABEL_RND_CODE"); ?></th>
                <?php
                if(($report_name==0)||($report_name==1))
                {
                    ?>
                    <th><?php echo 'Fortnightly Report'; ?></th>
                    <?php
                }
                ?>
                <?php
                if(($report_name==0)||($report_name==2))
                {
                    ?>
                    <th><?php echo 'Flowering Report'; ?></th>
                <?php
                }
                ?>
                <?php
                if(($report_name==0)||($report_name==3))
                {
                    ?>
                    <th><?php echo 'Fruit Report'; ?></th>
                <?php
                }
                ?>
                <?php
                if(($report_name==0)||($report_name==5))
                {
                    ?>
                    <th><?php echo 'Harvest Compile Report'; ?></th>
                <?php
                }
                ?>
                <?php
                if(($report_name==0)||($report_name==6))
                {
                    ?>
                    <th><?php echo 'Yield Report'; ?></th>
                <?php
                }
                ?>
                <?php
                if(($report_name==0)||($report_name==7))
                {
                    ?>
                    <th><?php echo 'Final Report'; ?></th>
                <?php
                }
                ?>

            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

    </div>
</div>