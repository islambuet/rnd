<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$data["link_new"]=base_url()."rnd_pesticide_stock_out/index/add";
$this->load->view("action_buttons",$data);
//echo '<pre>';
//print_r($stock_in_info);
//echo '</pre>';
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
                <th><?php echo $this->lang->line("LABEL_PESTICIDE_NAME"); ?></th>
                <th><?php echo $this->lang->line("LABEL_YEAR"); ?></th>
                <th><?php echo $this->lang->line("LABEL_SEASON"); ?></th>
                <th><?php echo $this->lang->line("LABEL_CROP_NAME"); ?></th>
                <th><?php echo $this->lang->line("LABEL_DATE"); ?></th>
                <th><?php echo $this->lang->line("LABEL_QUANTITY_STOCK_IN"); ?></th>

                <th><?php echo $this->lang->line("LABEL_RND_CODE"); ?></th>
            </tr>
            </thead>

            <tbody>
            <?php
            if(sizeof($stock_out_info)>0)
            {
                $index=0;
                foreach($stock_out_info as $stock_out)
                {
                    ?>
                    <tr>
                        <td><?php echo ++$index;?></td>
                        <td><?php echo $stock_out['pesticide_name'];?></td>
                        <td><?php echo $stock_out['year'];?></td>
                        <td><?php echo $stock_out['season_name'];?></td>
                        <td><?php echo $stock_out['crop_name'];?></td>
                        <td><?php echo System_helper::display_date($stock_out['stock_out_date']);?></td>
                        <td><?php echo $stock_out['pesticide_quantity'];?></td>
                        <td>
                            <?php
                            foreach($stock_out['rnd_code'] as $rnd_code)
                            {
                                echo '<p>'.$rnd_code.'</p>';
                            }

                            ?>
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