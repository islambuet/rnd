<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    $data["link_back"]=base_url()."setup_text_fruit";
    $this->load->view("action_buttons_edit",$data);

//echo '<pre>';
//print_r($columns);
//echo '</pre>';

?>
<form id="save_form" action="<?php echo base_url();?>setup_text_fruit/index/save" method="post">
    <input type="hidden" name="crop_id" value="<?php echo $columns['crop_id'];?>"/>
    <div class="row widget">
        <div class="widget-header">
            <div class="title">
                <?php echo $title; ?>
            </div>
            <div class="clearfix"></div>
        </div>
        <?php
        foreach($columns as $key=>$column)
        {
            if(($key=="id")||($key=="crop_id")||($key=="status")||($key=="created_by")||($key=="creation_date")||($key=="modified_by")||($key=="modification_date"))
            {
                continue;
            }
            ?>
            <div class="row show-grid">
                <div class="col-xs-4">
                    <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_'.strtoupper($key));?></label>
                </div>
                <div class="col-xs-1">
                    <input type="checkbox" name="columns[]" class="" value="<?php echo $key;?>" <?php if($column==1) echo "checked";?> >
                </div>
                <div class="col-xs-4">
                    <label class="control-label"><?php echo $key;?></label>
                </div>
            </div>
            <?php
        }
        ?>

    </div>

    <div class="clearfix"></div>
</form>