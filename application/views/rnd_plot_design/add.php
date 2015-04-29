<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
$data["link_back"]="#";
$data["hide_back"]="1";
$this->load->view("action_buttons_edit",$data);
?>


    <div class="row widget">
        <div class="widget-header">
            <div class="title">
                <?php echo $title; ?>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_YEAR');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-xs-4">
                <select id="year" class="form-control validate[required]">
                    <?php
                    $current_year=date("Y",time());
                    for($i=$this->config->item("start_year");$i<=($current_year+$this->config->item("next_year_range"));$i++)
                    {?>
                        <option value="<?php echo $i;?>" <?php echo ($i==$current_year)?"selected":"";?>><?php echo $i;?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_SEASON');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-xs-4">
                <select id="season_id" class="form-control validate[required]">
                    <?php
                    foreach($seasons as $season)
                    {?>
                        <option value="<?php echo $season['id']?>"><?php echo $season['season_name'];?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_PART');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-xs-4">
                <select id="plot_id" class="form-control validate[required]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php
                    foreach($plots as $plot)
                    {?>
                        <option value="<?php echo $plot['id']?>"><?php echo $plot['plot_name'];?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_NUM_ROWS');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-xs-4">
                <input type="text" id="num_rows" class="form-control">
            </div>
        </div>
        <div class="row show-grid">
            <div class="col-xs-4">

            </div>
            <div class="col-xs-4">
                <input type="button" id="variety_button" class="form-control btn-primary" value="<?php echo $this->lang->line('LABEL_NEXT_STEP');?>" />
            </div>
        </div>
    </div>
<form class="form_valid" id="save_form" action="<?php echo base_url();?>rnd_plot_design/index/save" method="post">
    <div class="row widget hidden-print" id="variety_list">

    </div>
    <div class="row widget" id="report_list">

    </div>
</form>


