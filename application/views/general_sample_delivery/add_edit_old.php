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

        <div class="row">
            <div class="col-lg-12">
                <table class="table" id="adding_elements">
                    <tr>
                        <td width="300px">
                            <label class="control-label pull-right" style="font-size: 12px;"><?php echo $this->lang->line('LABEL_SOWING_DATE');?><span style="color:#FF0000">*</span></label>
                        </td>

                        <td style="width:100px;">
                            <input type="text" name="sowing_date[]" id="sowing_date" class="form-control validate[required]" value="" >
                        </td>

                        <td style="width:100px;">
                            <label class="control-label pull-right" style="font-size: 12px;"><?php echo $this->lang->line('LABEL_SELECT_CROP');?><span style="color:#FF0000">*</span></label>
                        </td>

                        <td style="width:150px;">
                            <select name="crop_id[]" id="crop_id" class="form-control validate[required]">
                                <option value=""><?php echo $this->lang->line('SELECT')?></option>
                                <?php foreach($crops as $crop){?>
                                <option value="<?php echo $crop['id']?>"><?php echo $crop['crop_name']?></option>
                                <?php }?>
                            </select>
                        </td>

                        <td>
                            <a class="btn btn-primary btn-rect" style=""><?php echo $this->lang->line('LABEL_DELETE');?></a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-10" style="margin-left: 20px;">
                <input type="button" onclick="RowIncrement()" class="btn btn-primary btn-rect pull-right" value="<?php echo $this->lang->line('LABEL_ADD_MORE');?>">
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

    var ExId = 0;
    function RowIncrement()
    {
        //        alert('got');
        var table = document.getElementById('adding_elements');

        var rowCount = table.rows.length;
        //        alert(rowCount);

        var row = table.insertRow(rowCount);
        row.id = "T" + ExId;
        row.className = "table";
        //    alert(row.id);
        var cell1 = row.insertCell(0);
        cell1.innerHTML = "<label class='control-label pull-right' style='font-size:12px;'><?php echo $this->lang->line('LABEL_SOWING_DATE');?><span style='color:#FF0000'>*</span></label>";
        var cell1 = row.insertCell(1);
        cell1.innerHTML = "<input type='text' name='sowing_date[]' id='sowing_date" + ExId + "' class='form-control'/>" +
            "<input type='hidden' id='row_id' name='row_id[]' value=''/>";
        var cell1 = row.insertCell(2);
        cell1.innerHTML = "<label class='control-label pull-right' style='font-size:12px;'><?php echo $this->lang->line('LABEL_SELECT_CROP');?><span style='color:#FF0000'>*</span></label>";
        var cell1 = row.insertCell(3);
        cell1.innerHTML = "<select name='crop_id[]' id='crop_id" + ExId + "' class='form-control'>\n\
        <option value=''><?php echo $this->lang->line('SELECT');?></option>\n\
        <?php
        foreach ($crops as $crop)
            echo "<option value='" . $crop['id']."'>" . $crop['crop_name'] . "</option>";
        ?>";
        cell1 = row.insertCell(4);
        cell1.innerHTML = "<a class='btn btn-primary btn-rect' data-original-title='' onclick=\"RowDecrement('adding_elements','T" + ExId + "')\" ><?php echo $this->lang->line('LABEL_DELETE');?></a>";
        cell1.style.cursor = "default";
        document.getElementById("sowing_date" + ExId).focus();
        ExId = ExId + 1;
        //    $("#row_id").tableDnD();
    }


    function RowDecrement(adding_elements, id)
    {
        try {
            var table = document.getElementById(adding_elements);
            for (var i = 1; i < table.rows.length; i++)
            {
                if (table.rows[i].id == id)
                {
                    table.deleteRow(i);
                }
            }
        }
        catch (e) {
            alert(e);
        }
    }

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