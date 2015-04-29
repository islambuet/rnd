<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    $data["link_new"]=base_url()."rnd_plot_design/index/add";
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
                <th><?php echo $this->lang->line("SERIAL"); ?></th>
                <th><?php echo $this->lang->line("YEAR"); ?></th>
                <th><?php echo $this->lang->line("LABEL_SEASON"); ?></th>
                <th><?php echo $this->lang->line("LABEL_PLOT_NAME"); ?></th>
                <th><?php echo $this->lang->line("LABEL_NUM_ROWS"); ?></th>


            </tr>
            </thead>

            <tbody>
            <?php
                if(sizeof($designed_plots)>0)
                {
                    foreach($designed_plots as $key=>$plot)
                    {
                        ?>
                        <tr>
                            <td><?php echo $key+1;?></td>
                            <td><?php echo $plot['year'];?></td>
                            <td><?php echo $plot['season_name'];?></td>
                            <td><?php echo $plot['plot_name'];?></td>
                            <td><?php echo $plot['num_rows'];?></td>

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
    <div class="col-xs-12">
        <div class="pagination_container pull-right">
            <?php
                echo $links;
            ?>
        </div>
    </div>


</div>
<div class="clearfix"></div>
<script type="text/javascript">

    jQuery(document).ready(function()
    {
        turn_off_triggers();
        $(document).on("blur",".crop_ordering",function()
        {
            //var crop_ordering=$(this).val();
            //console.log(crop_ordering);
            $.ajax({
                url: base_url+"create_crop/index/save_ordering",
                type: 'POST',
                dataType: "JSON",
                data:{crop_id:$(this).attr("data-crop-id"),ordering:$(this).val()},
                success: function (data, status)
                {

                },
                error: function (xhr, desc, err)
                {
                    console.log("error");

                }
            });
        });
    });
</script>