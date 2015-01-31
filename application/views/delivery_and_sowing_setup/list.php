<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    $data["link_new"]=base_url()."delivery_and_sowing_setup/index/add";
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
                <th><?php echo $this->lang->line("LABEL_CROP_WIDTH"); ?></th>
                <th><?php echo $this->lang->line("LABEL_CROP_HEIGHT"); ?></th>
                <th><?php echo $this->lang->line("LABEL_FLOWERING_TYPE"); ?></th>
                <th><?php echo $this->lang->line("LABEL_SAMPLE_SIZE_RND"); ?></th>
                <th><?php echo $this->lang->line("LABEL_INITIAL_PLANTS"); ?></th>
                <th><?php echo $this->lang->line("LABEL_PLANTS_PER_HECTARE"); ?></th>

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
                            <td><?php echo $crop['crop_width'];?></td>
                            <td><?php echo $crop['crop_height'];?></td>
                            <td>
                                <?php
                                    $fruit_types=$this->config->item("fruit_type");
                                    echo $fruit_types[$crop['fruit_type']];

                                ?>
                            </td>
                            <td><?php echo $crop['sample_size'];?></td>
                            <td><?php echo $crop['initial_plants'];?></td>
                            <td><?php echo $crop['plants_per_hectare'];?></td>

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