<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    $data["link_new"]=base_url()."create_principal/index/add";
    $data["link_back"]=base_url()."create_principal";
    $this->load->view("action_buttons_edit",$data);

//echo '<pre>';
//print_r($principalInfo);
//echo '</pre>';
?>
<form class="form_valid" id="save_form" action="<?php echo base_url();?>create_principal/index/save" method="post">
    <input type="hidden" name="principal_id" id="principal_id" value="<?php echo $principalInfo['id'];?>"/>
    <div class="row widget">
        <div class="widget-header">
            <div class="title">
                <?php echo $title; ?>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_PRINCIPAL_NAME');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="principal_name" id="principal_name" class="form-control validate[required]" value="<?php echo $principalInfo['principal_name'];?>" >
            </div>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_PRINCIPAL_CODE');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="principal_code" id="principal_code" class="form-control validate[required]" <?php if(!empty($principalInfo['principal_code'])){echo 'readonly';}?> value="<?php echo $principalInfo['principal_code'];?>" >
            </div>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_CONTACT_PERSON');?></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="contact_person_name" id="contact_person_name" class="form-control" value="<?php echo $principalInfo['contact_person_name'];?>" >
            </div>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_EMAIL');?></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="email_id" id="email_id" class="form-control" value="<?php echo $principalInfo['email'];?>" >
            </div>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_CONTACT');?></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="contact_number" id="contact_number" class="form-control" value="<?php echo $principalInfo['contact_number'];?>" >
            </div>
        </div>

        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_ADDRESS');?></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <textarea name="address" id="address" class="form-control"><?php echo $principalInfo['address'];?></textarea>
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