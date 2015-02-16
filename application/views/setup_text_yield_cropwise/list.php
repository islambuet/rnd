<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    $data["link_new"]="#";
    $data["hide_new"]="1";
    $this->load->view("action_buttons",$data);

?>

<div class="row widget">
    <div class="widget-header">
        <div class="title">
            <?php echo $title; ?>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="col-sm-12">
        <table class="table table-hover table-bordered">
            <thead>
            <tr>
                <th><?php echo $this->lang->line("SERIAL"); ?></th>
                <th><?php echo $this->lang->line("LABEL_CROP_NAME"); ?></th>
                <th><?php echo $this->lang->line("LABEL_CROP_CODE"); ?></th>
                <th><?php echo $this->lang->line("ACTION"); ?></th>
            </tr>
            </thead>

            <tbody>
            <?php
                if(sizeof($cropInfo)>0)
                {
                    foreach($cropInfo as $key=>$crop)
                    {
                        ?>
                        <tr>
                            <td><?php echo $key+1;?></td>
                            <td><?php echo $crop['crop_name'];?></td>
                            <td><?php echo $crop['crop_code'];?></td>
                            <td>
                                <a href="<?php echo base_url();?>setup_text_yield_cropwise/index/edit/<?php echo $crop['id'];?>">
                                    <img src="<?php echo base_url();?>images/edit_record.png">
                                </a>
                            </td>
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
    <div class="col-sm-12">
        <div class="pagination_container pull-right">
            <?php
                echo $links;
            ?>
        </div>
    </div>


</div>
<div class="clearfix"></div>
