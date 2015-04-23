<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$data["link_back"]=base_url()."rnd_pesticide_stock_out";
$this->load->view("action_buttons_edit",$data);

//echo '<pre>';
//print_r($feriliser_info);
//echo '</pre>';
?>
<form class="form_valid" id="save_form" action="<?php echo base_url()?>rnd_pesticide_stock_out/index/save" method="post">
    <div class="row widget">
        <div class="widget-header">
            <div class="title">
                <?php echo $title; ?>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_PESTICIDE');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <select name="pesticide_id" id="pesticide_id" class="form-control validate[required]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php
                    foreach($pesticides as $pesticide)
                    {
                        ?>
                        <option value="<?php echo $pesticide['id']?>"><?php echo $pesticide['pesticide_name'];?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>

        </div>
        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_QUANTITY_STOCK_IN');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" name="pesticide_quantity" id="pesticide_quantity" class="form-control validate[required]" value="" >
            </div>
        </div>
        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_STOCK_OUT_DATE');?></label>
            </div>
            <div class="col-xs-4">
                <input type="text" name="stock_out_date" id="stock_out_date" class="form-control" value="">
            </div>
        </div>
        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_YEAR');?></label>
            </div>
            <div class="col-xs-4">

                <select id="year" name="year" class="form-control validate[required]">
                    <?php
                    $current_year=date("Y",time());
                    for($i=$this->config->item("start_year");$i<=($current_year+$this->config->item("next_year_range"));$i++)
                    {?>
                        <option value="<?php echo $i;?>" <?php if($i==$current_year){echo 'selected';}?>><?php echo $i;?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_SEASON');?></label>
            </div>
            <div class="col-xs-4">
                <select name="season_id" id="season_id" class="form-control validate[required]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
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
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SELECT_CROP');?><span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-xs-4">
                <select name="crop_id" id="crop_id" class="form-control validate[required]">
                    <option value=""><?php echo $this->lang->line('SELECT');?></option>
                    <?php
                    foreach($crops as $crop)
                    {?>
                        <option value="<?php echo $crop['id'];?>"><?php echo $crop['crop_name'];?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row show-grid" id="variety_list">

        </div>


    </div>

    <div class="clearfix"></div>
</form>
<script type="text/javascript">

    jQuery(document).ready(function()
    {
        //$(".form_valid").validationEngine();
        turn_off_triggers();

        $(document).on("change", "#year", function(event)
        {
            $("#variety_list").html("");
            $("#crop_id").val("");

        });
        $(document).on("change", "#season_id", function(event)
        {
            $("#variety_list").html("");
            $("#crop_id").val("");

        });
        $(document).on("change", "#crop_id", function(event)
        {
            $("#variety_list").html("");
            $("#crop_type_id").val("");
            var year = $("#year").val();
            var season_id=$("#season_id").val();
            var crop_id=$("#crop_id").val()

            if(crop_id>0 && season_id>0 && year>0 )
            {
                $.ajax({
                    url: base_url+"rnd_pesticide_stock_out/get_varieties/",
                    type: 'POST',
                    dataType: "JSON",
                    data:{year:year,season_id:season_id,crop_id:crop_id},
                    success: function (data, status)
                    {

                    },
                    error: function (xhr, desc, err)
                    {
                        console.log("error");

                    }
                });
            }
        });
//        $(document).on("change","#select_all_variety",function()
//        {
//            if($(this).is(':checked'))
//            {
//                $('.select_variety').prop('checked', true);
//            }
//            else
//            {
//                $('.select_variety').prop('checked', false);
//            }
//
//        });
        $( "#stock_out_date" ).datepicker({dateFormat : display_date_format});

    });
</script>