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

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SOWING_DATE');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="sowing_date" id="sowing_date" class="form-control validate[required]" value="" >
            </div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_CROP_VARIETY');?></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <textarea name="crop_variety" id="crop_variety" class="form-control" disabled>

                </textarea>
            </div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_REMARKS');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <textarea name="remarks" id="remarks" class="form-control validate[required]"></textarea>
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

    $(document).on("change", "#select_season", function(event)
    {
        var season_id = $("#select_season").val();

        $.ajax({
            url: base_url+"rnd_common/load_variety_by_season/",
            type: 'POST',
            dataType: "JSON",
            data:{season_id:season_id},
            success: function (data, status)
            {
                var varieties = '';
                for(var i=0;i<data.length;i++)
                {
                    varieties += data[i]['variety_name'];
                }
                $("#crop_variety").html(varieties);
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