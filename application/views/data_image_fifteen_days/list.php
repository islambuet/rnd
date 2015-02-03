<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$dir=$this->config->item('dir');
echo "<pre>";
print_r($varieties[0]);
echo "</pre>";
echo System_helper::get_rnd_code($varieties[0],1);
?>
<div class="widget-header">
    <div class="title">
        <?php echo $title; ?>
    </div>
    <div class="clearfix"></div>
</div>
