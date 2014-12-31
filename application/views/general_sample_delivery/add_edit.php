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
                <select name="season_id" id="season_id" class="form-control validate[required]">
                    <option value=""><?php echo $this->lang->line("SELECT");?></option>
                    <?php foreach($seasons as $season){?>
                    <option value="<?php echo $season['id']?>"><?php echo $season['season_name']?></option>
                    <?php }?>
                </select>
            </div>
            <input type="hidden" name="sample_id" id="sample_id" value=""/>
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
                <input type="radio" name="delivered" id="delivered" class="validate[required]" value="<?php echo $this->config->item('sample_delivery_delivered_status_yes');?>"> <?php echo $this->lang->line('YES');?>
                <input type="radio" name="delivered" id="delivered" class="validate[required]" checked value="<?php echo $this->config->item('sample_delivery_delivered_status_no');?>"> <?php echo $this->lang->line('NO');?>
            </div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_DELIVERY_DATE');?></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="delivery_date" id="delivery_date" class="form-control" value="" >
            </div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_RECEIVED');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="radio" name="received" id="received" class="validate[required]" value="<?php echo $this->config->item('sample_delivery_received_status_yes');?>"> <?php echo $this->lang->line('YES');?>
                <input type="radio" name="received" id="received" class="validate[required]" checked value="<?php echo $this->config->item('sample_delivery_received_status_no');?>"> <?php echo $this->lang->line('NO');?>
            </div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_RND_RECEIVE_DATE');?></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="rnd_receive_date" id="rnd_receive_date" class="form-control" value="" >
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
                <input type="radio" name="sowing" id="sowing" class="validate[required]" value="<?php echo $this->config->item('sample_delivery_sowing_status_yes');?>"> <?php echo $this->lang->line('YES');?>
                <input type="radio" name="sowing" id="sowing" class="validate[required]" checked value="<?php echo $this->config->item('sample_delivery_sowing_status_no');?>"> <?php echo $this->lang->line('NO');?>
            </div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SOWING_DATE');?></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="sowing_date" id="sowing_date" class="form-control" value="" >
            </div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_RND_CODE');?></label>
            </div>
            <div class="col-sm-4 col-xs-8" id="load_rnd_code">
                <table class="table table-condensed table-striped table-bordered table-hover no-margin">
                    <thead>
                        <tr>
                            <th>
                                <input type="checkbox" name="" id="" class="checkAll" checked="" /><?php echo $this->lang->line('All Select (R&D Code)');?>
                            </th>
                        </tr>
                    </thead>
                    <tbody id="div_rnd_code">
                        <tr class='first_row_id'><td colspan='21' style='text-align: center;' class='btn-warning2'><?php echo $this->lang->line('LABEL_NO_DATA_AVAILABLE');?></td></tr>
                        <tr>
                            <td>
<!--                                <input type='checkbox' name='rnd_code[]' id='rnd_code' value='' />-->
<!--                                <input type='hidden' name='row_id[]' id='row_id' value='' />-->
                            </td>
                        </tr>
                    </tbody>

                </table>
            </div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_REMARKS');?></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <textarea name="remarks" id="remarks" class="form-control"></textarea>
            </div>
        </div>

    </div>
    <div class="clearfix"></div>
</form>

<script type="text/javascript">

    jQuery(document).ready(function()
    {
        $(".form_valid").validationEngine();


        $('.checkAll').click(function(event)
        {
            if(this.checked)
            {
                $('.checksingle').each(function()
                {
                    this.checked = true;
                });
            }
            else
            {
                $('.checksingle').each(function()
                {
                    this.checked = false;
                });
            }
        });

    });


    $(document).on("change", "#season_id", function(event)
    {
        var season_id = $("#season_id").val();

        $.ajax({
            url: base_url+"rnd_common/load_variety_by_season/",
            type: 'POST',
            dataType: "JSON",
            data:{season_id:season_id},
            success: function (data, status)
            {
                var rnd_code_view = '';
                for(var i=0;i<data.length;i++)
                {
                    rnd_code_view += "<tr><td><input type='hidden' id='row_id[]' name='row_id[]' value='' /> \n\
                    <input type='checkbox' id='rnd_code[]' name='rnd_code[]' value='"+data[i]['rnd_id']+"' class='checksingle' checked='' /> "+data[i]['rnd_code']+"</tr></td>";
                }
                // console.log(rnd_code_view);
                $("#div_rnd_code").html(rnd_code_view);

            },
            error: function (xhr, desc, err)
            {
                console.log("error");

            }
        });

    });



    Calendar.setup({
        inputField: "destined_delivery_date",
        trigger: "destined_delivery_date",
        onSelect: function() {
            this.hide()
        },
        showTime: 12,
        dateFormat: "%Y-%m-%d"
    });

    Calendar.setup({
        inputField: "delivery_date",
        trigger: "delivery_date",
        onSelect: function() {
            this.hide()
        },
        showTime: 12,
        dateFormat: "%Y-%m-%d"
    });

    Calendar.setup({
        inputField: "rnd_receive_date",
        trigger: "rnd_receive_date",
        onSelect: function() {
            this.hide()
        },
        showTime: 12,
        dateFormat: "%Y-%m-%d"
    });

    Calendar.setup({
        inputField: "destined_sowing_date",
        trigger: "destined_sowing_date",
        onSelect: function() {
            this.hide()
        },
        showTime: 12,
        dateFormat: "%Y-%m-%d"
    });

    Calendar.setup({
        inputField: "sowing_date",
        trigger: "sowing_date",
        onSelect: function() {
            this.hide()
        },
        showTime: 12,
        dateFormat: "%Y-%m-%d"
    });
</script>