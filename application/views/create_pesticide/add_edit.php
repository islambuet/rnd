<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    $data["link_new"]=base_url()."create_pesticide/index/add";
    $data["link_back"]=base_url()."create_pesticide";
    $this->load->view("action_buttons_edit",$data);
?>
<form class="form_valid" id="save_form" action="<?php base_url()?>create_pesticide/index/save" method="post">
    <div class="row widget">
        <div class="widget-header">
            <div class="title">
                <?php echo $title; ?>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_PESTICIDE_NAME');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="pesticide_name" id="pesticide_name" class="form-control validate[required]" value="<?php echo $pesticideInfo['pesticide_name'];?>" >
            </div>
            <input type="hidden" name="pesticide_id" id="pesticide_id" value="<?php echo $pesticideInfo['id'];?>"/>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('STATUS');?></label>
            </div>

            <div class="col-sm-4 col-xs-8">
                <select name="status" id="status" class="form-control validate[required]">
                    <option value="<?php echo $this->config->item('active');?>" <?php if($this->config->item('active')==$pesticideInfo['status']){ echo "selected";}?>><?php echo $this->lang->line('ACTIVE');?></option>
                    <option value="<?php echo $this->config->item('inactive');?>" <?php if($this->config->item('inactive')==$pesticideInfo['status']){ echo "selected";}?>><?php echo $this->lang->line('INACTIVE');?></option>
                </select>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</form>
<script type="text/javascript">

    jQuery(document).ready(function()
    {
        $(".form_valid").validationEngine();

    });
</script>