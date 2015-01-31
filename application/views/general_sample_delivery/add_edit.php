<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    if($sample['sowing_status']==1)
    {
        $data["hide_save"]=1;
    }
    $data["link_back"]=base_url()."general_sample_delivery";
    $this->load->view("action_buttons_edit",$data);
?>

<form class="form_valid" id="save_form" action="<?php echo base_url();?>general_sample_delivery/index/save" method="post">
    <input type="hidden" name="sample_id" value="<?php echo $sample['id']?>">
    <div class="row widget">
        <div class="widget-header">
            <div class="title">
                <?php echo $title; ?>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_YEAR');?></label>
            </div>
            <div class="col-xs-4">
                <label class="control-label"><?php echo $sample['year'];?></label>
            </div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SEASON');?></label>
            </div>
            <div class="col-xs-4">
                <label class="control-label"><?php echo $sample['season_name'];?></label>
            </div>
        </div>

        <div class="row show-grid">
            <div class="col-xs-4">
                <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_CROP_NAME');?></label>
            </div>
            <div class="col-xs-4">
                <label class="control-label"><?php echo $sample['crop_name'];?></label>
            </div>
        </div>
        <div class="widget-header">
            <div class="title">
                <?php echo "Variety Not Sent For RND"; ?>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="row show-grid">
            <div class="col-xs-12">
                <table class="table table-hover table-bordered" style="font-size: 13px;">
                    <thead>
                    <tr>
                        <th><?php echo $this->lang->line("SERIAL"); ?></th>
                        <th><?php echo $this->lang->line("LABEL_VARIETY_NAME"); ?></th>
                        <th><?php echo $this->lang->line("LABEL_RND_CODE"); ?></th>
                        <th><?php echo $this->lang->line("LABEL_CROP_TYPE"); ?></th>

                    </tr>
                    </thead>

                    <tbody>

                    </tbody>
                </table>

            </div>
        </div>
        <div class="widget-header">
            <div class="title">
                <?php echo "Variety Sent For RND"; ?>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="row show-grid">
            <div class="col-xs-12">
                <table class="table table-hover table-bordered" style="font-size: 13px;">
                    <thead>
                    <tr>
                        <th><?php echo $this->lang->line("SERIAL"); ?></th>
                        <th><?php echo $this->lang->line("LABEL_VARIETY_NAME"); ?></th>
                        <th><?php echo $this->lang->line("LABEL_RND_CODE"); ?></th>
                        <th><?php echo $this->lang->line("LABEL_CROP_TYPE"); ?></th>

                    </tr>
                    </thead>

                    <tbody>

                    </tbody>
                </table>

            </div>
        </div>



    </div>

    <div class="clearfix"></div>
</form>
<script type="text/javascript">

    jQuery(document).ready(function()
    {
//        $(".form_valid").validationEngine();

    });


</script>