<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

?>
<div class="col-xs-4">
    <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_RND_CODE');?><span style="color:#FF0000">*</span></label>
</div>
<div class="col-xs-4">
    <select name="varieties" id="varieties" class="form-control validate[required]">
        <option value=""><?php echo $this->lang->line('SELECT');?></option>
        <?php
        foreach($varieties as $variety)
        {?>
            <option value="<?php echo $variety['id'];?>"><?php echo System_helper::get_rnd_code($variety);?></option>
        <?php
        }
        ?>
    </select>
</div>
