<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    if($sample['sowing_status']==1)
    {
        $data["hide_save"]=1;
    }
    $data["link_back"]=base_url()."general_sample_delivery";
    $this->load->view("action_buttons_edit",$data);
?>
<div class="row widget">
    <div class="widget-header">
        <div class="title">
            <?php echo $title; ?>
        </div>
        <div class="clearfix"></div>
    </div>

    <div class="row show-grid">
        <div class="col-xs-6">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_YEAR');?></label>
        </div>
        <div class="col-xs-2">
            <label class="form-control"><?php echo $sample['year'];?></label>
        </div>
    </div>

    <div class="row show-grid">
        <div class="col-xs-6">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SEASON');?></label>
        </div>
        <div class="col-xs-2">
            <label class="form-control"><?php echo $sample['season_name'];?></label>
        </div>
    </div>

    <div class="row show-grid">
        <div class="col-xs-6">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_CROP_NAME');?></label>
        </div>
        <div class="col-xs-2">
            <label class="form-control"><?php echo $sample['crop_name'];?></label>
        </div>
    </div>
    <div class="row show-grid">
        <div class="col-xs-6">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_ESTIMATED_DELIVERY_DATE');?></label>
        </div>
        <div class="col-xs-2">
            <label class="form-control">
                <?php
                if(($sample['estimated_delivery_date'])>0)
                {
                    echo System_helper::display_date($sample['estimated_delivery_date']);
                }
                else
                {
                    echo $this->lang->line("LABEL_NOT_SET");
                }
                ?>
            </label>
        </div>
    </div>
    <div class="row show-grid">
        <div class="col-xs-6">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_DELIVERY_DATE');?></label>
        </div>
        <div class="col-xs-2">
            <label class="form-control">
                <?php
                if(($sample['delivery_date'])>0)
                {
                    echo System_helper::display_date($sample['delivery_date']);
                }
                else
                {
                    echo $this->lang->line("LABEL_NOT_SET");
                }
                ?>
            </label>
        </div>
    </div>
    <div class="row show-grid">
        <div class="col-xs-6">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_RECEIVE_DATE');?></label>
        </div>
        <div class="col-xs-2">
            <label class="form-control">
                <?php
                if(($sample['receive_date'])>0)
                {
                    echo System_helper::display_date($sample['receive_date']);
                }
                else
                {
                    echo $this->lang->line("LABEL_NOT_SET");
                }
                ?>
            </label>
        </div>
    </div>
    <div class="row show-grid">
        <div class="col-xs-6">
            <label class="control-label pull-right"><?php echo $this->lang->line('LABEL_SOWING_DATE');?></label>
        </div>
        <div class="col-xs-2">
            <label class="form-control">
                <?php
                if(($sample['sowing_status'])==1)
                {
                    echo System_helper::display_date($sample['sowing_date']);
                }
                else
                {
                    echo $this->lang->line("LABEL_NOT_SET");
                }
                ?>
            </label>
        </div>
    </div>

</div>
<form class="form_valid" id="save_form" action="<?php echo base_url();?>general_sample_delivery/index/save" method="post">
    <input type="hidden" name="sample_id" value="<?php echo $sample['id']?>">
    <div class="row widget">
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
                        <?php
                        if($sample['sowing_status']==0)
                        {
                            ?>
                            <th><input type="checkbox" id="select_all_variety"></th>

                            <?php
                        }
                        ?>
                        <th><?php echo $this->lang->line("SERIAL"); ?></th>
                        <th><?php echo $this->lang->line("LABEL_VARIETY_NAME"); ?></th>
                        <th><?php echo $this->lang->line("LABEL_RND_CODE"); ?></th>
                        <th><?php echo $this->lang->line("LABEL_CROP_TYPE"); ?></th>
                        <th><?php echo $this->lang->line("LABEL_SAMPLE_SIZE_RND"); ?></th>

                    </tr>
                    </thead>

                    <tbody>
                        <?php
                        if(sizeof($variety_not_sent)>0)
                        {
                            foreach($variety_not_sent as $key=>$variety)
                            {
                                ?>
                                <tr>
                                    <?php
                                    if($sample['sowing_status']==0)
                                    {
                                        ?>
                                        <td><input type="checkbox" class="select_variety" name="varieties[]" value="<?php echo $variety['id'];?>"></td>
                                        <?php
                                    }
                                    ?>
                                    <td><?php echo $key+1;?></td>
                                    <td><?php echo $variety['variety_name'];?></td>
                                    <td><?php echo System_helper::get_rnd_code($variety);?></td>
                                    <td><?php echo $variety['type_name'];?></td>
                                    <td><?php echo $variety['sample_size'];?></td>
                                </tr>
                            <?php
                            }
                        }
                        else
                        {
                            ?>
                            <tr>
                                <td colspan="20" class="text-center alert-danger">
                                    <?php echo $this->lang->line("NO_DATA_FOUND"); ?>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <div class="clearfix"></div>
</form>
<div class="row widget">
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
                    <th><?php echo $this->lang->line("LABEL_SAMPLE_SIZE_RND"); ?></th>

                </tr>
                </thead>

                <tbody>
                    <?php
                    if(sizeof($variety_sent)>0)
                    {
                        foreach($variety_sent as $key=>$variety)
                        {
                            ?>
                            <tr>
                                <td><?php echo $key+1;?></td>
                                <td><?php echo $variety['variety_name'];?></td>
                                <td><?php echo System_helper::get_rnd_code($variety);?></td>
                                <td><?php echo $variety['type_name'];?></td>
                                <td><?php echo $variety['sample_size'];?></td>
                            </tr>
                        <?php
                        }
                    }
                    else
                    {
                        ?>
                        <tr>
                            <td colspan="20" class="text-center alert-danger">
                                <?php echo $this->lang->line("NO_DATA_FOUND"); ?>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </div>

</div>
<script type="text/javascript">

    jQuery(document).ready(function()
    {
        turn_off_triggers();
        $(document).on("change","#select_all_variety",function()
        {
            if($(this).is(':checked'))
            {
                $('.select_variety').prop('checked', true);
            }
            else
            {
                $('.select_variety').prop('checked', false);
            }

        });

    });


</script>