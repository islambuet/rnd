<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    $data["link_new"]=base_url()."general_sample_delivery/index/add";
    $data["link_back"]=base_url()."general_sample_delivery";
    $this->load->view("action_buttons_edit",$data);

//echo '<pre>';
//print_r($cropInfo);
//echo '</pre>';
?>
<form class="form_valid" id="save_form" action="<?php base_url()?>general_sample_delivery/index/save" method="post">
    <div class="row widget">
        <div class="widget-header">
            <div class="title">
                <?php echo $title; ?>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_SEASON');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <select name="select_season" id="select_season" class="form-control validate[required]">
                    <option value="<?php echo $this->lang->line("SELECT");?>"><?php echo $this->lang->line("SELECT");?></option>
                </select>
            </div>
            <input type="hidden" name="crop_id" id="crop_id" value=""/>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_DESTINED_DELIVERY_DATE');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="destined_delivery_date" id="destined_delivery_date" class="form-control validate[required]" value="" >
            </div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_DELIVERED');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="radio" name="delivered" id="delivered" class="validate[required]" checked value=""> <?php echo $this->lang->line('YES');?>
                <input type="radio" name="delivered" id="delivered" class="validate[required]" value=""> <?php echo $this->lang->line('NO');?>
            </div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_DELIVERY_DATE');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="delivery_date" id="delivery_date" class="form-control validate[required]" value="" >
            </div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_RECEIVED');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="radio" name="received" id="received" class="validate[required]" checked value=""> <?php echo $this->lang->line('YES');?>
                <input type="radio" name="received" id="received" class="validate[required]" value=""> <?php echo $this->lang->line('NO');?>
            </div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_RND_RECEIVE_DATE');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="rnd_receive_date" id="rnd_receive_date" class="form-control validate[required]" value="" >
            </div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_DESTINED_SOWING_DATE');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="destined_sowing_date" id="destined_sowing_date" class="form-control validate[required]" value="" >
            </div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SOWING');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="radio" name="sowing" id="sowing" class="validate[required]" checked value=""> <?php echo $this->lang->line('YES');?>
                <input type="radio" name="sowing" id="sowing" class="validate[required]" value=""> <?php echo $this->lang->line('NO');?>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <table class="table" id="adding_elements">
                    <tr>
                        <td width="300px">
                            <label class="control-label pull-right" style="font-size: 12px;"><?php echo $this->lang->line('LABEL_SOWING_DATE');?><span style="color:#FF0000">*</span></label>
                        </td>

                        <td style="width:100px;">
                            <input type="text" name="destined_sowing_date" id="destined_sowing_date" class="form-control validate[required]" value="" >
                        </td>

                        <td style="width:100px;">
                            <label class="control-label pull-right" style="font-size: 12px;"><?php echo $this->lang->line('LABEL_SELECT_CROP');?><span style="color:#FF0000">*</span></label>
                        </td>

                        <td style="width:150px;">
                            <select name="crop_id" id="crop_id" class="form-control validate[required]">
                                <option value=""><?php echo $this->lang->line('SELECT')?></option>
                            </select>
                        </td>

                        <td>
                            <a class="btn" style=""><?php echo $this->lang->line('LABEL_DELETE');?></a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-12">
                    <input type="button" onclick="" class="btn btn-primary btn-rect pull-right col-lg-pull-1" value="<?php echo $this->lang->line('LABEL_ADD_MORE');?>">
                </div>
            </div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_REMARKS');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <textarea name="destined_sowing_date" id="destined_sowing_date" class="form-control validate[required]"></textarea>
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