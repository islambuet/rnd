<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    $data["link_new"]=base_url()."sys_module_task/index/add";
    $this->load->view("action_buttons",$data);
?>

<div class="row widget">
    <div class="widget-header">
        <div class="title">
            <?php echo $title; ?>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="col-xs-12" style="overflow-x: auto;">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th><?php echo $this->lang->line("ID");?></th>
                    <th><?php echo $this->lang->line("NAME");?></th>
                    <th><?php echo $this->lang->line("TYPE");?></th>
                    <th><?php echo $this->lang->line("STATUS");?></th>
                </tr>
            </thead>

            <tbody>
            <?php
                if(sizeof($modules_tasks)>0)
                {
                    foreach($modules_tasks as $module_task)
                    {
                        ?>
                        <tr>
                            <td><?php echo $module_task['module_task']['id']; ?></td>
                            <td><?php echo $module_task['prefix'];?><a href="<?php echo base_url();?>sys_module_task/index/edit/<?php echo $module_task['module_task']['id']; ?>"><?php echo $module_task['module_task']['name']; ?></a></td>
                            <td><?php if($module_task['module_task']['type']=='TASK'){echo $this->lang->line('TASK');}else{ echo $this->lang->line('MODULE');} ?></td>
                            <td><?php echo $module_task['module_task']['status']; ?></td>

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
<div class="clearfix"></div>