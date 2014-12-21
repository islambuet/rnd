<?php
$data["link_new"]=base_url()."create_crop/index/add";
$data["link_back"]=base_url()."create_crop";
$this->load->view("action_buttons_edit",$data);
?>
<form class="form_valid" id="save_form" action="<?php base_url()?>create_crop/index/save" method="post">
    <div class="row widget">
        <div class="widget-header">
            <div class="title">
                <?php echo $title; ?>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right">অর্থ প্রাপ্তির ধরন<span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <select class="form-control validate[required]" id="receive_source_type" name="receive_source_type">
                    <option value="">নির্বাচন করুন</option>
                    <option value="1">নগদ</option>
                    <option value="2">চেক</option>
                    <option value="3">ব্যাংক থেকে উত্তোলন</option>
                    <option value="6">ট্রান্সফার</option>
                </select>
            </div>
        </div>
        <div style="" class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right">ভাউচারের তারিখ<span style="color:#FF0000">*</span></label>
            </div>
            <div class="col-sm-4 col-xs-8">
                <input type="text" value="" class="form-control validate[required]" placeholder="" name="VoucherDate" id="VoucherDate">
            </div>
        </div>



    </div>
    <div class="clearfix"></div>
</form>
