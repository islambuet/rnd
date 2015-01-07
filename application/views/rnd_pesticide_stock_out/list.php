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
                <th><?php echo $this->lang->line("LABEL_PESTICIDE_RND"); ?></th>
                <th><?php echo $this->lang->line("LABEL_PESTICIDE_STOCK_IN"); ?></th>
                <th><?php echo $this->lang->line("LABEL_DATE"); ?></th>
                <th><?php echo $this->lang->line("LABEL_QUANTITY_STOCK_IN"); ?></th>
                <th><?php echo $this->lang->line("ACTION"); ?></th>
            </tr>
            </thead>

            <tbody>
            <?php
            foreach($stock_in_info as $key=>$stock_in)
            {
                ?>
                <tr>
                    <td><?php echo $key+1;?></td>
                    <td><?php echo $stock_in['rnd_code'];?></td>
                    <td><?php echo $stock_in['pesticide_name'];?></td>
                    <td><?php echo date('Y-m-d',$stock_in['creation_date']);?></td>
                    <td><?php echo $stock_in['pesticide_quantity'];?></td>


                    <td>
                        <a href="<?php echo base_url();?>rnd_pesticide_stock_out/index/edit/<?php echo $stock_in['id'];?>">
                            <img src="<?php echo base_url();?>images/edit_record.png">
                        </a>
                        <a href="<?php echo base_url();?>rnd_pesticide_stock_out/index/delete/<?php echo $stock_in['id'];?>">
                            <img src="<?php echo base_url();?>images/delete_record.png">
                        </a>
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