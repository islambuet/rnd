<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    $data["link_new"]=base_url()."create_pesticide/index/add";
    $data["link_back"]=base_url()."create_pesticide";
    $this->load->view("action_buttons_edit",$data);
?>
<form class="form_valid" id="save_form" action="<?php echo base_url();?>create_pesticide/index/save" method="post">
    <input type="hidden" name="pesticide_id" id="pesticide_id" value="<?php echo $pesticideInfo['id'];?>"/>
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

        </div>
        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_UNIT');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <select name="pesticide_unit" class="form-control validate[required]">

                    <option value="gm" <?php if('gm'==$pesticideInfo['unit']){ echo "selected";}?>>gm</option>
                    <option value="ml" <?php if('ml'==$pesticideInfo['unit']){ echo "selected";}?>>ml</option>

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