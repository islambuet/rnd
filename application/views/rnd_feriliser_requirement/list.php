<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    $data["link_new"]=base_url()."rnd_feriliser_requirement/index/add";
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
                <th><?php echo $this->lang->line("LABEL_FERTILISER_NAME"); ?></th>
                <th><?php echo $this->lang->line("LABEL_SEED_BED"); ?></th>
                <th><?php echo $this->lang->line("LABEL_QUANTITY"); ?></th>
                <th><?php echo $this->lang->line("LABEL_PRICE"); ?></th>
                <th><?php echo $this->lang->line("ACTION"); ?></th>
            </tr>
            </thead>

            <tbody>
            <?php
            if($row_list)
            {
                foreach($row_list as $row_lists)
                {
                    ?>
                    <tr>
                        <td><?php echo $row_lists['id'];?></td>
                        <td><?php echo $row_lists['fertilizer_name'];?></td>
                        <td><?php echo $row_lists['seed_bed'];?></td>
                        <td><?php echo $row_lists['fertilizer_quantity'];?></td>
                        <td><?php echo $row_lists['fertilizer_price'];?></td>
                        <td>
                            <a href="<?php echo base_url();?>rnd_feriliser_requirement/index/edit/<?php echo $row_lists['id'];?>">
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
                    <td colspan="21" style="text-align: center; font-size: 12px; color: #ff958a;"><?php echo $this->lang->line("NO_DATA_FOUND"); ?></td>
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