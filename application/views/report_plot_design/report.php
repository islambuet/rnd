<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
$variety_types=$this->config->item('variety_type');
//echo "<pre>";
//print_r($varieties);
//echo "</pre>";
//return;

if(sizeof($plot_info)>0)
{
    echo "<pre>";
    print_r($plot_info);
    echo "</pre>";
}
else
{
    ?>

        <div class="col-xs-12 text-center alert-danger">
            <?php echo $this->lang->line("NO_DATA_FOUND"); ?>
        </div>


<?php
}
