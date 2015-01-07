<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$data["link_new"]=base_url()."trial_fruit_report_entry/index/add";
$this->load->view("action_buttons",$data);
//echo '<pre>';
//print_r($pictureReports);
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
                <th><?php echo $this->lang->line("LABEL_RND_CODE"); ?></th>
                <th><?php echo $this->lang->line("LABEL_SOWING_DATE"); ?></th>
                <th><?php echo $this->lang->line("ACTION"); ?></th>
            </tr>
            </thead>

            <tbody>
            <?php
            foreach($pictureReports as $key=>$report)
            {
                ?>
                <tr>
                    <td><?php echo $key+1;?></td>
                    <td><?php echo $report['rnd_code_variety'];?></td>
                    <td><?php echo date('d-m-Y',$report['sowing_date']);?></td>
                    <td>
                        <a href="<?php echo base_url();?>trial_fruit_report_entry/index/edit/<?php echo $report['id'];?>">
                            <img src="<?php echo base_url();?>images/edit_record.png">
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