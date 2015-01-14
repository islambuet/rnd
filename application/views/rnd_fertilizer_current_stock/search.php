<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


?>
<form class="form_valid" id="save_form" action="<?php echo base_url()?>rnd_fertilizer_current_stock/index/report" method="post">
    <div class="row widget">
        <div class="widget-header">
            <div class="title">
                <?php echo $title; ?>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_FERTILIZER');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <select name="fertilizer_id" id="season_id" class="form-control validate[required]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php
                    foreach($fertilizer_info as $fertilizer)
                    {?>
                        <option value="<?php echo $fertilizer['id']?>" <?php //if($fertilizer['id']==$feriliserInfo['season_id']){ echo "selected";}?>><?php echo $fertilizer['fertilizer_name'];?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="col-xs-4">
                <input type="submit" class="btn btn-default btn-primary" name="search_report" value="Search">
            </div>
        </div>


    </div>

</form>
<div class="row widget" id="report_list">

</div>
